<?php

use App\Http\Controllers\Manajemen\RegistrasiManajemenController;
use App\Http\Controllers\Masyarakat\PenjemputanSampahMasyarakatController;
use App\Http\Controllers\MitraKurir\RegistrasiMitraKurirController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama (welcome)
Route::get('/', function () {
    return view('app');
});

// Route Modul Admin
Route::group([
    'prefix' => 'admin/',
    'as' => 'admin.',
], function () {

    // Submodul Datamaster
    Route::get('datamaster/masyarakat', function () {
        return view('admin.datamaster.masyarakat.index');
    })->name('datamaster.masyarakat.index');

    Route::get('datamaster/kurir', function () {
        return view('admin.datamaster.kurir.index');
    })->name('datamaster.kurir.index');

    Route::get('datamaster/dashboard', function () {
        return view('admin.datamaster.dashboard.index');
    })->name('datamaster.dashboard.index');

    Route::get('datamaster/dropbox', function () {
        return view('admin.datamaster.dropbox.index');
    })->name('datamaster.dropbox.index');

    Route::get('datamaster/sampah', function () {
        return view('admin.datamaster.sampah.index');
    })->name('datamaster.sampah.index');

    // Submodul Registrasi
    Route::get('login', function () {
        return view('admin.datamaster.login.index');
    })->name('login.index');
});

// Route Modul Manajemen
Route::group([
    'prefix' => 'manajemen/',
    'as' => 'manajemen.',
], function () {

    // Submodul Dashboard
    Route::get('datamaster/dashboard', function () {
        return view('manajemen.datamaster.dashboard.index');
    })->name('datamaster.dashboard.index');

    // Submodul Registrasi
    Route::get('forgot-password', [RegistrasiManajemenController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [RegistrasiManajemenController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('check-email', function () {
        return view('manajemen.registrasi.check-email'); // Mengarah ke folder registrasi
    })->name('password.check-email');
    Route::get('reset-password/{token}', function ($token) {
        return view('manajemen.registrasi.reset-password', ['token' => $token]); // Mengarah ke folder registrasi
    })->name('password.reset');
    Route::post('reset-password', [RegistrasiManajemenController::class, 'reset'])->name('password.update');
});

// Route Modul Masyarakat
Route::group([
    'prefix' => 'masyarakat/',
    'as' => 'masyarakat.',
], function () {

    // Submodul Registrasi
    Route::get('login', function () {
        return view('masyarakat.registrasi.login');
    })->name('login');
    Route::get('register', function () {
        return view('masyarakat.registrasi.register');
    })->name('register');

    // Submodul Penjemputan Sampah
    Route::get('penjemputan-sampah', [PenjemputanSampahMasyarakatController::class, 'index'])->name('penjemputan.index');
    Route::get('penjemputan-sampah/kategori', [PenjemputanSampahMasyarakatController::class, 'kategori'])->name('penjemputan.kategori');
    Route::get('penjemputan-sampah/permintaan-penjemputan', [PenjemputanSampahMasyarakatController::class, 'permintaan'])->name('penjemputan.permintaan');
    Route::get('penjemputan-sampah/melacak-penjemputan', [PenjemputanSampahMasyarakatController::class, 'melacak'])->name('penjemputan.melacak');
    Route::get('penjemputan-sampah/detail-kategori', [PenjemputanSampahMasyarakatController::class, 'detailKategori'])->name('penjemputan.detail');
    Route::get('penjemputan-sampah/detail-melacak', [PenjemputanSampahMasyarakatController::class, 'detailMelacak'])->name('penjemputan.detail-melacak');
});

// Route Modul Mitra-kurir
Route::group([
    'prefix' => 'mitra-kurir',
    'as' => 'mitra-kurir.',
], function () {

    // Submodul Penjemputan Sampah
    Route::get('penjemputan-sampah/kategori', function () {
        return view('mitra-kurir.penjemputan-sampah.kategori');
    })->name('penjemputan.kategori');
    Route::get('penjemputan-sampah/kategori/detail', function () {
        return view('mitra-kurir.penjemputan-sampah.detail-kategori', [
            "namaKategori" => "Layar dan Monitor",
        ]);
    })->name('penjemputan.detail-kategori');

    // Submodul Registrasi
    Route::get('registrasi/register', [RegistrasiMitraKurirController::class, 'index'])->name('registrasi.register');
    Route::get('registrasi/login', [RegistrasiMitraKurirController::class, 'loginIndex'])->name('registrasi.login');
    Route::post('registrasi/register', [RegistrasiMitraKurirController::class, 'simpanData']);
});

Route::get('/otp', function () {
    return view('mitra-kurir/registrasi/otp');
});
