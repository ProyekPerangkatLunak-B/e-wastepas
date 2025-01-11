@extends('layouts.main-manajemen')

@section('content')
<div class="min-h-screen mx-auto bg-gray-100 w-full">
    <div class="py-8">
        <h2 class="text-2xl font-semibold leading-relaxed ml-24">Detail Penjemputan</h2>
        <div class="px-12 pb-6 mt-4 ml-10 bg-white rounded-2xl shadow-md">
            <div class="p-6">
                <p><strong>Kode Penjemputan:</strong> {{ $penjemputan->kode_penjemputan }}</p>
                <p><strong>Tanggal Penjemputan:</strong> {{ \Carbon\Carbon::parse($penjemputan->tanggal_penjemputan)->format('d-m-Y') }}</p>
                <p><strong>Alamat Penjemputan:</strong> {{ $penjemputan->alamat_penjemputan }}</p>
                <p><strong>Kurir:</strong> {{ $penjemputan->kurir_nama }}</p>
                <p><strong>Catatan:</strong> {{ $penjemputan->catatan ?? 'Tidak ada catatan' }}</p>
            </div>
            <div class="p-6">
                <a href="{{ route('manajemen.datamaster.riwayat.index') }}" class="text-blue-500">Kembali ke daftar</a>
            </div>
        </div>
    </div>
</div>
@endsection
