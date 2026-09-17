<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tool_issues', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->foreignId('tool_id')
                  ->constrained('tools')
                  ->cascadeOnDelete();

            $table->unsignedInteger('quantity');

            $table->dateTime('issue_date');

            $table->dateTime('return_date')
                  ->nullable();

            $table->enum('status', [
                'issued',
                'returned'
            ])->default('issued');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tool_issues');
    }
};