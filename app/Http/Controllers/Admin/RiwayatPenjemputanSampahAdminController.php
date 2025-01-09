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
    // Fungsi untuk menampilkan halaman riwayat penjemputan sampah
    public function index(Request $request)
    {
        // Jika permintaan adalah AJAX
        if ($request->ajax()) {
            // Query untuk mengambil data penjemputan beserta relasinya
            $query = Penjemputan::with(['penggunaMasyarakat', 'penggunaKurir', 'dropbox', 'getLatestPelacakan'])
                ->select('penjemputan.*');

            // Jika ada pencarian
            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $query->where(function ($q) use ($searchValue) {
                    $q->where('id_penjemputan', 'like', "%{$searchValue}%")
                        ->orWhereHas('penggunaMasyarakat', function ($q) use ($searchValue) {
                            $q->where('nama', 'like', "%{$searchValue}%");
                        })
                        ->orWhereHas('penggunaKurir', function ($q) use ($searchValue) {
                            $q->where('nama', 'like', "%{$searchValue}%");
                        })
                        ->orWhereHas('dropbox', function ($q) use ($searchValue) {
                            $q->where('nama_dropbox', 'like', "%{$searchValue}%");
                        });
                });
            }

            // Jika ada filter status
            if ($request->has('status_filter') && !empty($request->status_filter)) {
                $statusFilter = $request->status_filter;

                if ($statusFilter !== 'Semua') {
                    $query->whereHas('getLatestPelacakan', function ($q) use ($statusFilter) {
                        $q->where('status', $statusFilter);
                    });
                } else {
                    $query = Penjemputan::with(['penggunaMasyarakat', 'penggunaKurir', 'dropbox', 'getLatestPelacakan'])
                        ->select('penjemputan.*');
                }
            }

            // Menghitung total record
            $recordsTotal = $query->count();
            $recordsFiltered = $recordsTotal;

            // Jika ada pengurutan
            if ($request->has('order')) {
                $orderColumn = $request->columns[$request->order[0]['column']]['name'];
                $orderDirection = $request->order[0]['dir'];

                switch ($orderColumn) {
                    case 'nama_masyarakat':
                        $query->join('pengguna as p1', 'penjemputan.id_pengguna_masyarakat', '=', 'p1.id_pengguna')
                            ->orderBy('p1.nama', $orderDirection);
                        break;
                    case 'nama_kurir':
                        $query->join('pengguna as p2', 'penjemputan.id_pengguna_kurir', '=', 'p2.id_pengguna')
                            ->orderBy('p2.nama', $orderDirection);
                        break;
                    case 'nama_dropbox':
                        $query->join('dropbox', 'penjemputan.id_dropbox', '=', 'dropbox.id_dropbox')
                            ->orderBy('dropbox.nama_dropbox', $orderDirection);
                        break;
                    default:
                        $query->orderBy($orderColumn, $orderDirection);
                }
            } else {
                $query->orderBy('id_penjemputan', 'asc');
            }

            // Mengambil data sesuai dengan pagination
            $data = $query->skip($request->start)
                ->take($request->length)
                ->get()
                ->map(function ($item) {
                    return [
                        'id_penjemputan' => $item->id_penjemputan,
                        'nama_masyarakat' => $item->penggunaMasyarakat ? $item->penggunaMasyarakat->nama : '-',
                        'nama_kurir' => $item->penggunaKurir ? $item->penggunaKurir->nama : '-',
                        'tanggal_penjemputan' => $item->tanggal_penjemputan,
                        'dropbox' => $item->dropbox ? $item->dropbox->nama_dropbox : '-',
                        'status' => $item->getLatestPelacakan ? $item->getLatestPelacakan->status : '-'
                    ];
                });

            // Mengembalikan response JSON untuk DataTable
            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data' => $data
            ]);
        }

        // Mengembalikan view untuk halaman riwayat penjemputan sampah
        return view('admin.penjemputan-sampah.riwayat.index');
    }
}