@extends('layouts.main')

@section('content')
<div class="w-[81%] min-h-screen px-[5rem] py-14 mx-[22rem] bg-gray-100">
    <h2 class="text-xl font-semibold leading-relaxed">Total Sampah dan Poin</h2>
    <div class="flex items-center justify-between">
        <h4 class="text-base font-normal">Semua total sampah elektronik dan poin di akun anda.</h4>
    </div>

    {{-- Section 1 Total Sampah dan Total Poin --}}
    <div class="grid grid-cols-2 gap-4 mt-4 mr-60">
        <!-- Card Total Sampah -->
        <div class="relative w-[550px] h-[130px] p-6 shadow-md bg-white-normal rounded-2xl group hover:shadow-lg flex items-center">
            <div class="flex items-center mr-8">
                <span class="text-6xl font-bold leading-none text-green-600">48</span>
                <span class="mx-auto mt-8 text-lg font-bold leading-none text-black-normal">Pcs</span>
            </div>
            <div class="flex flex-col justify-center ml-8">
                <h3 class="text-2xl font-semibold text-center text-gray-900">Total Sampah</h3>
                <p class="text-gray-500 text-md">Total sampah yang sudah diangkut.</p>
            </div>
        </div>

        <!-- Card Total Poin -->
        <div class="relative w-[550px] h-[130px] p-6 shadow-md bg-white-normal rounded-2xl group hover:shadow-lg flex items-center">
            <div class="flex items-center mr-8">
                <span class="text-6xl font-bold leading-none text-green-600">690</span>
                <span class="mx-auto mt-8 text-lg font-bold leading-none text-black-normal">Poin</span>
            </div>
            <div class="flex flex-col justify-center ml-8">
                <h3 class="text-2xl font-semibold text-center text-black-normal">Total Poin</h3>
                <p class="text-gray-500 text-md">Total poin yang sudah didapatkan.</p>
            </div>
        </div>
    </div>

    {{-- Section 2 Riwayat Penjemputan --}}
    <div class="flex items-center justify-between mx-auto mt-6">
        <div>
            <h2 class="text-xl font-semibold leading-relaxed">Riwayat Penjemputan</h2>
            <p class="text-base font-normal text-gray-600">Daftar penjemputan sampah terbaru di akun anda.</p>
        </div>

        <!-- Button Batalkan Penjemputan -->
        <a href="{{ route('masyarakat.penjemputan.riwayat') }}"
           class="flex items-center justify-center w-[220px] h-[50px] px-4 py-2 text-black-normal transition duration-300 bg-secondary-200 hover:bg-secondary-300 rounded-2xl shadow-md border border-secondary-normal">
            Tampilan lebih banyak
        </a>
    </div>

    <!-- Container Grid Card -->
    <div class="grid grid-cols-3 gap-4 mt-6">
        <!-- Card 1 -->
        <a href="{{ route('masyarakat.penjemputan.detail-riwayat') }}" class="block">
            <div class="relative w-[450px] h-[230px] pb-16 mr-12 bg-white-normal shadow-md rounded-xl hover:shadow-lg">
                <div class="flex justify-between">
                    <span class="mx-6 my-2 text-lg font-bold text-gray-800">08.00 10/11</span>
                    <span class="mx-6 my-2 text-lg font-bold text-gray-800">C032378923</span>
                </div>

                <!-- Isi Konten -->
                <div class="flex items-center px-6 mt-4 space-x-4">
                    <div class="pl-[10px]">
                        <p class="text-2xl font-semibold">Rice Cooker</p>
                        <p class="text-2xl font-semibold">Laptop</p>
                        <p class="text-2xl font-semibold">TV</p>
                        <p class="mt-6 text-sm text-gray-500">Lorem ipsum dolor sit amet.</p>
                    </div>
                    {{-- Jumlah poin --}}
                    <div class="flex items-center justify-center mb-10">
                        <div class="inline-block">
                            <span class="ml-4 text-6xl font-bold leading-none text-secondary-normal">+45</span>
                            <span class="ml-4 text-lg font-bold leading-none text-black-normal">Poin</span>
                        </div>
                    </div>
                </div>

                <!-- Status Button -->
                <div class="absolute right-0 bottom-1.5">
                    <span class="px-10 py-2 font-semibold text-gray-100 bg-secondary-normal text-md rounded-tl-3xl rounded-br-xl">Sudah Sampai</span>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
