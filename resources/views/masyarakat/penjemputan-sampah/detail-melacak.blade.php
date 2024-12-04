@extends('layouts.main')

@section('content')
<div class="min-h-screen mx-[22rem] pt-12 mt-2 pb-96 bg-gray-100 w-[82%]">
    {{-- Breadcrumbs section --}}
    <div class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center mx-16 mb-6 space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="{{ route('masyarakat.penjemputan.melacak') }}" class="inline-flex ml-1 text-sm font-medium text-gray-800 hover:underline md:ml-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-4">
                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
              Melacak Penjemputan
            </a>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <span class="mx-2.5 text-gray-800 ">/</span>
              <span class="ml-1 text-sm font-medium text-gray-800 hover:underline md:ml-2">
                Detail Melacak Penjemputan
              </span>
            </div>
          </li>
        </ol>
      </div>

    <!-- Section untuk ID Penjemputan dan Button Batalkan Penjemputan -->
    <div class="flex items-center justify-between mx-auto">
        <div class="ps-24">
            <h2 class="text-xl font-semibold leading-relaxed">Detail Melacak Penjemputan</h2>
            <p class="text-base font-normal text-gray-600">Dibuat pada : 08.00, 27 Desember 2024</p>
        </div>

        <!-- Button Batalkan Penjemputan -->
        <a href="javascript:void(0);" onclick="openModal()" class="flex items-center justify-center w-[200px] h-[50px] me-24 py-2 text-gray-100 transition duration-300 bg-red-normal rounded-2xl shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="mr-2 bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
            </svg>
            Batalkan
        </a>
    </div>

    <!-- Container untuk ID Penjemputan, Estimasi Tiba, dan Tracking Status -->
    <div class="w-[1380px] h-[250px] mx-auto mt-4 pt-2 pb-10 bg-white-normal shadow-md rounded-2xl">
        <div class="flex items-start justify-between px-4">
            <!-- ID Penjemputan di Ujung Kiri Atas -->
            <div>
                <p class="text-gray-600">ID Penjemputan:</p>
                <p class="text-xl font-semibold">232378923</p>
            </div>

            <!-- Estimasi Tiba di Ujung Kanan Atas -->
            <div class="text-right">
                <p class="text-gray-600">Estimasi Tiba:</p>
                <p class="text-xl font-semibold">17.23</p>
            </div>
        </div>

        <!-- Tracking Status di Tengah -->
        <div class="flex items-center justify-center mt-8 space-x-1.5">
            <div class="flex flex-col items-center">
                <img src="{{ asset('img/masyarakat/penjemputan-sampah/journal-check 1.png') }}" class="w-[60px] h-[60px]" alt="Dijemput Kurir">
                <span class="mt-2 text-green-500 text-md">Menunggu Konfirmasi</span>
            </div>
            <div class="w-[220px] h-[12px] rounded bg-gradient-to-r from-gray-300 to-green-400"></div>

            <div class="flex flex-col items-center">
                <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam1.png') }}" class="w-[60px] h-[60px]" alt="Dijemput Kurir">
                <span class="mt-2 text-gray-500 text-md">Dijemput Kurir</span>
            </div>
            <div class="w-[220px] h-[12px] rounded bg-gradient-to-r from-gray-300 to-green-400"></div>

            <div class="flex flex-col items-center">
                <img src="{{ asset('img/masyarakat/penjemputan-sampah/truck1.png') }}" class="w-[60px] h-[60px]" alt="Menuju Dropbox">
                <span class="mt-2 text-gray-500 text-md">Menuju Dropbox</span>
            </div>
            <div class="w-[220px] h-[12px] rounded bg-gradient-to-r from-gray-300 to-green-400"></div>

            <div class="flex flex-col items-center">
                <img src="{{ asset('img/masyarakat/penjemputan-sampah/patch-check1.png') }}" class="w-15 h-15" alt="Sudah Sampai">
                <span class="mt-2 text-gray-500 text-md">Sudah Sampai</span>
            </div>
        </div>
    </div>

    <!-- Container untuk Detail Alamat dan Detail Pelacakan -->
    <div class="w-[1380px] h-auto mx-auto pb-10 mt-6 bg-white-normal shadow-md rounded-xl">
        <div class="flex justify-center mb-12 space-x-28">
            <span class="w-24 h-2 bg-red-200 rounded"></span>
            <span class="w-24 h-2 bg-blue-300 rounded"></span>
            <span class="w-24 h-2 bg-red-200 rounded"></span>
            <span class="w-24 h-2 bg-blue-300 rounded"></span>
            <span class="w-24 h-2 bg-red-200 rounded"></span>
            <span class="w-24 h-2 bg-blue-300 rounded"></span>
            <span class="w-24 h-2 bg-red-200 rounded"></span>
        </div>

        <!-- Tracking & Details -->
        <div class="px-8 mt-6">
            <div class="flex justify-between">
                <!-- Nama, Alamat Penjemputan -->
                <div class="w-1/2 pr-6 mt-2">

                    <h3 class="mb-2 text-lg font-bold">Driver</h3>
                    <p class="mb-8 text-gray-600">Asep Surasep - 0851632668923</p>

                    <h3 class="mb-2 text-lg font-bold">Diambil dari</h3>
                    <p class="mb-8 text-gray-600">DROPBOX CIDADAP, Jalan Kapten Abdul Hamid No.86, RT.3/RW.1, Kelurahan Ledeng, Cidadap KOTA BANDUNG, CIDADAP, JAWA BARAT, ID, 40142</p>

                    <h3 class="mt-4 mb-2 text-lg font-bold">Dikirim ke</h3>
                    <p class="text-gray-600">DROPBOX CIDADAP, Jalan Kapten Abdul Hamid No.86, RT.3/RW.1, Kelurahan Ledeng, Cidadap KOTA BANDUNG, CIDADAP, JAWA BARAT, ID, 40142.</p>

                </div>

                <div class="w-1/2 mt-2">
                    <h3 class="mb-6 text-lg font-bold">Detail Pelacakan</h3>
                    <div class="relative space-y-6">
                        <!-- Garis Vertikal -->
                        <div class="absolute top-0 bottom-0 w-1 bg-gray-200 left-3"></div>

                        <!-- Item 1 -->
                        <div class="relative flex items-start space-x-4">
                            <!-- Icon Bullet -->
                            <div class="relative z-10 flex-shrink-0 w-6 h-6 bg-green-500 rounded-full"></div>
                            <!-- Text Content -->
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-black">08:30 WIB</p>
                                <p class="text-base font-bold text-black">Persiapan</p>
                                <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="relative flex items-start space-x-4">
                            <!-- Icon Bullet -->
                            <div class="relative z-10 flex-shrink-0 w-6 h-6 bg-gray-400 rounded-full"></div>
                            <!-- Text Content -->
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-black">09:00 WIB</p>
                                <p class="text-base font-bold text-black">Dijemput Kurir</p>
                                <p class="text-sm text-gray-600">Kurir sedang menuju lokasi pengambilan.</p>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="relative flex items-start space-x-4">
                            <!-- Icon Bullet -->
                            <div class="relative z-10 flex-shrink-0 w-6 h-6 bg-gray-400 rounded-full"></div>
                            <!-- Text Content -->
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-black">09:45 WIB</p>
                                <p class="text-base font-bold text-black">Menuju Dropbox</p>
                                <p class="text-sm text-gray-600">Sampah sedang dalam perjalanan ke Dropbox.</p>
                            </div>
                        </div>

                        <!-- Item 4 -->
                        <div class="relative flex items-start space-x-4">
                            <!-- Icon Bullet -->
                            <div class="relative z-10 flex-shrink-0 w-6 h-6 bg-gray-400 rounded-full"></div>
                            <!-- Text Content -->
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-black">10:15 WIB</p>
                                <p class="text-base font-bold text-black">Sudah Sampai</p>
                                <p class="text-sm text-gray-600">Sampah elektronik telah diterima di lokasi Dropbox.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Container untuk Rincian Sampah dan Catatan -->
        <div class="w-[1380px] h-auto mx-auto my-8 bg-white-normal shadow-md rounded-xl p-10">
            <div class="relative grid grid-cols-2 gap-12">
                <!-- Garis Tengah -->
                <div class="absolute left-1/2 top-0 bottom-0 w-[1px] bg-gray-200"></div>

                <!-- Rincian Sampah -->
                <div class="pr-8">
                    <h3 class="mb-6 text-xl font-bold">Rincian Sampah
                        <p class="text-sm font-normal text-black-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </h3>
                    <div class="space-y-4">
                        <!-- Card Sampah -->
                        <div class="flex items-center justify-between p-4 bg-gray-100 border shadow-sm rounded-2xl border-secondary-normal focus:ring-1 focus:bg-secondary-normal">
                            <!-- Gambar Sampah -->
                            <div class="flex items-center justify-center w-20 h-20 overflow-hidden rounded-lg">
                                <img src="https://picsum.photos/400/400" alt="Sampah" class="object-cover w-full h-full">
                            </div>
                            <!-- Detail Sampah -->
                            <div class="flex-1 px-4 text-center">
                                <p class="font-medium text-gray-600 text-md">Kategori Sedang</p>
                                <p class="text-lg font-bold text-black">Kipas Angin</p>
                            </div>
                            <!-- Jumlah -->
                            <p class="text-2xl font-bold text-green-500">1 Pcs</p>
                        </div>

                        <!-- Card Sampah Tambahan -->
                        <div class="flex items-center justify-between p-4 bg-gray-100 border shadow-sm rounded-2xl border-secondary-normal focus:ring-1 focus:bg-secondary-normal">
                            <!-- Gambar Sampah -->
                            <div class="flex items-center justify-center w-20 h-20 overflow-hidden rounded-lg">
                                <img src="https://picsum.photos/400/400" alt="Kipas Angin" class="object-cover w-full h-full">
                            </div>
                            <!-- Detail Sampah -->
                            <div class="flex-1 px-4 text-center">
                                <p class="font-medium text-gray-600 text-md">Kategori Sedang</p>
                                <p class="text-lg font-bold text-black">Kipas Angin</p>
                            </div>
                            <!-- Jumlah -->
                            <p class="text-2xl font-bold text-green-500">1 Pcs</p>
                        </div>
                    </div>
                </div>

                <!-- Catatan -->
                <div class="pl-6">
                    <h3 class="mb-6 text-xl font-bold text-red-300">Catatan
                        <p class="text-sm font-normal text-black-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </h3>
                    <div class="w-4/5 h-auto p-6 bg-gray-100 border rounded-lg shadow-sm">
                        <p class="text-gray-800">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae placeat dicta aut ipsa omnis iste, repellat voluptatum eius accusamus culpa ea animi ad accusantium itaque architecto aperiam? Inventore dolorum, illo eum architecto quam necessitatibus laudantium nisi maxime rerum, facere ipsam qui odio enim, dolore distinctio corrupti. Quam nobis molestiae culpa!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal Batalkan Penjemputan -->
    <div id="alertModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-opacity-50 bg-black-normal">x`
        <div class="w-[450px] p-6 bg-white-normal rounded-2xl shadow-lg">
            <h2 class="text-lg font-semibold text-red-normal">Notifikasi</h2>
            {{-- Underline  --}}
            <div class="w-3/12 h-1 mt-2 mb-8 bg-red-normal"></div>

            <p class="mt-4 text-center text-gray-700">Apakah yakin ingin membatalkan penjemputan sampah ini?</p>
            <p class="mt-2 text-sm text-center text-gray-500">*Keterangan Lorem ipsum dolor sit amet</p>

            <div class="flex justify-end mt-12 space-x-4">
                <button onclick="closeModal()" class="px-4 py-2 text-gray-500 border border-gray-300 rounded-lg hover:bg-gray-200">Tutup</button>
                <button class="px-4 py-2 rounded-lg text-white-normal bg-red-normal hover:bg-red-400">Batalkan</button>
            </div>
        </div>
    </div>
@endsection
