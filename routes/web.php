<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Manajemen\LoginController;
use App\Http\Controllers\Admin\KurirAdminController;
use App\Http\Controllers\Admin\DaerahAdminController;
use App\Http\Controllers\Admin\DropboxAdminController;
use App\Http\Controllers\Admin\ManajemenAdminController;
use App\Http\Controllers\Admin\MasyarakatAdminController;
use App\Http\Controllers\Admin\JenisSampahAdminController;
use App\Http\Controllers\Admin\KategoriSampahAdminController;
use App\Http\Controllers\Masyarakat\ForgotPasswordController;
use App\Http\Controllers\Manajemen\RegistrasiManajemenController;
use App\Http\Controllers\Masyarakat\LoginMasyarakat;
use App\Http\Controllers\Masyarakat\ProfileMasyarakatController;
use App\Http\Controllers\Masyarakat\RegistrasiMasyarakatController;
use App\Http\Controllers\MitraKurir\RegistrasiMitraKurirController;
use App\Http\Controllers\Masyarakat\PenjemputanSampahMasyarakatController;
use App\Http\Controllers\MitraKurir\PenjemputanSampahMitraKurirController;

// Route untuk halaman utama (welcome)
Route::get('/', function () {
    return view('index');
});

// Route Modul Admin
Route::prefix('admin')
    ->as('admin.')
    // ->middleware(['auth', 'role:Admin'])
    ->group(function () {

        Route::prefix('masyarakat')->name('masyarakat.')->group(function () {
            Route::get('/detail/{id}', [MasyarakatAdminController::class, 'show'])->name('show');
        });
        Route::prefix('kurir')->name('kurir.')->group(function () {
            Route::get('/detail/{id}', [KurirAdminController::class, 'show'])->name('show');
        });
        Route::prefix('manajemen')->name('manajemen.')->group(function () {
            Route::get('/detail/{id}', [ManajemenAdminController::class, 'show'])->name('show');
        });

        // Submodul Datamaster
        Route::prefix('datamaster')->as('datamaster.')->group(function () {
            Route::prefix('masyarakat')->name('masyarakat.')->group(function () {
                Route::get('/', [MasyarakatAdminController::class, 'index'])->name('index');
                Route::put('/{id}', [MasyarakatAdminController::class, 'update'])->name('update');
                Route::delete('/{id}', [MasyarakatAdminController::class, 'destroy'])->name('destroy');
                Route::get('/data', [MasyarakatAdminController::class, 'getMasyarakatData'])->name('getData');
            });
            Route::prefix('kurir')->name('kurir.')->group(function () {
                Route::get('/', [KurirAdminController::class, 'index'])->name('index');
                Route::put('/{id}', [KurirAdminController::class, 'update'])->name('update');
                Route::delete('/{id}', [KurirAdminController::class, 'destroy'])->name('destroy');
                Route::get('/data', [KurirAdminController::class, 'getKurirData'])->name('getData');
                Route::get('/{id}/dokumen', [KurirAdminController::class, 'getDokumen'])->name('dokumen');
            });
            Route::prefix('manajemen')->name('manajemen.')->group(function () {
                Route::get('/', [ManajemenAdminController::class, 'index'])->name('index');
                Route::put('/{id}', [ManajemenAdminController::class, 'update'])->name('update');
                Route::delete('/{id}', [ManajemenAdminController::class, 'destroy'])->name('destroy');
                Route::get('/data', [ManajemenAdminController::class, 'getManajemenData'])->name('getData');
            });

            Route::view('kurir', 'admin.datamaster.kurir.index')->name('kurir.index');
            Route::view('dashboard', 'admin.datamaster.dashboard.index')->name('dashboard.index');

            Route::prefix('master-data')->group(function () {
                Route::view('dropbox', 'admin.datamaster.master-data.dropbox.index')->name('dropbox.index');
                Route::view('jenis', 'admin.datamaster.master-data.jenis.index')->name('jenis.index');
                Route::view('daerah', 'admin.datamaster.master-data.daerah.index')->name('daerah.index');
            });

            // Kategori Sampah
            Route::resource('master-data/kategori', KategoriSampahAdminController::class)->names([
                'index' => 'kategori.index',
                'create' => 'kategori.create',
                'store' => 'kategori.store',
                'show' => 'kategori.show',
                'edit' => 'kategori.edit',
                'update' => 'kategori.update',
                'destroy' => 'kategori.destroy',
            ]);

            Route::controller(KategoriSampahAdminController::class)->group(function () {
                Route::get('kategori/data', 'getKategoriData')->name('kategori.data');
                Route::get('kategori/search', 'search')->name('kategori.search');
                Route::post('kategori/storeKategori', 'storeKategori')->name('kategori.storeKategori');
            });

            // Jenis Sampah
            Route::resource('master-data/jenis', JenisSampahAdminController::class)->names([
                'index' => 'jenis.index',
                'create' => 'jenis.create',
                'store' => 'jenis.store',
                'show' => 'jenis.show',
                'edit' => 'jenis.edit',
                'update' => 'jenis.update',
                'destroy' => 'jenis.destroy',
            ]);

            Route::get('jenis/data', [JenisSampahAdminController::class, 'getJenisSampahData'])->name('jenis.data');

            // Dropbox
            Route::resource('master-data/dropbox', DropboxAdminController::class)->names([
                'index' => 'dropbox.index',
                'create' => 'dropbox.create',
                'store' => 'dropbox.store',
                'show' => 'dropbox.show',
                'edit' => 'dropbox.edit',
                'update' => 'dropbox.update',
                'destroy' => 'dropbox.destroy',
            ]);

            Route::get('dropbox/data', [DropboxAdminController::class, 'getDropboxData'])->name('dropbox.data');

            // Daerah
            Route::resource('master-data/daerah', DaerahAdminController::class)->names([
                'index' => 'daerah.index',
                'create' => 'daerah.create',
                'store' => 'daerah.store',
                'show' => 'daerah.show',
                'edit' => 'daerah.edit',
                'update' => 'daerah.update',
                'destroy' => 'daerah.destroy',
            ]);

            Route::controller(DaerahAdminController::class)->group(function () {
                Route::get('daerah/data', 'getDaerahData')->name('daerah.data');
                Route::get('daerah/search', 'search')->name('daerah.search');
                Route::post('daerah/storeDaerah', 'storeDaerah')->name('daerah.storeDaerah');
            });
        });
    });

// Rute autentikasi
Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::post('/send-login-link', [AuthController::class, 'sendLoginLink'])->name('sendAdminLoginLink');
        Route::get('/login/verify', [AuthController::class, 'verifyLogin'])->name('login.verify');
        Route::view('/login', 'admin.datamaster.auth.login.index')->name('login.index');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::patch('masyarakat/{id}/approve', [MasyarakatAdminController::class, 'approve'])->name('approve');
        Route::patch('masyarakat/{id}/reject', [MasyarakatAdminController::class, 'reject'])->name('reject');
        Route::patch('kurir/{id}/approve', [KurirAdminController::class, 'approve'])->name('approve');
        Route::patch('kurir/{id}/reject', [KurirAdminController::class, 'reject'])->name('reject');
        Route::patch('manajemen/{id}/approve', [ManajemenAdminController::class, 'approve'])->name('approve');
        Route::patch('manajemen/{id}/reject', [ManajemenAdminController::class, 'reject'])->name('reject');
    });


// Route Modul Manajemen
Route::group([
    'prefix' => 'manajemen',
    'as' => 'manajemen.',
], function () {

    // Submodul Dashboard
    Route::get('/datamaster/dashboard', function () {
        return view('manajemen.datamaster.dashboard.index');
    })->name('datamaster.dashboard.index');

    Route::get('/datamaster/melacak-penjemputan', function () {
        return view('manajemen.datamaster.melacak-penjemputan.index');
    })->name('datamaster.melacak-penjemputan.index');

    Route::get('/datamaster/total-sampah', function () {
        return view('manajemen.datamaster.total-sampah.index');
    })->name('datamaster.total-sampah.index');

    // Submodul Registrasi
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('registrasi.login'); // Alias tambahan
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::get('/forgot-password', [RegistrasiManajemenController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [RegistrasiManajemenController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/register', function () {
        return view('manajemen.registrasi.register'); // Mengarah ke folder registrasi
    })->name('registrasi.register');

    Route::post('/register', [RegistrasiManajemenController::class, 'register'])->name('register.submit');

    Route::get('/verify-otp', function () {
        return view('manajemen.registrasi.verify-otp');
    })->name('registrasi.verify-otp');

    Route::get('/data-total-sampah', function () {
        return view('manajemen.registrasi.data-total-sampah');
    })->name('registrasi.data-total-sampah');

    Route::get('/data-profil', function () {
        return view('manajemen.registrasi.data-profil');
    })->name('registrasi.data-profil');

    Route::get('/otp-confirmation-success', function () {
        return view('manajemen.registrasi.otp-confirmation-success');
    })->name('registrasi.otp-confirmation-success');

    Route::get('/otp-change-password-success', function () {
        return view('manajemen.registrasi.otp-change-password-success');
    })->name('registrasi.otp-change-password-success');

    Route::get('/check-email', function () {
        return view('manajemen.registrasi.check-email'); // Mengarah ke folder registrasi
    })->name('password.check-email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('manajemen.registrasi.reset-password', ['token' => $token]); // Mengarah ke folder registrasi
    })->name('password.reset');

    Route::post('/reset-password', [RegistrasiManajemenController::class, 'reset'])->name('password.update');
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

    Route::post('login', [LoginMasyarakat::class, 'authenticate'])->name('login.submit');

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


    //profileEdit
    Route::get('profile', [ProfileMasyarakatController::class, 'showProfile'])->name('masyarakat.profile.show');
    Route::get('profile/edit', [ProfileMasyarakatController::class, 'editProfile'])->name('masyarakat.profile.edit');
    Route::post('profile/edit', [ProfileMasyarakatController::class, 'updateProfile'])->name('masyarakat.profile.update');

    //forgot pass masyarakat
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('masyarakat.password.email');
    
    // Submodul Penjemputan Sampah
    Route::get('penjemputan-sampah', [PenjemputanSampahMasyarakatController::class, 'index'])->name('penjemputan.index');
    Route::get('penjemputan-sampah/kategori', [PenjemputanSampahMasyarakatController::class, 'kategori'])->name('penjemputan.kategori');
    Route::get('penjemputan-sampah/permintaan-penjemputan', [PenjemputanSampahMasyarakatController::class, 'permintaan'])->name('penjemputan.permintaan');
    Route::get('penjemputan-sampah/melacak-penjemputan', [PenjemputanSampahMasyarakatController::class, 'melacak'])->name('penjemputan.melacak');
    Route::get('penjemputan-sampah/detail-kategori', function () {
        return redirect()->route('masyarakat.penjemputan.kategori');
    });
    Route::get('penjemputan-sampah/detail-kategori/{id}', [PenjemputanSampahMasyarakatController::class, 'detailKategori'])->name('penjemputan.detail');
    Route::get('penjemputan-sampah/detail-melacak', [PenjemputanSampahMasyarakatController::class, 'detailMelacak'])->name('penjemputan.detail-melacak');
    Route::get('penjemputan-sampah/total-riwayat-penjemputan', [PenjemputanSampahMasyarakatController::class, 'totalRiwayatPenjemputan'])->name('penjemputan.total-riwayat');
    Route::get('penjemputan-sampah/riwayat-penjemputan', [PenjemputanSampahMasyarakatController::class, 'riwayatPenjemputan'])->name('penjemputan.riwayat');
    Route::get('penjemputan-sampah/detail-riwayat', [PenjemputanSampahMasyarakatController::class, 'detailRiwayat'])->name('penjemputan.detail-riwayat');

    Route::post('penjemputan-sampah/tambah', [PenjemputanSampahMasyarakatController::class, 'tambah'])->name('penjemputan.tambah');
});

// Route Modul Mitra-kurir
Route::group([
    'prefix' => 'mitra-kurir/',
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

    Route::get('registrasi/register', [RegistrasiMitraKurirController::class, 'RegisterIndex'])->name('registrasi.register');
    Route::get('registrasi/login', [RegistrasiMitraKurirController::class, 'loginIndex'])->name('registrasi.login');

    Route::post('registrasi/register', [RegistrasiMitraKurirController::class, 'simpanData']);
    Route::post('registrasi/login', [RegistrasiMitraKurirController::class, 'LoginAuth'])->name('registrasi.login');
});

Route::post('/{id_pengguna}/otp-validation', [RegistrasiMitraKurirController::class, 'OtpValidation'])->name('otp.validation');
Route::get('/{id_pengguna}/otp-verification', [RegistrasiMitraKurirController::class, 'OtpRedirect'])->name('otp-verification');
// upload dokumen
Route::get('/mitra-kurir/registrasi/document-upload/{id_pengguna}', [RegistrasiMitraKurirController::class, 'UploadDataIndex'])->name('upload-data-index');
Route::post('/mitra-kurir/registrasi/document-upload/{id_pengguna}', [RegistrasiMitraKurirController::class, 'UploadValidation'])->name('upload-validate');


// forgot password
Route::get('/mitra-kurir/registrasi/forgot-password', function () {
    return view('mitra-kurir/registrasi/forgot-password');
});
// syarat & ketentuan
Route::get('/mitra-kurir/registrasi/syarat-ketentuan', function () {
    return view('/mitra-kurir/registrasi/syarat-dan-ketentuan');
})->name('/mitra-kurir/registrasi/syarat-dan-ketentuan');

// reset password
Route::get('/mitra-kurir/registrasi/reset-password', function () {
    return view('mitra-kurir/registrasi/reset-password');
});

// halaman profile
Route::get('/mitra-kurir/registrasi/account-profile/profile', function () {
    return view('mitra-kurir/registrasi/account-profile/profile');
})->name('mitra-kurir.registrasi.account-profile.profile');

// halaman account
Route::get('/mitra-kurir/registrasi/account-profile/account', function () {
    return view('mitra-kurir/registrasi/account-profile/account');
})->name('mitra-kurir.registrasi.account-profile.account');

// change password
Route::get('/mitra-kurir/registrasi/account-profile/change-password', function () {
    return view('mitra-kurir/registrasi/account-profile/change-password');
})->name('mitra-kurir.registrasi.account-profile.change-password');


Route::group([
    'prefix' => 'api/',
    'as' => 'api.',
], function () {
    Route::get('kategori', [APIController::class, 'getKategori'])->name('kategori');
    Route::get('jenis/{id}', [APIController::class, 'getJenis'])->name('jenis');
    Route::get('daerah', [APIController::class, 'getDaerah'])->name('daerah');
    Route::get('dropbox/{id}', [APIController::class, 'getDropbox'])->name('dropbox');

    // Untuk Dropdown Select2 Kel 2
    Route::get('jenis-option/{id}', [APIController::class, 'JenisOption'])->name('jenis-option');
    Route::get('dropbox-option/{id}', [APIController::class, 'DropboxOption'])->name('dropbox-option');
});
