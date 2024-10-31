@extends('manajemen.registrasi.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="min-h-screen flex relative">
        <!-- Tombol Kembali -->
        <a href="{{ url()->previous() }}"
            class="absolute top-6 left-6 text-gray-600 inline-flex items-center text-sm font-semibold">
            <!-- Membungkus hanya ikon dengan lingkaran -->
            <span class="border border-gray-300 rounded-full p-2 hover:bg-gray-200 inline-flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </span>
            <!-- Teks "Back" di luar lingkaran -->
            <span class="ml-2">Back</span>
        </a>

        <!-- Bagian Kiri: Form Forgot Password -->
        <div
            class="w-full md:w-1/2 flex flex-col justify-center items-center bg-white p-8 md:pl-20 border-r-2 border-gray-200">
            <div class="w-full max-w-sm bg-white p-10 shadow-xl rounded-lg">
                <!-- Judul dan Deskripsi -->
                <h2 class="text-3xl font-extrabold text-center mb-4">Forgot Password</h2>
                <p class="text-gray-600 text-center text-base mb-4">No Worries! Enter your email address below, and we'll
                    send a link to reset your password.</p>

                <!-- Form -->
                <form action="{{ route('manajemen.password.email') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2" for="email">Email</label>
                        <input type="email" id="email" name="email"
                            class="border border-gray-300 rounded-full w-full py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400"
                            placeholder="Enter your email address" required>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-lg shadow-sm">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bagian Kanan: Gambar Ilustrasi -->
        <div class="hidden md:block w-1/2 h-screen">
            <div class="h-full bg-cover bg-center"
                style="background-image: url('{{ asset('images/tree-microchip.png') }}'); background-size: cover;">
                <!-- Background gambar ilustrasi -->
            </div>
        </div>
    </div>
@endsection
