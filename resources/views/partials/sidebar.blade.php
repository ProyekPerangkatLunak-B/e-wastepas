<div class="fixed inset-y-0 left-0 w-[22rem] bg-dark z-0 border-r border-gray-200 overflow-y-auto">
    <div class="p-6">
        <div class="flex items-center mb-6">
            <img src="{{ asset('img/logoEwaste.png') }}" alt="Logo" class="w-12 h-12">
            <a href="{{ route('masyarakat.penjemputan.index') }}">
                <h1 class="ml-4 text-2xl font-bold text-green-500">E-WastePas</h1>
            </a>
        </div>
        <hr class="mb-6 border-t-2 border-gray-200">

        {{-- Masyarakat Section --}}
        <nav>
            <h2 class="mb-4 text-sm font-bold text-gray-800">Masyarakat</h2>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('masyarakat.penjemputan.kategori') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium border rounded-lg {{ Request::is('masyarakat/penjemputan-sampah/kategori') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 text-gray-700 hover:bg-gray-100 hover:text-green-600' }}">
                        Kategori & Jenis Sampah Elektronik
                        <span class="text-lg {{ Request::is('masyarakat/penjemputan-sampah/kategori') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('masyarakat.penjemputan.permintaan') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium border rounded-lg {{ Request::is('masyarakat/penjemputan-sampah/permintaan-penjemputan') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 text-gray-700 hover:bg-gray-100 hover:text-green-600' }}">
                        Mengajukan Permintaan Penjemputan
                        <span class="text-lg {{ Request::is('masyarakat/penjemputan-sampah/permintaan-penjemputan') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('masyarakat.penjemputan.melacak') }}"
                        class="flex items-center justify-between p-3 text-sm font-medium border rounded-lg {{ Request::is('masyarakat/penjemputan-sampah/melacak-penjemputan') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 text-gray-700 hover:bg-gray-100 hover:text-green-600' }}">
                        Melacak Penjemputan
                        <span class="text-lg {{ Request::is('masyarakat/penjemputan-sampah/melacak-penjemputan') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
