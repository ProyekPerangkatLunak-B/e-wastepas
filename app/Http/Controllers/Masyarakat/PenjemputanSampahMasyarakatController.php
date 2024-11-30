<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\Jenis;
use App\Models\Daerah;
use App\Models\Sampah;
use App\Models\Dropbox;
use App\Models\Kategori;
use App\Models\Pengguna;
use App\Models\Pelacakan;
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

        $poinKategori = 0;
        $poinJenis = 0;
        $totalPoin = 0;
        foreach ($request->kategori as $key => $value) {
            $poinKategori = Kategori::where('id_kategori', $value)->first()->poin;
            $poinJenis = Jenis::where('id_jenis', $request->jenis[$key])->first()->poin;
            $totalPoin += $poinKategori + $poinJenis;
        }

        try {
            $penjemputan = new Penjemputan();
            $penjemputan->id_pengguna_masyarakat = '1';
            $penjemputan->id_pengguna_kurir = '2';
            $penjemputan->id_daerah = $request->daerah;
            $penjemputan->id_dropbox = $request->dropbox;
            $penjemputan->total_berat = array_sum($request->berat);
            $penjemputan->total_poin = $totalPoin;
            $penjemputan->alamat_penjemputan = $request->alamat;
            $penjemputan->tanggal_penjemputan = $request->tanggal_penjemputan;
            $penjemputan->catatan = $request->catatan;
            $penjemputan->save();

            foreach ($request->kategori as $key => $value) {
                $SampahDetail = new SampahDetail();
                $SampahDetail->id_penjemputan = $penjemputan->id_penjemputan;
                $SampahDetail->id_kategori = $value;
                $SampahDetail->id_jenis = $request->jenis[$key];
                $SampahDetail->berat = $request->berat[$key];
                $SampahDetail->save();
            }

            $pelacakan = new Pelacakan();
            $pelacakan->id_penjemputan = $penjemputan->id_penjemputan;
            $pelacakan->status = 'Menunggu Konfirmasi';
            $pelacakan->save();
            return redirect()->route('masyarakat.penjemputan.melacak')->with('success', 'Permintaan Penjemputan Berhasil Diajukan!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('masyarakat.penjemputan.permintaan')->with('error', 'Gagal Mengajukan Permintaan Penjemputan!');
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
        $totalSampah = SampahDetail::whereHas('penjemputan.penggunaMasyarakat', function ($query) {
            $query->where('id_pengguna', '1');
        })->count();
        $totalPoin = Penjemputan::sum('total_poin');
        $penjemputan = Penjemputan::all();
        return view('masyarakat.penjemputan-sampah.total-riwayat-penjemputan', compact('totalSampah', 'totalPoin', 'penjemputan'));
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
