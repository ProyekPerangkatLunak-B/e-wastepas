@extends('layouts.main')

@section('content')
    {{-- Card jumlah kurir, dll --}}
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-xl font-semibold leading-relaxed ml-14">Dashboard Kurir</h2>
            <h4 class="text-base font-normal ml-14">Selamat datang di dashboard kurir.</h4>

            {{-- Table Section --}}
            <div class="px-12 mt-4">
                <table class="min-w-full bg-white border rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Nama</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Email</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Jenis Kendaraan</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Status Registrasi</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border-b">John Doe</td>
                            <td class="px-4 py-2 border-b">johndoe@example.com</td>
                            <td class="px-4 py-2 border-b">Mobil</td>
                            <td class="px-4 py-2 border-b">Terverifikasi</td>
                            <td class="px-4 py-2 border-b">
                                <div class="flex items-center space-x-4">
                                    <button class="text-green-500 hover:text-green-700" onclick="confirmRegistration()">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-file"></i>
                                    </button>
                                    <button class="text-red-500 hover:text-red-700" onclick="confirmDelete()">
                                        <i class="fas fa-trash"></i>
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
                    // Logika penghapusan data di backend dapat ditambahkan di sini
                }
            });
        }
    </script>
@endsection
