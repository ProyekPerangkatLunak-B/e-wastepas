@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto  bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Permintaan Penjemputan</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Daftar permintaan penjemputan sampah.</h4>

                {{-- Search and Filter options --}}
                <div class="flex items-center mr-20 space-x-4">
                    {{-- Search Box --}}
                    <div class="relative">
                        <input type="text"
                            class="w-[334px] h-[50px] py-3 pl-12 pr-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-2xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 placeholder:text-gray-900"
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
                            class="w-[222px] h-[50px] py-3 pl-4 text-sm text-gray-700 bg-white border border-gray-300 appearance-none pr-14 rounded-2xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                            <option value="all">Filter</option>
                            <option value="active">Berat-Ringan</option>
                            <option value="inactive">Ringan-Berat</option>
                            <option value="inactive">Diproses</option>
                            <option value="inactive">Selesai</option>
                        </select>
                        <!-- SVG Icon Filter -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="absolute text-gray-500 transform -translate-y-1/2 right-3 top-1/2 bi bi-filter"
                            viewBox="0 0 16 16">
                            <path
                                d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4">
                {{-- Card Section --}}
                @php
                $groupData = $data->groupBy('nama');
                @endphp
                    <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                        @if (count($data) == 0)
                            <div
                            class="flex justify-center mt-56 items-center col-span-full bg-white-normal w-[400px] h-[300px] rounded-xl shadow-lg">
                                <div class="text-center">
                                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/batal.png') }}"
                                        alt="Tidak Ditemukan" class="w-[100px] h-[100px] mx-auto mb-4">
                                    <p class="text-lg font-semibold text-gray-500">Pengguna {{ $search ?? 'pengguna' }}
                                        tidak ditemukan.</p>
                                </div>
                            </div>
                        @else
                        @foreach ($groupData as $name => $items)
                                    <x-card-permintaan
                                        name="{{ $name }}"
                                        status="{{ $items->first()->status }}"
                                        image="https://picsum.photos/700/700"
                                        imageItem="https://picsum.photos/700/700"
                                        :items="$items"
                                        link="{{ route('mitra-kurir.penjemputan.detail-permintaan', $items->first()->id_penjemputan) }}"
                                    />
                        @endforeach
                    </div>
                @endif
            </div>
            
            
            {{-- Pagination --}}
            @if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator && $data->lastPage() > 1)
                <div class="flex items-center justify-end mt-4 mr-20 space-x-2">
                    {{-- Button < & << --}}
                    @if ($data->currentPage() > 1)
                        <button onclick="window.location.href='{{ $data->url(1) }}'" class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&lt;&lt;</button>
                        <button onclick="window.location.href='{{ $data->previousPageUrl() }}'" class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&lt;</button>
                    @endif

                    {{-- Nomor halaman  --}}
                    <button class="px-3 py-1 font-bold text-green-700 bg-green-200 w-[50px] h-[50px] rounded">{{ $data->currentPage() }}</button>

                    {{-- Button > & >>--}}
                    @if ($data->hasMorePages())
                        <button onclick="window.location.href='{{ $data->nextPageUrl() }}'" class="px-2 py-1 w-[50px] h-[50px] text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&gt;</button>
                        <button onclick="window.location.href='{{ $data->url($data->lastPage()) }}'" class="px-2 w-[50px] h-[50px] py-1 text-gray-600 bg-gray-200 rounded hover:bg-gray-300">&gt;&gt;</button>
                    @endif
                </div>
            @endif
            
        </div>
    </div>
@endsection
