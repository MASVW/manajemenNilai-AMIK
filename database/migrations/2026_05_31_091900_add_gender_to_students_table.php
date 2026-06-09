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
        Schema::table('students', function (Blueprint $table) {
            // HINT BELAJAR:
            // Migration juga bisa dipakai untuk mengubah tabel yang sudah ada.
            // Di sini kita menambahkan kolom gender ke tabel students.

            // TODO MAHASISWA:
            // Tambahkan kolom gender dengan pilihan male dan female.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
    }
};
