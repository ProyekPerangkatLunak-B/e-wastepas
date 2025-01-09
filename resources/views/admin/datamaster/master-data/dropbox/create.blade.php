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
            background-color: #0056b3;
            box-shadow: 0 6px 20px rgba(0, 86, 179, 0.4);
        }
    </style>

    <div class="container max-w-full px-4 mx-auto bg-gray-50">
        <div class="py-8">
            <h2 class="text-2xl font-bold leading-relaxed ml-14">Tambah Dropbox</h2>
            <h4 class="text-base font-normal ml-14">Silakan isi form berikut untuk menambah data dropbox baru.</h4>

            <div class="px-12 mt-4">
                <form action="{{ route('admin.datamaster.dropbox.store') }}" method="POST" id="dropboxForm">
                    @csrf
                    <div class="mb-6">
                        <label for="id_daerah" class="block text-sm font-medium text-gray-800 mb-1">Daerah</label>
                        <select id="idDaerahSelect" class="w-full border border-gray-300 rounded-lg" style="width: 100%"
                            name="id_daerah"></select>
                        <p id="id_daerah_error" class="text-red-500 text-sm hidden">Mohon pilih daerah.</p>
                    </div>

                    <div class="mb-6">
                        <label for="nama_dropbox" class="block text-sm font-medium text-gray-800 mb-1">Nama Lokasi</label>
                        <input type="text" name="nama_dropbox" id="nama_dropbox"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                        <p id="nama_dropbox_error" class="text-red-500 text-sm hidden">Mohon isi nama lokasi.</p>
                    </div>

                    <div class="mb-6">
                        <label for="alamat_dropbox" class="block text-sm font-medium text-gray-800 mb-1">Alamat</label>
                        <textarea name="alamat_dropbox" id="alamat_dropbox"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700 h-28"></textarea>
                        <p id="alamat_dropbox_error" class="text-red-500 text-sm hidden">Mohon isi alamat.</p>
                    </div>

                    <div class="mb-6">
                        <label for="status_dropbox" class="block text-sm font-medium text-gray-800 mb-1">Status
                            Dropbox</label>
                        <select name="status_dropbox" id="status_dropbox"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <p id="status_dropbox_error" class="text-red-500 text-sm hidden">Mohon pilih status.</p>
                    </div>

                    <div class="flex justify-end" style="color: white">
                        <button type="submit"
                            class="px-6 py-2 bg-gradient-to-r from-green-500 to-green-400 text-white rounded-lg hover:from-green-400 hover:to-green-500 shadow-md transition transform hover:-translate-y-1">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const form = document.getElementById('dropboxForm');

                    form.addEventListener('submit', function(event) {
                        let isValid = true;

                        // input elements
                        const idDaerah = document.getElementById('idDaerahSelect');
                        const namaDropbox = document.getElementById('nama_dropbox');
                        const alamatDropbox = document.getElementById('alamat_dropbox');
                        const statusDropbox = document.getElementById('status_dropbox');

                        // pesan erorr
                        const idDaerahError = document.getElementById('id_daerah_error');
                        const namaDropboxError = document.getElementById('nama_dropbox_error');
                        const alamatDropboxError = document.getElementById('alamat_dropbox_error');
                        const statusDropboxError = document.getElementById('status_dropbox_error');

                        // reset error
                        [idDaerah, namaDropbox, alamatDropbox, statusDropbox].forEach(input => {
                            input.classList.remove('border-red-500');
                            input.classList.add('border-gray-300');
                        });

                        [idDaerahError, namaDropboxError, alamatDropboxError, statusDropboxError].forEach(error => {
                            error.classList.add('hidden');
                        });

                        // validasi input
                        if (!idDaerah.value.trim()) {
                            idDaerah.classList.add('border-red-500');
                            idDaerahError.classList.remove('hidden');
                            isValid = false;
                        }

                        if (!namaDropbox.value.trim()) {
                            namaDropbox.classList.add('border-red-500');
                            namaDropboxError.classList.remove('hidden');
                            isValid = false;
                        }

                        if (!alamatDropbox.value.trim()) {
                            alamatDropbox.classList.add('border-red-500');
                            alamatDropboxError.classList.remove('hidden');
                            isValid = false;
                        }

                        if (!statusDropbox.value.trim()) {
                            statusDropbox.classList.add('border-red-500');
                            statusDropboxError.classList.remove('hidden');
                            isValid = false;
                        }

                        if (!isValid) {
                            event.preventDefault();
                        }
                    });

                    $(document).ready(function() {
                        $('#idDaerahSelect').select2({
                            placeholder: 'Pilih Daerah',
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
                                url: '{{ route('admin.datamaster.daerah.search') }}',
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

                        $('#idDaerahSelect').on('select2:select', function(e) {
                            var data = e.params.data;
                            if (data.isNew) {
                                $.ajax({
                                    url: '{{ route('admin.datamaster.daerah.storeDaerah') }}',
                                    method: 'POST',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        nama_daerah: data.text
                                    },
                                    success: function(response) {
                                        console.log(response);
                                        let newOption = new Option(response.text, response.id,
                                            true, true);
                                        $('#idDaerahSelect').append(newOption).trigger(
                                            'change');
                                    },
                                    error: function() {
                                        alert('Failed to add new region');
                                    }
                                });
                            }
                        });
                    });
                });
            </script>
        @endsection
