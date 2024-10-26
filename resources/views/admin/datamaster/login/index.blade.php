@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center items-center w-full">
        <div class="max-w-screen-2xl bg-white shadow sm:rounded-lg flex justify-center">
            {{-- Kolom Gambar --}}
            <div class="flex-1 text-center hidden md:flex">
                <img src="{{ asset('img/bgRegist.jpg') }}" alt="Background Registration" class="object-cover w-full h-full">
            </div>

            {{-- Kolom Form Login --}}
            <div class="md:w-2/3 xl:w-7/12 p-6 sm:p-12">
                <div class="mt-4 flex flex-col items-center">
                    <div class="logo">
                        <img src="{{ asset('img/logoEwaste.png') }}" alt="Logo Ewaste"
                            class="w-24 h-24 ms-10 align-self-center">
                        <h2 class="text-center text-2xl mt-8 font-bold leading-9 tracking-tight text-green-700">Selamat
                            Datang,</h2>
                        <h2 class="text-center text-2xl mt-2 font-bold leading-9 tracking-tight text-green-700">Login
                            sebagai admin</h2>
                    </div>

                    <!-- Form Login -->
                    <div class="w-full flex-20 mt-8">
                        <div class="flex flex-col justify-around items-center"></div>
                        <div class="mx-auto max-w-md">
                            <form action="#" method="POST">
                                <div>
                                    <label for="email"
                                        class="block mt-4 text-md font-medium leading-9 text-gray-900">Email</label>
                                    <input
                                        class="w-full mt-2 px-5 py-4 rounded-lg font-medium bg-gray-100 border border-green-200 text-md focus:outline-none focus:border-green-400 focus:bg-white"
                                        type="email" />
                                </div>
                                <label for="password"
                                    class="block mt-4 text-md font-medium leading-9 text-gray-900">Password</label>
                                <input
                                    class="w-full px-8 py-4 mt-2 rounded-lg font-medium bg-gray-100 border border-green-200 text-sm focus:outline-none focus:border-green-400 focus:bg-white mt-5"
                                    type="password" />

                                <!-- Button Submit -->
                                <button
                                    class="mt-8 tracking-wide font-semibold bg-green-400 text-white w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    Masuk
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
