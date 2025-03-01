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
            <h2 class="text-2xl font-bold leading-relaxed ml-14">Edit Kategori Sampah</h2>
            <h4 class="text-base font-normal ml-14">Silakan ubah informasi kategori sampah di bawah ini.</h4>

            <div class="px-12 mt-4">
                <form action="{{ route('admin.datamaster.kategori.update', $kategoriSampah->id_kategori) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="nama_kategori" class="block text-sm font-medium text-gray-800 mb-1">Nama Kategori
                            Sampah</label>
                        <input type="text" name="nama_kategori" id="nama_kategori"
                            value="{{ $kategoriSampah->nama_kategori }}" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                    </div>

                    <div class="mb-6">
                        <label for="deskripsi_kategori" class="block text-sm font-medium text-gray-800 mb-1">Deskripsi
                            Kategori Sampah</label>
                        <textarea name="deskripsi_kategori" id="deskripsi_kategori" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700">{{ $kategoriSampah->deskripsi_kategori }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label for="poin" class="block text-sm font-medium text-gray-800 mb-1">Poin</label>
                        <input type="number" name="poin" id="poin" value="{{ $kategoriSampah->poin }}" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                    </div>

                    <div class="mb-6">
                        <label for="gambar" class="block text-sm font-medium text-gray-800 mb-1">Gambar Kategori
                            Sampah</label>
                        <input type="file" name="gambar" id="gambar" accept="image/*"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />

                        <!-- Display current image if available -->
                        @if ($kategoriSampah->gambar)
                            <div class="mt-2">
                                <img src="{{ asset('img/admin/' . $kategoriSampah->gambar) }}" alt="Current Image"
                                    class="w-24 h-24 object-cover rounded-md">
                                <p class="mt-1 text-sm text-gray-600">Gambar yang sedang digunakan</p>
                            </div>
                        @endif
                    </div>

                    <div class="flex justify-end" style="color: white">
                        <button type="submit"
                            class="px-6 mt-6 py-2 bg-gradient-to-r from-green-500 to-green-400 text-white rounded-lg hover:from-green-400 hover:to-green-500 shadow-md transition transform hover:-translate-y-1">
                            <i class="fas fa-save mr-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
