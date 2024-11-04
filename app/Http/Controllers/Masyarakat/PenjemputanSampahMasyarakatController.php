<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PenjemputanSampahMasyarakatController extends Controller
{
    public function __construct() {}
    public function index()
    {
        return view('masyarakat.penjemputan-sampah.index');
    }
    public function kategori()
    {
        $kategori = DB::table('kategori_sampah')->get();
        return view('masyarakat.penjemputan-sampah.kategori', compact('kategori'));
    }

    public function permintaan()
    {
        $kategori = DB::table('kategori_sampah')->get();
        $jenis = DB::table('jenis_sampah')->get();
        $dropbox = DB::table('dropbox')->get();
        return view('masyarakat.penjemputan-sampah.permintaan-penjemputan', compact('kategori', 'jenis', 'dropbox'));
    }

    public function melacak()
    {
        $penjemputan = [];
        return view('masyarakat.penjemputan-sampah.melacak-penjemputan', compact('penjemputan'));
    }

    public function detailKategori()
    {
        $jenis = DB::table('jenis_sampah')->get();
        return view('masyarakat.penjemputan-sampah.detail-kategori', compact('jenis'));
    }

    public function detailMelacak()
    {
        return view('masyarakat.penjemputan-sampah.detail-melacak');
    }

    public function totalRiwayatPenjemputan()
    {
        $penjemputan = [];
        return view('masyarakat.penjemputan-sampah.total-riwayat-penjemputan', compact('penjemputan'));
    }

    public function riwayatPenjemputan()
    {
        $penjemputan = [];
        return view('masyarakat.penjemputan-sampah.riwayat-penjemputan', compact('penjemputan'));
    }

    public function detailRiwayat()
    {
        return view('masyarakat.penjemputan-sampah.detail-riwayat');
    }
}
