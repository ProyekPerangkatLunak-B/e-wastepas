@extends('mitra-kurir.registrasi.layout')
@section('title', 'Forgot Password Email Link')
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
                   Periksa Email Anda 
                </h2>
            </div>

            <div class="flex justify-center mb-4">
                <img src="/img/mitra-kurir/email-sent-icon.png" alt="Success Icon" class="w-36 sm:w-40 !important">
            </div>
        </div>

        <p class="text-center text-gray-700 mt-4">Kami akan mengirimkan tautan pengaturan ulang kata sandi ke email Anda. Silakan periksa kotak masuk Anda</p>
        @include('components.mitra-kurir.auth.auth-link', [
                'message' => "Tidak menerima email?",
                'linkUrl' => route('mitra-kurir.registrasi.register'), // rute sementara
                'linkText' => 'Kirim Ulang'
        ])   
    </div>
</div>
@endsection
