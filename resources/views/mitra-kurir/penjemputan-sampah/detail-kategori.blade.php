@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-bold leading-relaxed ml-14">Sampah Elektronik {{ $namaKategori }}</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Daftar jenis sampah elektronik dari kategori {{ $namaKategori }} yang dapat dijemput</h4>

                {{-- Search and Filter options --}}
                <div class="flex items-center space-x-4 mr-14">
                    {{-- Search Box --}}
                    <div class="relative">
                        <input type="text" class="w-64 px-4 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-full focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 placeholder:text-gray-900" placeholder="Cari....">
                    </div>
                    {{-- Filter Dropdown --}}
                    <div>
                        <select class="items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-full focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                            <option value="all">Filter</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Card Section --}}
            <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                <x-card-detail
                    tittle="Lampu" 
                    description="Semua tipe handphone termasuk komponen layar dan monitor, seperti touchscreen, backlight, panel LCD, LED, OLED, dan sebagainya.  " 
                    image="https://picsum.photos/700/700" />
            </div>


            
            
        </div>
    </div>
@endsection
