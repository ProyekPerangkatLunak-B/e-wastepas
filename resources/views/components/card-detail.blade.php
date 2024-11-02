<div class="w-full max-w-xs transition-shadow duration-300 bg-white border border-gray-200 shadow-md rounded-xl hover:shadow-lg">
    <div class="flex flex-col items-center pb-5">
        <div class="w-full h-40 overflow-hidden bg-white rounded-t-xl">
            <img class="object-cover w-full h-full" src="{{ $image }}" alt="{{ $title }}" />
        </div>
        <div class="flex flex-col items-center justify-center p-4 text-center">
            <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
            <p class="mt-1 text-sm text-gray-500">{{ $description }}</p>
        </div>
    </div>
</div>
