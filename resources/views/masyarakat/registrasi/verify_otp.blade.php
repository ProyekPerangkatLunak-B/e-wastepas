@extends('layouts/app')
@section('content')

<div class="w-full min-h-screen text-gray-900 bg-white">
    <a href="./register">
        <button class="flex items-center mt-6 ms-8">
            <img src="../img/masyarakat/registrasi/back-button.png" class="w-6 h-6 mr-2" alt="Kembali">
            <span>Kembali</span>
        </button>
    </a>
        <div class="items-center mt-32">
            <div class="otp-img">
<<<<<<< HEAD
            <img src="../img/masyarakat/registrasi/otp.png" alt="" class="w-30 mx-auto flex justify-center">
                <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Konfirmasi OTP</h2>
                <p class="mt-2 text-center text-md text-gray-500">Silahkan masukan kode verifikasi yang kami</p>
                <p class="text-center text-md text-gray-500">kirim kan ke email anda</p>
=======
            <img src="../img/masyarakat/registrasi/otp.png" alt="" class="flex justify-center mx-auto w-30">
                <h2 class="text-2xl font-bold leading-9 tracking-tight text-center text-gray-900">Konfirmasi OTP</h2>
                <p class="mt-2 text-center text-gray-500 text-md">Silahkan masukan kode verifikasi yang kami kirim kan ke email anda</p>
>>>>>>> dev
            </div>

              @if ($errors->any())
                  <div class="p-3 text-center text-red-500 rounded-lg">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <div class="max-w-md mx-auto">
                  <form action="{{ route('masyarakat.otp.verify') }}" method="POST">
                      @csrf
                      <!--<div>
                          <label for="otp" class="block mt-4 font-medium leading-9 text-gray-500 text-md">Kode OTP</label>
                          <input
                              class="w-full px-4 py-3 mt-2 font-medium bg-gray-100 border border-green-200 rounded-lg text-md focus:outline-none focus:border-green-400 focus:bg-white"
                              type="text" required name="otp" id="otp"/>
                      </div>-->

<<<<<<< HEAD
                      <div class="grid grid-cols-6  mt-10 ms-6 gap-x-10 my-2">
                        <div contenteditable="true"  class="rounded-lg shadow-md bg-gray-100 cursor-text w-14 aspect-square flex items-center justify-center">
                          <span class="text-gray-900"></span>
                        </div>
                        <div contenteditable="true"  class="rounded-lg shadow-md bg-gray-100 cursor-text w-14 aspect-square flex items-center justify-center">
                          <span class="text-gray-900"></span>
                        </div>
                        <div contenteditable="true"  class="rounded-lg shadow-md bg-gray-100 cursor-text w-14 aspect-square flex items-center justify-center">
                          <span class="text-gray-900"></span>
                        </div>
                        <div contenteditable="true"  class="rounded-lg shadow-md bg-gray-100 cursor-text w-14 aspect-square flex items-center justify-center">
                          <span class="text-gray-900"></span>
                        </div>
                        <div contenteditable="true"  class="rounded-lg shadow-md bg-gray-100 cursor-text w-14 aspect-square flex items-center justify-center">
                          <span class="text-gray-900"></span>
                        </div>
                        <div contenteditable="true"  class="rounded-lg shadow-md bg-gray-100 cursor-text w-14 aspect-square flex items-center justify-center">
                          <span class="text-gray-900"></span>
=======
                      <div class="grid grid-cols-6 my-2 mt-10 ms-6 gap-x-10">
                        <div contenteditable="true"  class="flex items-center justify-center bg-gray-900 rounded-lg shadow-md cursor-text dark:bg-gray-200 w-14 aspect-square">
                          <span class="text-gray-900 dark:text-gray-400"></span>
                        </div>
                        <div contenteditable="true"  class="flex items-center justify-center bg-gray-900 rounded-lg shadow-md cursor-text dark:bg-gray-200 w-14 aspect-square">
                          <span class="text-gray-900 dark:text-gray-400"></span>
                        </div>
                        <div contenteditable="true"  class="flex items-center justify-center bg-gray-200 rounded-lg shadow-md cursor-text dark:bg-gray-200 w-14 aspect-square">
                          <span class="text-gray-900 dark:text-gray-400"></span>
                        </div>
                        <div contenteditable="true"  class="flex items-center justify-center bg-gray-200 rounded-lg shadow-md cursor-text dark:bg-gray-200 w-14 aspect-square">
                          <span class="text-gray-900 dark:text-gray-400"></span>
                        </div>
                        <div contenteditable="true"  class="flex items-center justify-center bg-gray-200 rounded-lg shadow-md cursor-text dark:bg-gray-200 w-14 aspect-square">
                          <span class="text-gray-900 dark:text-gray-400"></span>
                        </div>
                        <div contenteditable="true"  class="flex items-center justify-center bg-gray-200 rounded-lg shadow-md cursor-text dark:bg-gray-200 w-14 aspect-square">
                          <span class="text-gray-900 dark:text-gray-400"></span>
>>>>>>> dev
                        </div>

                      <!-- Button Submit -->
                      <button
                          class="h-12 font-bold rounded-lg mt-14 ms-12 w-80 focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l" onclick="openModal('modelConfirm')">
                          Kirim
                      </button>
                      <div id="modelConfirm" class="fixed inset-0 z-50 hidden w-full h-full px-4 overflow-y-auto bg-gray-900 bg-opacity-60 ">
                        <div class="relative max-w-md mx-auto bg-gray-100 rounded-lg shadow-xl top-40">
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
                               <h2 class="text-xl font-bold text-gray-900"> Konfirmasi OTP berhasil</h2>
                               <div class="mail-reset">
                                   <img src="../img/masyarakat/registrasi/popup-reset.png" alt="" class="flex justify-center h-20 mx-auto w-25">
                                <h3 class="mt-5 mb-6 font-medium text-gray-500 text-md"> Selamat Anda Berhasil Melakukan Konfirmasi Kode !! </h3>
                                <a href="#"  onclick="closeModal('modelConfirm')"
                                    class="focus:outline-none text-slate-50 font-bold bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l rounded-lg px-5 py-2.5 text-center mr-2">
                                    Kembali
                                </a>
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
              <a href="" class="font-semibold leading-6 text-gray-700 ms-48 text-md hover:text-gray-500">Kirim Ulang</a>
          </div>
        </div>
      </div>
</div>

@endsection
