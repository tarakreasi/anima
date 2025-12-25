<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('/register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

Route::get('/actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/mahasiswa/tampil', [MahasiswaController::class, 'index'])->name('mahasiswa.index')->middleware('auth');
Route::get('/mahasiswa/tambah', [MahasiswaController::class, 'create'])->name('mahasiswa.create')->middleware('auth');
Route::post('/mahasiswa/simpan', [MahasiswaController::class, 'store'])->name('mahasiswa.store')->middleware('auth');
Route::get('/mahasiswa/ubah/{id_mahasiswa}',[MahasiswaController::class,'edit'])->name('mahasiswa.edit')->middleware('auth');
Route::post('/mahasiswa/update', [MahasiswaController::class, 'update'])->name('mahasiswa.update')->middleware('auth');
Route::get('/mahasiswa/hapus/{id_mahasiswa}',[MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy')->middleware('auth');

Route::get('/export/csv', [ExportController::class, 'exportCsv'])->name('export.csv')->middleware('auth');
Route::get('/export/print', [ExportController::class, 'printPdf'])->name('export.print')->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');