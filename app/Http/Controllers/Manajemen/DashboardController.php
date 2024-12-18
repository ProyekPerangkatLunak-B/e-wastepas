<?php

namespace App\Http\Controllers\Manajemen;

use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Pengguna;
use App\Models\Pelacakan;
use App\Models\Penjemputan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total berat sampah dengan status "Selesai"
        $totalSampah = Pelacakan::where('status', 'Selesai')
            ->with('penjemputan') // Relasi ke tabel penjemputan
            ->get()
            ->sum(function ($pelacakan) {
                return $pelacakan->penjemputan->total_berat ?? 0;
            });
    
        // Menghitung total poin dari penjemputan dengan status "Selesai"
        $totalPoin = Pelacakan::where('status', 'Selesai')
            ->with('penjemputan') // Relasi ke tabel penjemputan
            ->get()
            ->sum(function ($pelacakan) {
                return $pelacakan->penjemputan->total_poin ?? 0;
            });
    
        // Menghitung jumlah riwayat berdasarkan tabel pelacakan
        $riwayat = Pelacakan::where('status', 'Selesai')->count();
    
        // Menghitung jumlah pengguna terdaftar
        $terdaftar = Pengguna::count();
    
        // Mengirim data ke view
        return view('manajemen.datamaster.dashboard.index', [
            'totalSampah' => $totalSampah,
            'totalPoin' => $totalPoin,
            'riwayat' => $riwayat,
            'terdaftar' => $terdaftar,
        ]);
    }
    
}
