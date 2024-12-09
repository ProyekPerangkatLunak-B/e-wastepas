<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSampah;
use App\Models\KategoriSampah;
use Illuminate\Http\Request;
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
            $jenisSampah = JenisSampah::join('kategori', 'kategori.id_kategori', '=', 'jenis.id_kategori')
                ->select('jenis.*', 'kategori.nama_kategori');

            return DataTablesDataTables::of($jenisSampah)
                ->addColumn('nama_kategori_sampah', function ($row) {
                    return $row->nama_kategori;
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
        // Validate incoming data
        $request->validate([
            'id_kategori' => 'required|integer',
            'nama_jenis' => 'required|string|max:255',
            'poin' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validating image
        ]);

        // Handle the image upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Generate unique image name
            $image->move(public_path('img/admin'), $imageName);
        } else {
            $imageName = null;
        }

        // Create a new record for JenisSampah
        JenisSampah::create([
            'id_kategori' => $request->id_kategori,
            'nama_jenis' => $request->nama_jenis,
            'poin' => $request->poin,
            'gambar' => $imageName,
        ]);

        return redirect()->route('admin.datamaster.jenis.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenisSampah = jenisSampah::with('kategoriSampah')->findOrFail($id);
        return view('admin.datamaster.master-data.jenis.edit', compact('jenisSampah'));
    }

    public function update(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'id_kategori' => 'required|integer',
            'nama_jenis' => 'required|string|max:255',
            'poin' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validating image
        ]);

        $jenisSampah = JenisSampah::findOrFail($id);

        // Handle the image upload if a new image is provided
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($jenisSampah->gambar) {
                $oldImagePath = public_path('img/admin/' . $jenisSampah->gambar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image file
                }
            }

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Generate unique image name
            $image->move(public_path('img/admin'), $imageName); // Save the new image to public/img/admin folder
        } else {
            $imageName = $jenisSampah->gambar; // Keep the old image if no new image is uploaded
        }

        // Update the record with new data
        $jenisSampah->update([
            'id_kategori' => $request->id_kategori,
            'nama_jenis' => $request->nama_jenis,
            'poin' => $request->poin,
            'gambar' => $imageName, // Update the image file name
        ]);

        return redirect()->route('admin.datamaster.jenis.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenisSampah = jenisSampah::findOrFail($id);
        $jenisSampah->delete();

        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
