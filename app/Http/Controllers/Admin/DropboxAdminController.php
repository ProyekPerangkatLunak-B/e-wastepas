<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dropbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class DropboxAdminController extends Controller
{

    public function index()
    {
        $dropbox = Dropbox::all();
        return view('admin.datamaster.master-data.dropbox.index', compact('dropbox'));
    }


    public function getDropboxData()
    {
        try {
            $dropbox = Dropbox::select(['nama_lokasi', 'alamat', 'status_dropbox', 'total_transaksi_dropbox', 'id_dropbox']);
            return DataTablesDataTables::of($dropbox)
                ->addColumn('action', function ($row) {
                    return '
                    <div class="flex space-x-2">
                        <a href="/admin/datamaster/master-data/dropbox/' . $row->id_dropbox . '/edit" class="px-3 py-1 bg-gradient-to-r from-blue-500 to-green-400 text-white text-sm rounded hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-500 transform hover:-translate-y-1 transition">
                            Edit
                        </a>
                        <button class="px-3 py-1 bg-gradient-to-r from-red-500 to-red-400 text-white text-sm rounded hover:bg-red-600 transform hover:-translate-y-1 transition" onclick="confirmDelete(' . $row->id_dropbox . ')">
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
        return view('admin.datamaster.master-data.dropbox.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_daerah' => 'required|integer',
            'nama_lokasi' => 'required|string|max:255',
            'alamat' => 'required|string',
            'status_dropbox' => 'required|boolean',
            'total_transaksi_dropbox' => 'nullable|integer',
        ]);

        Dropbox::create($request->all());

        return redirect()->route('admin.datamaster.dropbox.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dropbox = Dropbox::findOrFail($id);
        return view('admin.datamaster.master-data.dropbox.edit', compact('dropbox'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_daerah' => 'required|integer',
            'nama_lokasi' => 'required|string|max:255',
            'alamat' => 'required|string',
            'status_dropbox' => 'required|boolean',
            'total_transaksi_dropbox' => 'nullable|integer',
        ]);

        $dropbox = Dropbox::findOrFail($id);
        $dropbox->update($request->all());

        return redirect()->route('admin.datamaster.dropbox.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dropbox = Dropbox::findOrFail($id);
        $dropbox->delete();

        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
