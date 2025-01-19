<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penjemputan;
use App\Models\Jenis;
use App\Models\Pengguna;
use App\Models\Dropbox;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;

class PermintaanPenjemputanSampahAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Query untuk mendapatkan data penjemputan dengan relasi yang dibutuhkan
            $query = Penjemputan::with(['detailPenjemputan.jenis.kategori', 'dropbox']);

            return DataTables::of($query)
                ->addColumn('action', function ($penjemputan) {
                    // Menyiapkan data untuk popup dalam bentuk data attributes
                    $detail = [
                        'id' => $penjemputan->id_penjemputan,
                        'jenis' => $penjemputan->detailPenjemputan->map(function($detail) {
                            return $detail->jenis->nama_jenis . ' (' . $detail->jenis->kategori->nama_kategori . ')';
                        })->implode(', '),
                        'berat' => $penjemputan->total_berat,
                        'alamat' => $penjemputan->alamat_penjemputan,
                        'dropbox' => $penjemputan->dropbox->nama_dropbox,
                        'tanggal' => $penjemputan->tanggal_penjemputan
                    ];
                    
                    // Membuat button dengan data attributes
                    return '<button 
                        class="detail-btn"
                        data-id="'.$detail['id'].'"
                        data-jenis="'.htmlspecialchars($detail['jenis']).'"
                        data-berat="'.$detail['berat'].'"
                        data-alamat="'.htmlspecialchars($detail['alamat']).'"
                        data-dropbox="'.htmlspecialchars($detail['dropbox']).'"
                        data-tanggal="'.$detail['tanggal'].'"
                        onclick="showDetail(this)">
                        Detail
                    </button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.penjemputan-sampah.permintaan.index');
    }
}