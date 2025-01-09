@extends('layouts.main-mitrakurir')

@section('content')
<div class="container max-w-full px-4 mx-auto bg-gray-100">
    <div class="py-8">
        <!-- judul & button -->
        <div class="flex items-center justify-between mx-14">
            <div>
                <h2 class="text-xl font-semibold">Detail Riwayat Penjemputan</h2>
                <p class="text-base font-normal text-gray-600">Detail riwayat penjemputan sampah elektronik</p>
            </div>
        </div>

        <!-- Card -->
        <div class="flex flex-wrap justify-between mx-14 space-x-6">
            <!-- Card ID Penjemputan -->
            <div class="flex-1 sm:w-full md:w-1/3 bg-white-100 shadow-md rounded-xl p-6 text-center mt-6">
                <div class="text-green-600 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="35" viewBox="0 0 51 35" fill="none" class="mx-auto">
                        <path d="M39.4091 31.7188C38.4869 31.7188 37.6024 31.373 36.9503 30.7577C36.2982 30.1423 35.9318 29.3077 35.9318 28.4375C35.9318 27.5673 36.2982 26.7327 36.9503 26.1173C37.6024 25.502 38.4869 25.1562 39.4091 25.1562C40.3313 25.1562 41.2158 25.502 41.8679 26.1173C42.52 26.7327 42.8864 27.5673 42.8864 28.4375C42.8864 29.3077 42.52 30.1423 41.8679 30.7577C41.2158 31.373 40.3313 31.7188 39.4091 31.7188ZM42.8864 12.0312L47.43 17.5H37.0909V12.0312M11.5909 31.7188C10.6687 31.7188 9.78422 31.373 9.1321 30.7577C8.47999 30.1423 8.11364 29.3077 8.11364 28.4375C8.11364 27.5673 8.47999 26.7327 9.1321 26.1173C9.78422 25.502 10.6687 25.1562 11.5909 25.1562C12.5131 25.1562 13.3976 25.502 14.0497 26.1173C14.7018 26.7327 15.0682 27.5673 15.0682 28.4375C15.0682 29.3077 14.7018 30.1423 14.0497 30.7577C13.3976 31.373 12.5131 31.7188 11.5909 31.7188ZM44.0455 8.75H37.0909V0H4.63636C2.06318 0 0 1.94687 0 4.375V28.4375H4.63636C4.63636 30.178 5.36907 31.8472 6.6733 33.0779C7.97753 34.3086 9.74645 35 11.5909 35C13.4354 35 15.2043 34.3086 16.5085 33.0779C17.8127 31.8472 18.5455 30.178 18.5455 28.4375H32.4545C32.4545 30.178 33.1873 31.8472 34.4915 33.0779C35.7957 34.3086 37.5646 35 39.4091 35C41.2536 35 43.0225 34.3086 44.3267 33.0779C45.6309 31.8472 46.3636 30.178 46.3636 28.4375H51V17.5L44.0455 8.75Z" fill="#437252"/>
                    </svg>
                </div>
                <p class="text-lg font-semibold">Kode Penjemputan</p>
                <p class="text-2xl font-bold text-gray-800 mt-1 ">{{ $data->first()->kode_penjemputan }}</p>
            </div>

            <!-- Card Tanggal Penjemputan -->
            <div class="flex-1 sm:w-full md:w-1/3 bg-white-100 shadow-md rounded-xl p-6 text-center mt-6">
                <div class="text-green-600 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="43" height="42" viewBox="0 0 43 42" fill="none" class="mx-auto">
                        <path d="M0.25 14.125C0.25 10.1172 0.25 8.1155 1.49525 6.87025C2.7405 5.625 4.74225 5.625 8.75 5.625H34.25C38.2578 5.625 40.2595 5.625 41.5047 6.87025C42.75 8.1155 42.75 10.1172 42.75 14.125C42.75 15.1259 42.75 15.6274 42.4398 15.9398C42.1274 16.25 41.6237 16.25 40.625 16.25H2.375C1.37413 16.25 0.872625 16.25 0.56025 15.9398C0.25 15.6274 0.25 15.1237 0.25 14.125ZM0.25 33.25C0.25 37.2577 0.25 39.2595 1.49525 40.5047C2.7405 41.75 4.74225 41.75 8.75 41.75H34.25C38.2578 41.75 40.2595 41.75 41.5047 40.5047C42.75 39.2595 42.75 37.2577 42.75 33.25V22.625C42.75 21.6241 42.75 21.1226 42.4398 20.8102C42.1274 20.5 41.6237 20.5 40.625 20.5H2.375C1.37413 20.5 0.872625 20.5 0.56025 20.8102C0.25 21.1226 0.25 21.6262 0.25 22.625V33.25Z" fill="#437252"/>
                        <path d="M10.875 1.375V7.75M32.125 1.375V7.75" stroke="#437252" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <p class="text-lg font-semibold">Tanggal Penjemputan</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ $data->first()->tanggal_penjemputan }}</p>
            </div>

            <!-- Card Status Penjemputan -->
            <div class="flex-1 sm:w-full md:w-1/3 bg-white-100 shadow-md rounded-xl p-6 text-center mt-6">
                <div class="text-green-600 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none" class=" mx-auto">
                        <path d="M11.25 47.25C10.0125 47.25 8.9535 46.8097 8.073 45.9292C7.1925 45.0488 6.7515 43.989 6.75 42.75V11.25C6.75 10.0125 7.191 8.9535 8.073 8.073C8.955 7.1925 10.014 6.7515 11.25 6.75H42.75C43.9875 6.75 45.0472 7.191 45.9292 8.073C46.8112 8.955 47.2515 10.014 47.25 11.25V28.575L39.0375 36.7875L34.2563 32.0063L24.6938 41.5125L30.4312 47.25H11.25ZM24.75 29.25H38.25V24.75H24.75V29.25ZM24.75 20.25H38.25V15.75H24.75V20.25ZM39.0375 49.5L31.05 41.5125L34.2563 38.3625L39.0375 43.1437L48.6 33.5813L51.75 36.7875L39.0375 49.5ZM18 29.25C18.6375 29.25 19.1723 29.034 19.6043 28.602C20.0363 28.17 20.2515 27.636 20.25 27C20.2485 26.364 20.0325 25.83 19.602 25.398C19.1715 24.966 18.6375 24.75 18 24.75C17.3625 24.75 16.8285 24.966 16.398 25.398C15.9675 25.83 15.7515 26.364 15.75 27C15.7485 27.636 15.9645 28.1708 16.398 28.6042C16.8315 29.0378 17.3655 29.253 18 29.25ZM18 20.25C18.6375 20.25 19.1723 20.034 19.6043 19.602C20.0363 19.17 20.2515 18.636 20.25 18C20.2485 17.364 20.0325 16.83 19.602 16.398C19.1715 15.966 18.6375 15.75 18 15.75C17.3625 15.75 16.8285 15.966 16.398 16.398C15.9675 16.83 15.7515 17.364 15.75 18C15.7485 18.636 15.9645 19.1708 16.398 19.6043C16.8315 20.0378 17.3655 20.253 18 20.25Z" fill="#437252"/>
                    </svg>
                </div>
                <p class="text-lg font-semibold">Status Penjemputan</p>
                <p class="text-2xl font-bold text-green-600 mt-1">{{ $data->first()->status }}</p>
            </div>
        </div>

        <!-- Container alamat & sampah -->
        <div class=" mt-6 bg-white-100 shadow-md rounded-2xl space-x-4 mx-14">
            <div class="flex justify-between space-x-5 px-8">
                <span class="w-20 h-1 bg-red-500 rounded"></span>
                <span class="w-20 h-1 bg-blue-500 rounded"></span>
                <span class="w-20 h-1 bg-red-500 rounded"></span>
                <span class="w-20 h-1 bg-blue-500 rounded"></span>
                <span class="w-20 h-1 bg-red-500 rounded"></span>
                <span class="w-20 h-1 bg-blue-500 rounded"></span>
                <span class="w-20 h-1 bg-red-500 rounded"></span>
                <span class="w-20 h-1 bg-blue-500 rounded"></span>
            </div>
            <div class="p-6">
                <div class="flex flex-col md:flex-row justify-between">
                    <!-- nama & alamat -->
                    <div class="w-full md:w-1/2">
                        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-8">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-person mr-2" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg>
                            {{ $data->first()->nama }} - {{ $data->first()->nomor_telepon }}
                        </h3>
                        <h3 class="text-lg font-semibold">Alamat Penjemputan</h3>
                        <p class="text-gray-600">{{ $data->first()->alamat_penjemputan }}</p>
                        <h3 class="text-lg font-semibold mt-4">Daerah Penjemputan</h3>
                        <p class="text-gray-600">{{ $data->first()->nama_daerah }}</p>
                        <h3 class="text-lg font-semibold mt-4">Lokasi Dropbox Penyimpanan Sampah</h3>
                        <p class="text-gray-600">{{ $data->first()->alamat_dropbox }}</p>
                    </div>
            
                    <!-- sampah -->
                    <div class="w-full md:w-1/2 mt-8 md:mt-0">
                        <h3 class="text-lg font-semibold">Sampah yang telah dijemput</h3>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mt-4">
                            <!-- card sampah -->
                            @foreach($data as $detail)
                            <div class="relative px-4 py-5 bg-gray-100 border rounded-2xl shadow-sm">
                                <p class="text-base font-medium pr-12 break-words max-w-full">{{ $detail->nama_kategori }}</p>
                                <p class="text-lg font-semibold mt-2 pr-12 break-words max-w-full">{{ $detail->nama_jenis }}</p>
                                <p class="absolute top-6 right-4 text-2xl font-bold text-primary-normal">1 Pcs</p>
                                <div class="absolute bottom-0 right-0 bg-primary-normal text-white-100 font-semibold px-6 py-1 rounded-tl-2xl rounded-br-2xl text-sm">
                                    {{ $detail->berat }} Kg
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- catatan --}}
                        <p class="mt-4 font-bold text-red-normal">*Catatan</p>
                        <p class="text-black">{{ $data->first()->status }}</p>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Tombol Kembali -->
<div class="flex justify-end mx-14 mt-6">
    <a href="{{ route('mitra-kurir.penjemputan.riwayat-penjemputan') }}" class="bg-primary-normal hover:bg-primary-700 text-white-100 font-semibold py-2 px-6 rounded-lg shadow-md">
        Kembali
    </a>
</div>
    </div>
</div>
@endsection
