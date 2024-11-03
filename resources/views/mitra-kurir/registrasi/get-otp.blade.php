@extends('mitra-kurir.registrasi.layout')
@section('title', 'Verify OTP')
@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="max-w-xl w-full sm:w-4/5 lg:w-3/4 xl:w-2/3 flex flex-col justify-center px-4 py-8 sm:px-8 sm:py-12 bg-white shadow-xl rounded-lg border border-gray-300">
        <div class="bg-white rounded-lg p-6 relative">

            @include('components.mitra-kurir.get-otp.logo')

            @include('components.mitra-kurir.get-otp.icon-otp')

            @include('components.mitra-kurir.auth.title-description', ['title' => 'OTP Verification', 'description' => 'We will send you an One Time Password on this email'])
            
            @include('components.mitra-kurir.get-otp.enter-email')

    
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-0.5" action="{{ url('/mitra-kurir/registrasi/get-otp') }}" method="POST">
                    {{ csrf_field() }}
                    @include('components.mitra-kurir.get-otp.email-input', ['id' => 'email', 'name' => 'email', 'label' => 'Email', 'type' => 'email', 'placeholder' => 'Enter your email'])
                    @include('components.mitra-kurir.get-otp.button', ['type' => 'submit', 'text' => 'GET OTP'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection