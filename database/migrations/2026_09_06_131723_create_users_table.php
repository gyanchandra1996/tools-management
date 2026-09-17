<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->string('email')->unique();

            $table->string('mobile', 10)->unique();

            $table->string('password');

            $table->string('picture')->nullable();

            $table->enum('mechanic_level', [
                'Expert',
                'Medium',
                'New Recruit',
                'Trainee'
            ])->nullable();

            $table->enum('role', [
                'admin',
                'mechanic'
            ])->default('mechanic');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};