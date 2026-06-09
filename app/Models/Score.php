<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// HINT BELAJAR:
// Score adalah tabel penghubung. Ia menyimpan nilai satu student untuk satu subject.
// TODO MAHASISWA:
// Tambahkan attribute Fillable untuk kolom score, student_id, dan subject_id.
class Score extends Model
{
    public function student(): BelongsTo
    {
        // HINT BELAJAR:
        // Setiap score pasti milik satu student.

        // TODO MAHASISWA:
        // Return relasi belongsTo ke model Student.

        abort(501, 'TODO: lengkapi relasi Score@student');
    }

    public function subject(): BelongsTo
    {
        // HINT BELAJAR:
        // Setiap score juga pasti milik satu subject.

        // TODO MAHASISWA:
        // Return relasi belongsTo ke model Subject.

        abort(501, 'TODO: lengkapi relasi Score@subject');
    }
}
