@extends('manajemen.registrasi.app')

@section('title', 'Ubah Password')

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
            <nav class="flex-1 flex-col justify-between flex">
                <div class="">
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
                </div>
                <a href="{{ route('manajemen.datamaster.dashboard.index') }}"
                    class="flex items-center gap-5 *:font-bold *:my-auto *:text-lg justify-center border border-red-200 rounded-lg px-1 py-2 text-gray-700 hover:bg-red-100 ">
                    <i class="fas fa-chevron-left text-red-500"></i>
                    <span>Back</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow-md pr-36 py-4">
                @include('partials.header', [
                    'userName' => 'Tidak Diketahui',
                    'userRole' => 'Tidak Diketahui',
                    'profileImage' => 'https://via.placeholder.com/40',
                ])
            </header>

            <!-- Form -->
            <div class="flex flex-1 justify-center items-center p-4">
                <div style="background-color: white;"
                    class="rounded-[2rem] shadow-2xl w-full
                        sm:max-w-2xl md:max-w-3xl lg:max-w-4xl
                        p-8 sm:p-10 md:p-12 
                        min-h-[600px] sm:min-h-[700px] md:min-h-[800px] 
                        relative flex flex-col justify-center items-center">

                    @if (session('error'))
                        <div id="alert-box"
                            class="absolute top-10 p-4 px-10 mt-2 text-sm text-red-800 bg-red-100 border border-red-200 rounded-lg animate-fade-in w-fit dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
                            role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
                            <span id="hs-soft-color-danger-label" class="font-bold">Danger</span>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div id="alert-box"
                            class="absolute top-10 my-10 m-auto px-10 p-4 mt-2 text-sm text-teal-800 bg-teal-100 border border-teal-200 rounded-lg animate-fade-in dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
                            role="alert" tabindex="-1" aria-labelledby="hs-soft-color-success-label">
                            <span id="hs-soft-color-success-label" class="font-bold">Success</span>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('manajemen.password.ubah-password.submit') }}"
                        class="w-full max-w-md mx-auto">
                        @csrf
                        <input type="hidden" name="id_pengguna" value="{{ auth()->user()->id_pengguna }}">

                        <div class="text-center mb-8">
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2 sm:mb-3">
                                Ubah Password
                            </h2>
                        </div>

                        <!-- Input Password Lama -->
                        <div class="mb-4 relative">
                            <label class="block text-sm font-bold text-gray-700 mb-2" for="old-password">Password
                                Lama</label>
                            <input type="password" id="old-password" name="old-password"
                                class="border border-gray-300 rounded-md w-full py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400 pr-10"
                                placeholder="Masukkan Password Lama" required>
                            <span class="absolute right-3 top-9 cursor-pointer"
                                onclick="togglePassword('old-password', 'eye-icon-0')">
                                <i id="eye-icon-0" class="fa fa-eye text-gray-400"></i>
                            </span>
                            @error('old-password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Input Password Baru -->
                        <div class="mb-4 relative">
                            <label class="block text-sm font-bold text-gray-700 mb-2" for="password">Password
                                Baru</label>
                            <input type="password" id="password" name="password"
                                class="border border-gray-300 rounded-md w-full py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400 pr-10"
                                placeholder="Masukkan Password Baru" required>
                            <span class="absolute right-3 top-9 cursor-pointer"
                                onclick="togglePassword('password', 'eye-icon-1')">
                                <i id="eye-icon-1" class="fa fa-eye text-gray-400"></i>
                            </span>
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            {{-- <p class="mt-1 text-sm text-gray-500">Minimal harus terdiri dari 8 karakter.</p> --}}
                        </div>

                        <!-- Input Konfirmasi Password Baru -->
                        <div class="mb-4 relative">
                            <label class="block text-sm font-bold text-gray-700 mb-2" for="confirm-password">Konfirmasi
                                Password Baru</label>
                            <input type="password" id="confirm-password" name="confirm-password"
                                class="border border-gray-300 rounded-md w-full py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400 pr-10"
                                placeholder="Konfirmasi Password Baru" required>
                            <span class="absolute right-3 top-9 cursor-pointer"
                                onclick="togglePassword('confirm-password', 'eye-icon-2')">
                                <i id="eye-icon-2" class="fa fa-eye text-gray-400"></i>
                            </span>
                            @error('confirm-password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" onclick="showVerificationModal()"
                            class="w-full bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] py-2 px-4 rounded-md 
                                   hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out 
                                   transform hover:scale-105 text-sm sm:text-base">
                            Kirim
                        </button>
                    </form>
                </div>
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

        function showVerificationModal() {
            document.querySelector('[name="password-verification-modal"]').style.display = 'flex';
        }

        function closeVerificationModal() {
            document.querySelector('[name="password-verification-modal"]').style.display = 'none';
        }
    </script>

@endsection
