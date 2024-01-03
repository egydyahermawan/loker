<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingController;

// Auth
Route::get('/perusahaan/login', [AuthController::class, 'login_perusahaan_page'])->name('login_perusahaan_page');
Route::get('/admin/login', [AuthController::class, 'login_admin_page']);
Route::get('/perusahaan/register', [AuthController::class, 'register_page']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Akun
Route::get('/akun/approval', [UserController::class, 'approval_akun_page'])->name('approval_akun_page');
Route::get('/akun/daftar', [UserController::class, 'daftar_akun_page'])->name('daftar_akun_page');
Route::post('/akun/reject', [UserController::class, 'reject_akun'])->name('reject_akun');
Route::post('/akun/approve', [UserController::class, 'approve_akun'])->name('approve_akun');
Route::post('/akun/deactivate', [UserController::class, 'deactivate']);
Route::post('/akun/activate', [UserController::class, 'activate']);
Route::post('/akun/delete', [UserController::class, 'delete']);

// Lowongan
Route::get('/lowongan', [LowonganController::class, 'lowongan_page'])->name('lowongan_page');
Route::get('/lowongan/buka', [LowonganController::class, 'buka_lowongan_page'])->name('buka_lowongan_page');
Route::get('/lowongan/edit/{id}', [LowonganController::class, 'edit_lowongan_page'])->name('edit_lowongan_page');
Route::post('/lowongan/tambah', [LowonganController::class, 'tambah']);
Route::post('/lowongan/hapus/{id}', [LowonganController::class, 'delete'])->name('hapus_lowongan');
Route::post('/lowongan/update', [LowonganController::class, 'update'])->name('update_lowongan');

// Berita
Route::get('/berita', [BlogController::class, 'index'])->name('berita_page');
Route::get('/berita/tambah', [BlogController::class, 'tambah_page'])->name('tambah_berita_page');
Route::post('/berita/tambah', [BlogController::class, 'create']);
Route::get('/berita/edit/{id}', [BlogController::class, 'edit_page'])->name('edit_page');
Route::post('/berita/update', [BlogController::class, 'update']);
Route::post('/berita/delete/{id}', [BlogController::class, 'destroy']);

// Before Login
Route::get('/', [LandingController::class, 'landing'])->name('landing');
Route::get('/lowonganlanding', [LandingController::class, 'lowonganlanding'])->name('lowonganlanding');
Route::get('/newslanding', [LandingController::class, 'newslanding'])->name('newslanding');
Route::get('/contactlanding', [LandingController::class, 'contactlanding'])->name('contactlanding');

//detail
Route::get('/detaillowongan', [LandingController::class, 'detaillowongan'])->name('detaillowongan');
Route::get('/detailnews', [LandingController::class, 'detailnews'])->name('detailnews');

