<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penjemputan;
use App\Models\Pengguna;
use App\Models\Dropbox;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;

class PenerimaanPenjemputanSampahAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Penjemputan::with(['penggunaKurir', 'dropbox'])
                               ->select('penjemputan.*');

            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $query->whereHas('penggunaKurir', function($q) use ($searchValue) {
                    $q->where('nama', 'like', "%{$searchValue}%");
                });
            }

            $recordsTotal = $query->count();
            $recordsFiltered = $recordsTotal;

            $query->orderBy('id_pengguna_kurir', 'asc');

            if ($request->has('order')) {
                $orderColumn = $request->columns[$request->order[0]['column']]['name'];
                $orderDirection = $request->order[0]['dir'];
                
                switch($orderColumn) {
                    case 'nama':
                        $query->join('pengguna', 'penjemputan.id_pengguna_kurir', '=', 'pengguna.id_pengguna')
                              ->orderBy('pengguna.nama', $orderDirection);
                        break;
                    case 'alamat_dropbox':
                        $query->join('dropbox', 'penjemputan.id_dropbox', '=', 'dropbox.id_dropbox')
                              ->orderBy('dropbox.alamat_dropbox', $orderDirection);
                        break;
                    default:
                        $query->orderBy($orderColumn, $orderDirection);
                }
            }

            $data = $query->skip($request->start)
                         ->take($request->length)
                         ->get()
                         ->map(function($item) {
                             return [
                                 'nama' => $item->penggunaKurir ? $item->penggunaKurir->nama : '-',
                                 'id_pengguna_kurir' => $item->id_pengguna_kurir,
                                 'id_penjemputan' => $item->id_penjemputan,
                                 'alamat_penjemputan' => $item->alamat_penjemputan,
                                 'alamat_dropbox' => $item->dropbox ? $item->dropbox->alamat_dropbox : '-',
                                 'kode_penjemputan' => $item->kode_penjemputan,
                                 'tanggal_penjemputan' => $item->tanggal_penjemputan
                             ];
                         });

            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data' => $data
            ]);
        }

        return view('admin.penjemputan-sampah.penerimaan.index');
    }
}