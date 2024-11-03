@extends('layouts.main-admin')

@section('content')
    {{-- Card jumlah kurir, dll --}}
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-2xl font-semibold leading-relaxed ml-14">Dashboard Jenis</h2>
            <h4 class="text-base font-normal ml-14">Selamat datang di dashboard jenis.</h4>

            {{-- Tombol Tambah Data --}}
            <div class="flex justify-end px-12 mt-4">
                <button onclick="openAddDataModal()"
                    class="flex items-center px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-700 shadow-lg transition duration-200"
                    style="color: white">
                    <i class="fas fa-plus mr-2"></i> Tambah Data
                </button>
            </div>

            {{-- Table Section --}}
            <div class="px-12 mt-4">
                <table class="min-w-full bg-white border rounded-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Nama Dropbox</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Wilayah</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Total Transaksi</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border-b">TPS - SMA 16 Bandung</td>
                            <td class="px-4 py-2 border-b">TPA - Setiabudhi</td>
                            <td class="px-4 py-2 border-b">50</td>
                            <td class="px-4 py-2 border-b">
                                <button class="px-2 py-1 bg-blue-500 rounded hover:bg-blue-700 shadow"
                                    onclick="confirmEdit()">
                                    <i class="fas fa-edit" style="color: white"></i>
                                </button>
                                <button class="px-2 py-1 bg-red-500 rounded hover:bg-red-700 shadow"
                                    onclick="confirmDelete()">
                                    <i class="fas fa-trash" style="color: white"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Tambahkan baris tambahan untuk setiap pengguna -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal for Adding Data --}}
    <div id="addDataModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-70">
        <div class="bg-white rounded-lg p-6 w-1/3 shadow-lg" style="background-color: white">
            <h3 class="text-lg font-semibold">Tambah Data Dropbox</h3>
            <div class="flex flex-col space-y-4 mt-4">
                <div class="flex flex-col">
                    <label for="namaDropbox" class="mb-1 font-medium text-gray-700">Nama Dropbox</label>
                    <input type="text" id="namaDropbox"
                        class="w-full p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan nama dropbox">
                </div>
                <div class="flex flex-col">
                    <label for="wilayah" class="mb-1 font-medium text-gray-700">Wilayah</label>
                    <select id="wilayah"
                        class="w-full p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>Pilih Wilayah</option>
                        <option value="Braga">Braga</option>
                        <option value="Bandung Timur">Bandung Timur</option>
                        <option value="Setiabudhi">Setiabudhi</option>
                        <option value="Dago">Dago</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="totalTransaksi" class="mb-1 font-medium text-gray-700">Total Transaksi</label>
                    <input type="number" id="totalTransaksi"
                        class="w-full p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan total transaksi">
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button onclick="saveData()"
                    class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700 transition duration-200">Simpan</button>
                <button onclick="closeAddDataModal()"
                    class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700 transition duration-200 ml-2">Batal</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function openAddDataModal() {
            document.getElementById('addDataModal').classList.remove('hidden');
        }

        function closeAddDataModal() {
            document.getElementById('addDataModal').classList.add('hidden');
        }

        function saveData() {
            const namaDropbox = document.getElementById('namaDropbox').value;
            const wilayah = document.getElementById('wilayah').value;
            const totalTransaksi = document.getElementById('totalTransaksi').value;

            if (!namaDropbox || !wilayah || !totalTransaksi) {
                alert('Mohon isi semua field');
            } else {
                // Logic to save the data can be added here (e.g., send to backend)
                alert('Data Dropbox berhasil ditambahkan!');

                // Close the modal after saving
                closeAddDataModal();

                // Clear inputs
                document.getElementById('namaDropbox').value = '';
                document.getElementById('wilayah').value = '';
                document.getElementById('totalTransaksi').value = '';
            }
        }

        function confirmRegistration() {
            Swal.fire({
                title: 'Apakah anda menyetujui registrasi ini kurir?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Setujui',
                cancelButtonText: 'Tolak'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Registrasi Disetujui',
                        'Registrasi Kurir disetujui.',
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Registrasi Ditolak',
                        'Registrasi Kurir tidak disetujui.',
                        'error'
                    );
                }
            });
        }

        function confirmDelete() {
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Data Dihapus',
                        'Data kurir berhasil dihapus.',
                        'success'
                    );
                    // Logic to delete data from the backend can be added here
                }
            });
        }
    </script>
@endsection
