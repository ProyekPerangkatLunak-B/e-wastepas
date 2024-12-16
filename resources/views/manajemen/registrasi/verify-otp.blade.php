@extends('manajemen.registrasi.app')

@section('title', 'Konfirmasi OTP')

@section('content')
    <!-- Container utama -->
    <div class="min-h-screen bg-white">
        <!-- Header dengan Logo dan Nama -->
        <div class="bg-gradient-to-b from-green-100 to-transparent py-4 px-8">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 mr-3">
                <h2 class="text-green-700 text-xl font-bold">E-WastePas</h2>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="flex flex-col justify-center items-center mt-8">
            <!-- Ikon Amplop -->
            <div class="mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-800" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>

            <!-- Judul -->
            <h1 class="text-3xl font-bold mb-4">Konfirmasi OTP</h1>
            <p class="text-gray-600 text-center mb-8">Silahkan masukan kode verifikasi yang kami kirimkan ke email anda</p>

            <!-- Input OTP -->
            <form action="{{ route('manajemen.registrasi.register') }}" method="POST">
                @csrf
                <div class="flex space-x-4 mb-8">
                    <input type="text" maxlength="1"
                        class="w-16 h-16 text-center text-xl font-semibold border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 shadow-md" />
                    <input type="text" maxlength="1"
                        class="w-16 h-16 text-center text-xl font-semibold border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 shadow-md" />
                    <input type="text" maxlength="1"
                        class="w-16 h-16 text-center text-xl font-semibold border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 shadow-md" />
                    <input type="text" maxlength="1"
                        class="w-16 h-16 text-center text-xl font-semibold border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 shadow-md" />
                    <input type="text" maxlength="1"
                        class="w-16 h-16 text-center text-xl font-semibold border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 shadow-md" />
                </div>

                <!-- Tombol Konfirmasi -->
                <div class="flex justify-center w-full">
                    <button type="button"
                        class="w-full max-w-xs py-3 text-base font-bold text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l rounded-lg shadow-md transition-all">
                        Kirim
                    </button>
                </div>
            </form>

            <!-- Link Kirim Ulang -->
            <p class="mt-4 text-gray-600 text-sm text-center">
                <a href="{{ route('manajemen.registrasi.register') }}"
                    class="text-green-500 font-semibold hover:underline">Kirim ulang</a>
            </p>
        </div>
    </div>
@endsection
