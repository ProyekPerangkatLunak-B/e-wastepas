@extends('layouts/app')
@section('content')
    <div class="flex justify-center w-full min-h-screen text-gray-900 bg-white item-center">
        <div class="p-6 md:w-2/3 xl:w-7/12 sm:p-12">
            <div class="flex flex-col items-center mt-10">
                <div class="logo">
                    <img src="../img/logoEwaste.png" alt="" class="flex justify-center w-24 h-24 mx-auto">
                    <h2 class="mt-8 text-2xl font-bold leading-9 tracking-tight text-center text-green-700">Selamat Datang di
                        E-WastePas</h2>
                </div>

                <!-- Login -->
                <div class="w-full mt-4 flex-20">
                    <div class="flex flex-col items-center justify-around">
                    </div>
                    
                    @if ($errors->has('email_or_password'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 flex items-center" role="alert">
                        <span class="block sm:inline">{{ $errors->first('email_or_password') }}</span>
                        <button type="button" class="ml-auto text-red-700" onclick="this.parentElement.style.display='none';">
                            <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 001.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z" />
                            </svg>
                        </button>
                    </div>
                @endif
                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('done'))
                    <div class="fixed inset-0 flex items-center justify-center bg-white z-50">
                        <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full text-center" style="background-color: white">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Reset Password Berhasil</h2>
                            <div class="flex justify-center items-center mb-4">
                                <i class="fas fa-check-circle text-green-500 text-5xl"></i>
                            </div>
                            <p class="text-gray-600 mb-6">{{ session('status') }}</p>
                            <a href="{{ route('masyarakat.login') }}"
                                class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-full font-bold transition duration-300">
                                Kembali
                            </a>
                        </div>
                    </div>
                    @endif


                    <!-- @if (session('success'))
    <div class="w-full px-4 py-3 mt-4 text-green-700 bg-green-100 border border-green-400 rounded">
                                                    {{ session('success') }}
                                                </div>
@elseif (session('error'))
    <div class="w-full px-4 py-3 mt-4 text-red-700 bg-red-100 border border-red-400 rounded">
                                                    {{ session('error') }}
                                                </div>
    @endif -->
                    <!-- Form Login -->
                    <div class="max-w-md mx-auto">

                        <form action="{{ route('masyarakat.login.submit') }}" method="POST">
                            @csrf
                            <div>
                                <label for="email"
                                    class="block mt-4 font-medium leading-9 text-gray-500 text-md">Email</label>
                                <input
                                    class="w-full px-5 py-4 mt-2 font-medium bg-gray-100 border border-gray-300 rounded-lg text-md focus:outline-none focus:border-green-800 focus:bg-white"
                                    type="email" name="email" required placeholder="Masukkan Email" />
                            </div>
                            <label for="password"
                                class="block mt-4 font-medium leading-9 text-gray-500 text-md">Password</label>
                            <input
                                class="w-full px-5 py-4 mt-5 text-md font-medium bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:border-green-800 focus:bg-white"
                                type="password" name="password" required placeholder="Masukkan Password" />
                            <div class="flex justify-between">
                                <div class="">
                                </div>
                                <div class="text-sm">
                                    <a href="./forgot-password" class="flex mt-2 text-gray-900 hover:text-gray-500">Lupa
                                        Password?</a>
                                </div>
                            </div>

                            <!-- Button Submit -->
                            <!--<button
                                                      class="flex items-center justify-center w-full py-4 mt-10 font-semibold tracking-wide text-gray-100 transition-all duration-300 ease-in-out bg-green-900 rounded-lg hover:bg-green-700 focus:shadow-outline focus:outline-none bg-gradient"> Masuk
                                                  </button>-->
                            <button
                                class="w-full py-4 mt-8 text-base font-bold rounded-lg focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l">
                                Masuk
                            </button>
                        </form>
                        </a>
                        <p class="mt-2 text-sm text-center text-gray-500">Belum punya akun?
                            <a href="./register" class="font-semibold leading-6 text-gray-700 hover:text-gray-500">Daftar
                                disini.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 hidden text-center md:flex">
            <img src="../img/mitra-kurir/bgAuth.jpg">
            <div class="w-full m-12 bg-center bg-no-repeat bg-contain xl:m-24">
            </div>
        </div>
    </div>
@endsection
