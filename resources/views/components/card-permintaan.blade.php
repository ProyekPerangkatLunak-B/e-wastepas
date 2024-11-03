<div class=" w-full h-auto max-w-sm bg-neutral-50 border border-gray-200 rounded-2xl shadow-md hover:shadow-lg">
    <div class="flex flex-col items-center pb-5">
        <div class="h-20 rounded-full overflow-hidden bg-white mt-5">
            <img class="object-cover w-full h-full" src="{{ $image }}" alt="{{ $name }}"/>
        </div>
        <div class="flex flex-col items-center p-4 text-center">
            <h3 class="text-base font-semibold text-gray-900">{{ $name }}</h3>
            <p class="mt-1 text-sm text-gray-500">{{ $status }}</p>
        </div>
        <div>
            <ul class="my-4 space-y-3">
                <li>
                    <a href="#" class="w-64 flex items-center p-3 text-base font-bold text-gray-900 rounded-2xl bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-slate-200 dark:hover:bg-gray-500 dark:text-white">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="{{ $imageItem }}" alt="{{ $item }}">
                    </div>
                    <span class="flex-1 ms-3 whitespace-nowrap text-lg font-normal">{{ $item }}</span>
                    <span class="inline-flex items-center justify-center px-2 py-0.5 ms-3 text-base font-medium text-lime-900  ">{{ $pcs }} Pcs</span>
                    </a>
                </li>
                
            </ul>
            <div class="flex flex-col items-center text-center">
                <a href="{{ $link }}" type="button" class="focus:outline-none  text-white-100 bg-gradient-to-b from-green-400 to-green-600 hover:bg-gradient-to-t focus:ring-4 focus:ring-green-300 font-semibold w-40 rounded-2xl text-base px-5 py-2.5 me-2 mb-2 ">Detail</a>
            </div>
        </div>
    </div>
</div>