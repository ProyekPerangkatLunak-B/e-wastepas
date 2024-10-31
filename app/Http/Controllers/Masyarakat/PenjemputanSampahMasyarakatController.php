<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenjemputanSampahMasyarakatController extends Controller
{
    public function __construct() {}
    public function index()
    {
        return view('masyarakat.penjemputan-sampah.index');
    }
    public function kategori()
    {
        $kategori = [];
        return view('masyarakat.penjemputan-sampah.kategori', compact('kategori'));
    }

    public function permintaan()
    {
        $kategori = [];
        $jenis = [];
        $alamatDropbox = [];
        return view('masyarakat.penjemputan-sampah.permintaan-penjemputan', compact('kategori', 'jenis', 'alamatDropbox'));
    }

    public function melacak()
    {
        $penjemputan = [];
        return view('masyarakat.penjemputan-sampah.melacak-penjemputan', compact('penjemputan'));
    }

    public function detailKategori()
    {
        return view('masyarakat.penjemputan-sampah.detail-kategori');
    }

    public function detailMelacak()
    {
        return view('masyarakat.penjemputan-sampah.detail-melacak');
    }
}
