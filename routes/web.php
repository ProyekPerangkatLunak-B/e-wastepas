<?php

use App\Http\Controllers\MitraKurir\RegistrasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registrasi', [RegistrasiController::class, 'index']);

Route::post('/registrasi', [RegistrasiController::class, 'simpanData']);

Route::get('/otp', function () {
    return view('mitra-kurir/registrasi/otp');
});
