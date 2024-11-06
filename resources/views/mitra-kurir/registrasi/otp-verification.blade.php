@extends('mitra-kurir.registrasi.layout')
@section('title', 'OTP Verification')
@section('content')
  <div class="flex flex-col md:flex-row min-h-screen">

    <form method="POST" action="{{ route('otp.validation', $user->id_pengguna) }}">
        @csrf
        
        <div>
            <label for="otp">{{ __('OTP CODE') }}</label>
            <input id="otp"  name="otp_token" >
            
            <!-- Display error message for otp_code -->
            @error('otp_code')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="flex items-center justify-center mt-4">
            <button type="submit">
                {{ __('Validate OTP CODE') }}
            </button>
        </div>
    </form>

  </div>
@endsection
