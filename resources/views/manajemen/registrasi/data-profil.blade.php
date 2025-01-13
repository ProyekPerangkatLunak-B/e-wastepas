@extends('manajemen.registrasi.app')

@section('title', 'Data Profil')

@section('content')
    <div class="flex min-h-screen bg-gray-50 relative w-full">
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

        <aside class="w-1/5 bg-white shadow-md p-6 flex flex-col min-h-screen">
            <div class="flex items-center space-x-2 mb-6">
                <img src="{{ asset('img/manajemen/registrasi/logo.png') }}" alt="Logo E-WastePas" class="w-12 h-12">
                <h1 class="text-xl font-bold text-green-600">E-WastePas</h1>
            </div>
            <nav class="flex-1">
                <ul>
                    <li class="mb-4">
                        <a href=""
                            class="flex items-center justify-between border border-green-300 rounded-lg px-4 py-2 text-gray-700 hover:bg-green-100 
                            {{ request()->routeIs('profile') ? 'bg-gray-100' : '' }}">
                            <span>Profil</span>
                            <i class="fas fa-chevron-right text-green-500"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="flex-1 bg-white shadow-md rounded-lg">
            <header class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
                <h2 class="text-lg font-bold"></h2>
                <div class="relative flex items-center space-x-4">
                    <div class="text-right">
                        <h4 class="font-medium text-gray-700">{{ optional(auth()->user())->name }}</h4>
                        <span class="text-sm text-gray-500">Manajemen</span>
                    </div>
                    @if (auth()->check())
                        <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('img/manajemen/registrasi/profile-placeholder.jpg') }}"
                            alt="User Photo" class="w-10 h-10 rounded-full cursor-pointer" onclick="toggleDropdown()">
                    @endif
                    <div id="dropdownMenu" style="background-color: white !important;"
                        class="origin-top-right absolute right-0 mt-12 w-56 bg-white shadow-lg rounded-lg ring-1 ring-black ring-opacity-5 hidden z-50">
                        <ul class="py-3 space-y-2">
                            <li>
                                <a href=""
                                    class="flex items-center px-5 py-3 text-base font-semibold text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    <i class="fas fa-user-circle text-green-600 mr-4"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('manajemen.password.ubah-password') }}"
                                    class="flex items-center px-5 py-3 text-base font-semibold text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    <i class="fas fa-cog text-green-600 mr-4"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href=""
                                    class="flex items-center px-5 py-3 text-base font-semibold text-red-600 hover:bg-red-100 hover:text-red-800"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt text-red-600 mr-4"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            <div class="p-10">
                <h2 class="text-3xl font-bold mb-6">Profil Saya</h2>
                <hr class="border-t-2 border-gray-200 mb-6">
                <div class="flex items-center space-x-10 mb-6">
                    <div class="flex items-center space-x-4">
                        @if (auth()->check())
                            <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('img/manajemen/registrasi/profile-placeholder.jpg') }}"
                                alt="Profile Picture" class="w-32 h-32 rounded-full object-cover">
                        @endif

                        <div class="flex flex-col">
                            <h3 class="text-lg font-bold text-gray-700 mb-1">Profile Picture</h3>
                            <p class="text-sm text-gray-500 mt-2">PNG, JPG, JPEG Under 15MB</p>

                            {{--  Bagian ini yang dimodifikasi  --}}
                            <div class="mt-4">
                                <input type="file" name="profile_picture" id="profile_picture" class="hidden">
                                <label for="profile_picture"
                                    class="cursor-pointer px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                                    Upload Foto
                                </label>
                            </div>
                            {{--  Akhir dari bagian yang dimodifikasi  --}}

                        </div>
                    </div>
                </div>
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <form action="" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-gray-700 mb-2">Nama</label>
                        <input type="text" id="name" name="name"
                            value="{{ old('name', optional(auth()->user())->name) }}"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Nama Anda">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-gray-700 mb-2">No Telepon</label>
                        <input type="text" id="phone" name="phone"
                            value="{{ old('phone', optional(auth()->user())->phone) }}"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500"
                            placeholder="Nomor Telepon">
                        @error('phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="birthdate" class="block text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" id="birthdate" name="birthdate"
                            value="{{ old('birthdate', optional(auth()->user())->birthdate) }}"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500">
                        @error('birthdate')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="address" class="block text-gray-700 mb-2">Alamat</label>
                        <input type="text" id="address" name="address"
                            value="{{ old('address', optional(auth()->user())->address) }}"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500"
                            placeholder="Alamat Anda">
                        @error('address')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 flex justify-end mt-4">
                        <button type="submit"
                            class="px-6 py-2 bg-gradient-to-r from-green-400 to-green-700 font-semibold rounded-lg hover:from-green-500 hover:to-green-600"
                            style="color: white !important;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertBox = document.getElementById('alert-box');

            if (alertBox) {
                setTimeout(() => {
                    alertBox.remove();
                }, 4000); // Waktu harus sama dengan durasi animasi (3.5s fade-out + buffer 0.5s)
            }
        });

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

        // Script untuk menampilkan nama file yang dipilih (dihapus)
    </script>
@endsection
