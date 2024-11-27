@extends('mitra-kurir.registrasi.account-profile.layout')
@section('title', 'Ganti Password')
@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center w-full py-8 mt-[5.5rem]">
    <div class="flex-1 bg-gray-100">
        <div class="container px-4 mx-auto py-8">
            <div style="background-color: white;" 
            class="rounded-[2rem] shadow-2xl w-full 
            sm:max-w-xl md:max-w-3xl lg:max-w-4xl
            p-4 sm:p-6 md:p-8 
            min-h-[500px] sm:min-h-[600px] md:min-h-[700px] 
            relative flex flex-col justify-center items-center
            mx-auto -mt-14">

                <div class="text-left w-full mb-8">
                    <h2 class="text-2xl sm:text-2xl font-semibold text-gray-900 mb-2 sm:mb-3">
                        Ganti Password
                    </h2>
                </div>

                <div class="w-full max-w-md mx-auto">
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

                    <form method="POST" class="max-w-md w-full mx-auto px-4" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            @include('components.mitra-kurir.auth.input', [
                                'id' => 'password', 
                                'name' => 'Password', 
                                'label' => 'Kata Sandi Lama', 
                                'type' => 'password', 
                                'placeholder' => 'Masukkan Kata Sandi Lama'
                            ])
                        </div>
                        <div class="mb-6">
                            @include('components.mitra-kurir.auth.input', [
                                'id' => 'password', 
                                'name' => 'Password', 
                                'label' => 'Kata Sandi Baru', 
                                'type' => 'password', 
                                'placeholder' => 'Masukkan Kata Sandi Baru'
                            ])
                        </div>
                        <div class="mb-6">
                            @include('components.mitra-kurir.auth.input', [
                                'id' => 'password', 
                                'name' => 'password', 
                                'label' => 'Konfirmasi Kata Sandi', 
                                'type' => 'password', 
                                'placeholder' => 'Konfirmasi Kata Sandi'
                            ])
                        </div>
                    </form>
                </div>

                <!-- Tombol Kirim di Bawah -->
                <div class="mt-6">
                    <button type="button"
                            onclick="showVerificationModal()"
                            class="w-full sm:w-32 float-right
                                   bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] py-2 px-4 rounded-md 
                                   hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out 
                                   transform hover:scale-105 text-sm sm:text-base">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection