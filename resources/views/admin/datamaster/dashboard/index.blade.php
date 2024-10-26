@extends('layouts.main')

@section('content')
    {{-- Container Utama --}}
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            {{-- Section Judul --}}
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Dashboard Kurir</h2>
            <h4 class="text-base font-normal ml-14">Selamat datang di dashboard kurir.</h4>

            {{-- Card Section --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-8 px-12">
                {{-- Card Pelanggan --}}
                <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
                    <i class="fas fa-user text-blue-500 text-3xl"></i>
                    <div>
                        <h5 class="text-gray-600 font-semibold">Pelanggan</h5>
                        <p class="text-2xl font-bold">150</p>
                    </div>
                </div>
                {{-- Card Kurir --}}
                <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
                    <i class="fas fa-motorcycle text-green-500 text-3xl"></i>
                    <div>
                        <h5 class="text-gray-600 font-semibold">Kurir</h5>
                        <p class="text-2xl font-bold">30</p>
                    </div>
                </div>
                {{-- Card Dropbox --}}
                <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
                    <i class="fas fa-box text-yellow-500 text-3xl"></i>
                    <div>
                        <h5 class="text-gray-600 font-semibold">Dropbox</h5>
                        <p class="text-2xl font-bold">75</p>
                    </div>
                </div>
                {{-- Card Poin --}}
                <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
                    <i class="fas fa-star text-purple-500 text-3xl"></i>
                    <div>
                        <h5 class="text-gray-600 font-semibold">Poin</h5>
                        <p class="text-2xl font-bold">1200</p>
                    </div>
                </div>
            </div>

            {{-- Table Section --}}
            <div class="px-12 mt-8">
                <table class="min-w-full bg-white border rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Pelanggan</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Kurir</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Jenis Sampah</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Dropbox</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border-b">John Doe</td>
                            <td class="px-4 py-2 border-b">Jane Smith</td>
                            <td class="px-4 py-2 border-b">Plastik</td>
                            <td class="px-4 py-2 border-b">Dropbox 1</td>
                            <td class="px-4 py-2 border-b">200</td>

                        </tr>
                        <!-- Tambahkan baris tambahan untuk setiap pengguna -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
