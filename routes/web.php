<?php
use App\Http\Controllers\Admin\JenisSampahAdminController;
use App\Models\User;
use App\Models\UserOTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Masyarakat\LoginMasyarakat;
use App\Http\Controllers\Admin\KategoriSampahAdminController;
use App\Http\Controllers\Admin\DropboxAdminController;
use App\Http\Controllers\Manajemen\RegistrasiManajemenController;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use App\Http\Controllers\Masyarakat\RegistrasiMasyarakatController;
use App\Http\Controllers\MitraKurir\RegistrasiMitraKurirController;
use App\Http\Controllers\Masyarakat\PenjemputanSampahMasyarakatController;
use App\Http\Controllers\MitraKurir\PenjemputanSampahMitraKurirController;

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

    // kategori sampah
    Route::resource('datamaster/master-data/kategori', KategoriSampahAdminController::class)->names([
        'index' => 'datamaster.kategori.index',
        'create' => 'datamaster.kategori.create',
        'store' => 'datamaster.kategori.store',
        'show' => 'datamaster.kategori.show',
        'edit' => 'datamaster.kategori.edit',
        'update' => 'datamaster.kategori.update',
        'destroy' => 'datamaster.kategori.destroy',
    ]);

    Route::get('datamaster/kategori/data', [KategoriSampahAdminController::class, 'getKategoriData'])->name('datamaster.kategori.data');
    Route::get('datamaster/kategori/search', [KategoriSampahAdminController::class, 'search'])->name('datamaster.kategori.search');
    Route::post('datamaster/kategori/storeKategori', [KategoriSampahAdminController::class, 'storeKategori'])->name('datamaster.kategori.storeKategori');
    
    // jenis sampah
    Route::resource('datamaster/master-data/jenis', JenisSampahAdminController::class)->names([
        'index' => 'datamaster.jenis.index',
        'create' => 'datamaster.jenis.create',
        'store' => 'datamaster.jenis.store',
        'show' => 'datamaster.jenis.show',
        'edit' => 'datamaster.jenis.edit',
        'update' => 'datamaster.jenis.update',
        'destroy' => 'datamaster.jenis.destroy',
    ]);

    Route::get('datamaster/jenis/data', [JenisSampahAdminController::class, 'getJenisSampahData'])->name('datamaster.jenis.data');

    // dropbox
    Route::resource('datamaster/master-data/dropbox', DropboxAdminController::class)->names([
        'index' => 'datamaster.dropbox.index',
        'create' => 'datamaster.dropbox.create',
        'store' => 'datamaster.dropbox.store',
        'show' => 'datamaster.dropbox.show',
        'edit' => 'datamaster.dropbox.edit',
        'update' => 'datamaster.dropbox.update',
        'destroy' => 'datamaster.dropbox.destroy',
    ]);

    Route::get('datamaster/dropbox/data', [DropboxAdminController::class, 'getDropboxData'])->name('datamaster.dropbox.data');
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

    // Submodul Login
    Route::get('login', function () {
        return view('masyarakat.registrasi.login');
    })->name('login');

    Route::post('login', [LoginMasyarakat::class, 'login'])->name('login.submit');

    // Submodul Registrasi
    Route::get('register', function () {
        return view('masyarakat.registrasi.register');
    })->name('register');

    Route::post('register', [RegistrasiMasyarakatController::class, 'register'])->name('register.submit');

    // Rute untuk tampilan OTP
    Route::get('otp', function () {
        return view('masyarakat.registrasi.verify_otp');
    })->name('otp');

    Route::post('otp', [RegistrasiMasyarakatController::class, 'verifyOtp'])->name('otp.verify');
    //rute otp ke email
    Route::post('otp/confirm', [RegistrasiMasyarakatController::class, 'confirmOtp'])->name('otp.confirm');


    Route::get('/forgot-password', function () {
        return view('masyarakat/registrasi/forgot-password');
    });

    Route::get('/check-mail', function () {
        return view('masyarakat/registrasi/check-mail');
    });

    Route::get('/reset-password', function () {
        return view('masyarakat/registrasi/reset-password');
    });



    // Submodul Penjemputan Sampah
    Route::get('penjemputan-sampah', [PenjemputanSampahMasyarakatController::class, 'index'])->name('penjemputan.index');
    Route::get('penjemputan-sampah/kategori', [PenjemputanSampahMasyarakatController::class, 'kategori'])->name('penjemputan.kategori');
    Route::get('penjemputan-sampah/permintaan-penjemputan', [PenjemputanSampahMasyarakatController::class, 'permintaan'])->name('penjemputan.permintaan');
    Route::get('penjemputan-sampah/melacak-penjemputan', [PenjemputanSampahMasyarakatController::class, 'melacak'])->name('penjemputan.melacak');
    Route::get('penjemputan-sampah/detail-kategori/{id}', [PenjemputanSampahMasyarakatController::class, 'detailKategori'])->name('penjemputan.detail');
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
    Route::get('penjemputan-sampah/kategori', [PenjemputanSampahMitraKurirController::class, 'kategori'])->name('penjemputan.kategori');
    Route::get('penjemputan-sampah/kategori/detail/{id}', [PenjemputanSampahMitraKurirController::class, 'detailKategori'])->name('penjemputan.detail-kategori');

    Route::get('penjemputan-sampah/permintaan-penjemputan', function () {
        return view('mitra-kurir.penjemputan-sampah.permintaan-penjemputan');
    })->name('penjemputan.permintaan');

    Route::get('penjemputan-sampah/permintaan-penjemputan/detail', function () {
        return view('mitra-kurir.penjemputan-sampah.detail-permintaan');
    })->name('penjemputan.detail-permintaan');

    Route::get('penjemputan-sampah/dropbox', function () {
        return view('mitra-kurir.penjemputan-sampah.dropbox');
    })->name('penjemputan.dropbox');

Route::get('penjemputan-sampah/riwayat-penjemputan', function () {
        return view('mitra-kurir.penjemputan-sampah.riwayat-penjemputan');
    })->name('penjemputan.riwayat-penjemputan');

    // Submodul Registrasi
    Route::get('registrasi/register', [RegistrasiMitraKurirController::class, 'index'])->name('registrasi.register');
    Route::post('registrasi/register', [RegistrasiMitraKurirController::class, 'simpanData']);
    Route::post('registrasi/login', [RegistrasiMitraKurirController::class, 'LoginAuth'])->name('registrasi.login');
    Route::get('registrasi/login', [RegistrasiMitraKurirController::class, 'loginIndex'])->name('registrasi.login');
});
    Route::post('/{id_pengguna}/otp-validation', [RegistrasiMitraKurirController::class, 'OtpValidation'])->middleware([])->name('otp.validation');
    Route::get('/{id_pengguna}/otp-verification',  [RegistrasiMitraKurirController::class, 'OtpRedirect'])->name('otp-verification');

    // rute login mitra kurir
    Route::post('/mitra-kurir/registrasi/login', [RegistrasiMitraKurirController::class, 'login'])->name('mitra-kurir.login');

    // rute otp
    Route::get('/mitra-kurir/registrasi/otp2', function () {
        return view('mitra-kurir/registrasi/otp2');
    });