@props([
    'nama_dropbox' => 'Nama Dropbox Tidak Tersedia',
    'berat' => 0,
    'poin' => 0,
    'image' => '',
])


<div class="relative flex items-center w-[450px] shadow-md bg-white rounded-2xl hover:shadow-lg ml-10">
    <!-- Gambar -->
    <div class="relative w-1/2 bg-gray-200 rounded-l-2xl">
        <img src="{{ $image }}" alt="TPS CICAHEUM" class="w-full h-full object-cover rounded-l-2xl">
        <!-- Teks Menimpa Gambar -->
        <div class="absolute inset-0 flex items-center justify-center  bg-opacity-50 rounded-l-2xl">
            <h2 class="text-2xl font-bold text-center text-white-normal">
                {{ $nama_dropbox }}
            </h2>
        </div>
    </div>
    <!-- Bagian Kanan -->
    <div class="flex flex-col justify-center items-start w-3/4 h-full p-6 space-y-4 bg-gray-50 rounded-r-2xl">
        <div class="flex items-center gap-2 text-lg font-semibold w-48 text-center justify-center p-3 text-gray-900 rounded-2xl bg-gray-100 ml-4">
            <img src="{{ asset('img/manajemen/datamaster/icon/Asset-1.svg') }}" alt="">
            <span class="text-black">{{ $berat }} Kg</span>
        </div>
        <div class="flex items-center gap-2 text-lg font-semibold w-48 text-center justify-center p-3 text-gray-900 rounded-2xl bg-gray-100 ml-4 ">
            <img src="{{ asset('img/manajemen/datamaster/icon/Asset-piala.svg') }}" alt="">
            <span class="text-black">{{ $poin }} Poin</span>
        </div>
    </div>
</div>