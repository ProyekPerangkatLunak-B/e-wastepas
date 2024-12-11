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
        // Ambil data kategori dari database
        $kategoriData = Kategori::all()->map(function ($kategori) {
            // Hitung poin berdasarkan ID kategori
            $jumlah = DetailPenjemputan::where('id_kategori', $kategori->id)->count();
            $poinPerItem = match ($kategori->id) {
                1 => 20,
                2 => 10,
                3 => 5,
                default => 1, // Default poin jika ID tidak dikenali
            };
            $totalPoin = $jumlah * $poinPerItem;
    
            return [
                'nama_kategori' => $kategori->nama_kategori,
                'deskripsi_kategori' => $kategori->deskripsi_kategori,
                'poin' => $totalPoin,
            ];
        });
    
        return view('manajemen.datamaster.kategori.index', [
            'kategoriData' => $kategoriData,
        ]);
    }


}
