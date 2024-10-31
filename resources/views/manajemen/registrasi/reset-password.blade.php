@extends('manajemen.registrasi.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-center mb-4">Reset Password</h2>
        
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="mb-4">
                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email" class="border border-gray-300 rounded w-full py-2 px-4" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-bold text-gray-700 mb-2">New Password</label>
                <input type="password" name="password" id="password" class="border border-gray-300 rounded w-full py-2 px-4" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-300 rounded w-full py-2 px-4" required>
            </div>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 rounded">Reset Password</button>
        </form>
    </div>
</div>
@endsection
