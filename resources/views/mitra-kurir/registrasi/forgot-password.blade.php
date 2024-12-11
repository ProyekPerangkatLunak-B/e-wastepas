@extends('mitra-kurir.registrasi.layout')
@section('title', 'Forgot Password')
@section('content')
<div class="bg-cover bg-center min-h-screen relative flex items-center justify-center p-4" style="background-image: url('/img/mitra-kurir/bg-otp.png');">
    <div style="background-color: white;" 
         class="rounded-[2rem] shadow-2xl w-full 
                sm:max-w-xl md:max-w-2xl lg:max-w-3xl
                p-8 sm:p-10 md:p-12 
                min-h-[500px] sm:min-h-[600px] md:min-h-[700px] 
                relative flex flex-col justify-center items-center">
        
        <div class="w-full max-w-md mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2 sm:mb-3">
                    Masukan Email Anda
                </h2>
                <p class="text-gray-500 text-xs sm:text-sm mb-8 sm:mb-12 px-4">
                    Kami akan mengirimkan tautan pengaturan ulang kata sandi ke email Anda.
                    Silakan periksa kotak masuk Anda.
                </p>
            </div>
            @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('status') }}
        </div>
         @endif
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

            <form method="POST" action="{{ route('reset-password.post'); }}" class="max-w-md w-full mx-auto px-4">
                @csrf
                <div class="mb-12 sm:mb-16 md:mb-24">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required
                        class="w-full mt-2 px-5 py-4 rounded-2xl font-medium bg-gray-100 text-md focus:outline-none  focus:bg-white"
                        placeholder="Email"
                    >
                </div>       
            </form>
        </div>

        <div class="absolute bottom-6 sm:bottom-8 md:bottom-12 w-full px-4 sm:px-8 md:px-12">
            <button
                type="button"
                onclick="showVerificationModal()"
                class="w-full sm:w-32 float-right
                       bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] py-2 px-4 rounded-md 
                       hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out 
                        transform hover:scale-105 !important text-sm sm:text-base"
            >
                Kirim
            </button>
        </div>
        
    </div>
</div>

{{-- pop up --}}
<div name="email-verification-modal" 
     style="display: none; background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; align-items: center; justify-content: center; z-index: 50;">
    <div style="background: white; padding: 20px; border-radius: 10px; width: 90%; max-width: 400px; text-align: center; position: relative;">
        <!-- Tombol Close -->
        <button onclick="closeVerificationModal()" 
        class="absolute top-3 right-3 hover:bg-gray-300 p-2 rounded-full transition-colors duration-300 ease-in-out transform hover:scale-105 z-50">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
        </button>

        <h2 class="text-xl font-bold mb-4">Periksa Email Anda</h2>
        <p class="text-gray-700 mt-4 text-lg">Kami akan mengirimkan OTP ke email Anda. Silakan periksa kotak masuk Anda.</p>
        <div class="flex justify-center mb-6">
            <img src="/img/mitra-kurir/icon-pop-up.png" alt="Success Icon" class="w-32 sm:w-40 !important">
        </div>
        <div class="text-center mt-3 sm:mt-4">
            <p class="text-gray-600 text-lg sm:text-lg">Tidak menerima email? 
            <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Kirim Ulang</a></p> 
        </div>
    </div>
</div>

<script>
    // function showVerificationModal() {
    //     const email = document.getElementById('email').value;
    //     if (!email) {
    //         alert('Please enter your email address');
    //         return;
    //     }
        
    //     // Tampilkan modal
    //     document.querySelector('[name="email-verification-modal"]').style.display = 'flex';
    // }

    // function closeVerificationModal() {
    //     // Sembunyikan modal
    //     document.querySelector('[name="email-verification-modal"]').style.display = 'none';
    // }

    // // Close modal ketika user klik di luar modal
    // document.querySelector('[name="email-verification-modal"]').addEventListener('click', function(e) {
    //     if (e.target === this) {
    //         closeVerificationModal();
    //     }
    // });
</script>
@endsection
