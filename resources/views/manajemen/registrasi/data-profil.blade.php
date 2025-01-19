@extends('manajemen.registrasi.app')

@section('title', 'Data Profil')

@section('content')
    <div class="flex min-h-screen bg-gray-50 relative w-full justify-center">

        @if (session('error'))
            <div id="alert-box"
                class="absolute top-0 p-4 px-10 mt-2 text-sm text-red-800 bg-red-100 border border-red-200 rounded-lg animate-fade-in w-fit dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
                role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
                <span id="hs-soft-color-danger-label" class="font-bold">Danger</span>
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div id="alert-box"
                class="absolute top-0 my-10 m-auto px-48 p-4 mt-2 text-sm text-teal-800 bg-teal-100 border border-teal-200 rounded-lg animate-fade-in dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
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
            <nav class="flex-1 flex-col justify-between flex">
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
                <a href="{{ route('manajemen.datamaster.dashboard.index') }}"
                    class="flex items-center gap-5 *:font-bold *:my-auto *:text-lg justify-center border border-red-200 rounded-lg px-1 py-2 text-gray-700 hover:bg-red-100 ">
                    <i class="fas fa-chevron-left text-red-500"></i>
                    <span>Back</span>
                </a>

            </nav>
        </aside>

        <div class="flex-1 bg-white shadow-md rounded-lg">
            <header class="bg-white shadow-md pr-36 py-4">
                @include('partials.header', [
                    'userName' => 'Tidak Diketahui',
                    'userRole' => 'Tidak Diketahui',
                    'profileImage' => 'https://via.placeholder.com/40',
                ])
            </header>

            <div class="p-10">
                <h2 class="text-3xl font-bold mb-6">Profil Saya</h2>
                <hr class="border-t-2 border-gray-200 mb-6">

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('manajemen.registrasi.data-profil.submit') }}" method="POST"
                    enctype="multipart/form-data" class="">
                    @csrf
                    <input type="hidden" name="id_pengguna" value="{{ auth()->user()->id_pengguna }}">


                    <div class="flex items-center space-x-10 mb-6">
                        <div class="flex items-center space-x-4">
                            @if (auth()->check())
                                <img src="{{ auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('img/manajemen/registrasi/profile/no-profile.png') }}"
                                    alt="Profile Picture" class="w-32 h-32 rounded-full object-cover">
                            @endif

                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-700 mb-1">Profile Picture</h3>
                                <p class="text-sm text-gray-500 mt-2">PNG, JPG, JPEG Under 15MB</p>

                                {{-- Bagian ini yang dimodifikasi --}}
                                <div class="mt-4">
                                    <input type="file" name="foto_profil" id="foto_profil" class="hidden">
                                    <label for="foto_profil"
                                        class="cursor-pointer px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                                        Upload Foto
                                    </label>
                                    @error('foto_profil')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Akhir dari bagian yang dimodifikasi --}}

                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">

                        <div>
                            <label for="name" class="block text-gray-700 mb-2">Nama</label>
                            <input type="text" id="name" name="name"
                                value="{{ old('name', optional(auth()->user())->nama) }}"
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500"
                                placeholder="Nama Anda">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="nomor_telepon" class="block text-gray-700 mb-2">No Telepon</label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon"
                                value="{{ old('nomor_telepon', optional(auth()->user())->nomor_telepon) }}"
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500"
                                placeholder="Nomor Telepon">
                            @error('nomor_telepon')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block text-gray-700 mb-2">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', optional(auth()->user())->tanggal_lahir) }}"
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500">
                            @error('tanggal_lahir')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="alamat" class="block text-gray-700 mb-2">Alamat</label>
                            <input type="text" id="alamat" name="alamat"
                                value="{{ old('alamat', optional(auth()->user())->alamat) }}"
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500"
                                placeholder="Alamat Anda">
                            @error('alamat')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2 flex justify-end mt-4">
                            <button type="submit"
                                class="px-6 py-2 bg-gradient-to-r from-green-400 to-green-700 font-semibold rounded-lg hover:from-green-500 hover:to-green-600"
                                style="color: white !important;">Submit</button>
                        </div>
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
