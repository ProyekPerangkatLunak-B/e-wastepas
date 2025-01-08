@extends('manajemen.registrasi.app')

@section('title', 'Data Total Sampah')

@section('content')
<div class="flex min-h-screen bg-gray-50">
    <!-- Sidebar -->
    <aside class="w-1/5 bg-white shadow-md p-6 flex flex-col min-h-screen">
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
                        <span>Dashboard</span>
                        <i class="fas fa-chevron-right text-green-500"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1">
        <!-- Header dengan Foto Profil -->
        <header class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
            <h2 class="text-lg font-bold"></h2>
            <div class="relative flex items-center space-x-4">
                <div class="text-right">
                    <h4 class="font-medium text-gray-700">Beyonce Kumalasari</h4>
                    <span class="text-sm text-gray-500">Manajemen</span>
                </div>
                <img src="{{ asset('img/manajemen/registrasi/profile-placeholder.jpg') }}" alt="User Photo" class="w-10 h-10 rounded-full cursor-pointer" onclick="toggleDropdown()">
                <!-- Dropdown -->
                <div id="dropdownMenu" style="background-color: white !important;" class="origin-top-right absolute right-0 mt-12 w-48 shadow-lg rounded-lg ring-1 ring-black ring-opacity-5 hidden z-50">
                    <ul class="py-2">
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

        <!-- Content -->
        <div class="p-6">
            <!-- Header Halaman -->
            <div class="flex justify-between items-center mb-8">
                <!-- Judul -->
                <div>
                    <h1 class="text-2xl font-bold">Total Sampah Per Kategori</h1>
                    <p class="text-gray-600">Daftar kategori sampah elektronik dan total poin terkumpul</p>
                </div>
                <!-- Pencarian dan Filter -->
                <div class="flex items-center space-x-3">
                    <!-- Input Pencarian -->
                    <div class="relative flex items-center bg-gray-100 border rounded-full px-3 py-2 shadow-sm w-56">
                        <i class="fas fa-search text-gray-500 mr-2"></i>
                        <input type="text" placeholder="Cari ..." class="bg-transparent focus:outline-none text-sm text-gray-700 placeholder-gray-500 w-full">
                    </div>
                    <!-- Tombol Filter -->
                    <button class="relative flex items-center bg-gray-100 border rounded-full px-3 py-2 shadow-sm w-48 hover:bg-gray-200">
                        <span class="text-sm text-gray-700">Filter</span>
                        <i class="fas fa-chevron-down text-gray-500 absolute right-3"></i>
                    </button>
                </div>
            </div>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Iterasi Kategori -->
                @foreach ([ 
                    ['name' => 'Peralatan Besar', 'image' => 'Peralatan-Besar.png', 'description' => 'Seperti mesin cuci, pengering pakaian, mesin pencuci piring, kompor listrik, mesin cetak besar, mesin fotokopi, dan panel fotovoltaik.'],
                    ['name' => 'Peralatan Kecil', 'image' => 'Peralatan-Kecil.png', 'description' => 'Seperti penyedot debu, microwave, peralatan ventilasi, pemanggang roti, ketel listrik, alat cukur elektrik, timbangan, kalkulator, dan alat kontrol.'],
                    ['name' => 'Peralatan Pertukaran Suhu', 'image' => 'Peralatan-Suhu.png', 'description' => 'Peralatan yang sering disebut sebagai peralatan pendingin dan pembekuan, seperti kulkas, freezer, AC, dan pompa panas.'],
                    ['name' => 'Peralatan IT dan Telekomunikasi Kecil', 'image' => 'Peralatan-it.png', 'description' => 'Seperti ponsel, perangkat GPS, kalkulator saku, router, komputer pribadi, printer, dan telepon.'],
                    ['name' => 'Layar dan Monitor', 'image' => 'Layar-Monitor.png', 'description' => 'Peralatan seperti televisi, monitor, laptop, notebook, dan tablet.'],
                    ['name' => 'Lampu', 'image' => 'lampu.png', 'description' => 'Lampu fluoresen, lampu dengan intensitas tinggi, dan lampu LED.']
                ] as $category)
                <div class="bg-white shadow-lg rounded-lg flex flex-col h-full">
                    <img src="{{ asset('img/manajemen/registrasi/' . $category['image']) }}" alt="{{ $category['name'] }}" class="w-full h-40 object-cover">
                    <div class="flex flex-col justify-between flex-grow p-4">
                        <div>
                            <h3 class="text-lg font-bold mb-2">{{ $category['name'] }}</h3>
                            <p class="text-sm text-gray-600 mb-4">{{ $category['description'] }}</p>
                        </div>
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-sm text-gray-600 flex items-center">
                                    <i class="fas fa-recycle mr-1 text-green-500"></i> 30.000 Kg
                                </span>
                                <span class="text-sm text-gray-600 flex items-center">
                                    <i class="fas fa-trophy mr-1 text-yellow-500"></i> 19.374 Poin
                                </span>
                            </div>
                            <button class="w-full py-2 bg-green-600 rounded-lg hover:bg-green-700" style="color: white;">Detail</button>
                        </div>
                    </div>
                </div>
                @endforeach
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
