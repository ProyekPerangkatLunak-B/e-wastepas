<?php

namespace App\Http\Controllers\MitraKurir;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function index(){
        return view('mitra-kurir/registrasi/registrasi');
    }

    public function simpanData(Request $request){

        // dd($request->all()); 

        $validateData = $request->validate([
            'nama' => 'required',
            'KTP' => ['required', 'min:16'],
            'NomorHP' => ['required', 'min:12', 'max:14'],
            'Email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'ulangiPassword' => ['required', 'min:8', 'same:password'] // Ensure ulangiPassword matches password
        ]);

        User::create([
            'name' => $validateData['nama'], 
            'no_ktp' => $validateData['KTP'],
            'no_hp' => $validateData['NomorHP'],
            'email' => $validateData['Email'],
            'password' => Hash::make($validateData['password'])
        ]);
}
}
