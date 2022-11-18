<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $admin= User::firstOrCreate(
        [
            "email" => "admin@m.com",
        ],[
            "name" => "Admin",
            "email" => "admin@m.com",
            "password" => bcrypt("password"),
        ]);

        $admin->assignRole("admin");

    }
}
