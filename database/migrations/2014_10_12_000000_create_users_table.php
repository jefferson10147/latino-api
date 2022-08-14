<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            // $table->foreign('role_id')->references('id')->on('roles')->OnDelete('cascade');
            $table->string('name')->collation('utf8mb4_bin');
            $table->string('last_name')->collation('utf8mb4_bin');
            $table->string('dni')->collation('utf8mb4_bin')->unique();
            $table->string('email')->unique()->collation('utf8mb4_bin');
            $table->string('address')->collation('utf8mb4_bin');
            $table->integer('membership_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->collation('utf8mb4_bin');
            $table->date('birthdate')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
