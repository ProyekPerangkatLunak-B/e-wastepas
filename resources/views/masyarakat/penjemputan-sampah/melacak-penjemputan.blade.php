@extends('layouts.main')

@section('content')
    <div class="w-[81%] min-h-screen px-[5rem] py-12 mx-[22rem] bg-gray-100">
        <h2 class="text-xl font-semibold leading-relaxed">Melacak Penjemputan</h2>
        <div class="flex items-center justify-between">
            <h4 class="text-base font-normal">Daftar semua penjemputan sampah elektronik di akun anda.</h4>

            {{-- Search and Filter options --}}
            <div class="flex items-center mr-4 space-x-4">
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
                    <!-- SVG Icon Filter di ujung kanan -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="absolute text-gray-500 transform -translate-y-1/2 right-3 top-1/2 bi bi-filter"
                        viewBox="0 0 16 16">
                        <path
                            d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                    </svg>
                </div>
            </div>
        </div>

            <!-- Container Grid Card -->
            <div class="grid grid-cols-3 gap-8 mt-6">
                @foreach ($detailPenjemputan as $p)
                    <a href="{{ route('masyarakat.penjemputan.detail-melacak') }}" class="block">
                        <div class="relative w-[450px] h-[230px] bg-white-normal shadow-md rounded-xl hover:shadow-lg">
                            <div class="flex justify-between">
                                <span class="mx-6 my-2 text-lg font-bold text-gray-800">
                                    {{ $p->penjemputan->waktu_permintaan }}
                                </span>
                            </div>

                            <!-- Isi Konten -->
                            <div class="flex px-6 mt-4 space-x-6">
                                <!-- Bagian Jenis dan Deskripsi Sampah -->
                                <div class="flex-grow my-4">
                                    <p class="text-2xl font-semibold">{{ $p->sampah->jenis->nama_jenis_sampah }}</p>
                                    <p class="mt-20 text-sm text-gray-500">{{ $p->sampah->deskripsi_sampah }}</p>
                                </div>
                                    <div class="flex flex-col items-center justify-between">
                                        <img src="{{ asset('img/masyarakat/penjemputan-sampah/journal-check 2.png') }}" alt="Icon" class="w-[100px] h-[100px]">
                                        <!-- Status -->
                                        <div class="absolute right-0 bottom-1">
                                            <span class="px-4 py-2 font-semibold text-white-normal bg-tertiary-600 rounded-tl-3xl rounded-br-xl">
                                                {{ $p->penjemputan->status_permintaan }}
                                            </span>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="flex items-center justify-end mt-4">
                <div class="relative space-x-2 left-[58rem]">
                    <button
                        class="w-[50px] h-[50px] px-2 py-1 text-gray-600 rounded shadow-sm bg-white-200 hover:bg-white-300">&lt;&lt;</button>
                    <button
                        class="w-[50px] h-[50px] px-2 py-1 text-gray-600 rounded shadow-sm bg-white-200 hover:bg-white-300">&lt;</button>

                    <button
                        class="w-[50px] h-[50px] px-3 py-1 font-bold text-green-700 shadow-sm bg-green-200 rounded">1</button>

                    <button
                        class="w-[50px] h-[50px] px-2 py-1 text-gray-600 rounded shadow-sm bg-white-200 hover:bg-white-300">&gt;</button>
                    <button
                        class="w-[50px] h-[50px] px-2 py-1 text-gray-600 rounded shadow-sm bg-white-200 hover:bg-white-300">&gt;&gt;</button>
                </div>
            </div>
        </div>
    </div>
@endsection
