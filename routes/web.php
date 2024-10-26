<?php

use App\Http\Controllers\MitraKurir\RegistrasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

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

// Route Modul Masyarakat, registrasi dan penjemputan-sampah
Route::get('masyarakat/penjemputan-sampah', function () {
    return view('masyarakat.penjemputan-sampah.index');
})->name('masyarakat.penjemputan.index');

Route::get('masyarakat/penjemputan-sampah/kategori', function () {
    return view('masyarakat.penjemputan-sampah.kategori');
})->name('masyarakat.penjemputan.kategori');

Route::get('masyarakat/penjemputan-sampah/permintaan-penjemputan', function () {
    return view('masyarakat.penjemputan-sampah.permintaan-penjemputan');
})->name('masyarakat.penjemputan.permintaan');

Route::get('masyarakat/penjemputan-sampah/melacak-penjemputan', function () {
    return view('masyarakat.penjemputan-sampah.melacak-penjemputan');
})->name('masyarakat.penjemputan.melacak');

Route::get('/registrasi/login', function () {
    return view('masyarakat.registrasi.login');
})->name('registrasi.login');

Route::get('/registrasi/register', function () {
    return view('masyarakat.registrasi.register');
})->name('registrasi.register');

// Route Modul Mitra-kurir, registrasi dan penjemputan-sampah

Route::get('mitrakurir/penjemputan-sampah/kategori', function () {
    return view('mitra-kurir.penjemputan-sampah.kategori');
})->name('mitra-kurir.penjemputan.kategori');

Route::get('mitrakurir/penjemputan-sampah/kategori/detail', function () {
    return view('mitra-kurir.penjemputan-sampah.detail-kategori', [
        "namaKategori" => "Layar dan Monitor",
    ]);
})->name('mitra-kurir.penjemputan.detail-kategori');

Route::get('/mitra-kurir/registrasi/register', function () {
    return view('mitra-kurir.registrasi.register');
})->name('mitra-kurir.registrasi.register');

Route::get('/mitra-kurir/registrasi/login', function () {
    return view('mitra-kurir.registrasi.login');
})->name('mitra-kurir.registrasi.login');

Route::get('/registrasi', [RegistrasiController::class, 'index']);

Route::post('/registrasi', [RegistrasiController::class, 'simpanData']);

Route::get('/otp', function () {
    return view('mitra-kurir/registrasi/otp');
});