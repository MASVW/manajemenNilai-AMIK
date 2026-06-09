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

        // TODO MAHASISWA:
        // 1. Ambil semua student beserta scores yang sudah terisi.
        // 2. Hitung total subject.
        // 3. Return view pages.score.score-list.
        // 4. Kirim data students dan totalSubjects.

        abort(501, 'TODO: lengkapi ScoreController@index');
    }

    public function inputView($studentId)
    {
        // HINT BELAJAR:
        // Halaman input nilai butuh 3 data: student yang dipilih, semua subject,
        // dan score lama milik student tersebut.

        // TODO MAHASISWA:
        // 1. Cari student berdasarkan studentId.
        // 2. Ambil semua subject.
        // 3. Ambil score lama milik student, gunakan subject_id sebagai key.
        // 4. Return view pages.score.score-input.

        abort(501, 'TODO: lengkapi ScoreController@inputView');
    }

    public function updateData(Request $request, $studentId, $subjectId)
    {
        // HINT BELAJAR:
        // Pastikan student dan subject benar-benar ada sebelum score disimpan.

        // HINT BELAJAR:
        // Score dibatasi 0 sampai 100 agar data yang masuk tetap masuk akal.

        // HINT BELAJAR:
        // updateOrCreate membuat data jika belum ada, atau update jika pasangan
        // student_id dan subject_id sudah pernah disimpan.

        // TODO MAHASISWA:
        // 1. Pastikan student dan subject ada.
        // 2. Validasi score angka 0 sampai 100.
        // 3. Simpan dengan updateOrCreate.
        // 4. Redirect kembali ke route score.input.view.

        abort(501, 'TODO: lengkapi ScoreController@updateData');
    }
}
