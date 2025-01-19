<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penjemputan;
use App\Models\Pelacakan;
use App\Models\Pengguna;
use App\Models\Dropbox;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;

class PenerimaanPenjemputanSampahAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Mengubah query untuk mendapatkan data berdasarkan status "diterima" dari tabel pelacakan
            $query = Penjemputan::with(['dropbox'])
                               ->select('penjemputan.*', 'pelacakan.status')
                               ->join('pelacakan', 'penjemputan.id_penjemputan', '=', 'pelacakan.id_penjemputan')
                               ->whereIn('pelacakan.status', ['diterima', 'dibatalkan'])
                               ->groupBy('penjemputan.id_penjemputan', 'pelacakan.status');

            return DataTables::of($query)
                ->addColumn('id_penjemputan', function ($penjemputan) {
                    return $penjemputan->id_penjemputan;
                })
                ->addColumn('lokasi_penjemputan', function ($penjemputan) {
                    return $penjemputan->alamat_penjemputan;
                })
                ->addColumn('dropbox_tujuan', function ($penjemputan) {
                    return $penjemputan->dropbox ? $penjemputan->dropbox->nama_dropbox : '-';
                })
                ->addColumn('kode_penjemputan', function ($penjemputan) {
                    return $penjemputan->kode_penjemputan;
                })
                ->addColumn('waktu_tanggal', function ($penjemputan) {
                    return $penjemputan->tanggal_penjemputan;
                })
                ->addColumn('status', function ($penjemputan) {
                    return ucfirst($penjemputan->status);
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('admin.penjemputan-sampah.penerimaan.index');
    }
}