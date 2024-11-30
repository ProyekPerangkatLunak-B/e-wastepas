@extends('layouts.main')

@section('content')

    <form action="{{ route('masyarakat.penjemputan.tambah') }}" method="POST">
        @csrf
        <div class="w-[81%] min-h-screen px-20 py-12 mx-[22rem] bg-gray-100">
            <div class="mb-8">
                <h2 class="text-xl font-semibold leading-relaxed">Mengajukan Permintaan Penjemputan</h2>
                <p class="text-base font-normal text-gray-600">Form permintaan untuk permintaan penjemputan sampah
                    elektronik.
                </p>
            </div>

            @if ($errors->any())
                <div id="error-message"
                    class="p-4 mb-6 text-red-600 bg-red-100 border-l-4 border-red-600 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <!-- Icon Error -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 text-red-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M12 9v2m0 4v.01m5.293-4.293l1.414 1.414a9 9 0 1 1-12.828 0L6.707 10.707a7.5 7.5 0 1 0 10.586 0z">
                                </path>
                            </svg>
                            <p class="text-lg font-medium">Oops! Ada kesalahan pada data yang Anda masukkan.</p>
                        </div>
                        <!-- Dismiss Button -->
                        <button id="dismiss-button" class="text-red-600 hover:text-red-800 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-2">
                        @foreach ($errors->all() as $error)
                            <p class="mt-2 text-sm leading-tight">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif



            <div class="w-[1380px] h-auto pb-2 shadow-lg bg-white-normal rounded-2xl">
                <div class="grid grid-cols-1 gap-8 pt-5 mx-12 lg:grid-cols-2">
                    <!-- Kolom Kiri: Pilih Sampah, Dropbox, Tanggal/Waktu, dan Alamat Penjemputan -->
                    <div class="pt-6 space-y-6">
                        <!-- Tambah Sampah -->
                        <div class="flex items-center space-x-4">
                            <div class="w-3/4">
                                <label for="sampah" class="block mb-4 font-semibold">Pilih Sampah</label>
                                <div class="relative">
                                    <input type="text" id="sampah" name="sampah" placeholder="..."
                                        class="w-full px-4 py-2 pr-20 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                                        readonly />
                                    <button type="button"
                                        class="absolute top-0 bottom-0 right-0 px-4 py-2 text-white rounded-r-lg bg-secondary-200 hover:bg-secondary-normal"
                                        onclick="toggleModal(true)">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Pilih Daerah -->
                        <x-select id="daerah" name="daerah" label="Pilih Daerah">
                            <option value="">Pilih Daerah</option>
                            @foreach ($daerah as $d)
                                <option value="{{ $d->id_daerah }}">{{ $d->nama_daerah }}</option>
                            @endforeach
                        </x-select>

                        <!-- Pilih Dropbox -->
                        <x-select id="dropbox" name="dropbox" label="Pilih Dropbox">
                            <option value="">Pilih Dropbox</option>
                            @foreach ($dropbox as $d)
                                <option value="{{ $d->id_dropbox }}">{{ $d->nama_dropbox }}</option>
                            @endforeach
                        </x-select>

                        <!-- Tanggal dan Waktu Penjemputan -->
                        <x-input type="date" id="tanggal_penjemputan" name="tanggal_penjemputan"
                            label="Tanggal dan Waktu Penjemputan" placeholder="mm/dd/yyyy" />

                        <!-- Alamat Penjemputan -->
                        <x-textarea id="alamat_penjemputan" name="alamat" label="Alamat Penjemputan"
                            placeholder="Jl. Kapten Abdul Hamid No 86" />

                        {{-- Catatan --}}
                        <x-textarea id="catatan" name="catatan" label="Catatan" placeholder="Hatihati bang kurir" />
                    </div>

                    <!-- Kolom Kanan: Daftar Sampah yang Dipilih -->
                    <div class="pt-8 space-y-4">
                        <h3 class="text-lg font-semibold">Semua Sampah</h3>
                        <div class="h-auto space-y-4 overflow-y-auto" id="boxSemuaSampah">
                            <!-- Card  -->
                            <div
                            class="flex justify-start items-center col-span-full border border-gray-200 bg-white-normal w-[500px] h-[120px] rounded-2xl" id="box-kosong">
                                <img src="{{ asset('img/masyarakat/penjemputan-sampah/x-circle 3.png') }}"
                                    alt="Tidak Ditemukan" class="w-[50px] h-[50px] ml-12">
                                <p class="w-64 ml-12 font-bold text-center text-black-normal">Data {{ $search ?? 'Sampah Elektronik' }}
                                    tidak ditemukan / Masih Kosong.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Tombol Kembali dan Kirim Permintaan -->
                <div class="flex justify-end my-6 mr-10 space-x-4">
                    <a href="#" class="px-8 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300">Kembali</a>
                    <button type="button" id="submit-request" name="submit" onclick="kirimKonfirmasi()"
                        class="flex items-center px-8 py-2 text-gray-100 rounded-xl bg-primary-normal hover:bg-primary-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
                            class="mr-1 bi bi-send" viewBox="0 0 16 16">
                            <path
                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                        </svg>
                        Kirim Permintaan
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal Overlay -->
        <div id="modal-overlay"
            class="fixed inset-0 z-40 flex items-center justify-center hidden bg-opacity-50 bg-black-normal">
            <!-- Modal Content -->
            <div class="w-full max-w-lg p-6 transition-all duration-300 transform shadow-lg bg-white-normal rounded-2xl">
                <h3 class="mb-4 text-lg font-semibold text-gray-700">Tambah Sampah</h3>
                <div class="space-y-4">
                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Pilih Kategori</label>
                        <select id="kategori" name=""
                            class="block w-[450px] h-[50px] px-3 py-2 mt-1 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="jenis" class="block text-sm font-medium text-gray-700">Pilih Jenis</label>
                        <select id="jenis" name=""
                            class="block w-[450px] h-[50px] px-3 py-2 mt-1 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                            <option value="">Pilih Jenis</option>
                            @foreach ($jenis as $j)
                                <option value="{{ $j->id_jenis }}">{{ $j->nama_jenis }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div>
                        <label for="berat" class="block text-sm font-medium text-gray-700">Berat Sampah</label>
                        <input id="berat" name="" type="number" step="0.01"
                            class="block w-[450px] h-[50px] px-3 py-2 mt-1 bg-gray-100 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                            placeholder="0 Kg">
                    </div>
                </div>

                <div class="flex justify-end mt-6 space-x-4">
                    <button type="button" onclick="toggleModal(false)"
                        class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
                    <button type="button" onclick="tambahKeBox()"
                        class="px-4 py-2 text-white rounded-lg bg-secondary-200 hover:bg-secondary-normal">Tambah</button>
                </div>
            </div>
        </div>

        <!-- Modal Konfirmasi Kirim Permintaan -->
        <div id="confirmModal"
            class="fixed inset-0 z-40 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
            <div class="bg-white-normal w-[450px] p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-lg font-semibold text-gray-500 text-start">Notifikasi</h2>
                {{-- Underline  --}}
                <div id="underlineA" class="w-3/12 h-1 mt-2 mb-8 bg-gray-500"></div>
                <h3 class="mb-4 text-lg font-semibold">Konfirmasi Pengiriman</h3>
                <p class="mb-6">Apakah Anda yakin ingin mengirim permintaan penjemputan sampah?</p>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="cancelAddRequest()"
                        class="px-4 py-2 w-[200px] h-[40px] bg-gray-300 rounded-xl hover:bg-gray-400">Batal</button>
                    <button type="button" onclick="sendAddRequest()"
                        class="px-4 py-2 w-[200px] h-[40px] bg-green-500 rounded-xl text-white-normal hover:bg-green-600">Kirim</button>
                </div>
            </div>
        </div>

        <!-- Modal Notifikasi -->
        <div id="alertModal" class="fixed inset-0 z-40 items-center justify-center hidden bg-gray-900 bg-opacity-50">
            <div class="bg-white-normal w-[450px] p-6 mx-auto mt-96 rounded-lg shadow-lg text-center">
                <h2 id="notifikasiAlert" class="text-lg font-semibold text-red-normal text-start">Notifikasi</h2>
                {{-- Underline  --}}
                <div id="underlineAlert" class="w-3/12 h-1 mt-2 mb-8"></div>
                <p id="alertMessage" class="mb-8 font-semibold"></p>
                <button type="button"
                    class="px-4 py-2 bg-secondary-normal rounded-xl w-[200px] h-[40px] text-white-normal hover:bg-secondary-300"
                    id="closeAlertModal">OK</button>
            </div>
        </div>
    </form>
@endsection
