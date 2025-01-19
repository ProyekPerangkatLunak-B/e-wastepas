<div class="fixed inset-y-0 left-0 w-[22rem] bg-dark z-0 border-r border-gray-200 overflow-y-auto">
    <div class="p-6">
        <a href="{{ url('/') }}">
        <div class="flex items-center mb-6">
            <img src="{{ asset('img/logoEwaste.png') }}" alt="Logo" class="w-12 h-12">
            <h1 class="ml-4 text-2xl font-bold text-green-500">E-WastePas</h1>
        </div>
        </a>
        <hr class="mb-6 border-t-2 border-gray-100">

        <nav class="">
            <div class="flex mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M3 13.5L2.25 12H7.5L6.9 10.5H2L1.25 9H9.05L8.45 7.5H1.11L0.25 6H4C4 5.46957 4.21071 4.96086 4.58579 4.58579C4.96086 4.21071 5.46957 4 6 4H18V8H21L24 12V17H22C22 17.7956 21.6839 18.5587 21.1213 19.1213C20.5587 19.6839 19.7956 20 19 20C18.2044 20 17.4413 19.6839 16.8787 19.1213C16.3161 18.5587 16 17.7956 16 17H12C12 17.7956 11.6839 18.5587 11.1213 19.1213C10.5587 19.6839 9.79565 20 9 20C8.20435 20 7.44129 19.6839 6.87868 19.1213C6.31607 18.5587 6 17.7956 6 17H4V13.5H3ZM19 18.5C19.3978 18.5 19.7794 18.342 20.0607 18.0607C20.342 17.7794 20.5 17.3978 20.5 17C20.5 16.6022 20.342 16.2206 20.0607 15.9393C19.7794 15.658 19.3978 15.5 19 15.5C18.6022 15.5 18.2206 15.658 17.9393 15.9393C17.658 16.2206 17.5 16.6022 17.5 17C17.5 17.3978 17.658 17.7794 17.9393 18.0607C18.2206 18.342 18.6022 18.5 19 18.5ZM20.5 9.5H18V12H22.46L20.5 9.5ZM9 18.5C9.39782 18.5 9.77936 18.342 10.0607 18.0607C10.342 17.7794 10.5 17.3978 10.5 17C10.5 16.6022 10.342 16.2206 10.0607 15.9393C9.77936 15.658 9.39782 15.5 9 15.5C8.60218 15.5 8.22064 15.658 7.93934 15.9393C7.65804 16.2206 7.5 16.6022 7.5 17C7.5 17.3978 7.65804 17.7794 7.93934 18.0607C8.22064 18.342 8.60218 18.5 9 18.5Z" fill="#60B15B"/>
                  </svg>
                <h2 class="mb-4 ml-2 font-bold text-md text-secondary-normal">Mitra Kurir</h2>
            </div>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('mitra-kurir.penjemputan.kategori') }}" class="flex items-center justify-between p-3 text-sm font-semibold text-gray-700 bg-slate-100 border {{ Request::is('mitra-kurir/penjemputan-sampah/kategori') ? 'bg-slate-100  border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-2xl">
                        Kategori Sampah
                        <span class="text-lg {{ Request::is('mitra-kurir/penjemputan-sampah/kategori') ? 'text-green-600' : 'text-gray-400' }}">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m9 5 7 7-7 7"/>
                            </svg>
                    </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mitra-kurir.penjemputan.permintaan') }}" class="flex items-center justify-between p-3 text-sm font-semibold text-gray-700 border bg-slate-100 {{ Request::is('mitra-kurir/penjemputan-sampah/permintaan-penjemputan') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-2xl">
                        Permintaan Penjemputan
                        <span class="text-lg {{ Request::is('mitra-kurir/penjemputan-sampah/permintaan-penjemputan') ? 'text-green-600' : 'text-gray-400' }}">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m9 5 7 7-7 7"/>
                            </svg>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mitra-kurir.penjemputan.dropbox') }}" class="flex items-center justify-between p-3 text-sm font-semibold text-gray-700 border bg-slate-100 {{ Request::is('mitra-kurir/penjemputan-sampah/dropbox') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-2xl">
                        Dropbox
                        <span class="text-lg {{ Request::is('mitra-kurir/penjemputan-sampah/dropbox') ? 'text-green-600' : 'text-gray-400' }}">
                            <svg class="w-[20px] h-[20px] text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m9 5 7 7-7 7"/>
                            </svg>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mitra-kurir.penjemputan.riwayat-penjemputan') }}" class="flex items-center justify-between p-3 text-sm font-semibold text-gray-700 border bg-slate-100 {{ Request::is('mitra-kurir/penjemputan-sampah/riwayat-penjemputan') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-2xl">
                        Total Sampah & Riwayat Penjemputan
                        <span class="text-lg {{ Request::is('mitra-kurir/penjemputan-sampah/riwayat-penjemputan') ? 'text-green-600' : 'text-gray-400' }}">
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
