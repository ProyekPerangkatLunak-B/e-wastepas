@extends('mitra-kurir.registrasi.layout')
@section('title', 'Register')
@section('content')
  <div class ="flex flex-col md:flex-row min-h-screen">
    <div class="w-full md:w-1/2 flex flex-col justify-center px-4 py-6 lg:px-8">
        @include('components.mitra-kurir.auth.logo')  
        @include('components.mitra-kurir.auth.title-description', ['title' => 'Get Started', 'description' => 'Welcome to E-Waste - Let’s create your account'])

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-0.5" action="{{ url('/mitra-kurir/registrasi/register') }}" method="POST">
                {{ csrf_field() }}
                @include('components.mitra-kurir.auth.input', ['id' => 'name', 'name' => 'nama', 'label' => 'Nama', 'type' => 'text', 'placeholder' => 'Masukkan Nama'])
                @include('components.mitra-kurir.auth.input', ['id' => 'ktp', 'name' => 'KTP', 'label' => 'No. KTP', 'type' => 'text', 'placeholder' => 'Masukkan No. KTP'])
                @include('components.mitra-kurir.auth.input', ['id' => 'email', 'name' => 'Email', 'label' => 'Email', 'type' => 'email', 'placeholder' => 'Masukkan Email'])
                @include('components.mitra-kurir.auth.input', ['id' => 'phone', 'name' => 'NomorHP', 'label' => 'No. Telepon', 'type' => 'tel', 'placeholder' => 'Masukkan No.Telepon'])
                @include('components.mitra-kurir.auth.input', ['id' => 'password', 'name' => 'password', 'label' => 'Kata Sandi', 'type' => 'password', 'placeholder' => 'Masukkan Kata Sandi'])
                @include('components.mitra-kurir.auth.input', ['id' => 'confirm-password', 'name' => 'ulangiPassword', 'label' => 'Konfirmasi Kata Sandi', 'type' => 'password', 'placeholder' => 'Masukkan Konfirmasi Kata Sandi'])
                @include('components.mitra-kurir.auth.checkbox', ['id' => 'terms', 'name' => 'terms', 'label' => 'Saya menyetujui'])
                @include('components.mitra-kurir.auth.button', ['type' => 'submit', 'text' => 'Daftar'])
            </form>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            @include('components.mitra-kurir.auth.auth-link', [
                'message' => "Sudah punya akun?",
                'linkUrl' => route('mitra-kurir.registrasi.login'),
                'linkText' => 'Masuk'
            ])
        </div>
    </div>
    @include('components.mitra-kurir.auth.background-image', ['imageUrl' => '/img/mitra-kurir/bgAuth.jpg'])
</div>
@endsection@extends('mitra-kurir.registrasi.layout')
@section('title', 'Register')
@section('content')
  <div class ="flex flex-col md:flex-row min-h-screen">
    <div class="w-full md:w-1/2 flex flex-col justify-center px-4 py-6 lg:px-8">
        @include('components.mitra-kurir.auth.logo')  
        @include('components.mitra-kurir.auth.title-description', ['title' => 'Get Started', 'description' => 'Welcome to E-Waste - Let’s create your account'])

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-0.5" action="{{ url('/mitra-kurir/registrasi/register') }}" method="POST">
                {{ csrf_field() }}
                @include('components.mitra-kurir.auth.input', ['id' => 'name', 'name' => 'name', 'label' => 'Name', 'type' => 'text', 'placeholder' => 'Enter your name'])
                @include('components.mitra-kurir.auth.input', ['id' => 'ktp', 'name' => 'ktp', 'label' => 'No KTP', 'type' => 'text', 'placeholder' => 'Enter your KTP'])
                @include('components.mitra-kurir.auth.input', ['id' => 'username', 'name' => 'username', 'label' => 'Username', 'type' => 'text', 'placeholder' => 'Enter your username'])
                @include('components.mitra-kurir.auth.input', ['id' => 'email', 'name' => 'email', 'label' => 'Email', 'type' => 'email', 'placeholder' => 'Enter your email'])
                @include('components.mitra-kurir.auth.input', ['id' => 'phone', 'name' => 'phone', 'label' => 'No Telp', 'type' => 'tel', 'placeholder' => 'Enter your phone number'])
                @include('components.mitra-kurir.auth.input', ['id' => 'password', 'name' => 'password', 'label' => 'Password', 'type' => 'password', 'placeholder' => 'Enter your password'])
                @include('components.mitra-kurir.auth.input', ['id' => 'confirm-password', 'name' => 'confirm-password', 'label' => 'Confirm Password', 'type' => 'password', 'placeholder' => 'Confirm your password'])
                @include('components.mitra-kurir.auth.checkbox', ['id' => 'terms', 'name' => 'terms', 'label' => 'I agree to the terms and conditions'])
                @include('components.mitra-kurir.auth.button', ['type' => 'submit', 'text' => 'Sign up'])
            </form>

            @include('components.mitra-kurir.auth.auth-link', [
                'message' => "Have an account?",
                'linkUrl' => route('mitra-kurir.registrasi.login'),
                'linkText' => 'Login'
            ])
        </div>
    </div>
    @include('components.mitra-kurir.auth.background-image', ['imageUrl' => '/img/mitra-kurir/bgAuth.jpg'])
</div>
@endsection