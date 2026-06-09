<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// HINT BELAJAR:
// Fillable adalah daftar kolom yang boleh diisi melalui create() atau update().
// Tanpa ini, Laravel melindungi model dari mass assignment yang tidak sengaja.
#[Fillable('name', 'nis', 'gender', 'birthDate')]
class Student extends Model
{
    use HasFactory;

    public function casts(): array
    {
        return [
            'birthDate' => 'date',
        ];
    }

    public function scores(): HasMany
    {
        // HINT BELAJAR:
        // Satu student bisa punya banyak score, karena satu student dinilai
        // pada banyak subject.
        return $this->hasMany(Score::class);
    }
}
