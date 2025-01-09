@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <!-- judul & button -->
            <div class="flex items-center justify-between mx-14">
                <div>
                    <h2 class="text-xl font-semibold">Dropbox</h2>
                    <p class="text-base font-normal text-gray-600">Rute penjemputan untuk penyimpanan sampah pada dropbox</p>
                </div>
                <!-- button jemput sekarang -->
                @if ($penjemputan == null)
                    <a href="#" id="openModalBtn"
                        class="pointer-events-none opacity-50 flex items-center justify-center px-10 py-2 bg-gradient-to-b from-secondary-normal to-primary-normal text-white-100 rounded-2xl shadow-md">
                        Jemput Sekarang
                    </a>
                @else
                    <a href="#" id="openModalBtn"
                        class="flex items-center justify-center px-10 py-2 bg-gradient-to-b from-secondary-normal to-primary-normal text-white-100 rounded-2xl shadow-md">
                        Jemput Sekarang
                    </a>
                @endif
            </div>

            @if ($penjemputan == null)
                <!-- Tampilkan pesan jika tidak ada data -->
                <div class="w-1/2 p-6 mx-auto mt-64 text-center shadow-lg col-span-full bg-white-normal rounded-2xl">
                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/batal.png') }}" alt="Tidak Ditemukan"
                        class="w-[100px] h-[100px] mx-auto mb-4">
                    <p class="text-lg font-semibold text-gray-500">Tidak ada data penjemputan tersedia.</p>
                </div>
            @else
                <!-- Container checkpoint -->
                <div class="mx-14 mt-4 bg-white-100 shadow-md rounded-2xl">
                    <div class="flex justify-between p-4">
                        <div>
                            <p class="text-base text-gray-600">Kode Penjemputan: {{ $penjemputan->id_penjemputan }}</p>
                            <p class="text-lg font-semibold">{{ $penjemputan->kode_penjemputan }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-semibold text-gray-900">Checkpoint Mitra Kurir</p>
                        </div>
                    </div>

                    <!-- Tracking Status -->
                    <div class="flex items-center justify-center mt-1 space-x-4 p-5">
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('img/masyarakat/penjemputan-sampah/truck-hijau.png') }}" class="w-14 h-14"
                                alt="Dijemput Kurir">
                            <span class="mt-2 text-gary-900 text-center text-sm">Menuju Lokasi Penjemputan</span>
                            <a href="#"
                                class="px-5 py-2 mt-2 bg-secondary-normal text-white-100 rounded-2xl shadow-md text-sm text-center">Tiba
                                di Lokasi</a>
                        </div>
                        <div class="w-28 h-2 bg-gradient-to-r from-gray-300 to-green-400 rounded"></div>
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam-hijau.png') }}" class="w-14 h-14"
                                alt="Menyimpan Sampah di Dropbox">
                            <span class="mt-2 text-gray-900 text-center text-sm">Sampah Diangkut</span>
                            <a href="#"
                                class="px-5 py-2 mt-2 bg-secondary-normal text-white-100 rounded-2xl shadow-md text-sm text-center">Selesai</a>
                        </div>
                        <div class="w-28 h-2 bg-gradient-to-r from-gray-300 to-green-400 rounded"></div>
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('img/masyarakat/penjemputan-sampah/truck-hijau.png') }}" class="w-14 h-14"
                                alt="Menuju Lokasi Dropbox Terdekat">
                            <span class="mt-2 text-gray-900 text-center text-sm">Menuju Lokasi Dropbox Terdekat</span>
                            <a href="#"
                                class="px-5 py-2 mt-2 bg-secondary-normal text-white-100 rounded-2xl shadow-md text-sm text-center">Tiba
                                di Lokasi</a>
                        </div>
                        <div class="w-28 h-2 bg-gradient-to-r from-gray-300 to-green-400 rounded"></div>
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam-hijau.png') }}" class="w-14 h-14"
                                alt="Menyimpan Sampah di Dropbox">
                            <span class="mt-2 text-gray-900 text-center text-sm">Menyimpan Sampah di Dropbox</span>
                            <a href="#"
                                class="px-5 py-2 mt-2 bg-secondary-normal text-white-100 rounded-2xl shadow-md text-sm text-center">Selesai</a>
                        </div>
                        <div class="w-28 h-2 bg-gradient-to-r from-gray-300 to-green-400 rounded"></div>
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('img/masyarakat/penjemputan-sampah/patch-check-hijau.png') }}"
                                class="w-14 h-14" alt="Penjemputan Selesai">
                            <span class="mt-2 text-gray-900 text-center text-sm">Penjemputan Selesai</span>
                            <a href="#"
                                class="px-5 py-2 mt-2 bg-secondary-normal text-white-100 rounded-2xl shadow-md text-sm text-center">Selesai</a>
                        </div>
                    </div>
                </div>

                <!-- Container alamat & sampah -->
                <div class=" mt-6 bg-white-100 shadow-md rounded-2xl space-x-4 mx-14">
                    <div class="flex justify-between space-x-5 px-8">
                        <span class="w-20 h-1 bg-red-500 rounded"></span>
                        <span class="w-20 h-1 bg-blue-500 rounded"></span>
                        <span class="w-20 h-1 bg-red-500 rounded"></span>
                        <span class="w-20 h-1 bg-blue-500 rounded"></span>
                        <span class="w-20 h-1 bg-red-500 rounded"></span>
                        <span class="w-20 h-1 bg-blue-500 rounded"></span>
                        <span class="w-20 h-1 bg-red-500 rounded"></span>
                        <span class="w-20 h-1 bg-blue-500 rounded"></span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between">
                            <!-- nama & alamat -->
                            <div class="w-1/2">
                                <h3 class="flex items-center space-x-2 text-lg font-semibold mb-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        fill="currentColor" class="bi bi-person mr-2" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                    </svg>
                                    {{ $penjemputan->penggunaMasyarakat->nama }} -
                                    {{ $penjemputan->penggunaMasyarakat->nomor_telepon }}
                                </h3>
                                <h3 class="text-lg font-semibold">Alamat Penjemputan</h3>
                                <p class="text-gray-600">
                                    {{ $penjemputan->alamat_penjemputan }}</p>
                                <h3 class="text-lg font-semibold mt-4">Daerah Penjemputan</h3>
                                <p class="text-gray-600">{{ $penjemputan->daerah->nama_daerah }}</p>
                                <h3 class="text-lg font-semibold mt-4">Lokasi Dropbox Terdekat</h3>
                                <p class="text-gray-600">{{ $penjemputan->dropbox->nama_dropbox }},
                                    {{ $penjemputan->dropbox->alamat_dropbox }},
                                    {{ $penjemputan->dropbox->daerah->nama_daerah }}, CIDADAP?, JAWA BARAT?, ID?,
                                    40142?.</p>
                            </div>

                            <!-- sampah -->
                            <div class="w-1/2">
                                <h3 class="text-lg font-semibold">Sampah</h3>
                                <div class="grid grid-cols-2 gap-3 mt-4">
                                    <!-- card sampah -->
                                    @foreach ($penjemputan->detailPenjemputan as $det)
                                        <div class="relative  px-4 py-5 bg-gray-100 border rounded-2xl shadow-sm">
                                            <p class="text-base font-medium">{{ $det->kategori->nama_kategori }}</p>
                                            <p class="text-lg font-semibold mt-2">{{ $det->jenis->nama_jenis }}</p>
                                            <p class="absolute top-6 right-4 text-2xl font-bold text-primary-normal">1 pcs
                                            </p>
                                            <div
                                                class="absolute bottom-0 right-0 bg-primary-normal text-white-100 font-semibold px-6 py-1 rounded-tl-2xl rounded-br-2xl text-sm">
                                                {{ $det->berat }}.Kg
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="relative  px-4 py-5 bg-gray-100 border rounded-2xl shadow-sm">
                                    <p class="text-base font-medium">Layar dan Monitor</p>
                                    <p class="text-lg font-semibold mt-2">Televisi</p>
                                    <p class="absolute top-6 right-4 text-2xl font-bold text-primary-normal">1 Pcs</p>
                                    <div
                                        class="absolute bottom-0 right-0 bg-primary-normal text-white-100 font-semibold px-6 py-1 rounded-tl-2xl rounded-br-2xl text-sm">
                                        1 Kg
                                    </div>
                                </div> --}}
                                </div>
                                {{-- catatan --}}
                                <p class="mt-4 font-bold text-red-normal">*Catatan</p>
                                <p class="text-black">{{ $penjemputan->catatan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50 hidden">
        <div class="bg-white-100 rounded-2xl shadow-lg p-6 max-w-sm w-full text-center">
            <h2 class="text-base font-normal  justify-self-start text-gray-500">Notifikasi</h2>
            <div class="w-10 h-0.5 bg-secondary-normal rounded-xl ml-3"></div>
            <p class="mb-6 mt-6 text-lg">Penjemputan berhasil dimulai!</p>
            <button id="closeModalBtn"
                class="px-10 py-2 bg-gradient-to-r from-secondary-normal to-primary-normal text-white-100 rounded-2xl font-normal hover:bg-gradient-to-l">
                OK
            </button>
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
    </script>
@endsection
