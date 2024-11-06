<?php

use App\Http\Controllers\Masyarakat\PenjemputanSampahController;
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

Route::get('admin/penjemputan-sampah/tracking', function () {
    return view('admin.penjemputan-sampah.tracking.index');
})->name('admin.penjemputan-sampah.tracking.index');

Route::get('admin/penjemputan-sampah/permintaan', function () {
    return view('admin.penjemputan-sampah.permintaan.index');
})->name('admin.penjemputan-sampah.permintaan.index');

Route::get('admin/penjemputan-sampah/permintaan/detail', function () {
    return view('admin.penjemputan-sampah.permintaan.detail');
})->name('admin.penjemputan-sampah.permintaan.detail');

Route::get('admin/penjemputan-sampah/pendapatan', function () {
    return view('admin.penjemputan-sampah.pendapatan.index');
})->name('admin.penjemputan-sampah.pendapatan.index');

Route::get('admin/penjemputan-sampah/pendapatan/total-poin', function () {
    return view('admin.penjemputan-sampah.pendapatan.total-poin');
})->name('admin.penjemputan-sampah.pendapatan.total-poin');

Route::get('admin/penjemputan-sampah/riwayat', function () {
    return view('admin.penjemputan-sampah.riwayat.index');
})->name('admin.penjemputan-sampah.riwayat.index');

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

Route::get('/mitra-kurir/registrasi/register', function () {
    return view('mitra-kurir.registrasi.register');
})->name('mitra-kurir.registrasi.register');

Route::get('/mitra-kurir/registrasi/login', function () {
    return view('mitra-kurir.registrasi.login');
})->name('mitra-kurir.registrasi.login');