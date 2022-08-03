<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            'user_id' => 2,
            'start_date' => '2022-07-05 00:00:00',
            'end_date' => '2022-10-31 20:00:00',
            'created_at' => now(),
            'updated_at' => now(),
            'approved' => false,
            'description' => Str::random(20),
        ]);
    }
}
