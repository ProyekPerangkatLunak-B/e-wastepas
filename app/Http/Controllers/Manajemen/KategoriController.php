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
    $categories = Kategori::all()->map(function ($kategori) {
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

        return [
            'id_kategori' => $kategori->id_kategori,
            'nama_kategori' => $kategori->nama_kategori,
            'deskripsi_kategori' => $kategori->deskripsi_kategori,
            'gambar' => $kategori->gambar,
            'total_berat' => $totalBerat,
            'total_poin' => $totalPoin,
        ];
    });

    return view('manajemen.datamaster.kategori.index', compact('categories'));
}

}