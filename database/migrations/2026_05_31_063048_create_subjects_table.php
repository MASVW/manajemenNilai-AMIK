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
        Schema::create('subjects', function (Blueprint $table) {
            // HINT BELAJAR:
            // Subject dibuat sederhana agar mahasiswa bisa fokus memahami
            // pola CRUD tanpa terlalu banyak field.
            $table->id();

            // TODO MAHASISWA:
            // Tambahkan kolom name untuk nama mata pelajaran.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
