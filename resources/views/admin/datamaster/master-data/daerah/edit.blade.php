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
            <h2 class="text-2xl font-bold leading-relaxed ml-14">Edit Daerah</h2>
            <h4 class="text-base font-normal ml-14">Silakan isi form berikut untuk memperbarui data daerah.</h4>

            <div class="px-12 mt-4">
                <form action="{{ route('admin.datamaster.daerah.update', $daerah->id_daerah) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-6">
                        <label for="nama_daerah" class="block text-sm font-medium text-gray-800 mb-1">Nama Daerah</label>
                        <input type="text" name="nama_daerah" id="nama_daerah" value="{{ $daerah->nama_daerah }}"
                            required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700" />
                    </div>

                    <div class="mb-6">
                        <label for="status_daerah" class="block text-sm font-medium text-gray-800 mb-1">Status
                            Daerah</label>
                        <select name="status_daerah" id="status_daerah" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 text-gray-700">
                            <option value="1" {{ $daerah->status_daerah ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ !$daerah->status_daerah ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
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
@endsection
