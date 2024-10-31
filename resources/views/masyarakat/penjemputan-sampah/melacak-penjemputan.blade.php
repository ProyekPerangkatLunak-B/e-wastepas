@extends('layouts.main')

@section('content')
<div class="w-[81%] min-h-screen px-12 py-4 mx-[22rem] bg-gray-100">
    <h2 class="text-xl font-semibold leading-relaxed">Melacak Penjemputan</h2>
    <p class="text-base font-normal text-gray-600">Daftar semua penjemputan sampah elektronik di akun anda.</p>

    <!-- Container Grid Card -->
    <div class="grid grid-cols-2 gap-6 mt-6">
        <!-- Card 1 -->
        <a href="{{ route('masyarakat.penjemputan.detail-melacak') }}" class="block">
            <div class="relative p-6 bg-white rounded-lg shadow-md hover:shadow-lg">
                <div class="flex justify-end">
                    <span class="text-sm font-bold text-gray-600">C032378923</span>
                </div>
                
                <!-- Isi Konten -->
                <div class="flex items-center px-6 mt-4 space-x-4">
                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/patch-check1.png') }}" alt="Icon" class="w-[15%] h-[15%]">
                    <div class="pl-[4rem]">
                        <p class="text-2xl font-semibold">Rice Cooker</p>
                        <p class="text-2xl font-semibold">Laptop</p>
                        <p class="text-2xl font-semibold">TV</p>
                        <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
                
                <!-- Status Button di kanan bawah konten -->
                <div class="absolute right-0 bottom-1">
                    <span class="px-6 py-2 text-sm font-semibold text-white bg-orange-500 rounded-lg">Dijemput Kurir</span>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
