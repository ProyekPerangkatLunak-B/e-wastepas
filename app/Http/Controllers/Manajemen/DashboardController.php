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

// class DashboardController extends Controller
// {
//     public function index()
//     {
//         // Menghitung total berat sampah dengan status "Selesai"
//         $totalSampah = Pelacakan::where('status', 'Selesai')
//             ->with('penjemputan') // Relasi ke tabel penjemputan
//             ->get()
//             ->sum(function ($pelacakan) {
//                 return $pelacakan->penjemputan->total_berat ?? 0;
//             });
    
//         // Menghitung total poin dari penjemputan dengan status "Selesai"
//         $totalPoin = Pelacakan::where('status', 'Selesai')
//             ->with('penjemputan') // Relasi ke tabel penjemputan
//             ->get()
//             ->sum(function ($pelacakan) {
//                 return $pelacakan->penjemputan->total_poin ?? 0;
//             });
    
//         // Menghitung jumlah riwayat berdasarkan tabel pelacakan
//         $riwayat = Pelacakan::where('status', 'Selesai')->count();
    
//         // Menghitung jumlah pengguna terdaftar
//         $terdaftar = Pengguna::count();
    
//         // Mengirim data ke view
//         return view('manajemen.datamaster.dashboard.index', [
//             'totalSampah' => $totalSampah,
//             'totalPoin' => $totalPoin,
//             'riwayat' => $riwayat,
//             'terdaftar' => $terdaftar,
//         ]);
//     }
    
// }

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
    
    // Mengirim data ke view
    return view('manajemen.datamaster.dashboard.index', [
        'totalSampah' => $totalSampah,
        'totalPoin' => $totalPoin,
        'riwayat' => $riwayat,
        'terdaftar' => $terdaftar,
        'categories' => $categories,
    ]);    
    }
}
