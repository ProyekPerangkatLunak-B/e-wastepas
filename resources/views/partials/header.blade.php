<header x-data="{ dropdownOpen: false }" class="top-0 right-0 z-0 ps-12 py-2 left-64 ms-[16rem]">
    <div class="container flex items-center justify-end">
        <div class="relative flex items-center space-x-2">
            <!-- Toggler untuk Dropdown (Nama, Role, dan Gambar) -->
            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 focus:outline-none">
                <!-- Text Section -->
                <div class="flex flex-col items-end">
                    <p class="font-bold text-gray-700">{{ $userName }}</p>
                    <span class="text-sm text-gray-500">{{ $userRole }}</span>
                </div>
                <!-- Dummy Profile Picture -->
                <img src="{{ $profileImage }}" alt="Profile Image"
                    class="border border-green-300 rounded-full shadow-sm w-14 h-14">
            </button>

            <!-- Dropdown menu -->
            <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-cloak
                class="absolute right-0 z-10 w-[350px] h-[215px] bg-white-normal shadow-lg mt-72 ring-1 ring-black-normal ring-opacity-5 border border-gray-100 rounded-2xl"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95">

                <div class="py-2">
                    <!-- Profile Link -->
                    {{-- Route ini dibuat Dinamiskan saja karena semua modul pasti menggunakan, jadi gunakan saja kondisi disetiap route dibawah ini, --}}
                    <a href="{{ route('masyarakat.profile') }}"
                        class="flex items-center px-8 py-3 space-x-3 text-sm text-gray-700 border-b border-gray-200 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="text-secondary-normal bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                          </svg>
                        <span class="font-semibold text-md text-black-normal">Profile</span>
                        <svg class="w-[22px] h-[24px] relative left-40 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                    <!-- Settings Link -->
                    <a href="{{ route('masyarakat.ubah-password') }}"
                        class="flex items-center px-8 py-3 space-x-3 text-sm border-b border-gray-200 text-secondary-normal hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                        </svg>
                        <span class="font-semibold text-md text-black-normal">Settings</span>
                        <svg class="w-[22px] h-[24px] relative left-[150px] text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                    <!-- Logout Button -->
                    <form action="{{ route('masyarakat.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center justify-center w-[313px] h-[45px] mx-auto px-4 py-3 mt-4 space-x-2 text-sm text-white rounded-2xl bg-red-normal hover:bg-red-400">
                            <span class="text-white-normal text-md">Logout</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right text-white-normal" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                              </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>