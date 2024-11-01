@extends('layouts.main')

@section('content')
<div class="w-[81%] min-h-screen px-12 py-4 mx-[22rem] bg-gray-100">
    <div class="mb-8">
        <h2 class="text-xl font-semibold leading-relaxed">Mengajukan Permintaan Penjemputan</h2>
        <p class="text-base font-normal text-gray-600">Form permintaan untuk permintaan penjemputan sampah elektronik.</p>
    </div>

    <div class="px-8 py-6 bg-white shadow-lg rounded-2xl">
        <form action="#" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

                <!-- Kolom Kiri: Pilih Sampah, Dropbox, Tanggal/Waktu, dan Alamat Penjemputan -->
                <div class="space-y-6">
                    <!-- Tambah Sampah -->
                    <div class="flex items-center space-x-4">
                        <div class="w-3/4">
                            <label for="sampah" class="block mb-1 font-semibold">Pilih Sampah</label>
                            <div class="relative">
                                <input type="text" id="sampah" name="sampah" placeholder="..."
                                       class="w-full px-4 py-2 pr-20 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" readonly/>
                                <button type="button"
                                        class="absolute top-0 bottom-0 right-0 px-4 py-2 text-white rounded-r-lg bg-main-color-dark hover:bg-main-color"
                                        onclick="toggleModal(true)">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Pilih Dropbox -->
                    <x-select id="dropbox" name="dropbox" label="Pilih Dropbox">
                        <option value="">Pilih Dropbox</option>
                        <option value="dropbox1">Dropbox 1</option>
                        <option value="dropbox2">Dropbox 2</option>
                    </x-select>

                    <!-- Tanggal dan Waktu Penjemputan -->
                    <x-input type="date" id="tanggal_penjemputan" name="tanggal_penjemputan" label="Tanggal dan Waktu Penjemputan" placeholder="mm/dd/yyyy" />
                    <p class="text-sm text-gray-500">*Jika ingin diambil ke rumah</p>

                    <!-- Alamat Penjemputan -->
                    <x-textarea id="alamat_penjemputan" name="alamat_penjemputan" label="Alamat Penjemputan" placeholder="Jl. Kapten Abdul Hamid No 86" />
                </div>

                <!-- Kolom Kanan: Daftar Sampah yang Dipilih -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold">Semua Sampah</h3>

                    <div class="space-y-4">
                        <!-- Card Sampah -->
                        <div class="flex items-center justify-between w-4/5 px-6 py-4 bg-gray-100 rounded-xl">
                            <div class="space-y-1">
                                <p class="font-semibold">Layar dan Monitor</p>
                                <p class="text-sm text-center text-gray-500">Lorem ipsum dolor sit amet.</p>
                                <p class="font-semibold">Televisi</p>
                            </div>
                            <p class="text-lg font-semibold">1x</p>
                        </div>

                        <div class="flex items-center justify-between w-4/5 px-6 py-4 bg-gray-100 rounded-xl">
                            <div class="space-y-1">
                                <p class="font-semibold">Layar dan Monitor</p>
                                <p class="text-sm text-center text-gray-500">Lorem ipsum dolor sit amet.</p>
                                <p class="font-semibold">Televisi</p>
                            </div>
                            <p class="text-lg font-semibold">1x</p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Tombol Kembali dan Kirim Permintaan -->
            <div class="flex justify-end mt-8 space-x-4">
                <a href="#" class="px-8 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300">Kembali</a>
                <button type="submit" class="px-8 py-2 text-white rounded-xl bg-primary-normal">Kirim Permintaan</button>
            </div>
        </form>
    </div>
</div>
    <!-- Modal Overlay -->
    <div id="modal-overlay" class="fixed inset-0 z-40 flex items-center justify-center hidden bg-black bg-opacity-50">
        <!-- Modal Content -->
        <div class="w-full max-w-lg p-6 transition-all duration-300 transform bg-white shadow-lg rounded-2xl">
            <h3 class="mb-4 text-lg font-semibold text-gray-700">Tambah Sampah</h3>
            <form action="#" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Pilih Kategori</label>
                        <select id="kategori" name="kategori" class="block w-full px-3 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                            <option>Pilih Kategori</option>
                            <option>Kategori 1</option>
                            <option>Kategori 2</option>
                        </select>
                    </div>
                    <div>
                        <label for="jenis" class="block text-sm font-medium text-gray-700">Pilih Jenis</label>
                        <select id="jenis" name="jenis" class="block w-full px-3 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                            <option>Pilih Jenis</option>
                            <option>Jenis 1</option>
                            <option>Jenis 2</option>
                        </select>
                    </div>
                    <div>
                        <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                        <textarea id="catatan" name="catatan" rows="8" class="block w-full px-3 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Catatan untuk barang"></textarea>
                    </div>
                </div>

                <div class="flex justify-end mt-6 space-x-4">
                    <button type="button" onclick="toggleModal(false)" class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
                    <button type="submit" class="px-4 py-2 text-white rounded-lg bg-second-gray hover:bg-main-color">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
