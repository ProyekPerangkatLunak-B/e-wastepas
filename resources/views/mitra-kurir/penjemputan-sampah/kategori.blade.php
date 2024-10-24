@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Kategori Sampah Elektronik</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Kategori dan jenis sampah elektronik yang dapat dijemput.</h4>

            </div>

            {{-- Card Section --}}
            <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                <x-card 
                    title="Lampu" 
                    description="Semua jenis lampu dari berbagai alat elektronik" 
                    image="https://picsum.photos/1280/720" 
                    link="{{ route('mitra-kurir.penjemputan.detail-kategori') }}" />

            </div>
        </div>
    </div>
@endsection
