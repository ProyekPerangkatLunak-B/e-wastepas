<nav class="bg-white-100 border-b border-gray-200 fixed w-full top-0 z-20">
    <div class="h-[5.5rem] px-4 lg:pl-[22rem] transition-all duration-300 flex items-center justify-between">
        <!-- Toggle button untuk mobile -->
        <button id="mobileMenuBtn" class="lg:hidden text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        
        <!-- Profile section -->
        {{-- <div class="flex items-center ml-auto">
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-700 hidden sm:block">Nama User</span>
                <div class="w-10 h-10 rounded-full overflow-hidden">
                    <img src="{{ asset('/img/mitra-kurir/icon-account.png') }}" alt="Profile" class="w-full h-full object-cover">
                </div>
            </div>
        </div> --}}
    </div>
</nav>