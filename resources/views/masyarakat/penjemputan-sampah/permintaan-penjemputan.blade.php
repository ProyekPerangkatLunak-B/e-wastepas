@extends('layouts.main')

@section('content')
    <div class="container max-w-full px-16 py-8 mx-auto bg-gray-100">
        <div class="mb-8 ms-8">
            <h2 class="text-xl font-semibold leading-relaxed">Mengajukan Permintaan Penjemputan</h2>
            <p class="text-base font-normal text-gray-600">Form permintaan untuk permintaan penjemputan sampah elektronik.</p>
        </div>
        <div class="p-12 mx-8 mt-4 bg-white rounded-lg shadow-lg">
            <form action="#" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                    <!-- Kolom Pilih Kategori, Pilih Jenis, Pilih Dropbox, dan Alamat Penjemputan -->
                    <div class="col-span-1 space-y-6">
                        <x-select id="kategori" name="kategori" label="Pilih Kategori">
                            <option>Pilih Kategori</option>
                            <option>Kategori 1</option>
                            <option>Kategori 2</option>
                            <option>Kategori 3</option>
                        </x-select>
                        <x-select id="jenis" name="jenis" label="Pilih Jenis">
                            <option>Pilih Jenis</option>
                            <option>Jenis 1</option>
                            <option>Jenis 2</option>
                            <option>Jenis 3</option>
                        </x-select>
                        <x-select id="alamat_dropbox" name="alamat_dropbox" label="Pilih Dropbox">
                            <option>Pilih Dropbox</option>
                            <option>Dropbox 1</option>
                            <option>Dropbox 2</option>
                            <option>Dropbox 3</option>
                        </x-select>
                        <x-textarea id="alamat_penjemputan" name="alamat_penjemputan" label="Alamat Penjemputan" placeholder="Alamat lengkap" />
                    </div>

                    <!-- Kolom Tanggal/Waktu, Jumlah Barang, dan Catatan -->
                    <div class="col-span-1 space-y-4">
                        <x-input type="date" id="tanggal_waktu" name="tanggal_waktu" label="Tanggal dan Waktu Penjemputan" placeholder="Tanggal/Waktu" />
                        <p class="text-sm text-gray-500">*Jika ingin diambil ke rumah</p>
                        <x-input type="number" id="jumlah_barang" name="jumlah_barang" label="Jumlah Barang" placeholder="0-100" />
                        <x-textarea id="catatan" name="catatan" label="Catatan Tambahan" placeholder="Catatan untuk kurir" rows="4" />
                        <p class="text-sm text-gray-500">*Catatan untuk kurir</p>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="flex justify-end mt-4 space-x-4">
                    <a href="#" class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300">Kembali</a>
                    <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-400">Kirim Permintaan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
