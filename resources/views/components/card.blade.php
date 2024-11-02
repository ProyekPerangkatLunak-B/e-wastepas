<div class="relative w-full bg-white-100 rounded-2xl shadow-md group hover:shadow-lg">
    <div class="w-full h-48 overflow-hidden bg-white rounded-t-xl">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
    </div>
    <div class="flex flex-col items-center justify-center h-40 p-4 text-center">
        <h3 class="text-xl font-semibold text-gray-900">{{ $title }}</h3>
        <p class="mt-2 text-sm text-gray-500">{{ $description }}</p>
        <a href="{{ $link }}" class="inline-block w-full px-4 py-3 mt-4 text-gray-50 font-semibold text-white rounded-xl bg-gradient-to-r from-green-500 to-green-700">Lihat Selengkapnya</a>
    </div>
</div>
