<div class="relative w-[450px] h-[310px] shadow-sm bg-white-100 pb-10 rounded-2xl group hover:shadow-md">
    <div class="w-full h-[228px] overflow-hidden bg-white rounded-t-2xl">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
    </div>
    <div class="flex flex-col justify-between px-8 pt-4 h-[calc(100%-228px)]">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-900 break-words">{{ $title }}</h3>
            <div class="flex items-baseline">
                <span class="text-3xl font-bold text-secondary-normal">{{ $poin }}</span>
                <span class="ml-1 font-bold text-md text-black-normal">Poin</span>
            </div>
        </div>
    </div>
</div>
