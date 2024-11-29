@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Detail Permintaan Penjemputan</h2>
            <h4 class="text-base font-normal ml-14 mb-8">Detail permintaan penjemputan sampah elektronik</h4>

            {{-- Card Section --}}
            <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                
                <!-- Left Card: informasi user -->
                <div class="bg-white-100 rounded-2xl shadow-md p-6 flex flex-col items-center text-center">
                    <img src="https://picsum.photos/700/700" alt="User Avatar" class="w-24 h-24 rounded-full mb-4">
                    <h3 class="text-lg font-semibold">Sarah Martins</h3>
                    <div class="text-sm mt-6">
                        <div class="flex justify-center items-center">
                            <svg class="w-[31px] h-[31px] text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                            </svg>     
                        </div>                         
                        <p class="font-bold mt-1 text-lg">Alamat Penjemputan</p>
                        <p class="text-base">Jl. Telekomunikasi 1, Buahbatu, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257</p>
                    </div>
                    <div class="text-lg mt-6">
                        <div class="flex justify-center items-center">
                            <svg class="w-[30px] h-[30px] text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M6 5V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v2H3V7a2 2 0 0 1 2-2h1ZM3 19v-8h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm5-6a1 1 0 1 0 0 2h8a1 1 0 1 0 0-2H8Z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <p class="font-bold">Tanggal Permintaan Penjemputan</p>
                        <p class="text-base">10/29/2024</p>
                    </div>
                </div>

                <!-- Right Card: detail sampah -->
                <div class="lg:col-span-2 bg-white-100 rounded-2xl shadow-md p-6">
                    <h3 class="text-lg font-semibold mb-4">Sampah</h3>
                    
                    {{-- detail item --}}
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-gray-100 p-4 rounded-xl text-sm border border-gray-300">
                            <div class="grid grid-cols-2 gap-x-2">
                                <span class="font-semibold">Kategori</span>
                                <span>: Layar dan Monitor</span>
                                <span class="font-semibold">Jenis</span>
                                <span>: Handphone</span>
                                <span class="font-semibold">Jumlah</span>
                                <span>: 1 Pcs</span>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-xl text-sm border border-gray-300">
                            <div class="grid grid-cols-2 gap-x-2">
                                <span class="font-semibold">Kategori</span>
                                <span>: Layar dan Monitor</span>
                                <span class="font-semibold">Jenis</span>
                                <span>: Handphone</span>
                                <span class="font-semibold">Jumlah</span>
                                <span>: 1 Pcs</span>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-xl text-sm border border-gray-300">
                            <div class="grid grid-cols-2 gap-x-2">
                                <span class="font-semibold">Kategori</span>
                                <span>: Layar dan Monitor</span>
                                <span class="font-semibold">Jenis</span>
                                <span>: Handphone</span>
                                <span class="font-semibold">Jumlah</span>
                                <span>: 1 Pcs</span>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-xl text-sm border border-gray-300">
                            <div class="grid grid-cols-2 gap-x-2">
                                <span class="font-semibold">Kategori</span>
                                <span>: Layar dan Monitor</span>
                                <span class="font-semibold">Jenis</span>
                                <span>: Handphone</span>
                                <span class="font-semibold">Jumlah</span>
                                <span>: 1 Pcs</span>
                            </div>
                        </div>
                    </div>

                    <!-- catatan & status -->
                    <h3 class="text-lg font-semibold mb-2">Catatan</h3>
                    <div class="bg-gray-100 p-4 rounded-xl text-sm mb-2 border border-gray-300">
                        <p> Layar handphone pecah </p>
                    </div>
                    <h4 class="text-base font-semibold mb-7">Status Permintaan Penjemputan: Belum Diproses</h4>

                    <!-- button terima & tolak -->
                    <div class="grid grid-cols-2 gap-1 mb-1">
                        <div class="flex justify-end">
                            <a href="#" type="button" id="openModalBtn" class="focus:outline-none  text-slate-50 bg-gradient-to-b from-secondary-normal to-secondary-300 hover:bg-gradient-to-t focus:ring-4 focus:ring-green-300 font-bold rounded-xl text-base px-16 py-2 me-2 mr-4 ">Terima </a>
                        </div>
                        <div class="flex justify-start">
                            <a href="#" type="button" id="tolakModalBtn" class="focus:outline-none  text-slate-50 bg-gradient-to-b from-red-normal to-red-300 hover:bg-gradient-to-t focus:ring-4 focus:ring-green-300 font-bold rounded-xl text-base px-16 py-2 me-2 ml-4">Tolak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50 hidden">
        <div class="bg-white-100 rounded-2xl shadow-lg p-6 max-w-sm w-full text-center">
            <h2 class="text-base font-normal  justify-self-start text-gray-500">Notifikasi</h2>
            <div class="w-10 h-0.5 bg-secondary-normal rounded-xl ml-3"></div>
            <p class="mb-6 mt-6 text-lg">Permintaan Penjemputan Diterima!</p>
            <button id="closeModalBtn" class="px-10 py-2 bg-gradient-to-r from-secondary-normal to-primary-normal text-white-100 rounded-2xl font-normal hover:bg-gradient-to-l">
                OK
            </button>
        </div>
    </div>

    <div id="modalTolak" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50 hidden">
        <div class="bg-white-100 rounded-2xl shadow-lg p-6 max-w-sm w-full text-center">
            <h2 class="text-base font-normal  justify-self-start text-gray-500">Notifikasi</h2>
            <div class="w-10 h-0.5 bg-red-normal rounded-xl ml-3"></div>
            <p class="mb-6 mt-6 text-lg">Apakah anda yakin ingin menolak permintaan penjemputan sampah ini ?</p>
            <div class="flex items-center mt-6 space-x-4 rtl:space-x-reverse justify-end">
                <button id="close" type="button" class="text-white  font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Tutup</button>
                <button id="tolakButton"  class="py-2.5 px-5 text-sm font-medium text-white-100 focus:outline-none bg-red-normal rounded-lg border ">Tolak</button>
            </div>
        </div>
    </div>

    <script>
        
        document.getElementById('openModalBtn').addEventListener('click', function () {
            document.getElementById('modal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden'); 
        });

        document.getElementById('closeModalBtn').addEventListener('click', function () {
            document.getElementById('modal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden'); 
        });

        document.getElementById('tolakModalBtn').addEventListener('click', function () {
            document.getElementById('modalTolak').classList.remove('hidden');
            document.body.classList.add('overflow-hidden'); 
        });

        document.getElementById('close').addEventListener('click', function () {
            document.getElementById('modalTolak').classList.add('hidden');
            document.body.classList.remove('overflow-hidden'); 
        });

        document.getElementById('tolakButton').addEventListener('click', function () {
            document.getElementById('modalTolak').classList.add('hidden');
            document.body.classList.remove('overflow-hidden'); 
        });
    </script>
@endsection
