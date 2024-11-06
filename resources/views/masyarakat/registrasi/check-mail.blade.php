@extends('layouts/app')
@section('content')


<div class="min-h-screen bg-white text-gray-900 flex justify-center item-center w-full">
        <div class="md:w-2/3 xl:w-7/12 p-6 sm:p-12">
           <div class="mt-2 flex flex-col items-center">
              <div class="mail-reset">
              <img src="../img/masyarakat/registrasi/reset-password.png" alt="" class="w-30 mx-auto flex justify-center">
              <h2 class="text-center text-2xl mt-2 font-bold leading-9 tracking-tight text-gray-900">Periksa email Anda</h2>
              <p class="mt-2 text-center text-sm text-gray-500"> Kami akan mengirimkan tautan pengaturan ulang kata sandi ke email Anda. </p>
              <p class="text-center text-sm text-gray-500">Silahkan periksa kotak masuk Anda.</p>
            </div>

            <!-- Reset Password -->
            <div class="w-full flex-20 mt-4">
                <div class="flex flex-col flex justify-around items-center">
            </div>
                <div class="mx-auto max-w-md">
                  <form action="" method="POST">

              <!-- Button Submit -->
                  <button
                      class="mt-10 focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l w-full py-4 focus:ring-4 focus:ring-green-300 font-bold rounded-lg items-center"> Buka Gmail
                  </button>
                </form>
                </a>
                  <p class="mt-2 text-center text-sm text-gray-500"> Tidak menerima email?
                  <a href="./register" class="font-semibold leading-6 text-gray-700 hover:text-gray-500">Kirim ulang</a></p>
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
