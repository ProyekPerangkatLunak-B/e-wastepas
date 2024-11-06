@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-bold leading-relaxed ml-14">Sampah Elektronik {{ $namaKategori }}</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14 w-1/2">Daftar jenis sampah elektronik dari kategori {{ $namaKategori }} yang dapat dijemput</h4>

                {{-- Search and Filter options --}}
                <div class="flex items-center space-x-4 mr-14">
                    {{-- Search Box --}}
                    <div class="relative">
                        <input type="text" class="w-64 py-2 pl-10 pr-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-2xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 placeholder:text-gray-900" placeholder="Cari....">
                        <!-- SVG Icon Search -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="absolute text-gray-500 transform -translate-y-1/2 bi bi-search left-3 top-1/2" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </div>

                    {{-- Filter Dropdown --}}
                    <div class="relative">
                        <select class="w-full py-2 pl-10 pr-4 text-sm text-gray-700 bg-white border border-gray-300 rounded-2xl appearance-none focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                            <option value="all">Filter</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                        <!-- SVG Icon Filter -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="absolute text-gray-500 transform -translate-y-1/2 bi bi-filter left-3 top-1/2" viewBox="0 0 16 16">
                            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Card Section --}}
            @if (count($jenis == 0))
                <div>
                    Jenis {{ $search ?? 'Sampah Elektronik' }} tidak ditemukan.
                </div>
            @else
                @foreach ($jenis as $jenisSampah)    
                    <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                        <x-card-detail
                            title="{{ $jenisSampah->nama_jenis_sampah }}"
                            description="{{ $jenisSampah->deskripsi_jenis_sampah }}"
                            image="https://picsum.photos/700/700" />
                    </div>
                @endforeach
            @endif
            
            {{-- Pagination --}}
            <div class="flex items-center justify-end mt-4 mr-20 space-x-2">
                {{-- Button < & << --}}
                @if ($jenis->currentPage() > 1)
                    <button onclick="window.location.href='{{ $jenis->url(1) }}'" class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&lt;&lt;</button>
                    <button onclick="window.location.href='{{ $jenis->previousPageUrl() }}'" class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&lt;</button>
                @endif

                {{-- Nomor halaman  --}}
                <button class="px-3 py-1 font-bold text-green-700 bg-green-200 w-[50px] h-[50px] rounded">{{ $jenis->currentPage() }}</button>

                {{-- Button > & >>--}}
                @if ($jenis->hasMorePages())
                    <button onclick="window.location.href='{{ $jenis->nextPageUrl() }}'" class="px-2 py-1 w-[50px] h-[50px] text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&gt;</button>
                    <button onclick="window.location.href='{{ $jenis->url($jenis->lastPage()) }}'" class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&gt;&gt;</button>
                @endif
            </div>
        </div>
    </div>
@endsection
