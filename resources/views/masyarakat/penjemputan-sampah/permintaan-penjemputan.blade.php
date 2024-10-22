@extends('main')

@section('content')
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Mengajukan Permintaan Penjemputan</h2>
            <div class="flex items-center justify-between">
                <h4 class="text-base font-normal ml-14">Form permintaan untuk permintaan penjemputan sampah elektronik.</h4>
            </div>

            {{-- Form Section --}}
            <div class="container grid w-1/2 grid-cols-1 gap-6 px-12 mt-4 bg-white rounded-lg lg:grid-cols-2 ms-14">
                <form action="#" method="POST" class="col-span-2">
                    @csrf
                    {{-- Pilih Kategori --}}
                    <div class="col-span-1 mt-4 mb-6 me-6">
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Pilih Kategori</label>
                        <div class="relative mt-1">
                            <select id="kategori" name="kategori"
                                class="block w-1/4 px-4 py-2 text-sm text-gray-700 border border-green-300 rounded-lg focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                                <option>Pilih Kategori</option>
                                <option>Kategori 1</option>
                                <option>Kategori 2</option>
                                <option>Kategori 3</option>
                            </select>
                        </div>
                    </div>

                    {{-- Pilih Jenis --}}
                    <div class="col-span-1 mb-6">
                        <label for="jenis" class="block text-sm font-medium text-gray-700">Pilih Jenis</label>
                        <div class="relative mt-1">
                            <select id="jenis" name="jenis"
                                class="block w-1/4 px-4 py-2 text-sm text-gray-700 border border-green-300 rounded-lg focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
                                <option>Pilih Jenis</option>
                                <option>Jenis 1</option>
                                <option>Jenis 2</option>
                                <option>Jenis 3</option>
                            </select>
                        </div>
                    </div>

                    {{-- Tambahkan field lain jika diperlukan di sini --}}

                    {{-- Tombol Submit --}}
                    <div class="flex justify-between col-span-2">
                        <a href="#" class="text-sm text-gray-500">Kembali</a>
                        <button type="submit"
                            class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-400">Kirim Permintaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
