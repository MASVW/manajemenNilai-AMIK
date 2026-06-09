# Buku Panduan Belajar Laravel: Manajemen Nilai

Project ini adalah aplikasi Laravel sederhana untuk belajar membuat sistem manajemen nilai. Fitur yang sudah ada:

- Login dan register dari Laravel Breeze.
- CRUD Student.
- CRUD Subject.
- Input nilai Student per Subject.
- Progress nilai, contoh `6/7`, artinya 6 subject sudah punya nilai dari total 7 subject.

Panduan ini dibuat untuk pemula. Tujuannya bukan langsung hafal semua syntax, tetapi paham alur kerja Laravel dari database sampai tampilan.

## Cara Membaca Project Ini

Bayangkan aplikasi web seperti restoran kecil:

- Route adalah pintu masuk. URL mana yang dibuka user.
- Controller adalah pelayan. Ia menerima request, mengambil data, lalu memilih view.
- Model adalah wakil tabel database. Ia membantu PHP berbicara dengan tabel.
- Migration adalah rancangan meja database. Kolom apa saja yang dibuat.
- View adalah tampilan yang dilihat user.
- Component adalah potongan view yang bisa dipakai ulang, misalnya tombol dan tabel.

Alur paling umum:

```text
User buka URL
    -> routes/web.php
    -> Controller
    -> Model
    -> Database
    -> View Blade
    -> HTML tampil di browser
```

Contoh nyata:

```text
User buka /student
    -> route student.list
    -> StudentController@index
    -> Student::query()->latest()->get()
    -> resources/views/pages/student/student-list.blade.php
```

## Branch Untuk Belajar

Repository ini punya dua konsep branch:

- `master`: output final project yang bersih.
- `learning`: branch belajar. Di branch ini ada dokumentasi, komentar `HINT BELAJAR`, dan beberapa bagian controller sengaja dikosongkan sebagai tugas mahasiswa.

Perintah dasar:

```bash
git branch
git switch master
git switch learning
```

Kalau mahasiswa ingin belajar dengan membaca hint, gunakan:

```bash
git switch learning
```

Di branch `learning`, beberapa method controller berisi:

```php
abort(501, 'TODO: lengkapi ...');
```

Artinya bagian itu belum selesai secara sengaja. Mahasiswa harus mengganti `abort(501, ...)` dengan kode Laravel yang benar sesuai hint.

Contoh bagian yang sengaja dihapus:

```php
// TODO MAHASISWA:
// 1. Buat variable $students.
// 2. Isi dengan semua data student dari database, urutkan dari terbaru.
// 3. Return view pages.student.student-list.
// 4. Kirim data dengan key 'students'.

abort(501, 'TODO: lengkapi StudentController@index');
```

Mahasiswa diharapkan menuliskan sendiri kode seperti:

```php
$students = Student::query()->latest()->get();

return view('pages.student.student-list', [
    'students' => $students,
]);
```

Kalau ingin melihat output final tanpa komentar belajar tambahan, gunakan:

```bash
git switch master
```

### Cara Push Branch Dengan Aman

Jangan jalankan `git branch -M master` jika kamu sedang berada di branch `learning`.

Perintah `git branch -M master` artinya mengganti nama branch yang sedang aktif menjadi `master`. Jadi jika branch aktif adalah `learning`, branch `learning` bisa berubah nama menjadi `master`.

Cara aman mengecek branch aktif:

```bash
git branch
```

Branch aktif ditandai dengan `*`.

Cara push branch final:

```bash
git switch master
git push -u origin master
```

Cara push branch belajar:

```bash
git switch learning
git push -u origin learning
```

Jika sudah terlanjur salah push branch belajar ke `origin/master`, jangan langsung force push jika belum yakin. Diskusikan dulu dengan pengajar, karena force push bisa mengubah riwayat branch di GitHub.

## Persiapan Alat

Bagian ini menjelaskan alat yang perlu diinstall. Tidak perlu takut dengan banyak nama. Setiap alat punya tugas masing-masing.

### 1. Git dan GitHub

Git adalah alat untuk menyimpan riwayat perubahan kode. GitHub adalah website untuk menyimpan repository secara online.

Install Git:

- Windows, macOS, Linux: buka https://git-scm.com/downloads atau panduan GitHub di https://github.com/git-guides/install-git.
- Alternatif lebih mudah untuk pemula: install GitHub Desktop dari https://desktop.github.com/download/.

Setelah install, cek:

```bash
git --version
```

Atur nama dan email:

```bash
git config --global user.name "Nama Kamu"
git config --global user.email "emailkamu@example.com"
```

Jika ingin memakai GitHub dari terminal, install GitHub CLI:

- Dokumentasi: https://docs.github.com/en/github-cli/github-cli.
- Manual: https://cli.github.com/manual/.

Cek:

```bash
gh --version
```

Login GitHub CLI:

```bash
gh auth login
```

### 2. PHP

PHP adalah bahasa utama Laravel. Laravel berjalan di atas PHP.

Install PHP:

- Panduan resmi PHP: https://www.php.net/downloads.
- Untuk pemula Windows, boleh memakai Laragon atau XAMPP.
- Untuk macOS, Laravel Herd atau Homebrew bisa dipakai.

Cek:

```bash
php -v
```

### 3. Composer

Composer adalah package manager PHP. Composer akan menginstall dependency Laravel dari `composer.json`.

Install Composer:

- Website resmi: https://getcomposer.org/.
- Panduan intro: https://getcomposer.org/doc/00-intro.md.

Cek:

```bash
composer -V
```

### 4. Node.js dan npm

Node.js dipakai untuk menjalankan tool frontend. npm adalah package manager JavaScript. Biasanya npm ikut terinstall saat install Node.js.

Install:

- Node.js: https://nodejs.org/en/download.
- Panduan npm: https://docs.npmjs.com/downloading-and-installing-node-js-and-npm.

Cek:

```bash
node -v
npm -v
```

### 5. MySQL

MySQL adalah database yang menyimpan data user, student, subject, dan score.

Install:

- MySQL Community Downloads: https://www.mysql.com/downloads/.
- MySQL Installer Windows: https://dev.mysql.com/downloads/installer/.

Setelah MySQL aktif, buat database:

```sql
CREATE DATABASE learning;
```

Nama database bisa diganti, tetapi harus sama dengan isi `.env`.

## Cara Menjalankan Project

Ikuti langkah ini dari awal.

### 1. Clone atau buka folder project

Jika dari GitHub:

```bash
git clone <url-repository>
cd appsManajemenNilai
```

Jika folder sudah ada, cukup masuk ke folder:

```bash
cd appsManajemenNilai
```

### 2. Install dependency PHP

```bash
composer install
```

### 3. Install dependency frontend

```bash
npm install
```

### 4. Copy `.env.example` menjadi `.env`

Laravel membaca konfigurasi dari file `.env`.

File `.env.example` adalah contoh konfigurasi. File ini aman masuk GitHub.
File `.env` adalah konfigurasi asli di laptop masing-masing. File ini tidak boleh masuk GitHub karena bisa berisi password database.

Saat pertama kali clone project, biasanya `.env` belum ada. Jadi kita harus copy dulu.

Untuk macOS atau Linux:

```bash
cp .env.example .env
```

Untuk Windows Command Prompt:

```bat
copy .env.example .env
```

Untuk Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Setelah dicopy, pastikan file `.env` sudah muncul di folder project.

### 5. Atur database di `.env`

Buka file `.env`, lalu cari bagian database.

Contoh konfigurasi memakai MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=learning
DB_USERNAME=root
DB_PASSWORD=
```

Penjelasan singkat:

- `DB_CONNECTION=mysql` berarti project memakai database MySQL.
- `DB_HOST=127.0.0.1` berarti database ada di komputer sendiri.
- `DB_PORT=3306` adalah port default MySQL.
- `DB_DATABASE=learning` adalah nama database yang harus dibuat di MySQL.
- `DB_USERNAME=root` adalah username MySQL.
- `DB_PASSWORD=` dikosongkan jika MySQL tidak memakai password.

Jika password MySQL kamu ada, isi `DB_PASSWORD`.

Contoh:

```env
DB_PASSWORD=password_kamu
```

Jika kamu belum membuat database, buka MySQL lalu jalankan:

```sql
CREATE DATABASE learning;
```

Jika ingin memakai nama database lain, boleh. Tetapi nama di MySQL dan `.env` harus sama.

Contoh:

```sql
CREATE DATABASE manajemen_nilai;
```

Maka `.env` harus menjadi:

```env
DB_DATABASE=manajemen_nilai
```

Alternatif untuk belajar cepat: pakai SQLite.

SQLite lebih sederhana karena tidak perlu membuat database MySQL. Tetapi untuk kelas yang ingin belajar MySQL, tetap gunakan MySQL.

Jika ingin memakai SQLite:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

Lalu buat file database SQLite jika belum ada:

```bash
touch database/database.sqlite
```

Di Windows PowerShell:

```powershell
New-Item database/database.sqlite
```

Setelah mengubah `.env`, jalankan:

```bash
php artisan config:clear
```

Command ini memastikan Laravel membaca konfigurasi terbaru.

### 6. Buat application key

Application key adalah kunci rahasia Laravel untuk keamanan aplikasi, misalnya session dan enkripsi.

```bash
php artisan key:generate
```

Setelah command ini berhasil, `.env` akan memiliki nilai `APP_KEY`.

### 7. Jalankan migration dan seeder

Migration membuat tabel. Seeder mengisi data awal.

```bash
php artisan migrate --seed
```

Jika ingin reset database dari awal:

```bash
php artisan migrate:fresh --seed
```

Hati-hati: `migrate:fresh` menghapus isi tabel lama.

### 8. Jalankan frontend Vite

Buka terminal pertama:

```bash
npm run dev
```

### 9. Jalankan server Laravel

Buka terminal kedua:

```bash
php artisan serve
```

Biasanya aplikasi bisa dibuka di:

```text
http://127.0.0.1:8000
```

## Struktur Folder Yang Dipakai

Bagian ini menjelaskan file penting dengan bahasa sederhana.

### `routes/web.php`

Tempat mendaftarkan URL.

Contoh:

```php
Route::get('/student', [StudentController::class, 'index']);
```

Artinya: saat user membuka `/student`, Laravel menjalankan method `index` di `StudentController`.

### `app/Http/Controllers`

Tempat controller.

Controller mengatur:

- Data apa yang perlu diambil.
- Validasi input.
- View apa yang ditampilkan.
- Redirect ke halaman mana setelah data disimpan.

File utama project ini:

- `StudentController.php`
- `SubjectController.php`
- `ScoreController.php`

### `app/Models`

Tempat model.

Model mewakili tabel database:

- `Student.php` mewakili tabel `students`.
- `Subject.php` mewakili tabel `subjects`.
- `Score.php` mewakili tabel `scores`.

Model juga berisi relasi.

Contoh:

```php
public function scores(): HasMany
{
    return $this->hasMany(Score::class);
}
```

Artinya satu student bisa punya banyak score.

### `database/migrations`

Tempat rancangan tabel.

Contoh migration student membuat kolom:

- `id`
- `name`
- `nis`
- `birthDate`
- `gender`
- `created_at`
- `updated_at`

Migration penting:

- `create_students_table`
- `create_subjects_table`
- `create_scores_table`

### `resources/views`

Tempat tampilan HTML. Laravel memakai Blade, yaitu HTML yang bisa disisipi syntax PHP sederhana.

Contoh Blade:

```blade
{{ $student->name }}
```

Artinya menampilkan nama student.

Folder utama:

- `resources/views/pages/student`
- `resources/views/pages/subject`
- `resources/views/pages/score`

### `resources/views/components`

Tempat komponen view yang bisa dipakai ulang.

Contoh:

- `primary-button.blade.php`
- `secondary-button.blade.php`
- `text-input.blade.php`
- `input-label.blade.php`
- `input-error.blade.php`
- `table.blade.php`

Komponen membuat view lebih ringkas.

### `resources/views/layouts/navigation.blade.php`

Tempat menu navigasi.

Menu yang dipakai:

- Dashboard
- Student
- Subject
- Input Nilai

### `.env`

Tempat konfigurasi rahasia/lokal, seperti nama database dan password.

Jangan commit `.env` ke GitHub.

Yang biasanya diedit mahasiswa:

- `APP_NAME`: nama aplikasi.
- `APP_URL`: alamat aplikasi lokal, biasanya `http://127.0.0.1:8000`.
- `DB_CONNECTION`: jenis database, misalnya `mysql`.
- `DB_DATABASE`: nama database.
- `DB_USERNAME`: username database.
- `DB_PASSWORD`: password database.

Jika `.env` berubah tetapi aplikasi masih membaca konfigurasi lama, jalankan:

```bash
php artisan config:clear
```

### `composer.json`

Daftar dependency PHP.

Jika file ini berubah, biasanya jalankan:

```bash
composer install
```

### `package.json`

Daftar dependency frontend.

Jika file ini berubah, biasanya jalankan:

```bash
npm install
```

## Step by Step Membangun Project Sampai Level Ini

Bagian ini adalah urutan pengerjaan yang bisa diikuti mahasiswa.

Jika memakai branch `learning`, kerjakan TODO controller secara bertahap. Jangan langsung isi semuanya. Mulai dari Student dulu, lalu Subject, lalu Score.

Urutan latihan yang disarankan:

1. Lengkapi `StudentController@index`.
2. Lengkapi `StudentController@createView`.
3. Lengkapi `StudentController@createData`.
4. Lengkapi `StudentController@detailView`.
5. Lengkapi `StudentController@patchView`.
6. Lengkapi `StudentController@patchData`.
7. Lengkapi `StudentController@deleteData`.
8. Ulangi pola yang sama di `SubjectController`.
9. Setelah CRUD paham, lengkapi `ScoreController`.

Catatan: selama TODO belum diisi, beberapa halaman akan menampilkan error `501`. Itu normal untuk branch latihan.

### Step 1. Buat project Laravel

Jika mulai dari nol:

```bash
composer create-project laravel/laravel appsManajemenNilai
cd appsManajemenNilai
```

### Step 2. Install Breeze untuk login/register

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install
```

Setelah itu jalankan migration bawaan user:

```bash
php artisan migrate
```

### Step 3. Buat database project

Di MySQL:

```sql
CREATE DATABASE learning;
```

Atur `.env` agar Laravel tahu database mana yang dipakai.

### Step 4. Buat migration Student

Tujuan: membuat tabel `students`.

Perintah:

```bash
php artisan make:model Student -m
```

Isi kolom yang dibutuhkan:

- `name`
- `nis`
- `birthDate`
- `gender`

Contoh sederhana:

```php
$table->string('name');
$table->string('nis')->unique();
$table->date('birthDate')->nullable();
$table->enum('gender', ['male', 'female']);
```

Catatan: di project ini `gender` dibuat lewat migration tambahan agar mahasiswa melihat bahwa tabel bisa diubah setelah dibuat.

### Step 5. Buat migration Subject

Tujuan: membuat tabel `subjects`.

Perintah:

```bash
php artisan make:model Subject -m
```

Kolom:

- `name`

### Step 6. Buat migration Score

Tujuan: membuat tabel penghubung antara student dan subject.

Perintah:

```bash
php artisan make:model Score -m
```

Kolom:

- `score`
- `student_id`
- `subject_id`

Relasi sederhananya:

```text
students 1 ---- banyak scores
subjects 1 ---- banyak scores
```

Artinya:

- satu student bisa punya banyak nilai.
- satu subject bisa punya banyak nilai dari banyak student.

### Step 7. Jalankan migration

```bash
php artisan migrate
```

Kalau ada error, baca pesan error pelan-pelan. Biasanya masalahnya:

- MySQL belum hidup.
- Nama database di `.env` salah.
- Tabel sudah pernah dibuat.

### Step 8. Buat Model dan relasi

Di model, tulis field yang boleh diisi:

```php
#[Fillable('name', 'nis', 'gender', 'birthDate')]
class Student extends Model
{
}
```

Relasi student ke score:

```php
public function scores(): HasMany
{
    return $this->hasMany(Score::class);
}
```

Relasi score:

```php
public function student(): BelongsTo
{
    return $this->belongsTo(Student::class);
}
```

### Step 9. Buat Controller Student

Perintah:

```bash
php artisan make:controller StudentController
```

Method yang dibuat:

- `index`: menampilkan semua student.
- `createView`: menampilkan form tambah.
- `createData`: menyimpan student baru.
- `detailView`: menampilkan detail.
- `patchView`: menampilkan form edit.
- `patchData`: menyimpan perubahan.
- `deleteData`: menghapus student.

Pola umum:

```php
public function index()
{
    $students = Student::query()->latest()->get();

    return view('pages.student.student-list', [
        'students' => $students,
    ]);
}
```

### Step 10. Buat View Student

Folder:

```text
resources/views/pages/student
```

File:

- `student-list.blade.php`
- `student-create.blade.php`
- `student-detail.blade.php`
- `student-patch.blade.php`

Pola view list:

```blade
@foreach ($students as $student)
    {{ $student->name }}
@endforeach
```

### Step 11. Buat Route Student

Di `routes/web.php`:

```php
Route::prefix('student')->controller(StudentController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('student.list');
    Route::get('/create', 'createView')->name('student.create.view');
    Route::post('/create', 'createData')->name('student.create.data');
});
```

Setelah route dibuat, cek:

```bash
php artisan route:list
```

### Step 12. Ulangi pola untuk Subject

Subject lebih sederhana karena field hanya `name`.

Method controller:

- `index`
- `createView`
- `createData`
- `detailView`
- `patchView`
- `patchData`
- `deleteData`

View:

- `subject-list.blade.php`
- `subject-create.blade.php`
- `subject-detail.blade.php`
- `subject-patch.blade.php`

### Step 13. Buat fitur Input Nilai

Route:

```text
/scores
/scores/{studentId}
POST /scores/{studentId}/{subjectId}
```

Controller:

- `index`: tampilkan semua student dan progress nilai.
- `inputView`: tampilkan semua subject dan input score.
- `updateData`: simpan atau update score.

Logika progress:

```php
$student->scores->unique('subject_id')->count()
```

Artinya hitung berapa subject yang sudah punya score untuk student ini.

Logika update nilai:

```php
Score::query()->updateOrCreate(
    [
        'student_id' => $studentId,
        'subject_id' => $subjectId,
    ],
    [
        'score' => $validated['score'],
    ],
);
```

Artinya:

- Jika score untuk student dan subject itu belum ada, buat baru.
- Jika sudah ada, update nilainya.

### Step 14. Tambahkan menu navigasi

File:

```text
resources/views/layouts/navigation.blade.php
```

Tambahkan link ke route:

```blade
route('score.list')
```

### Step 15. Test fitur

Jalankan:

```bash
php artisan test
```

Di branch `learning`, test bisa gagal selama TODO belum selesai. Gunakan test sebagai target akhir: setelah mahasiswa mengisi semua TODO, test seharusnya kembali hijau.

Jalankan compile Blade:

```bash
php artisan view:cache
```

Jika route tidak muncul:

```bash
php artisan route:clear
php artisan route:list
```

## Cara Memahami CRUD

CRUD adalah singkatan dari:

- Create: tambah data.
- Read: lihat data.
- Update: ubah data.
- Delete: hapus data.

Di project ini:

### Student CRUD

Create:

- URL: `/student/create`
- Controller: `StudentController@createData`
- View: `student-create.blade.php`

Read:

- URL: `/student`
- Controller: `StudentController@index`
- View: `student-list.blade.php`

Update:

- URL: `/student/{nis}/update`
- Controller: `StudentController@patchData`
- View: `student-patch.blade.php`

Delete:

- URL: `POST /student/{id}`
- Controller: `StudentController@deleteData`

### Subject CRUD

Subject memakai pola yang sama, hanya field-nya lebih sedikit.

### Score

Score bukan CRUD penuh. Di sini hanya:

- Read daftar student dan subject.
- Update nilai.
- Tidak ada delete nilai.

## Latihan Untuk Mahasiswa

Kerjakan pelan-pelan. Jangan langsung copy semua.

### Latihan 1. Baca route

Buka:

```text
routes/web.php
```

Cari route:

```php
Route::prefix('student')
```

Jawab:

- URL apa saja yang tersedia untuk Student?
- Method controller apa yang dipanggil?
- Nama route-nya apa?

### Latihan 2. Baca controller

Buka:

```text
app/Http/Controllers/StudentController.php
```

Cari method:

```php
index()
```

Jawab:

- Data apa yang diambil?
- View apa yang dipanggil?
- Nama variable apa yang dikirim ke view?

### Latihan 3. Baca model

Buka:

```text
app/Models/Student.php
```

Jawab:

- Field apa saja yang boleh diisi?
- Relasi apa yang dimiliki Student?

### Latihan 4. Baca view

Buka:

```text
resources/views/pages/student/student-list.blade.php
```

Jawab:

- Di bagian mana data student di-loop?
- Tombol create menuju route apa?
- Tombol edit menuju route apa?

### Latihan 5. Ubah fitur kecil

Tambahkan kolom `address` ke Student.

Urutan:

1. Buat migration baru untuk menambahkan `address`.
2. Tambahkan `address` ke model Student.
3. Tambahkan input address di form create.
4. Tambahkan input address di form edit.
5. Simpan address di controller.
6. Tampilkan address di list/detail.

## Checklist Saat Mengerjakan

Gunakan checklist ini supaya tidak tersesat.

- Sudah buat migration?
- Sudah jalankan `php artisan migrate`?
- Sudah buat model?
- Sudah isi `Fillable`?
- Sudah buat controller?
- Sudah buat view?
- Sudah daftarkan route?
- Sudah tambahkan menu navigasi jika perlu?
- Sudah cek `php artisan route:list`?
- Sudah test manual lewat browser?
- Sudah jalankan `php artisan test`?

## Masalah Umum

### Error: database tidak bisa connect

Cek:

- File `.env` sudah dibuat dari `.env.example`?
- MySQL sudah hidup?
- Nama database di `.env` benar?
- Username/password benar?
- Sudah buat database?
- Sudah jalankan `php artisan config:clear` setelah mengubah `.env`?

### Error: route tidak ditemukan

Jalankan:

```bash
php artisan route:list
php artisan route:clear
```

### Error: view lama masih muncul

Jalankan:

```bash
php artisan view:clear
```

### Error setelah mengubah `.env`

Jalankan:

```bash
php artisan config:clear
```

### Halaman tidak punya styling

Pastikan terminal frontend jalan:

```bash
npm run dev
```

## Urutan Membaca File Untuk Pemula

Jika baru pertama kali membuka project, baca dengan urutan ini:

1. `README.md`
2. `routes/web.php`
3. `database/migrations/2026_05_31_063039_create_students_table.php`
4. `app/Models/Student.php`
5. `app/Http/Controllers/StudentController.php`
6. `resources/views/pages/student/student-list.blade.php`
7. `resources/views/pages/student/student-create.blade.php`
8. `resources/views/pages/subject/subject-list.blade.php`
9. `app/Http/Controllers/ScoreController.php`
10. `resources/views/pages/score/score-list.blade.php`
11. `resources/views/pages/score/score-input.blade.php`

## Peta Fitur

```text
Student
  Migration -> Model -> Controller -> View -> Route -> Navigation

Subject
  Migration -> Model -> Controller -> View -> Route -> Navigation

Input Nilai
  Student + Subject + Score
  -> ScoreController
  -> score-list.blade.php
  -> score-input.blade.php
```

## Catatan Untuk Pengajar

Branch `learning` sengaja berisi komentar `HINT BELAJAR`.

Cara mengajar yang disarankan:

1. Tunjukkan hasil final dulu di browser.
2. Buka `routes/web.php` agar mahasiswa tahu pintu masuk aplikasi.
3. Ikuti satu fitur saja, misalnya Student.
4. Setelah Student paham, ulangi pola untuk Subject.
5. Setelah CRUD paham, baru jelaskan Score sebagai relasi antar tabel.
6. Minta mahasiswa membuat satu field baru, misalnya `address`, agar mereka latihan migration sampai view.

Ingat: mahasiswa tidak harus langsung paham semua. Yang penting mereka paham pola:

```text
Route -> Controller -> Model -> View
```

Jika pola ini sudah masuk, Laravel akan terasa jauh lebih ramah.
