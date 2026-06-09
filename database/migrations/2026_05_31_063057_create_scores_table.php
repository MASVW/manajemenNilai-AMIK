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
        Schema::create('scores', function (Blueprint $table) {
            // HINT BELAJAR:
            // Tabel scores menghubungkan students dan subjects.
            // student_id menunjuk ke students.id, subject_id menunjuk ke subjects.id.
            $table->id();

            // TODO MAHASISWA:
            // Tambahkan kolom:
            // - score: nilai, boleh kosong.
            // - student_id: id student.
            // - subject_id: id subject.
            // Lalu tambahkan foreign key ke tabel students dan subjects.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
