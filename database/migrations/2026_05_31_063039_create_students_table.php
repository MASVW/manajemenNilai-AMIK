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
        Schema::create('students', function (Blueprint $table) {
            // HINT BELAJAR:
            // Migration adalah rancangan tabel. Kolom yang ditulis di sini
            // akan dibuat di database saat menjalankan php artisan migrate.
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('nis')->nullable(false)->unique('nis');
            $table->string('birthDate')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
