@extends('main')

@section('content')

    {{-- Card jumlah masyarakat, dll --}}
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Dashboard Masyarakat</h2>
            <h4 class="text-base font-normal ml-14">Selamat datang di dashboard masyarakat.</h4>
            {{-- Card Section --}}
            <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                <x-card 
                    title="Kategori Sampah Elektronik" 
                    description="Jumlah Kategori sampah elektronik yang terdaftar di aplikasi" 
                    image="https://picsum.photos/1280/720"
                    link="{{ route('penjemputan.kategori') }}" />
                <x-card
                    title="Jumlah Penjemputan" 
                    description="Jumlah penjemputan sampah elektronik yang telah dilakukan" 
                    image="https://picsum.photos/1280/720"
                    link="{{ route('penjemputan.permintaan') }}" />
            </div>
        </div>
    </div>
@endsection