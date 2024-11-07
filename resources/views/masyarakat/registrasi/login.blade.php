@extends('layouts/app')
@section('content')

<div class="flex justify-center w-full min-h-screen text-gray-900 bg-white item-center">
        <div class="p-6 md:w-2/3 xl:w-7/12 sm:p-12">
           <div class="flex flex-col items-center mt-10">
              <div class="logo">
              <img src="../img/logoEwaste.png" alt="" class="flex justify-center w-24 h-24 mx-auto">
              <h2 class="mt-8 text-2xl font-bold leading-9 tracking-tight text-center text-green-700">Selamat Datang di E-WastePas</h2>
            </div>

            <!-- Login -->
            <div class="w-full mt-4 flex-20">
                <div class="flex flex-col items-center justify-around">
            </div>

            <!-- Form Login -->
                <div class="max-w-md mx-auto">
                  <form action="" method="POST">
                  <div>
                    <label for="email" class="block mt-4 font-medium leading-9 text-gray-500 text-md">Email</label>
                        <input
                            class="w-full px-5 py-4 mt-2 font-medium bg-gray-100 border border-gray-300 rounded-lg text-md focus:outline-none focus:border-green-800 focus:bg-white"
                            type="email" name="email" required/>
                    </div>
                    <label for="password" class="block mt-4 font-medium leading-9 text-gray-500 text-md">Password</label>
                        <input
                            class="w-full px-5 py-4 mt-5 text-sm font-medium bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:border-green-800 focus:bg-white"
                            type="password" name="password" required/>
                    <div class="flex justify-between">
                      <div class="">
                    </div>
                    <div class="text-sm">
                        <a href="./forgot-password" class="flex mt-2 text-gray-900 hover:text-gray-500">Lupa Password?</a>
                  </div>
                </div>

              <!-- Button Submit -->
                  <!--<button
                      class="flex items-center justify-center w-full py-4 mt-10 font-semibold tracking-wide text-gray-100 transition-all duration-300 ease-in-out bg-green-900 rounded-lg hover:bg-green-700 focus:shadow-outline focus:outline-none bg-gradient"> Masuk
                  </button>-->
                  <button
                      class="w-full py-4 mt-8 text-base font-bold rounded-lg focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l"> Masuk
                  </button>
                </form>
                </a>
                  <p class="mt-2 text-sm text-center text-gray-500">Belum punya akun?
                  <a href="./register" class="font-semibold leading-6 text-gray-700 hover:text-gray-500">Daftar disini.</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-1 hidden text-center md:flex">
        <img src="../img/mitra-kurir/bgAuth.jpg">
          <div class="w-full m-12 bg-center bg-no-repeat bg-contain xl:m-24">
      </div>
    </div>
</div>

@endsection
