<?php

namespace App\Http\Controllers\Manajemen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penjemputan;
use App\Models\DetailPenjemputan;
use App\Models\Pengguna;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    // Fungsi untuk menampilkan daftar data
    public function index()
    {
        // Ambil data berdasarkan id_pengguna_kurir
        $riwayat = Penjemputan::select('pengguna.nama', 'penjemputan.kode_penjemputan', 'penjemputan.tanggal_penjemputan', 'penjemputan.alamat_penjemputan')
            ->join('pengguna', 'penjemputan.id_pengguna_kurir', '=', 'pengguna.id_pengguna')
            ->join('pelacakan', 'pelacakan.id_penjemputan', '=', 'penjemputan.id_penjemputan')
            ->where('pelacakan.status', '=', 'selesai')
            ->groupBy('pengguna.id_pengguna', 'pengguna.nama', 'penjemputan.kode_penjemputan', 'penjemputan.tanggal_penjemputan', 'penjemputan.alamat_penjemputan')
            ->limit(10)
            ->get();
    
        return view('manajemen.datamaster.riwayat.index', [
            'riwayat' => $riwayat,
        ]);
    }
    
    public function show($kode_penjemputan)
    {
        // Ambil data penjemputan berdasarkan kode_penjemputan
        $riwayatDetail = Penjemputan::where('kode_penjemputan', $kode_penjemputan)
            ->firstOrFail();
    
        // Ambil data pengguna berdasarkan id_pengguna_kurir
        $kurir = Pengguna::findOrFail($riwayatDetail->id_pengguna_kurir);
        
        // Ambil data pengguna berdasarkan id_pengguna_masyarakat
        $masyarakat = Pengguna::findOrFail($riwayatDetail->id_pengguna_masyarakat);
    
        // Ambil detail penjemputan melalui relasi
        // $detail = DetailPenjemputan::findOrFail ($riwayatDetail->id_detail_penjemputan); // Jika relasi One to One
    
        // Kirim data pengguna bersama penjemputan ke view
        return view('manajemen.datamaster.riwayat.detail-riwayat', [
            'riwayatDetail' => $riwayatDetail,
            'kurir' => $kurir,
            'masyarakat' => $masyarakat,
            // 'detail' => $detail,
            'image' => 'https://picsum.photos/720/720', // Contoh image
            'nama' => $masyarakat->nama, // Nama pengguna
            'kategori' => 'Layar dan Monitor', // Kategori, kamu bisa sesuaikan
            'quantity' => 1, // Contoh quantity
            'berat' => $riwayatDetail->total_berat, // Berat penjemputan
        ]);
    }
    
}
