<?php

namespace App\Http\Controllers\Manajemen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPenjemputan;
use App\Models\Kategori;


class KategoriController extends Controller
{

    public function index()
    {
        // Total berat semua kategori
        $totalBeratSemuaKategori = DetailPenjemputan::join('penjemputan', 'detail_penjemputan.id_penjemputan', '=', 'penjemputan.id_penjemputan')
            ->join('pelacakan', 'penjemputan.id_penjemputan', '=', 'pelacakan.id_penjemputan')
            ->where('pelacakan.status', 'Selesai')
            ->sum('penjemputan.total_berat');
    
        $categories = Kategori::all()->map(function ($kategori) use ($totalBeratSemuaKategori) {
            $totalBerat = DetailPenjemputan::join('penjemputan', 'detail_penjemputan.id_penjemputan', '=', 'penjemputan.id_penjemputan')
                ->join('pelacakan', 'penjemputan.id_penjemputan', '=', 'pelacakan.id_penjemputan')
                ->where('detail_penjemputan.id_kategori', $kategori->id_kategori)
                ->where('pelacakan.status', 'Selesai')
                ->sum('penjemputan.total_berat');
    
            $totalPoin = DetailPenjemputan::join('penjemputan', 'detail_penjemputan.id_penjemputan', '=', 'penjemputan.id_penjemputan')
                ->join('pelacakan', 'penjemputan.id_penjemputan', '=', 'pelacakan.id_penjemputan')
                ->where('detail_penjemputan.id_kategori', $kategori->id_kategori)
                ->where('pelacakan.status', 'Selesai')
                ->sum('penjemputan.total_poin');
    
            $persentase = $totalBeratSemuaKategori > 0 ? ($totalBerat / $totalBeratSemuaKategori) * 100 : 0;
            
    
            return [
                'id_kategori' => $kategori->id_kategori,
                'nama_kategori' => $kategori->nama_kategori,
                'deskripsi_kategori' => $kategori->deskripsi_kategori,
                'gambar' => $kategori->gambar,
                'total_berat' => $totalBerat,
                'total_poin' => $totalPoin,
                'persentase' => round($persentase, 2), // Persentase dengan 2 angka desimal
            ];

            
        });
    
        // Urutkan berdasarkan persentase (descending)
        $categories = $categories->sortByDesc('persentase');
    
        return view('manajemen.datamaster.kategori.index', compact('categories'));
    }
       
}