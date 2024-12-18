<?php

namespace App\Http\Controllers\Manajemen;

use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Pengguna;
use App\Models\Pelacakan;
use App\Models\Penjemputan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Dropbox;

class DropboxController extends Controller
{
    public function index()
{
    $results = DB::table('dropbox as db')
        ->leftJoin('penjemputan as p', 'db.id_dropbox', '=', 'p.id_dropbox')
        ->leftJoin('pelacakan as pl', 'p.id_penjemputan', '=', 'pl.id_penjemputan')
        ->select(
            'db.nama_dropbox',
            DB::raw('COALESCE(SUM(CASE WHEN pl.status = "Selesai" THEN p.total_berat ELSE 0 END), 0) AS total_berat_sampah'),
            DB::raw('COALESCE(SUM(CASE WHEN pl.status = "Selesai" THEN p.total_poin ELSE 0 END), 0) AS total_poin')
        )
        ->groupBy('db.id_dropbox', 'db.nama_dropbox')
        ->orderByDesc('total_berat_sampah') // Urutkan berdasarkan total berat (tertinggi ke terendah)
        ->orderByDesc('total_poin')        // Jika total berat sama, urutkan berdasarkan total poin
        ->get();

        
    return view('manajemen.datamaster.dropbox.index', [
        'results' => $results,
    ]);
    }
}