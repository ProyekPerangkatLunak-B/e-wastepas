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
                border-bottom: 3px solid #27ae60;
                display: inline-block;
                padding-bottom: 5px;
            }

            h4 {
                color: #666;
            }

            a.inline-block {
                transition: all 0.3s ease;
            }

            a.inline-block:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            }

            table {
                border-collapse: collapse;
                width: 100%;
                overflow: hidden;
                border-radius: 12px;
            }

            th {
                background: linear-gradient(90deg, #27ae60, #2ecc71);
                color: #ffffff;
                padding: 12px;
                text-transform: uppercase;
                font-weight: bold;
                border: none;
            }

            td {
                padding: 10px;
                border: 1px solid #e0e0e0;
            }

            td,
            th {
                text-align: left;
            }

            button {
                transition: background-color 0.3s, box-shadow 0.3s;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }

            button:hover {
                background-color: #e74c3c;
                box-shadow: 0 6px 20px rgba(231, 76, 60, 0.3);
            }

            #customLengthMenu,
            #customSearch {
                border: 1px solid #ddd;
                padding: 8px;
                border-radius: 8px;
                outline: none;
                transition: box-shadow 0.2s;
            }

            #customLengthMenu:focus,
            #customSearch:focus {
                box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
            }

            .flex.space-x-2 button {
                margin: 0 3px;
                border-radius: 6px;
                transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
            }

            .flex.space-x-2 button:hover {
                background-color: #4a90e2;
                color: #fff;
                box-shadow: 0 4px 12px rgba(74, 144, 226, 0.4);
            }

            .flex.space-x-2 .active {
                background-color: #007bff;
                color: #fff;
            }
        </style>

        <div class="container max-w-full px-4 mx-auto bg-gray-50">
            <div class="py-8">
                <h2 class="text-2xl font-bold leading-relaxed ml-14 text-green-500">Dashboard</h2>
                <h4 class="text-base font-light ml-14 text-gray-600">Selamat datang di dashboard.</h4>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-8 px-12">
                    {{-- Card Pelanggan --}}
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4  hover:shadow-green-200">
                        <i class="fas fa-user text-blue-500 text-3xl"></i>
                        <div>
                            <h5 class="text-gray-600 font-semibold">Pelanggan</h5>
                            <p class="text-2xl font-bold">1</p>
                        </div>
                    </div>
                    {{-- Card Kurir --}}
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4 hover:shadow-green-200">
                        <i class="fas fa-motorcycle text-green-500 text-3xl"></i>
                        <div>
                            <h5 class="text-gray-600 font-semibold">Kurir</h5>
                            <p class="text-2xl font-bold">30</p>
                        </div>
                    </div>
                    {{-- Card Dropbox --}}
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4  hover:shadow-green-200">
                        <i class="fas fa-box text-yellow-500 text-3xl"></i>
                        <div>
                            <h5 class="text-gray-600 font-semibold">Dropbox</h5>
                            <p class="text-2xl font-bold">75</p>
                        </div>
                    </div>
                    {{-- Card Poin --}}
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4  hover:shadow-green-200">
                        <i class="fas fa-star text-purple-500 text-3xl"></i>
                        <div>
                            <h5 class="text-gray-600 font-semibold">Poin</h5>
                            <p class="text-2xl font-bold">1200</p>
                        </div>
                    </div>
                </div>

                <div class="px-12 mt-6">
                    <!-- Custom search and length menu -->
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center">
                            <label for="customLengthMenu" class="text-sm text-gray-700">Tampilkan:</label>
                            <select id="customLengthMenu" class="border rounded px-2 py-1 ml-2">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="flex items-center">
                            <input type="text" id="customSearch" placeholder="Cari..."
                                class="border rounded px-4 py-1" />
                        </div>
                    </div>


                    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                        <table id="daerahTable" class="w-full border border-gray-300 bg-white rounded-lg">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-4 py-2 text-left text-sm font-semibold text-white">Pelanggan
                                    </th>
                                    <th class="border px-4 py-2 text-left text-sm font-semibold text-white">Kurir
                                    </th>
                                    <th class="border px-4 py-2 text-left text-sm font-semibold text-white">Jenis Sampah
                                    </th>
                                    <th class="border px-4 py-2 text-left text-sm font-semibold text-white">Dropbox</th>
                                    <th class="border px-4 py-2 text-left text-sm font-semibold text-white">Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 border-b">John Doe</td>
                                    <td class="px-4 py-2 border-b">Doe Kur</td>
                                    <td class="px-4 py-2 border-b">Mousepad</td>
                                    <td class="px-4 py-2 border-b">TPE - Bandung Jaya</td>
                                    <td class="px-4 py-2 border-b">2000pt</td>
                                </tr>
                                <!-- Tambahkan baris tambahan untuk setiap pengguna -->

                            </tbody>
                        </table>
                    </div>

                    <!-- Custom pagination -->
                    <div id="customPagination" class="flex justify-between mt-4" style="color: white">
                        <div id="customInfo" class="text-sm text-gray-700">
                            <!-- Informasi jumlah data akan diisi di sini -->
                        </div>
                        <div class="space-x-2">
                            <!-- Tombol pagination akan dihasilkan di sini -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function confirmRegistration() {
                Swal.fire({
                    title: 'Apakah Anda yakin ingin menyetujui registrasi ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Setujui',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Registrasi Disetujui',
                            'Registrasi masyarakat telah disetujui.',
                            'success'
                        );
                        // Tambahkan logika untuk menyimpan persetujuan di backend jika diperlukan
                    }
                });
            }

            function confirmDelete() {
                Swal.fire({
                    title: 'Apakah Anda yakin ingin Menghapus Kurir ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Setujui',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Masyarakat Berhasil dihapus',
                            'Masyarakat telah dihapus.',
                            'success'
                        );
                        // Tambahkan logika untuk menyimpan persetujuan di backend jika diperlukan
                    }
                });
            }
        </script>
    @endsection
