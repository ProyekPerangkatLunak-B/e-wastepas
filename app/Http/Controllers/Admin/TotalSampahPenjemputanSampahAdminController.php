<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penjemputan;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class TotalSampahPenjemputanSampahAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Penjemputan::select(
                'id_pengguna_masyarakat',
                DB::raw('SUM(total_berat) as total_sampah'),
                DB::raw('SUM(total_poin) as total_poin')
            )
            ->groupBy('id_pengguna_masyarakat');

            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $query->where('id_pengguna_masyarakat', 'like', "%{$searchValue}%");
            }

            $recordsTotal = $query->get()->count();
            $recordsFiltered = $recordsTotal;

            if ($request->has('order')) {
                $orderColumn = $request->columns[$request->order[0]['column']]['name'];
                $orderDirection = $request->order[0]['dir'];
                
                switch($orderColumn) {
                    case 'total_sampah':
                        $query->orderBy('total_sampah', $orderDirection);
                        break;
                    case 'total_poin':
                        $query->orderBy('total_poin', $orderDirection);
                        break;
                    default:
                        $query->orderBy('id_pengguna_masyarakat', $orderDirection);
                }
            } else {
                $query->orderBy('id_pengguna_masyarakat', 'asc');
            }

            $data = $query->skip($request->start)
                         ->take($request->length)
                         ->get()
                         ->map(function($item) {
                             return [
                                 'id_pengguna_masyarakat' => $item->id_pengguna_masyarakat,
                                 'total_sampah' => number_format($item->total_sampah, 2) . ' kg',
                                 'total_poin' => number_format($item->total_poin, 0)
                             ];
                         });

            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data' => $data
            ]);
        }

        return view('admin.penjemputan-sampah.total.index');
    }
}