@extends('layouts.main')

@section('content')
<div class="min-h-screen mx-[22rem] pt-8 mt-2 bg-gray-100 w-[82%]">
    <div class="container mx-auto">
        <h2 class="mb-1 ml-20 text-xl font-bold text-black-normal">Riwayat Penjemputan Sampah Elektronik</h2>
        <p class="ml-20 font-semibold text-gray-600 text-md">Data Tabel Riwayat Penjemputan Sampah Elektronik</p>

        <div class="p-6 px-0 overflow-x-auto">
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
                    <tr class="transition-colors duration-200 hover:bg-tertiary-200">
                        <td class="px-4 py-3 text-gray-900 border">KP001</td>
                        <td class="px-4 py-3 text-gray-900 border">5 kg</td>
                        <td class="px-4 py-3 text-gray-900 border">50</td>
                        <td class="px-4 py-3 text-gray-900 border">Plastic, Paper</td>
                        <td class="px-4 py-3 text-gray-900 border">2023-10-01</td>
                        <td class="px-4 py-3 text-gray-900 border">123 Main St</td>
                    </tr>
                    <tr class="transition-colors duration-200 hover:bg-tertiary-200">
                        <td class="px-4 py-3 text-gray-900 border">KP002</td>
                        <td class="px-4 py-3 text-gray-900 border">3 kg</td>
                        <td class="px-4 py-3 text-gray-900 border">30</td>
                        <td class="px-4 py-3 text-gray-900 border">Glass, Metal</td>
                        <td class="px-4 py-3 text-gray-900 border">2023-10-02</td>
                        <td class="px-4 py-3 text-gray-900 border">456 Elm St</td>
                    </tr>
                    <tr class="transition-colors duration-200 hover:bg-tertiary-200">
                        <td class="px-4 py-3 text-gray-900 border">KP003</td>
                        <td class="px-4 py-3 text-gray-900 border">7 kg</td>
                        <td class="px-4 py-3 text-gray-900 border">70</td>
                        <td class="px-4 py-3 text-gray-900 border">Organic, Plastic</td>
                        <td class="px-4 py-3 text-gray-900 border">2023-10-03</td>
                        <td class="px-4 py-3 text-gray-900 border">789 Pine St</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
