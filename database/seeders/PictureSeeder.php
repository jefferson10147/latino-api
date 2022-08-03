<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pictures')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'name' => 'Picture 1',
            'url' => 'https://picsum.photos/id/1/200/300',
            'area_id' => 1
        ]);

        DB::table('pictures')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'name' => 'Picture 2',
            'url' => 'https://picsum.photos/id/2/200/300',
            'user_id' => 2
        ]);

        DB::table('pictures')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'name' => 'Picture 3',
            'url' => 'https://picsum.photos/id/3/200/300',
            'new_id' => 1
        ]);
    }
}
