<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MitraKurirController extends Controller
{
    // MitraKurirController.php
public function kategori()
{
    return view('mitra-kurir.penjemputan-sampah.kategori');
}

public function detailKategori()
{
    return view('mitra-kurir.penjemputan-sampah.detail-kategori', [
        "namaKategori" => "Layar dan Monitor"
    ]);
}

public function permintaan()
{
    return view('mitra-kurir.penjemputan-sampah.permintaan-penjemputan');
}

public function dropbox()
{
    return view('mitra-kurir.penjemputan-sampah.dropbox');
}

public function riwayat()
{
    return view('mitra-kurir.penjemputan-sampah.riwayat');
}

}
