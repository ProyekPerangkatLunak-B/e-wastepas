@extends('layouts/app')
@section('content')


<div class="min-h-screen bg-white text-gray-900 flex justify-center item-center w-full">
    <a href="./login">
      <img src="../img/masyarakat/registrasi/back-button.png" class="mt-6 ms-8 w-6 h-6 " alt="Kembali">
    </a>
    <p class= "mt-6 ms-2">
      Kembali
    </p>
        <div class="md:w-1/2 sm:p-12">
           <div class="mt-10 flex flex-col items-center">
              <div class="">
              <h2 class="text-center text-2xl mt-2 font-bold leading-9 tracking-tight text-gray-900">lupa kata sandi</h2>
              <p class="mt-2 text-center text-sm text-gray-500">Masukkan alamat email anda di bawah ini, dan kami akan
               <p class="text-center text-sm text-gray-500"> mengirimkan tautan untuk mengatur ulang kata sandi Anda!!</p>
              </p>
            </div>

            <!-- Forgot Password -->
            <div class="w-full flex-20 mt-4">
                <div class="flex flex-col flex justify-around items-center">
            </div>
                <div class="mx-auto max-w-md">
                  <form action="#" method="POST">
                  <div>
                    <label for="email" class="block mt-4 text-md font-medium leading-9 text-gray-500">Email</label>
                        <input
                            class="w-full mt-2 px-5 py-4 rounded-lg font-medium bg-gray-100 border border-gray-400 text-md focus:outline-none focus:border-green-900 focus:bg-white"
                            type="email" name="email" required/>
                    </div>
              <!-- Button Submit -->
                  <button
                      class="mt-10 tracking-wide font-semibold bg-green-900  text-gray-100 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"> Simpan
                  </button>
                </form>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-1 text-center hidden md:flex">
        <img src="../img/mitra-kurir/bgAuth.jpg">
          <div class="m-12 2xl:m-24 w-full bg-contain bg-center bg-no-repeat">
      </div>
    </div>
</div>

@endsection
