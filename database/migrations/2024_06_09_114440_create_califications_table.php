<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('califications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('trimester_id')->constrained(); // Relación con el trimestre
            $table->decimal('note1', 8, 2)->nullable();
            $table->decimal('note2', 8, 2)->nullable();
            $table->decimal('note3', 8, 2)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('califications');
    }
};
