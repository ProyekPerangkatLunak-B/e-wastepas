<?php

namespace App\Http\Controllers\Manajemen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
    $kategori1 = DB::table('detail_penjemputan')
    ->where('id_kategori', 1)
    ->count();

    $kategori1Total = $kategori1 * 20;

    $kategori2 = DB::table('detail_penjemputan')
    ->where('id_kategori', 2)
    ->count();

    $kategori2Total = $kategori2 * 10;
    
    $kategori3 = DB::table('detail_penjemputan')
    ->where('id_kategori', 3)
    ->count();

    $kategori3Total = $kategori3 * 5;

    // buat nama sampahnya
    $NamaKategori1 = DB::table('kategori')->where('nama_kategori', 'Besar')->first();
    $NamaKategori2 = DB::table('kategori')->where('nama_kategori', 'Sedang')->first();
    $NamaKategori3 = DB::table('kategori')->where('nama_kategori', 'Kecil')->first();

    return view('manajemen.datamaster.kategori.index', [
        'kategori1' => $kategori1Total,
        'kategori2' => $kategori2Total,
        'kategori3' => $kategori3Total,
        'NamaKategori1' => $NamaKategori1,
        'NamaKategori2' => $NamaKategori2,
        'NamaKategori3' => $NamaKategori3,
    ]);
    }


}
