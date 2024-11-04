@extends('layouts.main')

@section('content')
<div class="w-[81%] min-h-screen px-[5rem] py-12 mx-[22rem] bg-gray-100">

    {{-- Breadcrumbs section --}}
    <div class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center -ml-3 space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="#" class="inline-flex ml-1 text-sm font-medium text-gray-800 hover:underline md:ml-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-4">
                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
              Total Sampah & Riwayat Penjemputan
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <span class="mx-2.5 text-gray-800 ">/</span>
              <a href="{{ route('masyarakat.penjemputan.riwayat') }}" class="ml-1 text-sm font-medium text-gray-800 hover:underline md:ml-2">
                Riwayat Penjemputan
              </a>
            </div>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <span class="mx-2.5 text-gray-800 ">/</span>
              <span class="ml-1 text-sm font-medium text-gray-800 hover:underline md:ml-2">
                Detail Riwayat
              </span>
            </div>
          </li>
        </ol>
      </div>

    <div class="flex items-center justify-between mx-auto mt-8">
        <div>
            <h2 class="text-xl font-semibold leading-relaxed">Detail Riwayat</h2>
            <p class="text-base font-normal text-gray-600">Detail Riwayat ID Penjemputan sampah 232800749.</p>
        </div>
        <div class="inline-flex items-center justify-end ml-auto space-x-4">
            {{-- Button PDF dan XLSX(Excel) --}}
            <a href="#"
               class="flex items-center justify-center w-[150px] h-[50px] px-4 text-black-normal transition duration-300 bg-primary-lighten hover:bg-primary-200 rounded-2xl shadow-md">
                XLSX
            </a>
            <a href="#"
               class="flex items-center justify-center w-[150px] h-[50px] px-4 text-black-normal transition duration-300 bg-red-normal hover:bg-red-400 rounded-2xl shadow-md">
                PDF
            </a>
        </div>
    </div>

    {{-- Card Detail Riwayat --}}
    <div class="w-[1380px] h-[480px] flex items-center justify-between mt-4 rounded-2xl shadow-lg bg-white-normal">
        <div class="px-8">
            <div class="flex justify-between">
                <!-- Diambil Dari Section -->
                <div class="w-1/2 pr-6 mt-2 ml-4">

                    <h3 class="mb-2 text-lg font-bold">Lorem</h3>
                    <p class="mb-8 text-gray-600">Lorem ipsum dolor sit amet.</p>

                    <h3 class="text-lg font-bold">Lorem</h3>
                    <p class="mb-8 text-gray-600">Lorem ipsum dolor sit amet.</p>

                    <h3 class="text-lg font-bold">Lorem</h3>
                    <p class="mb-8 text-gray-600">Lorem ipsum dolor sit amet.</p>

                    <h3 class="mb-2 text-lg font-bold">Diambil dari</h3>
                    <p class="mb-8 text-gray-600">DROPBOX CIDADAP, Jalan Kapten Abdul Hamid No.86, RT.3/RW.1, Kelurahan Ledeng, Cidadap KOTA BANDUNG, CIDADAP, JAWA BARAT, ID, 40142</p>

                </div>

                <!--  Dikim ke Section -->
                <div class="w-1/2 pt-2 pl-8 mt-2 mr-4">
                    <h3 class="text-lg font-bold">Lorem</h3>
                    <p class="mb-8 text-gray-600">Lorem ipsum dolor sit amet.</p>

                    <h3 class="text-lg font-bold">Lorem</h3>
                    <p class="mb-8 text-gray-600">Lorem ipsum dolor sit amet.</p>

                    <h3 class="text-lg font-bold">Lorem</h3>
                    <p class="mb-8 text-gray-600">Lorem ipsum dolor sit amet.</p>

                    <h3 class="mt-4 mb-2 text-lg font-bold">Dikirim ke</h3>
                    <p class="text-gray-600">DROPBOX CIDADAP, Jalan Kapten Abdul Hamid No.86, RT.3/RW.1, Kelurahan Ledeng, Cidadap KOTA BANDUNG, CIDADAP, JAWA BARAT, ID, 40142.</p>

                    </div>
                </div>
            </div>
        </div>
        <p class="pt-2 mt-2 font-medium text-gray-600">Dibuat pada : 08.00, 27 Desember 2024</p>
    </div>
</div>
@endsection
