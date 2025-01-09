<div class="relative w-[460px] h-auto pb-4 shadow-sm bg-white-100 rounded-2xl group hover:shadow-md border border-gray-200">
    <div class="w-[460px] h-[228px] overflow-hidden bg-white-normal rounded-t-xl">
        {{-- Poin diujung sebelah kanan --}}
        <div class="absolute top-0 right-0 z-10 flex items-center justify-center h-12 px-4 mx-auto bg-white-normal rounded-bl-xl rounded-tr-xl">
            <span class="text-3xl font-bold text-secondary-normal">{{ $poin }}</span>
            <span class="mt-3 ml-1 font-bold text-md text-black-normal">Poin</span>
        </div>
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
