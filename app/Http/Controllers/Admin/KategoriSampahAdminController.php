<?php

namespace App\Http\Controllers\Admin;

use App\Models\KategoriSampah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class KategoriSampahAdminController extends Controller
{

    public function index()
    {
        $kategoriSampah = KategoriSampah::all();
        return view('admin.datamaster.master-data.kategori.index', compact('kategoriSampah'));
    }


    public function getKategoriData()
    {
        try {
            $kategoriSampah = KategoriSampah::select(['id_kategori_sampah', 'nama_kategori_sampah']);
            return DataTablesDataTables::of($kategoriSampah)
                ->addColumn('action', function ($row) {
                    return '
                    <a href="/admin/datamaster/master-data/kategori/' . $row->id_kategori_sampah . '/edit" class="px-2 py-1 bg-blue-500 rounded hover:bg-blue-700 shadow">
                        <i class="fas fa-edit" style="color: white"></i>
                    </a>
                    <button class="px-2 py-1 bg-red-500 rounded hover:bg-red-700 shadow" onclick="confirmDelete(' . $row->id_kategori_sampah . ')">
                        <i class="fas fa-trash" style="color: white"></i>
                    </button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('term');

        if (empty($search)) {
            $categories = KategoriSampah::all(['id_kategori_sampah as id', 'nama_kategori_sampah as text']);
        } else {
            $categories = KategoriSampah::where('nama_kategori_sampah', 'LIKE', '%' . $search . '%')
                ->get(['id_kategori_sampah as id', 'nama_kategori_sampah as text']);
        }

        return response()->json($categories);
    }


    public function create()
    {
        return view('admin.datamaster.master-data.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_sampah' => 'required|string|max:255',
        ]);

        KategoriSampah::create($request->all());

        return redirect()->route('admin.datamaster.kategori.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function storeKategori(Request $request)
    {
        $request->validate([
            'nama_kategori_sampah' => 'required|string|max:255|unique:kategori_sampah,nama_kategori_sampah'
        ]);

        // Create the category
        $kategori = KategoriSampah::create([
            'nama_kategori_sampah' => $request->nama_kategori_sampah,
        ]);

        // Prepare the response data
        $response = [
            'id' => $kategori->id_kategori_sampah,
            'text' => $kategori->nama_kategori_sampah,
        ];

        // Return the JSON response
        return response()->json($response);
    }


    public function edit($id)
    {
        $kategoriSampah = KategoriSampah::findOrFail($id);
        return view('admin.datamaster.master-data.kategori.edit', compact('kategoriSampah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori_sampah' => 'required|string|max:255',
        ]);

        $kategori = KategoriSampah::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('admin.datamaster.kategori.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = KategoriSampah::findOrFail($id);
        $kategori->delete();

        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
