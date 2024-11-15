<header x-data="{ dropdownOpen: false }" class="top-0 right-0 z-0 ps-12 py-2 left-64 ms-[16rem]">
    <div class="container flex items-center justify-end">
        <div class="relative flex items-center space-x-2">
            <!-- Toggler untuk Dropdown (Nama, Role, dan Gambar) -->
            <a @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 focus:outline-none">
                <!-- Text Section -->
                <div class="flex flex-col items-end">
                    <p class="font-bold text-gray-700">{{ $userName }}</p>
                    <span class="text-sm text-gray-500">{{ $userRole }}</span>
                </div>
            </a>
        </div>
    </div>
</header>
