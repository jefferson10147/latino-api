<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wages')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'total' => 100,
            'description' => Str::random(10),
            'month' => 1,
            'year' => 2022,
            'status' => 0,
            'user_id' => 2
        ]);

        DB::table('wages')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'total' => 200,
            'description' => Str::random(10),
            'month' => 2,
            'year' => 2022,
            'status' => 0,
            'user_id' => 2
        ]);
    }
}
