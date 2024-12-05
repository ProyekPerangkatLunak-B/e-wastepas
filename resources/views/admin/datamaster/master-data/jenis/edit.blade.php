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
            border-bottom: 3px solid #2ecc71;
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
            <h2 class="text-2xl font-semibold leading-relaxed ml-14">Edit Jenis Sampah</h2>
            <h4 class="text-base font-normal ml-14">Silakan ubah data berikut untuk memperbarui jenis sampah.</h4>

            <div class="px-12 mt-4">
                <form action="{{ route('admin.datamaster.jenis.update', $jenisSampah->id_jenis) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="nama_jenis" class="block text-sm font-medium text-gray-800 mb-1">Nama Jenis
                            Sampah</label>
                        <input type="text" name="nama_jenis" id="nama_jenis" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700"
                            value="{{ $jenisSampah->nama_jenis }}" />
                    </div>

                    <div class="mb-6">
                        <label for="id_kategori" class="block text-sm font-medium text-gray-800 mb-1">Kategori
                            Sampah</label>
                        <select id="mySelect2" class="w-full" style="width: 100%" name="id_kategori">
                            <option value="{{ $jenisSampah->id_kategori }}" selected>
                                {{ $jenisSampah->kategoriSampah->nama_kategori }}</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="poin" class="block text-sm font-medium text-gray-800 mb-1">Poin</label>
                        <input type="number" name="poin" id="poin" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700"
                            value="{{ $jenisSampah->poin }}" />
                    </div>

                    <div class="flex justify-end" style="color: white">
                        <button type="submit"
                            class="px-6 py-2 bg-gradient-to-r from-green-500 to-green-400 text-white rounded-lg hover:from-green-400 hover:to-green-500 shadow-md transition transform hover:-translate-y-1">
                            <i class="fas fa-save mr-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
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
                                nama_kategori_sampah: data.text
                            },
                            success: function(response) {
                                $('#mySelect2').append(new Option(response.text,
                                    response.id, false,
                                    true)).trigger('change');
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
