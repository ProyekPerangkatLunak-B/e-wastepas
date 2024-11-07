<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\Daerah;
use App\Models\Sampah;
use App\Models\Dropbox;
use App\Models\JenisSampah;
use App\Models\Penjemputan;
use Illuminate\Http\Request;
use App\Models\KategoriSampah;
use App\Models\DetailPenjemputan;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\TryCatch;

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
        $kategori = KategoriSampah::all();
        $jenis = JenisSampah::all();
        $daerah = Daerah::all();
        $dropbox = Dropbox::all();
        return view('masyarakat.penjemputan-sampah.permintaan-penjemputan', compact('kategori', 'jenis', 'daerah', 'dropbox'));
    }

    public function tambah(Request $request)
    {
        $request->validate([
            // Validasi untuk sampah
            'kategori' => 'required',
            'jenis' => 'required',
            'berat' => 'required',
            // Validasi untuk penjemputan
            'daerah' => 'required',
            'dropbox' => 'required',
            'alamat' => 'required',
            'tanggal_penjemputan' => 'required',
        ]);

        try {
            $penjemputan = new Penjemputan();
            $penjemputan->id_pengguna = '1';
            $penjemputan->id_dropbox = $request->dropbox;
            $penjemputan->lokasi_penjemputan = $request->alamat;
            $penjemputan->status_permintaan = 'Menunggu Konfirmasi';
            $penjemputan->waktu_permintaan = $request->tanggal_penjemputan;
            $penjemputan->save();

            $sampah = new Sampah();
            $sampah->id_kategori_sampah = $request->kategori;
            $sampah->id_jenis_sampah = $request->jenis;
            $sampah->deskripsi_sampah = $request->catatan;
            $sampah->berat_sampah = $request->berat;
            $sampah->save();

            $detailPenjemputan = new DetailPenjemputan();
            $detailPenjemputan->id_penjemputan = $penjemputan->id_penjemputan;
            $detailPenjemputan->id_sampah = $sampah->id_sampah;
            $detailPenjemputan->save();
            return redirect()->route('masyarakat.penjemputan.detail-melacak')->with('success', 'Permintaan penjemputan sampah berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('masyarakat.penjemputan.index')->with('error', 'Permintaan penjemputan sampah gagal ditambahkan');
        }
    }

    public function melacak()
    {
        $detailPenjemputan = DetailPenjemputan::paginate(6);
        return view('masyarakat.penjemputan-sampah.melacak-penjemputan', compact('detailPenjemputan'));
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