<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Daerah;
use App\Models\Dropbox;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    public function getKategori(Request $request)
    {
        $search = $request->input('search');
        $id = $request->input('id');

        $query = Kategori::query();

        if ($id) {
            $query->where('id_kategori', $id);
        } elseif ($search) {
            $query->where('nama_kategori', 'like', '%' . $search . '%');
        }

        $kategori = $query->get();

        return response()->json($kategori);
    }

    public function getJenis(Request $request, $id = null)
    {
        $search = $request->input('search');

        $query = Jenis::query();

        // Filter berdasarkan id_kategori
        if ($id) {
            $query->where('id_kategori', $id);
        }

        // Filter berdasarkan pencarian nama jenis
        if ($search) {
            $query->where('nama_jenis', 'like', '%' . $search . '%');
        }

        $jenis = $query->get();

        return response()->json($jenis);
    }

    public function getDaerah(Request $request)
    {
        $search = $request->input('search');
        $id = $request->input('id');

        $query = Daerah::query();

        if ($id) {
            $query->where('id_daerah', $id);
        } elseif ($search) {
            $query->where('nama_daerah', 'like', '%' . $search . '%');
        }

        $daerah = $query->get();

        return response()->json($daerah);
    }

    public function getDropbox(Request $request, $id = null)
    {
        $search = $request->input('search');

        $query = Dropbox::query();

        // Filter berdasarkan id_daerah
        if ($id) {
            $query->where('id_daerah', $id);
        }

        // Filter berdasarkan pencarian nama dropbox
        if ($search) {
            $query->where('nama_dropbox', 'like', '%' . $search . '%');
        }

        $dropbox = $query->get();

        return response()->json($dropbox);
    }
}