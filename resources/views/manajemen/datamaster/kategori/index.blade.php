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
        <h2 class="text-xl font-semibold leading-relaxed ml-24">Total Sampah Per Kategori</h2>
        <div class="flex items-center justify-between">
            <h4 class="text-base font-normal ml-24">Daftar kategori sampah elektronik dan total poin terkumpul</h4>
        </div>
        {{-- Card Section --}}
        <div class="grid grid-cols-3 gap-6 px-12 pb-6 mt-4 lg:grid-cols-3 lg:gap-6">
            @foreach($results as $result)
            {{ dd($result->nama_dropbox) }}
            <x-dropbox-card
                image="https://picsum.photos/720/720"
                link="#"
                nama_dropbox="{{ $result->nama_dropbox }}"
                berat="{{ number_format($result->total_berat_sampah, 0) }}"
                poin="{{ number_format($result->total_poin, 0) }}"
            />
        @endforeach
        </div>
    </div>
</div>

@endsection
