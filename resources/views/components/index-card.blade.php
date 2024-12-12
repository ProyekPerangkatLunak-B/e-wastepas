<div class="relative w-[450px] h-[400px] shadow-md bg-white-100 rounded-2xl group hover:shadow-lg">
    <div class="w-[450px] h-[228px] overflow-hidden bg-white-normal rounded-t-xl z-0">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
    </div>
    <div class="flex flex-col items-start justify-center pt-4 text-center">
        <h3 class="mx-auto my-2 text-2xl font-semibold text-gray-900">{{ $title }}</h3>
        <p class="mx-auto text-gray-500 text-md">{{ $description }}</p>
        <a href="{{ $link }}" class="inline-grid mx-auto items-center w-[400px] h-[45px] mt-4 text-md font-medium text-gray-100 border rounded-xl bg-gradient-to-r from-secondary-normal to-primary-normal border-tertiary-normal">Detail</a>
        
    </div>
</div>
