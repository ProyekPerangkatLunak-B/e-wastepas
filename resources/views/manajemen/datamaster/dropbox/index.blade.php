@extends('layouts.main-manajemen')

@section('content')

<div class="min-h-screen mx-auto bg-gray-100 w-full ">   
    <div class="py-8">
        {{-- Section Judul --}}
        <h2 class="text-2xl font-semibold leading-relaxed ml-24">Total Sampah Terkumpul per Dropbox</h2>
        <h4 class="text-base font-normal ml-24 mb-10">Daftar total sampah terkumpul per dropbox</h4>
        <div class="px-12 pb-6 mt-4">
            <!-- Baris Pertama: 3 Kolom -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    @if($results->isNotEmpty())
                    @foreach($results as $result)
                        <x-dropbox-card
                            :image="'https://picsum.photos/720/720'"
                            :nama_dropbox="$result->nama_dropbox"
                            :berat="number_format($result->total_berat_sampah, 1)" {{-- Sesuaikan format desimal --}}
                            :poin="number_format($result->total_poin, 0)"
                        />
                    @endforeach
                @else
                    <p class="text-center">Tidak ada data Dropbox tersedia.</p>
                @endif               
        </div>
    </div>
</div>

@endsection