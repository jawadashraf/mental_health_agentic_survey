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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // e.g., radio, checkbox, text, etc.
            $table->string('category'); // e.g., demographic, knowledge, attitude
            $table->unsignedInteger('order')->default(0); // for ordering questions
            $table->text('question'); // the question text
            $table->json('options')->nullable(); // for questions with options (like radio/checkbox)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
