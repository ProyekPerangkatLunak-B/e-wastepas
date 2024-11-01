<div class="fixed inset-y-0 left-0 bg-white border border-solid w-[22rem] h-screen overflow-y-auto"
    style="background-color: white">
    <div class="p-6">
        <div class="flex items-center mb-6">
            <img src="{{ asset('img/logoEwaste.png') }}" alt="Logo" class="w-12 h-12">
            <a href="{{ route('masyarakat.penjemputan.index') }}">
                <h1 class="ml-4 text-2xl font-bold text-green-500">E-WastePas</h1>
            </a>
        </div>
        <hr class="mb-6 border-t-2 border-gray-100">

        {{-- Admin Section --}}
        <nav class="mb-6">
            <h2 class="mb-4 text-sm font-bold text-gray-800">Admin</h2>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.datamaster.dashboard.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/datamaster/dashboard') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Dashboard
                        <span
                            class="text-lg {{ Request::is('admin/datamaster/dashboard') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.datamaster.masyarakat.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/datamaster/masyarakat') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Masyarakat
                        <span
                            class="text-lg {{ Request::is('admin/datamaster/masyarakat') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.datamaster.kurir.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/datamaster/kurir') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Kurir
                        <span
                            class="text-lg {{ Request::is('admin/datamaster/kurir') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
                <li>
                    <button onclick="toggleDropdown()"
                        class="flex items-center justify-between w-full p-3 text-sm font-medium text-gray-700 border border-gray-300 hover:bg-gray-200 rounded-lg">
                        Data Master
                        <span id="dropdown-icon" class="text-lg text-gray-400">&gt;</span>
                    </button>
                    <!-- Dropdown Menu -->
                    <ul id="dropdown-menu"
                        class="mt-2 space-y-2 pl-4 {{ Request::is('admin/datamaster/master-data/dropbox', 'admin/datamaster/master-data/wilayah', 'admin/datamaster/master-data/kategori', 'admin/datamaster/master-data/jenis') ? '' : 'hidden' }}">
                        <li>
                            <a href="{{ route('admin.datamaster.dropbox.index') }}"
                                class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/datamaster/master-data/dropbox') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                                Dropbox
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.datamaster.daerah.index') }}"
                                class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/datamaster/master-data/daerah') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                                Daerah
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.datamaster.jenis.index') }}"
                                class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/datamaster/master-data/jenis') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                                Jenis
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.datamaster.kategori.index') }}"
                                class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/datamaster/master-data/kategori') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                                Kategori
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script>
    let dropdownOpen =
        {{ Request::is('datamaster/master-data/dropbox', 'datamaster/master-data/wilayah', 'datamaster/master-data/kategori', 'datamaster/master-data/jenis') ? 'true' : 'false' }};

    function toggleDropdown() {
        const menu = document.getElementById('dropdown-menu');
        const icon = document.getElementById('dropdown-icon');

        dropdownOpen = !dropdownOpen;
        if (dropdownOpen) {
            menu.classList.remove('hidden');
            icon.textContent = '⌄'; // Change icon to down arrow
        } else {
            menu.classList.add('hidden');
            icon.textContent = '>'; // Change icon to right arrow
        }
    }
</script>
