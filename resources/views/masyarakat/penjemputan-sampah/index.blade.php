@extends('layouts.main')

@section('content')
    <div class="min-h-screen mx-[22rem] mt-2 bg-gray-100 w-[82%]">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Dashboard Masyarakat - Penjemputan Sampah</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Daftar semua tentang penjemputan sampah</h4>
            </div>
            {{-- Card Section --}}
            <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                <x-card 
                    title="Kategori Sampah Elektronik" 
                    description="Jumlah Kategori sampah elektronik yang terdaftar di aplikasi" 
                    image="https://picsum.photos/1280/720"
                    link="{{ route('masyarakat.penjemputan.kategori') }}" />
                <x-card
                    title="Jumlah Penjemputan" 
                    description="Jumlah penjemputan sampah elektronik yang telah dilakukan" 
                    image="https://picsum.photos/1280/720"
                    link="{{ route('masyarakat.penjemputan.permintaan') }}" />
                <x-card
                    title="Melacak Penjemputan" 
                    description="Lihat disini untuk melacak sampah elektronik yang telah ditindak" 
                    image="https://picsum.photos/1280/720"
                    link="{{ route('masyarakat.penjemputan.melacak') }}" />
            </div>
        </div>
    </div>
@endsection
