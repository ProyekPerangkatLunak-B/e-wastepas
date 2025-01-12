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
    // Menentukan jumlah data per halaman
    $perPage = 8;

    // Mendapatkan halaman saat ini (default ke halaman 1 jika tidak ada)
    $currentPage = request()->get('page', 1);

    // Menghitung offset berdasarkan halaman yang dipilih
    $offset = ($currentPage - 1) * $perPage;

    // Query untuk mengambil data dengan offset dan limit
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
        ->orderByDesc('prioritas')
        ->orderByDesc('total_berat_sampah')
        ->orderBy('d.id_daerah')
        ->skip($offset) // Skip berdasarkan halaman
        ->take($perPage) // Ambil data berdasarkan per halaman
        ->get();

    // Menghitung total data untuk pagination
    $totalData = DB::table('daerah as d')
        ->leftJoin('penjemputan as p', 'p.id_daerah', '=', 'd.id_daerah')
        ->leftJoin('pelacakan as pl', 'p.id_penjemputan', '=', 'pl.id_penjemputan')
        ->select('d.id_daerah')
        ->distinct() // Pastikan menghitung daerah yang unik saja
        ->count();

    // Menghitung jumlah total halaman
    $totalPages = ceil($totalData / $perPage);

    // Mengembalikan data ke view dengan data pagination manual
    return view('manajemen.datamaster.per-daerah.index', [
        'dataDaerah' => $dataDaerah,
        'currentPage' => $currentPage,
        'totalPages' => $totalPages,
    ]);
}

    
    
}    


