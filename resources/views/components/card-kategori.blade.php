<div class="max-w-sm bg-white rounded-2xl shadow-sm bg-white-100 hover:shadow-md border border-gray-200 pb-4 flex flex-col">
    <div class="aspect-w-4 aspect-h-3">
        <img class="rounded-t-xl object-cover w-full h-full" src="{{ $image }}" alt="{{ $title }}" />
    </div>
    <div class="p-5 flex-grow">
        <div class="pt-5">
            <h3 class="mb-2 text-2xl font-semibold tracking-tight text-center text-gray-900 dark:text-white">{{ $title }}</h3>
            <p class="mb-3 text-justify text-gray-500 text-md">{{ $description }}</p>
        </div>
    </div>
    <div class="px-4"> 
        <a href="{{ $link }}" class="inline-flex justify-center items-center w-full h-[45px] text-md font-medium text-white rounded-xl bg-gradient-to-r from-secondary-normal to-primary-normal text-gray-100 hover:from-secondary-hover hover:to-primary-hover">
            Detail
        </a>
    </div>
</div>
