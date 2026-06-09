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
        // TODO MAHASISWA:
        // 1. Buat variable $students.
        // 2. Isi dengan semua data student dari database, urutkan dari terbaru.
        // 3. Return view pages.student.student-list.
        // 4. Kirim data dengan key 'students'.

        abort(501, 'TODO: lengkapi StudentController@index');
    }

    public function createView()
    {
        // HINT BELAJAR:
        // Method ini hanya menampilkan form. Belum ada data yang disimpan.

        // TODO MAHASISWA:
        // Return view pages.student.student-create.

        abort(501, 'TODO: lengkapi StudentController@createView');
    }

    public function createData(Request $request)
    {
        // HINT BELAJAR:
        // Request berisi input dari form. Validasi dulu sebelum simpan ke database.

        // TODO MAHASISWA:
        // 1. Validasi input student.
        // 2. Buat NIS otomatis dari nama.
        // 3. Simpan data ke tabel students.
        // 4. Redirect ke route student.list.

        abort(501, 'TODO: lengkapi StudentController@createData');
    }

    public function deleteData($id)
    {
        // HINT BELAJAR:
        // findOrFail akan mencari data berdasarkan id. Jika tidak ada, Laravel
        // otomatis menampilkan halaman 404.

        // TODO MAHASISWA:
        // 1. Cari student berdasarkan id.
        // 2. Hapus data tersebut.
        // 3. Redirect ke route student.list.

        abort(501, 'TODO: lengkapi StudentController@deleteData');
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

        // TODO MAHASISWA:
        // 1. Cari student berdasarkan nis.
        // 2. Return view pages.student.student-detail.
        // 3. Kirim data dengan key 'student'.

        abort(501, 'TODO: lengkapi StudentController@detailView');
    }

    public function patchView($nis)
    {
        // HINT BELAJAR:
        // Ambil data lama, lalu tampilkan di form edit.

        // TODO MAHASISWA:
        // 1. Cari student berdasarkan nis.
        // 2. Return view pages.student.student-patch.
        // 3. Kirim data dengan key 'student'.

        abort(501, 'TODO: lengkapi StudentController@patchView');
    }

    public function patchData(Request $request, $nis)
    {
        // HINT BELAJAR:
        // Update memakai data yang sudah divalidasi. Field nis tidak diubah
        // agar alamat detail student tetap stabil.

        // TODO MAHASISWA:
        // 1. Validasi input student.
        // 2. Cari student berdasarkan nis.
        // 3. Update name, gender, dan birthDate.
        // 4. Redirect ke route student.view.

        abort(501, 'TODO: lengkapi StudentController@patchData');
    }

    private function validateStudent(Request $request): array
    {
        // HINT BELAJAR:
        // Semua aturan validasi Student dikumpulkan di satu tempat agar create
        // dan update memakai aturan yang sama.

        // TODO MAHASISWA:
        // Return hasil $request->validate().
        // Field yang divalidasi: name, gender, birthDate.

        abort(501, 'TODO: lengkapi StudentController@validateStudent');
    }

    private function makeNis(string $name): string
    {
        // HINT BELAJAR:
        // NIS dibuat otomatis dari inisial nama + angka random, lalu dicek
        // agar tidak sama dengan NIS yang sudah ada.

        // TODO MAHASISWA:
        // 1. Buat NIS dari getInitial($name) + angka random.
        // 2. Cek agar NIS tidak sama dengan data yang sudah ada.
        // 3. Return NIS tersebut.

        abort(501, 'TODO: lengkapi StudentController@makeNis');
    }
}
