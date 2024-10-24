<?php

use App\Http\Controllers\Masyarakat\PenjemputanSampahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

// Route Modul Admin, datamaster dan penjemputan-sampah

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
