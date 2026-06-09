<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// HINT BELAJAR:
// Subject hanya punya satu field utama, yaitu name. Karena itu modelnya pendek.
// TODO MAHASISWA:
// Tambahkan attribute Fillable untuk kolom name.
class Subject extends Model
{
    public function scores(): HasMany
    {
        // HINT BELAJAR:
        // Satu subject bisa muncul di banyak score, karena banyak student
        // bisa punya nilai untuk subject yang sama.

        // TODO MAHASISWA:
        // Return relasi hasMany ke model Score.

        abort(501, 'TODO: lengkapi relasi Subject@scores');
    }
}
