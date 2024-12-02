@extends('manajemen.registrasi.app')

@section('title', 'Login')

@section('content')
    <div class="flex h-screen">
        <!-- Bagian Gambar di Kiri -->
        <div class="hidden md:flex w-1/2 bg-cover bg-center" style="background-image: url('/images/tree-microchip.png');">
            <!-- Gambar Latar Belakang -->
        </div>

        <!-- Bagian Form Login di Kanan -->
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-8">
            <!-- Logo dan Judul -->
            <div class="flex flex-col items-center mb-6">
                <img src="/images/logo.png" alt="Logo E-Wastepas" class="w-28 h-28 mb-4">
            </div>

            <!-- Judul dan Subjudul -->
            <h1 class="text-3xl font-semibold" style="color: #4d8e49;">Selamat Datang di E-wastepas</h1>
            <p class="text-sm mb-8 text-center" style="color: #4d8e49;">masuk ke akun Anda !!</p>

            <!-- Form Login -->
            <form action="{{ route('manajemen.login.submit') }}" method="post" class="w-full max-w-sm space-y-4">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
                    <input value="yayansupirna20@gmail.com" type="email" name="email" id="email"
                        class="mt-1 p-2 border w-full focus:outline-none focus:ring-2" placeholder="Email" required
                        style="border-color: #3c674a; border-radius: 12px; font-size: 1rem;">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password :</label>
                    <div class="relative">
                        <input value="password" type="password" name="password" id="password"
                            class="mt-1 p-2 border w-full focus:outline-none focus:ring-2" placeholder="Password" required
                            style="border-color: #3c674a; border-radius: 12px; font-size: 1rem;">
                        <span class="absolute inset-y-0 right-3 flex items-center text-gray-500 cursor-pointer"
                            onclick="togglePasswordVisibility()">
                            <i id="eyeIcon" class="fas fa-eye"></i> <!-- Icon mata terbuka dari FontAwesome -->
                        </span>
                    </div>
                </div>

                <!-- Link Lupa Password -->
                <div class="flex justify-end mb-4">
                    <a href="/manajemen/forgot-password"
                        class="text-sm text-gray-500 hover:text-green-500 hover:underline">Lupa Password ?</a>
                </div>

                <!-- Tombol Masuk -->
                <button type="submit"
                    class="w-full py-4 mt-8 text-base font-bold rounded-lg focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l shadow-md transition-all">Masuk</button>
            </form>

            <!-- Link Daftar -->
            <p class="mt-6 text-sm text-gray-600">Belum punya akun? <a href="#"
                    style="color: #3c674a; font-weight: 600; hover:underline;">Daftar</a></p>
        </div>
    </div>

    <!-- Tambahkan FontAwesome CDN di atas script toggle jika belum ada di layout utama -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Script untuk toggle visibility password -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash'); // Icon mata tertutup
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye'); // Icon mata terbuka
            }
        }
    </script>
@endsection
