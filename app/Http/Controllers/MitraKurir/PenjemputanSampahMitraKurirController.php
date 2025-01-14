<?php

namespace App\Http\Controllers\MitraKurir;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Pelacakan;
use App\Models\Penjemputan;
use Illuminate\Http\Request;
use App\Models\User;
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
                'penggunaMasyarakat',
                'pelacakan' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                },
                'detailPenjemputan' => function ($query) {
                    $query->select('id_penjemputan', 'id_kategori')
                        ->selectRaw('COUNT(*) as jumlah')
                        ->groupBy('id_penjemputan', 'id_kategori'); // Kelompokkan berdasarkan kategori
                },
            ])
                ->where('id_pengguna_kurir', $userLogin)
                ->filter(request(['search', 'total-berat']))
                ->whereHas('pelacakan', function ($query) {
                    $query->where('status', 'diproses');
                })
                ->whereDoesntHave('pelacakan', function ($query) {
                    $query->where('status', '!=', 'diproses');
                })
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
            'pelacakan' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'detailPenjemputan'  => function ($query) {
                $query->select('id_penjemputan', 'id_kategori')
                    ->selectRaw('COUNT(*) as jumlah')
                    ->selectRaw('GROUP_CONCAT(id_jenis) as id_jenis_grouped')
                    ->groupBy('id_penjemputan', 'id_kategori');
            },
            'detailPenjemputan.kategori',
            'detailPenjemputan.penjemputan',
        ])
            ->where('id_penjemputan', $id)
            ->whereHas('pelacakan', function ($query) {
                $query->whereNotIn('status', ['Diterima', 'Selesai', 'Dibatalkan']);
            })
            ->orderBy('created_at', 'desc')
            ->first();

        foreach ($penjemputan->detailPenjemputan as $detail) {
            $idJenisGrouped = explode(',', $detail->id_jenis_grouped);
            $detail->jenisList = Jenis::whereIn('id_jenis', $idJenisGrouped)->get();
        }

        $status = $penjemputan->pelacakan->first()->status ?? null;
        $catatan = $penjemputan->catatan ?? null;

        return view('mitra-kurir.penjemputan-sampah.detail-permintaan', compact('penjemputan','status','catatan'));
    }



    //update status dari menunggu konfirmasi menjadi dijemput driver
    public function updateStatus(Request $request)
    {
        // dd($request->all());
        try {
            // Validasi data request
            $validated = $request->validate([
                'id_pelacakan' => 'required|exists:pelacakan,id_pelacakan',
                'status' => 'required|string',
            ]);

            // Periksa pengguna yang login
            // $userLogin = Auth::check()
            //     ? Auth::user()->id_pengguna
            //     : User::where('id_peran', 3)->value('id_pengguna');

            // // Ambil data penjemputan kurir
            // $penjemputan = Penjemputan::with('pelacakan')
            //     ->where('id_pengguna_kurir', $userLogin)
            //     ->get();

            // // Cek apakah ada penjemputan dengan status tertentu
            // $hasActiveStatus = $penjemputan->contains(function ($penjemputan) {
            //     return $penjemputan->pelacakan
            //         ->whereNotIn('status', ['Diproses', 'Diterima'])
            //         ->isNotEmpty();
            // });

            // if ($hasActiveStatus) {
            //     return redirect()->back()->with('error', 'Kamu memiliki penjemputan yang harus dijemput.');
            // }

            // Temukan pelacakan yang sesuai
            $existingPelacakan = Pelacakan::findOrFail($validated['id_pelacakan']);

            // Buat pelacakan baru dengan status yang diperbarui
            $newPelacakan = $existingPelacakan->replicate();
            $newPelacakan->status = $validated['status'];
            $newPelacakan->save();

//            // Update status pelacakan
//            $pelacakan->update([
//                'status' => $validated['status']
//            ]);

            return redirect()->route('mitra-kurir.penjemputan.dropbox')->with('success', 'Status berhasil diperbarui.');
        } catch (\Exception $e) {
            // Tangani kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
                    $query->whereNotIn('status', ['Diproses', 'Diterima', 'Selesai', 'Dibatalkan'])
                    ->orderBy('created_at', 'desc');
                })
                ->whereDoesntHave('pelacakan', function ($query) {
                    $query->where('status', 'Selesai');
                })
                ->orderBy('created_at', 'desc') // ambil penjemputan yang paling lama
                ->first();

//            $pelacakan = Pelacakan::where('id_penjemputan', $penjemputan?->id_penjemputan)
//                ->orderBy('created_at', 'desc')
//                ->first();

            $pelacakan = Pelacakan::where('id_penjemputan', $penjemputan?->id_penjemputan)
                ->whereNotIn('status', ['Diproses', 'Diterima', 'Selesai', 'Dibatalkan'])
                ->orderBy('created_at', 'desc')
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

//    public function dropbox()
//    {
//        try {
//            /**
//             * @ReadMe!!
//             * Agar ini terlihat, pastikan login dengan dengan akun yang memiliki peran kurir dan memiliki penjemputan
//             * dengan pelacakan berstatus selain 'Diproses','Diterima', 'Selesai' atau 'Dibatalkan'.
//             */
//            if (!Auth::user()) {
//                $userLogin = User::where('id_peran', 3)->first();
//            } else {
//                $userLogin = Auth::user()->id_pengguna;
//            }
//
//            $penjemputan = Penjemputan::with(['daerah', 'dropbox', 'penggunaMasyarakat', 'penggunaKurir'])
//                ->where('id_pengguna_kurir', $userLogin)
//                ->whereHas('pelacakan', function ($query) {
//                    $query->whereDoesntHave('status', ['Diproses', 'Diterima', 'Selesai', 'Dibatalkan'])
//                    ->orderBy('created_at', 'desc');
//                })
//                ->orderBy('created_at', 'asc') // ambil penjemputan yang paling lama
//                ->first();
//
//            $pelacakan = Pelacakan::where('id_penjemputan', $penjemputan?->id_penjemputan)
//                ->whereDoesntHave('status', ['Diproses', 'Diterima', 'Selesai', 'Dibatalkan'])
//                ->orderBy('created_at', 'desc')
//                ->first();
//
//            // dd($penjemputan);
//            // dd(Auth::user());
//            // dd($userLogin);
//
//            return view(
//                'mitra-kurir.penjemputan-sampah.dropbox',
//                compact('penjemputan', 'pelacakan')
//            );
//            // return view('mitra-kurir.penjemputan-sampah.dropbox');
//        } catch (\Throwable $th) {
//            throw $th;
//        }
//    }

    public function updateStatusPelacakan(Request $request)
    {
        try {
            // dd($request->all());

            $validated = $request->validate([
                'id_pelacakan' => 'required|exists:pelacakan,id_pelacakan',
                'status' => 'required|string',
            ]);

            $existingPelacakan = Pelacakan::findOrFail($validated['id_pelacakan']);

            $newPelacakan = $existingPelacakan->replicate();
            $newPelacakan->status = $validated['status'];
            $newPelacakan->save();

//            $latestPelacakan = Pelacakan::where('id_penjemputan', $existingPelacakan->id_penjemputan)
//                ->orderBy('created_at', 'desc')
//                ->first();
//            $latestPelacakan->save();

//        $pelacakan = Pelacakan::find($validated['id_pelacakan']);
//
//        $pelacakan->status = $validated['status'];
//        $pelacakan->save();

            return redirect()->route('mitra-kurir.penjemputan.dropbox')->with('success', 'Status pelacakan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

//    public function riwayat()
//    {
//        try {
//
//            if (!Auth::user()) {
//                $userLogin = User::where('id_peran', 3)->first();
//            } else {
//                $userLogin = Auth::user()->id_pengguna;
//            }
//
//            $search = request()->query('search', '');
//            $sort = request()->query('sort', 'asc');
//
//            $data = DB::table('penjemputan')
//                ->join('pelacakan', 'penjemputan.id_pengguna_masyarakat', '=', 'pelacakan.id_pelacakan')
//                ->join('pengguna', 'penjemputan.id_pengguna_masyarakat', '=', 'pengguna.id_pengguna')
//                ->join('detail_penjemputan', 'penjemputan.id_penjemputan', '=', 'detail_penjemputan.id_penjemputan')
//                ->join('kategori', 'detail_penjemputan.id_kategori', '=', 'kategori.id_kategori')
//                ->where('pengguna.id_pengguna', $userLogin)
//                ->where('pelacakan.status', 'Selesai')
//                ->where('pengguna.nama', 'like', '%' . $search . '%')
//                ->select(
//                    'pengguna.nama',
//                    'pengguna.nomor_telepon',
//                    'pelacakan.status',
//                    'pelacakan.id_pelacakan',
//                    'kategori.nama_kategori',
//                    'detail_penjemputan.berat',
//                    'penjemputan.id_penjemputan'
//                );
//
//            switch ($sort) {
//                case 'berat-asc':
//                    $data = $data->orderBy('detail_penjemputan.berat', 'desc');
//                    break;
//                case 'berat-desc':
//                    $data = $data->orderBy('detail_penjemputan.berat', 'asc');
//                    break;
//                default:
//                    $data = $data->orderBy('penjemputan.created_at', $sort);
//                    break;
//            }
//
//            $data = $data->paginate(6);
//
//            return view('mitra-kurir.penjemputan-sampah.riwayat-penjemputan', compact('data', 'sort', 'search'));
//        } catch (\Throwable $th) {
//            throw $th;
//        }
//    }

    public function riwayat()
    {
    try {

            $search = request()->query('search', '');
            $sort = request()->query('sort', 'asc');

            if (!Auth::user()) {
                $userLogin = User::where('id_peran', 3)->first();
            } else {
                $userLogin = Auth::user()->id_pengguna;
            }
            $penjemputan = Penjemputan::with([
                'penggunaMasyarakat',
                'pelacakan' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                },
                'detailPenjemputan' => function ($query) {
                    $query->select('id_penjemputan', 'id_kategori')
                        ->selectRaw('COUNT(*) as jumlah')
                        ->groupBy('id_penjemputan', 'id_kategori'); // Kelompokkan berdasarkan kategori
                },
            ])
                ->where('id_pengguna_kurir', $userLogin)
                ->filter(request(['search', 'total-berat']))
                ->whereHas('pelacakan', function ($query) {
                    $query->where('status', 'Selesai');
                })
                ->paginate(6);

            $totalSampah = $penjemputan->getCollection()->sum(function ($item) {
                return $item->detailPenjemputan->count();
            });
            $totalBeratSampah = $penjemputan->getCollection()->sum('total_berat');

            // dd($penjemputan);
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



            $kategori = Kategori::all();



                return view(
                    'mitra-kurir.penjemputan-sampah.riwayat-penjemputan',
                    compact('penjemputan', 'kategori', 'totalSampah', 'totalBeratSampah')
                );
        //code...
            } catch (\Throwable $th) {
                throw $th;
            }
    }

//    public function detailRiwayat($id)
//    {
//
//        $data = DB::table('penjemputan')
//            ->join('detail_penjemputan', 'penjemputan.id_penjemputan', '=', 'detail_penjemputan.id_penjemputan')
//            ->join('pelacakan', 'penjemputan.id_pengguna_masyarakat', '=', 'pelacakan.id_pelacakan')
//            ->join('pengguna', 'penjemputan.id_pengguna_masyarakat', '=', 'pengguna.id_pengguna')
//            ->join('jenis', 'jenis.id_jenis', '=', 'detail_penjemputan.id_jenis')
//            ->join('kategori', 'jenis.id_kategori', '=', 'kategori.id_kategori')
//            ->join('dropbox', 'penjemputan.id_dropbox', '=', 'dropbox.id_dropbox')
//            ->join('daerah', 'penjemputan.id_daerah', '=', 'daerah.id_daerah')
//            ->where('penjemputan.id_penjemputan', $id)
//            ->select(
//                'pengguna.nama',
//                'pengguna.nomor_telepon',
//                'pelacakan.status',
//                'pelacakan.id_pelacakan',
//                'jenis.nama_jenis',
//                'detail_penjemputan.berat',
//                'penjemputan.id_penjemputan',
//                'penjemputan.kode_penjemputan',
//                'penjemputan.alamat_penjemputan',
//                'penjemputan.tanggal_penjemputan',
//                'penjemputan.catatan',
//                'dropbox.alamat_dropbox',
//                'kategori.nama_kategori',
//                'daerah.nama_daerah'
//            )
//            ->get();
//
//        return view('mitra-kurir.penjemputan-sampah.detail-riwayat', compact('data'));
//    }

    public function detailRiwayat($id)
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
                $query->where('status', 'Selesai');
            })
            ->orderBy('created_at', 'desc')
            ->first();


        if ($penjemputan) {
            foreach ($penjemputan->detailPenjemputan as $detail) {
                $idJenisGrouped = explode(',', $detail->id_jenis_grouped);
                $detail->jenisList = Jenis::whereIn('id_jenis', $idJenisGrouped)->get();
            }
        }

        $status = $penjemputan->pelacakan->sortByDesc('created_at')->first()->status ?? null;
        $catatan = $penjemputan->catatan ?? null;

//        dd($penjemputan);

        return view('mitra-kurir.penjemputan-sampah.detail-riwayat', compact('penjemputan', 'status', 'catatan'));
    }
}
