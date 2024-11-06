@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center items-center w-full">
        <div class="max-w-screen-2xl bg-white shadow sm:rounded-lg flex justify-center">
            {{-- Kolom Gambar --}}
            <div class="flex-1 text-center hidden md:flex">
                <img src="{{ asset('img/bgRegist.jpg') }}" alt="Background Registration" class="object-cover w-full h-full">
            </div>

            {{-- Kolom Form OTP --}}
            <div class="md:w-2/3 xl:w-7/12 p-6 sm:p-12">
                <div class="mt-4 flex flex-col items-center">
                    <div class="logo">
                        <img src="{{ asset('img/logoEwaste.png') }}" alt="Logo Ewaste"
                            class="w-24 h-24 ms-36 align-self-center">
                        <h2 class="text-center text-2xl mt-8 font-bold leading-9 tracking-tight text-green-700">Verifikasi
                            OTP</h2>
                        <h2 class="text-center text-md mt-2 font-semibold text-gray-600">Masukkan kode OTP yang dikirimkan
                            ke email Anda</h2>
                    </div>

                    <!-- Form OTP -->
                    <div class="w-full flex-20 mt-8">
                        <div class="flex flex-col justify-around items-center"></div>
                        <div class="mx-auto max-w-md">
                            <form action="#" method="POST">
                                <div class="flex space-x-2 mt-4 justify-center">
                                    @for ($i = 0; $i < 6; $i++)
                                        <input
                                            class="w-12 h-12 text-center text-2xl rounded-lg font-medium bg-gray-100 border border-green-200 focus:outline-none focus:border-green-400 focus:bg-white"
                                            type="text" maxlength="1" required />
                                    @endfor
                                </div>

                                <!-- Button Submit -->
                                <button
                                    class="mt-8 tracking-wide font-semibold bg-green-400 text-white w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    Verifikasi
                                </button>
                            </form>

                            <!-- Link Kirim Ulang Kode dengan Timer -->
                            <div class="mt-4 text-center">
                                <p class="text-gray-600">Tidak menerima kode? <span id="resend-timer">Kirim ulang dalam
                                        <span id="timer">30</span> detik</span>.</p>
                                <button id="resend-button" class="text-green-600 font-semibold mt-2" style="display: none;"
                                    onclick="resendCode()">Kirim Ulang Kode</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Timer untuk fitur Kirim Ulang Kode
        let timer = 30;
        const timerDisplay = document.getElementById('timer');
        const resendButton = document.getElementById('resend-button');
        const resendTimer = document.getElementById('resend-timer');

        const countdown = setInterval(() => {
            timer--;
            timerDisplay.textContent = timer;
            if (timer <= 0) {
                clearInterval(countdown);
                resendTimer.style.display = 'none';
                resendButton.style.display = 'inline';
            }
        }, 1000);

        function resendCode() {
            // Logika untuk mengirim ulang kode
            timer = 30; // Set timer kembali ke 30 detik
            resendTimer.style.display = 'inline';
            resendButton.style.display = 'none';
            timerDisplay.textContent = timer;

            // Mulai ulang timer
            countdown = setInterval(() => {
                timer--;
                timerDisplay.textContent = timer;
                if (timer <= 0) {
                    clearInterval(countdown);
                    resendTimer.style.display = 'none';
                    resendButton.style.display = 'inline';
                }
            }, 1000);

            // Panggil API atau fungsi untuk mengirim ulang kode OTP di sini
            console.log('Kode OTP telah dikirim ulang');
        }
    </script>
@endsection
