<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penjemputan;
use App\Models\Pengguna;
use App\Models\Dropbox;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;

class PermintaanPenjemputanSampahAdminController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        $query = Penjemputan::with(['penggunaMasyarakat', 'dropbox'])
                           ->select('penjemputan.*');

        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $query->whereHas('penggunaMasyarakat', function($q) use ($searchValue) {
                $q->where('nama', 'like', "%{$searchValue}%");
            });
        }

        $recordsTotal = $query->count();
        $recordsFiltered = $recordsTotal;

        $query->orderBy('id_pengguna_masyarakat', 'asc');

        if ($request->has('order')) {
            $orderColumn = $request->columns[$request->order[0]['column']]['name'];
            $orderDirection = $request->order[0]['dir'];
            
            // Handle ordering based on related models
            switch($orderColumn) {
                case 'nama':
                    $query->join('pengguna', 'penjemputan.id_pengguna_masyarakat', '=', 'pengguna.id_pengguna')
                          ->orderBy('pengguna.nama', $orderDirection);
                    break;
                case 'nama_dropbox':
                    $query->join('dropbox', 'penjemputan.id_dropbox', '=', 'dropbox.id_dropbox')
                          ->orderBy('dropbox.nama_dropbox', $orderDirection);
                    break;
                case 'id_pengguna_masyarakat':
                        $query->orderBy('id_pengguna_masyarakat', $orderDirection);
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
                             'nama' => $item->penggunaMasyarakat->nama,
                             'id_pengguna_masyarakat' => $item->id_pengguna_masyarakat,
                             'alamat' => $item->alamat_penjemputan,
                             'dropbox_tujuan' => $item->dropbox->nama_dropbox,
                             'tanggal_pengajuan' => $item->tanggal_penjemputan
                         ];
                     });

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ]);
    }

    return view('admin.penjemputan-sampah.permintaan.index');
}

}
