<?php

namespace App\Http\Controllers\Manajemen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penjemputan;
use App\Models\DetailPenjemputan;
use Illuminate\Support\Facades\DB;

class Top10Controller extends Controller
{
    public function index()
    {
        // Ambil data berdasarkan id_pengguna_masyarakat
        $topMasyarakat = Penjemputan::select('pengguna.nama', 'pengguna.foto_profil', DB::raw('COUNT(penjemputan.id_pengguna_masyarakat) as total_penjemputan'), 'pengguna.subtotal_poin as poin')
        ->join('pengguna', 'penjemputan.id_pengguna_masyarakat', '=', 'pengguna.id_pengguna')
        ->join('pelacakan', 'pelacakan.id_penjemputan', '=', 'penjemputan.id_penjemputan')
        ->where('pelacakan.status', '=', 'selesai')
        ->groupBy('pengguna.id_pengguna', 'pengguna.nama', 'pengguna.foto_profil', 'pengguna.subtotal_poin')
        ->orderByDesc('total_penjemputan')
        ->orderByDesc('poin')
        ->limit(10)
        ->get();
 

        // Ambil data berdasarkan id_pengguna_kurir
        $topKurir = Penjemputan::select('pengguna.nama', 'pengguna.foto_profil', DB::raw('COUNT(penjemputan.id_pengguna_kurir) as total_penjemputan'), 'pengguna.subtotal_poin as poin')
        ->join('pengguna', 'penjemputan.id_pengguna_kurir', '=', 'pengguna.id_pengguna')
        ->join('pelacakan', 'pelacakan.id_penjemputan', '=', 'penjemputan.id_penjemputan')
        ->where('pelacakan.status', '=', 'selesai')
        ->groupBy('pengguna.id_pengguna', 'pengguna.nama', 'pengguna.foto_profil', 'pengguna.subtotal_poin')
        ->orderByDesc('total_penjemputan')
        ->orderByDesc('poin')
        ->limit(10)
        ->get();


        // Ambil data jenis sampah berdasarkan transaksi terbanyak
        $topJenisSampah = DetailPenjemputan::select('jenis.nama_jenis', DB::raw('COUNT(detail_penjemputan.id_jenis) as total_penjemputanJ'))
    ->join('jenis', 'detail_penjemputan.id_jenis', '=', 'jenis.id_jenis')
    ->join('penjemputan', 'detail_penjemputan.id_penjemputan', '=', 'penjemputan.id_penjemputan')
    ->join('pelacakan', 'pelacakan.id_penjemputan', '=', 'penjemputan.id_penjemputan')
    ->where('pelacakan.status', '=', 'selesai')
    ->groupBy('jenis.id_jenis', 'jenis.nama_jenis')
    ->orderByDesc('total_penjemputanJ')
    ->limit(10)
    ->get();



        // Kirim data masyarakat dan kurir ke view terpisah
        return view('manajemen.datamaster.top-10.index', [
            'topMasyarakat' => $topMasyarakat,
            'topKurir' => $topKurir,
            'topJenisSampah' => $topJenisSampah
        ]);
    }
}
