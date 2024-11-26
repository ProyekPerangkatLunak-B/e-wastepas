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
            color: #2ecc71;
            /* Hijau tua */
            margin-bottom: 15px;
            border-bottom: 3px solid #27ae60;
            /* Hijau lebih gelap */
            display: inline-block;
            padding-bottom: 5px;
        }

        h4 {
            color: #2ecc71;
            /* Hijau tua */
        }

        a.inline-block {
            transition: all 0.3s ease;
        }

        a.inline-block:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 255, 0, 0.3);
            /* Hijau */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            overflow: hidden;
            border-radius: 12px;
        }

        th {
            background: linear-gradient(90deg, #27ae60, #2ecc71);
            /* Gradasi hijau */
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
            box-shadow: 0 4px 10px rgba(0, 255, 0, 0.1);
            /* Hijau */
        }

        button:hover {
            background-color: #2ecc71;
            /* Hijau */
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.3);
            /* Hijau lebih gelap */
        }

        .flex.space-x-2 button {
            margin: 0 3px;
            border-radius: 6px;
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }

        .flex.space-x-2 button:hover {
            background-color: #27ae60;
            /* Hijau lebih gelap */
            color: #fff;
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.4);
            /* Hijau lebih gelap */
        }

        .flex.space-x-2 .active {
            background-color: #2ecc71;
            /* Hijau */
            color: #fff;
        }
    </style>

    <div class="container max-w-full px-4 mx-auto bg-gray-50">
        <div class="py-8">
            <h2 class="text-2xl font-bold leading-relaxed ml-14 text-green-500">Dashboard Masyarakat</h2>
            <h4 class="text-base font-light ml-14 text-gray-600">Selamat datang di dashboard masyarakat.</h4>

            <div class="px-12 mt-6">
                <!-- Custom search and length menu -->
                <div class="flex items-center mb-4">
                    <label for="statusVerifikasiFilter" class="text-sm text-gray-700">Status Verifikasi:</label>
                    <select id="statusVerifikasiFilter" class="border rounded px-2 py-1 ml-2">
                        <option value="">Semua</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="Diproses">Diproses</option>
                    </select>
                </div>

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
                        <input type="text" id="customSearch" placeholder="Cari..." class="border rounded px-4 py-1" />
                    </div>
                </div>


                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table id="masyarakatTable" class="w-full border border-gray-300 bg-white rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border cursor-pointer px-4 py-2 text-left text-sm font-semibold text-gray-700"
                                    style="color: white">Nama</th>
                                <th class="border cursor-pointer px-4 py-2 text-left text-sm font-semibold text-gray-700"
                                    style="color: white">No KTP</th>
                                <th class="border cursor-pointer px-4 py-2 text-left text-sm font-semibold text-gray-700"
                                    style="color: white">No Telp</th>
                                <th class="border px-4 py-2 text-left text-sm font-semibold text-gray-700"
                                    style="color: white">Email</th>
                                <th class="border px-4 py-2 text-left text-sm font-semibold text-gray-700"
                                    style="color: white">Kelayakan akun</th>
                                <th class="border px-4 py-2 text-left text-sm font-semibold text-gray-700"
                                    style="color: white">status</th>
                                <th class="border px-4 py-2 text-left text-sm font-semibold text-gray-700"
                                    style="color: white">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan dimuat melalui AJAX -->
                        </tbody>
                    </table>
                </div>

                <!-- Custom pagination -->
                <div id="customPagination" class="flex justify-between mt-4" style="color: white">
                    <div id="customInfo" class="text-sm  text-gray-700">
                        <!-- Informasi jumlah data akan diisi di sini -->
                    </div>
                    <div class="space-x-2 ">
                        <!-- Tombol pagination akan dihasilkan di sini -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Define the changePage function globally
        function changePage(page) {
            $('#masyarakatTable').DataTable().page(page).draw('page');
        }

        document.addEventListener('DOMContentLoaded', () => {
            $(document).ready(function() {
                var table = $('#masyarakatTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: function(data, callback, settings) {
                        var statusVerifikasi = $('#statusVerifikasiFilter').val();
                        var searchQuery = data.search.value;
                        var orderColumnIndex = data.order[0].column;
                        var orderDirection = data.order[0].dir;
                        var orderColumn = data.columns[orderColumnIndex]
                            .name;

                        var orderColumn = data.order && data.order.length ? data.columns[data
                            .order[0].column].name : 'nama';
                        var orderDirection = data.order && data.order.length ? data.order[0]
                            .dir : 'asc';

                        $.ajax({
                            url: '{{ route('admin.datamaster.masyarakat.getData') }}',
                            method: 'GET',
                            data: {
                                status_verifikasi: statusVerifikasi,
                                search: searchQuery,
                                order_column: orderColumn,
                                order_direction: orderDirection,
                                length: settings._iDisplayLength,
                                start: settings._iDisplayStart,
                            },
                            success: function(response) {
                                callback({
                                    draw: settings.iDraw,
                                    recordsTotal: response.recordsTotal,
                                    recordsFiltered: response
                                        .recordsFiltered,
                                    data: response.data
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX error: ', error);
                            }
                        });
                    },
                    columns: [{
                            data: 'nama',
                            name: 'nama',
                            orderable: true
                        },
                        {
                            data: 'nomor_ktp',
                            name: 'nomor_ktp',
                            orderable: true
                        },
                        {
                            data: 'nomor_telepon',
                            name: 'nomor_telepon',
                            orderable: true
                        },
                        {
                            data: 'email',
                            name: 'email',
                            orderable: true
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'status_verifikasi',
                            name: 'status_verifikasi',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            visible: false
                        },
                        {
                            data: 'id_pengguna',
                            name: 'id_pengguna',
                            orderable: false,
                            render: function(data) {
                                return `
                                    <div class="flex space-x-2">
                                        <a href="/admin/datamaster/master-data/jenis/${data}/edit"
                                            style="color: white"
                                            class="px-3 py-1 bg-gradient-to-r from-green-500 to-green-400 text-white text-sm rounded hover:bg-gradient-to-r hover:from-green-400 hover:to-green-500 transform hover:-translate-y-1 transition">
                                            Edit
                                        </a>
                                        <button class="px-3 py-1 bg-gradient-to-r from-red-500 to-red-400 text-white text-sm rounded hover:bg-red-600 transform hover:-translate-y-1 transition"
                                            onclick="confirmDelete(${data})"
                                            style="color: white">
                                            Hapus
                                        </button>
                                    </div>`;
                            }
                        }
                    ],
                    order: [
                        [6, 'asc']
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
                            `
                            <button class="px-3 py-1 border rounded ${pageInfo.page === i ? 'bg-green-500 text-white' : 'bg-white'}" onclick="changePage(${i})">${i + 1}</button>`;
                        $('#customPagination').append(button);
                    }
                });

                // Menangani perubahan filter status
                $('#statusVerifikasiFilter').on('change', function() {
                    table.ajax.reload(); // Reload data tabel ketika filter status berubah
                });
            });
        });


        // Move confirmDelete outside of DOMContentLoaded
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
                        url: `{{ route('admin.datamaster.jenis.destroy', '') }}/${id}`,
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
                            $('#masyarakatTable').DataTable().ajax.reload();
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
