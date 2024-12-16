@extends('manajemen.registrasi.app')

@section('title', 'Data Profil')

@section('content')
<div class="flex min-h-screen bg-gray-50">
    <!-- Sidebar -->
    <aside class="w-1/5 bg-white shadow-md p-6 flex flex-col min-h-screen">
        <!-- Logo -->
        <div class="flex items-center space-x-2 mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo E-WastePas" class="w-12 h-12">
            <h1 class="text-xl font-bold text-green-600">E-WastePas</h1>
        </div>

        <!-- Menu -->
        <nav class="flex-1">
            <div class="flex items-center space-x-2 text-green-600 mb-6">
                <i class="fas fa-cog"></i>
                <span class="font-medium">Pengaturan</span>
            </div>
            <ul>
                <li class="mb-4">
                    <a href="#"
                       class="flex items-center justify-between border border-green-300 rounded-lg px-4 py-2 text-gray-700 hover:bg-green-100 bg-gray-100">
                        <span>Profil</span>
                        <i class="fas fa-chevron-right text-green-500"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 bg-white shadow-md rounded-lg">
        <!-- Header -->
        <header class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
            <h2 class="text-lg font-bold"></h2>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <h4 class="font-medium text-gray-700">Beyonce Kumalasari</h4>
                    <span class="text-sm text-gray-500">Manajemen</span>
                </div>
                <img src="{{ asset('images/profile-placeholder.jpg') }}" alt="User Photo" class="w-10 h-10 rounded-full">
            </div>
        </header>

        <!-- Profile Content -->
        <div class="p-10">
            <h2 class="text-3xl font-bold mb-6">Profil Saya</h2>
            <hr class="border-t-2 border-gray-200 mb-6">

            <div class="flex items-center space-x-10 mb-6">
                <!-- Profile Picture -->
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/profile-placeholder.jpg') }}" alt="Profile Picture" 
                         class="w-32 h-32 rounded-full object-cover">
                    <div class="flex flex-col">
                        <h3 class="text-lg font-bold text-gray-700 mb-1">Profile Picture</h3>
                        <p class="text-sm text-gray-500 mt-2">PNG, JPG, JPEG Under 15MB</p>
                        <button class="px-4 py-2 bg-green-600 font-medium rounded-lg hover:bg-green-700" style="color: white !important;">
                            Upload Foto
                        </button>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="#" method="POST" class="grid grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-gray-700 mb-2">Nama</label>
                    <input type="text" id="name" name="name" 
                           class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Nama Anda">
                </div>
                <div>
                    <label for="phone" class="block text-gray-700 mb-2">No Telepon</label>
                    <input type="text" id="phone" name="phone" 
                           class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Nomor Telepon">
                </div>
                <div>
                    <label for="birthdate" class="block text-gray-700 mb-2">Tanggal Lahir</label>
                    <input type="date" id="birthdate" name="birthdate" 
                           class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label for="address" class="block text-gray-700 mb-2">Alamat</label>
                    <input type="text" id="address" name="address" 
                           class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Alamat Anda">
                </div>
                <div class="col-span-2 flex justify-end mt-4">
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-green-400 to-green-700 font-semibold rounded-lg hover:from-green-500 hover:to-green-600" style="color: white !important;">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
