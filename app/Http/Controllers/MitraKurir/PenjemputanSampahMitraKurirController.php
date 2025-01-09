<?php

namespace App\Http\Controllers\MitraKurir;

use App\Http\Controllers\Controller;
use App\Models\Dropbox;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Pelacakan;
use App\Models\Pengguna;
use App\Models\Penjemputan;
use App\Models\Sampah;
use Illuminate\Http\Request;
use App\Models\JenisSampah;
use App\Models\KategoriSampah;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjemputanSampahMitraKurirController extends Controller
{

    //untuk mengambil data dari database tabel kategori
    public function kategori()
    {
        $search = request()->query('search', '');
        $sort = request()->query('sort', 'asc');
        $kategori = Kategori::where('nama_kategori', 'like', '%' . $search . '%')
            ->orderBy('nama_kategori', $sort)
            ->get();

        return view(('mitra-kurir.penjemputan-sampah.kategori'), compact('kategori', 'sort', 'search'));
    }

    //untuk mengambil data dari database tabel jenis
    public function detailKategori($id)
    {
        $search = request()->query('search', '');
        $sort = request()->query('sort', 'asc');

        $jenis = Jenis::where('id_kategori', $id)
            ->where('nama_jenis', 'like', '%' . $search . '%')
            ->orderBy('nama_jenis', $sort)
            ->paginate(6);

        $kategori = Kategori::find($id);

        return view('mitra-kurir.penjemputan-sampah.detail-kategori', compact('jenis', 'kategori', 'sort', 'search'));
    }

    //untuk mengambil data dari database tabel penjemputan
    // public function permintaan()
    // {
    //     try {
    //         $search = request()->query('search', '');
    //         $sort = request()->query('sort', 'asc');

    //         //        $data = Penjemputan::with(['daerah', 'dropbox', 'penggunaMasyarakat', 'pelacakan','detailPenjemputan','kategori'])
    //         //            ->whereHas('pelacakan', function ($query) {
    //         //                $query->where('status', 'Diproses');
    //         //            })
    //         //            ->whereHas('penggunaMasyarakat', function ($query) use ($search) {
    //         //                $query->where('nama', 'like', '%' . $search . '%');
    //         //            })
    //         //            ->select(
    //         //                'pengguna.nama',
    //         //                'pelacakan.status',
    //         //                'pelacakan.id_pelacakan',
    //         //                'kategori.nama_kategori',
    //         //                'detailPenjemputan.berat'
    //         //            )
    //         //            ->orderBy('created_at', $sort)
    //         //            ->paginate(6);

    //         if (!Auth::user()) {
    //             $userLogin = User::where('id_peran', 3)->first();
    //         } else {
    //             $userLogin = Auth::user()->id_pengguna;
    //         }

    //         $data = DB::table('penjemputan')
    //             ->join('pelacakan', 'penjemputan.id_pengguna_masyarakat', '=', 'pelacakan.id_pelacakan')
    //             ->join('pengguna', 'penjemputan.id_pengguna_masyarakat', '=', 'pengguna.id_pengguna')
    //             ->join('detail_penjemputan', 'penjemputan.id_penjemputan', '=', 'detail_penjemputan.id_penjemputan')
    //             ->join('kategori', 'detail_penjemputan.id_kategori', '=', 'kategori.id_kategori')
    //             ->where('pelacakan.status', 'Diproses')
    //             ->where('pengguna.nama', 'like', '%' . $search . '%')
    //             ->select(
    //                 'pengguna.nama',
    //                 'pelacakan.status',
    //                 'pelacakan.id_pelacakan',
    //                 'kategori.nama_kategori',
    //                 'detail_penjemputan.berat',
    //                 'penjemputan.id_penjemputan'
    //             );

    //         // dd($data);

    //         switch ($sort) {
    //             case 'berat-asc':
    //                 $data = $data->orderBy('detail_penjemputan.berat', 'desc');
    //                 break;
    //             case 'berat-desc':
    //                 $data = $data->orderBy('detail_penjemputan.berat', 'asc');
    //                 break;
    //             case 'diproses':
    //                 $data = $data->orderBy('pelacakan.status', 'asc');
    //                 break;
    //             case 'diterima':
    //                 $data = $data->orderBy('pelacakan.status', 'desc');
    //                 break;
    //             default:
    //                 $data = $data->orderBy('penjemputan.created_at', $sort);
    //                 break;
    //         }

    //         $data = $data->paginate(6);

    //         return view('mitra-kurir.penjemputan-sampah.permintaan-penjemputan', compact('data', 'sort', 'search'));
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }

    public function permintaan()
    {
        try {
            if (!Auth::user()) {
                $userLogin = User::where('id_peran', 3)->first();
            } else {
                $userLogin = Auth::user()->id_pengguna;
            }

            // $penjemputan = Penjemputan::with(['daerah', 'dropbox', 'penggunaMasyarakat', 'penggunaKurir', 'detailPenjemputan'])
            // 'Diproses','Diterima','Dijemput Kurir','Menuju Lokasi Penjemputan','Sampah Diangkut','Menuju Dropbox','Menyimpan Sampah di Dropbox','Selesai','Dibatalkan'
            $penjemputan = Penjemputan::with([
                'penggunaMasyarakat',        // Nama pengguna masyarakat
                'pelacakan',                 // Status penjemputan
                'detailPenjemputan.kategori.jenis'
            ])
                ->where('id_pengguna_kurir', $userLogin)
                ->filter(request(['search', 'kategori']))
                ->whereHas('pelacakan', function ($query) {
                    $query->whereNotIn('status', ['Diterima', 'Dijemput Kurir', 'Menuju Lokasi Penjemputan', 'Sampah Diangkut', 'Menuju Dropbox', 'Menyimpan Sampah di Dropbox', 'Selesai', 'Dibatalkan']);
                })
                ->orderBy('created_at', 'asc') // ambil penjemputan yang paling lama
                ->paginate(6);

            $penjemputan->transform(function ($item) {
                // Grup kategori dari detailPenjemputan
                $kategoriData = $item->detailPenjemputan
                    ->groupBy('id_kategori')
                    ->map(function ($details, $idKategori) {
                        return [
                            'id_kategori' => $details->first()->kategori->id_kategori ?? '#',
                            'nama_kategori' => $details->first()->kategori->nama_kategori ?? 'Unknown',
                            'jumlah_jenis' => $details->pluck('kategori.jenis.id_jenis')->unique()->count(),
                        ];
                    });

                $item->kategoriData = $kategoriData->values();

                return $item;
            });

            // dd($penjemputan);

            $kategori = Kategori::all();

            return view(
                'mitra-kurir.penjemputan-sampah.permintaan-penjemputan',
                compact('penjemputan', 'kategori')
            );
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // //untuk mengambil data dari database tabel penjemputan berdasarkan id
    // public function detailPermintaan($id)
    // {

    //     // dd(Auth::user()->id_pengguna);

    //     $data = DB::table('penjemputan')
    //         ->join('detail_penjemputan', 'penjemputan.id_penjemputan', '=', 'detail_penjemputan.id_penjemputan')
    //         ->join('pelacakan', 'penjemputan.id_pengguna_masyarakat', '=', 'pelacakan.id_pelacakan')
    //         ->join('pengguna', 'penjemputan.id_pengguna_masyarakat', '=', 'pengguna.id_pengguna')
    //         ->join('jenis', 'jenis.id_jenis', '=', 'detail_penjemputan.id_jenis')
    //         ->join('kategori', 'jenis.id_kategori', '=', 'kategori.id_kategori')
    //         ->join('dropbox', 'penjemputan.id_dropbox', '=', 'dropbox.id_dropbox')
    //         ->where('penjemputan.id_penjemputan', $id)
    //         ->select(
    //             'pengguna.nama',
    //             'pelacakan.status',
    //             'pelacakan.id_pelacakan',
    //             'jenis.nama_jenis',
    //             'detail_penjemputan.berat',
    //             'penjemputan.id_penjemputan',
    //             'penjemputan.alamat_penjemputan',
    //             'penjemputan.tanggal_penjemputan',
    //             'dropbox.alamat_dropbox',
    //             'kategori.nama_kategori',
    //             'penjemputan.catatan'
    //         )
    //         ->get();

    //     // dd($data);

    //     return view('mitra-kurir.penjemputan-sampah.detail-permintaan', compact('data',));
    // }

    public function detailPermintaan($id)
    {
        $penjemputan = Penjemputan::with([
            'daerah',
            'dropbox',
            'penggunaMasyarakat',
            'pelacakan',
            'detailPenjemputan.kategori.jenis'
        ])
            ->where('id_penjemputan', $id)
            ->whereHas('pelacakan', function ($query) {
                $query->whereNotIn('status', ['Diterima', 'Selesai', 'Dibatalkan']);
            })
            ->first();

        if ($penjemputan) {
            // Grup kategori dari detailPenjemputan
            $kategoriData = $penjemputan->detailPenjemputan
                ->groupBy('id_kategori')
                ->map(function ($details, $idKategori) {
                    return [
                        'nama_kategori' => $details->first()->kategori->nama_kategori ?? 'Unknown',
                        // Hitung jumlah jenis dari kategori ini
                        'jumlah_jenis' =>  $details->pluck('id_jenis')->unique()->count() ?? 0,
                    ];
                });

            // Tambahkan kategoriData ke model
            $penjemputan->kategoriData = $kategoriData->values();
        }

        return view('mitra-kurir.penjemputan-sampah.detail-permintaan', compact('penjemputan'));
    }



    //update status dari menunggu konfirmasi menjadi dijemput driver
    public function updateStatus(Request $request)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([
                'id_pelacakan' => 'required|exists:pelacakan,id_pelacakan',
                'status' => 'required|string',
            ]);

            $pelacakan = Pelacakan::find($validated['id_pelacakan']);

            $pelacakan->status = $validated['status'];
            $pelacakan->save();

            return redirect('mitra-kurir.penjemputan.permintaan')->back()->with('success', 'Status berhasil diperbarui.');
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * fn: dropbox
     * desk: Menampilkan penjemputan paling lama dengan status pelacakan selain 'Diproses','Diterima', 'Selesai' atau 'Dibatalkan'.
     *
     * @param NA
     * @return \Illuminate\View\View
     */
    public function dropbox()
    {
        try {
            /**
             * @ReadMe!!
             * Agar ini terlihat, pastikan login dengan dengan akun yang memiliki peran kurir dan memiliki penjemputan
             * dengan pelacakan berstatus selain 'Diproses','Diterima', 'Selesai' atau 'Dibatalkan'.
             */
            if (!Auth::user()) {
                $userLogin = User::where('id_peran', 3)->first();
            } else {
                $userLogin = Auth::user()->id_pengguna;
            }

            $penjemputan = Penjemputan::with(['daerah', 'dropbox', 'penggunaMasyarakat', 'penggunaKurir'])
                ->where('id_pengguna_kurir', $userLogin)
                ->whereHas('pelacakan', function ($query) {
                    $query->whereNotIn('status', ['Diproses', 'Diterima', 'Selesai', 'Dibatalkan']);
                })
                ->orderBy('created_at', 'asc') // ambil penjemputan yang paling lama
                ->first();

            $pelacakan = Pelacakan::where('id_penjemputan', $penjemputan?->id_penjemputan)
                ->whereNotIn('status', ['Diproses', 'Diterima', 'Selesai', 'Dibatalkan'])
                ->first();

            // dd($penjemputan);
            // dd(Auth::user());
            // dd($userLogin);

            return view(
                'mitra-kurir.penjemputan-sampah.dropbox',
                compact('penjemputan', 'pelacakan')
            );
            // return view('mitra-kurir.penjemputan-sampah.dropbox');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateStatusPelacakan(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'id_pelacakan' => 'required|exists:pelacakan,id_pelacakan',
            'status' => 'required|string',
        ]);

        $pelacakan = Pelacakan::find($validated['id_pelacakan']);

        $pelacakan->status = $validated['status'];
        $pelacakan->save();

        return redirect()->back()->with('success', 'Status pelacakan berhasil diperbarui.');
    }

    public function riwayat()
    {
        try {
            $search = request()->query('search', '');
            $sort = request()->query('sort', 'asc');

            $data = DB::table('penjemputan')
                ->join('pelacakan', 'penjemputan.id_pengguna_masyarakat', '=', 'pelacakan.id_pelacakan')
                ->join('pengguna', 'penjemputan.id_pengguna_masyarakat', '=', 'pengguna.id_pengguna')
                ->join('detail_penjemputan', 'penjemputan.id_penjemputan', '=', 'detail_penjemputan.id_penjemputan')
                ->join('kategori', 'detail_penjemputan.id_kategori', '=', 'kategori.id_kategori')
                ->where('pelacakan.status', 'Selesai')
                ->where('pengguna.nama', 'like', '%' . $search . '%')
                ->select(
                    'pengguna.nama',
                    'pengguna.nomor_telepon',
                    'pelacakan.status',
                    'pelacakan.id_pelacakan',
                    'kategori.nama_kategori',
                    'detail_penjemputan.berat',
                    'penjemputan.id_penjemputan'
                );

            switch ($sort) {
                case 'berat-asc':
                    $data = $data->orderBy('detail_penjemputan.berat', 'desc');
                    break;
                case 'berat-desc':
                    $data = $data->orderBy('detail_penjemputan.berat', 'asc');
                    break;
                default:
                    $data = $data->orderBy('penjemputan.created_at', $sort);
                    break;
            }

            $data = $data->paginate(6);

            return view('mitra-kurir.penjemputan-sampah.riwayat-penjemputan', compact('data', 'sort', 'search'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function detailRiwayat($id)
    {

        $data = DB::table('penjemputan')
            ->join('detail_penjemputan', 'penjemputan.id_penjemputan', '=', 'detail_penjemputan.id_penjemputan')
            ->join('pelacakan', 'penjemputan.id_pengguna_masyarakat', '=', 'pelacakan.id_pelacakan')
            ->join('pengguna', 'penjemputan.id_pengguna_masyarakat', '=', 'pengguna.id_pengguna')
            ->join('jenis', 'jenis.id_jenis', '=', 'detail_penjemputan.id_jenis')
            ->join('kategori', 'jenis.id_kategori', '=', 'kategori.id_kategori')
            ->join('dropbox', 'penjemputan.id_dropbox', '=', 'dropbox.id_dropbox')
            ->join('daerah', 'penjemputan.id_daerah', '=', 'daerah.id_daerah')
            ->where('penjemputan.id_penjemputan', $id)
            ->select(
                'pengguna.nama',
                'pengguna.nomor_telepon',
                'pelacakan.status',
                'pelacakan.id_pelacakan',
                'jenis.nama_jenis',
                'detail_penjemputan.berat',
                'penjemputan.id_penjemputan',
                'penjemputan.kode_penjemputan',
                'penjemputan.alamat_penjemputan',
                'penjemputan.tanggal_penjemputan',
                'penjemputan.catatan',
                'dropbox.alamat_dropbox',
                'kategori.nama_kategori',
                'daerah.nama_daerah'
            )
            ->get();

        return view('mitra-kurir.penjemputan-sampah.detail-riwayat', compact('data'));
    }
}
