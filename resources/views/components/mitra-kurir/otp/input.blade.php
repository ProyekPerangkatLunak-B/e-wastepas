<div class="flex justify-center">
    <div class="flex gap-4">
        @for ($i = 1; $i <= 4; $i++)
            <input id="otp{{ $i }}" name="otp{{ $i }}" type="text" maxlength="1"  
                style="width: 80px; height: 80px; font-size: 48px;"  
                class="text-center text-4xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
                focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 ease-in-out 
                hover:scale-105">
        @endfor
    </div>
</div>
