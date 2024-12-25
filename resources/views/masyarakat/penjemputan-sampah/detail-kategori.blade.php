@extends('layouts.main')

@section('content')
    <div class="min-h-screen mx-[22rem] pt-8 mt-2 bg-gray-100 w-[82%]">
        {{-- Breadcrumbs section --}}
        <div class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center mx-20 mb-2 space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('masyarakat.penjemputan.kategori') }}"
                        class="inline-flex text-sm font-medium text-gray-800 hover:underline md:ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-4 h-4 mr-2">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Kategori Sampah Elektronik
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <span class="mx-auto text-gray-800 ">/</span>
                        <span class="text-sm font-medium text-gray-800 hover:underline md:ml-2">
                            Jenis Sampah Elektronik
                        </span>
                    </div>
                </li>
            </ol>
        </div>

        <div class="py-8 mx-2 mb-4">
            <h2 class="pl-20 text-xl font-semibold">Jenis Sampah Elektronik {{ $kategori->nama_kategori }}</h2>
            <div class="flex items-center justify-between">
                <h4 class="pl-20 mb-4 text-base font-normal">Daftar semua Jenis sampah elektronik di akun anda.</h4>
                {{-- Search and Filter options --}}
                <div class="flex items-center mx-20 mb-6 space-x-4">
                    {{-- Search Box --}}
                    <div class="relative">
                        <input type="text"
                            class="w-[334px] h-[50px] py-3 pl-12 pr-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 placeholder:text-gray-900"
                            placeholder="Cari....">
                        <!-- SVG Icon Search -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="absolute text-gray-500 transform -translate-y-1/2 bi bi-search left-3 top-1/2"
                            viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Kondisi ketika jenis tidak ada --}}
            @if ($jenis->isEmpty())
                <div
                    class="flex justify-center ml-[500px] mt-40 items-center col-span-full bg-white-normal w-[400px] h-[300px] rounded-xl shadow-lg">
                    <div class="text-center">
                        <img src="{{ asset('img/masyarakat/penjemputan-sampah/batal.png') }}" alt="Tidak Ditemukan"
                            class="w-[100px] h-[100px] mx-auto mb-4">
                        <p class="text-lg font-semibold text-gray-500">Jenis {{ $search ?? 'Sampah Elektronik' }} tidak
                            ditemukan.</p>
                    </div>
                </div>
            @else
                {{-- Card Section --}}
                <div class="flex items-center justify-center">
                    <div class="grid grid-cols-3 gap-4 mx-auto">
                        @foreach ($jenis as $j)
                            @php
                                $imagePath = 'img/masyarakat/gambarjenisSampah/' . ($j->gambar ?? $j->nama_jenis . '.png');
                                $image = file_exists(public_path($imagePath)) ? $imagePath : 'img/masyarakat/gambarjenisSampah/no-image.png';
                            @endphp
                            <x-detail-card title="{{ $j->nama_jenis }}" poin="{{ $j->poin }}"
                            image="{{ asset($image) }}" />
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Pagination --}}
            @if ($jenis->lastPage() > 1)
            <div class="flex items-center justify-end mt-4 mr-20 space-x-2">
                {{-- Button < & << --}}
                @if ($jenis->currentPage() > 1)
                    <button onclick="window.location.href='{{ $jenis->url(1) }}'"
                        class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded-xl hover:bg-gray-300">&lt;&lt;</button>
                    <button onclick="window.location.href='{{ $jenis->previousPageUrl() }}'"
                        class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded-xl hover:bg-gray-300">&lt;</button>
                @endif

                {{-- Nomor halaman --}}
                <button
                    class="px-3 py-1 font-bold text-green-700 bg-green-200 w-[50px] h-[50px] rounded-xl">{{ $jenis->currentPage() }}</button>

                {{-- Button > & >> --}}
                @if ($jenis->hasMorePages())
                    <button onclick="window.location.href='{{ $jenis->nextPageUrl() }}'"
                        class="px-2 py-1 w-[50px] h-[50px] text-gray-600 bg-gray-200 rounded-xl hover:bg-gray-300">&gt;</button>
                    <button onclick="window.location.href='{{ $jenis->url($jenis->lastPage()) }}'"
                        class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded-xl hover:bg-gray-300">&gt;&gt;</button>
                @endif
            </div>
            @endif
        </div>
    </div>
@endsection
