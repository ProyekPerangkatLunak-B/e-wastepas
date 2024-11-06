<?php

namespace App\Http\Controllers\Admin;

use App\Models\Daerah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class DaerahAdminController extends Controller
{

    public function index()
    {
        $daerah = Daerah::all();
        return view('admin.datamaster.master-data.daerah.index', compact('daerah'));
    }

    public function getDaerahData()
    {
        try {
            $daerah = Daerah::select(['id_daerah', 'nama_daerah', 'status_daerah', 'total_dropbox']);
            return DataTablesDataTables::of($daerah)
                ->addColumn('action', function ($row) {
                    return '
                    <div class="flex space-x-2">
                        <a href="/admin/datamaster/master-data/daerah/' . $row->id_daerah . '/edit" class="px-3 py-1 bg-gradient-to-r from-blue-500 to-green-400 text-white text-sm rounded hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-500 transform hover:-translate-y-1 transition">
                            Edit
                        </a>
                        <button class="px-3 py-1 bg-gradient-to-r from-red-500 to-red-400 text-white text-sm rounded hover:bg-red-600 transform hover:-translate-y-1 transition" onclick="confirmDelete(' . $row->id_daerah . ')">
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

    //search
    public function search(Request $request)
    {
        $search = $request->input('term');

        if (empty($search)) {
            $daerah = Daerah::all(['id_daerah as id', 'nama_daerah as text']);
        } else {
            $daerah = Daerah::where('nama_daerah', 'LIKE', '%' . $search . '%')
                ->get(['id_daerah as id', 'nama_daerah as text']);
        }

        return response()->json($daerah);
    }

    //store daerah
    public function storeDaerah(Request $request)
    {
        $request->validate([
            'nama_daerah' => 'required|string|max:255',
        ]);

        // Set default values for status_daerah and total_dropbox
        $data = $request->all();
        $data['status_daerah'] = 1; // Automatically set status_daerah to 1
        $data['total_dropbox'] = 1; // Automatically set total_dropbox to 1

        // Create the new Daerah record
        $daerah = Daerah::create($data);

        // Prepare response data
        $response = [
            'id' => $daerah->id_daerah,
            'text' => $daerah->nama_daerah,
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan.',
        ];

        return response()->json($response);
    }



    public function create()
    {
        return view('admin.datamaster.master-data.daerah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_daerah' => 'required|string|max:255',
            'status_daerah' => 'required|boolean',
            'total_dropbox' => 'required|integer',
        ]);

        Daerah::create($request->all());

        return redirect()->route('admin.datamaster.daerah.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $daerah = Daerah::findOrFail($id);
        return view('admin.datamaster.master-data.daerah.edit', compact('daerah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_daerah' => 'required|string|max:255',
            'status_daerah' => 'required|boolean',
            'total_dropbox' => 'required|integer',
        ]);

        $daerah = Daerah::findOrFail($id);
        $daerah->update($request->all());

        return redirect()->route('admin.datamaster.daerah.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $daerah = Daerah::findOrFail($id);
        $daerah->delete();

        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
