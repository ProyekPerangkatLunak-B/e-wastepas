<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriSampah;
use Illuminate\Http\Request;
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
            $kategoriSampah = KategoriSampah::select(['id_kategori', 'nama_kategori', 'deskripsi_kategori','gambar']);
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
            $categories = KategoriSampah::all(['id_kategori as id', 'nama_kategori as text']);
        } else {
            $categories = KategoriSampah::where('nama_kategori', 'LIKE', '%' . $search . '%')
                ->get(['id_kategori as id', 'nama_kategori as text']);
        }

        return response()->json($categories);
    }

    public function create()
    {
        return view('admin.datamaster.master-data.kategori.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi_kategori' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the image upload if present
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Generate a unique name for the image
            $image->move(public_path('img/admin'), $imageName); // Save the image in the public/img/admin directory
        } else {
            $imageName = null; // If no image is uploaded, set it to null
        }

        // Create a new category record
        KategoriSampah::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi_kategori' => $request->deskripsi_kategori,
            'gambar' => $imageName, // Save the image file name in the database
        ]);

        // Redirect with success message
        return redirect()->route('admin.datamaster.kategori.index')->with('success', 'Data berhasil ditambahkan.');
    }


    public function storeKategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori',
        ]);

        // Create the category
        $kategori = KategoriSampah::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        // Prepare the response data
        $response = [
            'id' => $kategori->id_kategori,
            'text' => $kategori->nama_kategori,
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
        // Validate the incoming data
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi_kategori' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image (optional)
        ]);

        // Find the existing KategoriSampah record
        $kategori = KategoriSampah::findOrFail($id);

        // Check if a new image was uploaded
        if ($request->hasFile('gambar')) {
            // Delete the old image from storage if it exists
            if ($kategori->gambar && file_exists(public_path('img/admin/' . $kategori->gambar))) {
                unlink(public_path('img/admin/' . $kategori->gambar)); // Remove the old image
            }

            // Handle the new image upload
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Generate a unique name for the image
            $image->move(public_path('img/admin'), $imageName); // Save the new image

            // Update the image path in the database
            $kategori->gambar = $imageName;
        }

        // Update other fields without changing the image if no new image is provided
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi_kategori' => $request->deskripsi_kategori,
        ]);

        // Redirect with success message
        return redirect()->route('admin.datamaster.kategori.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = KategoriSampah::findOrFail($id);
        KategoriSampah::where('id_kategori', $id)->delete();
        $kategori->delete();

        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
