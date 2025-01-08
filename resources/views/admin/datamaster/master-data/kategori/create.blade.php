@extends('layouts.main-admin')

@section('content')
    <style>
        .container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            padding: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 15px;
            display: inline-block;
            padding-bottom: 5px;
        }

        h4 {
            color: #666;
            margin-bottom: 20px;
        }

        label {
            color: #333;
            font-weight: 600;
        }

        input,
        textarea {
            transition: all 0.3s;
        }

        input:focus,
        textarea:focus {
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        }

        button {
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background-color: #2ecc71;
            box-shadow: 0 6px 20px rgba(0, 86, 179, 0.4);
        }
    </style>

    <div class="container max-w-full px-4 mx-auto bg-gray-50">
        <div class="py-8">
            <h2 class="text-2xl font-bold leading-relaxed ml-14">Tambah Kategori Sampah</h2>
            <h4 class="text-base font-normal ml-14">Silakan isi form berikut untuk menambah kategori baru.</h4>

            <div class="px-12 mt-4">
                <form action="{{ route('admin.datamaster.kategori.store') }}" method="POST" enctype="multipart/form-data"
                    id="kategoriForm">
                    @csrf
                    <div class="mb-6">
                        <label for="nama_kategori" class="block text-sm font-medium text-gray-800 mb-1">Nama Kategori
                            Sampah</label>
                        <input type="text" name="nama_kategori" id="nama_kategori"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                        <p id="nama_kategori_error" class="text-red-500 text-sm hidden">Mohon isi nama kategori sampah.</p>
                    </div>

                    <div class="mb-6">
                        <label for="deskripsi_kategori" class="block text-sm font-medium text-gray-800 mb-1">Deskripsi
                            Kategori Sampah</label>
                        <textarea name="deskripsi_kategori" id="deskripsi_kategori"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700"></textarea>
                        <p id="deskripsi_kategori_error" class="text-red-500 text-sm hidden">Mohon isi deskripsi kategori
                            sampah.</p>
                    </div>

                    <div class="mb-6">
                        <label for="poin" class="block text-sm font-medium text-gray-800 mb-1">Poin</label>
                        <input type="number" name="poin" id="poin"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                        <p id="poin_error" class="text-red-500 text-sm hidden">Mohon isi poin kategori sampah.</p>
                    </div>

                    <div class="mb-6">
                        <label for="gambar" class="block text-sm font-medium text-gray-800 mb-1">Gambar Kategori
                            Sampah</label>
                        <input type="file" name="gambar" id="gambar" accept="image/*"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                        <small class="text-gray-500">Maksimal ukuran file: 2MB. Format: JPEG, PNG, JPG, GIF, SVG.</small>
                        <!-- Alert untuk file terlalu besar -->
                        <p id="gambar_error" class="text-red-500 text-sm hidden mt-2">Ukuran file melebihi 2MB. Mohon unggah
                            file dengan ukuran lebih kecil.</p>
                    </div>

                    <div class="flex justify-end" style="color: white">
                        <button type="submit"
                            class="px-6 mt-6 py-2 bg-gradient-to-r from-green-500 to-green-400 text-white rounded-lg hover:from-green-400 hover:to-green-500 shadow-md transition transform hover:-translate-y-1">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('kategoriForm');
            const gambarInput = document.getElementById('gambar');
            const gambarError = document.getElementById('gambar_error');

            gambarInput.addEventListener('change', function() {
                // Reset error state
                gambarInput.classList.remove('border-red-500');
                gambarError.classList.add('hidden');

                // Check file size
                if (this.files && this.files[0]) {
                    const fileSize = this.files[0].size / 1024 / 1024; // Convert size to MB
                    if (fileSize > 2) {
                        // Tambahkan border merah
                        gambarInput.classList.add('border-red-500');
                        // Tampilkan pesan error
                        gambarError.classList.remove('hidden');
                        // Reset nilai input
                        this.value = null;
                    }
                }
            });

            form.addEventListener('submit', function(event) {
                let isValid = true;

                // Input elements
                const namaKategori = document.getElementById('nama_kategori');
                const deskripsiKategori = document.getElementById('deskripsi_kategori');
                const poin = document.getElementById('poin');
                const gambar = document.getElementById('gambar');

                // Error messages
                const namaKategoriError = document.getElementById('nama_kategori_error');
                const deskripsiKategoriError = document.getElementById('deskripsi_kategori_error');
                const poinError = document.getElementById('poin_error');
                const gambarError = document.getElementById('gambar_error');

                // Reset error states
                [namaKategori, deskripsiKategori, poin, gambar].forEach(input => {
                    input.classList.remove('border-red-500');
                    input.classList.add('border-gray-300');
                });

                [namaKategoriError, deskripsiKategoriError, poinError, gambarError].forEach(error => {
                    error.classList.add('hidden');
                });

                // Validate each field
                if (!namaKategori.value.trim()) {
                    namaKategori.classList.add('border-red-500');
                    namaKategoriError.classList.remove('hidden');
                    isValid = false;
                }

                if (!deskripsiKategori.value.trim()) {
                    deskripsiKategori.classList.add('border-red-500');
                    deskripsiKategoriError.classList.remove('hidden');
                    isValid = false;
                }

                if (!poin.value.trim()) {
                    poin.classList.add('border-red-500');
                    poinError.classList.remove('hidden');
                    isValid = false;
                }

                if (!gambar.value.trim()) {
                    gambar.classList.add('border-red-500');
                    gambarError.classList.remove('hidden');
                    isValid = false;
                }

                // If invalid, prevent form submission
                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
