<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// HINT BELAJAR:
// Fillable adalah daftar kolom yang boleh diisi melalui create() atau update().
// Tanpa ini, Laravel melindungi model dari mass assignment yang tidak sengaja.
// TODO MAHASISWA:
// Tambahkan attribute Fillable untuk kolom name, nis, gender, dan birthDate.
class Student extends Model
{
    use HasFactory;

    public function casts(): array
    {
        // TODO MAHASISWA:
        // Return array cast agar birthDate dibaca sebagai date.

        return [];
    }

    public function scores(): HasMany
    {
        // HINT BELAJAR:
        // Satu student bisa punya banyak score, karena satu student dinilai
        // pada banyak subject.

        // TODO MAHASISWA:
        // Return relasi hasMany ke model Score.

        abort(501, 'TODO: lengkapi relasi Student@scores');
    }
}
