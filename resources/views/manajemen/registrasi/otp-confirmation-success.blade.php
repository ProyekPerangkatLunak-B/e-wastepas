@extends('manajemen.registrasi.app')

@section('title', 'Konfirmasi OTP Berhasil')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-white">
    <!-- Konten Utama -->
    <div class="bg-white rounded-lg shadow-md p-10 max-w-xl w-full text-center">
        <!-- Judul -->
        <h1 class="text-2xl font-bold mb-4">Konfirmasi OTP Berhasil</h1>

        <!-- Gambar Ikon Sukses -->
        <img src="{{ asset('img/manajemen/registrasi/OtpSucces.png') }}" alt="OTP Success" class="w-24 h-24 mx-auto mb-6">

        <!-- Pesan -->
        <p class="text-gray-600 mb-8">Selamat Anda Berhasil Melakukan Konfirmasi OTP!!</p>

        <!-- Tombol Kembali -->
            <button type="button" class="w-3/4 py-3 text-base font-bold text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l rounded-lg shadow-md transition-all">
                KEMBALI
            </button>
        </a>
    </div>
</div>
@endsection
