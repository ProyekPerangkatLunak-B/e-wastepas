@extends('layouts.main-manajemen')

@section('content')
<div class="min-h-screen mx-auto bg-gray-100 w-full ">  
  <!-- Main Content -->
  <div class="py-8">
    {{-- Section Judul --}}
    <h2 class="text-2xl font-semibold leading-relaxed ml-24">Riwayat Penjemputan Sampah</h2>
    <header class="flex justify-end items-center mb-6 mr-10">
        <div class="flex items-center">
          <input
            type="text"
            placeholder="Cari..."
            class="border rounded-md px-4 py-2 text-sm mr-3"
          />
          <button class="flex items-center border px-4 py-2 rounded-md text-sm">
            <span class="material-icons-outlined mr-2">filter</span> Filter
          </button>
        </div>
      </header>
      <h4 class="text-base font-normal ml-24 mb-10 -mt-14">Daftar Riwayat Penjemputan Sampah</h4>
    <div class="px-12 pb-6 mt-4 ml-10">
        <table class="w-full bg-white rounded-2xl shadow-md mt-6">
            <thead>
              <tr class="text-center text-sm font-bold">
                <th class="p-4">No</th>
                <th class="p-4">Kode</th>
                <th class="p-4">Tanggal Penjemputan</th>
                <th class="p-4">Alamat Penjemputan</th>
                <th class="p-4">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-t text-center">
                <td class="p-4">1</td>
                <td class="p-4">Asep</td>
                <td class="p-4">3,000</td>
                <td class="p-4">38,894</td>
                <td class="p-4">View</td>
              </tr>
              <tr class="border-t text-center">
                <td class="p-4">2</td>
                <td class="p-4">Asep</td>
                <td class="p-4">3,000</td>
                <td class="p-4">38,894</td>
                <td class="p-4">View</td>
              </tr>
              <tr class="border-t text-center">
                <td class="p-4">3</td>
                <td class="p-4">Asep</td>
                <td class="p-4">3,000</td>
                <td class="p-4">38,894</td>
                <td class="p-4">View</td>
              </tr>
              <tr class="border-t text-center">
                <td class="p-4">4</td>
                <td class="p-4">Asep</td>
                <td class="p-4">3,000</td>
                <td class="p-4">38,894</td>
                <td class="p-4">View</td>
              </tr>
            </tbody>
          </table>
</div>






@endsection
