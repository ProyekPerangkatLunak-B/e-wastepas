<div class="relative w-[450px] h-[310px] shadow-sm bg-white-100 pb-10 rounded-2xl group hover:shadow-md">
    <div class="w-full h-[228px] overflow-hidden bg-white rounded-t-2xl">
        <img src="{{ $image }}" alt="{{ $title }}" class="object-cover w-full h-full">
    </div>
    <div class="flex flex-col justify-between px-8 pt-4 h-[calc(100%-228px)]">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-900 break-words">{{ $title }}</h3>
        </div>
    </div>
</div>
