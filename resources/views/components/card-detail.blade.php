<div class=" w-full h-auto max-w-sm bg-neutral-50 border border-gray-200 rounded-2xl shadow-md hover:shadow-lg">
    <div class="flex flex-col items-center pb-2">
        <div class="w-full h-56 overflow-hidden bg-white rounded-t-xl">
            <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
        </div>
        <div class="flex flex-col items-center justify-center p-4 text-center">
            <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
            <p class="mt-1 text-sm text-gray-500">{{ $description }}</p>
        </div>
    </div>
</div>
