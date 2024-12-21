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
            <h2 class="text-2xl font-bold leading-relaxed ml-14 text-gray-700">Dashboard Daerah</h2>
            <h4 class="text-base font-light ml-14 text-gray-600">Selamat datang di dashboard Daerah.</h4>

            <div class="px-12 mt-6">
                <!-- Custom search and length menu -->
                <div class="mt-6 mb-6">
                    <div class="flex justify-between items-center w-full">
                        <!-- Left side filters -->
                        <div class="flex items-center space-x-4">
                            <!-- Status Dropbox Filter -->
                            <div class="flex items-center">
                                <label for="statusVerifikasiFilter" class="text-sm text-gray-700">Status Dropbox:</label>
                                <select id="statusVerifikasiFilter" class="border rounded px-2 py-1 ml-2">
                                    <option value="">Semua</option>
                                    <option value="Diterima">Aktif</option>
                                    <option value="Ditolak">Tidak Aktif</option>
                                </select>
                            </div>
                            <!-- Tampilkan Dropdown -->
                            <div class="flex items-center">
                                <label for="customLengthMenu" class="text-sm text-gray-700">Tampilkan:</label>
                                <select id="customLengthMenu" class="border rounded px-2 py-1 ml-2">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>

                        <!-- Right side elements -->
                        <div class="flex items-center space-x-4">
                            <!-- Search input -->
                            <div class="flex text-sm">
                                <input type="text" id="customSearch" placeholder="Cari..."
                                    class="border rounded px-2 py-1" />
                            </div>
                            <!-- Add button -->
                            <a href="{{ route('admin.datamaster.daerah.create') }}"
                                class="inline-block px-5 py-2 text-sm bg-gradient-to-r from-green-500 to-green-400 text-white-100 rounded-lg shadow hover:bg-gradient-to-r hover:from-green-400 hover:to-green-500 transition transform hover:-translate-y-1">
                                <i class="fas fa-plus mr-2"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table id="daerahTable" class="w-full border border-gray-300 bg-white rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2 text-left text-sm font-semibold text-white">Nama Daerah</th>
                                <th class="border px-4 py-2 text-left text-sm font-semibold text-white">Total Dropbox
                                </th>
                                <th class="border px-4 py-2 text-left text-sm font-semibold text-white">Status Daerah
                                </th>
                                <th class="border px-4 py-2 text-left text-sm font-semibold text-white">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan dimuat melalui AJAX -->
                        </tbody>
                    </table>
                </div>

                <!-- Custom pagination -->
                <!-- Custom pagination -->
                <div id="customPagination" class="flex justify-center items-center space-x-2 mt-4">
                    <!-- Tombol sebelumnya -->
                    <button class="pagination-btn">&lt;</button>

                    <!-- Nomor halaman -->
                    <button class="pagination-btn">1</button>
                    <button class="pagination-btn active">2</button>
                    <button class="pagination-btn">3</button>

                    <!-- Tombol berikutnya -->
                    <button class="pagination-btn">&gt;</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            $(document).ready(function() {
                // Initialize DataTable
                var table = $('#daerahTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.datamaster.daerah.data') }}',
                    columns: [{
                            data: 'nama_daerah',
                            name: 'nama_daerah'
                        },
                        {
                            data: 'total_dropbox',
                            name: 'total_dropbox'
                        },
                        {
                            data: 'status_daerah',
                            name: 'status_daerah',
                            render: function(data) {
                                return data == 1 ?
                                    '<span class="px-2 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Aktif</span>' :
                                    '<span class="px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">Tidak Aktif</span>';
                            }
                        },
                        {
                            data: 'id_daerah',
                            name: 'id_daerah',
                            orderable: false,
                            render: function(data, type, row) {
                                return `
                                    <div class="flex space-x-2">
                                        <a href="/admin/datamaster/master-data/daerah/${data}/edit" class="px-3 py-1 bg-gradient-to-r from-green-500 to-green-400 text-white text-sm rounded hover:bg-gradient-to-r hover:from-green-400 hover:to-green-500 transform hover:-translate-y-1 transition" style="color: white">
                                            <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                                        </a>
                                        <button class="px-3 py-1 bg-gradient-to-r from-red-500 to-red-400 text-white text-sm rounded hover:bg-red-600 transform hover:-translate-y-1 transition" style="color: white" onclick="confirmDelete(${data})">
                                            <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                        </button>
                                    </div>`;
                            }
                        }
                    ],
                    order: [
                        [0, 'asc']
                    ],
                    dom: 't',
                });

                // Custom search input
                $('#customSearch').on('keyup', function() {
                    table.search(this.value).draw();
                });

                // Custom length menu
                $('#customLengthMenu').on('change', function() {
                    table.page.len(this.value).draw();
                });

                // Custom pagination and info display
                table.on('draw', function() {
                    var pageInfo = table.page.info();
                    $('#customInfo').text(
                        `Menampilkan ${pageInfo.length} data dari ${pageInfo.recordsTotal} data`
                    );

                    $('#customPagination').empty();
                    for (var i = 0; i < pageInfo.pages; i++) {
                        var button =
                            `<button class="px-3 py-1 border rounded ${pageInfo.page === i ? 'bg-green-500 hover:bg-green-700 text-white-100' : 'bg-green-700'}" onclick="changePage(${i})">${i + 1}</button>`;
                        $('#customPagination').append(button);
                    }
                });

                window.changePage = function(page) {
                    table.page(page).draw('page');
                };

                // Alert untuk tambah data
                @if (session('success'))
                    Swal.fire({
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                @endif
            });
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('admin.datamaster.daerah.destroy', '') }}/${id}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire(
                                'Dihapus!',
                                'Data berhasil dihapus.',
                                'success'
                            );
                            $('#daerahTable').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Gagal!',
                                xhr.responseJSON && xhr.responseJSON.error ?
                                `Gagal menghapus data: ${xhr.responseJSON.error}` :
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>
@endsection
