<div class=" w-[321px] h-[373px] max-w-sm bg-neutral-50 border border-gray-200 rounded-2xl shadow-md hover:shadow-lg mx-auto">
    <div class="flex flex-col items-center pb-5 ">
        <div class="h-20 rounded-full overflow-hidden bg-white mt-5">
            <img class="object-cover w-full h-full" src="{{$image}}" alt=""/>
        </div>
        <div class="flex">
            <ul class="my-4 space-y-4">
                <li class="text-center items-center">
                    <span class="  text-2xl font-bold ">{{$title}}</span>
                </li>    
                <li class="text-center items-center ">
                    <span class="text-xl font-semibold text-[#569F52]">{{$jenis}}</span>
                </li>    
                <li class="w-48 text-center flex items-center justify-center gap-2 p-3 text-base font-bold text-gray-900 rounded-2xl bg-gray-200">
                    <i class="fa-solid fa-recycle text-3xl text-[#437252]"></i>
                    <span>{{$berat}} Poin</span>
                </li>
                <li class="w-48 flex items-center justify-center gap-2 p-3 text-base font-bold text-gray-900 rounded-2xl bg-gray-200">
                    <i class="fa-solid fa-trophy text-3xl text-[#437252]"></i>
                    <span>{{$poin}} Poin</span>
                </li>
                
            </ul>
        </div>
    </div>
</div>