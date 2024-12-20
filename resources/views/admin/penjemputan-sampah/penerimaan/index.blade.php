@extends('layouts.main-admin')

@section('content')
    <style>

        h2 {
            color: black;
            /* Hijau tua */
            margin-bottom: 15px;
            border-bottom: 3px solid black;
            /* Hijau lebih gelap */
            display: inline-block;
            padding-bottom: 5px;
        }

        h4 {
            color: black;
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
            background: white;
            
            
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

    <div class="container max-w-full px-4 mx-auto bg-[#F1F5F9]">
        <div class="py-8">
            <h2 class="text-2xl font-bold leading-relaxed ml-14 text-black">Penerimaan Penjemputan Sampah</h2>
            <h4 class="text-base font-light ml-14 text-black">Daftar Penerimaan Penjemputan Sampah.</h4>

            <div class="px-12 mt-6">
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table id="penerimaanTable" class="w-full border border-gray-300 bg-white rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Nama Kurir</th>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">ID Kurir</th>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">ID Penjemputan</th>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Lokasi Penjemputan</th>
                                <th class="border px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Dropbox</th>
                                <th class="border px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Kode</th>
                                <th class="border px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Tanggal</th>

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
        // Define the changePage function globally
        function changePage(page) {
            $('#penerimaanTable').DataTable().page(page).draw('page');
        }

        document.addEventListener('DOMContentLoaded', () => {
            $(document).ready(function() {
                $('#penerimaanTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ route("admin.penjemputan-sampah.penerimaan.index") }}',
        type: 'GET'
    },
    columns: [
        {
            data: 'nama',
            name: 'nama',
            orderable: true,
            searchable: true
        },
        {
            data: 'id_pengguna_kurir',
            name: 'id_pengguna_kurir', 
            orderable: true,
            searchable: false
        },
        {
            data: 'id_penjemputan',
            name: 'id_penjemputan',
            orderable: true,
            searchable: false
        },
        {
            data: 'alamat_penjemputan',
            name: 'alamat_penjemputan',
            orderable: true,
            searchable: true
        },
        {
            data: 'alamat_dropbox',
            name: 'alamat_dropbox',
            orderable: true,
            searchable: true
        },
        {
            data: 'kode_penjemputan',
            name: 'kode_penjemputan',
            orderable: true,
            searchable: true
        },
        {
            data: 'tanggal_penjemputan',
            name: 'tanggal_penjemputan',
            orderable: true,
            searchable: false
        }
    ],
    order: [[1, 'asc']], // Sort by id_pengguna_kurir ascending by default
    dom: 't'
});

                

                
            });
        });


        

    


        
    </script>
@endsection
