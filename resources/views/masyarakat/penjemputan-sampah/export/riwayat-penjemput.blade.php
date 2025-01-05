@extends('layouts.main')

@section('content')
    <div class="min-h-screen mx-[22rem] pt-8 mt-2 bg-gray-100 w-[82%]">
        <div class="container mx-auto">
            <h2 class="mb-1 ml-20 text-xl font-bold text-black-normal">Riwayat Penjemputan Sampah Elektronik</h2>
            <p class="ml-20 font-semibold text-gray-600 text-md">Data Tabel Riwayat Penjemputan Sampah Elektronik</p>

            <div class="p-6 px-0">
                <div class="overflow-x-auto">
                    <table class="w-4/5 mx-auto mt-4 text-left bg-white border-collapse rounded-lg shadow-sm min-w-max">
                        <thead>
                            <tr class="text-gray-900 bg-gray-400">
                                <th class="px-4 py-3 font-bold tracking-wide text-center border text-md">Kode Penjemputan</th>
                                <th class="px-4 py-3 font-bold tracking-wide text-center border text-md">Total Berat</th>
                                <th class="px-4 py-3 font-bold tracking-wide text-center border text-md">Total Poin</th>
                                <th class="px-4 py-3 font-bold tracking-wide text-center border text-md">Sampah Elektronik</th>
                                <th class="px-4 py-3 font-bold tracking-wide text-center border text-md">Tanggal Penjemputan</th>
                                <th class="px-4 py-3 font-bold tracking-wide text-center border text-md">Alamat Penjemputan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat as $r)
                                <tr class="transition-colors duration-200 hover:bg-tertiary-200">
                                    <td class="px-4 py-3 text-gray-900 border">{{ $r->kode_penjemputan }}</td>
                                    <td class="px-4 py-3 text-gray-900 border">{{ $r->total_berat }} kg</td>
                                    <td class="px-4 py-3 text-gray-900 border">{{ $r->total_poin }}</td>
                                    <td class="px-4 py-3 text-gray-900 border">
                                        <ol class="list-disc list-inside">
                                            @foreach ($r->detailPenjemputan as $detail)
                                                <li>{{ $detail->jenis->nama_jenis }}</li>
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td class="px-4 py-3 text-gray-900 border">
                                        {{ \Carbon\Carbon::parse($r->tanggal_penjemputan)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-900 border">{{ $r->alamat_penjemputan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
