<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->collation('utf8mb4_bin');
            $table->string('description')->collation('utf8mb4_bin');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sport_clubs');
    }
}
