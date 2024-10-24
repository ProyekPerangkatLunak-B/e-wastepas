@extends('layouts.main')

@section('content')
    <div class="container max-w-full px-16 py-8 mx-auto bg-gray-100">
        <div class="mb-18 ms-8">
        <h2 class="text-xl font-semibold leading-relaxed">Mengajukan Permintaan Penjemputan</h2>
            <p class="text-base font-normal text-gray-600">Form permintaan untuk permintaan penjemputan sampah elektronik.</p>
        </div>
        <div class="p-12 mx-8 mt-4 bg-white rounded-lg shadow-lg">
            <form action="#" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <!-- Kolom Pilih Kategori dan Pilih Jenis -->
                    <div class="col-span-1">
                        <x-select id="kategori" name="kategori" label="Pilih Kategori">
                            <option>Kategori 1</option>
                            <option>Kategori 2</option>
                            <option>Kategori 3</option>
                        </x-select>
                        <div class="mt-[184px]">
                            <x-select id="jenis" name="jenis" label="Pilih Jenis" class="mt-4">
                                <option>Jenis 1</option>
                                <option>Jenis 2</option>
                                <option>Jenis 3</option>
                            </x-select>
                        </div>
                    </div>

                    <!-- Kolom Alamat Penjemputan dan Alamat Dropbox -->
                    <div class="col-span-1">
                        <x-textarea id="alamat_penjemputan" name="alamat_penjemputan" label="Alamat Penjemputan" placeholder="Alamat lengkap"/>
                        <div class="mt-[30px]">
                            <x-select id="alamat_dropbox" name="alamat_dropbox" label="Alamat Dropbox" class="mt-4">
                                <option>Dropbox 1</option>
                                <option>Dropbox 2</option>
                                <option>Dropbox 3</option>
                            </x-select>
                        </div>
                    </div>

                    <!-- Kolom Tanggal/Waktu, Jumlah Barang, dan Catatan -->
                    <div class="col-span-1">
                        <x-input type="date" id="tanggal_waktu" name="tanggal_waktu" label="Tanggal dan Waktu Penjemputan" placeholder="Tanggal/Waktu" class="mt-1" />
                        <p class="mb-4 text-sm text-gray-500">*Jika ingin diambil ke rumah</p>
                        <x-input type="number" id="jumlah_barang" name="jumlah_barang" label="Jumlah Barang" placeholder="Jumlah Barang" />
                        <x-textarea id="catatan" name="catatan" label="Catatan Tambahan" placeholder="Catatan untuk kurir" class="mt-4" />
                        <p class="text-sm text-gray-500">*Catatan untuk kurir</p>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="flex justify-end mt-16 space-x-4">
                    <a href="#" class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300">Kembali</a>
                    <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-400">Kirim Permintaan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
