@extends('layouts.main')

@section('content')
    <div class="min-h-screen mx-[22rem] mt-2 bg-gray-100 w-[82%]">
        <div class="py-8">
            <h2 class="pl-20 text-xl font-semibold leading-relaxed">Kategori Sampah Elektronik</h2>
            <div class="flex items-center justify-between">
                <h4 class="pl-20 text-base font-normal">Daftar semua kategori sampah elektronik di akun anda.</h4>
                {{-- Search and Filter options --}}
                <div class="flex items-center mr-20 space-x-4">
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
                </div>
            </div>

            {{-- Card Section --}}
            <div class="grid grid-cols-1 gap-4 px-12 mx-6 mt-4 lg:grid-cols-3 lg:gap-4">
                @if (count($kategori) == 0)
                    <div class="col-span-3">
                        <div class="flex items center justify-center">
                            <p class="text-lg font-semibold text-gray-500">Tidak ada kategori sampah elektronik</p>
                        </div>
                    </div>
                @else
                    @foreach ($kategori as $k)
                        <x-card title="{{ $k->nama_kategori_sampah }}" description="{{ $k->deskripsi_kategori_sampah }}"
                            image="https://picsum.photos/1280/720"
                            link="{{ route('masyarakat.penjemputan.detail', $k->id_kategori_sampah) }}" />
                    @endforeach
                    {{-- <x-card title="Lampu" description="Semua  kategori  dari berbagai alat elektronik"
                    image="https://picsum.photos/1280/720" link="{{ route('masyarakat.penjemputan.detail') }}" /> --}}
                @endif
            </div>
        </div>
    </div>
@endsection
