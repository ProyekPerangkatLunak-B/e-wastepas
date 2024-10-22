<div class="fixed inset-y-0 left-0 bg-white border border-solid w-[22rem]">
    <div class="p-6">
        <div class="flex items-center mb-6">
            <img src="#" alt="Logo" class="w-12 h-12">
            <h1 class="ml-4 text-2xl font-bold text-green-500">E-WastePas</h1>
        </div>
        <hr class="mb-6 border-t-2 border-gray-100">
        <nav class="">
            <h2 class="mb-4 text-sm font-bold text-gray-800">Masyarakat</h2>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('penjemputan.kategori') }}" class="flex items-center justify-between p-3 text-sm font-medium text-gray-700 border {{ Request::is('penjemputan-sampah/kategori') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Kategori Sampah Elektronik
                        <span class="text-lg {{ Request::is('penjemputan-sampah/kategori') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('penjemputan.permintaan') }}" class="flex items-center justify-between p-3 text-sm text-gray-700 border {{ Request::is('penjemputan-sampah/permintaan-penjemputan') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        Mengajukan Permintaan Penjemputan
                        <span class="text-lg {{ Request::is('penjemputan-sampah/permintaan-penjemputan') ? 'text-green-600' : 'text-gray-400' }}">&gt;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
