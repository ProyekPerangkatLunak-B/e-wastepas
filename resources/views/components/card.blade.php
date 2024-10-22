<div class="relative w-full bg-white rounded-lg shadow-md group hover:shadow-lg">
    <div class="w-full h-48 overflow-hidden bg-white rounded-t-xl">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
    </div>
    <div class="flex flex-col items-center justify-center h-40 p-4 text-center">
        <h3 class="text-2xl font-semibold text-gray-900">{{ $title }}</h3>
        <p class="mt-2 text-base text-gray-500">{{ $description }}</p>
        <a href="{{ $link }}" class="inline-block w-full px-4 py-3 mt-4 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">Lihat Selengkapnya</a>
    </div>
</div>
