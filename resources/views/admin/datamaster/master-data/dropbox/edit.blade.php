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

        .error-message {
            color: red;
            font-size: 0.875rem;
        }
    </style>

    <div class="container max-w-full px-4 mx-auto bg-gray-50">
        <div class="py-8">
            <h2 class="text-2xl font-semibold leading-relaxed ml-14">Edit Dropbox</h2>
            <h4 class="text-base font-normal ml-14">Silakan ubah informasi dropbox di bawah ini.</h4>

            <div class="px-12 mt-4">
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="error-message">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.datamaster.dropbox.update', $dropbox->id_dropbox) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="id_daerah" class="block text-sm font-medium text-gray-800 mb-1">ID Daerah</label>
                        <input type="number" name="id_daerah" id="id_daerah"
                            value="{{ old('id_daerah', $dropbox->id_daerah) }}" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                    </div>

                    <div class="mb-6">
                        <label for="nama_lokasi" class="block text-sm font-medium text-gray-800 mb-1">Nama Lokasi</label>
                        <input type="text" name="nama_lokasi" id="nama_lokasi"
                            value="{{ old('nama_lokasi', $dropbox->nama_lokasi) }}" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                    </div>

                    <div class="mb-6">
                        <label for="alamat" class="block text-sm font-medium text-gray-800 mb-1">Alamat</label>
                        <textarea name="alamat" id="alamat" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700 h-28">{{ old('alamat', $dropbox->alamat) }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label for="status_dropbox" class="block text-sm font-medium text-gray-800 mb-1">Status
                            Dropbox</label>
                        <select name="status_dropbox" id="status_dropbox" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700">
                            <option value="1"
                                {{ old('status_dropbox', $dropbox->status_dropbox) == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0"
                                {{ old('status_dropbox', $dropbox->status_dropbox) == 0 ? 'selected' : '' }}>Tidak Aktif
                            </option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="total_transaksi_dropbox" class="block text-sm font-medium text-gray-800 mb-1">Total
                            Transaksi Dropbox</label>
                        <input type="number" name="total_transaksi_dropbox" id="total_transaksi_dropbox"
                            value="{{ old('total_transaksi_dropbox', $dropbox->total_transaksi_dropbox) }}" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
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
