<?php

use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\Manajemen\LoginController;
use App\Http\Controllers\admin\KurirAdminController;
use App\Http\Controllers\Manajemen\DaerahController;
use App\Http\Controllers\Manajemen\RiwayatController;
use App\Http\Controllers\Manajemen\Top10Controller;
use App\Http\Controllers\Manajemen\KategoriController;
use App\Http\Controllers\Manajemen\DashboardController;
use App\Http\Controllers\Masyarakat\LoginMasyarakat;
use App\Http\Controllers\Admin\DaerahAdminController;
use App\Http\Controllers\Manajemen\DashboardKategori;
use App\Http\Controllers\Manajemen\DropboxController;
use App\Http\Controllers\Admin\DropboxAdminController;
use App\Http\Controllers\Admin\ManajemenAdminController;
use App\Http\Controllers\Admin\MasyarakatAdminController;
use App\Http\Controllers\Admin\JenisSampahAdminController;
use App\Http\Controllers\Manajemen\OtpManajemenController;
use App\Http\Controllers\Admin\KategoriSampahAdminController;
use App\Http\Controllers\Masyarakat\ForgotPasswordController;
use App\Http\Controllers\Masyarakat\ProfileMasyarakatController;
use App\Http\Controllers\Manajemen\RegistrasiManajemenController;
use App\Http\Controllers\Masyarakat\RegistrasiMasyarakatController;
use App\Http\Controllers\MitraKurir\RegistrasiMitraKurirController;
use App\Http\Controllers\Manajemen\ResetPasswordManajemenController;
use App\Http\Controllers\Manajemen\ForgotPasswordManajemenController;
use App\Http\Controllers\Masyarakat\PenjemputanSampahMasyarakatController;
use App\Http\Controllers\MitraKurir\PenjemputanSampahMitraKurirController;
use App\Http\Controllers\Admin\PermintaanPenjemputanSampahAdminController;
use App\Http\Controllers\Admin\PenerimaanPenjemputanSampahAdminController;
use App\Http\Controllers\Admin\TrackingPenjemputanSampahAdminController;
use App\Http\Controllers\Admin\TotalSampahPenjemputanSampahAdminController;
use App\Http\Controllers\Admin\RiwayatPenjemputanSampahAdminController;

// Route untuk halaman utama (welcome)
Route::get('/', function () {
    return view('index');
})->middleware('role.redirect');

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

        // penjemputan sampah
        Route::prefix('penjemputan')
            ->as('penjemputan-sampah.')
            ->group(function () {
                Route::get('permintaan', [PermintaanPenjemputanSampahAdminController::class, 'index'])->name('permintaan.index');
                Route::get('permintaan/detail/{id}', [PermintaanPenjemputanSampahAdminController::class, 'getDetail'])->name('permintaan.detail');
                Route::get('penerimaan', [PenerimaanPenjemputanSampahAdminController::class, 'index'])->name('penerimaan.index');
                Route::get('tracking', [TrackingPenjemputanSampahAdminController::class, 'index'])->name('tracking.index');
                Route::get('total', [TotalSampahPenjemputanSampahAdminController::class, 'index'])->name('total.index');
                Route::get('riwayat', [RiwayatPenjemputanSampahAdminController::class, 'index'])->name('riwayat.index');
            });
    });

// Rute autentikasi
Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::post('/send-login-link', [AuthController::class, 'sendLoginLink'])->name('sendAdminLoginLink');
        Route::get('/login/verify', [AuthController::class, 'verifyLogin'])->name('login.verify');
        Route::view('/login', 'admin.datamaster.auth.login.index')->name('login.index')->middleware('role.redirect');
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

    // Route::get('/datamaster/detail-riwayat', function () {
    //     return view('manajemen.datamaster.riwayat.detail-riwayat');
    // })->name('datamaster.riwayat.detail-riwayat');
    

    Route::get('/datamaster/kategori', [KategoriController::class, 'index'])->name('kategori.index');

    Route::get('/datamaster/per-daerah', [DaerahController::class, 'index'])
        ->name('datamaster.per-daerah.index');

    Route::get('/datamaster/dashboard', [DashboardController::class, 'index'])->name('datamaster.dashboard.index');

    Route::get('/datamaster/top-10', [Top10Controller::class, 'index'])->name('datamaster.top-10.index');

    Route::get('/datamaster/dropbox', [DropboxController::class, 'index'])->name('datamaster.dropbox.index');

    Route::get('/datamaster/riwayat', [RiwayatController::class, 'index'])->name('datamaster.riwayat.index');
    Route::get('/datamaster/{kode_penjemputan}', [RiwayatController::class, 'show'])->name('datamaster.riwayat.detail-riwayat');    

    Route::get('/datamaster/kategori', [KategoriController::class, 'index'])->name('kategori.index');


    // Route::get('/datamaster/per-daerah', function () {
    //     return view('manajemen.datamaster.per-daerah.index');
    // })->name('datamaster.per-daerah.index');


    Route::get('/datamaster/jenis', function () {
        return view('manajemen.datamaster.jenis.index');
    })->name('datamaster.jenis.index');

    // Submodul Registrasi
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('registrasi.login'); // Alias tambahan
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    // Route register (Registrasi)
    Route::get('/register', function () {
        return view('manajemen.registrasi.register');
    })->name('registrasi.register');

    Route::post('/register', [RegistrasiManajemenController::class, 'register'])->name('register.verify-otp.submit');

    // Route forgot password (Registrasi)
    Route::get('/forgot-password', [ForgotPasswordManajemenController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordManajemenController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::prefix('manajemen')->name('manajemen.')->group(function () {

        // Menampilkan form untuk forgot password (Registrasi)
        Route::get('forgot-password', [ForgotPasswordManajemenController::class, 'showLinkRequestForm'])
            ->name('password.request');  // Form untuk meminta reset password

        // Mengirimkan email link reset password (Registrasi)
        Route::post('forgot-password', [ForgotPasswordManajemenController::class, 'sendResetLinkEmail'])
            ->name('password.email');  // Kirim email reset password

    });

    // OTP Confirmation Success (Registrasi)
    Route::get('/otp-confirmation-success', function () {
        return view('manajemen.registrasi.otp-confirmation-success');
    })->name('registrasi.otp-confirmation-success');

    // OTP Change Password Success (Registrasi)
    Route::get('/otp-change-password-success', function () {
        return view('manajemen.registrasi.otp-change-password-success');
    })->name('registrasi.otp-change-password-success');

    // Route Verfy Otp (Registrasi)
    Route::get('/verify-otp', function () {
        return view('manajemen.registrasi.verify-otp');
    })->name('registrasi.verify-otp');

    Route::post('manajemen/verify-otp', [OtpManajemenController::class, 'verifyOtp']);

    // Route Data Total Sampah (Registrasi)
    Route::get('/data-total-sampah', function () {
        return view('manajemen.registrasi.data-total-sampah');
    })->name('registrasi.data-total-sampah');

    // Route Data Profil (Registrasi)
    Route::get('/data-profil', function () {
        return view('manajemen.registrasi.data-profil');
    })->name('registrasi.data-profil');

    // Route Otp Konfirmasi Sukses (Registrasi)
    Route::get('/otp-confirmation-success', function () {
        return view('manajemen.registrasi.otp-confirmation-success');
    })->name('registrasi.otp-confirmation-success');

    // Route Otp Change Password Sukses (Registrasi)
    Route::get('/otp-change-password-success', function () {
        return view('manajemen.registrasi.otp-change-password-success');
    })->name('registrasi.otp-change-password-success');

    // Route Check Email (Registrasi)
    Route::get('/check-email', function () {
        return view('manajemen.registrasi.check-email');
    })->name('password.check-email');

    // Route Ganti Password (Registrasi)
    Route::get('/ganti-password', function () {
        return view('manajemen.registrasi.ganti-password');
    })->name('password.ganti-password');

    // Route Ubah Password (Registrasi)
    Route::get('/ubah-password', function () {
        return view('manajemen.registrasi.ubah-password');
    })->name('password.ubah-password');

    // Route Konfirmasi Ubah Password (Registrasi)
    Route::get('/konfirmasi-ubah-password', function () {
        return view('manajemen.registrasi.konfirmasi-ubah-password');
    })->name('password.konfirmasi-ubah-password');


    // Memverifikasi OTP
    Route::post('verify-otp', [RegistrasiManajemenController::class, 'verifyOtp'])->name('manajemen.registrasi.verify-otp.submit');
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

    //logout
    Route::post('logout', [LoginMasyarakat::class, 'logout'])->name('logout');

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

    Route::get('/reset-password', function () {
        return view('masyarakat/registrasi/reset-password');
    });
    Route::get('/ubah-password', function () {
        return view('masyarakat/registrasi/ubah-password');
    })->name('ubah-password');
    Route::get('/cek-mail', function () {
        return view('masyarakat/registrasi/cek-mail');
    });

    Route::get('/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/masyarakat/reset', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
    // Route::get('/profil', function () {
    //    return view('masyarakat/registrasi/profil');
    // });

    //Route::get('/forgot-password-otp', function () {
    //    return view('masyarakat/registrasi/forgot-password-otp');
    //});

    //profileEdit
    Route::get('/profile', [ProfileMasyarakatController::class, 'showProfile'])->name('profile');
    Route::post('/profile/save', [ProfileMasyarakatController::class, 'saveProfile'])->name('profile.save');
    Route::put('/profile/update-password', [ForgotPasswordController::class, 'updatePassword'])->name('profile.update-password');



    //forgot pass masyarakat
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('masyarakat.password.email');

    // Submodul Penjemputan Sampah
    Route::group([
        'prefix' => 'penjemputan-sampah/',
        'as' => 'penjemputan.',
        'middleware' => ['auth', 'check.verification.status'],
    ], function () {
        Route::get('/', [PenjemputanSampahMasyarakatController::class, 'index'])->name('index');
        Route::get('/kategori', [PenjemputanSampahMasyarakatController::class, 'kategori'])->name('kategori');
        Route::get('/permintaan-penjemputan', [PenjemputanSampahMasyarakatController::class, 'permintaan'])->name('permintaan');
        Route::get('/melacak-penjemputan', [PenjemputanSampahMasyarakatController::class, 'melacak'])->name('melacak');

        Route::get('/detail-kategori', function () {
            return redirect()->route('masyarakat.kategori');
        });
        Route::get('/detail-kategori/{id}', [PenjemputanSampahMasyarakatController::class, 'detailKategori'])->name('detail');

        Route::get('/detail-melacak', function () {
            return redirect()->route('masyarakat.melacak');
        });
        Route::get('/detail-melacak/{id}', [PenjemputanSampahMasyarakatController::class, 'detailMelacak'])->name('detail-melacak');

        Route::get('/total-riwayat-penjemputan', [PenjemputanSampahMasyarakatController::class, 'totalRiwayatPenjemputan'])->name('total-riwayat');
        Route::get('/riwayat-penjemputan', [PenjemputanSampahMasyarakatController::class, 'riwayatPenjemputan'])->name('riwayat');

        Route::get('/detail-riwayat', function () {
            return redirect()->route('masyarakat.riwayat');
        });
        Route::get('/detail-riwayat/{id}', [PenjemputanSampahMasyarakatController::class, 'detailRiwayat'])->name('detail-riwayat');

        Route::get('/export/riwayat-penjemputan', [PenjemputanSampahMasyarakatController::class, 'exportPDFRiwayatPenjemputan'])->name('exportexportPDFRiwayatPenjemputan');

        Route::get('/export/detail-riwayat', function () {
            return redirect()->route('masyarakat.penjemputan.riwayat');
        });
        Route::get('/export/detail-riwayat/{id}', [PenjemputanSampahMasyarakatController::class, 'exportPDFDetailRiwayat'])->name('exportPDFDetailRiwayat');

        // POST Method Routing
        Route::post('/tambah', [PenjemputanSampahMasyarakatController::class, 'tambah'])->name('tambah');
        Route::post('/detail-melacak/{id}', [PenjemputanSampahMasyarakatController::class, 'batal'])->name('batalkan');

        Route::any('/{any?}', function () {
            return redirect()->route('masyarakat.penjemputan.index');
        });
    });
});

// Route Modul Mitra-kurir
Route::group([
    'prefix' => 'mitra-kurir/',
    'as' => 'mitra-kurir.',
], function () {
    Route::middleware(['auth'])->group(function () {
        Route::controller(PenjemputanSampahMitraKurirController::class)->group(function () {
            // Submodul Penjemputan Sampah
            Route::get('penjemputan-sampah/kategori', 'kategori')->name('penjemputan.kategori');
            Route::get('penjemputan-sampah/kategori/detail/{id}', 'detailKategori')->name('penjemputan.detail-kategori');
            Route::get('penjemputan-sampah/permintaan-penjemputan', 'permintaan')->name('penjemputan.permintaan');
            Route::get('penjemputan-sampah/permintaan-penjemputan/detail/{id}', 'detailPermintaan')->name('penjemputan.detail-permintaan');
            Route::put('penjemputan-sampah/permintaan-penjemputan/detail/{id}', 'updateStatus')->name('penjemputan.update-status');

            Route::get('penjemputan-sampah/riwayat-penjemputan', 'riwayat')->name('penjemputan.riwayat-penjemputan');
            Route::get('penjemputan-sampah/riwayat-penjemputan/detail-riwayat/{id}',  'detailRiwayat')->name('penjemputan.detail-riwayat');

            Route::get('penjemputan-sampah/dropbox', 'dropbox')->name('penjemputan.dropbox');
            Route::post('penjemputan-sampah/dropbox', 'updateStatusPelacakan')->name('penjemputan.updateStatus');
            // End Submodul Penjemputan Sampah
        });
    });

    // Submodul Registrasi
    Route::get('registrasi/register', [RegistrasiMitraKurirController::class, 'RegisterIndex'])->middleware('guest')->name('registrasi.register');
    Route::get('registrasi/login', [RegistrasiMitraKurirController::class, 'loginIndex'])->middleware('guest')->name('registrasi.login');

    Route::post('registrasi/register', [RegistrasiMitraKurirController::class, 'simpanData']);
    Route::post('registrasi/login', [RegistrasiMitraKurirController::class, 'LoginAuth'])->name('registrasi.login');
    Route::post('registrasi/logout', [RegistrasiMitraKurirController::class, 'LogoutAuth'])->name('registrasi.logout');
});

Route::post('/{id_pengguna}/otp-validation', [RegistrasiMitraKurirController::class, 'OtpValidation'])->name('otp.validation');
Route::get('/{id_pengguna}/otp-verification', [RegistrasiMitraKurirController::class, 'OtpRedirect'])->name('otp-verification');
// upload dokumen
Route::get('/mitra-kurir/registrasi/document-upload/{id_pengguna}', [RegistrasiMitraKurirController::class, 'UploadDataIndex'])->middleware('auth')->name('upload-data-index');
Route::post('/mitra-kurir/registrasi/document-upload/{id_pengguna}', [RegistrasiMitraKurirController::class, 'UploadValidation'])->name('upload-validate');


// forgot password
Route::get('/mitra-kurir/registrasi/forgot-password-form', [RegistrasiMitraKurirController::class, 'ForgotPasswordFormIndex'])->middleware('guest')->name('reset-password-form');
Route::post('/mitra-kurir/registrasi/forgot-password-form', [RegistrasiMitraKurirController::class, 'ChangeForgotPassword'])->middleware('guest')->name('reset-password-form.post');
Route::get('/mitra-kurir/registrasi/forgot-password', [RegistrasiMitraKurirController::class, 'ForgotPasswordIndex'])->middleware('guest')->name('reset-password');
Route::post('/mitra-kurir/registrasi/forgot-password', [RegistrasiMitraKurirController::class, 'SendForgotPassword'])->middleware('guest')->name('reset-password.post');

Route::post('/mitra-kurir/registrasi/account-profile/security', [RegistrasiMitraKurirController::class, 'ChangePassword'])->middleware('auth')->name('mitra-kurir.registrasi.account-profile.security.post');

// syarat & ketentuan
Route::get('/mitra-kurir/registrasi/syarat-ketentuan', function () {
    return view('/mitra-kurir/registrasi/syarat-dan-ketentuan');
})->name('/mitra-kurir/registrasi/syarat-dan-ketentuan');


// halaman profile
Route::get('/mitra-kurir/registrasi/account-profile/profile', [RegistrasiMitraKurirController::class, 'EditProfileIndex'])->middleware('auth')->name('mitra-kurir.registrasi.account-profile.profile');
Route::post('/mitra-kurir/registrasi/account-profile/profile', [RegistrasiMitraKurirController::class, 'UpdateProfile'])->middleware('auth')->name('mitra-kurir.registrasi.account-profile.profile.post');


// halaman  security
Route::get('/mitra-kurir/registrasi/account-profile/security', [RegistrasiMitraKurirController::class, 'ChangePasswordIndex'])->middleware('auth')->name('mitra-kurir.registrasi.account-profile.security');


// halaman success-message document-upload
Route::get('/mitra-kurir/registrasi/success-message', function () {
    return view('mitra-kurir/registrasi/success-message');
})->middleware('auth')->name('mitra-kurir.registrasi.success-message');

// tes halaman success-message change-password
Route::get('/mitra-kurir/registrasi/success-message-change-password', function () {
    return view('mitra-kurir/registrasi/success-message-change-password');
})->name('mitra-kurir.registrasi.success-message-change-password');

// tes halaman success-message forgot-password
Route::get('/mitra-kurir/registrasi/success-message-forgot-password', function () {
    return view('mitra-kurir/registrasi/success-message-forgot-password');
})->name('mitra-kurir.registrasi.success-message-forgot-password');

// tes halaman success-message data
Route::get('/mitra-kurir/registrasi/success-message-data', function () {
    return view('mitra-kurir/registrasi/success-message-data');
})->name('mitra-kurir.registrasi.success-message-data');

// halaman forgot password link email
Route::get('/mitra-kurir/registrasi/forgot-password-link', function () {
    return view('mitra-kurir/registrasi/forgot-password-link');
})->name('mitra-kurir.registrasi.forgot-password-link');

Route::group([
    'prefix' => 'api/',
    'as' => 'api.',
], function () {
    Route::get('kategori/{id?}', [APIController::class, 'getKategori'])->name('kategori');
    Route::get('jenis/{id?}', [APIController::class, 'getJenis'])->name('jenis');
    Route::get('daerah', [APIController::class, 'getDaerah'])->name('daerah');
    Route::get('dropbox/{id?}', [APIController::class, 'getDropbox'])->name('dropbox');

    Route::get('kategori-by-jenis/{id}', [APIController::class, 'getKategoriByJenis'])->name('kategori-by-jenis');
    Route::get('daerah-by-dropbox/{id}', [APIController::class, 'getDaerahByDropbox'])->name('daerah-by-dropbox');
});
