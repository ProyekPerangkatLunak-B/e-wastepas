<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manajemen\RegistrasiController; // Mengganti dengan RegistrasiController

// Route untuk halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan halaman forgot password
Route::get('forgot-password', [RegistrasiController::class, 'showLinkRequestForm'])->name('password.request');

// Route untuk menangani pengiriman email reset password
Route::post('forgot-password', [RegistrasiController::class, 'sendResetLinkEmail'])->name('password.email');

// Route untuk halaman konfirmasi setelah mengirim reset password
Route::get('check-email', function () {
    return view('manajemen.registrasi.check-email'); // Mengarah ke folder registrasi
})->name('password.check-email');

// Route untuk menampilkan halaman reset password
Route::get('reset-password/{token}', function ($token) {
    return view('manajemen.registrasi.reset-password', ['token' => $token]); // Mengarah ke folder registrasi
})->name('password.reset');

// Route untuk menangani permintaan reset password setelah form dikirim
Route::post('reset-password', [RegistrasiController::class, 'reset'])->name('password.update');
