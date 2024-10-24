<div class="w-full max-w-sm bg-white border border-gray-200 rounded-2xl shadow-md hover:shadow-lg">
    <div class="flex flex-col items-center pb-10">
        <div class="h-48 rounded-full overflow-hidden bg-white mt-5">
            <img class="object-cover w-full h-full" src="{{ $image }}" alt="{{ $tittle }}"/>
        </div>
        <div class="flex flex-col items-center justify-center h-40 p-4 text-center">
            <h3 class="text-2xl font-semibold text-gray-900">{{ $tittle }}</h3>
            <p class="mt-2 text-base text-gray-500">{{ $description }}</p>
        </div>
    </div>
</div>