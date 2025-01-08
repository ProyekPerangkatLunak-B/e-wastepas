<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penjemputan;
use App\Models\Pelacakan;
use App\Models\Dropbox;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;

class TrackingPenjemputanSampahAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Pelacakan::with(['penjemputan', 'dropbox'])
                            ->select('pelacakan.*');

            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $query->where('id_pelacakan', 'like', "%{$searchValue}%")
                      ->orWhere('id_penjemputan', 'like', "%{$searchValue}%")
                      ->orWhere('status', 'like', "%{$searchValue}%")
                      ->orWhereHas('dropbox', function($q) use ($searchValue) {
                          $q->where('alamat_dropbox', 'like', "%{$searchValue}%");
                      });
            }

            $recordsTotal = $query->count();
            $recordsFiltered = $recordsTotal;

            $query->orderBy('id_pelacakan', 'asc');

            if ($request->has('order')) {
                $orderColumn = $request->columns[$request->order[0]['column']]['name'];
                $orderDirection = $request->order[0]['dir'];
                
                switch($orderColumn) {
                    case 'alamat_dropbox':
                        $query->join('dropbox', 'pelacakan.id_dropbox', '=', 'dropbox.id_dropbox')
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
                                 'id_pelacakan' => $item->id_pelacakan,
                                 'id_penjemputan' => $item->id_penjemputan,
                                 'dropbox_tujuan' => $item->dropbox ? $item->dropbox->alamat_dropbox : '-',
                                 'status' => $item->status,
                                 'estimasi_waktu' => $item->estimasi_waktu
                             ];
                         });

            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data' => $data
            ]);
        }

        return view('admin.penjemputan-sampah.tracking.index');
    }
}