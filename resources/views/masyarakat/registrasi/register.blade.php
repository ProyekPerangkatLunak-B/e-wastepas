@extends('layouts/app')
@section('content')

<div class="min-h-screen bg-white text-gray-900 flex justify-center item-center w-full">
        <div class="md:w-2/3 xl:w-7/12 p-6 sm:p-12">
           <div class="mt-5 flex flex-col items-center">
              <div class="logo">
              <img src="../img/logoEwaste.png" alt="" class="w-24 h-24 mx-auto flex justify-center">
              <h2 class="text-center text-2xl mt-8 font-bold leading-9 tracking-tight text-green-700">Selamat Datang di E-WastePas</h2>
            </div>

            <!-- Registrasi -->

            <div class="w-full flex-20 mt-2">
                <div class="flex flex-col flex justify-around items-center">
            </div>

             @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500 p-3 rounded-lg">{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <!-- Form Registrasi -->
                <div class="mx-auto max-w-md">
                <form action="{{ route('masyarakat.register.submit') }}" method="POST">
                @csrf
                  <div>
                      @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label for="name" class="block mt-4 text-md font-medium leading-9 text-gray-500">Nama</label>
                        <input
                            class="w-full mt-2 px-4 py-2 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                            type="name" required name="name" placeholder="Masukkan Nama"/>
                    </div>
                  <div>
                    <label for="telepon" class="block mt-4 text-md font-medium leading-9 text-gray-500">No. Telepon</label>
                        <input
                            class="w-full mt-2 px-4 py-2 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                            type="tel" required name="tel" placeholder="Masukkan No. Telepon"/>
                    </div>
                  <div>
                    <label for="no-ktp" class="block mt-4 text-md font-medium leading-9 text-gray-500">No. KTP</label>
                        <input
                            class="w-full mt-2 px-4 py-2 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                            type="text" required name="no-rek" placeholder="Masukkan No. KTP"/>
                    </div>
                  <div>
                    <label for="email" class="block mt-4 text-md font-medium leading-9 text-gray-500">Email</label>
                        <input
                            class="w-full mt-2 px-4 py-2 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                            type="email" required name="email" placeholder="Masukkan Email"/>
                    </div>
                    <div>
                    <label for="password" class="block mt-4 text-md font-medium leading-9 text-gray-500">Password</label>
                        <input
                            class="w-full mt-2 px-4 py-2 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                            type="password" required name="password" placeholder="Masukkan Password"/>
                    </div>
                      <div class="">
                </div>

              <!-- Button Submit -->
              <button
                      class="focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l w-full py-3 font-bold rounded-lg mt-8 text-base"> Masuk
                  </button>
                </form>
                </a>
                  <p class="mt-2 text-center text-sm text-gray-500">Sudah punya akun?
                  <a href="./login" class="font-semibold leading-6 text-gray-700 hover:text-gray-500">Masuk disini.</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-1 text-center hidden md:flex">
        <img src="../img/mitra-kurir/bgAuth.jpg">
          <div class="m-12 xl:m-24 w-full bg-contain bg-center bg-no-repeat">
      </div>
    </div>
</div>


@endsection
