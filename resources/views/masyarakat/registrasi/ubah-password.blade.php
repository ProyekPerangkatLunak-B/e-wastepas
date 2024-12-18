@extends('layouts.registrasi.main-ubah')

@section('content')
<div class="w-[81%] min-h-screen px-[5rem] py-12 mx-[22rem] bg-gray-100">

    <div class="flex" aria-label="Breadcrumb">
            <div class="flex items-center">
            </div>
            <div style="background-color: white;"
            class="rounded-[2rem] w-full
                   sm:max-w-2xl md:max-w-3xl lg:max-w-4xl
                   p-8 sm:p-10 md:p-12 ms-24
                   min-h-[400px] sm:min-h-[500px] md:min-h-[600px]
                   relative flex flex-col justify-content items-center">
                   <div class="w-full flex-20 mt-4">
                    <div class="flex flex-col flex justify-around items-center">
                </div>
                <h1 class="text-2xl font-bold">Ubah Password</h3>
                    <div class="mx-auto max-w-md">
                      <form action="" method="GET">
                        <label for="password" class="block mt-6 text-md font-bold leading-9 text-gray-900">Password Lama</label>
                        <input
                            class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                            type="password" required name="password" placeholder="Masukkan Password"/>
                        <label for="password" class="block mt-6 text-md font-bold leading-9 text-gray-900">Password Baru</label>
                        <input
                            class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                            type="password" name="password" placeholder="Masukkan Password"/>
                        <label for="password" class="block mt-6 text-md font-bold leading-9 text-gray-900">Konfirmasi Password Baru</label>
                        <input
                            class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-md focus:outline-none focus:border-green-800 focus:bg-white"
                            type="password" name="password" placeholder="Masukkan Password"/>

                            <button class="focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l py-2 px-4 ms-40 font-bold rounded-lg mt-8 text-base" onclick="openModal('modelConfirm')">
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
                                        <h2 class="text-xl font-bold text-gray-900"> Reset Password berhasil</h2>
                                        <div class="mail-reset">
                                            <img src="../img/masyarakat/registrasi/popup-reset.png" alt="" class="w-25 h-20 mx-auto flex justify-center">
                                         <h3 class="text-md font-medium text-gray-500 mt-5 mb-6"> Sekarang Anda dapat masuk dengan kata sandi baru Anda. </h3>
                                         <a href="#"  onclick="closeModal('modelConfirm')"
                                             class="focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l w-full py-3 font-bold rounded-lg items-center px-5 py-2.5 text-center mr-2">
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
            </div>
        </div>
    </div>
</div>
@endsection
