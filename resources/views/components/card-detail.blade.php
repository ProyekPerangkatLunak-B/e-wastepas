<div class="relative w-[450px] h-[350px] shadow-md bg-white-100 pb-8 rounded-2xl group hover:shadow-lg">
    <div class="w-full h-48 overflow-hidden bg-white rounded-t-xl">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
    </div>
    <div class="p-4">
        <h3 class="text-lg font-semibold text-gray-900 text-left">{{ $title }}</h3>
        <p class="mt-1 text-sm text-gray-500 text-left">{{ $description }}</p>
    </div>
</div>

{{-- <div class="relative w-[450px] h-[350px] shadow-md bg-white-100 pb-8 rounded-2xl group hover:shadow-lg">
    <div class="w-[450px] h-[228px] overflow-hidden bg-white rounded-t-xl">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
    </div>
    <div class="flex flex-col items-start justify-center pt-4 text-center">
        <h3 class="mt-2 mb-2 ml-8 text-2xl font-semibold text-gray-900">{{ $title }}</h3>
        <p class="ml-8 text-gray-500 text-md text-left">{{ $description }}</p>
    </div>
</div> --}}
