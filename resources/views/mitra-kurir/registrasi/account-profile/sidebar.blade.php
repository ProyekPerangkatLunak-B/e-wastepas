<div id="sidebar" class="fixed inset-y-0 left-0 w-[22rem] bg-white-100 z-30 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out overflow-y-auto border-r border-gray-200  flex flex-col">
    <!-- Sidebar content -->
    <div class="p-6 flex-grow">
        <!-- Logo section -->
        <div class="flex items-center justify-between mb-10">
            <a href="{{ url('mitra-kurir/penjemputan-sampah/kategori') }}">
            <div class="flex items-center">
                <img src="{{ asset('img/logoEwaste.png') }}" alt="Logo" class="w-12 h-12">
                <h1 class="ml-4 text-xl font-bold text-green-500">E-WastePas</h1>
            </div>
            </a>
            <!-- Close button untuk mobile -->
            <button id="closeSidebar" class="lg:hidden text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="space-y-6">
            <div class="flex items-center mb-4">
                <img src="{{ asset('/img/mitra-kurir/icon-delivery.png') }}" alt="Mitra Kurir Logo" class="w-4 h4 mr-2">
                <h2 class="text-sm font-semibold text-[#60B15B]">Mitra Kurir</h2>
            </div>            
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('mitra-kurir.registrasi.account-profile.profile') }}" class="flex items-center justify-between p-4 text-sm font-semibold text-gray-700 bg-slate-100 border {{ Request::is('mitra-kurir/registrasi/account-profile/profile') ? 'bg-slate-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-2xl">
                        Profile 
                        <span class="text-lg {{ Request::is('mitra-kurir/registrasi/account-profile/profile') ? 'text-green-600' : 'text-gray-400' }}">
                            <svg class="w-[20px] h-[20px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m9 5 7 7-7 7"/>
                            </svg>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mitra-kurir.registrasi.account-profile.security') }}" class="flex items-center justify-between p-4 text-sm font-semibold text-gray-700 border bg-slate-100 {{ Request::is('mitra-kurir/registrasi/account-profile/security') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-2xl">
                        Keamanan
                        <span class="text-lg {{ Request::is('mitra-kurir/registrasi/account-profile/security') ? 'text-green-600' : 'text-gray-400' }}">
                            <svg class="w-[20px] h-[20px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m9 5 7 7-7 7"/>
                            </svg>
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="p-6 border-t border-gray-200">
        <form action="{{ route('mitra-kurir.registrasi.logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center justify-center w-full h-[45px] px-4 py-3 space-x-2 text-sm text-white rounded-2xl bg-red-normal hover:bg-red-400">
                <span class="text-white-normal text-md">Logout</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right text-white-normal" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                </svg>
            </button>
            
        </form>
    </div>
</div>

<!-- Overlay untuk mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden lg:hidden"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const closeSidebarBtn = document.getElementById('closeSidebar');

    function toggleSidebar() {
        sidebar.classList.toggle('-translate-x-full');
        sidebarOverlay.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden');
    }

    mobileMenuBtn.addEventListener('click', toggleSidebar);
    closeSidebarBtn.addEventListener('click', toggleSidebar);
    sidebarOverlay.addEventListener('click', toggleSidebar);

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) { // lg breakpoint
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
});
</script>