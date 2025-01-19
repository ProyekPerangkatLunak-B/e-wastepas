@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Permintaan Penjemputan</h2>

            <div class="flex flex-row items-start justify-between space-y-4 lg:flex-col md:space-y-0">

                <div class="flex flex-row items-center justify-between w-full my-5 lg:flex-row">

                    <h4 class="text-base font-normal ml-14">Daftar permintaan penjemputan sampah.</h4>

                    {{-- Search and Filter options --}}
                    <div
                        class="flex flex-col items-center w-full space-y-4 lg:flex-row md:mr-14 md:space-y-0 md:space-x-4 md:w-auto">
                        {{-- Search Box --}}
                        <form method="get" action="{{ route('mitra-kurir.penjemputan.permintaan') }}"
                            class="relative w-full md:w-[334px]">
                            @if (request('kategori'))
                                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                            @endif

                            <input type="text" name="search"
                                class="w-full h-[50px] py-3 pl-12 pr-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-2xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 placeholder:text-gray-900"
                                placeholder="Cari nama pengguna masyarakat..." value="{{ request('search') }}">
                            <!-- SVG Icon Search -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="absolute text-gray-500 transform -translate-y-1/2 bi bi-search left-3 top-1/2"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </form>

                        {{-- Filter Dropdown --}}
                        <form method="get" action="{{ route('mitra-kurir.penjemputan.permintaan') }}"
                            class="relative w-full md:w-[222px]">
                            @if (request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif

                            <select
                                class="w-full h-[50px] py-3 pl-4 text-sm text-gray-700 bg-white border border-gray-300 appearance-none pr-14 rounded-2xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200"
                                name="total-berat" onchange="this.form.submit()">
                                <option value="all">Filter</option>
                                <option value="berat-ringan"
                                    {{ request('total-berat') == 'berat-ringan' ? 'selected' : '' }}>
                                    Berat ke Ringan</option>
                                <option value="ringan-berat"
                                    {{ request('total-berat') == 'ringan-berat' ? 'selected' : '' }}>
                                    Ringan ke Berat</option>
                            </select>
                            <!-- SVG Icon Filter -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="absolute text-gray-500 transform -translate-y-1/2 right-3 top-1/2 bi bi-filter"
                                viewBox="0 0 16 16">
                                <path
                                    d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                            </svg>
                        </form>
                    </div>
                </div>

                <div class="flex flex-row items-center justify-center w-full mt-4 lg:flex-col lg:py-10">
                    <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                        @if ($penjemputan === null)
                            <div
                                class="flex justify-center mt-56 items-center col-span-full bg-white-normal w-[400px] h-[300px] rounded-xl shadow-lg">
                                <div class="text-center">
                                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/batal.png') }}"
                                        alt="Tidak Ditemukan" class="w-[100px] h-[100px] mx-auto mb-4">
                                    <p class="text-lg font-semibold text-gray-500">Pengguna
                                        {{ request('search') ?? 'pengguna' }}
                                        tidak ditemukan.</p>
                                </div>
                            </div>
                        @else
                            {{--
                            Debugging
                            @foreach ($penjemputan as $pjm)
                                <div class="flex flex-col">
                                    <h3>Kode Penjemputan: {{ $pjm->id_penjemputan }}</h3>
                                    <p>pelacakan: {{ $pjm->pelacakan->first()->status }}</p>
                                    <p><b>nama mys: </b>{{ $pjm->penggunaMasyarakat->nama }}</p>
                                    <ul>
                                        @foreach ($pjm->kategoriData as $kategori)
                                            <li>
                                                Kategori: {{ $kategori['nama_kategori'] }},
                                                Jumlah Jenis: {{ $kategori['jumlah_jenis'] }}
                                            </li>
                                        @endforeach
                                        <li>-------------------------------</li>
                                    </ul>
                                    <a href="{{ route('mitra-kurir.penjemputan.detail-permintaan', $pjm->id_penjemputan) }}"
                                        target="_blank" rel="noopener noreferrer text-red-500 font-bold">Detail</a>
                                </div>
                            @endforeach --}}

                            {{-- asdasdasdasd --}}
                            @foreach ($penjemputan as $pjm)
                                <div
                                    class="relative flex flex-col justify-between w-full h-auto max-w-md border border-gray-200 shadow-md bg-neutral-50 rounded-2xl hover:shadow-lg">
                                    {{-- @foreach ($pjm as $item) --}}
                                    <div
                                        class="absolute top-0 left-0 px-4 py-1 font-semibold bg-secondary-normal text-white-100 rounded-tl-2xl rounded-br-2xl">
                                        {{ $pjm->total_berat }} Kg
                                    </div>
                                    {{-- @endforeach --}}

                                    <!-- Bagian Konten Utama -->
                                    <div class="flex flex-col items-center flex-grow pb-5">
                                        <!-- Gambar -->
                                        <div
                                            class="w-20 h-20 mt-5 overflow-hidden bg-white rounded-full sm:w-24 sm:h-24 md:w-32 md:h-32 lg:w-20 lg:h-20">
                                            <img class="object-cover w-full h-full"
                                                src="{{ $pjm->penggunaMasyarakat->foto_profil }}"
                                                alt="{{ $pjm->penggunaMasyarakat->nama }}" />
                                        </div>

                                        <!-- Nama dan Status -->
                                        <div class="flex flex-col items-center p-4 text-center">
                                            <h3 class="text-base font-semibold text-gray-900">
                                                {{ $pjm->penggunaMasyarakat->nama }}
                                                <p class="mt-1 text-sm text-gray-500">
                                                    {{ $pjm->pelacakan->first()->status }}</p>
                                        </div>

                                        <!-- Daftar Kategori -->
                                        <div class="flex-grow mx-8 overflow-y-auto max-h-46">
                                            @foreach ($pjm->kategoriData as $kategori)
                                                <ul class="my-4 space-y-3">
                                                    <li class="mx-5">
                                                        <a href="{{ route('mitra-kurir.penjemputan.detail-kategori', $kategori['id_kategori']) }}"
                                                            class="flex items-center w-auto p-3 text-base font-bold text-gray-900 rounded-2xl bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-slate-200 dark:hover:bg-gray-500 dark:text-white">
                                                            <div class="flex-shrink-0">
                                                                <img class="w-8 h-8 rounded-full"
                                                                    src="https://picsum.photos/700/700" alt="">
                                                            </div>
                                                            <span
                                                                class="flex-1 text-sm font-normal break-words whitespace-normal ms-3">{{ Str::limit(strip_tags($kategori['nama_kategori']), 50) }}</span>
                                                            <span
                                                                class="inline-flex items-center justify-center px-2 py-0.5 ms-3 text-base font-medium text-lime-900">{{ $kategori['jumlah_jenis'] }}
                                                                Pcs</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </div>

                                        <!-- Tombol Detail -->
                                        <div class="mt-5">
                                            <a href="{{ route('mitra-kurir.penjemputan.detail-permintaan', $pjm->id_penjemputan) }}"
                                                type="button"
                                                class="focus:outline-none text-white-100 bg-gradient-to-b from-secondary-normal to-primary-normal hover:bg-gradient-to-t focus:ring-4 focus:ring-green-300 font-semibold w-40 rounded-2xl text-base px-8 py-2.5 me-2 mb-2">Detail</a>
                                        </div>
                                    </div>
                                </div>


                                {{-- asdadasdasda --}}
                            @endforeach
                        @endif


                        {{--  --}}
                        {{-- Card Section --}}
                        {{-- <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                        @forelse ($penjemputan as $item)

                            <x-card-permintaan name="{{ $item->penggunaMasyarakat->nama }}"
                                status="{{ $item->pelacakan->status }}" image="https://picsum.photos/700/700"
                                :items="$item->detailPenjemputan"
                                link="{{ route('mitra-kurir.penjemputan.detail-permintaan', $item->id_penjemputan) }}" />
                        @empty

                            <div
                                class="flex justify-center mt-56 items-center col-span-full bg-white-normal w-[400px] h-[300px] rounded-xl shadow-lg">
                                <div class="text-center">
                                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/batal.png') }}"
                                        alt="Tidak Ditemukan" class="w-[100px] h-[100px] mx-auto mb-4">
                                    <p class="text-lg font-semibold text-gray-500">Tidak ada permintaan penjemputan yang
                                        ditemukan.</p>
                                </div>
                            </div>
                        @endforelse --}}
                    </div>

                    {{-- Pagination --}}

                    {{-- Pagination --}}
                    @if ($penjemputan->total() > 6)
                        {{-- Pagination --}}
                        <div class="flex items-center justify-end mt-4 mr-20 space-x-2">
                            {{-- Button << & < --}}
                            @if ($penjemputan->currentPage() > 1)
                                <button onclick="window.location.href='{{ $penjemputan->url(1) }}'"
                                    class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&lt;&lt;</button>
                                <button onclick="window.location.href='{{ $penjemputan->previousPageUrl() }}'"
                                    class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&lt;</button>
                            @endif


                            {{-- Nomor halaman  --}}
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
            </div>
        </div>
    @endsection
