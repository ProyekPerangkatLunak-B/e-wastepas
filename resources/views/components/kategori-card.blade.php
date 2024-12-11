<style>
    .custom-white {
    color: white !important;
}
</style>
<div class="relative w-[450px] shadow-md bg-white rounded-2xl hover:shadow-lg ml-10">
    <!-- Gambar -->
    <div class="w-full h-[228px] overflow-hidden rounded-t-2xl">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
    </div>
    <!-- Konten -->
    <div class="p-6 text-center">
        <h3 class="text-2xl font-semibold text-gray-900 mb-2 text-start">{{ $title }}</h3>
        <!-- Pastikan tinggi deskripsi konsisten -->
        <p class="text-gray-500 text-md text-left min-h-[64px]">{{ $description }}</p>
        <!-- Informasi Poin -->
        <div class="flex justify-center gap-4 mt-6">
            <div class="flex items-center gap-4 px-6 py-3 text-base font-bold text-gray-900 bg-gray-200 rounded-2xl">
                <i class="fa-solid fa-recycle text-2xl text-[#437252]"></i>
                <span>234312 Poin</span>
            </div>
            <div class="flex items-center gap-4 px-6 py-3 text-base font-bold text-gray-900 bg-gray-200 rounded-2xl">
                <i class="fa-solid fa-trophy text-2xl text-[#437252]"></i>
                <span>513123 Poin</span>
            </div>
        </div>
        <!-- Tombol Detail -->
        <a href="{{ $link }}" class="block w-full mt-6 py-3 text-md font-medium custom-white bg-gradient-to-r from-secondary-normal to-primary-normal rounded-xl hover:shadow-md">
            Detail
        </a>
    </div>
</div>
