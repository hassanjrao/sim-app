<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrCreate(
            [
                "name" => "admin",
            ],
            [
                "name" => "admin",
                "guard_name" => "web",
            ]
        );

        $role = Role::firstOrCreate(
            [
                "name" => "user"
            ],
            [
                "name" => "user",
                "guard_name" => "web",
            ]
        );

        $role = Role::firstOrCreate(
            [
                "name" => "employee"
            ],
            [
                "name" => "employee",
                "guard_name" => "web",
            ]
        );
    }
}
