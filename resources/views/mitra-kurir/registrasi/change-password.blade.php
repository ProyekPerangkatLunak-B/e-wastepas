@extends('mitra-kurir.registrasi.layout')
@section('title', 'Change Password')
@section('content')
    <div class="bg-cover bg-center min-h-screen relative flex items-center justify-center p-4"
        style="background-image: url('/img/mitra-kurir/bg-otp.png');">
        <div style="background-color: white;"
            class="rounded-[2rem] shadow-2xl w-full
                sm:max-w-xl md:max-w-2xl lg:max-w-3xl
                p-8 sm:p-10 md:p-12
                min-h-[500px] sm:min-h-[600px] md:min-h-[700px]
                relative flex flex-col justify-center items-center">

            <div class="w-full max-w-md mx-auto">
                <div class="text-center mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2 sm:mb-3">
                        Ganti Password
                    </h2>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul class="mt-2 list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <?php if (isset($success)): ?>
                <div
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 max-w-md mx-auto text-sm">
                    <?php echo $success; ?>
                </div>
                <?php endif; ?>

                <form method="POST" action="{{ route('reset-password-form.post') }}" class="max-w-md w-full mx-auto px-4">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}" required>
                    @include('components.mitra-kurir.auth.input', [
                        'id' => 'password',
                        'name' => 'password',
                        'label' => 'Kata Sandi Baru',
                        'type' => 'password',
                        'placeholder' => 'Masukkan Kata Sandi Baru',
                    ])
                    @include('components.mitra-kurir.auth.input', [
                        'id' => 'confirm-password',
                        'name' => 'ulangiPassword',
                        'label' => 'Konfirmasi Kata Sandi',
                        'type' => 'password',
                        'placeholder' => 'Masukkan Konfirmasi Kata Sandi',
                    ])
                    <div class="absolute bottom-6 sm:bottom-8 md:bottom-12 w-full px-4 sm:px-8 md:px-50 -ml-64">
                        <button type="submit" onclick="showVerificationModal()"
                            class="w-full sm:w-32 float-right
                               bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] py-2 px-4 rounded-md
                               hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out
                                transform hover:scale-105 !important text-sm sm:text-base">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    {{-- pop up --}}
    <div name="password-verification-modal"
        style="display: none; background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; align-items: center; justify-content: center; z-index: 50;">
        <div
            style="background: white; padding: 20px; border-radius: 10px; width: 90%; max-width: 400px; text-align: center; position: relative;">
            <!-- Tombol Close -->
            <button onclick="closeVerificationModal()"
                class="absolute top-3 right-3 hover:bg-gray-300 p-2 rounded-full transition-colors duration-300 ease-in-out transform hover:scale-105 z-50">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#000000">
                    <path
                        d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                </svg>
            </button>

            <h2 class="text-xl font-bold mb-4">Password Berhasil Diganti</h2>
            <div class="flex justify-center mb-6">
                <img src="/img/mitra-kurir/icon-pop-up.png" alt="Success Icon" class="w-32 sm:w-40 !important">
            </div>
            <div class="text-center mt-3 sm:mt-4">
                <p class="text-gray-600 text-lg sm:text-lg">Sekarang Anda bisa log in dengan kata sandi baru</p>
                <button onclick="closeModal()"
                    class="mt-6 px-4 py-2 bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] rounded-md hover:bg-gradient-to-r hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out transform hover:scale-105">Kembali
                </button>
            </div>
        </div>
    </div>

    {{-- <script>
    function showVerificationModal() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    console.log('Password:', password); // Debugging line
    console.log('Confirm Password:', confirmPassword); // Debugging line

    if (!password || !confirmPassword) {
        alert('Please fill in both password fields');
        return;
    }

    if (password !== confirmPassword) {
        alert('Password and confirmation password do not match');
        return;
    }

    // Debugging line to check if the modal is being shown
    console.log('Showing password verification modal');

    // Tampilkan modal
    const modal = document.querySelector('[name="password-verification-modal"]');
    modal.style.display = 'flex';

    // Check if modal display is 'flex' in the console
    console.log('Modal display style:', modal.style.display);
}

function closeVerificationModal() {
    // Debugging line to check if the modal is being closed
    console.log('Closing password verification modal');

    // Sembunyikan modal
    const modal = document.querySelector('[name="password-verification-modal"]');
    modal.style.display = 'none';

    // Check if modal display is 'none' in the console
    console.log('Modal display style:', modal.style.display);
}

// Close modal ketika user klik di luar modal
document.querySelector('[name="password-verification-modal"]').addEventListener('click', function(e) {
    if (e.target === this) {
        closeVerificationModal();
    }
});

</script> --}}
@endsection
