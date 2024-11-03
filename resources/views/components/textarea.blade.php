<div class="mb-2">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-700">{{ $label }}</label>
    <textarea id="{{ $id }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
        class="w-full px-4 pt-2 text-sm text-gray-700 border border-gray-300 rounded-xl pb-28 bg-white-300 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200"
        rows="4">{{ $slot }}</textarea>
</div>
