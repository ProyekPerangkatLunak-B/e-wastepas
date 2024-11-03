<div class=" w-full h-auto max-w-sm bg-neutral-50 border border-gray-200 rounded-2xl shadow-md hover:shadow-lg">
    <div class="flex flex-col items-center pb-10">
        <div class="h-36 rounded-full overflow-hidden bg-white mt-5">
            <img class="object-cover w-full h-full" src="{{ $image }}" alt="{{ $tittle }}"/>
        </div>
        <div class="flex flex-col items-center justify-center p-4 text-center">
            <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
            <p class="mt-1 text-sm text-gray-500">{{ $description }}</p>
        </div>
    </div>
</div>
