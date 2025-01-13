@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto  bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Total Sampah</h2>
            <h4 class="text-base font-normal ml-14 mb-8">Semua total sampah yang telah anda jemput</h4>
            <div class="flex flex-wrap space-x-8 px-12 mb-8">
{{--                @php--}}
{{--                    $totalSampah = 0;--}}
{{--                    $totalBeratSampah = 0;--}}
{{--                @endphp--}}
                <!-- Total Sampah -->
                <div class="bg-white-200 rounded-2xl shadow-md p-6 flex items-center space-x-4 w-full md:w-1/3 mb-4 md:mb-0">
                    <div class="text-5xl font-bold text-green-600">{{ $totalSampah }}<span class="text-lg text-gray-900">pcs</span></div>
                    <div class="flex flex-col items-center justify-center space-x-4">
                        <h3 class="text-lg font-semibold text-center">Total Sampah</h3>
                        <p class="text-sm text-gray-500 text-center">Total sampah yang sudah dijemput</p>
                    </div>
                </div>

                <!-- Total Berat Sampah -->
                <div class="bg-white-200 rounded-2xl shadow-md p-6 flex items-center space-x-4 w-full md:w-1/3">
                    <div class="text-5xl font-bold text-green-600">{{ $totalBeratSampah }}<span class="text-lg text-gray-900">Kg</span></div>
                    <div class="flex flex-col">
                        <h3 class="text-lg font-semibold text-center">Total Berat Sampah</h3>
                        <p class="text-sm text-gray-500 text-center">Total berat sampah yang sudah dijemput</p>
                    </div>
                </div>
            </div>


            <h2 class="text-xl font-semibold leading-relaxed ml-14">Riwayat Penjemputan</h2>
            <div class="flex flex-col lg:flex-row items-center justify-between mt-4 space-y-4 md:space-y-0">
                <h4 class="text-base font-normal ml-4 lg:ml-14 w-full lg:w-1/2 text-center lg:text-left">
                    Daftar riwayat penjemputan sampah
                </h4>

                {{-- Search and Filter options --}}
                <div
                    class="flex flex-col items-center w-full space-y-4 lg:flex-row md:mr-14 md:space-y-0 md:space-x-4 md:w-auto">
                    {{-- Search Box --}}
                    <form method="get" action="{{ route('mitra-kurir.penjemputan.riwayat-penjemputan') }}"
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
                    <form method="get" action="{{ route('mitra-kurir.penjemputan.riwayat-penjemputan') }}"
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
{{--                --}}{{-- Search and Filter options --}}
{{--                <div--}}
{{--                    class="flex flex-col lg:flex-row items-center md:mr-14 space-y-4 md:space-y-0 md:space-x-4 w-full md:w-auto">--}}
{{--                    --}}{{-- Search Box --}}
{{--                    <form method="get" action="{{ route('mitra-kurir.penjemputan.permintaan') }}"--}}
{{--                          class="relative w-full md:w-[334px]">--}}
{{--                        @if (request('kategori'))--}}
{{--                            <input type="hidden" name="kategori" value="{{ request('kategori') }}">--}}
{{--                        @endif--}}

{{--                        <input type="text" name="search"--}}
{{--                               class="w-full h-[50px] py-3 pl-12 pr-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-2xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 placeholder:text-gray-900"--}}
{{--                               placeholder="Cari nama pengguna masyarakat..." value="{{ request('search') }}">--}}
{{--                        <!-- SVG Icon Search -->--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"--}}
{{--                             class="absolute text-gray-500 transform -translate-y-1/2 bi bi-search left-3 top-1/2"--}}
{{--                             viewBox="0 0 16 16">--}}
{{--                            <path--}}
{{--                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />--}}
{{--                        </svg>--}}
{{--                    </form>--}}

{{--                    --}}{{-- Filter Dropdown --}}
{{--                    <form method="get" action="{{ route('mitra-kurir.penjemputan.permintaan') }}"--}}
{{--                          class="relative w-full md:w-[222px]">--}}
{{--                        @if (request('search'))--}}
{{--                            <input type="hidden" name="search" value="{{ request('search') }}">--}}
{{--                        @endif--}}

{{--                        <select--}}
{{--                            class="w-full h-[50px] py-3 pl-4 text-sm text-gray-700 bg-white border border-gray-300 appearance-none pr-14 rounded-2xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200"--}}
{{--                            name="kategori" onchange="this.form.submit()">--}}
{{--                            <option value="all">Filter</option>--}}
{{--                            @foreach ($kategori as $k)--}}
{{--                                <option value="{{ $k }}" {{ request('kategori') == $k ? 'selected' : '' }}>--}}
{{--                                    {{ $k->nama_kategori }}--}}
{{--                                </option>--}}
{{--                            @endforeach--}}
{{--                            --}}{{-- <option value="diproses" {{ $sort == 'diproses' ? 'selected' : '' }}>Diproses</option>--}}
{{--                        <option value="diterima" {{ $sort == 'diterima' ? 'selected' : '' }}>Diterima</option> --}}
{{--                        </select>--}}
{{--                        <!-- SVG Icon Filter -->--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"--}}
{{--                             class="absolute text-gray-500 transform -translate-y-1/2 right-3 top-1/2 bi bi-filter"--}}
{{--                             viewBox="0 0 16 16">--}}
{{--                            <path--}}
{{--                                d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />--}}
{{--                        </svg>--}}
{{--                    </form>--}}
{{--                </div>--}}
            </div>



            <div class="flex flex-row lg:flex-col w-full items-center lg:py-10 justify-center mt-4">
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
                        @foreach ($penjemputan as $pjm)
                            <div
                                class="relative w-full h-auto max-w-md bg-neutral-50 border border-gray-200 rounded-2xl shadow-md hover:shadow-lg flex flex-col justify-between">
                                {{-- @foreach ($pjm as $item) --}}
                                <div
                                    class="absolute top-0 left-0 bg-secondary-normal text-white-100 font-semibold px-4 py-1 rounded-tl-2xl rounded-br-2xl">
                                    {{ $pjm->total_berat }} Kg
                                </div>
                                {{-- @endforeach --}}

                                <!-- Bagian Konten Utama -->
                                <div class="flex flex-col items-center pb-5 flex-grow">
                                    <!-- Gambar -->
                                    <div class="h-20 rounded-full overflow-hidden bg-white mt-5">
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
                                    <div class="flex-grow">
                                        @foreach ($pjm->kategoriData as $kategori)
                                            <ul class="my-4 space-y-3">
                                                <li class="mx-5">
                                                    <a href="{{ route('mitra-kurir.penjemputan.detail-kategori', $kategori['id_kategori']) }}"
                                                       class="w-auto flex items-center p-3 text-base font-bold text-gray-900 rounded-2xl bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-slate-200 dark:hover:bg-gray-500 dark:text-white">
                                                        <div class="flex-shrink-0">
                                                            <img class="w-8 h-8 rounded-full"
                                                                 src="https://picsum.photos/700/700" alt="">
                                                        </div>
                                                        <span
                                                            class="flex-1 ms-3 whitespace-normal break-words text-lg font-normal">{{ $kategori['nama_kategori'] }}</span>
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
                                        <a href="{{ route('mitra-kurir.penjemputan.detail-riwayat', $pjm->id_penjemputan) }}"
                                           type="button"
                                           class="focus:outline-none text-white-100 bg-gradient-to-b from-secondary-normal to-primary-normal hover:bg-gradient-to-t focus:ring-4 focus:ring-green-300 font-semibold w-40 rounded-2xl text-base px-8 py-2.5 me-2 mb-2">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>



{{--            <div class="flex justify-center mt-4">--}}
{{--                --}}{{-- Card Section --}}
{{--                @php--}}
{{--                    $groupData = $data->groupBy('nama');--}}
{{--                @endphp--}}
{{--                <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">--}}
{{--                    @if (count($data) == 0)--}}
{{--                        <div--}}
{{--                            class="flex justify-center mt-20 items-center col-span-full bg-white-normal w-[400px] h-[300px] rounded-xl shadow-lg">--}}
{{--                            <div class="text-center">--}}
{{--                                <img src="{{ asset('img/masyarakat/penjemputan-sampah/batal.png') }}"--}}
{{--                                     alt="Tidak Ditemukan" class="w-[100px] h-[100px] mx-auto mb-4">--}}
{{--                                <p class="text-lg font-semibold text-gray-500">Riwayat penjemputan {{ $search ?? 'pengguna' }}--}}
{{--                                    tidak ditemukan.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        @foreach ($groupData as $name => $items)--}}
{{--                            <x-card-riwayat--}}
{{--                                name="{{ $name }}"--}}
{{--                                status="{{ $items->first()->status }}"--}}
{{--                                image="https://picsum.photos/700/700"--}}
{{--                                imageItem="https://picsum.photos/700/700"--}}
{{--                                :items="$items"--}}
{{--                                link="{{ route('mitra-kurir.penjemputan.detail-riwayat', $items->first()->id_penjemputan) }}"--}}
{{--                            />--}}
{{--                        @endforeach--}}
{{--                </div>--}}
{{--                @endif--}}
{{--            </div>--}}

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
@endsection
