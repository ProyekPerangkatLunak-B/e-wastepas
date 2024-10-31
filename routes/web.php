<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manajemen\RegistrasiController; 
use App\Http\Controllers\MitraKurir\RegistrasiController;
use App\Http\Controllers\MitraKurir\PenjemputanSampahController;

// Route untuk halaman utama (welcome)
Route::get('/', function () {
    return view('app');
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

// Route Modul Admin, datamaster dan penjemputan-sampah
Route::get('admin/datamaster/masyarakat', function () {
    return view('admin.datamaster.masyarakat.index');
})->name('admin.datamaster.masyarakat.index');

Route::get('admin/datamaster/kurir', function () {
    return view('admin.datamaster.kurir.index');
})->name('admin.datamaster.kurir.index');

Route::get('admin/datamaster/dashboard', function () {
    return view('admin.datamaster.dashboard.index');
})->name('admin.datamaster.dashboard.index');

Route::get('admin/login', function () {
    return view('admin.datamaster.login.index');
})->name('admin.login.index');

// Route Modul Manajemen, registrasi dan dashboard
Route::get('manajemen/datamaster/dashboard', function () {
    return view('manajemen.datamaster.dashboard.index');
})->name('manajemen.datamaster.dashboard.index');

// Route Modul Masyarakat, registrasi dan penjemputan-sampah
Route::group([
    'prefix' => 'masyarakat/',
    'as' => 'masyarakat.',
], function () {
    // Modul Registrasi

    // Modul Penjemputan Sampah
    Route::get('penjemputan-sampah', [PenjemputanSampahController::class, 'index'])->name('penjemputan.index');
    Route::get('penjemputan-sampah/kategori', [PenjemputanSampahController::class, 'kategori'])->name('penjemputan.kategori');
    Route::get('penjemputan-sampah/permintaan-penjemputan', [PenjemputanSampahController::class, 'permintaan'])->name('penjemputan.permintaan');
    Route::get('penjemputan-sampah/melacak-penjemputan', [PenjemputanSampahController::class, 'melacak'])->name('penjemputan.melacak');
    Route::get('penjemputan-sampah/detail-kategori', [PenjemputanSampahController::class, 'detailKategori'])->name('penjemputan.detail');
    Route::get('penjemputan-sampah/detail-melacak', [PenjemputanSampahController::class, 'detailMelacak'])->name('penjemputan.detail-melacak');
});


Route::get('/masyarakat/login', function () {
    return view('masyarakat.registrasi.login');
})->name('masyarakat.login');

Route::get('/masyarakat/register', function () {
    return view('masyarakat.registrasi.register');
})->name('masyarakat.register');

// Route Modul Mitra-kurir, registrasi dan penjemputan-sampah

Route::get('mitrakurir/penjemputan-sampah/kategori', function () {
    return view('mitra-kurir.penjemputan-sampah.kategori');
})->name('mitra-kurir.penjemputan.kategori');

Route::get('mitrakurir/penjemputan-sampah/kategori/detail', function () {
    return view('mitra-kurir.penjemputan-sampah.detail-kategori', [
        "namaKategori" => "Layar dan Monitor",
    ]);
})->name('mitra-kurir.penjemputan.detail-kategori');


// route mitra kurir registrasi

Route::get('/mitra-kurir/registrasi/register', [RegistrasiController::class, 'index'] )->name('mitra-kurir.registrasi.register');
Route::get('/mitra-kurir/registrasi/login', [RegistrasiController::class, 'loginIndex'] )->name('mitra-kurir.registrasi.login');


Route::post('/mitra-kurir/registrasi/register', [RegistrasiController::class, 'simpanData']);

Route::get('/otp', function () {
    return view('mitra-kurir/registrasi/otp');
});
