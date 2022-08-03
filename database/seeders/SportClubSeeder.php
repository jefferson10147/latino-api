<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sport_clubs')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'name' => 'Real Madrid',
            'description' => 'Club de fútbol',
        ]);
    }
}
