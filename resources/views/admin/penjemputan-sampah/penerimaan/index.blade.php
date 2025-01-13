@extends('layouts.main-admin')

@section('content')
    <style>
        h2 {
            color: black;
            margin-bottom: 15px;
            border-bottom: 3px solid #2ecc71;
            display: inline-block;
            padding-bottom: 5px;
        }

        h4 {
            color: black;
        }

        a.inline-block {
            transition: all 0.3s ease;
        }

        a.inline-block:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 255, 0, 0.3);
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
            background: white;
        }

        td,
        th {
            text-align: left;
        }

        button {
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 10px rgba(0, 255, 0, 0.1);
        }

        button:hover {
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.3);
        }

        .flex.space-x-2 button {
            margin: 0 3px;
            border-radius: 6px;
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }

        .flex.space-x-2 button:hover {
            background-color: #27ae60;
            color: #fff;
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.4);
        }

        .flex.space-x-2 .active {
            background-color: #2ecc71;
            color: #fff;
        }
    </style>

    <div class="container max-w-full px-4 mx-auto bg-[#F1F5F9]">
        <div class="py-8">
            <h2 class="text-2xl font-bold leading-relaxed ml-14 text-black">Penerimaan Penjemputan Sampah</h2>
            <h4 class="text-base font-light ml-14 text-black">Daftar Penerimaan Penjemputan Sampah.</h4>

            <div class="px-12 mt-6">
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table id="penerimaanTable" class="w-full border border-gray-300 bg-white rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2 text-center text-sm font-semibold" style="color: white">ID Penjemputan</th>
                                <th class="border px-4 py-2 text-center text-sm font-semibold" style="color: white">Lokasi Penjemputan</th>
                                <th class="border px-4 py-2 text-center text-sm font-semibold" style="color: white">Dropbox Tujuan</th>
                                <th class="border px-4 py-2 text-center text-sm font-semibold" style="color: white">Kode Penjemputan</th>
                                <th class="border px-4 py-2 text-center text-sm font-semibold" style="color: white">Waktu dan Tanggal</th>
                                <th class="border px-4 py-2 text-center text-sm font-semibold" style="color: white">Status</th>
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
        document.addEventListener('DOMContentLoaded', () => {
            $('#penerimaanTable').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                paging: false,
                ajax: {
                    url: '{{ route("admin.penjemputan-sampah.penerimaan.index") }}',
                    type: 'GET'
                },
                columns: [
                    { data: 'id_penjemputan', name: 'id_penjemputan' },
                    { data: 'lokasi_penjemputan', name: 'lokasi_penjemputan' },
                    { data: 'dropbox_tujuan', name: 'dropbox_tujuan' },
                    { data: 'kode_penjemputan', name: 'kode_penjemputan' },
                    { data: 'waktu_tanggal', name: 'waktu_tanggal' },
                    { data: 'status', name: 'status' }
                ],
                order: [[0, 'asc']],
                dom: 't'
            });
        });
    </script>
@endsection