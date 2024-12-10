{{-- versi looping --}}
{{-- <div class="flex justify-center">
    <div class="flex gap-2 sm:gap-4">
        @for ($i = 1; $i <= 4; $i++)
            <input id="otp{{ $i }}" name="otp{{ $i }}" type="text" maxlength="1"  
                class="w-14 sm:w-20 md:w-24 lg:w-28
                       h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
                focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out 
                hover:scale-105">
        @endfor
    </div>
</div> --}}

{{-- versi inputan --}}
<div class="flex justify-center">
    <div class="flex gap-2 sm:gap-4">
        <input id="otp1" name="otp1" type="text" maxlength="1"  
            class="w-14 sm:w-20 md:w-24 lg:w-28
                   h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
            focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out 
            hover:scale-105">
        <input id="otp2" name="otp2" type="text" maxlength="1"  
            class="w-14 sm:w-20 md:w-24 lg:w-28
                   h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
            focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out 
            hover:scale-105">
        <input id="otp3" name="otp3" type="text" maxlength="1"  
            class="w-14 sm:w-20 md:w-24 lg:w-28
                   h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
            focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out 
            hover:scale-105">
        <input id="otp4" name="otp4" type="text" maxlength="1"  
            class="w-14 sm:w-20 md:w-24 lg:w-28
                   h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
            focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out 
            hover:scale-105">
    </div>
</div>

