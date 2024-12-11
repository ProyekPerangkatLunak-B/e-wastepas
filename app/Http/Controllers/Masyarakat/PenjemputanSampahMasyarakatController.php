<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\Jenis;
use App\Models\Daerah;
use App\Models\Dropbox;
use App\Models\Kategori;
use App\Models\Pelacakan;
use App\Models\Penjemputan;
use App\Models\DetailPenjemputan;
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

        $kodeAkhir = Penjemputan::orderByDesc('id_penjemputan')->first();
        $hariIni = now()->format('ym');
        if (!$kodeAkhir) {
            $kode = 'U001P' . $hariIni . '001';
        } else {
            if (substr($kodeAkhir->kode_penjemputan, -7, 4) !== $hariIni) {
                $kode = 'U001P' . $hariIni . '001';
            } else {
                $kode = 'U001P' . $hariIni . str_pad((int)substr($kodeAkhir->kode_penjemputan, -3) + 1, 3, '0', STR_PAD_LEFT);
            }
        }

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
            $penjemputan->kode_penjemputan = $kode;
            $penjemputan->id_pengguna_masyarakat = '1';
            $penjemputan->id_pengguna_kurir = null;
            $penjemputan->id_daerah = $request->daerah;
            $penjemputan->id_dropbox = $request->dropbox;
            $penjemputan->total_berat = array_sum($request->berat);
            $penjemputan->total_poin = $totalPoin;
            $penjemputan->alamat_penjemputan = $request->alamat;
            $penjemputan->tanggal_penjemputan = $request->tanggal_penjemputan;
            $penjemputan->catatan = $request->catatan;
            $penjemputan->save();

            foreach ($request->kategori as $key => $value) {
                $detailPenjemputan = new DetailPenjemputan();
                $detailPenjemputan->id_penjemputan = $penjemputan->id_penjemputan;
                $detailPenjemputan->id_kategori = $value;
                $detailPenjemputan->id_jenis = $request->jenis[$key];
                $detailPenjemputan->berat = $request->berat[$key];
                $detailPenjemputan->save();
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
        $kategori = Kategori::all();
        // $penjemputan = Penjemputan::whereHas(
        //     'pelacakan',
        //     function ($query) {
        //         $query->where('status', 'Menunggu Konfirmasi')
        //             ->orWhere('status', 'Dijemput Driver')
        //             ->orWhere('status', 'Menuju Dropbox');
        //     }
        // )
        //     ->where('status', 'Diproses')
        //     ->orWhere('status', 'Diterima')
        //     ->orderByDesc('created_at')->paginate(6);
        $penjemputan = Penjemputan::filter(request(['search', 'kategori']))
        ->where('status', '!=', 'Ditolak')
        ->where('status', '!=', 'Dibatalkan')
            ->orderByDesc('created_at')->paginate(6);

        return view(
            'masyarakat.penjemputan-sampah.melacak-penjemputan', 
        compact([
                'penjemputan',
                'kategori'
            ]));
    }

    public function detailKategori($id)
    {
        $jenis = Jenis::where('id_kategori', $id)->paginate(6);
        return view('masyarakat.penjemputan-sampah.detail-kategori', compact('jenis'));
    }

    public function detailMelacak($id)
    {
        $penjemputan = Penjemputan::where('id_penjemputan', $id)->first();
        return view('masyarakat.penjemputan-sampah.detail-melacak', compact('penjemputan'));
    }

    public function totalRiwayatPenjemputan()
    {
        $totalSampah = DetailPenjemputan::whereHas('penjemputan.pelacakan', function ($query) {
            $query->where('status', 'Sudah Sampai');
        })->count();
        $totalPoin = Penjemputan::whereHas('pelacakan', function ($query) {
            $query->where('status', 'Sudah Sampai');
        })->sum('total_poin');
        $penjemputan = Penjemputan::orderByDesc("created_at")->paginate(6);
        return view('masyarakat.penjemputan-sampah.total-riwayat-penjemputan', compact('totalSampah', 'totalPoin', 'penjemputan'));
    }

    public function riwayatPenjemputan()
    {
        // $penjemputan = Penjemputan::orderByDesc("created_at")->paginate(6);
        $penjemputan = Penjemputan::filter(request(['search', 'kategori']))->paginate(6);
        $kategori = Kategori::all();

        // dd($penjemputan);

        return view(
            'masyarakat.penjemputan-sampah.riwayat-penjemputan',
            compact([
                'penjemputan',
                'kategori'
            ])
        );
    }

    public function detailRiwayat($id)
    {
        $penjemputan = Penjemputan::where('id_penjemputan', $id)->first();
        return view('masyarakat.penjemputan-sampah.detail-riwayat', compact('penjemputan'));
    }
}
