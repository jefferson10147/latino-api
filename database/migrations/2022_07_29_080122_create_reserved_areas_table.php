<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservedAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserved_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('reservation_id')->nullable();
            $table->foreign('reservation_id')->references('id')->on('rerservations')->onDelete('cascade');
            $table->integer('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reserved_areas');
    }
}
