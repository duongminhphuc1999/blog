<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class FirstDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => '18duongminhphuc@gmail.com',
            'username' => 'phuc18',
            'password' => 123456789,
            'role' => UserRole::SUPPER_ADMIN,
        ]);
        UserDetail::create(['id' => $user->id]);

        // Create role super_admin
        Role::create(config('roles.super_admin.roles'));
        // Assign role super admin to user
        $user->assignRole(config('roles.super_admin.roles'));
    }
}
