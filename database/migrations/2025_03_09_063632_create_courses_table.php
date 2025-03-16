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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classroom_id')->nullable()->references('id')->on('classrooms')->cascadeOnDelete();
            $table->string('name')->unique();
            $table->integer('max_student_limit')->default(100);
            $table->longText('description')->nullable();
            $table->string('day');
            $table->string('start_time');
            $table->string('end_time');
            $table->timestamp('starting_date');
            $table->timestamp('ending_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
