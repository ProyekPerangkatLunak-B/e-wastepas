@extends('layouts.main-admin-penjemputan-sampah')

@section('content')
    {{-- Container Utama --}}
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="pb-32 pt-4">
            {{-- Section Judul --}}
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Detail Permintaan Penjemputan Sampah</h2>
            <h4 class="text-base font-normal ml-14">Detail Permintaan Penjemputan Sampah</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5 px-12">
                <!-- Card Kiri -->
                <div class="col-span-1 bg-white py-8 mx-8 rounded-lg shadow-lg flex flex-col items-center">
                <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-gray-600 font-bold text-center text-sm mb-4">Nama Masyarakat</h5>
                    <div class="mt-2 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="24" height="24" fill="#437252">
                            <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                        </svg>
                    </div>
                    <h5 class="text-gray-600 font-bold text-center text-sm">Alamat Penjemputan</h5>
                    <h5 class="text-gray-600 rounded-lg font-normal text-center text-xs mx-5 mb-4 px-5 ">Alamat Lengkap Lokasi Penjemputan</h5>
                    <div class="mt-2 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 528 512" width="24" height="24" fill="#437252">
                            <path d="M264.4 116.3l-132 84.3 132 84.3-132 84.3L0 284.1l132.3-84.3L0 116.3 132.3 32l132.1 84.3zM131.6 395.7l132-84.3 132 84.3-132 84.3-132-84.3zm132.8-111.6l132-84.3-132-83.6L395.7 32 528 116.3l-132.3 84.3L528 284.8l-132.3 84.3-131.3-85z"/>
                        </svg>
                    </div>
                    <h5 class="text-gray-600 font-bold text-center text-sm">Dropbox Terdekat</h5>
                    <h5 class="text-gray-600 rounded-lg font-normal text-center text-xs mx-5 mb-8 px-5 ">Alamat Lengkap Dropbox Terdekat dari Lokasi Kurir</h5>
                    <h5 class="text-gray-600 font-bold text-center text-sm">Tanggal Penjemputan</h5>
                    <h5 class="text-gray-600 rounded-lg font-normal text-center text-xs mx-5 mb-2 px-5 ">dd/mm/yyyy</h5>
                </div>

                <!-- Card Tengah -->
                <div class="col-span-2 bg-white py-5 px-7 rounded-lg shadow-lg">
                    <h5 class="text-gray-600 font-bold text-sm mb-1">Sampah</h5>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-200 py-3 rounded-xl shadow-lg border-2 border-black">
                            <h5 class="font-normal text-xs px-5 mb-2">Kategori <span class="ml-2">: Kategori Sampah</span></h5>
                            <h5 class="font-normal text-xs px-5 mb-2">Jenis <span class="ml-6">: Jenis Sampah</span></h5>
                            <h5 class="font-normal text-xs px-5 mb-2">Jumlah <span class="ml-3">: Jumlah Sampah</span></h5>
                        </div>
                        <div class="bg-gray-200 py-3 rounded-xl shadow-lg border-2 border-black">
                            <h5 class="font-normal text-xs px-5 mb-2">Kategori <span class="ml-2">: Kategori Sampah</span></h5>
                            <h5 class="font-normal text-xs px-5 mb-2">Jenis <span class="ml-6">: Jenis Sampah</span></h5>
                            <h5 class="font-normal text-xs px-5 mb-2">Jumlah <span class="ml-3">: Jumlah Sampah</span></h5>
                        </div>
                        <div class="bg-gray-200 py-3 rounded-xl shadow-lg border-2 border-black">
                            <h5 class="font-normal text-xs px-5 mb-2">Kategori <span class="ml-2">: Kategori Sampah</span></h5>
                            <h5 class="font-normal text-xs px-5 mb-2">Jenis <span class="ml-6">: Jenis Sampah</span></h5>
                            <h5 class="font-normal text-xs px-5 mb-2">Jumlah <span class="ml-3">: Jumlah Sampah</span></h5>
                        </div>
                    </div>
                    
                    <h5 class="text-gray-600 font-bold text-sm mt-4">Catatan</h5>
                    <div class="bg-gray-200 pt-2 pb-6 rounded-xl shadow-lg border-2 border-black">
                        <h5 class="font-normal text-xs px-5 mb-2">Catatan tambahan untuk sampah</h5>
                    </div>

                    <h5 class="text-gray-600 font-bold text-center text-sm mt-4">Status penerimaan oleh kurir: <span class="text-green-400">Diterima</span></h5>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
