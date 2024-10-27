<?php

use App\Http\Controllers\Masyarakat\PenjemputanSampahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

// Route Modul Admin, datamaster dan penjemputan-sampah

// Route Modul Manajemen, registrasi dan dashboard

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
});


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
