@extends('manajemen.registrasi.app')

@section('title', 'Ganti Password')

@section('content')
    <div class="min-h-screen flex relative">
        <!-- Tombol Kembali -->
        <a href="{{ url()->previous() }}"
            class="absolute top-6 left-6 text-gray-600 inline-flex items-center text-sm font-semibold">
            <span class="border border-gray-300 rounded-full p-2 hover:bg-gray-200 inline-flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </span>
            <span class="ml-2">Kembali</span>
        </a>

        <!-- Bagian Kiri: Form Ganti Password -->
        <div
            class="w-full md:w-1/2 flex flex-col justify-center items-center bg-white p-8 md:pl-20 border-r-2 border-gray-200">
            <div class="w-full max-w-sm bg-white p-10 shadow-xl rounded-lg">
                <!-- Judul dan Deskripsi -->
                <h2 class="text-2xl font-semibold text-center mb-2 whitespace-nowrap">Buat Kata Sandi Baru</h2>
                <div class="text-gray-600 text-center text-sm mb-6 leading-relaxed">
                    <p>Masukkan kata sandi baru Anda di bawah ini.</p>
                    <p>Proses ini akan menyelesaikan pengaturan ulang.</p>
                </div>

                <!-- Form -->
                <form action="{{ route('manajemen.ganti-password.submit') }}" method="POST">
                    @csrf
                    @if ($errors->has('confirm-password'))
                        <span style="color: red;">{{ $errors->first('confirm-password') }}</span>
                    @endif

                    <input type="hidden" name="email" value="{{ request('email') }}">
                    <input type="hidden" name="token" value="{{ request('token') }}">

                    <!-- Input Password Baru -->
                    <div class="mb-4 relative">
                        <label class="block text-sm font-bold text-gray-700 mb-2" for="password">Password Baru</label>
                        <input type="password" id="password" name="password"
                            class="border border-gray-300 rounded-md w-full py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400 pr-10"
                            style="border-radius: 8px;" placeholder="Enter your password" required>
                        <span class="absolute right-3 top-9 cursor-pointer"
                            onclick="togglePassword('password', 'eye-icon-1')">
                            <i id="eye-icon-1" class="fa fa-eye text-gray-400"></i>
                        </span>
                        <p class="mt-1 text-sm text-gray-500">Minimal harus terdiri dari 8 karakter.</p>
                    </div>

                    <!-- Input Konfirmasi Password Baru -->
                    <div class="mb-4 relative">
                        <label class="block text-sm font-bold text-gray-700 mb-2" for="confirm-password">Konfirmasi Password
                            Baru</label>
                        <input type="password" id="confirm-password" name="confirm-password"
                            class="border border-gray-300 rounded-md w-full py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400 pr-10"
                            style="border-radius: 8px;" placeholder="Enter your password" required>
                        <span class="absolute right-3 top-9 cursor-pointer"
                            onclick="togglePassword('confirm-password', 'eye-icon-2')">
                            <i id="eye-icon-2" class="fa fa-eye text-gray-400"></i>
                        </span>
                    </div>

                    <!-- Tombol Simpan -->
                    <div>
                        <button type="submit"
                            class="w-full py-3 mt-4 text-base font-bold rounded bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l text-center shadow-md transition-all duration-300"
                            style="color: white !important;">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bagian Kanan: Gambar Background -->
        <div class="hidden md:block w-1/2 h-screen">
            <div class="h-full bg-cover bg-center"
                style="background-image: url('{{ asset('img/manajemen/registrasi/tree-microchip.png') }}'); background-size: cover;">
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);

            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>

    <!-- Tambahkan Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
