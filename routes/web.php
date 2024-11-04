<?php

use App\Http\Controllers\Manajemen\RegistrasiManajemenController;
use App\Http\Controllers\Masyarakat\LoginMasyarakat;
use App\Http\Controllers\Masyarakat\PenjemputanSampahMasyarakatController;
use App\Http\Controllers\MitraKurir\RegistrasiMitraKurirController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama (welcome)
Route::get('/', function () {
    return view('index');
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

    Route::get('datamaster/master-data/dropbox', function () {
        return view('admin.datamaster.master-data.dropbox.index');
    })->name('datamaster.dropbox.index');

    Route::get('datamaster/master-data/kategori', function () {
        return view('admin.datamaster.master-data.kategori.index');
    })->name('datamaster.kategori.index');

    Route::get('datamaster/master-data/jenis', function () {
        return view('admin.datamaster.master-data.jenis.index');
    })->name('datamaster.jenis.index');

    Route::get('datamaster/master-data/daerah', function () {
        return view('admin.datamaster.master-data.daerah.index');
    })->name('datamaster.daerah.index');

    // Submodul Registrasi
    Route::get('login', function () {
        return view('admin.datamaster.auth.login.index');
    })->name('login.index');

    Route::get('otp', function () {
        return view('admin.datamaster.auth.otp.index');
    })->name('otp.index');

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
    // Route::get('login', function () {
    //     return view('masyarakat.registrasi.login');
    // })->name('login');

    // Route::get('register', function () {
    //     return view('masyarakat.registrasi.register');
    // })->name('register');

    Route::get('datamaster/dashboard', function () {
        return view('masyarakat.registrasi.dashboard');
    })->name('register');

    // Route::get('otp', function () {
    //     return view('masyarakat.registrasi.otp');
    // })->name('otp'); // tunggu buat halaman otp


    //Submodul Registrasi
    //Rute untuk mengirim data registrasi
    Route::get('register', [LoginMasyarakat::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [LoginMasyarakat::class, 'login'])->name('register.submit');

    // Rute untuk login
    Route::get('login', [LoginMasyarakat::class, 'login'])->name('masyarakat.login');

    Route::get('/forgot-password', function () {
        return view('masyarakat/registrasi/forgot-password');
    });


    // Submodul Penjemputan Sampah
    Route::get('penjemputan-sampah', [PenjemputanSampahMasyarakatController::class, 'index'])->name('penjemputan.index');
    Route::get('penjemputan-sampah/kategori', [PenjemputanSampahMasyarakatController::class, 'kategori'])->name('penjemputan.kategori');
    Route::get('penjemputan-sampah/permintaan-penjemputan', [PenjemputanSampahMasyarakatController::class, 'permintaan'])->name('penjemputan.permintaan');
    Route::get('penjemputan-sampah/melacak-penjemputan', [PenjemputanSampahMasyarakatController::class, 'melacak'])->name('penjemputan.melacak');
    Route::get('penjemputan-sampah/detail-kategori', [PenjemputanSampahMasyarakatController::class, 'detailKategori'])->name('penjemputan.detail');
    Route::get('penjemputan-sampah/detail-melacak', [PenjemputanSampahMasyarakatController::class, 'detailMelacak'])->name('penjemputan.detail-melacak');
    Route::get('penjemputan-sampah/total-riwayat-penjemputan', [PenjemputanSampahMasyarakatController::class, 'totalRiwayatPenjemputan'])->name('penjemputan.total-riwayat');
    Route::get('penjemputan-sampah/riwayat-penjemputan', [PenjemputanSampahMasyarakatController::class, 'riwayatPenjemputan'])->name('penjemputan.riwayat');
    Route::get('penjemputan-sampah/detail-riwayat', [PenjemputanSampahMasyarakatController::class, 'detailRiwayat'])->name('penjemputan.detail-riwayat');
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
    Route::get('penjemputan-sampah/permintaan-penjemputan', function () {
        return view('mitra-kurir.penjemputan-sampah.permintaan-penjemputan');
    })->name('penjemputan.permintaan');
    Route::get('penjemputan-sampah/permintaan-penjemputan/detail', function () {
        return view('mitra-kurir.penjemputan-sampah.detail-permintaan');
    })->name('penjemputan.detail-permintaan');

    // Submodul Registrasi
    Route::get('registrasi/register', [RegistrasiMitraKurirController::class, 'index'])->name('registrasi.register');
    Route::get('registrasi/login', [RegistrasiMitraKurirController::class, 'loginIndex'])->name('registrasi.login');
    Route::post('registrasi/register', [RegistrasiMitraKurirController::class, 'simpanData']);
});

Route::get('/otp', function () {
    return view('mitra-kurir/registrasi/otp');
});

// rute untuk isi email untuk mendapatkan otp
Route::get('/mitra-kurir/registrasi/get-otp', function () {
    return view('mitra-kurir.registrasi.get-otp');
})->name('mitra-kurir.registrasi.get-otp');


// rute untuk isi email untuk mendapatkan otp
Route::get('/mitra-kurir/registrasi/otp2', function () {
    return view('mitra-kurir.registrasi.otp2');
})->name('mitra-kurir.registrasi.otp2');

Route::post('/mitra-kurir/registrasi/login', [RegistrasiMitraKurirController::class, 'login'])->name('mitra-kurir.login');
