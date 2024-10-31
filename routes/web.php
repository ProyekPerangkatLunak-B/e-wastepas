<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MitraKurirController;

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


// Route Modul Mitra-kurir, registrasi dan penjemputan-sampah

Route::get('mitrakurir/penjemputan-sampah/kategori', function () {
    return view('mitra-kurir.penjemputan-sampah.kategori');
})->name('mitra-kurir.penjemputan.kategori');

Route::get('mitrakurir/penjemputan-sampah/kategori/detail', function () {
    return view('mitra-kurir.penjemputan-sampah.detail-kategori', [
        "namaKategori" => "Layar dan Monitor"
    ]);
})->name('mitra-kurir.penjemputan.detail-kategori');

Route::get('mitrakurir/penjemputan-sampah/permintaan', function () {
    return view('mitra-kurir.penjemputan-sampah.permintaan-penjemputan');
})->name('mitra-kurir.penjemputan.permintaan');

Route::get('mitrakurir/penjemputan-sampah/dropbox', function () {
    return view('mitra-kurir.penjemputan-sampah.dropbox');
})->name('mitra-kurir.penjemputan.dropbox');

Route::get('mitrakurir/penjemputan-sampah/riwayat', function () {
    return view('mitra-kurir.penjemputan-sampah.riwayat');
})->name('mitra-kurir.penjemputan.riwayat');

Route::prefix('mitrakurir/penjemputan-sampah')->group(function () {
    Route::get('kategori', [MitraKurirController::class, 'kategori'])->name('mitra-kurir.penjemputan.kategori');
    Route::get('kategori/detail', [MitraKurirController::class, 'detailKategori'])->name('mitra-kurir.penjemputan.detail-kategori');
    Route::get('permintaan', [MitraKurirController::class, 'permintaan'])->name('mitra-kurir.penjemputan.permintaan');
    Route::get('dropbox', [MitraKurirController::class, 'dropbox'])->name('mitra-kurir.penjemputan.dropbox');
    Route::get('riwayat', [MitraKurirController::class, 'riwayat'])->name('mitra-kurir.penjemputan.riwayat');
});
