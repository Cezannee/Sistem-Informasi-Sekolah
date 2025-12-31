<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();

            $table->string('year', 20);                 // contoh: 2024/2025
            $table->tinyInteger('semester');            // 1 atau 2

            $table->unsignedTinyInteger('task_score')->default(0);  // 0-100
            $table->unsignedTinyInteger('mid_score')->default(0);   // 0-100
            $table->unsignedTinyInteger('final_score')->default(0); // 0-100
            $table->decimal('final_grade', 5, 2)->default(0);       // nilai akhir hasil hitung

            $table->timestamps();

            // mencegah duplikat nilai untuk siswa-mapel-semester-tahun yang sama
            $table->unique(['student_id', 'subject_id', 'year', 'semester']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
