<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::query()->latest()->get();

        return view('pages.student.student-list', [
            'students' => $students,
        ]);
    }

    public function createView()
    {
        return view('pages.student.student-create');
    }

    public function createData(Request $request)
    {
        $validated = $this->validateStudent($request);
        $validated['nis'] = $this->makeNis($validated['name']);

        Student::query()->create($validated);

        return redirect()->route('student.list')->with('success', 'Student created successfully.');
    }

    public function deleteData($id)
    {
        Student::query()->findOrFail($id)->delete();

        return redirect()->route('student.list')->with('success', 'Student deleted successfully.');
    }

    public function getInitial($name): string
    {
        $words = explode(' ', trim($name));
        $initail = '';
        foreach ($words as $key => $word) {
            if ($word !== '') {
                $initail .= strtoupper(substr($word, 0, 1));
            }
        }

        return $initail;
    }

    public function detailView($nis)
    {
        $student = Student::query()->where('nis', $nis)->firstOrFail();

        return view('pages.student.student-detail', ['student' => $student]);
    }

    public function patchView($nis)
    {
        $student = Student::query()->where('nis', $nis)->firstOrFail();

        return view('pages.student.student-patch', [
            'student' => $student,
        ]);
    }

    public function patchData(Request $request, $nis)
    {
        $validated = $this->validateStudent($request);
        $student = Student::query()->where('nis', $nis)->firstOrFail();

        $student->update($validated);

        return redirect()->route('student.view', ['nis' => $student->nis])->with('success', 'Student updated successfully.');
    }

    private function validateStudent(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birthDate' => ['required', 'date'],
        ]);
    }

    private function makeNis(string $name): string
    {
        do {
            $nis = $this->getInitial($name).random_int(100, 999);
        } while (Student::query()->where('nis', $nis)->exists());

        return $nis;
    }
}
