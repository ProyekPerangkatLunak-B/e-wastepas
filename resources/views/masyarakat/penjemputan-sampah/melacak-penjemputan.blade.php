@extends('layouts.main')

@section('content')
<div class="w-[81%] min-h-screen px-[5rem] py-4 mx-[22rem] bg-gray-100">
    <h2 class="text-xl font-semibold leading-relaxed">Melacak Penjemputan</h2>
    <div class="flex items-center justify-between">
        <h4 class="text-base font-normal">Daftar semua penjemputan sampah elektronik di akun anda.</h4>

        {{-- Search and Filter options --}}
        <div class="flex items-center mr-4 space-x-4">
            {{-- Search Box --}}
            <div class="relative">
                <input type="text" class="w-[334px] h-[50px] py-3 pl-12 pr-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 placeholder:text-gray-900" placeholder="Cari....">
                <!-- SVG Icon Search -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="absolute text-gray-500 transform -translate-y-1/2 bi bi-search left-3 top-1/2" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
            </div>

            {{-- Filter Dropdown --}}
            <div class="relative">
                <select class="w-[222px] h-[50px] py-3 pl-4 text-sm text-gray-700 bg-white border border-gray-300 appearance-none pr-14 rounded-xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                    <option value="all">Filter</option>
                    <option value="active">Aktif</option>
                    <option value="inactive">Tidak Aktif</option>
                </select>
                <!-- SVG Icon Filter di ujung kanan -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="absolute text-gray-500 transform -translate-y-1/2 right-3 top-1/2 bi bi-filter" viewBox="0 0 16 16">
                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                </svg>
            </div>
        </div>
    </div>


    <!-- Container Grid Card -->
    <div class="grid grid-cols-2 gap-4 mt-6">
        <!-- Card 1 -->
        <a href="{{ route('masyarakat.penjemputan.detail-melacak') }}" class="block">
            <div class="relative w-[670px] h-[230px] pb-16 mr-12 bg-white shadow-md rounded-xl hover:shadow-lg">
                <div class="flex justify-end">
                    <span class="mt-2 mr-2 text-lg font-bold text-gray-800">C032378923</span>
                </div>

                <!-- Isi Konten -->
                <div class="flex items-center px-6 mt-4 space-x-4">
                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/journal-check 2.png') }}" alt="Icon" class="w-24 h-24 ml-8">
                    <div class="pl-[4rem] mt-2">
                        <p class="text-2xl font-semibold">Rice Cooker</p>
                        <p class="text-2xl font-semibold">Laptop</p>
                        <p class="text-2xl font-semibold">TV</p>
                        <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>

                <!-- Status Button -->
                <div class="absolute right-0 bottom-1.5">
                    <span class="px-6 py-2 font-semibold text-gray-100 bg-tertiary-600 text-md rounded-tl-3xl rounded-br-xl">Menunggu Konfirmasi</span>
                </div>
            </div>
        </a>
        <!-- Card 2 -->
        <a href="{{ route('masyarakat.penjemputan.detail-melacak') }}" class="block">
            <div class="relative w-[670px] h-[230px] pb-16 mr-12 bg-white shadow-md rounded-xl hover:shadow-lg">
                <div class="flex justify-end">
                    <span class="mt-2 mr-2 text-lg font-bold text-gray-800">C032378923</span>
                </div>

                <!-- Isi Konten -->
                <div class="flex items-center px-6 mt-4 space-x-4">
                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam1.png') }}" alt="Icon" class="w-24 h-24 ml-8">
                    <div class="pl-[4rem] mt-2">
                        <p class="text-2xl font-semibold">Rice Cooker</p>
                        <p class="text-2xl font-semibold">Laptop</p>
                        <p class="text-2xl font-semibold">TV</p>
                        <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>

                <!-- Status Button -->
                <div class="absolute right-0 bottom-1.5">
                    <span class="px-8 py-2 font-semibold text-gray-100 bg-white-dark text-md rounded-tl-3xl rounded-br-xl">Dijemput Kurir</span>
                </div>
            </div>
        </a>
        <!-- Card 3 -->
        <a href="{{ route('masyarakat.penjemputan.detail-melacak') }}" class="block">
            <div class="relative w-[670px] h-[230px] pb-16 mr-12 bg-white shadow-md rounded-xl hover:shadow-lg">
                <div class="flex justify-end">
                    <span class="mt-2 mr-2 text-lg font-bold text-gray-800">C032378923</span>
                </div>

                <!-- Isi Konten -->
                <div class="flex items-center px-6 mt-4 space-x-4">
                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam1.png') }}" alt="Icon" class="w-24 h-24 ml-8">
                    <div class="pl-[4rem] mt-2">
                        <p class="text-2xl font-semibold">Rice Cooker</p>
                        <p class="text-2xl font-semibold">Laptop</p>
                        <p class="text-2xl font-semibold">TV</p>
                        <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>

                <!-- Status Button -->
                <div class="absolute right-0 bottom-1.5">
                    <span class="px-8 py-2 font-semibold text-gray-100 bg-primary-normal text-md rounded-tl-3xl rounded-br-xl">Menuju Dropbox</span>
                </div>
            </div>
        </a>
        <!-- Card 4 -->
        <a href="{{ route('masyarakat.penjemputan.detail-melacak') }}" class="block">
            <div class="relative w-[670px] h-[230px] pb-16 mr-12 bg-white shadow-md rounded-xl hover:shadow-lg">
                <div class="flex justify-end">
                    <span class="mt-2 mr-2 text-lg font-bold text-gray-800">C032378923</span>
                </div>

                <!-- Isi Konten -->
                <div class="flex items-center px-6 mt-4 space-x-4">
                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam1.png') }}" alt="Icon" class="w-24 h-24 ml-8">
                    <div class="pl-[4rem] mt-2">
                        <p class="text-2xl font-semibold">Rice Cooker</p>
                        <p class="text-2xl font-semibold">Laptop</p>
                        <p class="text-2xl font-semibold">TV</p>
                        <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>

                <!-- Status Button -->
                <div class="absolute right-0 bottom-1.5">
                    <span class="px-8 py-2 font-semibold text-gray-100 bg-secondary-normal text-md rounded-tl-3xl rounded-br-xl">Sudah Sampai</span>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
