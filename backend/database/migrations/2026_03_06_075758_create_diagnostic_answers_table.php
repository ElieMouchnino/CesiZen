<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diagnostic_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diagnostic_submission_id')->constrained('diagnostic_submissions')->cascadeOnDelete();
            $table->foreignId('diagnostic_question_id')->constrained('diagnostic_questions')->cascadeOnDelete();
            $table->integer('points');
            $table->timestamps();

            $table->unique(['diagnostic_submission_id', 'diagnostic_question_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diagnostic_answers');
    }
};