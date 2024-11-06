<?php

namespace App\Http\Controllers\MitraKurir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisSampah;
use App\Models\KategoriSampah;

class PenjemputanSampahMitraKurirController extends Controller
{

    //untuk mengambil data dari database tabel kategori_sampah
    public function kategori()
    {
        $kategori = KategoriSampah::all();
        return view(('mitra-kurir.penjemputan-sampah.kategori'), compact('kategori'));
    }

    //untuk mengambil data dari database tabel jenis_sampah
    public function detailKategori($id)
    {
        $jenis = JenisSampah::where('id_kategori_sampah', $id)->paginate(6);
        $namaKategori = KategoriSampah::where('nama_kategori_sampah');
        return view('mitra-kurir.penjemputan-sampah.detail-kategori', compact('jenis'));
    }
    
    public function permintaan()
    {
        return view('mitra-kurir.penjemputan-sampah.permintaan-penjemputan');
    }

    public function dropbox()
    {
        return view('mitra-kurir.penjemputan-sampah.dropbox');
    }

    public function riwayat()
    {
        return view('mitra-kurir.penjemputan-sampah.riwayat');
    }
}
