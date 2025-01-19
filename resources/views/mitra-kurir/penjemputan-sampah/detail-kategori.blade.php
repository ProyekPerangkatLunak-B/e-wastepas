@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14  ">Jenis Sampah Elektronik {{ htmlspecialchars($kategori->nama_kategori_sampah) }}  </h2>
            <div class="flex flex-col lg:flex-row items-center justify-between mt-4 space-y-4 md:space-y-0">
                <!-- Title -->
                <h4 class="text-base font-normal ml-4 lg:ml-14 w-full lg:w-1/2 text-center lg:text-left">
                    Daftar jenis sampah elektronik dari kategori {{ htmlspecialchars($kategori->nama_kategori_sampah) }} yang dapat dijemput
                </h4>
            
                <!-- Search and Filter Options -->
                <div class="flex flex-col lg:flex-row items-center md:mr-14 space-y-4 md:space-y-0 md:space-x-4 w-full md:w-auto">
                    <!-- Search Box -->
                    <div class="relative w-full md:w-[334px]">
                        <input type="text"
                            class="w-full h-[50px] py-3 pl-12 pr-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-2xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 placeholder:text-gray-900"
                            placeholder="Cari...."
                            value="{{ $search ?? '' }}"
                            onkeydown="if(event.key === 'Enter') window.location.href='{{ url()->current() }}?search=' + this.value">
                        <!-- SVG Icon Search -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="absolute text-gray-500 transform -translate-y-1/2 left-3 top-1/2"
                            viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </div>
            
                    <!-- Filter Dropdown -->
                    <div class="relative w-full md:w-[222px]">
                        <select
                            class="w-full h-[50px] py-3 pl-4 text-sm text-gray-700 bg-white border border-gray-300 appearance-none pr-14 rounded-2xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200"
                            onchange="window.location.href='{{ url()->current() }}?sort=' + this.value + '&search={{ $search }}'">
                            <option value="all">Filter</option>
                            <option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>A-Z</option>
                            <option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}>Z-A</option>
                        </select>
                        <!-- SVG Icon Filter -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="absolute text-gray-500 transform -translate-y-1/2 right-3 top-1/2"
                            viewBox="0 0 16 16">
                            <path
                                d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                        </svg>
                    </div>
                </div>
            </div>
            


            {{-- Card Section --}}
            <div class="flex justify-center mt-4">
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mx-auto w-full px-4 sm:px-6 md:px-0">
                    @if (count($jenis) == 0)
                        <div
                            class="flex justify-center mt-56 items-center col-span-full bg-white-normal w-full max-w-sm h-[300px] rounded-xl shadow-lg mx-auto">
                            <div class="text-center">
                                <img src="{{ asset('img/masyarakat/penjemputan-sampah/batal.png') }}"
                                    alt="Tidak Ditemukan" class="w-[100px] h-[100px] mx-auto mb-4">
                                <p class="text-lg font-semibold text-gray-500">Jenis {{ $search ?? 'Sampah Elektronik' }}
                                    tidak ditemukan.</p>
                            </div>
                        </div>
                    @else
                        @foreach ($jenis as $jenisSampah)
                            @php
                                $imagePath = 'img/masyarakat/gambarjenisSampah/' . ($jenisSampah->gambar ?? $jenisSampah->nama_jenis . '.png');
                                $image = file_exists(public_path($imagePath)) ? $imagePath : 'img/masyarakat/gambarjenisSampah/no-image.png';
                            @endphp
                            <x-card-detail
                                title="{{ $jenisSampah->nama_jenis }}"
                                image="{{ asset($image) }}" />
                        @endforeach
                    @endif
                </div>
            </div>
            

            {{-- Pagination --}}
            @if ($jenis->lastPage() > 1)
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
            @endif

        </div>
    </div>
@endsection
