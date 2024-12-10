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
    public function getKategori()
    {
        $kategori = Kategori::all();
        return response()->json($kategori);
    }

    public function getJenis($id)
    {
        $jenis = Jenis::where('id_kategori', $id)->get();
        return response()->json($jenis);
    }

    public function getDaerah()
    {
        $daerah = Daerah::all();
        return response()->json($daerah);
    }

    public function getDropbox($id)
    {
        $dropbox = Dropbox::where('id_daerah', $id)->get();
        return response()->json($dropbox);
    }

    public function JenisOption($id)
    {
        $jenis = Jenis::where('id_kategori', $id)->get();
        $output = array();
        foreach ($jenis as $row) {
            $output[] = array(
                'id' => $row->id_jenis,
                'text' => $row->nama_jenis
            );
        }

        return response()->json($output);
    }

    public function DropboxOption($id)
    {
        $dropbox = Dropbox::where('id_daerah', $id)->get();
        $output = array();
        foreach ($dropbox as $row) {
            $output[] = array(
                'id' => $row->id_dropbox,
                'text' => $row->nama_dropbox
            );
        }

        return response()->json($output);
    }
}