@extends('layouts.main-manajemen')

@section('content')

<div class="flex-1 p-6">
    <h2 class="text-2xl font-semibold leading-relaxed ml-24">Detail Riwayat Penjemputan</h2>
    <header class="flex justify-end items-center mb-6 mr-10">
        <div class="flex items-center">
          <input
            type="text"
            placeholder="Cari..."
            class="border rounded-md px-4 py-2 text-sm mr-3"
          />
          <button class="flex items-center border px-4 py-2 rounded-md text-sm">
            <span class="material-icons-outlined mr-2">filter</span> Filter
          </button>
        </div>
      </header>
      <h4 class="text-base font-normal ml-24 mb-10 -mt-14">Detail riwayat penjemputan sampah elektronik</h4>

    <!-- Detail Penjemputan -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-5 ">
    <div class="mt-5 bg-white p-6 rounded-lg  ml-20 h-full">
      <div class="grid grid-cols-2 gap-5 mb-6">
        <div class="flex flex-col justify-center items-center text-center border p-4 rounded-lg h-[230px]">
          <h3 class="text-lg font-semibold text-gray-600">Nama Kurir</h3>
          <p class="text-xl font-bold mt-2">Audi Hezra</p>
        </div>
        <div class="flex flex-col justify-center items-center text-center border p-4 rounded-lg h-[230px]">
          <h3 class="text-lg font-semibold text-gray-600">Tanggal Penjemputan</h3>
          <p class="text-xl font-bold mt-2">11/29/2024</p>
        </div>
      </div>

      <!-- Informasi Penjemputan -->
      <div class="bg-gray-50 mt-10 rounded-2xl border shadow-xl">
        <div class="flex justify-center mb-12 space-x-10 mx-6">
          <span class="w-24 h-1.5 bg-red-normal"></span>
          <span class="w-24 h-1.5 bg-sky-400"></span>
          <span class="w-24 h-1.5 bg-red-normal"></span>
          <span class="w-24 h-1.5 bg-sky-400"></span>
          <span class="w-24 h-1.5 bg-red-normal"></span>
      </div>
        <div class="p-6">
          <p class="font-semibold mb-2"><i class="fas fa-user"></i> Sarah Martins - 0032</p>
          <p class="mt-6"><strong>Alamat Penjemputan:</strong> 
            <p class="mt-4 text-gray-500">Jl. Telekomunikasi 1, Buahbatu, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257</p>
            <p class="mt-6"><strong>Daerah Penjemputan:</strong> 
              <p class="mt-4 text-gray-500">Sukasari</p>
              <p class="mt-6"><strong>Dropbox Tujuan:</strong>
                <p class="mt-4 text-gray-500"> Geger Kalong Tengah, Gg. Hj. Ridho II No. 17 G, Kec. Sukasari, Kota Bandung, Jawa Barat 40257</p>
        </div>
      </div>
      
    </div>

    <!-- Sampah yang Telah Dijemput -->
    <div class="border p-6 h-full mr-6 rounded-2xl relative">
      <div class="flex items-center justify-between mb-6">
        <h1 class="font-bold text-xl">Sampah yang telah dijemput</h1>
        <div class="absolute right-0 top-0 bg-green-500 text-white-normal px-4 py-2 rounded-tr-2xl rounded-bl-2xl font-medium">300 Poin</div>
      </div>
        
    
        <div class="mt-8 grid grid-cols-3 md:grid-cols-1 lg:grid-cols-2 gap-5 ">
            <!-- Kartu Sampah -->
            <x-detail-riwayat-card
                image="https://picsum.photos/720/720"
                title="Laptop"
                jenis="Layar dan Monitor"
                link="#"
                berat="37.932"
                poin="10.019" />
            <x-detail-riwayat-card
                image="https://picsum.photos/720/720"
                title="Laptop"
                jenis="Layar dan Monitor"
                link="#"
                berat="37.932"
                poin="10.019" />
            <x-detail-riwayat-card
                image="https://picsum.photos/720/720"
                title="Laptop"
                jenis="Layar dan Monitor"
                link="#"
                berat="37.932"
                poin="10.019" />
        </div>
        <div class="bg-green-500 text-white-normal px-4 py-2  font-medium absolute rounded-tr-2xl rounded-bl-2xl bottom-0 left-0">30 Kg</div>
    
            <!-- Pagination -->
            <div class="absolute bottom-6 right-6 inline-flex justify-center gap-1">
                <a href="#" class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                    <span class="sr-only">Prev Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <div>
                    <label for="PaginationPage" class="sr-only">Page</label>
                    <input
                        type="number"
                        class="h-8 w-12 rounded border border-gray-100 bg-white p-0 text-center text-xs font-medium text-gray-900 [-moz-appearance:_textfield] [&::-webkit-inner-spin-button]:m-0 [&::-webkit-outer-spin-button]:m-0"
                        min="1"
                        value="2"
                        id="PaginationPage"
                    />
                </div>
                
                <a href="#" class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                    <span class="sr-only">Next Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </a>
                
            </div>

        
    </div>
    

</div>
<div class="flex justify-end items-center mt-12 w-full">
    <button class="px-4 py-2 bg-green-600 text-white-normal rounded-lg font-bold">Kembali</button>
  </div>

@endsection