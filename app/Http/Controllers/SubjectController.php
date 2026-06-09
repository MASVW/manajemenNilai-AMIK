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

        // TODO MAHASISWA:
        // 1. Ambil semua subject dari database.
        // 2. Return view pages.subject.subject-list.
        // 3. Kirim data dengan key 'subjects'.

        abort(501, 'TODO: lengkapi SubjectController@index');
    }

    public function createView()
    {
        // HINT BELAJAR:
        // Tampilkan form tambah subject.

        // TODO MAHASISWA:
        // Return view pages.subject.subject-create.

        abort(501, 'TODO: lengkapi SubjectController@createView');
    }

    public function createData(Request $request)
    {
        // HINT BELAJAR:
        // Karena Subject hanya punya name, proses simpannya sangat pendek.

        // TODO MAHASISWA:
        // 1. Validasi input subject.
        // 2. Simpan subject baru.
        // 3. Redirect ke route subject.list.

        abort(501, 'TODO: lengkapi SubjectController@createData');
    }

    public function detailView($id)
    {
        // HINT BELAJAR:
        // Detail subject dicari berdasarkan id.

        // TODO MAHASISWA:
        // 1. Cari subject berdasarkan id.
        // 2. Return view pages.subject.subject-detail.
        // 3. Kirim data dengan key 'subject'.

        abort(501, 'TODO: lengkapi SubjectController@detailView');
    }

    public function patchView($id)
    {
        // HINT BELAJAR:
        // Ambil data lama untuk ditaruh di form edit.

        // TODO MAHASISWA:
        // 1. Cari subject berdasarkan id.
        // 2. Return view pages.subject.subject-patch.
        // 3. Kirim data dengan key 'subject'.

        abort(501, 'TODO: lengkapi SubjectController@patchView');
    }

    public function patchData(Request $request, $id)
    {
        // HINT BELAJAR:
        // Validasi input, cari subject, lalu update.

        // TODO MAHASISWA:
        // 1. Validasi input subject.
        // 2. Cari subject berdasarkan id.
        // 3. Update nama subject.
        // 4. Redirect ke route subject.view.

        abort(501, 'TODO: lengkapi SubjectController@patchData');
    }

    public function deleteData($id)
    {
        // HINT BELAJAR:
        // Delete subject. Di project yang lebih besar, cek dulu apakah subject
        // masih punya score sebelum dihapus.

        // TODO MAHASISWA:
        // 1. Cari subject berdasarkan id.
        // 2. Hapus subject.
        // 3. Redirect ke route subject.list.

        abort(501, 'TODO: lengkapi SubjectController@deleteData');
    }

    private function validateSubject(Request $request): array
    {
        // HINT BELAJAR:
        // Aturan ini dipakai create dan update agar konsisten.

        // TODO MAHASISWA:
        // Return hasil $request->validate() untuk field name.

        abort(501, 'TODO: lengkapi SubjectController@validateSubject');
    }
}
