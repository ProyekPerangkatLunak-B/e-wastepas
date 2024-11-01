<div class="relative w-full bg-white rounded-lg shadow-md group hover:shadow-lg">
    <div class="w-full h-48 overflow-hidden bg-white rounded-t-xl">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
    </div>
    <div class="flex flex-col items-center justify-center h-40 p-4 text-center">
        <h3 class="text-xl font-semibold text-gray-900">{{ $title }}</h3>
        <p class="mt-2 text-sm text-gray-500">{{ $description }}</p>
        <a href="{{ $link }}" class="inline-block w-full px-4 py-3 mt-4 text-sm font-medium text-white rounded-lg bg-gradient-to-r from-second-gray to-gray-600">Lihat Selengkapnya</a>
    </div>
</div>
