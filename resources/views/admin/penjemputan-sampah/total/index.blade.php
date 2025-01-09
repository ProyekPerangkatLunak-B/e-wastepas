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
            <h2 class="text-2xl font-bold leading-relaxed ml-14 text-black">Total Sampah & Poin</h2>
            <h4 class="text-base font-light ml-14 text-black">Admin dapat melihat total sampah elektronik & poin yang dikumpulkan dari masyarakat.</h4>

            <div class="px-12 mt-6">
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table id="masyarakatTable" class="w-full border border-gray-300 bg-white rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">ID Masyarakat</th>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Total Sampah</th>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Total Poin</th>
                                

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
            $('#masyarakatTable').DataTable().page(page).draw('page');
        }

        document.addEventListener('DOMContentLoaded', () => {
            $(document).ready(function() {
        var table = $('#masyarakatTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("admin.penjemputan-sampah.total.index") }}',
                type: 'GET'
            },
            columns: [
                {
                    data: 'id_pengguna_masyarakat',
                    name: 'id_pengguna_masyarakat',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'total_sampah',
                    name: 'total_sampah',
                    orderable: true,
                    searchable: false
                },
                {
                    data: 'total_poin',
                    name: 'total_poin',
                    orderable: true,
                    searchable: false
                }
            ],
            order: [[0, 'asc']], // Sort by id_pengguna_masyarakat ascending by default
            dom: 't'
        });

                

                
            });
        });


        

    


        
    </script>
@endsection