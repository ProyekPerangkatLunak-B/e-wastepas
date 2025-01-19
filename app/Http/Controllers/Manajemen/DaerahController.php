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
    public function index(Request $request)
{
    // Menentukan jumlah data per halaman
    $perPage = 8;
    // Mendapatkan halaman saat ini (default ke halaman 1 jika tidak ada)
    $currentPage = $request->get('page', 1);
    // Menghitung offset berdasarkan halaman yang dipilih
    $offset = ($currentPage - 1) * $perPage;

    // Mendapatkan nilai filter dan search
    $filter = $request->input('filter');
    $search = $request->input('search');

    $query = DB::table('daerah as d')
        ->leftJoin('penjemputan as p', 'p.id_daerah', '=', 'd.id_daerah')
        ->leftJoin('pelacakan as pl', 'p.id_penjemputan', '=', 'pl.id_penjemputan')
        ->select(
            'd.nama_daerah',
            DB::raw('COALESCE(SUM(CASE WHEN pl.status = "Selesai" THEN p.total_berat ELSE 0 END), 0) AS total_berat_sampah'),
            DB::raw('COALESCE(SUM(CASE WHEN pl.status = "Selesai" THEN p.total_poin ELSE 0 END), 0) AS total_poin'),
            DB::raw('MAX(CASE WHEN pl.status = "Selesai" THEN 1 ELSE 0 END) AS prioritas')
        )
        ->groupBy('d.id_daerah', 'd.nama_daerah');

    // Filter berdasarkan input dari user
    if ($search) {
        $query->where('d.nama_daerah', 'like', '%' . $search . '%');
    }

    // Memfilter data berdasarkan pilihan filter
    if ($filter == 'poin_tertinggi') {
        $query->orderByDesc('total_poin');
    } elseif ($filter == 'poin_terendah') {
        $query->orderBy('total_poin');
    } elseif ($filter == 'penjemputan_tertinggi') {
        $query->orderByDesc('total_berat_sampah');
    } elseif ($filter == 'penjemputan_terendah') {
        $query->orderBy('total_berat_sampah');
    }
    

    // Mendapatkan data dengan pagination
    $dataDaerah = $query->skip($offset)
        ->take($perPage)
        ->get();

    // Menghitung total data untuk pagination
    $totalData = DB::table('daerah as d')
        ->leftJoin('penjemputan as p', 'p.id_daerah', '=', 'd.id_daerah')
        ->leftJoin('pelacakan as pl', 'p.id_penjemputan', '=', 'pl.id_penjemputan')
        ->select('d.id_daerah')
        ->distinct()
        ->count();

    // Menghitung jumlah total halaman
    $totalPages = ceil($totalData / $perPage);

    // Jika request adalah AJAX, kembalikan data dalam bentuk JSON
    if ($request->ajax()) {
        return response()->json([
            'data' => $dataDaerah,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
        ]);
    }

    // Mengembalikan data ke view untuk non-AJAX requests
    return view('manajemen.datamaster.per-daerah.index', [
        'dataDaerah' => $dataDaerah,
        'currentPage' => $currentPage,
        'totalPages' => $totalPages,
    ]);
}


}