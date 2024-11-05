<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manajemen\RegistrasiController;
use App\Http\Controllers\Manajemen\LoginController;

// Route untuk halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan halaman login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Route untuk proses login
Route::post('login', [LoginController::class, 'login']);

// Route untuk logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk menampilkan halaman lupa password
Route::get('forgot-password', [RegistrasiController::class, 'showLinkRequestForm'])->name('password.request');

// Route untuk menangani pengiriman email reset password
Route::post('forgot-password', [RegistrasiController::class, 'sendResetLinkEmail'])->name('password.email');

// Route untuk halaman konfirmasi setelah pengiriman link reset password
Route::get('check-email', function () {
    return view('manajemen.registrasi.check-email'); // View untuk konfirmasi check email
})->name('password.check-email');

// Route untuk menampilkan halaman OTP
Route::get('/confirm-account', function () {
    return view('manajemen.registrasi.confirm-account');
})->name('confirm-account');

// Route untuk menampilkan halaman reset password (dengan token)
Route::get('reset-password/{token}', function ($token) {
    return view('manajemen.registrasi.reset-password', ['token' => $token]); // View untuk reset password
})->name('password.reset');

// Route untuk menangani permintaan reset password setelah form dikirim
Route::post('reset-password', [RegistrasiController::class, 'reset'])->name('password.update');

// Route untuk halaman dashboard setelah login (dengan middleware auth)
Route::get('/dashboard', function () {
    return view('manajemen.dashboard'); // Pastikan view dashboard tersedia di folder yang sesuai
})->middleware('auth');

// Route untuk menampilkan halaman registrasi
Route::get('register', function () {
    return view('manajemen.registrasi.register'); // View untuk registrasi pengguna baru
})->name('register');

// Route untuk menangani proses registrasi (jika memerlukan controller)
Route::post('register', [RegistrasiController::class, 'register']);

// Route untuk menampilkan halaman konfirmasi akun (untuk verifikasi kode OTP atau email)
Route::get('confirm-account', function () {
    return view('manajemen.registrasi.confirm-account'); // View untuk memasukkan kode verifikasi
})->name('confirm-account');

// Route untuk menampilkan halaman konfirmasi berhasil
Route::get('confirmation-success', function () {
    return view('manajemen.registrasi.confirmation-success'); // View untuk konfirmasi berhasil
})->name('confirmation-success');
