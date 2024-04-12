<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('mail')->unique();
            $table->integer('attempts')->default(0);
            $table->boolean('sessionActive')->default(false);
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('users_sessions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('login');
            $table->dateTime('logout')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); 
    }
};
