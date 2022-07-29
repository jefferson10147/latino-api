<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associate_members', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->collation('utf8mb4_bin');
            $table->string('last_name')->collation('utf8mb4_bin');
            $table->integer('dni')->nullable();
            $table->string('relationship')->collation('utf8mb4_bin');
            $table->unsignedInteger('user_id');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('associate_members');
    }
}
