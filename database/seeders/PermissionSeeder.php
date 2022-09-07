<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add admin role
        $adminRole = Role::where('name', config('roles.admin.roles'))->first();
        if (!$adminRole) {  
            $adminRole = Role::create(config('roles.admin.roles'));
        }
        // Get new admin permission
        $newPermissions = $this->getNewPermissions('roles.admin.permissions');
        // dd($newPermissions);
        Permission::insert($newPermissions);
        $adminRole->syncPermissions(config('roles.admin.permissions'));

        // Add client role
        $clientRole = Role::where('name', config('roles.client.roles'))->first();
        if (!$clientRole) {
            $clientRole = Role::create(config('roles.client.roles'));
        }
        // Get new client permission
        $newPermissions = $this->getNewPermissions('roles.client.permissions');
        Permission::insert($newPermissions);
        $clientRole->syncPermissions(config('roles.client.permissions'));
    }

    /**
     * Get list new permissions from file config
     * @param string $config
     * @return array
     */
    private function getNewPermissions(string $config): array
    {
        $currentPermissions = Permission::get('name')->pluck('name')->toArray();
        $newPermissions = [];
        $configPermissions = config($config);
        foreach ($configPermissions as $configPermission) {
            if (!in_array($configPermission, $currentPermissions)) {
                $newPermissions[] = [
                    'name' => $configPermission,
                    'guard_name' => config('permission.guard_name'), // config guard for admin 
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        return $newPermissions;
    }
}
