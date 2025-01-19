
</style>
<div class="w-[321px] h-[373px] max-w-sm bg-neutral-50 border border-gray-200 rounded-2xl shadow-md hover:shadow-lg mx-auto overflow-hidden">
    <!-- Bagian Gambar -->
    <div class="relative w-full h-[200px]">
        <img class="object-cover w-full h-full" src="{{$image}}" alt=""/>
        <!-- Overlay Gelap -->
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center">
            <span class="text-white-normal text-2xl font-bold text-center">{{$title}}</span>
            {{-- <span class="custom-white text-lg">{{$jenis}}</span> --}}
        </div>
    </div>
    <!-- Bagian Informasi -->
    <div class="flex flex-col items-center py-5 space-y-4">
        <div class="flex items-center justify-center gap-2 w-48 p-3 text-base font-bold text-gray-900 rounded-2xl bg-gray-100 ">
            <img src="{{ asset('img/manajemen/datamaster/icon/Asset-1.svg') }}" alt="Total Sampah:">
            <span>{{$berat}} Kg</span>
        </div>
        <div class="flex items-center justify-center gap-2 w-48 p-3 text-base font-bold text-gray-900 rounded-2xl bg-gray-100">
            <img src="{{ asset('img/manajemen/datamaster/icon/Asset-piala.svg') }}" alt="">
            <span>{{$poin}} Poin</span>
        </div>
    </div>
</div>
