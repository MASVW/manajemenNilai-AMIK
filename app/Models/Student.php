<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        return $this->hasMany(Score::class);
    }
}
