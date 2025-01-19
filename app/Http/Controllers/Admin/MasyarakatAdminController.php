<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;


class MasyarakatAdminController extends Controller
{

    public function index()
    {
        $this->deleteRejectedAfter7Days();
        $masyarakat = Pengguna::where('id_peran', 2)->get();
        return view('admin.datamaster.masyarakat.index', compact('masyarakat'));
    }

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

    //generateStatusVerifikasiBadges
    private function generateStatusVerifikasiBadges($row)
    {
        $statusVerifikasi = $row->status_verifikasi;

        if ($statusVerifikasi == 'Diterima') {
            return '<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">Diterima</span>';
        } elseif ($statusVerifikasi == 'Ditolak') {
            return '<span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">Ditolak</span>';
        } elseif ($statusVerifikasi == 'Diproses') {
            return '<span class="px-3 py-1 rounded-full bg-teal-200 text-teal-700 text-xs font-medium">Diproses</span>';
        }
    }

    // Helper function to generate status badges
    private function generateStatusBadges($row)
    {
        $nomorKTP = $row->nomor_ktp;
        $nomorTelepon = $row->nomor_telepon;

        if (strlen($nomorKTP) != 16) {
            return $this->generateFakeAccountBadge();
        }

        $badge = '<div class="flex flex-col space-y-1">';
        $badge .= $this->checkProvinsi($nomorKTP);
        $badge .= $this->checkGender($nomorKTP);
        $badge .= $this->checkPhoneNumber($nomorTelepon);
        $badge .= '</div>';

        return $badge;
    }

    private function generateFakeAccountBadge()
    {
        return '<div><span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">Akun Palsu</span></div>';
    }

    private function checkProvinsi($nomorKTP)
    {
        $provinsi = substr($nomorKTP, 0, 2);
        if ($provinsi == '32') {
            return '<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">Jawa Barat</span>';
        } else {
            return '<span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-medium">Luar Jawa Barat</span>';
        }
    }

    // Helper function to check gender based on KTP birthdate
    private function checkGender($nomorKTP)
    {
        $tanggalLahir = substr($nomorKTP, 6, 2);
        if ($tanggalLahir >= 41 && $tanggalLahir <= 71) {
            return '<span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">Perempuan</span>';
        } elseif ($tanggalLahir >= 0 && $tanggalLahir <= 31) {
            return '<span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">Laki-laki</span>';
        } else {
            return $this->generateFakeAccountBadge();
        }
    }

    // Helper function to check phone number validity
    private function checkPhoneNumber($nomorTelepon)
    {
        if (!is_numeric($nomorTelepon)) {
            return '<span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">Nomor Telepon Tidak Valid</span>';
        } elseif (strlen($nomorTelepon) >= 10 && strlen($nomorTelepon) <= 13 && substr($nomorTelepon, 0, 2) == '08') {
            return '<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">Nomor Telepon Valid</span>';
        } else {
            return '<span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-medium">Nomor Telepon Tidak Valid</span>';
        }
    }

    public function approve(Request $request, $id)
    {
        try {
            // Update status_verifikasi menjadi 'Diterima'
            $masyarakat = Pengguna::findOrFail($id);
            $masyarakat->status_verifikasi = 'Diterima';
            $masyarakat->tanggal_email_diverifikasi = now();
            $masyarakat->updated_at = now();
            $masyarakat->save();

            // Kirim email notifikasi
            Mail::send('admin.emails.verification', ['masyarakat' => $masyarakat, 'status' => 'Diterima'], function ($message) use ($masyarakat) {
                $message->to($masyarakat->email)
                    ->subject('Verifikasi Akun Anda Diterima');
            });

            return response()->json(['success' => 'Status berhasil diperbarui dan email telah dikirim.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string|max:255',
        ]);

        try {
            $masyarakat = Pengguna::findOrFail($id);
            $masyarakat->status_verifikasi = 'Ditolak';
            $masyarakat->save();

            Mail::send('admin.emails.verification', [
                'masyarakat' => $masyarakat,
                'status' => 'Ditolak',
                'alasan' => $request->alasan_penolakan,
            ], function ($message) use ($masyarakat) {
                $message->to($masyarakat->email)
                    ->subject('Verifikasi Akun Anda Ditolak');
            });

            return response()->json(['success' => 'Status berhasil diperbarui dan email telah dikirim.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteRejectedAfter7Days()
    {
        try {
            $sevenDaysAgo = now()->subDays(7);

            $deletedCount = Pengguna::where('status_verifikasi', 'Ditolak')
                ->where('updated_at', '<', $sevenDaysAgo)
                ->delete();

            return response()->json(['success' => "{$deletedCount} data dengan status Ditolak telah dihapus."]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $masyarakat = Pengguna::findOrFail($id);
        return view('admin.datamaster.masyarakat.show', compact('masyarakat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori_sampah' => 'required|integer',
            'nama_jenis_sampah' => 'required|string|max:255',
            'poin' => 'required|integer',
        ]);

        $masyarakat = Pengguna::findOrFail($id);
        $masyarakat->update($request->all());

        return redirect()->route('admin.datamaster.masyarakat.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $masyarakat = Pengguna::findOrFail($id);
        $masyarakat->delete();

        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
