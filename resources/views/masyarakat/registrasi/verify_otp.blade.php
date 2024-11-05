@extends('layouts/app')
@section('content')


<div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center items-center w-full">
    <div class="max-w-screen-2xl bg-white shadow sm:rounded-lg flex justify-center">
        <div class="md:w-2/3 xl:w-7/12 p-6 sm:p-12">
           <div class="mt-5 flex flex-col items-center">
              <div class="logo">
                  <img src="../img/logoEwaste.png" alt="" class="w-24 h-24 mx-auto flex justify-center">
                  <h2 class="text-center text-2xl mt-8 font-bold leading-9 tracking-tight text-green-700">Verifikasi OTP</h2>
                  <p class="mt-2 text-center text-sm text-gray-500">Masukkan kode OTP yang telah dikirim ke email Anda.</p>
              </div>

              @if ($errors->any())
                  <div class="bg-red-500 text-white p-3 rounded-lg">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <div class="mx-auto max-w-md">
                  <form action="{{ route('masyarakat.otp.verify') }}" method="POST">
                      @csrf
                      <div>
                          <label for="otp" class="block mt-4 text-md font-medium leading-9 text-gray-500">Kode OTP</label>
                          <input
                              class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-green-200 text-md focus:outline-none focus:border-green-400 focus:bg-white"
                              type="text" required name="otp" id="otp"/>
                              
                              

                      </div>

                      <!-- Button Submit -->
                      <button
                          class="mt-10 tracking-wide font-semibold bg-green-700 text-white w-full py-3 rounded-lg hover:bg-green-400 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"> 
                          Verifikasi
                      </button>
                  </form>
              </div>
          </div>
        </div>
      </div>
      <div class="flex-1 text-center hidden md:flex">
          <img src="../img/bgRegist.jpg">
          <div class="m-12 xl:m-24 w-full bg-contain bg-center bg-no-repeat"></div>
      </div>
</div>

@endsection
