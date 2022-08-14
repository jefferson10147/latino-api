<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Scarlett',
            'last_name' => 'Johansson',
            'dni' => Str::random(8),
            'email' => 'admin@admin.com',
            'address' => Str::random(10),
            'membership_number' => 1234,
            'email_verified_at' => now(),
            'password' => '1234',
            'birthdate' => date('Y-m-d'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Cristiano',
            'last_name' => 'Ronaldo',
            'dni' => Str::random(8),
            'email' => 'user@user.com',
            'address' => Str::random(10),
            'membership_number' => 5678,
            'email_verified_at' => now(),
            'password' => '1234',
            'birthdate' => date('Y-m-d'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
