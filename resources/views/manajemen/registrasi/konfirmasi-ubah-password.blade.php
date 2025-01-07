@extends('manajemen.registrasi.app')

@section('title', 'Konfirmasi Ubah Password')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-1/5 shadow-md p-6 flex flex-col" style="background-color: white !important;">
        <!-- Logo -->
        <div class="flex items-center space-x-2 mb-6">
            <img src="{{ asset('img/manajemen/registrasi/logo.png') }}" alt="Logo E-WastePas" class="w-12 h-12">
            <h1 class="text-xl font-bold text-green-600">E-WastePas</h1>
        </div>

        <!-- Menu -->
        <nav class="flex-1">
            <div class="flex items-center space-x-2 text-green-600 mb-6">
                <i class="fas fa-users"></i>
                <span class="font-medium">Manajemen</span>
            </div>
            <ul>
                <li class="mb-4">
                    <a href="#"
                       class="flex items-center justify-between border border-green-300 rounded-lg px-4 py-2 text-gray-700 hover:bg-green-100 bg-gray-100">
                        <span>Pengaturan akun</span>
                        <i class="fas fa-chevron-right text-green-500"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="shadow-md px-6 py-4 flex justify-between items-center" style="background-color: white !important;">
            <h2 class="text-lg font-bold"></h2>
            <div class="relative flex items-center space-x-4">
                <div class="text-right">
                    <h4 class="font-medium text-gray-700">Beyonce Kumalasari</h4>
                    <span class="text-sm text-gray-500">Manajemen</span>
                </div>
                <img src="{{ asset('img/manajemen/registrasi/profile-placeholder.jpg') }}" alt="User Photo" class="w-10 h-10 rounded-full cursor-pointer" onclick="toggleDropdown()">
                <!-- Dropdown -->
                <div id="dropdownMenu" style="background-color: white !important;" class="origin-top-right absolute right-0 mt-12 w-56 shadow-lg rounded-lg ring-1 ring-black ring-opacity-5 hidden z-50">
                    <ul class="py-2 space-y-2">
                        <li>
                            <a href="/profile" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                <i class="fas fa-user-circle text-green-600 mr-3"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a href="/settings" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                <i class="fas fa-cog text-green-600 mr-3"></i> Settings
                            </a>
                        </li>
                        <li>
                            <a href="/logout" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-100 hover:text-red-800">
                                <i class="fas fa-sign-out-alt text-red-600 mr-3"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Form -->
        <div class="flex flex-1 justify-center items-center p-4">
            <div style="background-color: white;" 
                 class="rounded-[2rem] shadow-2xl w-full justify-center
                        sm:max-w-2xl md:max-w-3xl lg:max-w-4xl
                        p-8 sm:p-10 md:p-12 
                        min-h-[600px] sm:min-h-[700px] md:min-h-[800px] 
                        relative flex flex-col justify-center items-center">

                <!-- Content -->
                <div class="flex flex-col items-center justify-center bg-white p-6 sm:p-10 md:p-12 rounded-[2rem] shadow-2xl w-full sm:max-w-lg md:max-w-xl lg:max-w-2xl mx-auto">
                    <!-- Judul -->
                    <h1 class="text-2xl sm:text-3xl font-bold mb-6 text-center">
                        Konfirmasi OTP Berhasil
                    </h1>

                    <!-- Gambar Ikon Sukses -->
                    <img src="{{ asset('img/manajemen/registrasi/OtpSucces.png') }}" alt="OTP Success" class="w-28 h-28 sm:w-32 sm:h-32 mx-auto mb-6">

                    <!-- Pesan -->
                    <p class="text-gray-700 text-center mb-8 sm:mb-10 text-sm sm:text-base">
                        Selamat Anda Berhasil Melakukan Konfirmasi OTP!!
                    </p>

                    <!-- Tombol Kembali -->
                    <button 
                        type="button" 
                        class="w-3/4 sm:w-2/3 py-3 text-base sm:text-lg font-bold text-white bg-gradient-to-r from-lime-500 to-green-600 hover:from-green-600 hover:to-green-700 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105">
                        KEMBALI
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleDropdown() {
        const dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.classList.toggle("hidden");
    }

    document.addEventListener("click", function(event) {
        const dropdownMenu = document.getElementById("dropdownMenu");
        const dropdownButton = document.querySelector("img[onclick='toggleDropdown()']");
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });
</script>
@endsection
