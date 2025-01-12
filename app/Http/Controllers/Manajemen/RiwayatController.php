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
        $riwayat = Penjemputan::select(
            'pengguna.nama',
            'penjemputan.kode_penjemputan',
            'penjemputan.tanggal_penjemputan',
            'penjemputan.alamat_penjemputan',
            'jenis.nama_jenis',
            'kategori.nama_kategori',
            DB::raw('SUM(detail_penjemputan.berat) as total_berat'),
            DB::raw('SUM(detail_penjemputan.id_jenis) as total_quantity') // Tambahkan jumlah quantity
        )
        ->join('pengguna', 'penjemputan.id_pengguna_kurir', '=', 'pengguna.id_pengguna')
        ->join('pelacakan', 'pelacakan.id_penjemputan', '=', 'penjemputan.id_penjemputan')
        ->join('detail_penjemputan', 'detail_penjemputan.id_penjemputan', '=', 'penjemputan.id_penjemputan')
        ->join('jenis', 'detail_penjemputan.id_jenis', '=', 'jenis.id_jenis')
        ->join('kategori', 'jenis.id_kategori', '=', 'kategori.id_kategori')
        ->where('pelacakan.status', '=', 'selesai')
        ->groupBy(
            'penjemputan.id_penjemputan', 
            'pengguna.nama', 
            'penjemputan.kode_penjemputan', 
            'penjemputan.tanggal_penjemputan', 
            'penjemputan.alamat_penjemputan', 
            'jenis.nama_jenis', 
            'kategori.nama_kategori'
        )
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

    // Pagination manual untuk detail penjemputan
    $perPage = 6; // Jumlah item per halaman
    $currentPage = request()->get('page', 1); // Halaman yang aktif

    // Ambil data detailPenjemputan berdasarkan id_penjemputan dengan pagination manual
    $detailPenjemputan = DetailPenjemputan::where('id_penjemputan', $riwayatDetail->id_penjemputan)
        ->join('jenis', 'detail_penjemputan.id_jenis', '=', 'jenis.id_jenis') // Menambahkan join dengan jenis
        ->join('kategori', 'jenis.id_kategori', '=', 'kategori.id_kategori') // Menambahkan join dengan kategori
        ->skip(($currentPage - 1) * $perPage) // Skip data berdasarkan halaman
        ->take($perPage) // Ambil data sebanyak per halaman
        ->get();

    // Hitung total data untuk pagination
    $totalData = DetailPenjemputan::where('id_penjemputan', $riwayatDetail->id_penjemputan)
        ->count();

    $totalPages = ceil($totalData / $perPage); // Total halaman

    // Mengelompokkan detailPenjemputan berdasarkan id_jenis
    $jumlahJenis = $detailPenjemputan->groupBy('id_jenis')->map(function ($group) {
        return [
            'id_jenis' => $group->first()->id_jenis,
            'jumlah' => $group->count(),
        ];
    });

    // Kirim data ke view
    return view('manajemen.datamaster.riwayat.detail-riwayat', [
        'riwayatDetail' => $riwayatDetail,
        'kurir' => $kurir,
        'masyarakat' => $masyarakat,
        'detailPenjemputan' => $detailPenjemputan,
        'jumlahJenis' => $jumlahJenis,
        'image' => 'https://picsum.photos/720/720',
        'nama' => $masyarakat->nama,
        'jumlahJenisUnik' => $jumlahJenis,
        'kategori' => $detailPenjemputan->first()->kategori->nama_kategori,
        'berat' => $riwayatDetail->total_berat,
        'currentPage' => $currentPage,
        'totalPages' => $totalPages,
    ]);
}

}
