@extends('layouts.main-manajemen')

@section('content')

<div class="min-h-screen mx-auto bg-gray-100 w-full ">   
    <div class="py-8">
        {{-- Section Judul --}}
        <h2 class="text-2xl font-semibold leading-relaxed ml-24">Total Sampah Terkumpul per Daerah</h2>
        <h4 class="text-base font-normal ml-24 mb-10">Daftar total sampah terkumpul per daerah</h4>
        <div class="px-12 pb-6 mt-4">
            <!-- Baris Pertama: 3 Kolom -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <x-card-perdaerah
                    image="https://picsum.photos/720/720"
                    title="Laptop"
                    jenis="Layar dan Monitor"                
                    link="#"
                    berat="37.932"
                    poin="10.019" />
                <x-card-perdaerah
                    image="https://picsum.photos/720/720"
                    title="Monitor"
                    jenis="Layar dan Monitor"                
                    link="#"
                    berat="20.000"
                    poin="11.378" />
                <x-card-perdaerah
                    image="https://picsum.photos/720/720"
                    title="Notebook"
                    jenis="Layar dan Monitor"                
                    link="#"
                    berat="30.000"
                    poin="19.374" />
                <x-card-perdaerah
                    image="https://picsum.photos/720/720"
                    title="Tablet"
                    jenis="Layar dan Monitor"                
                    link="#"
                    berat="39.374"
                    poin="47.293" />
                <x-card-perdaerah
                    image="https://picsum.photos/720/720"
                    title="Televisi"
                    jenis="Layar dan Monitor"                
                    link="#"
                    berat="54.952"
                    poin="60.364" />

        </div>
        

    </div>
</div>

@endsection
