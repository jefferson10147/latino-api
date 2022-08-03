<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssociateMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('associate_members')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'name' => 'Lionel',
            'last_name' => 'Messi',
            'dni' => Str::random(8),
            'relationship' => 'Hijo',
            'birthdate' => now(),
            'user_id' => 2
        ]);

        DB::table('associate_members')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'name' => 'Barak',
            'last_name' => 'Obama',
            'dni' => Str::random(8),
            'relationship' => 'Padre',
            'birthdate' => now(),
            'user_id' => 2
        ]);
    }
}
