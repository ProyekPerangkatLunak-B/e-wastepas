@extends('layouts.main')

@section('content')
<div class="min-h-screen mx-[22rem] pt-12 bg-gray-100 w-[82%]">
    <!-- Section untuk ID Penjemputan dan Button Batalkan Penjemputan -->
    <div class="flex items-center justify-between ml-20 mr-[9.5rem]">
        <div>
            <h2 class="text-xl font-semibold leading-relaxed">Detail Melacak Penjemputan</h2>
            <p class="text-base font-normal text-gray-600">ID Penjemputan CO92328393 di akun anda.</p>
        </div>

        <!-- Button Batalkan Penjemputan -->
        <a href="#"
           class="flex items-center justify-center w-[200px] h-[50px] px-4 py-2 text-white-normal transition duration-300 bg-red-normal rounded-2xl shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="mr-2 bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
            </svg>
            Batalkan
        </a>
    </div>

    <!-- Container untuk ID Penjemputan, Estimasi Tiba, dan Tracking Status -->
    <div class="w-[85%] ms-20 mt-4 pt-2 pb-12 bg-white shadow-md rounded-2xl">
        <div class="flex items-start justify-between px-4">
            <!-- ID Penjemputan di Ujung Kiri Atas -->
            <div>
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
        <div class="flex items-center justify-center mt-8 space-x-1.5">
            <div class="flex flex-col items-center">
                <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam1.png') }}" class="w-[60px] h-[60px]" alt="Dijemput Kurir">
                <span class="mt-2 text-green-500 text-md">Menunggu Konfirmasi</span>
            </div>
            <div class="w-[220px] h-[12px] rounded bg-gradient-to-r from-gray-300 to-green-400"></div>

            <div class="flex flex-col items-center">
                <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam1.png') }}" class="w-[60px] h-[60px]" alt="Dijemput Kurir">
                <span class="mt-2 text-gray-500 text-md">Dijemput Kurir</span>
            </div>
            <div class="w-[220px] h-[12px] rounded bg-gradient-to-r from-gray-300 to-green-400"></div>

            <div class="flex flex-col items-center">
                <img src="{{ asset('img/masyarakat/penjemputan-sampah/truck1.png') }}" class="w-[60px] h-[60px]" alt="Menuju Dropbox">
                <span class="mt-2 text-gray-500 text-md">Menuju Dropbox</span>
            </div>
            <div class="w-[220px] h-[12px] rounded bg-gradient-to-r from-gray-300 to-green-400"></div>

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
                <!-- Nama, Alamat Penjemputan -->
                <div class="w-1/2 pr-6 mt-2">
                    <h3 class="flex items-center mb-16 space-x-2 text-lg font-semibold">
                        {{-- Icon SVG Person di sebelah kiri --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="mb-1 mr-4 bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                        Asep Sujagat - 08123456789
                    </h3>

                    <h3 class="mb-2 text-lg font-semibold">Diambil dari</h3>
                    <p class="mb-8 text-gray-600">DROPBOX CIDADAP, Jalan Kapten Abdul Hamid No.86, RT.3/RW.1, Kelurahan Ledeng, Cidadap KOTA BANDUNG, CIDADAP, JAWA BARAT, ID, 40142</p>

                    <h3 class="mt-4 mb-2 text-lg font-semibold">Dikirim ke</h3>
                    <p class="text-gray-600">DROPBOX CIDADAP, Jalan Kapten Abdul Hamid No.86, RT.3/RW.1, Kelurahan Ledeng, Cidadap KOTA BANDUNG, CIDADAP, JAWA BARAT, ID, 40142.</p>
                </div>

                <!-- Sampah Section -->
                <div class="w-1/2 pt-2 pl-8">
                    <h3 class="text-lg font-semibold">Sampah</h3>
                    <div class="grid grid-cols-2 gap-3 mt-4">
                        <!-- Sampah Card 1 -->
                        <div class="relative w-[270px] h-[120px] p-4 bg-gray-100 border rounded-2xl shadow-sm border-secondary-normal flex flex-col justify-between">
                            <p class="mt-2 mb-2 font-medium text-md text-black-normal">Layar dan Monitor</p>
                            <p class="mb-20 text-2xl font-semibold text-black-500">Televisi</p>
                            <p class="absolute text-3xl font-bold text-green-500 top-10 right-6">1x</p>
                        </div>
                        <!-- Sampah Card 1 -->
                        <div class="relative w-[270px] h-[120px] p-4 bg-gray-100 border rounded-2xl shadow-sm border-secondary-normal flex flex-col justify-between">
                            <p class="mt-2 mb-2 font-medium text-md text-black-normal">Layar dan Monitor</p>
                            <p class="mb-20 text-2xl font-semibold text-black-500">Televisi</p>
                            <p class="absolute text-3xl font-bold text-green-500 top-10 right-6">1x</p>
                        </div>
                        <!-- Sampah Card 1 -->
                        <div class="relative w-[270px] h-[120px] p-4 bg-gray-100 border rounded-2xl shadow-sm border-secondary-normal flex flex-col justify-between">
                            <p class="mt-2 mb-2 font-medium text-md text-black-normal">Layar dan Monitor</p>
                            <p class="mb-20 text-2xl font-semibold text-black-500">Televisi</p>
                            <p class="absolute text-3xl font-bold text-green-500 top-10 right-6">1x</p>
                        </div>
                        <!-- Sampah Card 1 -->
                        <div class="relative w-[270px] h-[120px] p-4 bg-gray-100 border rounded-2xl shadow-sm border-secondary-normal flex flex-col justify-between">
                            <p class="mt-2 mb-2 font-medium text-md text-black-normal">Layar dan Monitor</p>
                            <p class="mb-20 text-2xl font-semibold text-black-500">Televisi</p>
                            <p class="absolute text-3xl font-bold text-green-500 top-10 right-6">1x</p>
                        </div>
                    </div>
                        <p class="mt-4 font-bold text-red-500">*Catatan</p>
                        <p class="text-black">Hati-Hati Bang Kurir</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
