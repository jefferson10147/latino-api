<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRerservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rerservations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->boleean('approved')->default(false);
            $table->text('description')->collation('utf8mb4_bin');
            $table->unsignedInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rerservations');
    }
}
