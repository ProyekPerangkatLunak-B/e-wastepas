<div class="flex items-center mt-6">
    <input id="{{ $id }}" name="{{ $name }}" type="checkbox" required class="h-4 w-4 accent-green-600 focus:ring-green-500 border-gray-300 rounded">
    <label for="{{ $id }}" class="ml-2 block text-sm text-gray-900 mt-2">
        Saya menyetujui 
        <a href="{{ route('/mitra-kurir/registrasi/syarat-dan-ketentuan') }}" class="text-blue-500 hover:text-blue-700">Syarat & Ketentuan</a>
    </label>
</div>