@extends('layouts.main')

@section('content')
<div class="min-h-screen mx-[22rem] pt-6 bg-gray-100 w-[82%]">
    <h2 class="ml-20 text-xl font-semibold leading-relaxed">Detail Melacak Penjemputan</h2>
    <p class="ml-20 text-base font-normal text-gray-600">ID Penjemputan CO92328393 di akun anda.</p>

    <!-- Container untuk ID Penjemputan, Estimasi Tiba, dan Tracking Status -->
    <div class="w-[85%] ms-20 mt-4 pt-2 pb-12 bg-white shadow-md rounded-2xl">
        <div class="flex items-start justify-between px-4">
            <!-- ID Penjemputan di Ujung Kiri Atas -->
            <div class="">
                <p class="text-gray-600">ID Penjemputan:</p>
                <p class="text-xl font-semibold">232378923</p>
            </div>

            <!-- Estimasi Tiba di Ujung Kanan Atas -->
            <div class="text-right">
                <p class="text-gray-600">Estimasi Tiba:</p>
                <p class="text-xl font-semibold">17.23</p>
            </div>
        </div>

        <!-- Tracking Status di Tengah -->
        <div class="flex items-center justify-center mt-8 space-x-6">
            <div class="flex flex-col items-center">
                <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam1.png') }}" class="w-15 h-15" alt="Dijemput Kurir">
                <span class="mt-2 text-green-500 text-md">Dijemput Kurir</span>
            </div>
            <div class="w-64 h-2 rounded bg-gradient-to-r from-gray-300 to-green-400"></div>

            <div class="flex flex-col items-center">
                <img src="{{ asset('img/masyarakat/penjemputan-sampah/truck1.png') }}" class="w-15 h-15" alt="Menuju Dropbox">
                <span class="mt-2 text-gray-500 text-md">Menuju Dropbox</span>
            </div>
            <div class="w-64 h-2 rounded bg-gradient-to-r from-gray-300 to-green-400"></div>

            <div class="flex flex-col items-center">
                <img src="{{ asset('img/masyarakat/penjemputan-sampah/patch-check1.png') }}" class="w-15 h-15" alt="E-waste Tiba">
                <span class="mt-2 text-gray-500 text-md">E-waste Tiba</span>
            </div>
        </div>
    </div>

    <!-- Container untuk Detail Alamat dan Sampah -->
    <div class="w-[85%] ms-20 pb-28 mt-6 bg-white shadow-md rounded-xl">
        <div class="flex justify-center mb-12 space-x-28">
            <span class="w-24 h-2 bg-red-500 rounded"></span>
            <span class="w-24 h-2 bg-blue-500 rounded"></span>
            <span class="w-24 h-2 bg-red-500 rounded"></span>
            <span class="w-24 h-2 bg-blue-500 rounded"></span>
            <span class="w-24 h-2 bg-red-500 rounded"></span>
            <span class="w-24 h-2 bg-blue-500 rounded"></span>
            <span class="w-24 h-2 bg-red-500 rounded"></span>
        </div>

        <!-- Tracking & Details -->
        <div class="px-8 mt-6">
            <div class="flex justify-between">
                <!-- Alamat Pengantaran -->
                <div class="w-1/2 pr-6 mt-2">
                    <h3 class="mb-2 text-lg font-semibold">Diambil dari</h3>
                    <p class="text-gray-600">DROPBOX CIDADAP, Jalan Kapten Abdul Hamid No.86, RT.3/RW.1, Kelurahan Ledeng, Cidadap KOTA BANDUNG, CIDADAP, JAWA BARAT, ID, 40142</p>

                    <h3 class="mt-4 mb-2 text-lg font-semibold">Dikirim ke</h3>
                    <p class="text-gray-600">DROPBOX CIDADAP, Jalan Kapten Abdul Hamid No.86, RT.3/RW.1, Kelurahan Ledeng, Cidadap KOTA BANDUNG, CIDADAP, JAWA BARAT, ID, 40142.</p>

                    <p class="mt-4 text-gray-600">Catatan:</p>
                    <p class="text-gray-500">Ada 2 Barang, 1 Pcs Laptop dan 1 Pcs Lemari Es. </p>
                    <p class="text-gray-500">Hati Hati Bang Kurir</p>
                </div>

                <!-- Sampah Section -->
                <div class="w-1/2 pl-6">
                    <h3 class="text-lg font-semibold">Sampah</h3>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div class="p-4 text-center bg-gray-100 rounded-lg">
                            <p class="font-semibold">Layar dan Monitor</p>
                            <p class="text-sm">Televisi</p>
                            <p class="font-bold text-green-500">1x</p>
                        </div>
                        <div class="p-4 text-center bg-gray-100 rounded-lg">
                            <p class="font-semibold">Layar dan Monitor</p>
                            <p class="text-sm">Televisi</p>
                            <p class="font-bold text-green-500">1x</p>
                        </div>
                        <div class="p-4 text-center bg-gray-100 rounded-lg">
                            <p class="font-semibold">Layar dan Monitor</p>
                            <p class="text-sm">Televisi</p>
                            <p class="font-bold text-green-500">1x</p>
                        </div>
                        <div class="p-4 text-center bg-gray-100 rounded-lg">
                            <p class="font-semibold">Layar dan Monitor</p>
                            <p class="text-sm">Televisi</p>
                            <p class="font-bold text-green-500">1x</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
