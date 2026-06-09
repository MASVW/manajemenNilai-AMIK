<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

// HINT BELAJAR:
// ScoreController bukan CRUD penuh. Controller ini fokus pada input dan update
// nilai student untuk setiap subject.
class ScoreController extends Controller
{
    public function index()
    {
        // HINT BELAJAR:
        // with('scores') dipakai agar Laravel mengambil data score student
        // sekaligus, sehingga view bisa menghitung progress seperti 6/7.
        $students = Student::query()
            ->with(['scores' => fn ($query) => $query->whereNotNull('score')])
            ->latest()
            ->get();
        $totalSubjects = Subject::query()->count();

        return view('pages.score.score-list', [
            'students' => $students,
            'totalSubjects' => $totalSubjects,
        ]);
    }

    public function inputView($studentId)
    {
        // HINT BELAJAR:
        // Halaman input nilai butuh 3 data: student yang dipilih, semua subject,
        // dan score lama milik student tersebut.
        $student = Student::query()->findOrFail($studentId);
        $subjects = Subject::query()->orderBy('name')->get();
        $scores = Score::query()
            ->where('student_id', $student->id)
            ->pluck('score', 'subject_id');

        return view('pages.score.score-input', [
            'student' => $student,
            'subjects' => $subjects,
            'scores' => $scores,
        ]);
    }

    public function updateData(Request $request, $studentId, $subjectId)
    {
        // HINT BELAJAR:
        // Pastikan student dan subject benar-benar ada sebelum score disimpan.
        Student::query()->findOrFail($studentId);
        Subject::query()->findOrFail($subjectId);

        // HINT BELAJAR:
        // Score dibatasi 0 sampai 100 agar data yang masuk tetap masuk akal.
        $validated = $request->validate([
            'score' => ['required', 'integer', 'min:0', 'max:100'],
        ]);

        // HINT BELAJAR:
        // updateOrCreate membuat data jika belum ada, atau update jika pasangan
        // student_id dan subject_id sudah pernah disimpan.
        Score::query()->updateOrCreate(
            [
                'student_id' => $studentId,
                'subject_id' => $subjectId,
            ],
            [
                'score' => $validated['score'],
            ],
        );

        return redirect()
            ->route('score.input.view', ['studentId' => $studentId])
            ->with('success', 'Score updated successfully.');
    }
}
