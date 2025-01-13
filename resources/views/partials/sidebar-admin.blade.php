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
            <h2 class="mb-4 text-sm font-bold text-gray-800 border-b-2 border-green-500"><i
                    class="fa-solid fa-user-lock mx-2" style="color:  #2ecc71;"></i>Admin</h2>
            <ul class="space-y-2">
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
                    <a href="{{ route('admin.datamaster.manajemen.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/datamaster/manajemen') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Manajemen
                        <span
                            class="text-lg {{ Request::is('admin/datamaster/manajemen') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
            </ul>

            <h2 class="mt-8 mx-2 text-sm font-bold text-gray-800 border-b-2 border-green-500"> <i
                    class="fa-solid fa-user-lock mx-2" style="color:  #2ecc71;"></i>Data Master</h2>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.datamaster.dropbox.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/datamaster/master-data/dropbox') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Dropbox
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.datamaster.daerah.index') }}"
                        class="flex items-center p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/datamaster/master-data/daerah') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Daerah
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.datamaster.jenis.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/datamaster/master-data/jenis', 'admin/datamaster/master-data/jenis/create', 'admin/datamaster/master-data/jenis/*/edit') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Jenis
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.datamaster.kategori.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/datamaster/master-data/kategori', 'admin/datamaster/master-data/kategori/create', 'admin/datamaster/master-data/kategori/*/edit') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Kategori
                    </a>
                </li>
            </ul>
            <h2 class="mt-6 mb-6 text-sm font-bold text-gray-800 border-b-2 border-green-500"> <i
                class="fa-solid fa-user-lock mx-2" style="color:  #2ecc71;"></i>Penjemputan Sampah</h2>
            <ul class="space-y-2">

                <li>
                    <a href="{{ route('admin.penjemputan-sampah.permintaan.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/penjemputan/permintaan') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Permintaan Penjemputan Sampah
                        <span
                            class="text-lg {{ Request::is('admin/penjemputan/permintaan') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.penjemputan-sampah.penerimaan.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/penjemputan/penerimaan') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Penerimaan Penjemputan Sampah
                        <span
                            class="text-lg {{ Request::is('admin/penjemputan/penerimaan') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.penjemputan-sampah.tracking.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/penjemputan/tracking') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Tracking Penjemputan
                        <span
                            class="text-lg {{ Request::is('admin/penjemputan/tracking') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.penjemputan-sampah.total.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/penjemputan/total') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Total sampah
                        <span
                            class="text-lg {{ Request::is('admin/penjemputan/total') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.penjemputan-sampah.riwayat.index') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('admin/penjemputan/riwayat') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Riwayat Sampah
                        <span
                            class="text-lg {{ Request::is('admin/penjemputan/riwayat') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>



            </ul>
        </nav>
    </div>
</div>
