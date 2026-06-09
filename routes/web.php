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
    Route::get('/', 'index')->name('student.list');
    Route::get('/create', 'createView')->name('student.create.view');
    Route::post('/create', 'createData')->name('student.create.data');
    Route::get('/{nis}', 'detailView')->name('student.view');
    Route::get('/{nis}/update', 'patchView')->name('student.patch.view');
    Route::post('/{nis}/update', 'patchData')->name('student.patch.data');
    Route::post('/{id}', 'deleteData')->name('student.delete');
});

// HINT BELAJAR:
// CRUD Subject memakai pola yang sama seperti Student, tetapi field-nya hanya name.
Route::prefix('subjects')->controller(SubjectController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('subject.list');
    Route::get('/create', 'createView')->name('subject.create.view');
    Route::post('/create', 'createData')->name('subject.create.data');
    Route::get('/{id}', 'detailView')->name('subject.view');
    Route::get('/{id}/update', 'patchView')->name('subject.patch.view');
    Route::post('/{id}/update', 'patchData')->name('subject.patch.data');
    Route::post('/{id}', 'deleteData')->name('subject.delete');
});

// HINT BELAJAR:
// Score tidak dibuat sebagai CRUD penuh. User hanya melihat daftar student,
// membuka detail input nilai, lalu meng-update score per subject.
Route::prefix('scores')->controller(ScoreController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('score.list');
    Route::get('/{studentId}', 'inputView')->name('score.input.view');
    Route::post('/{studentId}/{subjectId}', 'updateData')->name('score.update.data');
});

require __DIR__.'/auth.php';
