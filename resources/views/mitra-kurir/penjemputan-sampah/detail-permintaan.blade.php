@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <!-- judul & button -->
            <div class="flex items-center justify-between mx-14">
                <div>
                    <h2 class="text-xl font-semibold">Detail Permintaan Penjemputan</h2>
                    <p class="text-base font-normal text-gray-600">Detail permintaan penjemputan sampah elektronik</p>
                </div>
                <!-- button kembali -->
                <a href="{{ route('mitra-kurir.penjemputan.permintaan') }}"
                    class="flex items-center justify-center px-10 py-2 bg-primary-normal  text-white-100 rounded-2xl shadow-md font-bold">
                    Kembali
                </a>
            </div>

            {{-- Card Section --}}
            <div class="grid grid-cols-1 gap-4 px-12 mt-4 lg:grid-cols-3 lg:gap-4">
                <!-- Left Card: informasi user -->
                @if ($data->isNotEmpty())
                    <div class="bg-white-100 rounded-2xl shadow-md p-6 flex flex-col items-center text-center">
                        <img src="https://picsum.photos/700/700" alt="User Avatar" class="w-24 h-24 rounded-full mb-4">
                        {{-- nama --}}
                        <h3 class="text-lg font-semibold mb-6">{{ $data->first()->nama }}</h3>
                        {{-- daerah penjemputan --}}
                        <div class="text-sm mt-2">
                            <div class="flex justify-center items-center">
                                <svg class="w-[31px] h-[31px] text-green-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="font-bold mt-1">Daerah Penjemputan</p>
                            <p>daerah_penjemputan </p>
                        </div>
                        {{-- dropbox terdekat --}}
                        <div class="text-sm mt-4">
                            <div class="flex justify-center items-center">
                                <svg class="w-[31px] h-[31px] text-green-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12.013 6.175 7.006 9.369l5.007 3.194-5.007 3.193L2 12.545l5.006-3.193L2 6.175l5.006-3.194 5.007 3.194ZM6.981 17.806l5.006-3.193 5.006 3.193L11.987 21l-5.006-3.194Z" />
                                    <path
                                        d="m12.013 12.545 5.006-3.194-5.006-3.176 4.98-3.194L22 6.175l-5.007 3.194L22 12.562l-5.007 3.194-4.98-3.211Z" />
                                </svg>
                            </div>
                            <p class="font-bold">Dropbox Terdekat</p>
                            <p>{{ $data->first()->alamat_dropbox }}</p>
                        </div>
                        {{-- tanggal permintaan penjemputan --}}
                        <div class="text-sm mt-4">
                            <div class="flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 43 42"
                                    fill="none">
                                    <path
                                        d="M0.25 14.125C0.25 10.1172 0.25 8.1155 1.49525 6.87025C2.7405 5.625 4.74225 5.625 8.75 5.625H34.25C38.2578 5.625 40.2595 5.625 41.5047 6.87025C42.75 8.1155 42.75 10.1172 42.75 14.125C42.75 15.1259 42.75 15.6274 42.4398 15.9398C42.1274 16.25 41.6237 16.25 40.625 16.25H2.375C1.37413 16.25 0.872625 16.25 0.56025 15.9398C0.25 15.6274 0.25 15.1237 0.25 14.125ZM0.25 33.25C0.25 37.2577 0.25 39.2595 1.49525 40.5047C2.7405 41.75 4.74225 41.75 8.75 41.75H34.25C38.2578 41.75 40.2595 41.75 41.5047 40.5047C42.75 39.2595 42.75 37.2577 42.75 33.25V22.625C42.75 21.6241 42.75 21.1226 42.4398 20.8102C42.1274 20.5 41.6237 20.5 40.625 20.5H2.375C1.37413 20.5 0.872625 20.5 0.56025 20.8102C0.25 21.1226 0.25 21.6262 0.25 22.625V33.25Z"
                                        fill="#437252" />
                                    <path d="M10.875 1.375V7.75M32.125 1.375V7.75" stroke="#437252" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>
                            </div>
                            <p class="font-bold">Tanggal Permintaan Penjemputan</p>
                            <p>{{ $data->first()->tanggal_penjemputan }}</p>
                        </div>
                        {{-- alamat penjemputan --}}
                        <div class="text-sm mt-2">
                            <div class="flex justify-center items-center">
                                <svg class="w-[31px] h-[31px] text-green-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="font-bold mt-1">Alamat Penjemputan</p>
                            <p>{{ $data->first()->alamat_penjemputan }}</p>
                        </div>

                    </div>
                @endif

                <!-- Right Card: detail sampah -->
                <div class="lg:col-span-2 bg-white-100 rounded-2xl shadow-md p-6">
                    <h3 class="text-lg font-semibold mb-4">Sampah</h3>

                    {{-- detail item --}}
                    <div class="grid lg:grid-cols-2 gap-2 mb-4 ">
                        @foreach ($data as $detail)
                            <div class="bg-gray-100 p-4 rounded-xl text-sm border border-gray-300">
                                <div class="grid grid-cols-3 gap-1">
                                    <!-- Kategori -->
                                    <div class="">
                                        <span class="font-semibold">Kategori</span>
                                    </div>
                                    <div class="col-span-2">
                                        <span>: {{ $detail->nama_kategori }}</span>
                                    </div>

                                    <!-- Jenis -->
                                    <div class="">
                                        <span class="font-semibold">Jenis</span>
                                    </div>
                                    <div class="col-span-2">
                                        <span>: {{ $detail->nama_jenis }}</span>
                                    </div>

                                    <!-- Jumlah -->
                                    <div class="">
                                        <span class="font-semibold">Jumlah</span>
                                    </div>
                                    <div class="col-span-2">
                                        <span>: 1Pcs</span>
                                    </div>

                                    <!-- Berat -->
                                    <div class="">
                                        <span class="font-semibold">Berat</span>
                                    </div>
                                    <div class="col-span-2">
                                        <span>: 2 Kg</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>






                    <!-- catatan & status -->
                    @if ($data->isNotEmpty())
                        <h3 class="text-lg font-semibold mb-2">Catatan</h3>
                        <div class="bg-gray-100 p-4 rounded-xl text-sm mb-2 border border-gray-300">
                            <p>{{ $data->first()->catatan }}</p>
                        </div>
                        <h4 class="text-base font-semibold mb-7">Status Permintaan Penjemputan: {{ $data->first()->status }}
                        </h4>
                    @endif

                    <!-- button terima -->
                    <div class="flex justify-center">
                        <form
                            action="{{ route('mitra-kurir.penjemputan.detail-permintaan', $data->first()->id_pelacakan) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_pelacakan" value="{{ $data->first()->id_pelacakan }}">
                            <input type="hidden" name="status" value="Dijemput Kurir">
                            <button type="submit" id="openModalBtn"
                                class="focus:outline-none font-bold rounded-xl text-base px-16 py-2 me-2 mr-4
                                    {{ $data->first()->status == 'Dijemput Kurir' ? 'bg-gray-400 cursor-not-allowed' : 'text-slate-50 bg-gradient-to-b from-secondary-normal to-primary-normal hover:bg-gradient-to-t focus:ring-4 focus:ring-green-300' }}"
                                {{ $data->first()->status == 'Dijemput Kurir' ? 'disabled ' : '' }}>
                                Terima Penjemputan
                            </button>
                        </form>
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
            <p class="mb-6 mt-6 text-lg">Permintaan Penjemputan Dijemput Kurir!</p>

            <a href="{{ route('mitra-kurir.penjemputan.dropbox') }}"
                class="px-10 py-2 bg-gradient-to-r from-secondary-normal to-primary-normal text-white-100 rounded-2xl font-normal hover:bg-gradient-to-l">

                OK
            </a>
        </div>
    </div>


    <script>
        document.getElementById('openModalBtn').addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        });

        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });

        document.getElementById('close').addEventListener('click', function() {
            document.getElementById('modalTolak').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });
    </script>
@endsection
