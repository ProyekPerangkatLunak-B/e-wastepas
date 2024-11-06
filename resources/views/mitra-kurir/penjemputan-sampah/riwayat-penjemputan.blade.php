@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto  bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Total Sampah</h2>
            <h4 class="text-base font-normal ml-14 mb-8">Semua total sampah yang telah anda jemput</h4>
            <!-- Total Sampah Section -->
            <div class="px-12 mb-8">
                <div class="bg-white-200 rounded-2xl shadow-md p-6 flex items-center space-x-4 w-1/3">
                    <div class="text-5xl font-bold text-green-600">28<span class="text-lg text-gray-900">pcs</span></div>
                    <div class="flex flex-col">
                        <h3 class="text-lg font-semibold text-center">Total Sampah</h3>
                        <p class="text-sm text-gray-500 text-center">Total sampah yang sudah dijemput</p>
                    </div>
                </div>
            </div>

            <h2 class="text-xl font-semibold leading-relaxed ml-14">Riwayat Penjemputan</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Daftar riwayat penjemputan sampah</h4>

                {{-- Search and Filter options --}}
                <div class="flex items-center space-x-4 mr-14">
                    {{-- Search Box --}}
                    <div class="relative">
                        <input type="text" class="w-64 px-4 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-full focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200 placeholder:text-gray-900" placeholder="Cari....">
                    </div>
                    {{-- Filter Dropdown --}}
                    <div>
                        <select class="items-center  px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-full focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                            <option value="all">Filter</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                {{-- Card Section --}}
                <div class=" w-full h-auto max-w-sm bg-white-100 border border-gray-200 rounded-2xl shadow-md hover:shadow-lg">
                    <div class="flex flex-col items-center pb-5">
                        <div class="h-20 rounded-full overflow-hidden bg-white mt-5">
                            <img class="object-cover w-full h-full" src="https://picsum.photos/700/700" alt="Rahma"/>
                        </div>
                        <div class="flex flex-col items-center p-4 text-center">
                            <h3 class="text-base font-semibold text-gray-900">Rahma</h3>
                        </div>
                        <div>
                            <ul class="my-4 space-y-3">
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
                    <!-- Status Button -->
                    <div class="flex justify-end ">
                        <span class="px-8 py-2 font-semibold text-gray-100 bg-primary-normal text-md rounded-tl-3xl rounded-br-2xl">Selesai</span>
                    </div>
                </div>

                {{-- card 2 --}}
                <div class=" w-full h-auto max-w-sm bg-white-100 border border-gray-200 rounded-2xl shadow-md hover:shadow-lg">
                    <div class="flex flex-col items-center pb-5">
                        <div class="h-20 rounded-full overflow-hidden bg-white mt-5">
                            <img class="object-cover w-full h-full" src="https://picsum.photos/700/700" alt="Rahma"/>
                        </div>
                        <div class="flex flex-col items-center p-4 text-center">
                            <h3 class="text-base font-semibold text-gray-900">Rahma</h3>
                        </div>
                        <div>
                            <ul class="my-4 space-y-3">
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
                    <!-- Status Button -->
                    <div class="flex justify-end ">
                        <span class="px-8 py-2 font-semibold text-gray-100 bg-red-normal text-md rounded-tl-3xl rounded-br-2xl">Ditolak</span>
                    </div>
                </div>

                {{-- card 3 --}}
                <div class=" w-full h-auto max-w-sm bg-white-100 border border-gray-200 rounded-2xl shadow-md hover:shadow-lg">
                    <div class="flex flex-col items-center pb-5">
                        <div class="h-20 rounded-full overflow-hidden bg-white mt-5">
                            <img class="object-cover w-full h-full" src="https://picsum.photos/700/700" alt="Rahma"/>
                        </div>
                        <div class="flex flex-col items-center p-4 text-center">
                            <h3 class="text-base font-semibold text-gray-900">Rahma</h3>
                        </div>
                        <div>
                            <ul class="my-4 space-y-3">
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
                    <!-- Status Button -->
                    <div class="flex justify-end ">
                        <span class="px-8 py-2 font-semibold text-gray-100 bg-red-normal text-md rounded-tl-3xl rounded-br-2xl">Ditolak</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
