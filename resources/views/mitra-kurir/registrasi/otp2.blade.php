@extends('mitra-kurir.registrasi.layout')
@section('title', 'Verify OTP')
@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="max-w-xl w-full sm:w-4/5 lg:w-3/4 xl:w-2/3 flex flex-col justify-center px-4 py-8 sm:px-8 sm:py-12 bg-white shadow-xl rounded-lg border border-gray-300">
        <div class="bg-white rounded-lg p-6 relative">

            @include('components.mitra-kurir.get-otp.logo')

            @include('components.mitra-kurir.get-otp.icon-otp')

            @include('components.mitra-kurir.auth.title-description', ['title' => 'OTP Verification', 'description' => 'Enter the OTP sent to (nama email)'])
                
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form action="{{ url('/mitra-kurir/registrasi/verify-otp') }}" method="POST" class="mt-6 sm:mt-8 space-y-4 sm:space-y-6">
                    {{ csrf_field() }}
                    @include('components.mitra-kurir.otp.input')
                    @include('components.mitra-kurir.otp.change-email')
                </form>
                @include('components.mitra-kurir.get-otp.button', ['type' => 'submit', 'text' => 'GET OTP'])
            </div>
        </div>
    </div>
</div>
@endsection
