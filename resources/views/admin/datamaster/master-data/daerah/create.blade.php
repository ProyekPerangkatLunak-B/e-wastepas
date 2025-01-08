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
            <h2 class="text-2xl font-bold leading-relaxed ml-14">Tambah Daerah</h2>
            <h4 class="text-base font-normal ml-14">Silakan isi form berikut untuk menambah data daerah baru.</h4>

            <div class="px-12 mt-4">
                <form action="{{ route('admin.datamaster.daerah.store') }}" method="POST" id="daerahForm">
                    @csrf
                    <div class="mb-6">
                        <label for="nama_daerah" class="block text-sm font-medium text-gray-800 mb-1">Nama Daerah</label>
                        <input type="text" name="nama_daerah" id="nama_daerah"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                        <p id="nama_daerah_error" class="text-red-500 text-sm hidden">Mohon isi nama daerah.</p>
                    </div>

                    <div class="mb-6">
                        <label for="status_daerah" class="block text-sm font-medium text-gray-800 mb-1">Status
                            Daerah</label>
                        <select name="status_daerah" id="status_daerah"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700">
                            <option value="">Pilih status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <p id="status_daerah_error" class="text-red-500 text-sm hidden">Mohon pilih status daerah.</p>
                    </div>

                    <div class="flex justify-end" style="color: white">
                        <button type="submit"
                            class="px-6 py-2 bg-gradient-to-r from-green-500 to-green-400 text-white rounded-lg hover:from-green-400 hover:to-green-500 shadow-md transition transform hover:-translate-y-1">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('daerahForm');

            form.addEventListener('submit', function(event) {
                let isValid = true;

                // Input elements
                const namaDaerah = document.getElementById('nama_daerah');
                const statusDaerah = document.getElementById('status_daerah');

                // Error messages
                const namaDaerahError = document.getElementById('nama_daerah_error');
                const statusDaerahError = document.getElementById('status_daerah_error');

                // Reset error states
                [namaDaerah, statusDaerah].forEach(input => {
                    input.classList.remove('border-red-500');
                    input.classList.add('border-gray-300');
                });

                [namaDaerahError, statusDaerahError].forEach(error => {
                    error.classList.add('hidden');
                });

                // Validate each field
                if (!namaDaerah.value.trim()) {
                    namaDaerah.classList.add('border-red-500');
                    namaDaerahError.classList.remove('hidden');
                    isValid = false;
                }

                if (!statusDaerah.value.trim()) {
                    statusDaerah.classList.add('border-red-500');
                    statusDaerahError.classList.remove('hidden');
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
