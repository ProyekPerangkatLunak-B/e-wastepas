@extends('mitra-kurir.registrasi.layout')
@section('title', 'Login')
@section('content')
  <div class="flex flex-col md:flex-row min-h-screen">
    <div class="w-full md:w-1/2 flex flex-col justify-center px-6 py-12 lg:px-8">
        @include('components.mitra-kurir.auth.logo')        
        @include('components.mitra-kurir.auth.title-description', ['title' => 'Login', 'description' => 'Welcome to E-Waste - Let’s log in to your account']) 
  
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
            
            <form class="space-y-0.5" action="{{ url('/mitra-kurir/registrasi/login') }}" method="POST">
                @csrf
                @include('components.mitra-kurir.auth.input', ['id' => 'email', 'name' => 'email', 'label' => 'Email', 'type' => 'email', 'placeholder' => 'Enter your email'])
                @include('components.mitra-kurir.auth.input', ['id' => 'password', 'name' => 'password', 'label' => 'Password', 'type' => 'password', 'placeholder' => 'Enter your password'])
                @include('components.mitra-kurir.auth.button', ['type' => 'submit', 'text' => 'Sign in'])
                
                @include('components.mitra-kurir.auth.auth-link', [
                    'message' => "Forgot your password?",
                    'linkUrl' => url('/mitra-kurir/password/reset'),
                    'linkText' => 'Reset',
                    'position' => 'right' 
                ])
            </form>
  
            @include('components.mitra-kurir.auth.auth-link', [
                'message' => "Don't have an account?",
                'linkUrl' => route('mitra-kurir.registrasi.register'),
                'linkText' => 'Register'
            ])
        </div>
    </div>
    @include('components.mitra-kurir.auth.background-image', ['imageUrl' => '/img/mitra-kurir/bgAuth.jpg'])
  </div>
@endsection
