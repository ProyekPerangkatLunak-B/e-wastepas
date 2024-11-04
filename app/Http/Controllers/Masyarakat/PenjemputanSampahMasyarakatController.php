<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\JenisSampah;
use Illuminate\Http\Request;
use App\Models\KategoriSampah;
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
        $kategori = KategoriSampah::all();
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

    public function detailKategori($id)
    {
        $jenis = JenisSampah::where('id_kategori_sampah', $id)->paginate(6);
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
