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
                <img src="{{ $profileImage }}" alt="Profile Image" class="border border-green-300 rounded-full shadow-sm w-14 h-14">
            </button>

            {{-- Dropdown menu --}}
            <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                class="absolute right-0 z-10 w-[16rem] origin-top-right bg-white shadow-lg mt-60 ring-1 ring-black ring-opacity-5 focus:outline-none border border-solid border-gray-100 rounded-lg"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-200 scale-200"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-200 scale-200"
                x-transition:leave-end="transform opacity-0 scale-95">
                <div class="py-1">
                    <a href="#" class="block px-4 py-4 text-sm text-gray-700 border-b border-gray-200 hover:bg-gray-100">Dashboard</a>
                    <a href="#" class="block px-4 py-4 text-sm text-gray-700 border-b border-gray-200 hover:bg-gray-100">Pengaturan Akun</a>
                    <form action="#" method="">
                        @csrf
                        <button type="submit" class="block w-full px-8 py-2 mt-2 text-sm text-center text-white bg-red-500 rounded-xl hover:bg-red-700">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
