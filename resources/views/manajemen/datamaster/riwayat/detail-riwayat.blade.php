@extends('layouts.main-manajemen')

@section('content')

<div class="flex-1 p-6 bg-gray-100">
        <h2 class="text-2xl font-semibold leading-relaxed ml-24">Detail Riwayat Penjemputan</h2>
        <h4 class="text-base font-normal ml-24 mb-10 ">Detail riwayat penjemputan sampah elektronik</h4>

    
      

    <!-- Detail Penjemputan -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-5 ">
        <div class="bg-white rounded-xl  ml-20 h-full">
            <div class="grid grid-cols-2 gap-5 mb-6">
                <div class="flex flex-col justify-center items-center text-center border p-4 rounded-3xl h-[230px]">
                    <img src="{{ asset('img/manajemen/datamaster/icon/Asset-kurir.png') }}" alt="" class="w-[50px] h-[48px] mb-4">
                <h3 class="text-lg font-semibold text-gray-600">Nama Kurir</h3>
                <p class="text-xl font-bold mt-2">{{ $kurir->nama }}</p>
                </div>
                <div class="flex flex-col justify-center items-center text-center border p-4 rounded-3xl h-[230px]">
                    <img src="{{ asset('img/manajemen/datamaster/icon/Asset-tanggal.png') }}" alt="" class="w-[48px] h-[46px] mb-4">
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

            <!-- Pagination -->
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
        </div>
    </div>
        <div class="flex justify-end items-center mt-12 w-full">
            <button class="px-4 py-2 bg-[#437252] text-white-normal rounded-lg font-bold">
            <a href="{{route('manajemen.datamaster.riwayat.index')}}">Kembali</a>
            </button>
        </div>

@endsection

