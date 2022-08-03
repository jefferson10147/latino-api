<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_comments')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'comment_text' => Str::random(100),
            'new_id' => 1,
            'user_id' => 2
        ]);

        DB::table('news_comments')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'comment_text' => Str::random(100),
            'new_id' => 1,
            'user_id' => 2
        ]);

        DB::table('news_comments')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'comment_text' => Str::random(100),
            'new_id' => 2,
            'user_id' => 2
        ]);
    }
}
