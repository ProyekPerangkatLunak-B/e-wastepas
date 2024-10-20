<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

// Route Modul Admin, datamaster dan penjemputan-sampah

// Route Modul Manajemen, registrasi dan dashboard

// Route Modul Masyarakat, registrasi dan penjemputan-sampah
Route::get('/penjemputan-sampah', function () {
    return view('masyarakat.penjemputan-sampah.index'); // pastikan nama file tanpa .blade.php
});

Route::get('/penjemputan-sampah/create', function () {
    return view('masyarakat.penjemputan-sampah.create'); // pastikan nama file tanpa .blade.php
});

// Route Modul Mitra-kurir, registrasi dan penjemputan-sampah


