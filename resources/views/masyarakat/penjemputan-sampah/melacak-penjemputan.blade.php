@extends('layouts.main')

@section('content')
    <div class="w-[83%] min-h-screen px-[5rem] py-12 mx-[22rem] bg-gray-100">
        <h2 class="text-xl font-semibold leading-relaxed">Melacak Penjemputan</h2>
        <div class="flex items-center justify-between">
            <h4 class="text-base font-normal">Daftar semua penjemputan sampah elektronik di akun anda.</h4>

            {{-- Search and Filter options --}}
            <div class="flex items-center mr-4 space-x-4">
                {{-- Search Box --}}
                <form method="GET" action="{{ route('masyarakat.penjemputan.melacak') }}">
                    <div class="relative">
                        <input type="text"
                            class="w-[334px] h-[50px] py-3 pl-12 pr-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 placeholder:text-gray-900"
                            placeholder="Cari di jenis sampah..." name="search" type="text"
                            value="{{ request('search') }}">
                        <!-- SVG Icon Search -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="absolute text-gray-500 transform -translate-y-1/2 bi bi-search left-3 top-1/2"
                            viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                        @if (request('kategori'))
                            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                        @endif
                    </div>
                </form>

                {{-- Filter Dropdown --}}
                <form class="relative" method="GET" action="{{ route('masyarakat.penjemputan.melacak') }}">
                    <select name="kategori" onchange="this.form.submit()"
                        class="w-[222px] h-[50px] py-3 pl-4 text-sm text-gray-700 bg-white border border-gray-300 appearance-none pr-14 rounded-xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                        <option value="all">Filter</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->nama_kategori }}"
                                {{ request('kategori') == $k->nama_kategori ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                        @endforeach
                        {{-- <option value="inactive">Tidak Aktif</option> --}}
                    </select>
                    <!-- SVG Icon Filter -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="absolute text-gray-500 transform -translate-y-1/2 right-3 top-1/2 bi bi-filter"
                        viewBox="0 0 16 16">
                        <path
                            d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                    </svg>
                    <button type="submit" class="hidden">Submit</button>
                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                </form>
            </div>
        </div>

        <!-- Container Grid Card -->
        <div class="grid grid-cols-3 gap-8 mt-6">
            @if ($penjemputan->isEmpty())
                <!-- Tampilkan pesan jika tidak ada data -->
                <div class="w-1/2 p-6 mx-auto mt-64 text-center shadow-lg col-span-full bg-white-normal rounded-2xl">
                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/x-circle 3.png') }}" alt="Tidak Ditemukan"
                        class="w-[100px] h-[100px] mx-auto mb-4">
                    <p class="text-lg font-semibold text-gray-500">Tidak ada data penjemputan tersedia.</p>
                </div>
            @else
                @foreach ($penjemputan as $p)
                    <a href="{{ route('masyarakat.penjemputan.detail-melacak', $p->id_penjemputan) }}" class="block">
                        <div class="relative w-[450px] h-[230px] bg-white-normal shadow-sm rounded-xl hover:shadow-lg">
                            <div class="flex justify-between">
                                <span class="mx-6 my-2 text-lg font-bold text-gray-800">
                                    {{ $p->kode_penjemputan }}
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
                                    <p class="mb-1 text-2xl font-semibold">{{ $s->jenis->nama_jenis }}</p>
                                @endforeach
                                <!-- Waktu Penjemputan -->
                                <div class="absolute left-6 bottom-4 w-[calc(100%-1.5rem)]">
                                    <p class="text-md text-black-normal">
                                        {{ Carbon\Carbon::parse($p->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-between">
                                <img src="
                                @if ($p->status === 'Diterima' && $p->getLatestPelacakan->status === 'Dijemput Driver') {{ asset('img/masyarakat/penjemputan-sampah/box-seam-abu.png') }}
                                 @elseif($p->status === 'Diterima' && $p->getLatestPelacakan->status === 'Menuju Dropbox')
                                    {{ asset('img/masyarakat/penjemputan-sampah/truck-abu.png') }}
                                    @else
                                    {{ asset('img/masyarakat/penjemputan-sampah/journal-check-abu.png') }} @endif
                                 "
                                    alt="Icon" class="mt-4 w-[100px] h-[100px]">
                                <!-- Status -->
                                <div class="absolute right-0 bottom-1">
                                    <span
                                        class="px-10 py-2 font-semibold text-white-normal rounded-tl-3xl rounded-br-xl
                                            @if ($p->getLatestPelacakan->status === 'Dijemput Driver') bg-white-dark
                                            @elseif ($p->getLatestPelacakan->status === 'Menuju Dropbox') bg-primary-normal
                                            @elseif ($p->getLatestPelacakan->status === 'Sudah Sampai') bg-secondary-normal
                                            @elseif ($p->status === 'Ditolak') bg-red-500
                                            @elseif ($p->status === 'Dibatalkan') bg-red-normal
                                            @else bg-primary-normal @endif;">
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
            {{-- Button < & << --}} @if ($penjemputan->currentPage() > 1)
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
