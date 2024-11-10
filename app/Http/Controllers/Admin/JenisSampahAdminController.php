<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisSampah;
use App\Models\KategoriSampah;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class JenisSampahAdminController extends Controller
{

    public function index()
    {
        $jenisSampah = JenisSampah::all();
        return view('admin.datamaster.master-data.jenis.index', compact('jenisSampah'));
    }


    public function getJenisSampahData()
    {
        try {
            $jenisSampah = JenisSampah::with('kategoriSampah')
                ->select('jenis_sampah.*');

            return DataTablesDataTables::of($jenisSampah)
                ->addColumn('nama_kategori_sampah', function ($row) {
                    return $row->kategoriSampah ? $row->kategoriSampah->nama_kategori_sampah : '-';
                })
                ->addColumn('action', function ($row) {
                    return '
                    <div class="flex space-x-2">
                        <a href="/admin/datamaster/master-data/jenisSampah/' . $row->id_jenisSampah . '/edit" class="px-3 py-1 bg-gradient-to-r from-blue-500 to-green-400 text-white text-sm rounded hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-500 transform hover:-translate-y-1 transition">
                            Edit
                        </a>
                        <button class="px-3 py-1 bg-gradient-to-r from-red-500 to-red-400 text-white text-sm rounded hover:bg-red-600 transform hover:-translate-y-1 transition" onclick="confirmDelete(' . $row->id_jenisSampah . ')">
                            Hapus
                        </button>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function create()
    {
        $kategoriSampah = KategoriSampah::all(); // Pastikan model KategoriSampah diimport
        return view('admin.datamaster.master-data.jenis.create', compact('kategoriSampah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori_sampah' => 'required|integer',
            'nama_jenis_sampah' => 'required|string|max:255',
            'poin' => 'required|integer',
        ]);

        jenisSampah::create($request->all());

        return redirect()->route('admin.datamaster.jenis.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenisSampah = jenisSampah::with('kategoriSampah')->findOrFail($id);
        return view('admin.datamaster.master-data.jenis.edit', compact('jenisSampah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori_sampah' => 'required|integer',
            'nama_jenis_sampah' => 'required|string|max:255',
            'poin' => 'required|integer',
        ]);

        $jenisSampah = jenisSampah::findOrFail($id);
        $jenisSampah->update($request->all());

        return redirect()->route('admin.datamaster.jenis.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenisSampah = jenisSampah::findOrFail($id);
        $jenisSampah->delete();

        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
