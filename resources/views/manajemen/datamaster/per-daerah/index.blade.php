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
                    @foreach($dataDaerah as $daerah)
                    <x-card-perdaerah
                        image="https://picsum.photos/720/720"
                        title="{{ $daerah->nama_daerah }}"            
                        link="#"
                        berat="{{ number_format($daerah->total_berat_sampah, 0) }}"
                        poin="{{ number_format($daerah->total_poin, 0) }}" />
                    @endforeach
        </div>
        

    </div>
</div>

@endsection
