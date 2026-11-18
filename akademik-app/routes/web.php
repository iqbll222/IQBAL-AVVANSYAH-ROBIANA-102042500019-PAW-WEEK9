<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('halaman', ['judul' => 'Dashboard']))->name('dashboard');
    Route::get('/materi', fn () => view('halaman', ['judul' => 'Lihat Materi']));
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', fn () => view('halaman', ['judul' => 'Halaman Admin']));
    Route::get('/pengguna', fn () => view('halaman', ['judul' => 'Manajemen Pengguna']));
});

Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen', fn () => view('halaman', ['judul' => 'Dashboard Dosen']));
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa', fn () => view('halaman', ['judul' => 'Dashboard Mahasiswa']));
});

Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('/kelola-materi', fn () => view('halaman', ['judul' => 'Kelola Materi']));
    Route::get('/kelola-nilai', fn () => view('halaman', ['judul' => 'Kelola Nilai']));
});

Route::middleware(['auth', 'role:admin,mahasiswa'])->group(function () {
    Route::get('/nilai-saya', fn () => view('halaman', ['judul' => 'Nilai Saya']));
});