<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\Jenis;
use App\Models\Daerah;
use App\Models\Sampah;
use App\Models\Dropbox;
use App\Models\Kategori;
use App\Models\Penjemputan;
use App\Models\SampahDetail;
use Illuminate\Http\Request;
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
        $kategori = Kategori::all();
        return view('masyarakat.penjemputan-sampah.kategori', compact('kategori'));
    }

    public function permintaan()
    {
        $kategori = Kategori::all();
        $jenis = Jenis::all();
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

            foreach ($request->kategori as $key => $value) {
                $sampah = new Sampah();
                $sampah->id_kategori = $value;
                $sampah->id_jenis = $request->jenis[$key];
                $sampah->deskripsi = $request->catatan[$key];
                $sampah->berat = $request->berat[$key];
                $sampah->save();

                $SampahDetail = new SampahDetail();
                $SampahDetail->id_penjemputan = $penjemputan->id_penjemputan;
                $SampahDetail->id = $sampah->id;
                $SampahDetail->save();
            }
            return redirect()->route('masyarakat.penjemputan.melacak')->with('success', 'Permintaan Penjemputan Berhasil Diajukan!');
        } catch (\Exception $e) {
            return redirect()->route('masyarakat.penjemputan.index')->with('error', 'Gagal Mengajukan Permintaan Penjemputan!');
        }
    }

    public function melacak()
    {
        $penjemputan = Penjemputan::orderByDesc('created_at')->paginate(6);
        return view('masyarakat.penjemputan-sampah.melacak-penjemputan', compact('penjemputan'));
    }

    public function detailKategori($id)
    {
        $jenis = Jenis::where('id_kategori', $id)->paginate(6);
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