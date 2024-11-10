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
                <form action="{{ route('masyarakat.password.email') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block mt-4 text-md font-medium leading-9 text-gray-500">Email</label>
                        <input
                            class="w-full mt-2 px-5 py-4 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                            type="email" name="email" required/>
                    </div>
              <!-- Button Submit -->
              <button class=" focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l w-full py-4 font-bold rounded-lg mt-8 text-base" onclick="openModal('modelConfirm')">
                Simpan
             </button>
             <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                 <div class="relative top-40 mx-auto shadow-xl rounded-lg bg-gray-100 max-w-md">
                     <div class="flex justify-end p-2">
                         <button onclick="closeModal('modelConfirm')" type="button"
                             class="text-gray-400 bg-white hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto items-center">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd"
                                     d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                     clip-rule="evenodd"></path>
                             </svg>
                         </button>
                     </div>
                     <div class="p-6 pt-0 text-center">
                        <h2 class="text-xl font-bold text-gray-900">Periksa email Anda</h2>
                        <p class=" mt-4 text-sm font-medium text-gray-500"> Kami akan mengirimkan tautan pengaturan ulang kata sandi ke email Anda.
                            Silahkan periksa kotak masuk Anda.</p>
                        <div class="mail-reset">
                            <img src="../img/masyarakat/registrasi/reset-password.png" alt="" class="w-28 h-32 mt-2 mx-auto flex justify-center">
                            <p class="mt-2 text-center text-sm text-gray-500 mb-6">Tidak menerima email?
                                <a href="./register" class="font-semibold leading-6 text-gray-700 hover:text-gray-500">Kirim Ulang.</a></p>
                     </div>
                    </div>
                 </div>
             </div>

             <script type="text/javascript">
                 window.openModal = function(modalId) {
                     document.getElementById(modalId).style.display = 'block'
                     document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
                 }

                 window.closeModal = function(modalId) {
                     document.getElementById(modalId).style.display = 'none'
                     document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                 }

                 // Close all modals when press ESC
                 document.onkeydown = function(event) {
                     event = event || window.event;
                     if (event.keyCode === 27) {
                         document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                         let modals = document.getElementsByClassName('modal');
                         Array.prototype.slice.call(modals).forEach(i => {
                             i.style.display = 'none'
                         })
                     }
                 };
             </script>
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
