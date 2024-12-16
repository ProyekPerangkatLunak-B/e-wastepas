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
    $results = DB::table('penjemputan as p')
        ->join('dropbox as db', 'p.id_dropbox', '=', 'db.id_dropbox')
        ->join('pelacakan as pl', 'p.id_penjemputan', '=', 'pl.id_penjemputan')
        ->select(
            'db.nama_dropbox',
            DB::raw('SUM(p.total_berat) as total_berat_sampah'),
            DB::raw('SUM(p.total_poin) as total_poin')
        )
        ->where('pl.status', '=', 'Selesai')
        ->groupBy('db.nama_dropbox')
        ->get();

        
    return view('manajemen.datamaster.dropbox.index', [
        'results' => $results,
    ]);
}


}