@extends('layouts.main-admin')

@section('content')
    <style>
        .container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            padding: 20px;
        }

        .alert {
            display: none;
            background-color: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
            border-radius: 5px;
            padding: 10px 15px;
            margin-bottom: 20px;
            font-size: 14px;
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
            <h2 class="text-2xl font-bold leading-relaxed ml-14">Tambah Jenis Sampah</h2>
            <h4 class="text-base font-normal ml-14">Silakan isi form berikut untuk menambah jenis sampah baru.</h4>

            <div class="px-12 mt-4">
                <form action="{{ route('admin.datamaster.jenis.store') }}" method="POST" enctype="multipart/form-data"
                    id="jenisForm">
                    @csrf

                    <div class="mb-6">
                        <label for="nama_jenis" class="block text-sm font-medium text-gray-800 mb-1">Nama Jenis
                            Sampah</label>
                        <input type="text" name="nama_jenis" id="nama_jenis"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                        <p id="nama_jenis_error" class="text-red-500 text-sm hidden">Mohon isi nama jenis sampah.</p>
                    </div>

                    <div class="mb-6">
                        <label for="id_kategori" class="block text-sm font-medium text-gray-800 mb-1">Kategori
                            Sampah</label>
                        <select id="mySelect2" class="w-full border border-gray-300 rounded-lg" style="width: 100%"
                            name="id_kategori">
                        </select>
                        <p id="id_kategori_error" class="text-red-500 text-sm hidden">Mohon pilih kategori sampah.</p>
                    </div>

                    <div class="mb-6">
                        <label for="poin" class="block text-sm font-medium text-gray-800 mb-1">Poin</label>
                        <input type="number" name="poin" id="poin"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                        <p id="poin_error" class="text-red-500 text-sm hidden">Mohon isi poin.</p>
                    </div>

                    <!-- Image Input -->
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
                            class="px-6 py-2 bg-gradient-to-r from-green-500 to-green-400 text-white font-semibold rounded-lg hover:bg-gradient-to-r hover:from-green-400 hover:to-green-500">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('jenisForm');
            const errorMessage = document.getElementById('error-message');
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
                let isValid = true; // Tracking form validity

                // input elements
                const namaJenis = document.getElementById('nama_jenis');
                const kategori = document.getElementById('mySelect2');
                const poin = document.getElementById('poin');
                const gambar = document.getElementById('gambar');

                // pesan eror
                const namaJenisError = document.getElementById('nama_jenis_error');
                const kategoriError = document.getElementById('id_kategori_error');
                const poinError = document.getElementById('poin_error');
                const gambarError = document.getElementById('gambar_error');

                // reset eror
                [namaJenis, kategori, poin, gambar].forEach(input => {
                    input.classList.remove('border-red-500');
                    input.classList.add('border-gray-300');
                });

                [namaJenisError, kategoriError, poinError, gambarError].forEach(error => {
                    error.classList.add('hidden');
                });

                // validasi input
                if (!namaJenis.value.trim()) {
                    namaJenis.classList.add('border-red-500');
                    namaJenisError.classList.remove('hidden');
                    isValid = false;
                }

                if (!kategori.value.trim()) {
                    kategori.classList.add('border-red-500');
                    kategoriError.classList.remove('hidden');
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

                // If the form is invalid, prevent submission
                if (!isValid) {
                    event.preventDefault();
                    errorMessage.classList.remove('hidden');
                } else {
                    errorMessage.classList.add('hidden');
                }
            });

            // Inisialisasi Select2
            $(document).ready(function() {
                $('#mySelect2').select2({
                    placeholder: 'Pilih Kategori Sampah',
                    allowClear: true,
                    tags: true,
                    createTag: function(params) {
                        return {
                            id: params.term,
                            text: params.term,
                            isNew: true
                        };
                    },
                    ajax: {
                        url: '{{ route('admin.datamaster.kategori.search') }}',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                term: params.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data
                            };
                        },
                        cache: true
                    },
                    templateResult: function(data) {
                        if (data.isNew) {
                            return $('<span>Add New: ' + data.text + '</span>');
                        }
                        return data.text;
                    }
                });

                $('#mySelect2').on('select2:select', function(e) {
                    var data = e.params.data;
                    if (data.isNew) {
                        $.ajax({
                            url: '{{ route('admin.datamaster.kategori.storeKategori') }}',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                nama_kategori: data.text
                            },
                            success: function(response) {
                                console.log(response);
                                // Use the returned response id and text
                                let newOption = new Option(response.text,
                                    response.id,
                                    true, true);
                                $('#mySelect2').append(newOption).trigger(
                                    'change');
                            },
                            error: function() {
                                alert('Failed to add new category');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
