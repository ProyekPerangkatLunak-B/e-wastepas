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

class DaerahController extends Controller
{
    public function index()
    {
        // Query untuk mengambil data lengkap 10 daerah dengan prioritas urutan
        $dataDaerah = DB::table('daerah as d')
            ->leftJoin('penjemputan as p', 'p.id_daerah', '=', 'd.id_daerah')
            ->leftJoin('pelacakan as pl', 'p.id_penjemputan', '=', 'pl.id_penjemputan')
            ->select(
                'd.nama_daerah',
                DB::raw('COALESCE(SUM(CASE WHEN pl.status = "Selesai" THEN p.total_berat ELSE 0 END), 0) AS total_berat_sampah'),
                DB::raw('COALESCE(SUM(CASE WHEN pl.status = "Selesai" THEN p.total_poin ELSE 0 END), 0) AS total_poin'),
                DB::raw('MAX(CASE WHEN pl.status = "Selesai" THEN 1 ELSE 0 END) AS prioritas')
            )
            ->groupBy('d.id_daerah', 'd.nama_daerah')
            ->orderByDesc('prioritas') // Prioritas tertinggi tetap muncul lebih dulu
            ->orderByDesc('total_berat_sampah') // Berat sampah tertinggi muncul lebih dulu
            ->orderBy('d.id_daerah')   // Urutan default jika semua sama
            ->paginate(8);  // Menambahkan pagination, 8 item per halaman
        
            $topDaerah = DB::table('daerah as d')
            ->leftJoin('penjemputan as p', 'p.id_daerah', '=', 'd.id_daerah')
            ->leftJoin('pelacakan as pl', 'p.id_penjemputan', '=', 'pl.id_penjemputan')
            ->select(
                'd.nama_daerah',
                DB::raw('COALESCE(SUM(CASE WHEN pl.status = "Selesai" THEN p.total_berat ELSE 0 END), 0) AS total_berat_sampah')
            )
            ->groupBy('d.id_daerah', 'd.nama_daerah')
            ->orderByDesc('total_berat_sampah') // Urutkan berdasarkan total berat sampah
            ->limit(6) // Ambil 6 daerah teratas
            ->get();

        // Mengembalikan data ke view
        return view('manajemen.datamaster.per-daerah.index', [
            'dataDaerah' => $dataDaerah,
            'topDaerah' => $topDaerah,
        ]);
        
    }
}    
