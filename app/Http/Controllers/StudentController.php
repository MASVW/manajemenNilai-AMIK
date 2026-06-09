<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// HINT BELAJAR:
// Controller ini adalah contoh CRUD lengkap. Setiap method mewakili satu aksi:
// list, tampil form, simpan data baru, detail, edit, update, dan delete.
class StudentController extends Controller
{
    public function index()
    {
        // HINT BELAJAR:
        // Ambil semua student dari database, lalu kirim ke view student-list.
        $students = Student::query()->latest()->get();

        return view('pages.student.student-list', [
            'students' => $students,
        ]);
    }

    public function createView()
    {
        // HINT BELAJAR:
        // Method ini hanya menampilkan form. Belum ada data yang disimpan.
        return view('pages.student.student-create');
    }

    public function createData(Request $request)
    {
        // HINT BELAJAR:
        // Request berisi input dari form. Validasi dulu sebelum simpan ke database.
        $validated = $this->validateStudent($request);
        $validated['nis'] = $this->makeNis($validated['name']);

        Student::query()->create($validated);

        return redirect()->route('student.list')->with('success', 'Student created successfully.');
    }

    public function deleteData($id)
    {
        // HINT BELAJAR:
        // findOrFail akan mencari data berdasarkan id. Jika tidak ada, Laravel
        // otomatis menampilkan halaman 404.
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
        // HINT BELAJAR:
        // Detail student dicari memakai nis, bukan id, karena route-nya menerima nis.
        $student = Student::query()->where('nis', $nis)->firstOrFail();

        return view('pages.student.student-detail', ['student' => $student]);
    }

    public function patchView($nis)
    {
        // HINT BELAJAR:
        // Ambil data lama, lalu tampilkan di form edit.
        $student = Student::query()->where('nis', $nis)->firstOrFail();

        return view('pages.student.student-patch', [
            'student' => $student,
        ]);
    }

    public function patchData(Request $request, $nis)
    {
        // HINT BELAJAR:
        // Update memakai data yang sudah divalidasi. Field nis tidak diubah
        // agar alamat detail student tetap stabil.
        $validated = $this->validateStudent($request);
        $student = Student::query()->where('nis', $nis)->firstOrFail();

        $student->update($validated);

        return redirect()->route('student.view', ['nis' => $student->nis])->with('success', 'Student updated successfully.');
    }

    private function validateStudent(Request $request): array
    {
        // HINT BELAJAR:
        // Semua aturan validasi Student dikumpulkan di satu tempat agar create
        // dan update memakai aturan yang sama.
        return $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birthDate' => ['required', 'date'],
        ]);
    }

    private function makeNis(string $name): string
    {
        // HINT BELAJAR:
        // NIS dibuat otomatis dari inisial nama + angka random, lalu dicek
        // agar tidak sama dengan NIS yang sudah ada.
        do {
            $nis = $this->getInitial($name).random_int(100, 999);
        } while (Student::query()->where('nis', $nis)->exists());

        return $nis;
    }
}
