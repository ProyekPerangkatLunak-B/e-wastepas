<div class="mb-4">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-700">{{ $label }}</label>
    <select id="{{ $id }}" name="{{ $name }}" class="w-full px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
        {{ $slot }}
    </select>
</div>
