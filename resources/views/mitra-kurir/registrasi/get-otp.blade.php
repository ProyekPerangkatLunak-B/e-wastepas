@extends('mitra-kurir.registrasi.layout')
@section('title', 'Verify OTP')
@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="max-w-xl w-full sm:w-4/5 lg:w-3/4 xl:w-2/3 flex flex-col justify-center px-4 py-8 sm:px-8 sm:py-12 bg-white shadow-xl rounded-lg border border-gray-300">
        <div class="bg-white shadow-lg rounded-lg p-6 relative">

            @include('assets.components.mitra-kurir.get-otp.logo')

                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img class="mx-auto h-24 w-auto sm:h-20" src="/img/mitra-kurir/icon-otp.png" alt="Icon OTP">
                </div>      
            @include('assets.components.mitra-kurir.auth.title-description', ['title' => 'OTP Verification', 'description' => 'We will send you an One Time Password on this email'])
            
            <div class="flex justify-center mt-4">
                <p class="mt-3 text-center text-sm text-gray-600">Enter Your Email</p>
            </div>
    
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-0.5" action="{{ url('/mitra-kurir/registrasi/otp') }}" method="POST">
                    {{ csrf_field() }}
                    @include('assets.components.mitra-kurir.get-otp.email-input', ['id' => 'email', 'name' => 'email', 'label' => 'Email', 'type' => 'email', 'placeholder' => 'Enter your email'])
                    @include('assets.components.mitra-kurir.get-otp-button', ['type' => 'submit', 'text' => 'GET OTP'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection