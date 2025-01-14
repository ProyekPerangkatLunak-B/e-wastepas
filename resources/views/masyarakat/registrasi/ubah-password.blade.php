@extends('layouts.registrasi.main-ubah')

@section('content')
    <div class="w-[81%] min-h-screen px-[5rem] py-12 mx-[22rem] bg-gray-100">
        <div class="flex" aria-label="Breadcrumb">
            <div class="flex items-center"></div>
            <div style="background-color: white;"
                class="rounded-[2rem] w-full sm:max-w-2xl md:max-w-3xl lg:max-w-4xl p-8 sm:p-10 md:p-12 ms-24 min-h-[400px] sm:min-h-[500px] md:min-h-[600px] relative flex flex-col justify-content items-center">
                <div class="w-full flex-20 mt-4">
                    <h1 class="text-2xl font-bold">Ubah Password</h1>

                    <!-- Menampilkan alert jika ada pesan sukses atau error -->
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mx-auto max-w-md">
                        <form action="{{ route('masyarakat.profile.update-password') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label for="password_lama" class="block mt-6 text-md font-bold leading-9 text-gray-900">Password
                                Lama</label>
                            <input
                                class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                                type="password" name="password_lama" placeholder="Masukkan Password Lama" required />

                            <label for="password_baru" class="block mt-6 text-md font-bold leading-9 text-gray-900">Password
                                Baru</label>
                            <input
                                class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                                type="password" name="password_baru" placeholder="Masukkan Password Baru" required />

                            <label for="password_baru_confirmation"
                                class="block mt-6 text-md font-bold leading-9 text-gray-900">Konfirmasi Password
                                Baru</label>
                            <input
                                class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                                type="password" name="password_baru_confirmation" placeholder="Konfirmasi Password Baru"
                                required />

                            <button type="submit"
                                class="focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l py-2 px-4 ms-40 font-bold rounded-lg mt-8 text-base">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
