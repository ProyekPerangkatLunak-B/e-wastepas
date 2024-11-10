@extends('layouts.main-manajemen')

@section('content')
<div class="min-h-screen p-4 bg-gray-100">

        <!-- Main Content -->
        <div class="w-full ml-4 font-bold">
            <div class="p-6 bg-white rounded-lg shadow-xl">
                <div class="flex items-center justify-left">
                    <h2 class="text-xl font-semibold text-gray-800">Total Poin Terkumpul</h2>
                    <span class="px-3 py-1 ml-2 font-bold text-green-600 bg-green-100 rounded-lg">100,847</span>
                </div>
                <div class="p-4 mt-4 rounded-lg bg-gray-50">
                    <div class="flex items-center mb-4 space-x-2">
                        <span class="w-8 h-8 bg-green-600 rounded-full"></span>
                        <p class="text-gray-600">Database ini untuk melihat semua poin terkumpul</p>
                    </div>

                    <!-- Tabs -->
                    <div class="flex space-x-4 border-b">
                        <button class="pb-2 text-green-600 border-b-2 border-green-600">Semua Jenis</button>
                        <button class="pb-2 text-gray-500 hover:text-gray-700">Semua Jenis</button>
                        <button class="pb-2 text-gray-500 hover:text-gray-700">Semua Jenis</button>
                        <button class="pb-2 text-gray-500 hover:text-gray-700">Semua Jenis</button>
                    </div>

                    <!-- Search Bar -->
                    <div class="mt-4">
                        <input type="text" placeholder="Cari" class="w-full p-2 border border-gray-300 rounded-lg">
                    </div>

                    <!-- Table -->
                    <div class="mt-4 overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 font-medium text-left text-gray-600">Peringkat</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-600">Nama</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-600">Poin</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-600">Transaksi</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-600">Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t">
                                    <td class="px-4 py-2 text-gray-700">1</td>
                                    <td class="px-4 py-2 text-gray-700">Beyonce</td>
                                    <td class="px-4 py-2 text-gray-700">1019</td>
                                    <td class="px-4 py-2 text-gray-700">-</td>
                                    <td class="px-4 py-2 text-gray-700">-</td>
                                </tr>
                                <tr class="border-t">
                                    <td class="px-4 py-2 text-gray-700">2</td>
                                    <td class="px-4 py-2 text-gray-700">Aaliyah</td>
                                    <td class="px-4 py-2 text-gray-700">937</td>
                                    <td class="px-4 py-2 text-gray-700">-</td>
                                    <td class="px-4 py-2 text-gray-700">-</td>
                                </tr>
                                <tr class="border-t">
                                    <td class="px-4 py-2 text-gray-700">3</td>
                                    <td class="px-4 py-2 text-gray-700">Left Eye</td>
                                    <td class="px-4 py-2 text-gray-700">739</td>
                                    <td class="px-4 py-2 text-gray-700">-</td>
                                    <td class="px-4 py-2 text-gray-700">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
