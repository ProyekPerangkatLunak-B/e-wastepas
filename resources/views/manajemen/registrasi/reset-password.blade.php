<form action="{{ route('manajemen.password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <!-- Input Email -->
    <div class="mb-4">
        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $email) }}"
            class="border border-gray-300 rounded-full w-full py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400"
            required>
        @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Input Password Baru -->
    <div class="mb-4">
        <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password Baru</label>
        <input type="password" id="password" name="password"
            class="border border-gray-300 rounded-full w-full py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400"
            required>
        @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Input Konfirmasi Password -->
    <div class="mb-4">
        <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Konfirmasi Password
            Baru</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
            class="border border-gray-300 rounded-full w-full py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400"
            required>
        @error('password_confirmation')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Tombol Submit -->
    <div>
        <button type="submit"
            class="w-full py-4 mt-4 text-base font-bold rounded-lg text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l text-center shadow-md transition-all">Reset
            Password</button>
    </div>
</form>
