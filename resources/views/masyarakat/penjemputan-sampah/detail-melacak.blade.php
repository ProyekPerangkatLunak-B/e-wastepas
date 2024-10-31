@extends('layouts.main')

@section('content')
<div class="min-h-screen mx-[22rem] mt-2 bg-gray-100 w-[82%]">
    <h2 class="text-xl font-semibold leading-relaxed ml-14">Melacak Penjemputan</h2>
    <p class="text-base font-normal text-gray-600 ml-14">Daftar semua kategori sampah elektronik di akun anda.</p>

    <div class="w-[85%] ms-20 py-8 mt-6 bg-white shadow-md rounded-xl">
        <div class="flex items-center justify-between">
            <div class="ms-4">
                <p class="text-gray-600">ID Penjemputan:</p>
                <p class="text-xl font-semibold">232378923</p>
            </div>

            <div class="flex items-center justify-center space-x-6">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam1.png') }}" class="w-12 h-12" alt="Dijemput Kurir">
                    <span class="mt-2 text-sm text-green-500">Dijemput Kurir</span>
                </div>
                <div class="w-16 h-1 bg-green-300 rounded"></div>

                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/truck1.png') }}" class="w-12 h-12" alt="Menuju Dropbox">
                    <span class="mt-2 text-sm text-gray-500">Menuju Dropbox</span>
                </div>
                <div class="w-16 h-1 bg-gray-300 rounded"></div>

                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/patch-check1.png') }}" class="w-12 h-12" alt="E-waste Tiba">
                    <span class="mt-2 text-sm text-gray-500">E-waste Tiba</span>
                </div>
            </div>

            <div class="text-right me-4">
                <p class="text-gray-600">Estimasi Tiba:</p>
                <p class="text-xl font-semibold">17.23</p>
            </div>
        </div>
    </div>

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
                <h3 class="text-lg font-semibold">Diambil dari</h3>
                <p class="text-gray-600">DROPBOX CIDADAP, Jalan Kapten Abdul Hamid No.86, RT.3/RW.1, Kelurahan Ledeng, Cidadap KOTA BANDUNG, CIDADA...</p>
                
                <h3 class="mt-4 text-lg font-semibold">Dikirim ke</h3>
                <p class="text-gray-600">DROPBOX CIDADAP, Jalan Kapten Abdul Hamid No.86, RT.3/RW.1, Kelurahan Ledeng, Cidadap KOTA BANDUNG, CIDADA...</p>
                
                <p class="mt-4 text-gray-600">Catatan:</p>
                <p class="text-gray-500">Ada 2 Barang, 1 Pcs Laptop dan 1 Pcs Lemari Es. Hati hati Bang Kurir</p>
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
@endsection