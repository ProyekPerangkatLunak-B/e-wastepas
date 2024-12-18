{{-- @extends('mitra-kurir.registrasi.layout')
@section('title', 'OTP Verification')
@section('content')
  <div class="flex flex-col md:flex-row min-h-screen">

    <form method="POST" action="{{ route('otp.validation', $user->id_pengguna) }}">
        @csrf

        <div>
            <label for="otp">{{ __('OTP CODE') }}</label>
            <input id="otp"  name="otp_token" >

            <!-- Display error message for otp_code -->
            @error('otp_code')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="flex items-center justify-center mt-4">
            <button type="submit">
                {{ __('Validate OTP CODE') }}
            </button>
        </div>
    </form>

  </div>
@endsection --}}

@extends('mitra-kurir.registrasi.layout')
@section('title', 'Verifikasi OTP')
@section('content')
    <div class="bg-cover bg-center min-h-screen relative" style="background-image: url('/img/mitra-kurir/bg-otp.png');">
        <div class="absolute top-4 left-4 sm:top-6 sm:left-6">
            <img src="/img/mitra-kurir/logoEwasteText.png" alt="logo OTP" class="w-full max-w-[200px] h-auto">
        </div>

        <div class="flex items-center justify-center min-h-screen">
            <div class="container mx-auto px-4 py-8 max-w-2xl">
                <div class="flex justify-center mb-4">
                    <img src="/img/mitra-kurir/icon-otp.png" alt="logo OTP" class="w-48 sm:w-56 !important">
                </div>
                <div class="text-center mb-8">
                    <h2 class="text-xl sm:text-3xl font-bold text-gray-900 mb-2 sm:mb-3">
                        Konfirmasi OTP
                    </h2>
                    <p class="text-gray-500 text-md sm:text-md mb-8 sm:mb-12 px-4">
                        Silahkan masukan kode verifikasi yang kami kirim kan ke email anda
                    </p>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form action="{{ route('otp.validation', $user->id_pengguna) }}" method="POST"
                        class="mt-6 sm:mt-8 space-y-4 sm:space-y-6">
                        @csrf

                        <div>
                            <!-- Display error message for otp_code -->
                            @error('otp_code')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- @include('components.mitra-kurir.otp.input') --}}
                        <div>
                            <div class="flex justify-center">
                                <div class="flex gap-2 sm:gap-4">
                                    <input id="otp1" name="otp1" type="text" maxlength="1"
                                        class="w-14 sm:w-20 md:w-24 lg:w-28
                                           h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
                                    focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out
                                    hover:scale-105">
                                    <input id="otp2" name="otp2" type="text" maxlength="1"
                                        class="w-14 sm:w-20 md:w-24 lg:w-28
                                           h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
                                    focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out
                                    hover:scale-105">
                                    <input id="otp3" name="otp3" type="text" maxlength="1"
                                        class="w-14 sm:w-20 md:w-24 lg:w-28
                                           h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
                                    focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out
                                    hover:scale-105">
                                    <input id="otp4" name="otp4" type="text" maxlength="1"
                                        class="w-14 sm:w-20 md:w-24 lg:w-28
                                           h-14 sm:h-20 md:h-24 lg:h-28 text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold border border-gray-300 rounded-lg bg-gray-100 shadow-md
                                    focus:ring-2 focus:ring-green-600 focus:outline-none transition duration-200 ease-in-out
                                    hover:scale-105">
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" style="color: white !important;"
                                class="flex w-full justify-center rounded-lg bg-gradient-to-r from-green-500 to-green-700 mt-10 px-4 py-3 text-md font-semibold leading-6 shadow-sm hover:bg-gradient-to-r hover:from-green-600 hover:to-green-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Kirim</button>
                        </div>

                    </form>
                    {{-- Buttton Kirim Ulang --}}
                    <div class="flex justify-center items-center">
                        <button id="submitButton" type="submit"
                            class="flex justify-center rounded-lg text-green-600 mt-6 px-4 py-3 text-md font-semibold leading-6 shadow-sm hover:text-white hover:bg-gradient-to-r hover:from-green-500 hover:to-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 border border-green-600"
                            style="color: #4CAF50; transition: color 0.3s ease; background-color: transparent;"
                            onmouseover="this.style.color='white'" onmouseout="this.style.color='#4CAF50'"
                            onclick="startTimer()">
                            Kirim Ulang (<span id="timer">60</span>)
                        </button>
                    </div>
                </div>

                <!-- Success Modal -->
                <div id="successModal" class="fixed inset-0 flex items-center justify-center z-50" style="display: none;">
                    <div class="absolute inset-0 bg-gray-900 bg-opacity-50"></div>

                    <div class="relative rounded-lg p-8 max-w-sm text-center z-10 shadow-lg"
                        style="background-color: white;">
                        <p class="text-xl font-semibold">Selamat anda sudah berhasil mengunggah dokumen anda</p>
                        <div class="mt-4">
                            <img src="/img/mitra-kurir/icon-pop-up.png" alt="Success Icon" class="mx-auto h-16 w-16">
                        </div>
                        <p class="mt-4">Butuh Waktu 7x24 Jam Untuk Admin Memvalidasi</p>
                        <button onclick="closeModal()" class="mt-6 px-4 py-2 bg-green-700 text-[#FFFFFF] rounded-md">Kembali
                            ke Menu Utama</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Script Timer  --}}
    <script>
        function startTimer() {
            const button = document.getElementById('submitButton');
            const timerElement = document.getElementById('timer');
            let timeLeft = 60;


            button.disabled = true;
            button.style.opacity = "0.6";

            // Update the timer every second
            const timerInterval = setInterval(() => {
                timeLeft--;
                timerElement.textContent = timeLeft;

                // Stop the timer when it reaches 0
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    button.disabled = false;
                    button.style.opacity = "1";
                    timerElement.textContent = "60";
                }
            }, 1000);
        }
    </script>

@endsection
