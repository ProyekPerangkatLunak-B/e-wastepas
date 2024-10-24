<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

// Route Modul Admin, datamaster dan penjemputan-sampah

// Route Modul Manajemen, registrasi dan dashboard

// Route Modul Masyarakat, registrasi dan penjemputan-sampah
Route::get('/penjemputan-sampah', function () {
    return view('masyarakat.penjemputan-sampah.index');
})->name('penjemputan.index');

Route::get('/penjemputan-sampah/kategori', function () {
    return view('masyarakat.penjemputan-sampah.kategori');
})->name('penjemputan.kategori');


Route::get('/penjemputan-sampah/permintaan-penjemputan', function () {
    return view('masyarakat.penjemputan-sampah.permintaan-penjemputan');
})->name('penjemputan.permintaan');

Route::get('/registrasi/login', function() {
    return view('masyarakat.registrasi.login');
})->name('registrasi.login');

Route::get('/registrasi/register', function() {
    return view('masyarakat.registrasi.register');
})->name('registrasi.register');


// Route Modul Mitra-kurir, registrasi dan penjemputan-sampah


