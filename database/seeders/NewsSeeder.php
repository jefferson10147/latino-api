<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'title' => Str::random(10),
            'body' => Str::random(100),
        ]);

        DB::table('news')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'title' => Str::random(10),
            'body' => Str::random(100),
        ]);
    }
}
