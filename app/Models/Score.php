<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// HINT BELAJAR:
// Score adalah tabel penghubung. Ia menyimpan nilai satu student untuk satu subject.
#[Fillable('score', 'student_id', 'subject_id')]
class Score extends Model
{
    public function student(): BelongsTo
    {
        // HINT BELAJAR:
        // Setiap score pasti milik satu student.
        return $this->belongsTo(Student::class);
    }

    public function subject(): BelongsTo
    {
        // HINT BELAJAR:
        // Setiap score juga pasti milik satu subject.
        return $this->belongsTo(Subject::class);
    }
}
