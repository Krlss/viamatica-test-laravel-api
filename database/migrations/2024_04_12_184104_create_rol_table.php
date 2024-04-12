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
        Schema::create('rol', function (Blueprint $table) {
            $table->id(); 
            $table->string('name')->unique(); 
            $table->timestamps();
        });

        Schema::create('rol_options', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('rol_rol_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('rol')->onDelete('cascade');
            $table->unsignedBigInteger('rol_option_id');
            $table->foreign('rol_option_id')->references('id')->on('rol_options')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('rol_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('rol')->onDelete('cascade');
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
        Schema::dropIfExists('rol');
    }
};
