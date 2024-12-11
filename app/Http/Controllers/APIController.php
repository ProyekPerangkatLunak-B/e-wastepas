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
    public function getKategori($id = null)
    {
        if (!$id) {
            $kategori = Kategori::all();
        } else {
            $kategori = Kategori::where('id_kategori', $id)->get();
        }
        return response()->json($kategori);
    }

    public function getJenis($id = null)
    {
        if (!$id) {
            $jenis = Jenis::all();
        } else {
            $jenis = Jenis::where('id_kategori', $id)->get();
        }
        return response()->json($jenis);
    }

    public function getDaerah($id = null)
    {
        if (!$id) {
            $daerah = Daerah::all();
        } else {
            $daerah = Daerah::where('id_daerah', $id)->get();
        }
        return response()->json($daerah);
    }

    public function getDropbox($id = null)
    {
        if (!$id) {
            $dropbox = Dropbox::all();
        } else {
            $dropbox = Dropbox::where('id_daerah', $id)->get();
        }
        return response()->json($dropbox);
    }
}
