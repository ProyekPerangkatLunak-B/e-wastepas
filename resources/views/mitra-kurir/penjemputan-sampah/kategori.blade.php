@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto  bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Kategori Sampah Elektronik</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Kategori dan jenis sampah elektronik yang dapat dijemput.</h4>

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
            <div class="flex justify-center mt-4">
                <div class="grid grid-cols-3 gap-6 mx-auto">
                @if (count($kategori) == 0)
                        <div
                            class="flex justify-center mt-56 items-center col-span-full bg-white-normal w-[400px] h-[300px] rounded-xl shadow-lg">
                            <div class="text-center">
                                <p class="text-lg font-semibold text-gray-500">Kategori {{ $search ?? 'Sampah Elektronik' }} tidak ditemukan.</p>
                            </div>
                        </div>
                @else
                    @foreach ($kategori as $kategoriSampah)
                            <x-card
                                title="{{ $kategoriSampah->nama_kategori }}"
                                description="{{ $kategoriSampah->deskripsi_kategori }}"
                                image="https://picsum.photos/1280/720"
                                link="{{ route('mitra-kurir.penjemputan.detail-kategori', $kategoriSampah->id_kategori) }}"
                            />
                    @endforeach
                @endif
        </div>
    </div>
@endsection
