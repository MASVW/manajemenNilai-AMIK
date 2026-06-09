# Manajemen Nilai AMIK

Ini adalah project Laravel sederhana untuk belajar membuat aplikasi manajemen nilai.

Branch yang tersedia:

- `master`: project final yang sudah selesai.
- `learning`: project latihan. Mahasiswa mengisi TODO sampai aplikasi berjalan seperti branch `master`.

README di branch `master` ini fokus pada instalasi program, clone project, setup `.env`, dan cara masuk ke branch belajar.

## Gambaran Singkat Project

Fitur final project:

- Login dan register.
- CRUD Student.
- CRUD Subject.
- Input nilai Student per Subject.
- Progress nilai, contoh `6/7`.

Alur belajar utama ada di branch `learning`.

## Program Yang Harus Diinstall

Mayoritas panduan ini memakai Windows dan XAMPP.

Program yang dibutuhkan:

- Git
- XAMPP
- Composer
- Node.js dan npm
- Code editor, disarankan Visual Studio Code

## Step 1. Install Git

Git dipakai untuk mengambil project dari GitHub dan berpindah branch.

Download:

```text
https://git-scm.com/downloads
```

Install seperti biasa. Untuk pemula, pilihan default installer biasanya cukup.

Setelah selesai, buka Command Prompt atau PowerShell, lalu cek:

```bash
git --version
```

Jika muncul versi Git, berarti Git sudah terinstall.

Atur nama dan email Git:

```bash
git config --global user.name "Nama Kamu"
git config --global user.email "emailkamu@example.com"
```

## Step 2. Install XAMPP

XAMPP dipakai agar mahasiswa mendapat Apache, MySQL, dan PHP dalam satu paket.

Download:

```text
https://www.apachefriends.org/download.html
```

Install XAMPP. Biasanya lokasi instalasi:

```text
C:\xampp
```

Setelah install:

1. Buka XAMPP Control Panel.
2. Klik `Start` pada Apache.
3. Klik `Start` pada MySQL.

Jika Apache atau MySQL hijau, berarti service sudah berjalan.

## Step 3. Daftarkan PHP XAMPP ke PATH Windows

Ini bagian penting.

Node.js biasanya otomatis terdaftar di terminal setelah install. PHP dari XAMPP sering belum otomatis terbaca oleh terminal. Karena itu kita perlu menambahkan folder PHP XAMPP ke Environment Variable `Path`.

Lokasi PHP XAMPP biasanya:

```text
C:\xampp\php
```

Cara menambahkan ke PATH:

1. Tekan tombol Windows.
2. Cari `Environment Variables`.
3. Pilih `Edit the system environment variables`.
4. Klik tombol `Environment Variables`.
5. Di bagian `System variables`, cari `Path`.
6. Klik `Edit`.
7. Klik `New`.
8. Masukkan:

```text
C:\xampp\php
```

9. Klik `OK` sampai semua jendela tertutup.
10. Tutup terminal yang lama.
11. Buka terminal baru.

Cek PHP:

```bash
php -v
```

Jika muncul versi PHP, berarti PHP sudah terbaca.

Jika belum terbaca:

- Pastikan path benar: `C:\xampp\php`.
- Tutup dan buka ulang terminal.
- Restart laptop jika perlu.

## Step 4. Install Composer

Composer adalah package manager PHP. Laravel membutuhkan Composer untuk menginstall dependency dari `composer.json`.

Download:

```text
https://getcomposer.org/download/
```

Saat install Composer di Windows:

- Jika diminta lokasi PHP, arahkan ke:

```text
C:\xampp\php\php.exe
```

Setelah selesai, buka terminal baru dan cek:

```bash
composer -V
```

Jika muncul versi Composer, berarti Composer siap dipakai.

## Step 5. Install Node.js dan npm

Node.js dipakai untuk menjalankan frontend tool Laravel. npm biasanya otomatis ikut terinstall bersama Node.js.

Download:

```text
https://nodejs.org/en/download
```

Pilih versi LTS jika tersedia.

Setelah install, buka terminal baru dan cek:

```bash
node -v
npm -v
```

Jika keduanya muncul versi, berarti Node.js dan npm siap.

## Step 6. Install Visual Studio Code

Visual Studio Code dipakai untuk membuka dan mengedit file project.

Download:

```text
https://code.visualstudio.com/
```

Extension yang disarankan:

- PHP Intelephense
- Laravel Blade Snippets
- Laravel Extra Intellisense

Extension tidak wajib, tetapi membantu membaca kode.

## Step 7. Clone Project Dari GitHub

Buka folder tempat kamu ingin menyimpan project.

Contoh:

```bash
cd Documents
```

Clone project:

```bash
git clone https://github.com/MASVW/manajemenNilai-AMIK.git
```

Masuk ke folder project:

```bash
cd manajemenNilai-AMIK
```

Cek branch:

```bash
git branch
```

Jika baru clone, biasanya kamu berada di branch `master`.

Branch aktif ditandai dengan tanda `*`.

Contoh:

```text
* master
```

## Step 8. Install Dependency Project

Install dependency Laravel:

```bash
composer install
```

Install dependency frontend:

```bash
npm install
```

Jika ada error, baca pesan errornya. Error paling umum:

- PHP belum terbaca di terminal.
- Composer belum terinstall.
- Internet tidak stabil.
- Node.js belum terinstall.

## Step 9. Copy `.env.example` Menjadi `.env`

File `.env.example` adalah contoh konfigurasi.

File `.env` adalah konfigurasi asli di laptop masing-masing.

Jangan upload `.env` ke GitHub.

Untuk Windows Command Prompt:

```bat
copy .env.example .env
```

Untuk Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Setelah itu, pastikan file `.env` muncul di folder project.

## Step 10. Atur `.env`

Buka file `.env`.

Pastikan bagian database seperti ini jika memakai XAMPP:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=manajemen_nilai_amik
DB_USERNAME=root
DB_PASSWORD=
```

Penjelasan:

- `DB_CONNECTION=mysql`: memakai MySQL.
- `DB_HOST=127.0.0.1`: MySQL ada di laptop sendiri.
- `DB_PORT=3306`: port default MySQL.
- `DB_DATABASE=manajemen_nilai_amik`: nama database.
- `DB_USERNAME=root`: username default XAMPP.
- `DB_PASSWORD=`: password default XAMPP biasanya kosong.

Jika MySQL kamu memakai password, isi:

```env
DB_PASSWORD=password_kamu
```

Setelah mengubah `.env`, jalankan:

```bash
php artisan config:clear
```

## Step 11. Buat Application Key

Laravel membutuhkan application key untuk keamanan aplikasi.

Jalankan:

```bash
php artisan key:generate
```

Setelah berhasil, `.env` akan terisi bagian `APP_KEY`.

## Step 12. Jalankan Migration

Pastikan MySQL di XAMPP sudah `Start`.

Jalankan:

```bash
php artisan migrate --seed
```

Jika Laravel mendeteksi database belum ada, Laravel dapat menanyakan apakah database ingin dibuat.

Jika muncul pertanyaan seperti itu, jawab `yes`.

Catatan:

- Tidak perlu menulis query SQL manual untuk membuat database.
- Jika prompt tidak muncul dan migrate gagal, cek kembali nama database, MySQL XAMPP, username, dan password di `.env`.

Jika ingin mengulang database dari awal:

```bash
php artisan migrate:fresh --seed
```

Hati-hati: command ini menghapus data lama lalu membuat ulang tabel.

## Step 13. Jalankan Aplikasi

Buka terminal pertama:

```bash
npm run dev
```

Buka terminal kedua:

```bash
php artisan serve
```

Buka browser:

```text
http://127.0.0.1:8000
```

Register user baru, lalu login.

## Step 14. Masuk Ke Branch Learning

Branch `master` adalah jawaban final.

Untuk mulai belajar, pindah ke branch `learning`:

```bash
git switch learning
```

Jika branch `learning` belum ada di lokal, jalankan:

```bash
git fetch origin
git switch learning
```

Jika masih gagal, coba:

```bash
git switch -c learning origin/learning
```

Setelah berada di branch `learning`, buka README di branch tersebut.

README branch `learning` akan mengarahkan file mana yang harus dibuka dan bagian TODO mana yang harus diisi.

## Cara Melihat Branch Aktif

Jalankan:

```bash
git branch
```

Contoh:

```text
* learning
  master
```

Artinya kamu sedang berada di branch `learning`.

## Cara Membandingkan Dengan Jawaban Final

Jika sedang di `learning` dan bingung:

1. Catat nama file yang membingungkan.
2. Pindah ke branch `master`.
3. Buka file yang sama.
4. Pelajari versi finalnya.
5. Kembali ke `learning`.
6. Tulis ulang sesuai pemahaman.

Perintah:

```bash
git switch master
git switch learning
```

Jangan menjalankan `git branch -M master` saat sedang di branch `learning`. Perintah itu mengganti nama branch aktif menjadi `master`, dan bisa membuat branch menjadi membingungkan.

## Command Harian Yang Sering Dipakai

Cek status file:

```bash
git status
```

Cek branch:

```bash
git branch
```

Pindah branch:

```bash
git switch nama_branch
```

Lihat route Laravel:

```bash
php artisan route:list
```

Clear config setelah edit `.env`:

```bash
php artisan config:clear
```

Clear view jika tampilan terasa tidak berubah:

```bash
php artisan view:clear
```

Jalankan test:

```bash
php artisan test
```

## Masalah Umum

### `php` tidak dikenal di terminal

Kemungkinan folder PHP XAMPP belum masuk PATH.

Pastikan `C:\xampp\php` sudah ditambahkan ke Environment Variable `Path`, lalu buka terminal baru.

### `composer` tidak dikenal di terminal

Composer belum terinstall atau terminal belum dibuka ulang.

Install Composer lagi dan pastikan Composer diarahkan ke `C:\xampp\php\php.exe`.

### `npm` tidak dikenal di terminal

Node.js belum terinstall atau terminal belum dibuka ulang.

Install Node.js versi LTS, lalu buka terminal baru.

### `php artisan migrate` gagal konek database

Cek:

- MySQL di XAMPP sudah `Start`.
- `.env` sudah benar.
- `DB_HOST=127.0.0.1`.
- `DB_PORT=3306`.
- `DB_USERNAME=root`.
- `DB_PASSWORD=` kosong jika XAMPP tidak memakai password.
- Sudah menjalankan `php artisan config:clear`.

### Halaman tidak punya styling

Pastikan terminal frontend masih berjalan:

```bash
npm run dev
```

### Route Student atau Subject tidak muncul

Pastikan sedang di branch yang benar.

Di `master`, route final sudah ada.

Di `learning`, beberapa route memang harus dilengkapi mahasiswa.

## Setelah Setup Selesai

Jika semua program sudah terinstall dan project bisa berjalan, lanjut belajar di branch `learning`:

```bash
git switch learning
```

Buka README branch `learning`, lalu ikuti instruksi pengembangan project dari route sampai view.
