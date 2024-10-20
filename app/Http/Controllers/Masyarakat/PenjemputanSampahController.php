<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenjemputanSampahController extends Controller
{
    public function __construct() {}
    public function index()
    {
        return view('masyarakat.penjemputan-sampah.index');
    }

    public function create()
    {
        return view('masyarakat.penjemputan-sampah.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
