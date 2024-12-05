@extends('layouts.main-manajemen')

@section('content')
<div class="min-h-screen mx-auto bg-gray-100 w-full">   

    <div class="py-8">
        <h2 class="text-xl font-semibold leading-relaxed ml-14">Total Sampah Per Kategori</h2>
        <div class="flex items-center justify-between">
            <h4 class="text-base font-normal ml-14">Daftar kategori sampah elektronik dan total poin terkumpul</h4>
        </div>
        {{-- Card Section --}}
        <div class="grid grid-cols-3 gap-6 px-12 pb-6 mt-4 lg:grid-cols-3 lg:gap-6">
            <x-index-card
                title="Lampu"
                description="Kategori sampah elektronik"
                image="https://picsum.photos/720/720"
                link="{{}}"
                points="27468" />
            <x-index-card
                title="Layarnya Monitor"
                description="Kategori sampah elektronik"
                image="https://picsum.photos/720/720"
                link="{{}}"
                points="84731" />
            <x-index-card
                title="Peralatan Pertukaran Suhu"
                description="Kategori sampah elektronik"
                image="https://picsum.photos/720/720"
                link="{{}}"
                points="29418" />
            <x-index-card
                title="Peralatan Besar"
                description="Kategori sampah elektronik"
                image="https://picsum.photos/720/720"
                link="{{}}"
                points="92137" />
            <x-index-card
                title="Peralatan Kecil"
                description="Kategori sampah elektronik"
                image="https://picsum.photos/720/720"
                link="{{}}"
                points="72194" />
            <x-index-card
                title="Peralatan TI dan Telekomunikasi"
                description="Kategori sampah elektronik"
                image="https://picsum.photos/720/720"
                link="{{}}"
                points="51348" />
        </div>
    </div>
</div>

@endsection
