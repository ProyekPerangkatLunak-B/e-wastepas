<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total berat sampah
        $totalSampah = DB::table('penjemputan')->sum('total_berat');

        $totalPoin = DB::table('penjemputan')->sum('total_poin');

        $riwayat = DB::table('penjemputan')->where('status', 'Diterima')->sum('status')/2;
        
        $terdaftar = DB::table('pengguna')->count('id_pengguna');

        // Mengembalikan data ke view
        return view('manajemen.datamaster.dashboard.index', [
            'totalSampah' => $totalSampah,
            'totalPoin' => $totalPoin,
            'riwayat' => $riwayat,
            'terdaftar' => $terdaftar,
        ]);
    }
}
