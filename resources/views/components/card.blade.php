<div class="relative w-[450px] h-auto pb-4 shadow-md bg-white-100 rounded-2xl group hover:shadow-lg">
    <div class="w-[450px] h-[228px] overflow-hidden bg-white-normal rounded-t-xl">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
    </div>
    <div class="flex flex-col items-start justify-center pt-4">
        <h3 class="w-full mt-2 mb-2 text-2xl font-semibold text-center text-gray-900">{{ $title }}</h3>
        <p class="ml-8 mr-8 text-center text-gray-500 text-md">{{ $description }}</p>
        <a href="{{ $link }}" class="inline-grid text-center mx-8 items-center w-[400px] h-[45px] mt-4 text-md font-medium text-gray-100 border rounded-xl bg-gradient-to-r from-secondary-normal to-primary-normal border-tertiary-normal">Detail</a>
    </div>
</div>
