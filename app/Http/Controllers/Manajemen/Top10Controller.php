<?php

namespace App\Http\Controllers\Manajemen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penjemputan;
use Illuminate\Support\Facades\DB;

class Top10Controller extends Controller
{
    public function index()
    {
        // Ambil data berdasarkan id_pengguna_masyarakat
        $topMasyarakat = DB::table('penjemputan')
            ->join('pengguna', 'penjemputan.id_pengguna_masyarakat', '=', 'pengguna.id_pengguna')
            ->select(
                'pengguna.nama', 
                DB::raw('COUNT(penjemputan.id_pengguna_masyarakat) as total_penjemputan'),
                'pengguna.subtotal_poin as poin'   
            )
            ->groupBy('pengguna.id_pengguna', 'pengguna.nama', 'pengguna.subtotal_poin')
            ->orderByDesc('total_penjemputan') // Urutkan berdasarkan total penjemputan
            ->orderByDesc('poin') // Jika total penjemputan sama, urutkan berdasarkan poin
            ->limit(10) // Ambil top 10 masyarakat
            ->get();

        // Ambil data berdasarkan id_pengguna_kurir
        $topKurir = DB::table('penjemputan')
            ->join('pengguna', 'penjemputan.id_pengguna_kurir', '=', 'pengguna.id_pengguna')
            ->select(
                'pengguna.nama', 
                DB::raw('COUNT(penjemputan.id_pengguna_kurir) as total_penjemputan'),
                'pengguna.subtotal_poin as poin'
            )
            ->groupBy('pengguna.id_pengguna', 'pengguna.nama', 'pengguna.subtotal_poin')
            ->orderByDesc('total_penjemputan') // Urutkan berdasarkan total penjemputan
            ->orderByDesc('poin') // Jika total penjemputan sama, urutkan berdasarkan poin
            ->limit(10) // Ambil top 10 kurir
            ->get();

                    // Ambil data jenis sampah berdasarkan transaksi terbanyak
        $topJenisSampah = DB::table('detail_penjemputan')
        ->join('jenis', 'detail_penjemputan.id_jenis', '=', 'jenis.id_jenis')
        ->select(
            'jenis.nama_jenis',
            DB::raw('COUNT(detail_penjemputan.id_jenis) as total_penjemputanJ')
        )
        ->groupBy('jenis.id_jenis', 'jenis.nama_jenis')  // Group berdasarkan jenis sampah
        ->orderByDesc('total_penjemputanJ')  // Urutkan berdasarkan total penjemputan
        ->limit(10)  // Ambil 10 data teratas
        ->get();


        // Kirim data masyarakat dan kurir ke view terpisah
        return view('manajemen.datamaster.top-10.index', [
            'topMasyarakat' => $topMasyarakat,
            'topKurir' => $topKurir,
            'topJenisSampah' => $topJenisSampah
        ]);
    }
}
