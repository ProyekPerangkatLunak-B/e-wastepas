@extends('manajemen.registrasi.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="min-h-screen bg-white text-gray-900 flex justify-center item-center relative">
        @if (session('error'))
            {{-- FE GAK GUNA --}}
            <div id="alert-box"
                class="absolute top-0 p-4 px-10 mt-2 text-sm text-red-800 bg-red-100 border border-red-200 rounded-lg animate-fade-in w-fit dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
                role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
                <span id="hs-soft-color-danger-label" class="font-bold">Danger</span>
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            {{-- FE GAK GUNA --}}
            <div id="alert-box"
                class="p-4 mt-2 text-sm text-teal-800 bg-teal-100 border border-teal-200 rounded-lg animate-fade-in dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
                role="alert" tabindex="-1" aria-labelledby="hs-soft-color-success-label">
                <span id="hs-soft-color-success-label" class="font-bold">Success</span>
                {{ session('success') }}
            </div>
        @endif
        <!-- Tombol Kembali -->
        <a href="{{ url()->previous() }}"
            class="absolute top-6 left-6 text-gray-600 inline-flex items-center text-sm font-semibold">
            <span class="border border-gray-300 rounded-full p-2 hover:bg-gray-200 inline-flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </span>
            <span class="ml-2">Kembali</span>
        </a>

        <!-- Bagian Kiri: Form Forgot Password -->
        <div
            class="w-full md:w-1/2 flex flex-col justify-center items-center bg-white p-8 md:pl-20 border-r-2 border-gray-200">
            <div class="w-full max-w-sm bg-white p-10 shadow-xl rounded-lg">
                <!-- Judul dan Deskripsi -->
                <h2 class="text-3xl font-extrabold text-center mb-4">Lupa Kata Sandi</h2>
                <p class="text-gray-600 text-center text-base mb-4">Masukkan alamat email Anda di bawah ini, dan kami akan
                    mengirimkan otp untuk mengatur ulang kata sandi Anda.</p>

                <!-- Form -->
                <form action="{{ route('manajemen.password.email') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2" for="email">Email</label>
                        <input type="email" id="email" name="email"
                            class="border border-gray-300 rounded-full w-full py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400"
                            placeholder="Masukkan alamat email Anda" required>
                        @error('email')
                            <span class="text-red-600 text-sm mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full py-4 mt-4 text-base font-bold rounded-lg text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l text-center shadow-md transition-all">
                            Masuk
                        </button>
                    </div>
                </form>

                <!-- Informasi tambahan -->
            </div>
        </div>

        <!-- Bagian Kanan: Gambar Ilustrasi -->
        <div class="hidden md:block w-1/2 h-screen">
            <div class="h-full bg-cover bg-center"
                style="background-image: url('{{ asset('img/manajemen/registrasi/tree-microchip.png') }}'); background-size: cover;">
                <!-- Background gambar ilustrasi -->
            </div>
        </div>
    </div>
@endsection
