# Branch Learning: Praktik Laravel Manajemen Nilai

Ini adalah branch latihan. Branch ini sengaja belum selesai.

Tujuannya: mahasiswa membuka file yang diarahkan, membaca `HINT BELAJAR`, lalu mengisi bagian `TODO MAHASISWA` sampai aplikasi bisa berjalan seperti branch `master`.

Jika kamu belum install Git, PHP, Composer, Node.js, npm, XAMPP, atau belum clone project, pindah dulu ke README branch `master`. README di branch `master` berisi panduan setup dari nol.

## Konsep Branch

- `master`: berisi project final yang sudah selesai.
- `learning`: berisi project latihan yang harus dilengkapi mahasiswa.

Cek branch aktif:

```bash
git branch
```

Branch aktif ditandai dengan `*`.

Pindah ke branch learning:

```bash
git switch learning
```

Pindah ke branch master untuk melihat jawaban final:

```bash
git switch master
```

Kembali ke branch learning:

```bash
git switch learning
```

Catatan penting: kalau kamu sudah mengubah file di branch `learning`, jangan asal pindah branch. Simpan dulu dengan commit atau minta arahan pengajar.

## Cara Belajar Dari Branch Ini

Kerjakan secara berurutan.

Jangan langsung mengisi semua file. Laravel lebih mudah dipahami jika satu fitur diselesaikan dulu dari route, migration, model, controller, sampai view.

Urutan besarnya:

1. Route
2. Migration
3. Model
4. Controller
5. View
6. Test manual di browser

Jika bingung, buka file yang sama di branch `master` untuk melihat versi finalnya.

## Tanda Yang Harus Kamu Isi

Cari komentar seperti ini:

```php
// TODO MAHASISWA:
```

atau:

```blade
{{-- TODO MAHASISWA: --}}
```

Jika ada kode:

```php
abort(501, 'TODO: lengkapi ...');
```

artinya halaman itu memang belum selesai. Ganti `abort(501, ...)` dengan kode Laravel yang diminta oleh hint.

## Step 1. Lengkapi Route

Buka file:

```text
routes/web.php
```

Tugas:

- Lengkapi route Student.
- Lengkapi route Subject.
- Lengkapi route Score.

Petunjuk:

- Student memakai prefix `/student`.
- Subject memakai prefix `/subjects`.
- Score memakai prefix `/scores`.
- Gunakan nama route yang diminta di komentar TODO.

Setelah selesai, cek route:

```bash
php artisan route:list
```

Target:

- Route Student muncul.
- Route Subject muncul.
- Route Score muncul.

## Step 2. Lengkapi Migration

Buka folder:

```text
database/migrations
```

File yang harus dibuka:

- `2026_05_31_063039_create_students_table.php`
- `2026_05_31_091900_add_gender_to_students_table.php`
- `2026_05_31_063048_create_subjects_table.php`
- `2026_05_31_063057_create_scores_table.php`

Tugas:

- Tambahkan kolom untuk tabel `students`.
- Tambahkan kolom `gender`.
- Tambahkan kolom untuk tabel `subjects`.
- Tambahkan kolom dan foreign key untuk tabel `scores`.

Petunjuk:

- Baca komentar `TODO MAHASISWA` di setiap migration.
- Jangan menghapus `$table->id()` dan `$table->timestamps()`.
- Jika bingung tipe data yang dipakai, lihat file yang sama di branch `master`.

Setelah selesai, jalankan:

```bash
php artisan migrate:fresh --seed
```

Jika muncul pertanyaan untuk membuat database, pilih `yes`.

## Step 3. Lengkapi Model

Buka folder:

```text
app/Models
```

File yang harus dibuka:

- `Student.php`
- `Subject.php`
- `Score.php`

Tugas:

- Tambahkan `Fillable`.
- Tambahkan cast tanggal di model Student.
- Tambahkan relasi Student ke Score.
- Tambahkan relasi Subject ke Score.
- Tambahkan relasi Score ke Student dan Subject.

Petunjuk:

- Student punya banyak Score.
- Subject punya banyak Score.
- Score milik satu Student.
- Score milik satu Subject.

Setelah selesai, pastikan syntax aman:

```bash
php -l app/Models/Student.php
php -l app/Models/Subject.php
php -l app/Models/Score.php
```

## Step 4. Lengkapi Student Controller

Buka file:

```text
app/Http/Controllers/StudentController.php
```

Kerjakan method ini secara berurutan:

1. `index`
2. `createView`
3. `createData`
4. `detailView`
5. `patchView`
6. `patchData`
7. `deleteData`
8. `validateStudent`
9. `makeNis`

Petunjuk:

- `index` mengambil data dan mengirim ke view list.
- `createView` hanya menampilkan form.
- `createData` validasi input, membuat NIS, lalu menyimpan data.
- `detailView` mencari student berdasarkan `nis`.
- `patchView` mengambil data lama untuk form edit.
- `patchData` validasi lalu update data.
- `deleteData` mencari data berdasarkan `id`, lalu menghapusnya.

Setelah beberapa method selesai, cek syntax:

```bash
php -l app/Http/Controllers/StudentController.php
```

## Step 5. Lengkapi Student View

Buka folder:

```text
resources/views/pages/student
```

File yang harus dibuka:

- `student-list.blade.php`
- `student-create.blade.php`
- `student-detail.blade.php`
- `student-patch.blade.php`

Tugas:

- Lengkapi link tombol create.
- Lengkapi loop table list student.
- Lengkapi form create student.
- Lengkapi form edit student.
- Lengkapi tampilan detail student.
- Lengkapi tombol view, edit, dan delete.

Petunjuk:

- Form POST wajib memakai `@csrf`.
- Gunakan component yang sudah tersedia, seperti `x-text-input`, `x-input-label`, `x-input-error`, dan `x-primary-button`.
- Jika route belum diisi, link route belum bisa dipakai.

Setelah selesai, compile Blade:

```bash
php artisan view:cache
```

## Step 6. Lengkapi Subject

Subject adalah latihan mengulang pola Student dengan field yang lebih sederhana.

Buka:

```text
app/Http/Controllers/SubjectController.php
resources/views/pages/subject
```

Tugas controller:

- `index`
- `createView`
- `createData`
- `detailView`
- `patchView`
- `patchData`
- `deleteData`
- `validateSubject`

Tugas view:

- List subject.
- Form create subject.
- Detail subject.
- Form edit subject.

Petunjuk:

- Field Subject hanya `name`.
- Polanya hampir sama dengan Student.

## Step 7. Lengkapi Score

Buka:

```text
app/Http/Controllers/ScoreController.php
resources/views/pages/score
```

Tugas controller:

- `index`
- `inputView`
- `updateData`

Tugas view:

- `score-list.blade.php`
- `score-input.blade.php`

Target halaman `/scores`:

```text
No | Nama | Keterangan | Action
1  | Budi | 6/7        | INPUT NILAI
2  | Tiara| 0/7        | INPUT NILAI
```

Target halaman input nilai:

```text
Subject | Score | Action
IPA     | 80    | UPDATE
IPS     | 0     | UPDATE
```

Petunjuk:

- Score hanya menerima angka 0 sampai 100.
- Gunakan pasangan `student_id` dan `subject_id`.
- Jika nilai untuk pasangan student-subject sudah ada, update.
- Jika belum ada, buat data baru.

## Step 8. Lengkapi Navigation

Buka file:

```text
resources/views/layouts/navigation.blade.php
```

Tugas:

- Lengkapi link menu Student.
- Lengkapi link menu Subject.
- Lengkapi link menu Input Nilai.
- Lengkapi juga responsive navigation untuk tampilan mobile.

Petunjuk:

- Gunakan nama route yang sudah kamu buat di `routes/web.php`.

## Step 9. Jalankan Aplikasi

Terminal pertama:

```bash
npm run dev
```

Terminal kedua:

```bash
php artisan serve
```

Buka browser:

```text
http://127.0.0.1:8000
```

Test manual:

- Register user baru.
- Login.
- Buka menu Student.
- Tambah Student.
- Edit Student.
- Hapus Student.
- Buka menu Subject.
- Tambah Subject.
- Buka menu Input Nilai.
- Input nilai untuk beberapa subject.

## Step 10. Jalankan Test

Setelah semua TODO selesai, jalankan:

```bash
php artisan test
```

Target akhir:

```text
27 tests passed
```

Jika test masih gagal, baca pesan error. Biasanya error menunjukkan file dan baris yang perlu diperbaiki.

## Cara Melihat Jawaban Final

Jika benar-benar bingung:

1. Catat file yang membuat bingung.
2. Pindah ke branch `master`.
3. Buka file yang sama.
4. Pahami bedanya.
5. Kembali ke branch `learning`.
6. Tulis ulang dengan pemahaman sendiri.

Perintah:

```bash
git switch master
git switch learning
```

Jangan hanya copy-paste tanpa membaca. Tujuan branch ini adalah memahami alur:

```text
Route -> Controller -> Model -> Database -> View
```

## Checklist Akhir

- Route Student, Subject, dan Score sudah muncul di `php artisan route:list`.
- Migration berhasil dijalankan.
- Model punya Fillable dan relasi.
- Controller tidak lagi berisi `abort(501, 'TODO...')`.
- View tidak lagi berisi `href="#"` atau `action="#"` untuk fitur utama.
- Navigation sudah menuju route yang benar.
- `php artisan view:cache` berhasil.
- `php artisan test` berhasil.

Jika semua checklist terpenuhi, aplikasi latihanmu sudah mendekati branch final `master`.
