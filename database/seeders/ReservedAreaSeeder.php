<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservedAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reserved_areas')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => 1,
            'area_id' => 1
        ]);

        DB::table('reserved_areas')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => 1,
            'area_id' => 2
        ]);
    }
}
