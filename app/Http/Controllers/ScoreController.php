<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
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
        Student::query()->findOrFail($studentId);
        Subject::query()->findOrFail($subjectId);

        $validated = $request->validate([
            'score' => ['required', 'integer', 'min:0', 'max:100'],
        ]);

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
