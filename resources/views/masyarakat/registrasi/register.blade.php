@extends('layouts/app')
@section('content')

<div class="min-h-screen bg-white text-gray-900 flex justify-center item-center w-full">
        <div class="md:w-2/3 xl:w-7/12 p-6 sm:p-12">
           <div class="mt-5 flex flex-col items-center">
              <div class="logo">
              <img src="../img/logoEwaste.png" alt="" class="w-24 h-24 mx-auto flex justify-center">
              <h2 class="text-center text-2xl mt-8 font-bold leading-9 tracking-tight text-green-700">Selamat Datang di E-WastePas</h2>
            </div>

            <!-- Registrasi -->

            <div class="w-full flex-20 mt-2">
                <div class="flex flex-col flex justify-around items-center">

            </div>

            <!-- Form Registrasi -->
                <div class="mx-auto max-w-md">
                <form action="{{ route('masyarakat.register.submit') }}" method="POST">
                @csrf
                  <div>
                    <label for="name" class="block mt-4 text-md font-medium leading-9 text-gray-500">Nama</label>
                        <input
                            class="w-full mt-2 px-4 py-2 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                            type="name" required name="name" placeholder="Masukkan Nama" value="{{ old('name') }}"/>
                  </div>
                  <div>
                    <label for="nomor_telepon" class="block mt-4 text-md font-medium leading-9 text-gray-500">No. Telepon</label>
                        <input
                            class="w-full mt-2 px-4 py-2 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white @error('nomor_telepon') border-red-500 @enderror"
                            type="nomor_telepon" required name="nomor_telepon" placeholder="Masukkan No. Telepon" value="{{ old('nomor_telepon') }}"/>
                    @error('nomor_telepon')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <div>
                    <label for="nomor_ktp" class="block mt-4 text-md font-medium leading-9 text-gray-500">No. KTP</label>
                        <input
                            class="w-full mt-2 px-4 py-2 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white @error('nomor_ktp') border-red-500 @enderror"
                            type="nomor_ktp" required name="nomor_ktp" placeholder="Masukkan No. KTP" value="{{ old('nomor_ktp') }}"/>
                    @error('nomor_ktp')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <div>
                    <label for="email" class="block mt-4 text-md font-medium leading-9 text-gray-500">Email</label>
                        <input
                            class="w-full mt-2 px-4 py-2 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white @error('email') border-red-500 @enderror"
                            type="email" required name="email" placeholder="Masukkan Email" value="{{ old('email') }}"/>
                    @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                    <div>
                    <label for="password" class="block mt-4 text-md font-medium leading-9 text-gray-500">Password</label>
                        <input
                            id="password" class="w-full mt-2 px-4 py-2 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white @error('password') border-red-500 @enderror"
                            type="password" required name="password" placeholder="Masukkan Password" />
                            <span id="password-alert" class="error"></span>
                    @error('password')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                    </div>
                      <div class="">
                </div>

              <!-- Button Submit -->
              <button
                      class="focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l w-full py-3 font-bold rounded-lg mt-8 text-base"> Masuk
                  </button>
                </form>

                <style>
                    .error {
                        color: red;
                        font-size: 14px;
                    }
                    .success {
                        color: green;
                        font-size: 14px;
                    }
                </style>

                <script>
                    const passwordInput = document.getElementById('password');
                    const alertBox = document.getElementById('password-alert');

                    passwordInput.addEventListener('input', () => {
                        const password = passwordInput.value;

                        // Cek panjang password
                        if (password.length < 10) {
                            alertBox.textContent = 'Password Anda terlalu lemah. Minimal 10 karakter.';
                            alertBox.classList.remove('success');
                            alertBox.classList.add('error');
                        } else {
                            // Password kuat
                            alertBox.textContent = 'Password Anda sudah kuat.';
                            alertBox.classList.remove('error');
                            alertBox.classList.add('success');
                        }
                    });
                </script>
                </a>
                  <p class="mt-2 text-center text-sm text-gray-500">Sudah punya akun?
                  <a href="./login" class="font-semibold leading-6 text-gray-700 hover:text-gray-500">Masuk disini.</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-1 text-center hidden md:flex">
        <img src="../img/mitra-kurir/bgAuth.jpg">
          <div class="m-12 xl:m-24 w-full bg-contain bg-center bg-no-repeat">
      </div>
    </div>
</div>


@endsection
