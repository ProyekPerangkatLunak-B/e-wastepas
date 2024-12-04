@extends('layouts.main')

@section('content')
    <div class="w-[81%] min-h-screen px-[5rem] py-12 mx-[22rem] bg-gray-100">
        {{-- Breadcrumbs section --}}
        <div class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center -ml-3">
                    <a href="{{ route('masyarakat.penjemputan.total-riwayat') }}"
                        class="inline-flex ml-1 text-sm font-medium text-gray-800 hover:underline md:ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-4 h-4 mr-4">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Total Sampah & Riwayat Penjemputan
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <span class="mx-2.5 text-gray-800 ">/</span>
                        <span class="ml-1 text-sm font-medium text-gray-800 hover:underline md:ml-2">
                            Riwayat Penjemputan
                        </span>
                    </div>
                </li>
            </ol>
        </div>

        <div class="flex items-center justify-between mx-auto mt-6">
            <div>
                <h2 class="text-xl font-semibold leading-relaxed">Riwayat Penjemputan</h2>
                <p class="text-base font-normal text-gray-600">Daftar penjemputan sampah terbaru di akun anda.</p>
            </div>

            {{-- Search and Filter options --}}
            <div class="flex items-center pt-4 pl-20 mx-auto space-x-5">
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

                {{-- Filter Dropdown --}}
                <div class="relative">
                    <select
                        class="w-[222px] h-[50px] py-3 pl-4 text-sm text-gray-700 bg-white border border-gray-300 appearance-none pr-14 rounded-xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                        <option value="all">Filter</option>
                        <option value="active">Aktif</option>
                        <option value="inactive">Tidak Aktif</option>
                    </select>
                    <!-- SVG Icon Filter -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="absolute text-gray-500 transform -translate-y-1/2 right-3 top-1/2 bi bi-filter"
                        viewBox="0 0 16 16">
                        <path
                            d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                    </svg>
                </div>
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

        <!-- Container Grid Card -->
        <div class="grid grid-cols-3 gap-4 mt-6">
            @if ($penjemputan->isEmpty())
                <!-- Tampilkan pesan jika tidak ada riwayat -->
                <div class="w-1/2 p-6 mx-auto mt-64 text-center shadow-lg col-span-full bg-white-normal rounded-2xl">
                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/x-circle 3.png') }}" alt="Tidak Ditemukan"
                        class="w-[100px] h-[100px] mx-auto mb-4">
                    <p class="text-lg font-semibold text-gray-500">Tidak ada riwayat penjemputan tersedia.</p>
                </div>
            @else
                @foreach ($penjemputan as $p)
                    <a href="{{ route('masyarakat.penjemputan.detail-riwayat') }}" class="block">
                        <div class="relative w-[450px] h-[230px] bg-white-normal shadow-md rounded-xl hover:shadow-lg">
                            <div class="flex justify-between">
                                <span class="mx-6 my-2 text-lg font-bold text-gray-800">
                                    {{ Carbon\Carbon::parse($p->created_at)->diffForHumans() }}
                                </span>
                            </div>

                            <!-- Isi Konten -->
                            <div class="flex px-6 space-x-6">
                                <!-- Bagian Jenis dan Deskripsi Sampah -->
                                <div class="flex-grow my-4">
                                    @foreach ($p->detailPenjemputan as $s)
                                        @if ($loop->index == 2 && count($p->detailPenjemputan) > 3)
                                            <p class="text-lg font-semibold">...</p>
                                        @break
                                    @endif
                                    <p class="text-2xl font-semibold">{{ $s->jenis->nama_jenis }}</p>
                                @endforeach
                                {{-- Catatan --}}
                                <div class="absolute left-6 bottom-4 w-[calc(100%-1.5rem)]">
                                    <p class="text-sm text-black-normal">
                                        @if (strlen($p->catatan) > 25)
                                            {{ substr($p->catatan, 0, 25) }}...
                                        @else
                                            {{ $p->catatan }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            {{-- Poin Sampah --}}
                            <div class="flex flex-col items-center justify-between">
                                <div class="flex items-baseline mx-auto mt-8">
                                    <p
                                        class="text-6xl font-bold
                                    @if ($p->status === 'Diterima' && $p->getLatestPelacakan->status === 'Sudah Sampai') text-secondary-normal
                                            @else text-tertiary-600 @endif
                                            ">
                                        +{{ $p->total_poin }}
                                    </p>
                                    <span class="ml-2 text-2xl font-bold text-gray-700">Poin</span>
                                </div>
                                <!-- Status -->
                                <div class="absolute right-0 bottom-1">
                                    <span
                                        class="px-4 py-2 font-semibold text-white-normal rounded-tl-3xl rounded-br-xl
                                    @if ($p->getLatestPelacakan->status === 'Dijemput Driver') bg-white-dark
                                    @elseif ($p->getLatestPelacakan->status === 'Menuju Dropbox') bg-primary-normal
                                    @elseif ($p->getLatestPelacakan->status === 'Sudah Sampai') bg-secondary-normal
                                    @elseif ($p->status === 'Ditolak') bg-red-500
                                    @elseif ($p->status === 'Dibatalkan') bg-red-normal
                                    @else bg-tertiary-600 @endif;">
                                        {{ $p->status === 'Diterima' ? $p->getLatestPelacakan->status : $p->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
    {{-- Pagination --}}
    @if ($penjemputan->total() > 6)
        <div class="flex items-center justify-end mt-4 ml-24 space-x-2">
            {{-- Button < & << --}}
            @if ($penjemputan->currentPage() > 1)
                <button onclick="window.location.href='{{ $penjemputan->url(1) }}'"
                    class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&lt;&lt;</button>
                <button onclick="window.location.href='{{ $penjemputan->previousPageUrl() }}'"
                    class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&lt;</button>
            @endif

            {{-- Nomor halaman --}}
            <button
                class="px-3 py-1 font-bold text-green-700 bg-green-200 w-[50px] h-[50px] rounded">{{ $penjemputan->currentPage() }}</button>

            {{-- Button > & >> --}}
            @if ($penjemputan->hasMorePages())
                <button onclick="window.location.href='{{ $penjemputan->nextPageUrl() }}'"
                    class="px-2 py-1 w-[50px] h-[50px] text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&gt;</button>
                <button onclick="window.location.href='{{ $penjemputan->url($penjemputan->lastPage()) }}'"
                    class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&gt;&gt;</button>
            @endif
        </div>
    @endif
</div>
@endsection
