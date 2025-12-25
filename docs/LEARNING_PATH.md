# Tips Belajar Lanjutan

Selamat! Jika Anda sudah memahami cara kerja ANIMA, berarti Anda sudah menguasai dasar-dasar Laravel. Apa langkah selanjutnya agar jago?

## 1. Pelajari Eloquent Relationship
Di project ini, tabel Mahasiswa berdiri sendiri. Di dunia nyata, tabel saling berhubungan.
-   One to One: Satu Mahasiswa punya Satu KTM.
-   One to Many: Satu Dosen membimbing Banyak Mahasiswa.
-   Many to Many: Banyak Mahasiswa mengambil Banyak Mata Kuliah.

## 2. Pelajari Middleware Lebih Dalam
Saat ini kita pakai middleware auth bawaan untuk mengecek login.
-   Coba buat middleware checkRole agar halaman tertentu hanya bisa diakses oleh Admin, dan Mahasiswa biasa tidak bisa masuk.

## 3. Pelajari API (Application Programming Interface)
Bagaimana jika ANIMA ingin dibuatkan aplikasi Android/iOS-nya?
-   Anda perlu mengubah Controller agar tidak mengembalikan view(), melainkan response()->json().
-   Pelajari Laravel Sanctum untuk otentikasi API.

## 4. Frontend Modern (Vue / React)
Saat ini kita pakai Blade (server-side rendering).
-   Cobalah Inertia.js. Ini jembatan ajaib yang memungkinkan Anda membangun frontend pakai Vue.js/React tapi tetap serasa ngoding pakai Controller & Route Laravel biasa.

## 5. Deployment
Aplikasi belum berguna kalau cuma ada di laptop sendiri.
-   Belajar cara upload Laravel ke hosting (cPanel) atau VPS.
-   Pahami cara setting .env di production agar aman.

---
Tetap semangat! Error adalah guru terbaik.
