@extends('layouts.main')

@section('content')
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Kategori Sampah Elektronik</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Daftar semua kategori sampah elektronik di akun anda.</h4>

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
                <x-card 
                    title="Lampu" 
                    description="Semua jenis lampu dari berbagai alat elektronik" 
                    image="https://picsum.photos/1280/720" 
                    link="#" />

                <x-card 
                    title="Baterai" 
                    description="Baterai dari berbagai perangkat elektronik." 
                    image="https://picsum.photos/1280/720" 
                    link="#" />

                <x-card 
                    title="Kabel" 
                    description="Berbagai macam kabel dari perangkat elektronik rusak" 
                    image="https://picsum.photos/1280/720" 
                    link="#" />
            </div>
        </div>
    </div>
@endsection
