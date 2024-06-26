<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->bigInteger('rude')->unique()->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
