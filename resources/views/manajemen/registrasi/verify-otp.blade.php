@extends('manajemen.registrasi.app')

@section('title', 'Konfirmasi OTP')

@section('content')
    <!-- Container utama -->
    <div class="min-h-screen bg-white">
        <!-- Header dengan Logo dan Nama -->
        <div class="bg-gradient-to-b from-green-100 to-transparent py-4 px-8">
            <div class="flex items-center">
                <img src="{{ asset('img/manajemen/registrasi/logo.png') }}" alt="Logo" class="h-10 w-10 mr-3">
                <h2 class="text-green-700 text-xl font-bold">E-WastePas</h2>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="flex flex-col justify-center items-center mt-8">
            <!-- Ikon Amplop -->
            <div class="mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-800" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>

            <!-- Judul -->
            <h1 class="text-3xl font-bold mb-4">Konfirmasi OTP</h1>
            <p class="text-gray-600 text-center mb-8">Silahkan masukan kode verifikasi yang kami kirimkan ke email anda</p>

            <!-- Input OTP -->
            <form action="{{ route('manajemen.registrasi.register') }}" method="POST">
                @csrf
                <div class="flex space-x-4 mb-8">
                    <input type="text" maxlength="1"
                        class="w-16 h-16 text-center text-xl font-semibold border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 shadow-md" />
                    <input type="text" maxlength="1"
                        class="w-16 h-16 text-center text-xl font-semibold border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 shadow-md" />
                    <input type="text" maxlength="1"
                        class="w-16 h-16 text-center text-xl font-semibold border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 shadow-md" />
                    <input type="text" maxlength="1"
                        class="w-16 h-16 text-center text-xl font-semibold border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 shadow-md" />
                    <input type="text" maxlength="1"
                        class="w-16 h-16 text-center text-xl font-semibold border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 shadow-md" />
                </div>

                <!-- Button Submit -->
                <div class="flex justify-center mt-10">
                    <button type="button"
                        class="h-12 font-bold rounded-lg w-80 focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l"
                        onclick="openModal('modelConfirm')">
                        Kirim
                    </button>
                </div>
                <p class="mt-4 text-gray-600 text-sm text-center">
                    <a href="{{ route('manajemen.registrasi.verify-otp') }}"
                        class="text-green-500 font-semibold hover:underline">Kirim ulang</a>
                </p>
            </form>
        </div>

        <!-- Pop-up Modal -->
        <div id="modelConfirm"
            class="fixed inset-0 z-50 hidden w-full h-full px-4 overflow-y-auto bg-gray-900 bg-opacity-60 ">
            <div class="relative max-w-md mx-auto bg-gray-100 rounded-lg shadow-xl top-40">
                <div class="flex justify-end p-2">
                    <button onclick="closeModal('modelConfirm')" type="button"
                        class="text-gray-400 bg-white hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 pt-0 text-center">
                    <h2 class="text-xl font-bold text-gray-900"> Konfirmasi OTP berhasil</h2>
                    <div class="mail-reset">
                        <img src="../img/masyarakat/registrasi/popup-reset.png" alt=""
                            class="flex justify-center h-20 mx-auto w-25">
                        <h3 class="mt-5 mb-6 font-medium text-gray-500 text-md"> Selamat Anda Berhasil Melakukan Konfirmasi
                            Kode !! </h3>
                        <a href="{{ route('manajemen.registrasi.login') }}" onclick="closeModal('modelConfirm')"
                            class="focus:outline-none text-slate-50 font-bold bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l rounded-lg px-5 py-2.5 text-center mr-2">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openModal(id) {
                document.getElementById(id).style.display = 'block';
            }

            function closeModal(id) {
                document.getElementById(id).style.display = 'none';
            }
        </script>
    </div>
@endsection
