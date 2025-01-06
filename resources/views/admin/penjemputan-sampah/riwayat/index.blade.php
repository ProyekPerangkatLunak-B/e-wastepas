@extends('layouts.main-admin') <!-- Menggunakan layout utama untuk halaman admin -->

@section('content') <!-- Awal dari section konten -->

    <style>
        /* Styling untuk elemen h2 */
        h2 {
            color: black;
            margin-bottom: 15px;
            border-bottom: 3px solid black;
            display: inline-block;
            padding-bottom: 5px;
        }

        /* Styling untuk elemen h4 */
        h4 {
            color: black;
        }

        /* Styling untuk elemen a dengan class inline-block */
        a.inline-block {
            transition: all 0.3s ease;
        }

        /* Styling untuk elemen a dengan class inline-block saat hover */
        a.inline-block:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 255, 0, 0.3);
        }

        /* Styling untuk elemen table */
        table {
            border-collapse: collapse;
            width: 100%;
            overflow: hidden;
            border-radius: 12px;
        }

        /* Styling untuk elemen th */
        th {
            background: linear-gradient(90deg, #27ae60, #2ecc71);
            color: #ffffff;
            padding: 12px;
            text-transform: uppercase;
            font-weight: bold;
            border: none;
        }

        /* Styling untuk elemen td */
        td {
            padding: 10px;
            border: 1px solid #e0e0e0;
            background: white;
        }

        /* Styling untuk elemen td dan th */
        td, th {
            text-align: left;
        }

        /* Styling untuk elemen button */
        button {
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 10px rgba(0, 255, 0, 0.1);
            background-color: #437252;
            color: #ffffff;
        }

        /* Styling untuk elemen button saat hover */
        button:hover {
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.3);
        }

        /* Styling untuk elemen button dalam class flex.space-x-2 */
        .flex.space-x-2 button {
            margin: 0 3px;
            border-radius: 6px;
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }

        /* Styling untuk elemen button dalam class flex.space-x-2 saat hover */
        .flex.space-x-2 button:hover {
            background-color: #27ae60;
            color: #fff;
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.4);
        }

        /* Styling untuk elemen dengan class active dalam class flex.space-x-2 */
        .flex.space-x-2 .active {
            background-color: #2ecc71;
            color: #fff;
        }
    </style>

    <div class="container max-w-full px-4 mx-auto bg-[#F1F5F9]"> <!-- Container utama -->
        <div class="py-8 ">
            <div class="py-8 flex items-center justify-between"> <!-- Bagian header dengan judul dan tombol filter -->
                <div class="ml-14">
                    <h2 class="text-2xl font-bold leading-relaxed text-black">Riwayat Penjemputan Sampah</h2> <!-- Judul halaman -->
                    <h4 class="text-base font-light text-black">Admin dapat melihat history Penjemputan Sampah elektronik.</h4> <!-- Deskripsi halaman -->
                </div>
                <div class="mr-14 mb-14 relative">
                    <button class=" text-white font-medium py-2 px-4 rounded " onclick="toggleDropdown()"> <!-- Tombol filter -->
                        Filter
                    </button>
                    <div id="filterDropdown" class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg hidden"> <!-- Dropdown filter -->
                        <ul>
                            <li><a href="#" class="block px-2 py-1 hover:bg-gray-200  text-center">Semua</a></li> <!-- Filter Semua -->
                            <li><a href="#" class="block px-2 py-1 hover:bg-gray-200  text-center">Diterima</a></li> <!-- Filter Diterima -->
                            <li><a href="#" class="block px-2 py-1 hover:bg-gray-200  text-center">Dibatalkan</a></li> <!-- Filter Dibatalkan -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="px-12 mt-6">
                <div class="overflow-x-auto bg-white rounded-lg shadow-md"> <!-- Tabel data -->
                    <table id="masyarakatTable" class="w-full border border-gray-300 bg-white rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700" style="color: white">ID Penjemputan</th> <!-- Kolom ID Penjemputan -->
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700" style="color: white">Nama Masyarakat</th> <!-- Kolom Nama Masyarakat -->
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700" style="color: white">Nama Kurir</th> <!-- Kolom Nama Kurir -->
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700" style="color: white">Tanggal Penjemputan</th> <!-- Kolom Tanggal Penjemputan -->
                                <th class="border px-4 py-2 text-center text-sm font-semibold text-gray-700" style="color: white">Dropbox</th> <!-- Kolom Dropbox -->
                                <th class="border px-4 py-2 text-center text-sm font-semibold text-gray-700" style="color: white">Status</th> <!-- Kolom Status -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan dimuat melalui AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk mengubah halaman pada DataTable
        function changePage(page) {
            $('#masyarakatTable').DataTable().page(page).draw('page');
        }

        // Event listener saat DOM sudah siap
        document.addEventListener('DOMContentLoaded', () => {
            $(document).ready(function() {
                var table = $('#masyarakatTable').DataTable({
                    processing: true, // Menampilkan indikator pemrosesan
                    serverSide: true, // Menggunakan server-side processing
                    ajax: {
                        url: '{{ route('admin.penjemputan-sampah.riwayat.index') }}', // URL untuk mengambil data
                        type: 'GET',
                        data: function(d) {
                            // Menambahkan nilai filter ke permintaan AJAX
                            d.status_filter = $('#filterDropdown').data('selected');
                        }
                    },
                    columns: [
                        { data: 'id_penjemputan', name: 'id_penjemputan', orderable: true, searchable: true }, // Kolom ID Penjemputan
                        { data: 'nama_masyarakat', name: 'nama_masyarakat', orderable: true, searchable: true }, // Kolom Nama Masyarakat
                        { data: 'nama_kurir', name: 'nama_kurir', orderable: true, searchable: true }, // Kolom Nama Kurir
                        { data: 'tanggal_penjemputan', name: 'tanggal_penjemputan', orderable: true, searchable: false }, // Kolom Tanggal Penjemputan
                        { data: 'dropbox', name: 'nama_dropbox', orderable: true, searchable: true }, // Kolom Dropbox
                        { data: 'status', name: 'status', orderable: false, searchable: false } // Kolom Status
                    ],
                    order: [[0, 'asc']], // Urutan default berdasarkan ID Penjemputan secara ascending
                    dom: 't' // Hanya menampilkan tabel tanpa elemen lain
                });

                // Event handler untuk pemilihan filter
                $('#filterDropdown a').on('click', function(e) {
                    e.preventDefault();
                    const selectedFilter = $(this).text().trim();

                    // Menyimpan filter yang dipilih dalam atribut data dropdown
                    $('#filterDropdown').data('selected', selectedFilter);

                    // Memuat ulang DataTable dengan filter baru
                    table.ajax.reload();
                });
            });
        });

        // Fungsi untuk menampilkan atau menyembunyikan dropdown filter
        function toggleDropdown() {
            const dropdown = document.getElementById('filterDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Event listener untuk menutup dropdown jika diklik di luar
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('filterDropdown');
            const button = event.target.closest('button');

            if (!dropdown.contains(event.target) && !button) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
@endsection <!-- Akhir dari section konten -->