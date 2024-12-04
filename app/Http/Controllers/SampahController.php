<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SampahController extends Controller
{
    public function index()
    {
        // Menghitung total berat sampah
        $totalSampah = DB::table('sampah_detail')->sum('berat');

        // Mengembalikan data ke view
        return view('manajemen.datamaster.dashboard.index', [
            'totalSampah' => $totalSampah,
        ]);
    }
}
