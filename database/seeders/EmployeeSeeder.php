<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                "name" => "Employee $i",
                "email" => "emp$i@m.com",
                "password" => Hash::make("password"),
            ]);

            $user->assignRole("employee");

           $employee= Employee::create([
                "user_id" => $user->id,
            ]);
        }
    }
}
