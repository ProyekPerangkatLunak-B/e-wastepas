<div class="mb-4">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-700">{{ $label }}</label>
    <input
        type="{{ $type }}"
        id="{{ $id }}"
        name="{{ $name }}"
        value="{{ $value ?? '' }}"
        placeholder="{{ $placeholder }}"
        class="w-3/4 px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-xl focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
</div>
