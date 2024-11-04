@extends('layouts.main-admin')

@section('content')
    {{-- Card jumlah masyarakat, dll --}}
    <div class="container max-w-full px-4 mx-auto bg-gray-100">
        <div class="py-8">
            <h2 class="text-2xl font-semibold leading-relaxed ml-14">Dashboard Masyarakat</h2>
            <h4 class="text-base font-normal ml-14">Selamat datang di dashboard masyarakat.</h4>

            {{-- Table Section --}}
            <div class="px-12 mt-4">
                <table class="min-w-full bg-white border rounded-lg">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Nama</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Email</th>
                            <th class="px-4 py-2 border-b text-left text-gray-600">Status Registrasi</th>
                            <th class="px-5 py-2 border-b text-left text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border-b">John Doe</td>
                            <td class="px-4 py-2 border-b">johndoe@example.com</td>
                            <td class="px-4 py-2 border-b">
                                <span class="px-2 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                    Terverifikasi
                                </span>
                            </td>
                            <td class="px-4 py-2 border-b">
                                <button class="px-2 py-1 bg-green-500 rounded hover:bg-green-700 shadow"
                                    onclick="confirmRegistration()">
                                    <i class="fas fa-check" style="color: white"></i>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
                        'Data masyarakat berhasil dihapus.',
                        'success'
                    );
                    // Logic for deleting data in the backend can be added here
                }
            });
        }

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
    </script>
@endsection
