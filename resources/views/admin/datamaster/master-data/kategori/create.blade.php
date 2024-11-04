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
            border-bottom: 3px solid #4a90e2;
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
            <h2 class="text-2xl font-semibold leading-relaxed ml-14">Tambah Kategori Sampah</h2>
            <h4 class="text-base font-normal ml-14">Silakan isi form berikut untuk menambah kategori baru.</h4>

            <div class="px-12 mt-4">
                <form action="{{ route('admin.datamaster.kategori.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="nama_kategori_sampah" class="block text-sm font-medium text-gray-800 mb-1">Nama Kategori
                            Sampah</label>
                        <input type="text" name="nama_kategori_sampah" id="nama_kategori_sampah" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                    </div>

                    <div class="mb-6">
                        <label for="deskripsi_kategori_sampah"
                            class="block text-sm font-medium text-gray-800 mb-1">Deskripsi Kategori Sampah</label>
                        <textarea name="deskripsi_kategori_sampah" id="deskripsi_kategori_sampah" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700 h-28"></textarea>
                    </div>

                    <div class="flex justify-end" style="color: white">
                        <button type="submit"
                            class="px-6 py-2 bg-gradient-to-r from-blue-500 to-teal-400 text-white rounded-lg hover:from-teal-400 hover:to-blue-500 shadow-md transition transform hover:-translate-y-1">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
