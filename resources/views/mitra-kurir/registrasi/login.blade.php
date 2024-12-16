@extends('mitra-kurir.registrasi.layout')
@section('title', 'Login')
@section('content')
  <div class="flex flex-col md:flex-row min-h-screen">
    <div class="w-full md:w-1/2 flex flex-col justify-center px-6 py-12 lg:px-8">
        <a href="{{ url('/') }}">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-24 w-auto" src="/img/logoEwaste.png" alt="Logo e-waste">
        </div>         
        </a>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-4xl font-bold leading-9 tracking-tight text-[#498D43]">Welcome!</h2>
        </div> 
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <!-- Tampilkan Alert Jika Ada Kesalahan -->
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">There were some problems with your input:</span>
                <ul class="mt-2 list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('status') }}
        </div>
        @endif
            <form class="space-y-0.5" action="{{ url('/mitra-kurir/registrasi/login') }}" method="POST">
                @csrf
                @include('components.mitra-kurir.auth.input', ['id' => 'email', 'name' => 'email', 'label' => 'Email', 'type' => 'email', 'placeholder' => 'Masukkan Email'])
                @include('components.mitra-kurir.auth.input', ['id' => 'password', 'name' => 'kata_sandi', 'label' => 'Kata Sandi', 'type' => 'password', 'placeholder' => 'Masukkan Kata Sandi'])
                @include('components.mitra-kurir.auth.button', ['type' => 'submit', 'text' => 'Masuk'])
                
                <p class="mt-10 text-right text-sm text-gray-500">
                    <a href="{{ url('/mitra-kurir/registrasi/forgot-password') }}" class="font-semibold leading-6 text-gray-500 hover:text-gray-600">
                        Lupa kata sandi?
                    </a>
                </p>
            </form>
  
            @include('components.mitra-kurir.auth.auth-link', [
                'message' => "Belum Punya Akun?",
                'linkUrl' => route('mitra-kurir.registrasi.register'),
                'linkText' => 'Daftar'
            ])
        </div>
    </div>
    @include('components.mitra-kurir.auth.background-image', ['imageUrl' => '/img/mitra-kurir/bgAuth.jpg'])
  </div>
@endsection
