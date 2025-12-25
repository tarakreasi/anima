# Struktur Folder & Konsep MVC

Dokumen ini menjelaskan bagaimana file-file di ANIMA project diorganisir. Memahami struktur ini penting agar Anda tidak bingung mencari dimana kode ditulis.

Laravel menggunakan pola desain MVC (Model - View - Controller). Mari kita bedah satu per satu:

## 1. Model (M) - Otak Database
Lokasi: app/Models/

Model bertugas mengurus segala sesuatu yang berhubungan dengan Database.
-   File Penting: MahasiswaModel.php
-   Fungsinya: Mendefinisikan tabel mana yang dipakai (mahasiswa), kolom apa saja yang boleh diisi (fillable), dan relasi antar tabel.

## 2. View (V) - Wajah Aplikasi
Lokasi: resources/views/

View adalah apa yang dilihat oleh pengguna di layar browser (HTML & CSS). Laravel menggunakan mesin template bernama Blade (.blade.php).
-   master.blade.php: File layout utama (header, sidebar, footer) yang dipakai berulang-ulang.
-   tampilmahasiswa.blade.php: Halaman untuk menampilkan tabel data.
-   tambahmahasiswa.blade.php: Halaman form input data.

## 3. Controller (C) - Pengatur Lalu Lintas
Lokasi: app/Http/Controllers/

Controller adalah penghubung antara Model dan View. Ketika Anda klik tombol, Controller-lah yang bekerja.
-   File Penting: MahasiswaController.php
-   Fungsinya:
    -   Menerima input dari View.
    -   Meminta Model untuk simpan/ambil data.
    -   Mengembalikan hasilnya kembali ke View.

---

## Folder Penting Lainnya

### routes/web.php
Ini adalah peta jalan aplikasi Anda. Di sini kita mendaftarkan semua alamat URL (seperti /mahasiswa, /login) dan menentukan Controller mana yang akan menanganinya.

### database/migrations/
Ini adalah cetak biru database. Daripada membuat tabel manual di phpMyAdmin, kita menulis kodenya di sini agar bisa dijalankan di komputer teman lain dengan mudah.

### public/
Tempat menyimpan file yang bisa diakses publik secara langsung, seperti gambar, CSS hasil compile, dan JavaScript.
