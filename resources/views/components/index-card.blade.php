<div class="w-[460px] h-64 bg-neutral-50 border-solid border-gray-200 rounded-2xl shadow-md hover:shadow-lg mx-auto overflow-hidden flex flex-col items-center text-center">
    <div class="relative flex items-center justify-center w-full h-full text-center">
        <img class="object-cover w-full h-full blur-[2px]" src="{{$image}}" alt=""/>
        <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-40">
            <span class="text-2xl font-bold text-white-normal">{{$title}}</span>
            <span class="mt-2 text-lg text-white-normal">{{$description}}</span>
            <div class="flex flex-col items-center py-6 space-y-4">
                <a href="{{ $link }}" class="inline-flex items-center justify-center w-48 h-12 text-base font-bold transition-transform duration-300 transform shadow-lg text-white-normal bg-gradient-to-r from-secondary-normal to-primary-normal rounded-2xl hover:scale-105">Detail</a>
            </div>
        </div>
    </div>
</div>
