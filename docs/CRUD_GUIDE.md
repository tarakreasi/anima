# Panduan Alur CRUD (Create, Read, Update, Delete)

Di sini kita akan membedah bagaimana fitur "Tambah Mahasiswa" bekerja dari awal sampai data tersimpan. Ini adalah siklus hidup request di Laravel.

## Studi Kasus: Menambah Data Mahasiswa

### Langkah 1: User Membuka Form (Route -> Controller -> View)
1.  User akses URL /mahasiswa/tambah.
2.  Route (routes/web.php) melihat request ini dan memanggil MahasiswaController@create.
3.  Controller (App\Http\Controllers\MahasiswaController.php) method create() hanya bertugas menampilkan halaman form:
    ```php
    public function create() {
        return view('tambahmahasiswa');
    }
    ```
4.  View (resources/views/tambahmahasiswa.blade.php) dirender dan tampil di browser user.

### Langkah 2: User Mengisi & Submit Form (View -> Route -> Controller)
1.  User mengisi nama, alamat, dll, lalu klik tombol Simpan.
2.  Form HTML mengirim data via method POST ke url /mahasiswa/simpan.
    ```html
    <form action="{{ route('mahasiswa.store') }}" method="POST">
    ```
3.  Route mengarahkan request POST ini ke MahasiswaController@store.

### Langkah 3: Controller Memproses Data (Controller -> Model -> Database)
Di sinilah logika utama terjadi di dalam method store():

1.  Validasi: Controller mengecek apakah data sudah lengkap dan benar.
    ```php
    $validated = $request->validate([...]);
    ```
    Jika salah, Laravel otomatis mengembalikan user ke form dengan pesan error.

2.  Simpan ke Database: Controller memanggil Model untuk membuat baris data baru.
    ```php
    MahasiswaModel::create($validated);
    ```

### Langkah 4: Respon Balik (Controller -> View)
1.  Setelah sukses, Controller memberi pesan sukses (flash message) dan mengalihkan user ke halaman daftar utama.
    ```php
    session()->flash('success', 'Data berhasil!');
    return redirect()->route('mahasiswa.index');
    ```

---

## Pola yang Sama untuk Fitur Lain
Pola Route -> Controller -> Model -> View ini berulang untuk fitur lain:
-   Edit: Controller ambil data lama dari Model -> Tampilkan di Form -> User ubah -> Controller update via Model.
-   Hapus: Controller cari data via Model -> Model delete data -> Controller kembalikan ke daftar.
