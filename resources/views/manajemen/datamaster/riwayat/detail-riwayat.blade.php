@extends('layouts.main-manajemen')

@section('content')

<div class="flex-1 p-6">
    <h2 class="text-2xl font-semibold leading-relaxed ml-24">Detail Riwayat Penjemputan</h2>
    <h4 class="text-base font-normal ml-24 mb-10 -mt-14">Detail riwayat penjemputan sampah elektronik</h4>
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
      

    <!-- Detail Penjemputan -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-5 ">
    <div class="bg-white rounded-xl  ml-20 h-full">
      <div class="grid grid-cols-2 gap-5 mb-6">
        <div class="flex flex-col justify-center items-center text-center border p-4 rounded-3xl h-[230px]">
          <h3 class="text-lg font-semibold text-gray-600">Nama Kurir</h3>
          <p class="text-xl font-bold mt-2">{{ $kurir->nama }}</p>
        </div>
        <div class="flex flex-col justify-center items-center text-center border p-4 rounded-3xl h-[230px]">
          <h3 class="text-lg font-semibold text-gray-600">Tanggal Penjemputan</h3>
          <p class="text-xl font-bold mt-2">{{$riwayatDetail->tanggal_penjemputan}}</p> 
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
          <p class="font-semibold mb-2"><i class="fas fa-user"></i> {{ $masyarakat->nama }}</p>
          <p class="mt-6"><strong>Alamat Penjemputan:</strong> 
            <p class="mt-4 text-gray-500">{{ $riwayatDetail->alamat_penjemputan }}</p>
            <p class="mt-6"><strong>Daerah Penjemputan:</strong>
              <p class="mt-4 text-gray-500">{{ $riwayatDetail->daerah->nama_daerah }}</p>
              <p class="mt-6"><strong>Dropbox Tujuan:</strong>
                <p class="mt-4 text-gray-500">
                    <strong>{{ $riwayatDetail->dropbox->nama_dropbox }}</strong>, {{ $riwayatDetail->dropbox->alamat_dropbox }}
                </p>
                
        </div>
      </div>
      
    </div>


<!-- Sampah yang Telah Dijemput -->
<div class="border p-6 h-full mr-6 rounded-2xl relative">
  <div class="flex items-center justify-between mb-6">
      <h1 class="font-bold text-xl">Sampah yang telah dijemput</h1>
      <div class="absolute right-0 top-0 bg-[#437252] text-white-normal px-4 py-2 rounded-tr-2xl rounded-bl-2xl font-medium">
          {{$riwayatDetail->total_poin}} Poin
      </div>
  </div>    

  <!-- Kartu Sampah -->
  <div class="mt-8 grid grid-cols-3 md:grid-cols-1 lg:grid-cols-2 gap-5">
    @foreach($jumlahJenis as $jenis)
        @php
            // Ambil detail pertama untuk setiap id_jenis
            $detail = $detailPenjemputan->firstWhere('id_jenis', $jenis['id_jenis']);
            $quantity = $jenis['jumlah']; // Jumlah total per id_jenis
        @endphp

        <x-detail-riwayat-card
            image="{{ $image }}"
            nama="{{ $detail->jenis->nama_jenis }}"
            kategori="{{ $detail->jenis->kategori->nama_kategori }}"
            quantity="{{ $quantity }} Pcs"
            berat="{{ $detail->berat }} Kg"
        />
    @endforeach
</div>

<!-- Pagination dengan panah < dan > -->
<div class="absolute bottom-6 right-6 inline-flex justify-center gap-1">
    {{-- Tombol untuk move ke paling kiri --}}
    @if($currentPage > 1)
        <a href="{{ url()->current() }}?page=1" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md"><<</a>
    @else
        <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded-md"><<</span>
    @endif

    {{-- Tombol untuk move 1 page ke kiri --}}
    @if($currentPage > 1)
        <a href="{{ url()->current() }}?page={{ $currentPage - 1 }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md"><</a>
    @else
        <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded-md"><</span>
    @endif

    {{-- Nomor Halaman Saat Ini --}}
    <span class="px-4 py-2 bg-[#E2EDE0] text-white rounded-md">{{ $currentPage }}</span>

    {{-- Tombol untuk move 1 page ke kanan --}}
    @if($currentPage < $totalPages)
        <a href="{{ url()->current() }}?page={{ $currentPage + 1 }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">></a>
    @else
        <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded-md">></span>
    @endif

    {{-- Tombol untuk move ke paling kanan --}}
    @if($currentPage < $totalPages)
        <a href="{{ url()->current() }}?page={{ $totalPages }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">>></a>
    @else
        <span class="px-4 py-2 bg-gray-200 text-gray-400 rounded-md">>></span>
    @endif
</div>







  {{-- Total berat pojok kiri bawah --}}
  <div class="bg-[#437252] text-white-normal px-4 py-2 font-medium absolute rounded-tr-2xl rounded-bl-2xl bottom-0 left-0">
      {{$riwayatDetail->total_berat}} kg
  </div>

  <!-- Pagination -->
  {{-- <div class="absolute bottom-6 right-6 inline-flex justify-center gap-1">
    <!-- Previous Page -->
    @if ($riwayatDetail->onFirstPage())
        <span class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-500 cursor-not-allowed">
            <span class="sr-only">Prev Page</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
        </span>
    @else
        <a href="{{ $riwayatDetail->previousPageUrl() }}" class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900">
            <span class="sr-only">Prev Page</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
        </a>
    @endif

    <div>
        <label for="PaginationPage" class="sr-only">Page</label>
        <input
            type="number"
            class="h-8 w-12 rounded border border-gray-100 bg-white p-0 text-center text-xs font-medium text-gray-900 [-moz-appearance:_textfield] [&::-webkit-inner-spin-button]:m-0 [&::-webkit-outer-spin-button]:m-0"
            min="1"
            max="{{ $riwayatDetail->lastPage() }}"
            value="{{ $riwayatDetail->currentPage() }}"
            id="PaginationPage"
            onchange="window.location='?page=' + this.value"
        />
    </div>

    <!-- Next Page -->
    @if ($riwayatDetail->hasMorePages())
        <a href="{{ $riwayatDetail->nextPageUrl() }}" class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900">
            <span class="sr-only">Next Page</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
        </a>
    @else
        <span class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-500 cursor-not-allowed">
            <span class="sr-only">Next Page</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
        </span>
    @endif
</div> --}}

</div>


    

</div>
<div class="flex justify-end items-center mt-12 w-full">
    <button class="px-4 py-2 bg-[#437252] text-white-normal rounded-lg font-bold">
      <a href="{{route('manajemen.datamaster.riwayat.index')}}">Kembali</a>
    </button>
  </div>

@endsection

