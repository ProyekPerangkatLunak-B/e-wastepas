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
    public function index(Request $request)
{
    $query = Dropbox::with(['penjemputan.pelacakan'])
        ->select('dropbox.id_dropbox', 'dropbox.nama_dropbox')
        ->withSum(['penjemputan as total_berat_sampah' => function ($query) {
            $query->whereHas('pelacakan', function ($query) {
                $query->where('status', 'Selesai');
            })->selectRaw('COALESCE(SUM(total_berat), 0)');
        }], 'total_berat')
        ->withSum(['penjemputan as total_poin' => function ($query) {
            $query->whereHas('pelacakan', function ($query) {
                $query->where('status', 'Selesai');
            })->selectRaw('COALESCE(SUM(total_poin), 0)');
        }], 'total_poin');

    // Pencarian
    if ($request->has('search') && $request->input('search') !== '') {
        $search = $request->input('search');
        $query->where('nama_dropbox', 'like', '%' . $search . '%');
    }

    // Filter
    $filter = $request->input('filter', 'poin_tertinggi');
    switch ($filter) {
        case 'poin_tertinggi':
            $query->orderByDesc('total_poin');
            break;
        case 'poin_terendah':
            $query->orderBy('total_poin');
            break;
        case 'penjemputan_tertinggi':
            $query->orderByDesc('total_berat_sampah');
            break;
        case 'penjemputan_terendah':
            $query->orderBy('total_berat_sampah');
            break;
        default:
            $query->orderByDesc('total_berat_sampah');
            break;
    }

    $results = $query->paginate(9);

    return view('manajemen.datamaster.dropbox.index', [
        'results' => $results,
        'currentFilter' => $filter,
    ]);
}
}
