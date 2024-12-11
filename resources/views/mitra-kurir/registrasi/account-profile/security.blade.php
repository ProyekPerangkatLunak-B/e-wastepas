@extends('mitra-kurir.registrasi.account-profile.layout')
@section('title', 'Ganti Password')
@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center w-full py-8 mt-0">
    <div class="flex-1 bg-gray-100">
        <div class="container px-4 mx-auto py-8">
            <div style="background-color: white;" 
            class="rounded-[2rem] shadow-2xl w-full 
            sm:max-w-xl md:max-w-3xl lg:max-w-4xl
            p-4 sm:p-6 md:p-8 
            min-h-[500px] sm:min-h-[600px] md:min-h-[700px] 
            relative flex flex-col justify-center items-center
            mx-auto">

                <div class="text-left w-full mb-8">
                    <h2 class="text-2xl sm:text-2xl font-semibold text-gray-900 mb-2 sm:mb-3">
                        Ganti Password
                    </h2>
                </div>  
                @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                
                <div class="w-full max-w-md mx-auto">
                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <span class="block sm:inline">There were some problems with your input:</span>
                        <ul class="mt-2 list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form method="POST"  action="{{ route('mitra-kurir.registrasi.account-profile.security.post'); }}" class="max-w-md w-full mx-auto px-4" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            @include('components.mitra-kurir.auth.input', [
                                'id' => 'old-password', 
                                'name' => 'PasswordOld', 
                                'label' => 'Kata Sandi Lama', 
                                'type' => 'password', 
                                'placeholder' => 'Masukkan Kata Sandi Lama'
                            ])
                        </div>
                        <div class="mb-6">
                            @include('components.mitra-kurir.auth.input', [
                                'id' => 'new-password', 
                                'name' => 'PasswordNew', 
                                'label' => 'Kata Sandi Baru', 
                                'type' => 'password', 
                                'placeholder' => 'Masukkan Kata Sandi Baru'
                            ])
                        </div>
                        <div class="mb-6">
                            @include('components.mitra-kurir.auth.input', [
                                'id' => 'confirm-password', 
                                'name' => 'passwordConfirm', 
                                'label' => 'Konfirmasi Kata Sandi', 
                                'type' => 'password', 
                                'placeholder' => 'Konfirmasi Kata Sandi'
                            ])
                        </div>
                        <div class="mt-6">
                            <button type="submit"
                                    class="w-full sm:w-32 float-right
                                           bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] py-2 px-4 rounded-md 
                                           hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out 
                                           transform hover:scale-105 text-sm sm:text-base">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Tombol Kirim di Bawah -->
                
            </div>
        </div>
    </div>

    {{-- pop up --}}
    <div name="password-verification-modal" 
         style="display: none; background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; align-items: center; justify-content: center; z-index: 50;">
        <div style="background: white; padding: 20px; border-radius: 10px; width: 90%; max-width: 400px; text-align: center; position: relative;">
            <!-- Tombol Close -->
            <button onclick="closeVerificationModal()" 
            class="absolute top-3 right-3 hover:bg-gray-300 p-2 rounded-full transition-colors duration-300 ease-in-out transform hover:scale-105 z-50">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
            </button>

            <h2 class="text-xl font-bold mb-4">Password Berhasil Diganti</h2>
            <div class="flex justify-center mb-6">
                <img src="/img/mitra-kurir/icon-pop-up.png" alt="Success Icon" class="w-32 sm:w-40 !important">
            </div>
            <div class="text-center mt-3 sm:mt-4">
                <p class="text-gray-600 text-lg sm:text-lg">Sekarang Anda bisa log in dengan kata sandi baru</p> 
                <button type="submit" onclick="closeVerificationModal()" class="mt-6 px-4 py-2 bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] rounded-md hover:bg-gradient-to-r hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out transform hover:scale-105">Selesai
                </button>  
            </div>
        </div>
    </div> <!-- Added -->

    {{-- <script>
        function showVerificationModal() {
            const oldPassword = document.getElementById('old-password').value;
            const newPassword = document.getElementById('new-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            console.log('Old Password:', oldPassword); // Debugging line
            console.log('New Password:', newPassword); // Debugging line
            console.log('Confirm Password:', confirmPassword); // Debugging line

            if (!oldPassword || !newPassword || !confirmPassword) {
                alert('Please fill in all fields');
                return;
            }

            if (newPassword !== confirmPassword) {
                alert('New password and confirmation do not match');
                return;
            }

            // Tampilkan modal
            const modal = document.querySelector('[name="password-verification-modal"]');
            if (modal) {
                modal.style.display = 'flex';
                // Menambahkan event listener untuk menutup modal jika klik di luar
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeVerificationModal();
                    }
                });
            }
        }

        function closeVerificationModal() {
            const modal = document.querySelector('[name="password-verification-modal"]');
            if (modal) {
                modal.style.display = 'none';
            }
        }
    </script> --}}
@endsection