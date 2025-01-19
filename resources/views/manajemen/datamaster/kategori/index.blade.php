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
            @foreach($categories as $category)
            @php
                // Tentukan gambar berdasarkan nama_kategori yang ada di folder gambarKategoriSampah
                $imagePath = '';
        
                // Daftar gambar berdasarkan nama kategori
                $imageMapping = [
                    'Lampu' => 'Lampu.png',
                    'Layar dan Monitor' => 'Layar dan Monitor.png',
                    'Peralatan Besar' => 'Peralatan Besar.png',
                    'Peralatan IT dan Telekomunikasi Kecil' => 'Peralatan IT dan Telekomunikasi Kecil.png',
                    'Peralatan Kecil' => 'Peralatan Kecil.png',
                    'Peralatan Penukar Suhu' => 'Peralatan Penukar Suhu.png'
                ];
        
                // Cek apakah nama kategori ada dalam mapping gambar
                if (array_key_exists($category['nama_kategori'], $imageMapping)) {
                    $imagePath = $imageMapping[$category['nama_kategori']];
                } else {
                    $imagePath = 'default.jpg'; // Gambar default jika kategori tidak ditemukan
                }
            @endphp
        
            <x-kategori-card
                title="{{ $category['nama_kategori'] }}"
                description="{{ $category['deskripsi_kategori'] }}"
                image="{{ asset('img/manajemen/datamaster/gambarKategoriSampah/' . $imagePath) }}"
                link="#"
                points="{{ number_format($category['total_poin'], 0) }}"
                weight="{{ number_format($category['total_berat'], 0) }}" />
        @endforeach
        
        </div>
    </div>
</div>

@endsection


