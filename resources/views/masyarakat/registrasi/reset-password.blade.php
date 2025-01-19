@extends('layouts/app')
@section('content')
    <div class="min-h-screen bg-white text-gray-900 flex justify-center item-center w-full">
        <a href="./login">
            <img src="../img/masyarakat/registrasi/back-button.png" class="mt-6 ms-8 w-6 h-6 " alt="Kembali">
        </a>
        <p class= "mt-6 ms-2">
            Kembali
        </p>
        <div class="md:w-1/2 sm:p-12">
            <div class="mt-10 flex flex-col items-center">
                <div class="">
                    <h2 class="text-center text-2xl mt-2 font-bold leading-9 tracking-tight text-gray-900">Buat Kata Sandi
                        Baru</h2>
                    <p class="mt-2 text-center text-sm text-gray-500">Masukkan kata sandi baru Anda di bawah ini
                    <p class="text-center text-sm text-gray-500">untuk menyelesaikan proses pengaturan ulang</p>
                    </p>
                </div>

                <!-- Reset Password -->
                <div class="w-full flex-20 mt-4">
                    <div class="flex flex-col justify-around items-center">
                    </div>
                    <div class="mx-auto max-w-md">
                        <form action="{{ route('masyarakat.password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ request('token') }}">

                            <label for="password" class="block mt-4 text-md font-bold leading-9 text-gray-900">Password
                                baru</label>
                            <input
                                class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                                type="password" placeholder="Masukkan Password" required name="password" />
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <label for="password2" class="block mt-4 text-md font-bold leading-9 text-gray-900">Konfirmasi
                                Password baru</label>
                            <input
                                class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                                type="password" placeholder="Masukkan Password" required name="password2" />
                            @error('password2')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <button
                                class="focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l w-full py-3 font-bold rounded-lg mt-8 text-base"
                                type="submit">
                                Simpan
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 text-center hidden md:flex">
            <img src="../img/mitra-kurir/bgAuth.jpg">
            <div class="m-12 2xl:m-24 w-full bg-contain bg-center bg-no-repeat">
            </div>
        </div>
    </div>
@endsection