<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

// HINT BELAJAR:
// Route adalah daftar alamat URL aplikasi. Baca file ini dari atas ke bawah
// untuk mengetahui URL mana yang menjalankan controller dan method tertentu.

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// HINT BELAJAR:
// CRUD Student. Prefix "student" berarti semua URL di group ini diawali /student.
// Contoh: Route::get('/', 'index') menjadi GET /student.
Route::prefix('student')->controller(StudentController::class)->middleware('auth')->group(function () {
    // TODO MAHASISWA:
    // Tuliskan route Student di sini:
    // - GET /student untuk list.
    // - GET /student/create untuk form tambah.
    // - POST /student/create untuk simpan data baru.
    // - GET /student/{nis} untuk detail.
    // - GET /student/{nis}/update untuk form edit.
    // - POST /student/{nis}/update untuk update data.
    // - POST /student/{id} untuk delete data.
});

// HINT BELAJAR:
// CRUD Subject memakai pola yang sama seperti Student, tetapi field-nya hanya name.
Route::prefix('subjects')->controller(SubjectController::class)->middleware('auth')->group(function () {
    // TODO MAHASISWA:
    // Tuliskan route Subject di sini.
    // Gunakan pola yang sama seperti Student, tetapi parameter detail/edit/delete
    // cukup memakai {id}.
});

// HINT BELAJAR:
// Score tidak dibuat sebagai CRUD penuh. User hanya melihat daftar student,
// membuka detail input nilai, lalu meng-update score per subject.
Route::prefix('scores')->controller(ScoreController::class)->middleware('auth')->group(function () {
    // TODO MAHASISWA:
    // Tuliskan route Score di sini:
    // - GET /scores untuk list progress nilai student.
    // - GET /scores/{studentId} untuk halaman input nilai.
    // - POST /scores/{studentId}/{subjectId} untuk update nilai satu subject.
});

require __DIR__.'/auth.php';
