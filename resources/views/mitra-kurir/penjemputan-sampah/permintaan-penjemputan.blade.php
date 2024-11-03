@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto  bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Permintaan Penjemputan</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Daftar permintaan penjemputan sampah.</h4>
            </div>

            {{-- Card Section --}}
            <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                <x-card-permintaan
                    name="Sarah Martins" 
                    status="Sedang Diproses " 
                    image="https://picsum.photos/700/700" 
                    imageItem="https://picsum.photos/700/700"
                    {{-- untuk item barang nya --}}
                    item="televisi"
                    pcs="3"
                    link="{{ route('mitra-kurir.penjemputan.detail-permintaan') }}"
                    />
        
            </div>
        </div>
    </div>
@endsection
