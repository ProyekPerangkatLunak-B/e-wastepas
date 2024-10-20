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
    'prefix' => '/masyarakat',
    'as' => 'masyarakat.',
], function () {
    Route::resource('/penjemputan-sampah', PenjemputanSampahController::class);
});

// Route Modul Mitra-kurir, registrasi dan penjemputan-sampah