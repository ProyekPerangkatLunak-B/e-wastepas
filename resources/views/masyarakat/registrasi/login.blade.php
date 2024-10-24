@extends('layouts/app')
@section('content')


<div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center item-center w-full">
    <div class="max-w-screen-2xl bg-white shadow sm:rounded-lg flex justify-center">
        <div class="md:w-2/3 xl:w-7/12 p-6 sm:p-12">
           <div class="mt-12 flex flex-col items-center">
              <div class="logo">
              <img src="../img/logoEwaste.png" alt="" class="w-24 h-24 ms-12 align-self-center">
              <h2 class="text-center text-2xl mt-8 font-bold leading-9 tracking-tight text-green-700">Selamat Datang</h2>
            </div>

            <!-- Login -->
            <div class="w-full flex-20 mt-8">
                <div class="flex flex-col flex justify-around items-center">
            </div>

            <!-- Form Login -->
                <div class="mx-auto max-w-md">
                  <form action="#" method="POST">
                  <div>
                    <label for="email" class="block mt-4 text-md font-medium leading-9 text-gray-900">Email</label>
                        <input
                            class="w-full mt-2 px-5 py-4 rounded-lg font-medium bg-gray-100 border border-green-200 text-md focus:outline-none focus:border-green-400 focus:bg-white"
                            type="email"/>
                    </div>       
                    <label for="email" class="block mt-4 text-md font-medium leading-9 text-gray-900">Password</label> 
                        <input
                            class="w-full px-8 py-4 mt-2 rounded-lg font-medium bg-gray-100 border border-green-200 text-sm focus:outline-none focus:border-green-400 focus:bg-white mt-5"
                            type="password"/>
                    <div>
                        <div class="flex justify-between">
                    </div>
                    <div class="text-sm">
                        <a href="#" class="text-gray-700 flex hover:text-gray-500">Lupa Password?</a>
                  </div>
                </div>

              <!-- Button Submit -->
                  <button
                      class="mt-8 tracking-wide font-semibold bg-green-400 mt-2 text-white-500 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"> Masuk
                  </button>
                  </form>
                  <p class="mt-2 text-center text-sm text-gray-500">Belum punya akun?
                  <a href="#" class="font-semibold leading-6 text-gray-700 hover:text-gray-500">Daftar disini.</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-1 text-center hidden md:flex">
        <img src="../img/bgRegist.jpg">
          <div class="m-12 xl:m-24 w-full bg-contain bg-center bg-no-repeat">
      </div>
    </div>
</div>

@endsection