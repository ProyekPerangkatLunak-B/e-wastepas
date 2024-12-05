<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jenis;
use App\Models\Daerah;
use App\Models\Dropbox;
use App\Models\Kategori;

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

        // Ambil data dari database
        $jenis = Jenis::all(); // Pastikan model dan tabel benar

        // Kirim data ke view
        return view('manajemen.datamaster.kategori.index', compact('jenis'));

    }



    
    

}
