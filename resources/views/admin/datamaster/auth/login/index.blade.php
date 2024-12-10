@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center items-center w-full">
        <div class="max-w-screen-2xl bg-white shadow sm:rounded-lg flex justify-center">
            {{-- Kolom Gambar --}}
            <div class="flex-1 text-center hidden md:flex">
                <div class="relative w-full h-full">
                    <img src="{{ asset('img/bgRegist.jpg') }}" alt="Background Registration"
                        class="object-cover w-full h-full">
                    <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-transparent opacity-50"></div>
                </div>
            </div>

            {{-- Kolom Form Login --}}
            <div class="md:w-2/3 xl:w-7/12 p-6 sm:p-12">
                <div class="mt-4 flex flex-col items-center">
                    <div class="logo">
                        <img src="{{ asset('img/logoEwaste.png') }}" alt="Logo Ewaste"
                            class="w-24 h-24 ms-16 align-self-center">
                        <h2 class="text-center text-2xl mt-8 font-bold leading-9 tracking-tight text-green-700">
                            Selamat Datang,
                        </h2>
                        <h2 class="text-center text-2xl mt-2 font-bold leading-9 tracking-tight text-green-700">
                            Login sebagai admin
                        </h2>
                    </div>

                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 flex items-center justify-between"
                            role="alert">
                            <span class="block sm:inline">{{ session('status') }}</span>
                            <button type="button" class="ml-4 text-green-500 focus:outline-none"
                                onclick="this.parentElement.style.display='none';">
                                <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.933 2.933a1 1 0 11-1.414-1.414l2.933-2.933-2.933-2.933a1 1 0 111.414-1.414l2.933 2.933 2.933-2.933a1 1 0 011.414 1.414l-2.933 2.933 2.933 2.933a1 1 0 010 1.414z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 flex items-center justify-between"
                            role="alert">
                            <ul class="list-none p-0 m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="ml-4 text-red-500 focus:outline-none"
                                onclick="this.parentElement.style.display='none';">
                                <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.933 2.933a1 1 0 11-1.414-1.414l2.933-2.933-2.933-2.933a1 1 0 111.414-1.414l2.933 2.933 2.933-2.933a1 1 0 011.414 1.414l-2.933 2.933 2.933 2.933a1 1 0 010 1.414z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    {{-- Form Login --}}
                    <div class="w-full flex-20 mt-8">
                        <div class="mx-auto max-w-md">
                            <form action="{{ route('admin.sendAdminLoginLink') }}" method="POST" onsubmit="showSpinner()">
                            <form action="{{ route('admin.sendAdminLoginLink') }}" method="POST">
                                @csrf
                                <div>
                                    <label for="email"
                                        class="block mt-4 text-md font-medium leading-9 text-gray-900">Email</label>
                                    <input name="email"
                                        class="w-full mt-2 px-5 py-4 rounded-lg font-medium bg-gray-100 border border-green-200 text-md focus:outline-none focus:border-green-400 focus:bg-white"
                                        type="email" required />
                                </div>

                                {{-- Button Submit --}}
                                <button
                                    class="mt-8 tracking-wide font-semibold bg-green-400 text-white w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    Kirim Link Login
                                </button>

                                {{-- Loader Spinner --}}
                                <div id="spinner" class="hidden mt-4">
                                    <svg class="animate-spin h-5 w-5 text-green-700 mx-auto"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                    </svg>
                                    <p class="text-green-700 text-center mt-2">Mengirim link login...</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script untuk Spinner --}}
    <script>
        function showSpinner() {
            document.getElementById('spinner').classList.remove('hidden');
        }
    </script>
@endsection
