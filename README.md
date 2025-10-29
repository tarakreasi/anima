# Proyek Anima - Sistem Manajemen Mahasiswa

Proyek ini adalah aplikasi web yang dibangun dengan Laravel untuk mengelola data mahasiswa. Aplikasi ini berfungsi sebagai contoh implementasi operasi CRUD (Create, Read, Update, Delete) dan sistem autentikasi pengguna dalam framework Laravel.

Aplikasi ini ditujukan untuk tugas kuliah, menunjukkan pemahaman tentang konsep dasar pengembangan web dengan Laravel, termasuk routing, controller, model, view, migrasi database, dan pengujian otomatis.

## Fitur Utama

- **Autentikasi Pengguna:**
  - Registrasi Pengguna
  - Login Pengguna
  - Logout Pengguna
  - Verifikasi Email (opsional, logika sudah ada)
- **Manajemen Data Mahasiswa (CRUD):**
  - Menampilkan daftar semua mahasiswa.
  - Menambahkan data mahasiswa baru.
  - Mengubah informasi mahasiswa yang sudah ada.
  - Menghapus data mahasiswa.

## Prasyarat Teknologi

- PHP 8.3 atau lebih tinggi
- Composer
- Node.js & NPM
- Database (Aplikasi ini dikonfigurasi untuk menggunakan SQLite untuk kemudahan, tetapi dapat dengan mudah diubah ke MySQL atau PostgreSQL)

## Panduan Instalasi dan Setup

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan pengembangan lokal.

### 1. Clone Repositori

```bash
git clone https://github.com/username/nama-repositori.git
cd nama-repositori
```

### 2. Instal Dependensi

Instal semua dependensi PHP (via Composer) dan JavaScript (via NPM).

```bash
composer install
npm install
```

### 3. Konfigurasi Lingkungan

Salin file konfigurasi lingkungan dan buat kunci aplikasi.

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database

Secara default, aplikasi ini menggunakan **SQLite**. Untuk memulai, cukup buat file database kosong.

```bash
touch database/database.sqlite
```

Setelah itu, jalankan migrasi untuk membuat semua tabel yang diperlukan.

```bash
php artisan migrate
```

### 5. Build Aset Frontend

Kompilasi file CSS dan JavaScript menggunakan Vite.

```bash
npm run build
```

### 6. Jalankan Server Pengembangan

Sekarang Anda bisa menjalankan server pengembangan lokal Laravel.

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://127.0.0.1:8000`.

## Menjalankan Pengujian

Proyek ini dilengkapi dengan serangkaian pengujian otomatis untuk memastikan semua fungsionalitas berjalan dengan benar.

Untuk menjalankan seluruh suite pengujian, gunakan perintah berikut:

```bash
php artisan test
```

Ini akan menjalankan semua pengujian fitur untuk Autentikasi dan CRUD Mahasiswa, memastikan bahwa endpoint, interaksi database, dan logika bisnis berfungsi seperti yang diharapkan.
