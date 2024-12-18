@extends('layouts.main-admin')

@section('content')
    {{-- Container Utama --}}
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-1">
            {{-- Section Judul --}}
            <div class="bg-gray-100 flex items-center justify-center">
                <div class="w-full max-w-4xl">
                    <div class="flex items-center justify-between">
                        <!-- Left section: Heading and subheading -->
                        <div class="flex flex-col ml-2">
                            <h2 class="text-xl font-semibold leading-relaxed">Permintaan Penjemputan Sampah</h2>
                            <h4 class="text-base font-normal">Daftar permintaan penjemputan sampah elektronik</h4>
                        </div>
            
                        <!-- Right section: Search form and Filter -->
                        <div class="flex items-center space-x-4">
                            <!-- Search form -->
                            <form class="relative">
                                <label for="search" class="sr-only text-black">Cari</label>
                                <div class="flex items-center">
                                    <input 
                                        type="text" 
                                        id="search" 
                                        class="w-full px-4 py-2 rounded-lg shadow-sm border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500 text-black" 
                                        placeholder="Cari..."
                                    >
                                    <button 
                                    type="submit" 
                                    class="absolute right-2 inset-y-0 flex items-center px-3 py-2 text-black rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none">
                                        <svg 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        viewBox="0 0 512 512" 
                                        fill="currentColor" 
                                        class="w-5 h-5">
                                            <!-- Icon -->
                                            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                                        </svg>
                                    </button>
                                </div>
                            </form>
            
                            <!-- Filter button -->
                            <div class="flex justify-between items-center shadow-sm border bg-white text-black rounded-xl font-medium px-4 py-2">
                                <span>Filter</span>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.5 13.125C7.5 12.9592 7.56585 12.8003 7.68306 12.6831C7.80027 12.5658 7.95924 12.5 8.125 12.5H11.875C12.0408 12.5 12.1997 12.5658 12.3169 12.6831C12.4342 12.8003 12.5 12.9592 12.5 13.125C12.5 13.2908 12.4342 13.4497 12.3169 13.5669C12.1997 13.6842 12.0408 13.75 11.875 13.75H8.125C7.95924 13.75 7.80027 13.6842 7.68306 13.5669C7.56585 13.4497 7.5 13.2908 7.5 13.125ZM5 9.375C5 9.20924 5.06585 9.05027 5.18306 8.93306C5.30027 8.81585 5.45924 8.75 5.625 8.75H14.375C14.5408 8.75 14.6997 8.81585 14.8169 8.93306C14.9342 9.05027 15 9.20924 15 9.375C15 9.54076 14.9342 9.69973 14.8169 9.81694C14.6997 9.93415 14.5408 10 14.375 10H5.625C5.45924 10 5.30027 9.93415 5.18306 9.81694C5.06585 9.69973 5 9.54076 5 9.375ZM2.5 5.625C2.5 5.45924 2.56585 5.30027 2.68306 5.18306C2.80027 5.06585 2.95924 5 3.125 5H16.875C17.0408 5 17.1997 5.06585 17.3169 5.18306C17.4342 5.30027 17.5 5.45924 17.5 5.625C17.5 5.79076 17.4342 5.94973 17.3169 6.06694C17.1997 6.18415 17.0408 6.25 16.875 6.25H3.125C2.95924 6.25 2.80027 6.18415 2.68306 6.06694C2.56585 5.94973 2.5 5.79076 2.5 5.625Z" fill="#413F3F"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-8 px-12">
            <!-- Card -->
                <div class="bg-white pt-6 pb-6 mx-2 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-black font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-black text-xs font-normal text-center mb-2">Belum Diproses</h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-4 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    
                    <a href="{{ route('admin.penjemputan-sampah.permintaan.detail') }}"
                        class=" {{ Request::is('admin/penjemputan-sampah/permintaan/detail') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        <button class="bg-first text-black rounded-xl font-semibold text-center px-10 py-1">Detail</button>
                        
                    </a>
                </div>

                <div class="bg-white pt-6 pb-6 mx-2 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-black font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-black text-xs font-normal text-center mb-2">Belum Diproses</h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-4 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    
                    <a href="{{ route('admin.penjemputan-sampah.permintaan.detail') }}"
                        class=" {{ Request::is('admin/penjemputan-sampah/permintaan/detail') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        <button class="bg-first text-black rounded-xl font-semibold text-center px-10 py-1">Detail</button>
                        
                    </a>
                </div>

                <div class="bg-white pt-6 pb-6 mx-2 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-black font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-black text-xs font-normal text-center mb-2">Belum Diproses</h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-4 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    
                    <a href="{{ route('admin.penjemputan-sampah.permintaan.detail') }}"
                        class=" {{ Request::is('admin/penjemputan-sampah/permintaan/detail') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        <button class="bg-first text-black rounded-xl font-semibold text-center px-10 py-1">Detail</button>
                        
                    </a>
                </div>

                <div class="bg-white pt-6 pb-6 mx-2 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-black font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-black text-xs font-normal text-center mb-2">Belum Diproses</h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-4 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    
                    <a href="{{ route('admin.penjemputan-sampah.permintaan.detail') }}"
                        class=" {{ Request::is('admin/penjemputan-sampah/permintaan/detail') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        <button class="bg-first text-black rounded-xl font-semibold text-center px-10 py-1">Detail</button>
                        
                    </a>
                </div>

                <div class="bg-white pt-6 pb-6 mx-2 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-black font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-black text-xs font-normal text-center mb-2">Belum Diproses</h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-4 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    
                    <a href="{{ route('admin.penjemputan-sampah.permintaan.detail') }}"
                        class=" {{ Request::is('admin/penjemputan-sampah/permintaan/detail') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        <button class="bg-first text-black rounded-xl font-semibold text-center px-10 py-1">Detail</button>
                        
                    </a>
                </div>

                <div class="bg-white pt-6 pb-6 mx-2 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-black font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-black text-xs font-normal text-center mb-2">Belum Diproses</h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-4 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    
                    <a href="{{ route('admin.penjemputan-sampah.permintaan.detail') }}"
                        class=" {{ Request::is('admin/penjemputan-sampah/permintaan/detail') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        <button class="bg-first text-black rounded-xl font-semibold text-center px-10 py-1">Detail</button>
                        
                    </a>
                </div>

                <div class="bg-white pt-6 pb-6 mx-2 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-black font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-black text-xs font-normal text-center mb-2">Belum Diproses</h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-4 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    
                    <a href="{{ route('admin.penjemputan-sampah.permintaan.detail') }}"
                        class=" {{ Request::is('admin/penjemputan-sampah/permintaan/detail') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        <button class="bg-first text-black rounded-xl font-semibold text-center px-10 py-1">Detail</button>
                        
                    </a>
                </div>
                <div class="bg-white pt-6 pb-6 mx-2 rounded-lg shadow-lg flex flex-col items-center">
                    <div class="mb-1 flex items-center justify-center bg-gray-100 p-3 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <h5 class="text-black font-normal text-center text-sm">Nama Masyarakat</h5>
                    <h5 class="text-black text-xs font-normal text-center mb-2">Belum Diproses</h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-2 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    <h5 class="bg-first text-black rounded-lg font-normal text-center text-sm mx-5 mb-4 px-14 py-1">Jenis <em class="pl-4"> Jumlah</em></h5>
                    
                    <a href="{{ route('admin.penjemputan-sampah.permintaan.detail') }}"
                        class=" {{ Request::is('admin/penjemputan-sampah/permintaan/detail') ? 'bg-gray-100 border-green-400 text-green-600' : 'border-gray-300 hover:bg-gray-200' }} rounded-lg">
                        <button class="bg-first text-black rounded-xl font-semibold text-center px-10 py-1">Detail</button>
                        
                    </a>
                </div>

                

                

                


                
                
            </div>
            <div class="flex justify-end items-center space-x-2 py-4">
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300"><<</a>
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300"><</a>
                <a href="#" class="px-4 py-2 bg-second text-black rounded-lg hover:bg-gray-600 border border-black">1</a>
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">></a>
                <a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">>></a>
            </div>
            


            
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
