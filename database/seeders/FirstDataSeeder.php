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

        Role::create(config('roles.' . UserRole::SUPPER_ADMIN->value . '.roles'));

        $user = User::create([
            'email' => '18duongminhphuc@gmail.com',
            'password' => 123456789,
            'username' => 'Supper'
        ]);

        // Assign role super admin to user
        $user->assignRole(config('roles.' . UserRole::SUPPER_ADMIN->value . '.roles'));
    }
}
