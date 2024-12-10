<header x-data="{ dropdownOpen: false }" class="top-0 right-0 z-0 ps-12 py-2 left-64 ms-[16rem]">
    <div class="container flex items-center justify-end">
        <div class="relative flex items-center space-x-2 cursor-pointer">
            <!-- Toggler untuk Dropdown (Nama, Role, dan Gambar) -->
            <a @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 focus:outline-none">
                <!-- Text Section -->
                <div class="flex flex-col items-end">
                    <p class="font-bold text-gray-700">{{ $userName }}</p>
                    <span class="text-sm text-gray-500">{{ $userRole }}</span>
                </div>
            </a>

            <!-- Dropdown menu -->
            <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-cloak
                class="absolute right-0 z-20 w-[350px] bg-white shadow-xl mt-2 ring-1 ring-black ring-opacity-5 border border-gray-100 rounded-lg transition-all ease-out duration-300"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95" style="top: 100%;">

                <div class="py-4 px-6">
                    <!-- Logout Button -->
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center justify-center w-full h-12 space-x-3 text-sm text-white rounded-l transition duration-200 ease-in-out">
                            <span class="font-medium">Logout</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-box-arrow-right text-white" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
