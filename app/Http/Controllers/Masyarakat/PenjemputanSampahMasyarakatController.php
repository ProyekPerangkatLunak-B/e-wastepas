<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Pengguna;
use App\Models\Pelacakan;
use App\Models\Penjemputan;
use Illuminate\Http\Request;
use App\Models\DetailPenjemputan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PenjemputanSampahMasyarakatController extends Controller
{
    public function __construct() {}

    // Index
    public function index()
    {
        return view('masyarakat.penjemputan-sampah.index');
    }

    // Daftar Kategori
    public function kategori()
    {
        try {
            $kategori = Kategori::orderBy('nama_kategori')
                ->get();
            return view('masyarakat.penjemputan-sampah.kategori', compact('kategori'));
        } catch (\Exception $e) {
            $kategori = [];
            return redirect()->route('masyarakat.penjemputan-sampah.kategori', compact('kategori'))->with('error', 'Gagal Menampilkan Daftar Kategori!');
        }
    }

    // Daftar Permintaan Penjemputan
    public function permintaan()
    {
        return view('masyarakat.penjemputan-sampah.permintaan-penjemputan');
    }

    // Total Riwayat Penjemputan
    public function totalRiwayatPenjemputan()
    {
        $totalSampah = DetailPenjemputan::whereHas('penjemputan.pelacakan', function ($query) {
            $query->where('status', 'Selesai');
        })->count();
        $totalPoin = Penjemputan::whereHas('pelacakan', function ($query) {
            $query->where('status', 'Selesai');
        })->sum('total_poin');
        $penjemputan = Penjemputan::orderByDesc("created_at")->paginate(6);
        return view('masyarakat.penjemputan-sampah.total-riwayat-penjemputan', compact('totalSampah', 'totalPoin', 'penjemputan'));
    }

    // Daftar Riwayat Penjemputan
    public function riwayatPenjemputan()
    {
        $status = Pelacakan::getEnumValues('status');

        // $penjemputan = Penjemputan::orderByDesc("created_at")->paginate(6);
        $penjemputan = Penjemputan::filter(request(['search', 'kategori', 'status']))
            ->orderByDesc("created_at")
            ->paginate(6)
            ->appends(request()->query());


        return view(
            'masyarakat.penjemputan-sampah.riwayat-penjemputan',
            compact([
                'penjemputan',
                'status'
            ])
        );
    }

    // CRUD
    // Select satu Data

    // Daftar Jenis mengacu pada Kategori
    public function detailKategori($id)
    {
        try {
            $jenis = Jenis::where('id_kategori', $id)
                ->orderBy('nama_jenis')
                ->paginate(6);
            $kategori = Kategori::find($id);
            return view('masyarakat.penjemputan-sampah.detail-kategori', compact('jenis', 'kategori'));
        } catch (\Exception $e) {
            return redirect()->route('masyarakat.penjemputan-sampah.kategori')->with('error', 'Gagal Menampilkan Daftar Jenis!');
        }
    }

    // Daftar Penjemputan yang sedang berlangsung
    public function melacak()
    {
        $status = Pelacakan::getEnumValues('status');

        $penjemputan = Penjemputan::join('pelacakan', 'penjemputan.id_penjemputan', '=', 'pelacakan.id_penjemputan')
            ->whereNotIn('pelacakan.status', ['Selesai', 'Dibatalkan'])
            ->whereIn('pelacakan.id_pelacakan', function ($query) {

                $query->select(DB::raw('MAX(id_pelacakan)'))
                    ->from('pelacakan')
                    ->groupBy('id_penjemputan');
            })
            ->orderByDesc('penjemputan.created_at')
            ->select('penjemputan.*')
            ->filter(request(['search', 'kategori', 'status']))
            ->paginate(6)
            ->appends(request()->query());

        return view(
            'masyarakat.penjemputan-sampah.melacak-penjemputan',
            compact('penjemputan', 'status')
        );
    }

    // Detail penjemputan yang sedang berlangsung
    public function detailMelacak($id)
    {
        $penjemputan = Penjemputan::where('id_penjemputan', $id)->first();
        return view('masyarakat.penjemputan-sampah.detail-melacak', compact('penjemputan'));
    }

    // Daftar Riwayat Penjemputan
    public function detailRiwayat($id)
    {
        $penjemputan = Penjemputan::where('id_penjemputan', $id)->first();
        return view('masyarakat.penjemputan-sampah.detail-riwayat', compact('penjemputan'));
    }


    // Perubahan Data
    // Tambah data Penjemputan
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

        if ($request->tanggal_penjemputan < now()) {
            return redirect()->route('masyarakat.penjemputan.permintaan')->with('error', 'Tanggal penjemputan tidak boleh kurang dari hari ini!');
        }

        $hariIni = now()->format('ym');
        if (Penjemputan::where('kode_penjemputan', 'LIKE', 'D' . str_pad($request->dropbox, 3, '0', STR_PAD_LEFT) . 'P' . $hariIni . '%')->count() > 0) {
            $kodeAkhir = Penjemputan::where('kode_penjemputan', 'like', 'D' . str_pad($request->dropbox, 3, '0', STR_PAD_LEFT) . 'P' . $hariIni . '%')->orderByDesc('kode_penjemputan')->first();
            $kodeUrut = (int) substr($kodeAkhir->kode_penjemputan, -3, 3) + 1;
            $kodeUrut = str_pad($kodeUrut, 3, '0', STR_PAD_LEFT);
            $kode = 'D' . str_pad($request->dropbox, 3, '0', STR_PAD_LEFT) . 'P' . $hariIni . $kodeUrut;
        } else {
            $kode = 'D' . str_pad($request->dropbox, 3, '0', STR_PAD_LEFT) . 'P' . $hariIni . '001';
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
            $pelacakan->status = 'Diproses';
            $pelacakan->save();

            return redirect()->route('masyarakat.penjemputan.detail-melacak', ['id' => $pelacakan->id_penjemputan])->with('success', 'Permintaan Penjemputan Berhasil Diajukan!');
        } catch (\Exception $e) {
            return redirect()->route('masyarakat.penjemputan.permintaan')->with('error', 'Gagal Mengajukan Permintaan Penjemputan!');
        }
    }

    // Batalkan Penjemputan yang statusnya masih 'Diproses'
    public function batal(Request $request, $id)
    {
        try {
            $keterangan = $request->keterangan;
            $pelacakan = new Pelacakan();
            $pelacakan->id_penjemputan = $id;
            $pelacakan->status = 'Dibatalkan';
            $pelacakan->keterangan = $keterangan;
            $pelacakan->save();

            Penjemputan::where('id_penjemputan', $id)->update(['updated_at' => now()]);

            return redirect()->route('masyarakat.penjemputan.detail-melacak', ['id' => $id])->with('success', 'Permintaan Penjemputan Berhasil Dibatalkan!');
        } catch (\Exception $e) {
            return redirect()->route('masyarakat.penjemputan.melacak')->with('error', 'Gagal Membatalkan Permintaan Penjemputan!');
        }
    }

    // Untuk Profile Header
    public function showProfile()
    {
        $user = Pengguna::find(Auth::id());
        $profileImage = $user->foto_profil ? asset('storage/' . $user->foto_profil) : null;
        return view('layouts.main', compact('profileImage'));
    }

    // Untuk Export PDF dan Excel
    public function exportPDFRiwayatPenjemputan()
    {
        return view('masyarakat.penjemputan-sampah.export.riwayat-penjemput');
    }

    public function exportPDFDetailRiwayat()
    {
        return view('masyarakat.penjemputan-sampah.export.detail-riwayat');
    }

}
