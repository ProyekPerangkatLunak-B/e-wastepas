<?php

namespace App\Http\Controllers\MitraKurir;

use App\Http\Controllers\Controller;
use App\Models\Dropbox;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Pelacakan;
use App\Models\Pengguna;
use App\Models\Penjemputan;
use App\Models\SampahDetail;
use Illuminate\Http\Request;
use App\Models\JenisSampah;
use App\Models\KategoriSampah;
use Illuminate\Support\Facades\DB;

class PenjemputanSampahMitraKurirController extends Controller
{

    //untuk mengambil data dari database tabel kategori_sampah
    public function kategori()
    {
        $kategori = Kategori::all();
        return view(('mitra-kurir.penjemputan-sampah.kategori'), compact('kategori'));
    }

    //untuk mengambil data dari database tabel jenis_sampah
    public function detailKategori($id)
    {
        $jenis = Jenis::where('id_kategori', $id)->paginate(6);
        $kategori = Kategori::find($id);
        return view('mitra-kurir.penjemputan-sampah.detail-kategori', compact('jenis', 'kategori'));
    }

    public function permintaan()
    {
        $data = DB::table('penjemputan')
            ->join('pelacakan', 'penjemputan.id_pengguna_masyarakat', '=', 'pelacakan.id_pelacakan')
            ->join('pengguna', 'penjemputan.id_pengguna_masyarakat', '=', 'pengguna.id_pengguna')
            ->join('sampah_detail', 'penjemputan.id_pengguna_masyarakat', '=', 'sampah_detail.id_penjemputan')
            ->join('jenis', 'jenis.id_jenis', '=', 'sampah_detail.id_jenis')
            ->where('pelacakan.status', 'Menunggu Konfirmasi')
            ->select('pengguna.nama', 'pelacakan.status','pelacakan.id_pelacakan','jenis.nama_jenis','sampah_detail.berat','penjemputan.id_penjemputan')
            ->get();

        return view('mitra-kurir.penjemputan-sampah.permintaan-penjemputan', compact('data'));
    }

    public function detailPermintaan($id)
    {
        $data = DB::table('penjemputan')
            ->join('pelacakan', 'penjemputan.id_pengguna_masyarakat', '=', 'pelacakan.id_pelacakan')
            ->join('pengguna', 'penjemputan.id_pengguna_masyarakat', '=', 'pengguna.id_pengguna')
            ->join('sampah_detail', 'penjemputan.id_pengguna_masyarakat', '=', 'sampah_detail.id_penjemputan')
            ->join('jenis', 'jenis.id_jenis', '=', 'sampah_detail.id_jenis')
            ->join('kategori', 'jenis.id_kategori', '=', 'kategori.id_kategori')
            ->join('dropbox', 'penjemputan.id_dropbox', '=', 'dropbox.id_dropbox')
            ->where('penjemputan.id_penjemputan', $id)
            ->select('pengguna.nama', 'pelacakan.status','pelacakan.id_pelacakan','jenis.nama_jenis','sampah_detail.berat',
                'penjemputan.id_penjemputan','penjemputan.alamat_penjemputan','penjemputan.tanggal_penjemputan','alamat_dropbox','kategori.nama_kategori')
            ->get();

        return view('mitra-kurir.penjemputan-sampah.detail-permintaan', compact('data',));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu Konfirmasi,Dijemput Driver',
        ]);

        // Ambil data pelacakan berdasarkan ID
        $pelacakan = Pelacakan::find($id);

        if (!$pelacakan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Update status
        $pelacakan->status = $request->status;
        $pelacakan->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }


//    public function updateStatus(Request $request)
//    {
//        $request->validate([
//            'status' => 'required|in:Menunggu Konfirmasi,Dijemput Driver',
//        ]);
//
//        $pelacakan = Pelacakan::all();
//
//        if (!$pelacakan) {
//            return redirect()->back()->with('error', 'Data tidak ditemukan.');
//        }
//
//        $pelacakan->status = $request->status;
//        $pelacakan->save();
//
//        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
//    }

    public function dropbox()
    {
        return view('mitra-kurir.penjemputan-sampah.dropbox');
    }

    public function riwayat()
    {
        return view('mitra-kurir.penjemputan-sampah.riwayat');
    }
}
