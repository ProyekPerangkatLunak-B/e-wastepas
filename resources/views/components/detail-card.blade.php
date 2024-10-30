<div class="relative w-full bg-white rounded-lg shadow-md group hover:shadow-lg">
    <div class="w-full h-56 overflow-hidden bg-white rounded-t-xl">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
    </div>
    <div class="flex flex-col items-center justify-center h-40 pb-10 text-center">
        <h3 class="text-2xl font-semibold text-gray-900">{{ $title }}</h3>
        <p class="mt-2 text-base text-gray-500">{{ $description }}</p>
    </div>
</div>
