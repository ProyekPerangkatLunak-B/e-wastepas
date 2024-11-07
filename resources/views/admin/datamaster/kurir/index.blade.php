@extends('layouts.main-admin')

@section('content')
    {{-- Card jumlah kurir, dll --}}
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-2xl font-semibold leading-relaxed ml-14">Dashboard Kurir</h2>
            <h4 class="text-base font-normal ml-14">Selamat datang di dashboard kurir.</h4>

            {{-- Table Section --}}
            <div class="px-12 mt-4">
                <table class="min-w-full bg-white border rounded-lg">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-600 border-b">Nama</th>
                            <th class="px-4 py-2 text-left text-gray-600 border-b">Email</th>
                            <th class="px-4 py-2 text-left text-gray-600 border-b">Jenis Kendaraan</th>
                            <th class="px-4 py-2 text-left text-gray-600 border-b">Status Registrasi</th>
                            <th class="py-2 text-left text-gray-600 border-b px-9">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border-b">John Doe</td>
                            <td class="px-4 py-2 border-b">johndoe@example.com</td>
                            <td class="px-4 py-2 border-b">Mobil</td>
                            <td class="px-4 py-2 border-b">
                                <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                    Terverifikasi
                                </span>
                            </td>
                            <td class="px-4 py-2 border-b">
                                <div class="flex items-center space-x-4">
                                    <button onclick="viewDetails()"
                                        class="px-2 py-1 bg-blue-500 rounded shadow hover:bg-blue-700">
                                        <i class="fas fa-file" style="color: white"></i>
                                    </button>
                                    <button onclick="confirmRegistration()"
                                        class="px-2 py-1 bg-green-500 rounded shadow hover:bg-green-700">
                                        <i class="fas fa-check" style="color: white"></i>
                                    </button>
                                    <button onclick="confirmDelete()"
                                        class="px-2 py-1 bg-red-500 rounded shadow hover:bg-red-700">
                                        <i class="fas fa-trash" style="color: white"></i>
                                    </button>

                                </div>
                            </td>
                        </tr>
                        <!-- Tambahkan baris tambahan untuk setiap pengguna -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        'Registrasi kurir telah disetujui.',
                        'success'
                    );
                    // Tambahkan logika untuk menyimpan persetujuan di backend jika diperlukan
                }
            });
        }

        function confirmDelete() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
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
                    // Tambahkan logika untuk menghapus data di backend jika diperlukan
                }
            });
        }

        function viewDetails() {
            // Implementasikan logika untuk melihat detail jika diperlukan
            Swal.fire({
                title: 'Detail Kurir',
                text: 'Tampilkan informasi detail kurir di sini.',
                icon: 'info',
                confirmButtonText: 'Ok'
            });
        }
    </script>
@endsection
