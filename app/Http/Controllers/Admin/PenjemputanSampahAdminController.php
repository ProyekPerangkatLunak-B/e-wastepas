<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;

class PenjemputanSampahAdminController extends Controller
{
    public function getMasyarakatData(Request $request)
    {
        try {
            $statusVerifikasi = $request->input('status_verifikasi', '');
            $searchQuery = $request->input('search', '');
            $orderColumn = $request->input('order_column', 'created_at');
            $orderDirection = $request->input('order_direction', 'asc');

            $columnMap = [
                'created_at' => 'created_at',
                'nama' => 'nama',
                'nomor_ktp' => 'nomor_ktp',
                'nomor_telepon' => 'nomor_telepon',
                'email' => 'email'
            ];

            if (!array_key_exists($orderColumn, $columnMap)) {
                $orderColumn = 'created_at';
            }

            $masyarakatQuery = Pengguna::where('id_peran', 2)
                ->when($statusVerifikasi, function ($query, $statusVerifikasi) {
                    return $query->where('status_verifikasi', $statusVerifikasi);
                })
                ->when($searchQuery, function ($query, $searchQuery) {
                    return $query->where(function ($query) use ($searchQuery) {
                        $query->where('nama', 'like', "%{$searchQuery}%")
                            ->orWhere('nomor_ktp', 'like', "%{$searchQuery}%")
                            ->orWhere('nomor_telepon', 'like', "%{$searchQuery}%")
                            ->orWhere('email', 'like', "%{$searchQuery}%");
                    });
                })
                ->orderBy($columnMap[$orderColumn], $orderDirection) // Mengurutkan berdasarkan kolom yang valid
                ->select('pengguna.*');

            return DataTables::of($masyarakatQuery)
                ->addColumn('status', function ($row) {
                    return $this->generateStatusBadges($row);
                })
                ->addColumn('status_verifikasi', function ($row) {
                    return $this->generateStatusVerifikasiBadges($row);
                })
                ->rawColumns(['status', 'action', 'status_verifikasi'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
