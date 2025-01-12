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
        ->with('penjemputan')
        ->get()
        ->sum(function ($pelacakan) {
            return $pelacakan->penjemputan->total_berat ?? 0;
        });

    // Mengambil data kategori dan menghitung berat sampah per kategori
    $categories = Kategori::all()->map(function ($kategori) use ($totalSampah) {
        $totalBeratKategori = Pelacakan::join('penjemputan', 'pelacakan.id_penjemputan', '=', 'penjemputan.id_penjemputan')
            ->join('detail_penjemputan', 'penjemputan.id_penjemputan', '=', 'detail_penjemputan.id_penjemputan')
            ->where('detail_penjemputan.id_kategori', $kategori->id_kategori)
            ->where('pelacakan.status', 'Selesai')
            ->sum('penjemputan.total_berat');
    
        return [
            'nama_kategori' => $kategori->nama_kategori,
            'berat' => $totalBeratKategori,
        ];
    });
    
    // Hitung total berat dari semua kategori
    $totalBeratSemuaKategori = $categories->sum('berat');
    
    // Normalisasi persentase agar totalnya 100%
    $categories = $categories->map(function ($category) use ($totalBeratSemuaKategori) {
        $persentase = $totalBeratSemuaKategori > 0 ? ($category['berat'] / $totalBeratSemuaKategori) * 100 : 0;
        return [
            'nama_kategori' => $category['nama_kategori'],
            'persentase' => round($persentase, 2), // Dibulatkan 2 desimal
        ];
    });
    
    // Urutkan kategori berdasarkan persentase (descending) dan ambil 3 data teratas
    $categories = $categories->sortByDesc('persentase')->take(3);
    
    // Data lainnya tetap
    $totalPoin = Pelacakan::where('status', 'Selesai')
        ->with('penjemputan')
        ->get()
        ->sum(function ($pelacakan) {
            return $pelacakan->penjemputan->total_poin ?? 0;
        });
    
    $riwayat = Pelacakan::where('status', 'Selesai')->count();
    $terdaftar = Pengguna::count();

    // Ambil 6 daerah teratas berdasarkan total berat sampah
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

        $topDropbox = DB::table('dropbox as db')
        ->leftJoin('penjemputan as p', 'db.id_dropbox', '=', 'p.id_dropbox')
        ->leftJoin('pelacakan as pl', 'p.id_penjemputan', '=', 'pl.id_penjemputan')
        ->select(
            'db.nama_dropbox',
            DB::raw('COALESCE(SUM(CASE WHEN pl.status = "Selesai" THEN p.total_berat ELSE 0 END), 0) AS total_berat_sampah')
        )
        ->groupBy('db.id_dropbox', 'db.nama_dropbox')
        ->orderByDesc('total_berat_sampah') // Urutkan berdasarkan berat
        ->limit(4) // Ambil 4 dropbox tertinggi
        ->get();
    
    // Mengirim data ke view
    return view('manajemen.datamaster.dashboard.index', [
        'totalSampah' => $totalSampah,
        'totalPoin' => $totalPoin,
        'riwayat' => $riwayat,
        'terdaftar' => $terdaftar,
        'categories' => $categories,
        'topDaerah' => $topDaerah,
        'topDropbox' => $topDropbox,
    ]);    
    }
}
