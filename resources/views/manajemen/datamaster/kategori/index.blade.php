@extends('layouts.main-manajemen')

@section('content')
<style>
    .relative {
    position: relative;
}
.absolute {
    position: absolute;
}

.bg-white {
    background-color: white;
}
.text-[#60B15B] {
    color: #60B15B;
}
.z-10 {
    z-index: 10; /* Pastikan berada di atas gambar */
}

</style>

<div class="min-h-screen mx-auto bg-gray-100 w-full">   

    <div class="py-8">
        <h2 class="text-xl font-semibold leading-relaxed ml-14">Total Sampah Per Kategori</h2>
        <div class="flex items-center justify-between">
            <h4 class="text-base font-normal ml-14">Daftar kategori sampah elektronik dan total poin terkumpul</h4>
        </div>
        {{-- Card Section --}}
        <div class="grid grid-cols-3 gap-6 px-12 pb-6 mt-4 lg:grid-cols-3 lg:gap-6">
            <x-index-card
                title="{{ $NamaKategori1->nama_kategori }}"
                description="{{ $NamaKategori1->deskripsi_kategori }}"
                image="https://picsum.photos/720/720"
                link="{{}}"
                points="{{$kategori1}}" />
            <x-index-card
                title="{{ $NamaKategori2->nama_kategori }}"
                description="{{ $NamaKategori2->deskripsi_kategori }}"
                image="https://picsum.photos/720/720"
                link="{{}}"
                points="{{$kategori2}}" />
            <x-index-card
                title="{{ $NamaKategori3->nama_kategori }}"
                description="{{ $NamaKategori3->deskripsi_kategori }}"
                image="https://picsum.photos/720/720"
                link="{{}}"
                points="{{$kategori3}}" />
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
