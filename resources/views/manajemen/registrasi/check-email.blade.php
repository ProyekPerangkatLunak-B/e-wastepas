@extends('manajemen.registrasi.app') <!-- Menggunakan layout utama jika ada -->

@section('content')
<div class="min-h-screen flex">
    <!-- Bagian Kiri: Konfirmasi Check Email -->
    <div class="w-full md:w-1/2 flex flex-col justify-center items-center bg-white p-8 md:pl-20 space-y-6">
        <!-- Kotak hijau kebiruan lebih kecil dengan amplop besar dan sudut lebih melengkung -->
        <div class="bg-[#009688] rounded-2xl p-2 mb-6 shadow-md flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28 text-white drop-shadow-lg" viewBox="0 0 24 24" fill="currentColor">
                <!-- Amplop dengan bayangan lembut -->
                <rect x="3" y="4" width="18" height="16" rx="2" ry="2" fill="white" />
                <path d="M4 6l8 6 8-6" stroke="#009688" stroke-width="2" fill="none" />
                <path d="M4 8l8 6 8-6" fill="white" opacity="0.8" />
            </svg>
        </div>
        
        <!-- Judul dan Deskripsi dengan font yang lebih ringan -->
        <h2 class="text-3xl font-semibold text-center mb-2">Check your email</h2>
        <p class="text-gray-600 text-center text-base max-w-md px-4">
            We’ve sent a password reset link to your email. Please check your inbox.
        </p>
        
        <!-- Tombol Buka Email yang lebih persegi panjang dengan warna hijau -->
        <a href="https://mail.google.com" target="_blank" class="w-full max-w-xs bg-green-600 hover:bg-green-700 text-white text-center font-bold py-2 px-8 rounded-lg mb-4 shadow-md transition-all">
            Open Gmail
        </a>
        
        <!-- Link untuk Resend Email -->
        <p class="text-center text-gray-600 text-sm">
            Didn’t receive the email? 
            <a href="{{ route('password.request') }}" class="text-[#009688] font-semibold hover:underline">Resend</a>
        </p>
    </div>

    <!-- Bagian Kanan: Gambar Latar -->
    <div class="hidden md:block md:w-1/2 bg-cover bg-center" style="background-image: url('/images/tree-microchip.png'); min-height: 100vh;">
        <!-- Background image sesuai path yang diinginkan -->
    </div>
</div>
@endsection
