<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

// HINT BELAJAR:
// SubjectController sengaja dibuat lebih sederhana dari StudentController.
// Cocok untuk latihan mengulang pola CRUD dengan field yang lebih sedikit.
class SubjectController extends Controller
{
    public function index()
    {
        // HINT BELAJAR:
        // Ambil semua subject, lalu tampilkan ke halaman list.
        $subjects = Subject::query()->latest()->get();

        return view('pages.subject.subject-list', ['subjects' => $subjects]);
    }

    public function createView()
    {
        // HINT BELAJAR:
        // Tampilkan form tambah subject.
        return view('pages.subject.subject-create');
    }

    public function createData(Request $request)
    {
        // HINT BELAJAR:
        // Karena Subject hanya punya name, proses simpannya sangat pendek.
        $validated = $this->validateSubject($request);

        Subject::query()->create($validated);

        return redirect()->route('subject.list')->with('success', 'Subject created successfully.');
    }

    public function detailView($id)
    {
        // HINT BELAJAR:
        // Detail subject dicari berdasarkan id.
        $subject = Subject::query()->findOrFail($id);

        return view('pages.subject.subject-detail', ['subject' => $subject]);
    }

    public function patchView($id)
    {
        // HINT BELAJAR:
        // Ambil data lama untuk ditaruh di form edit.
        $subject = Subject::query()->findOrFail($id);

        return view('pages.subject.subject-patch', ['subject' => $subject]);
    }

    public function patchData(Request $request, $id)
    {
        // HINT BELAJAR:
        // Validasi input, cari subject, lalu update.
        $validated = $this->validateSubject($request);
        $subject = Subject::query()->findOrFail($id);

        $subject->update($validated);

        return redirect()->route('subject.view', ['id' => $subject->id])->with('success', 'Subject updated successfully.');
    }

    public function deleteData($id)
    {
        // HINT BELAJAR:
        // Delete subject. Di project yang lebih besar, cek dulu apakah subject
        // masih punya score sebelum dihapus.
        Subject::query()->findOrFail($id)->delete();

        return redirect()->route('subject.list')->with('success', 'Subject deleted successfully.');
    }

    private function validateSubject(Request $request): array
    {
        // HINT BELAJAR:
        // Aturan ini dipakai create dan update agar konsisten.
        return $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
        ]);
    }
}
