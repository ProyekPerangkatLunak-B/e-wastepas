@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto  bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Permintaan Penjemputan</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Daftar permintaan penjemputan sampah.</h4>

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

{{--            @if (count($pengguna) == 0)--}}
{{--                <div--}}
{{--                    class="flex justify-center mt-56 items-center col-span-full bg-white-normal w-[400px] h-[300px] rounded-xl shadow-lg">--}}
{{--                    <div class="text-center">--}}
{{--                        <p class="text-lg font-semibold text-gray-500">Pengguna {{ $search ?? 'pengguna' }} tidak ditemukan.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @else--}}
            {{-- Card Section --}}
            <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                @foreach ($data as $item)
                            <x-card-permintaan
                                name="{{ $item->nama }}"
                                status="{{ $item->status }}"
                                image="https://picsum.photos/700/700"
                                imageItem="https://picsum.photos/700/700"
                                item="{{ $item->nama_jenis }}"
                                pcs="{{ $item->berat }}"
                                link="{{ route('mitra-kurir.penjemputan.detail-permintaan', $item->id_penjemputan) }}"
                                />
                @endforeach
            </div>
{{--            @endif--}}
            {{-- Pagination --}}
        </div>
    </div>
@endsection
