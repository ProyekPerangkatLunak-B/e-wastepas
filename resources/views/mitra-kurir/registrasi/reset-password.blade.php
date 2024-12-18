@extends('mitra-kurir.registrasi.layout')
@section('title', 'Reset Password')
@section('content')
    <div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
        <div
            class="bg-white rounded-[2rem] shadow-2xl w-full sm:max-w-xl md:max-w-2xl lg:max-w-3xl
                    p-4 sm:p-6 md:p-8 min-h-[500px] sm:min-h-[600px] md:min-h-[700px]
                    flex flex-col justify-center items-center">

            <div class="w-full max-w-md mx-auto">
                <!-- Header -->
                <div class="text-left mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2 sm:mb-3">
                        Ganti Password
                    </h2>
                </div>

                <!-- Error Message -->
                @if (isset($error))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                        {{ $error }}
                    </div>
                @endif

                <!-- Success Message -->
                @if (isset($success))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                        {{ $success }}
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" class="w-full">
                    <div class="mb-6">
                        @include('components.mitra-kurir.auth.input', [
                            'id' => 'password',
                            'name' => 'password',
                            'label' => 'Kata Sandi Baru',
                            'type' => 'password',
                            'placeholder' => 'Masukkan Kata Sandi Baru',
                        ])
                    </div>
                    <div class="mb-6">
                        @include('components.mitra-kurir.auth.input', [
                            'id' => 'password_confirmation',
                            'name' => 'password_confirmation',
                            'label' => 'Konfirmasi Kata Sandi',
                            'type' => 'password',
                            'placeholder' => 'Konfirmasi Kata Sandi',
                        ])
                    </div>

                    <!-- Submit Button -->

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <!-- Modal -->
    <div name="password-verification-modal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
            <!-- Close Button -->
            <button onclick="closeVerificationModal()"
                class="absolute top-2 right-2 hover:bg-gray-200 p-2 rounded-full transition-transform transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M14.348 5.652a.5.5 0 0 1 0 .708L10.707 10l3.641 3.64a.5.5 0 0 1-.707.708L10 10.707l-3.641 3.641a.5.5 0 1 1-.708-.707L9.293 10l-3.641-3.641a.5.5 0 0 1 .708-.708L10 9.293l3.641-3.641a.5.5 0 0 1 .707 0z"
                        clip-rule="evenodd" />
                </svg>
            </button> --}}
{{--
            <!-- Modal Content -->
            <h3 class="text-lg font-semibold mb-4">Konfirmasi Password</h3>
            <p class="mb-6">Apakah Anda yakin ingin mengubah password?</p>
            <div class="flex justify-end space-x-2">
                <button onclick="closeVerificationModal()"
                    class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400 transition">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                    Konfirmasi
                </button>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        function showVerificationModal() {
            const password = document.getElementById('password').value;
            if (!password) {
                alert('Masukkan kata sandi terlebih dahulu!');
                return;
            }
            document.querySelector('[name="password-verification-modal"]').classList.remove('hidden');
        }

        function closeVerificationModal() {
            document.querySelector('[name="password-verification-modal"]').classList.add('hidden');
        }

        document.querySelector('[name="password-verification-modal"]').addEventListener('click', function(e) {
            if (e.target === this) closeVerificationModal();
        });
    </script> --}}
@endsection
