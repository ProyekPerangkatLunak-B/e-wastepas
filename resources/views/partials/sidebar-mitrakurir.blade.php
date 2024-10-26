<div class="fixed inset-y-0 left-0 bg-white border border-solid w-[22rem]">
    <div class="p-6">
        <div class="flex items-center mb-6">
            <img src="#" alt="Logo" class="w-12 h-12">
            <h1 class="ml-4 text-2xl font-bold text-green-500">E-WastePas</h1>
        </div>
        <hr class="mb-6 border-t-2 border-gray-100">
        <nav class="">
            <h2 class="mb-4 text-sm font-semibold text-gray-800">Mitra Kurir</h2>
            <ul class="space-y-6">
                <li>
                    <a href="{{ route('mitra-kurir.penjemputan.kategori') }}" class="flex items-center justify-between p-3 text-sm font-semibold text-gray-700 bg-slate-100 border {{ Request::is('mitrakurir/penjemputan-sampah/kategori') ? 'bg-slate-100  border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-2xl">
                        Jenis dan Kategori Sampah 
                        <span class="text-lg {{ Request::is('mitrakurir/penjemputan-sampah/kategori') ? 'text-green-600' : 'text-gray-400' }}">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m9 5 7 7-7 7"/>
                            </svg>
                    </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mitra-kurir.penjemputan.kategori') }}" class="flex items-center justify-between p-3 text-sm font-semibold text-gray-700 border bg-slate-100 {{ Request::is('penjemputan-sampah/permintaan-penjemputan') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-2xl">
                        Permintaan Penjemputan
                        <span class="text-lg {{ Request::is('penjemputan-sampah/permintaan-penjemputan') ? 'text-green-600' : 'text-gray-400' }}">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m9 5 7 7-7 7"/>
                            </svg>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mitra-kurir.penjemputan.kategori') }}" class="flex items-center justify-between p-3 text-sm font-semibold text-gray-700 border bg-slate-100 {{ Request::is('penjemputan-sampah/permintaan-penjemputan') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-2xl">
                        Dropbox
                        <span class="text-lg {{ Request::is('penjemputan-sampah/permintaan-penjemputan') ? 'text-green-600' : 'text-gray-400' }}">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m9 5 7 7-7 7"/>
                            </svg>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mitra-kurir.penjemputan.kategori') }}" class="flex items-center justify-between p-3 text-sm font-semibold text-gray-700 border bg-slate-100 {{ Request::is('penjemputan-sampah/permintaan-penjemputan') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-2xl">
                        Riwayat Penjemputan
                        <span class="text-lg {{ Request::is('penjemputan-sampah/permintaan-penjemputan') ? 'text-green-600' : 'text-gray-400' }}">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m9 5 7 7-7 7"/>
                            </svg>
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
