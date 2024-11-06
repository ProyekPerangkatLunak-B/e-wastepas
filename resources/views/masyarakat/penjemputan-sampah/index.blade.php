@extends('layouts.main')

@section('content')
    <div class="min-h-screen mx-[22rem] mt-2 bg-gray-100 w-[82%]">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Masyarakat - Penjemputan Sampah</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Daftar semua modul masyarakat submodul penjemputan sampah.</h4>
            </div>
            {{-- Card Section --}}
            <div class="grid grid-cols-1 gap-4 px-12 pb-6 mt-4 lg:grid-cols-3 lg:gap-4">
                <x-index-card
                    title="Kategori Sampah Elektronik"
                    description="Jumlah Kategori sampah elektronik"
                    image="https://picsum.photos/720/720"
                    link="{{ route('masyarakat.penjemputan.kategori') }}" />
                <x-index-card
                    title="Jumlah Penjemputan"
                    description="Jumlah penjemputan sampah elektronik"
                    image="https://picsum.photos/720/720"
                    link="{{ route('masyarakat.penjemputan.permintaan') }}" />
                <x-index-card
                    title="Melacak Penjemputan"
                    description="Lihat disini untuk melacak sampah elektronik"
                    image="https://picsum.photos/720/720"
                    link="{{ route('masyarakat.penjemputan.melacak') }}" />
                <x-index-card
                    title="Total & Riwayat Sampah"
                    description="Lihat disini untuk melihat detail selengkapnya"
                    image="https://picsum.photos/720/720"
                    link="{{ route('masyarakat.penjemputan.total-riwayat') }}" />
            </div>
        </div>
    </div>
@endsection
