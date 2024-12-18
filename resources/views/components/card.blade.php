<div class="relative w-[460px] h-auto pb-4 shadow-sm bg-white-100 rounded-2xl group hover:shadow-md border border-gray-200">
    <div class="w-[460px] h-[228px] overflow-hidden bg-white-normal rounded-t-xl">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
    </div>
    <div class="flex flex-col items-start justify-between h-[calc(100%-228px)] pt-4">
        <div class="flex-grow">
            <h3 class="w-full my-2 text-2xl font-semibold text-center text-gray-900">{{ $title }}</h3>
            <p class="mx-8 text-justify text-gray-500 text-md">{{ $description }}</p>
        </div>
        <a href="{{ $link }}" class="inline-grid text-center mx-8 items-center w-[400px] h-[45px] mt-4 text-md font-medium text-gray-100 border rounded-xl bg-gradient-to-r from-secondary-normal to-primary-normal border-tertiary-normal">Detail</a>
    </div>
</div>
