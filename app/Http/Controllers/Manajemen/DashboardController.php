<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jenis;
use App\Models\Penjemputan;
use App\Models\Pengguna;
use App\Models\Kategori;
use App\Models\Pelacakan;

class DashboardController extends Controller
{
    public function index()
{
    // Menggunakan Eloquent untuk menghitung total berat sampah
    $totalSampah = Penjemputan::sum('total_berat');

    $totalPoin = Penjemputan::sum('total_poin');

    $riwayat = Pelacakan::where('status', 'Diterima')->count() / 2;

    $terdaftar = Pengguna::count();

    // $jenis = Jenis::all();

    // Mengembalikan data ke view
    return view('manajemen.datamaster.dashboard.index', [
        'totalSampah' => $totalSampah,
        'totalPoin' => $totalPoin,
        'riwayat' => $riwayat,
        'terdaftar' => $terdaftar,
    ]);
}



    
    

}
