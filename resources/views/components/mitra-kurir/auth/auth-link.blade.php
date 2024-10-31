@php
    // Tentukan kelas posisi berdasarkan parameter 'position'
    $positionClass = match ($position ?? 'center') {
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-center' 
    };
@endphp

<p class="mt-10 {{ $positionClass }} text-sm text-gray-500">
    {{ $message }} 
    <a href="{{ $linkUrl }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
        {{ $linkText }}
    </a>
</p>