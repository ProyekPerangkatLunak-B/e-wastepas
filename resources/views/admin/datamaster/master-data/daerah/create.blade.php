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
            <h2 class="text-2xl font-semibold leading-relaxed ml-14">Tambah Daerah</h2>
            <h4 class="text-base font-normal ml-14">Silakan isi form berikut untuk menambah daerah baru.</h4>

            <div class="px-12 mt-4">
                <form action="{{ route('admin.datamaster.jenis.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="nama_jenis_sampah" class="block text-sm font-medium text-gray-800 mb-1">Nama
                            Dropbox</label>
                        <input type="text" name="nama_jenis_sampah" id="nama_jenis_sampah" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                    </div>

                    <div class="mb-6">
                        <label for="id_kategori_sampah" class="block text-sm font-medium text-gray-800 mb-1">Daerah</label>
                        <select name="status_dropbox" id="status_dropbox" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700">
                            <option value="">Dago</option>
                            <option value="">Bandung Barat</option>
                            <option value="">Lembang</option>
                            <option value="">Kopo</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="poin" class="block text-sm font-medium text-gray-800 mb-1">Total Transaksi</label>
                        <input type="number" name="poin" id="poin" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                    </div>

                    <div class="flex justify-end" style="color: white">
                        <button type="submit"
                            class="px-6 py-2 bg-gradient-to-r from-green-500 to-teal-400 text-white rounded-lg hover:from-teal-400 hover:to-green-500 shadow-md transition transform hover:-translate-y-1">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery (must be included before Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#mySelect2').select2({
                placeholder: 'Pilih Kategori Sampah',
                allowClear: true,
                tags: true, // Enable adding new options
                createTag: function(params) {
                    return {
                        id: params.term,
                        text: params.term,
                        isNew: true // Mark this option as new
                    };
                },
                ajax: {
                    url: '{{ route('admin.datamaster.kategori.search') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term // search term
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

            // Handle adding new data when submitted
            $('#mySelect2').on('select2:select', function(e) {
                var data = e.params.data;
                if (data.isNew) {
                    $.ajax({
                        url: '{{ route('admin.datamaster.kategori.storeKategori') }}', // Define route for storing new data
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            nama_kategori_sampah: data.text // Send the new name as parameter
                        },
                        success: function(response) {
                            $('#mySelect2').append(new Option(response.text, response.id, false,
                                true)).trigger('change');
                        },
                        error: function() {
                            alert('Failed to add new category');
                        }
                    });
                }
            });
        });
    </script>
@endsection
