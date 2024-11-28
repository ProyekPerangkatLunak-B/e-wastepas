@extends('manajemen.registrasi.app')

@section('title', 'Data Profil')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-1/5 bg-white p-6 shadow-md">
        <div class="flex items-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo E-WastePas" class="w-12 h-12">
            <h1 class="ml-4 text-2xl font-bold text-green-700">E-WastePas</h1>
        </div>
        <nav>
            <ul>
                <li class="mb-4">
                    <div class="flex justify-between items-center border border-green-600 rounded-lg p-2">
                        <span class="text-black font-semibold">Profile</span> <!-- Warna teks diubah menjadi hitam -->
                        <button class="text-green-600">
                            <i class="fas fa-chevron-right"></i> <!-- Icon panah ke kanan -->
                        </button>
                    </div>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-10 bg-white shadow-md rounded-lg relative">
        <!-- Foto profil di kanan atas -->
        <div class="absolute top-4 right-10 flex items-center">
            <span class="mr-2 font-medium text-gray-700">Beyonce Kumalasari</span>
            <img src="{{ asset('images/profile-placeholder.jpg') }}" alt="User Photo" class="w-10 h-10 rounded-full object-cover">
        </div>

        <h2 class="text-3xl font-bold mb-4">Profil Saya</h2>
        <hr class="border-t-2 border-black mb-8"> <!-- Garis hitam yang menonjol -->

        <div class="flex items-center space-x-6 mb-10">
            <img src="{{ asset('images/profile-placeholder.jpg') }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover">
            <div>
                <p class="text-lg font-semibold">Profile Picture</p>
                <p class="text-sm text-gray-500">PNG, JPG, JPEG Under 15MB</p>
                <button class="mt-2 px-4 py-2 text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l rounded-lg">Upload Foto</button> <!-- Sesuaikan warna -->
            </div>
        </div>

        <!-- Form Profil -->
        <form action="#" method="POST" class="grid grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-gray-700 mb-2">Nama</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Nama Anda">
            </div>
            <div>
                <label for="phone" class="block text-gray-700 mb-2">No Telepon</label>
                <input type="text" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Nomor Telepon">
            </div>
            <div>
                <label for="birthdate" class="block text-gray-700 mb-2">Tanggal Lahir</label>
                <input type="date" id="birthdate" name="birthdate" class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="address" class="block text-gray-700 mb-2">Alamat</label>
                <input type="text" id="address" name="address" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Alamat Anda">
            </div>
            <div class="col-span-2 flex justify-end mt-4">
                <button type="submit" class="px-6 py-2 text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l rounded-lg shadow-md">Submit</button> <!-- Warna sesuai -->
            </div>
        </form>
    </div>
</div>
@endsection
