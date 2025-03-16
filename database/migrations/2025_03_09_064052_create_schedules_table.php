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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->nullable()->references('id')->on('courses')->cascadeOnDelete();
            $table->foreignId('classroom_id')->nullable()->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('workshop_id')->nullable()->references('id')->on('workshops')->cascadeOnDelete();
            $table->foreignId('event_id')->nullable()->references('id')->on('events')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
