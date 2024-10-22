<header class="top-0 right-0 ps-12 pt-4 left-64 ms-[19rem]">
    <div class="container flex items-center justify-end">
        <div class="flex items-center space-x-2">
            <!-- Text Section -->
            <div class="flex flex-col items-end">
                <p class="font-bold text-gray-700">{{ $userName }}</p>
                <span class="text-sm text-gray-500">{{ $userRole }}</span>
            </div>
            <!-- Dummy Profile Picture -->
            <img src="{{ $profileImage }}" alt="Profile Image" class="border border-green-300 rounded-full shadow-sm w-14 h-14">
        </div>
    </div>
</header>
