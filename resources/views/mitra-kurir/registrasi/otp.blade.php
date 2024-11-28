@extends('mitra-kurir.registrasi.layout')
@section('title', 'Verifikasi OTP')
@section('content')
<div class="bg-cover bg-center min-h-screen relative" style="background-image: url('/img/mitra-kurir/bg-otp.png');">
    <div class="absolute top-4 left-4 sm:top-6 sm:left-6">
        <img src="/img/mitra-kurir/logoEwasteText.png" alt="logo OTP" class="w-full max-w-[200px] h-auto">
    </div>
    
    <div class="flex items-center justify-center min-h-screen">
        <div class="container mx-auto px-4 py-8 max-w-2xl">
            <div class="flex justify-center mb-4">
                <img src="/img/mitra-kurir/icon-otp.png" alt="logo OTP" class="w-48 sm:w-56 !important">
            </div>
            <div class="text-center mb-8">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2 sm:mb-3">
                    Konfirmasi OTP
                </h2>
                <p class="text-gray-500 text-xs sm:text-sm mb-8 sm:mb-12 px-4">
                    Silahkan masukan kode verifikasi yang kami kirim kan ke email anda
                </p>
            </div>
            
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form action="{{ url('/mitra-kurir/registrasi/verify-otp') }}" method="POST" class="mt-6 sm:mt-8 space-y-4 sm:space-y-6">
                    {{ csrf_field() }}
                    {{-- @include('components.mitra-kurir.otp.input') --}}
                    <div>
                        <div class="flex justify-center">
                            <div class="flex gap-2 sm:gap-4">
                                <input id="otp1" name="otp1" type="text" maxlength="1"  
                                    class="w-14 sm:w-20 md:w-24 lg:w-28
                                           h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
                                    focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out 
                                    hover:scale-105">
                                <input id="otp2" name="otp2" type="text" maxlength="1"  
                                    class="w-14 sm:w-20 md:w-24 lg:w-28
                                           h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
                                    focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out 
                                    hover:scale-105">
                                <input id="otp3" name="otp3" type="text" maxlength="1"  
                                    class="w-14 sm:w-20 md:w-24 lg:w-28
                                           h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
                                    focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out 
                                    hover:scale-105">
                                <input id="otp4" name="otp4" type="text" maxlength="1"  
                                    class="w-14 sm:w-20 md:w-24 lg:w-28
                                           h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
                                    focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out 
                                    hover:scale-105">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="flex justify-center">
                    <button type="submit" style="color: white !important;" class="flex w-3/4 justify-center rounded-lg bg-gradient-to-r from-green-500 to-green-700 mt-6 px-4 py-2 text-sm font-semibold leading-6 shadow-sm hover:bg-gradient-to-r hover:from-green-600 hover:to-green-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Kirim</button>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="flex w-3/4 justify-center rounded-lg text-green-600 mt-6 px-4 py-2 text-sm font-semibold leading-6 shadow-sm hover:text-white hover:bg-gradient-to-r hover:from-green-600 hover:to-green-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" style="color: #4CAF50; transition: color 0.3s ease; background-color: transparent;"
                    onmouseover="this.style.color='white'" onmouseout="this.style.color='#4CAF50'">Kirim Ulang</button>
                </div>
            </div>

            <!-- Success Modal -->
            <div id="successModal" class="fixed inset-0 flex items-center justify-center z-50" style="display: none;">
                <div class="absolute inset-0 bg-gray-900 bg-opacity-50"></div>
                
                <div class="relative rounded-lg p-8 max-w-sm text-center z-10 shadow-lg" style="background-color: white;">
                    <p class="text-xl font-semibold">Selamat anda sudah berhasil mengunggah dokumen anda</p>
                    <div class="mt-4">
                        <img src="/img/mitra-kurir/icon-pop-up.png" alt="Success Icon" class="mx-auto h-16 w-16">
                    </div>
                    <p class="mt-4">Butuh Waktu 7x24 Jam Untuk Admin Memvalidasi</p>
                    <button onclick="closeModal()" class="mt-6 px-4 py-2 bg-green-700 text-[#FFFFFF] rounded-md">Kembali ke Menu Utama</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
