@extends('mitra-kurir.registrasi.layout')
@section('title', 'Reset Password')
@section('content')
<div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div style="background-color: white;" 
         class="rounded-[2rem] shadow-2xl w-full 
                sm:max-w-xl md:max-w-2xl lg:max-w-3xl
                p-4 sm:p-6 md:p-8 
                min-h-[500px] sm:min-h-[600px] md:min-h-[700px] 
                relative flex flex-col justify-center items-center">
        
        <div class="w-full max-w-md mx-auto">
            <div class="text-left mb-8">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2 sm:mb-3">
                    Ganti Password
                </h2>
            </div>

            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 max-w-md mx-auto text-sm">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 max-w-md mx-auto text-sm">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="max-w-md w-full mx-auto px-4">
                <div class="mb-6">
                    @include('components.mitra-kurir.auth.input', ['id' => 'password', 'name' => 'password', 'label' => 'Kata Sandi Baru', 'type' => 'password', 'placeholder' => 'Masukkan Kata Sandi Baru'])
                </div>
                <div class="mb-6">
                    @include('components.mitra-kurir.auth.input', ['id' => 'password', 'name' => 'password', 'label' => 'Konfirmasi Kata Sandi', 'type' => 'password', 'placeholder' => 'Konfirmasi Kata Sandi'])
                </div>
            </form>
        </div>

        <!-- Tombol Kirim di Bawah -->
        <div class="absolute bottom-6 sm:bottom-8 md:bottom-12 w-full px-4 sm:px-8 md:px-12">
            <button
                type="button"
                onclick="showVerificationModal()"
                class="w-full sm:w-32 float-right
                    bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] py-2 px-4 rounded-md 
                    hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out 
                    transform hover:scale-105 text-sm sm:text-base"
            >
                Kirim
            </button>
        </div>
    </div>
</div>

{{-- modal pop up baru --}}
<div name="password-verification-modal" 
     style="display: none; background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; align-items: center; justify-content: center; z-index: 50;">
    <div style="background: white; padding: 20px; border-radius: 10px; width: 90%; max-width: 400px; text-align: center; position: relative;">
        <!-- Tombol Close -->
        <button onclick="closeVerificationModal()" 
        class="absolute top-3 right-3 hover:bg-gray-300 p-2 rounded-full transition-colors duration-300 ease-in-out transform hover:scale-105 z-50">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
        </button>

        <h2 class="text-lg font-bold mb-4">Password Berhasil Diganti</h2>
        <div class="flex justify-center mb-4">
            <img src="/img/mitra-kurir/icon-pop-up.png" alt="Success Icon" class="w-32 sm:w-40 !important">
        </div>
        <p class="text-gray-700 mt-4">Sekarang Anda Bisa Log In Dengan Kata Sandi Baru.</p>
        <button onclick="closeVerificationModal()" class="mt-6 px-4 py-2 bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] rounded-md hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out transform hover:scale-105">
            Kembali
        </button>

    </div>
</div>

{{-- script baru --}}
<script>
    function showVerificationModal() {
        const password = document.getElementById('password').value;
        if (!password) {
            alert('Please enter your password address');
            return;
        }
        
        // Tampilkan modal
        document.querySelector('[name="password-verification-modal"]').style.display = 'flex';
    }

    function closeVerificationModal() {
        // Sembunyikan modal
        document.querySelector('[name="password-verification-modal"]').style.display = 'none';
    }

    // Close modal ketika user klik di luar modal
    document.querySelector('[name="password-verification-modal"]').addEventListener('click', function(e) {
        if (e.target === this) {
            closeVerificationModal();
        }
    });
</script>
@endsection
