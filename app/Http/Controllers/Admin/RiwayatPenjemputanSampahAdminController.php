<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penjemputan;
use App\Models\Pengguna;
use App\Models\Dropbox;
use App\Models\Pelacakan;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;

class RiwayatPenjemputanSampahAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Base query for penjemputan with specific status filter
            $query = Penjemputan::query()
                    ->whereHas('pelacakan', function($q) {
                        $q->whereIn('status', ['diproses', 'ditolak', 'diterima'])
                            ->latest('created_at');
                    });

            if ($request->has('id_penjemputan')) {
                // Query for detail popup with status filter
                $detail = Penjemputan::with([
                    'penggunaMasyarakat', 
                    'penggunaKurir', 
                    'dropbox',
                    'pelacakan' => function($q) {
                        $q->whereIn('status', ['diproses', 'ditolak', 'diterima'])
                            ->latest('created_at')
                            ->first();
                    }
                ])
                ->where('id_penjemputan', $request->id_penjemputan)
                ->first();

                if ($detail) {
                    $latestStatus = $detail->pelacakan()
                        ->whereIn('status', ['diproses', 'dibatalkan', 'diterima'])
                        ->latest('created_at')
                        ->first();

                    return response()->json([
                        'id_penjemputan' => $detail->id_penjemputan,
                        'nama_masyarakat' => $detail->penggunaMasyarakat ? $detail->penggunaMasyarakat->nama : '-',
                        'nama_kurir' => $detail->penggunaKurir ? $detail->penggunaKurir->nama : '-',
                        'tanggal_penjemputan' => $detail->tanggal_penjemputan,
                        'dropbox' => $detail->dropbox ? $detail->dropbox->nama_dropbox : '-',
                        'status' => $latestStatus ? ucfirst($latestStatus->status) : '-'
                    ]);
                }

                return response()->json(['error' => 'Data tidak ditemukan']);
            }

            // Query for main table
            return DataTables::of($query)
                ->addColumn('id_penjemputan', function ($penjemputan) {
                    return $penjemputan->id_penjemputan;
                })
                ->addColumn('action', function ($penjemputan) {
                    return '<button onclick="showDetail(' . $penjemputan->id_penjemputan . ')" class="detail-btn">Detail</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.penjemputan-sampah.riwayat.index');
    }
}