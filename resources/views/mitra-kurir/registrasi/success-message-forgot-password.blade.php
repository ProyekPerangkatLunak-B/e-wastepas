@extends('mitra-kurir.registrasi.layout')
@section('title', 'Success Message Forgot Password')
@section('content')
<div class="bg-cover bg-center min-h-screen relative flex items-center justify-center p-4" style="background-image: url('/img/mitra-kurir/bg-otp.png');">
    <div class="absolute top-4 left-4 sm:top-6 sm:left-6">
        <img src="/img/mitra-kurir/logoEwasteText.png" alt="logo OTP" class="w-full max-w-[200px] h-auto">
    </div>
    <div style="background-color: white;" 
         class="rounded-[2rem] shadow-2xl w-full 
                sm:max-w-xl md:max-w-2xl lg:max-w-3xl
                p-8 sm:p-10 md:p-12 
                min-h-[500px] sm:min-h-[600px] md:min-h-[700px] 
                relative flex flex-col justify-center items-center">
        
        <div class="w-full max-w-md mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2 sm:mb-3">
                    Kata sandi berhasil diganti                </h2>
            </div>

            <div class="flex justify-center mb-4">
                <img src="/img/mitra-kurir/icon-pop-up.png" alt="Success Icon" class="w-32 sm:w-40 !important">
            </div>
        </div>

        <p class="text-gray-700 mt-4">Sekarang Anda bisa log in dengan kata sandi baru</p>
                <button onclick="closeModal()" class="mt-6 px-4 py-2 bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] rounded-md hover:bg-gradient-to-r hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out transform hover:scale-105">Kembali ke Menu Utama
        </button>
    </div>
</div>
@endsection
