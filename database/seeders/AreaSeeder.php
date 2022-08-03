<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'name' => 'Area 51',
            'description' => 'Area de fiesta',
            'availability' => true,
            'price' => 100
        ]);

        DB::table('areas')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'name' => 'Caney',
            'description' => 'Area para parrilla',
            'availability' => true,
            'price' => 100
        ]);
    }
}
