@extends('main')

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
                        <select class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-full focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                            <option value="all">Filter</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Card Section --}}
            <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                {{-- Card 1 --}}
                <div class="relative w-full bg-white rounded-lg shadow-md group hover:shadow-lg">
                    <div class="w-full h-48 overflow-hidden bg-white rounded-t-xl">
                        <img src="https://picsum.photos/1280/720" alt="Lampu" class="object-cover w-full h-full">
                    </div>
                    <div class="flex flex-col items-center justify-center h-40 p-4 text-center">
                        <h3 class="text-2xl font-semibold text-gray-900">Lampu</h3>
                        <p class="mt-2 text-base text-gray-500">Semua jenis lampu dari berbagai alat elektronik</p>
                        <a href="#" class="inline-block w-full px-4 py-3 mt-4 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">Lihat Selengkapnya</a>
                    </div>
                </div>
                {{-- Card 2 --}}
                <div class="relative w-full bg-white rounded-lg shadow-md group hover:shadow-lg">
                    <div class="w-full h-48 overflow-hidden bg-white rounded-t-xl">
                        <img src="https://picsum.photos/1280/720" alt="Lampu" class="object-cover w-full h-full">
                    </div>
                    <div class="flex flex-col items-center justify-center h-40 p-4 text-center">
                        <h3 class="text-2xl font-semibold text-gray-900">Lampu</h3>
                        <p class="mt-2 text-base text-gray-500">Semua jenis lampu dari berbagai alat elektronik</p>
                        <a href="#" class="inline-block w-full px-4 py-3 mt-4 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">Lihat Selengkapnya</a>
                    </div>
                </div>
                {{-- Card 3 --}}
                <div class="relative w-full bg-white rounded-lg shadow-md group hover:shadow-lg">
                    <div class="w-full h-48 overflow-hidden bg-white rounded-t-xl">
                        <img src="https://picsum.photos/1280/720" alt="Lampu" class="object-cover w-full h-full">
                    </div>
                    <div class="flex flex-col items-center justify-center h-40 p-4 text-center">
                        <h3 class="text-2xl font-semibold text-gray-900">Lampu</h3>
                        <p class="mt-2 text-base text-gray-500">Semua jenis lampu dari berbagai alat elektronik</p>
                        <a href="#" class="inline-block w-full px-4 py-3 mt-4 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">Lihat Selengkapnya</a>
                    </div>
                </div>
                <div class="h-64 bg-gray-200 rounded-lg"></div>
                <div class="h-64 bg-gray-200 rounded-lg"></div>
                <div class="h-64 bg-gray-200 rounded-lg"></div>
            </div>
        </div>
    </div>
@endsection
