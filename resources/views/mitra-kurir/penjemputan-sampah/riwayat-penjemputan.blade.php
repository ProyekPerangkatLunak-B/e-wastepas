@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto  bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Total Sampah</h2>
            <h4 class="text-base font-normal ml-14 mb-8">Semua total sampah yang telah anda jemput</h4>
            <div class="flex space-x-8 px-12 mb-8">
                <!-- Total Sampah -->
                <div class="bg-white-200 rounded-2xl shadow-md p-6 flex items-center space-x-4 w-1/3">
                    <div class="text-5xl font-bold text-green-600">28<span class="text-lg text-gray-900">pcs</span></div>
                    <div class="flex flex-col">
                        <h3 class="text-lg font-semibold text-center">Total Sampah</h3>
                        <p class="text-sm text-gray-500 text-center">Total sampah yang sudah dijemput</p>
                    </div>
                </div>
            
                <!-- Total Berat Sampah -->
                <div class="bg-white-200 rounded-2xl shadow-md p-6 flex items-center space-x-4 w-1/3">
                    <div class="text-5xl font-bold text-green-600">150<span class="text-lg text-gray-900">Kg</span></div>
                    <div class="flex flex-col">
                        <h3 class="text-lg font-semibold text-center">Total Berat Sampah</h3>
                        <p class="text-sm text-gray-500 text-center">Total berat sampah yang sudah dijemput</p>
                    </div>
                </div>
            </div>

            <h2 class="text-xl font-semibold leading-relaxed ml-14">Riwayat Penjemputan</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Daftar riwayat penjemputan sampah</h4>

                {{-- Search and Filter options --}}
                <div class="flex items-center mr-20 space-x-4">
                    {{-- Search Box --}}
                    <div class="relative">
                        <input type="text"
                            class="w-[334px] h-[50px] py-3 pl-12 pr-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-2xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 placeholder:text-gray-900"
                            placeholder="Cari....">
                        <!-- SVG Icon Search -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="absolute text-gray-500 transform -translate-y-1/2 bi bi-search left-3 top-1/2"
                            viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </div>

                    {{-- Filter Dropdown --}}
                    <div class="relative">
                        <select
                            class="w-[222px] h-[50px] py-3 pl-4 text-sm text-gray-700 bg-white border border-gray-300 appearance-none pr-14 rounded-2xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                            <option value="all">Filter</option>
                            <option value="active">Berat-Ringan</option>
                            <option value="inactive">Ringan-Berat</option>
                        </select>
                        <!-- SVG Icon Filter -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="absolute text-gray-500 transform -translate-y-1/2 right-3 top-1/2 bi bi-filter"
                            viewBox="0 0 16 16">
                            <path
                                d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                {{-- Card Section --}}
                <div class="relative w-full h-auto max-w-sm bg-white-100 border border-gray-200 rounded-2xl shadow-md hover:shadow-lg">
                    {{-- berat --}}
                    <div class="absolute top-0 left-0 px-6 py-2 bg-secondary-normal text-white-100 font-semibold rounded-br-2xl rounded-tl-2xl">
                        31 Kg
                    </div>
                    <div class="flex flex-col items-center pb-5">
                        <div class="h-20 rounded-full overflow-hidden bg-white mt-5">
                            <img class="object-cover w-full h-full" src="https://picsum.photos/700/700" alt="Rahma"/>
                        </div>
                        <div class="flex flex-col items-center p-4 text-center">
                            <h3 class="text-base font-semibold text-gray-900">Rahma</h3>
                        </div>
                        <div>
                            <ul class="my-3 space-y-3">
                                {{-- item --}}
                                <li>
                                    <a href="#" class="w-64 flex items-center p-3 text-base font-bold text-gray-900 rounded-2xl bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-slate-200 dark:hover:bg-gray-500 dark:text-white">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full" src="https://picsum.photos/700/700" alt="2 Pcs">
                                    </div>
                                    <span class="flex-1 ms-3 whitespace-nowrap text-lg font-normal">Laptop</span>
                                    <span class="inline-flex items-center justify-center px-2 py-0.5 ms-3 text-base font-medium text-lime-900  ">2 Pcs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="w-64 flex items-center p-3 text-base font-bold text-gray-900 rounded-2xl bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-slate-200 dark:hover:bg-gray-500 dark:text-white">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full" src="https://picsum.photos/700/700" alt="2 Pcs">
                                    </div>
                                    <span class="flex-1 ms-3 whitespace-nowrap text-lg font-normal">Laptop</span>
                                    <span class="inline-flex items-center justify-center px-2 py-0.5 ms-3 text-base font-medium text-lime-900  ">2 Pcs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Button Detail -->
                    <div class="flex justify-center mt-2 mb-4">
                        <a href="{{ route('mitra-kurir.penjemputan.detail-riwayat') }}" type="button" class="px-9 py-2 font-semibold text-white-100 bg-gradient-to-b from-secondary-normal to-primary-normal rounded-full shadow-md">
                            Detail
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
