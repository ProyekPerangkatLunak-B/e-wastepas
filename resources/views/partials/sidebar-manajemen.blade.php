<div class="fixed inset-y-0 left-0 bg-white border border-solid w-[22rem] h-screen overflow-y-auto"
    style="background-color: white">
    <div class="p-6">
        <div class="flex items-center mb-6">
            <img src="{{ asset('img/logoEwaste.png') }}" alt="Logo" class="w-12 h-12">
            <a href="{{ route('manajemen.datamaster.dashboard.index') }}">
                <h1 class="ml-4 text-2xl font-bold text-green-500">E-WastePas</h1>
            </a>
        </div>
        <hr class="mb-6 border-t-2 border-gray-100">

        {{-- Manajemen Section --}}
        <nav class="mb-6">
            <div class="flex items-center mb-4">
                <img src="{{ asset('img/manajemen/datamaster/icon/Asset-manajemen.svg') }}" alt="">
                <h2 class="text-sm font-bold text-green-500 ml-2 align-middle">Manajemen</h2>
            </div>
                      
            <ul class="space-y-2">
            <!-- Dashboard -->
                <li>
                    <a href="{{ route('manajemen.datamaster.dashboard.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border bg-gray-100
                            {{ Request::is('manajemen/datamaster/dashboard') ? 'border-green-400 text-black' : 'border-gray-300 hover:bg-gray-200' }} 
                        rounded-lg">
                        Dashboard
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform transform rotate-0"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    </a>
                    
                </li>

                <!-- Total Sampah Terkumpul -->
                <li class="relative">
                    <button
                        class="flex items-center justify-between w-full p-3 text-sm font-medium text-gray-700 border bg-gray-100 rounded-lg
                            {{ Request::is('manajemen/datamaster/per-daerah*') || Request::is('manajemen/datamaster/kategori*') || Request::is('manajemen/datamaster/dropbox*') ? 'border-green-400 text-black' : 'border-gray-300 hover:bg-gray-200' }}"
                        onclick="toggleDropdown(this)">
                        Total Sampah Terkumpul
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform transform rotate-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <ul class="hidden mt-2 space-y-1 bg-white border border-gray-300 rounded-lg shadow">
                        <li>
                            <a href="{{ route('manajemen.datamaster.per-daerah.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-t-lg
                                    {{ Request::is('manajemen/datamaster/per-daerah*') ? 'border-green-400 text-black' : '' }}">
                                Per Daerah
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('manajemen.datamaster.kategori.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200
                                    {{ Request::is('manajemen/datamaster/kategori*') ? 'border-green-400 text-black' : '' }}">
                                Per Kategori
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('manajemen.datamaster.dropbox.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-b-lg
                                    {{ Request::is('manajemen/datamaster/dropbox*') ? 'border-green-400 text-black' : '' }}">
                                Per Dropbox
                            </a>
                        </li>
                    </ul>
                </li>
                  

                <!-- Ranking -->
                <li class="relative">
                    <button
                        class="flex items-center justify-between w-full p-3 text-sm font-medium text-gray-700 border bg-gray-100
                            {{ Request::is('manajemen/datamaster/top-10*') && in_array(Request::query('tab'), ['masyarakat', 'kurir', 'jenis-sampah']) ? 'border-green-400 text-black' : 'border-gray-300 hover:bg-gray-200' }} 
                        rounded-lg"
                        onclick="toggleDropdown(this)">
                        Ranking
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform transform rotate-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <ul class="hidden mt-2 space-y-1 bg-white border border-gray-300 rounded-lg shadow">
                        <li>
                            <a href="{{ url('manajemen/datamaster/top-10?tab=masyarakat') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200  
                                {{ Request::is('manajemen/datamaster/top-10*') && Request::query('tab') === 'masyarakat' ? 'bg-gray-200 text-black' : '' }}">
                            Top 10 Masyarakat
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('manajemen/datamaster/top-10?tab=kurir') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 
                                {{ Request::is('manajemen/datamaster/top-10*') && Request::query('tab') === 'kurir' ? 'bg-gray-200 text-black' : '' }}">
                            Top 10 Kurir
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('manajemen/datamaster/top-10?tab=jenis-sampah') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 
                                {{ Request::is('manajemen/datamaster/top-10*') && Request::query('tab') === 'jenis-sampah' ? 'bg-gray-200 text-black' : '' }}">
                                Top 10 Jenis Sampah
                            </a>
                        </li>
                    </ul>
                </li>
                
        
                <!-- Riwayat -->
                <li>
                    <a href="{{ route('manajemen.datamaster.riwayat.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border bg-gray-100
                            {{ Request::is('manajemen/datamaster/riwayat') ? 'border-green-400 text-black' : 'border-gray-300 hover:bg-gray-200' }} 
                        rounded-lg">
                        Riwayat
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform transform rotate-0"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    </a>
                </li>
                
            </ul>
        </nav>
        
    </div>
</div>

<script>
function toggleDropdown(button) {
    const dropdown = button.nextElementSibling; // Mengakses dropdown menu (<ul>)
    const svgIcon = button.querySelector('svg'); // Mengakses ikon panah dalam tombol
    const isVisible = dropdown.classList.contains('hidden');
    
    // Tutup semua dropdown yang sedang terbuka
    document.querySelectorAll('ul.space-y-1').forEach((menu) => {
        menu.classList.add('hidden');
    });

    // Reset rotasi panah semua tombol dropdown
    document.querySelectorAll('button svg').forEach((icon) => {
        icon.classList.remove('rotate-90');
        icon.classList.add('rotate-0');
    });

    // Tampilkan dropdown saat ini jika belum terlihat
    if (isVisible) {
        dropdown.classList.remove('hidden');
        svgIcon.classList.remove('rotate-0');
        svgIcon.classList.add('rotate-90'); // Panah mengarah ke bawah
    } else {
        dropdown.classList.add('hidden');
        svgIcon.classList.remove('rotate-90');
        svgIcon.classList.add('rotate-0'); // Panah mengarah ke kanan
    }
}



</script>


