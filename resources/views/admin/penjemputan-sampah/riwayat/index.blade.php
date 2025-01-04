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
            background-color: #437252;
            color: #ffffff;
            
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
        <div class="py-8 ">
            <div class="py-8 flex items-center justify-between">
                <div class="ml-14">
                    <h2 class="text-2xl font-bold leading-relaxed text-black">Riwayat Penjemputan Sampah</h2>
                    <h4 class="text-base font-light text-black">Admin dapat melihat history Penjemputan Sampah elektronik.</h4>
                </div>
                <div class="mr-14 relative">
                    <button 
                        class=" text-white font-medium py-2 px-4 rounded " 
                        onclick="toggleDropdown()"
                    >
                        Filter
                    </button>
                    <div 
                        id="filterDropdown" 
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg hidden"
                    >
                        <ul>
                            <li><a href="#" class="block px-2 py-1 hover:bg-gray-200  text-center">Diterima</a></li>
                            <li><a href="#" class="block px-2 py-1 hover:bg-gray-200  text-center">Dibatalkan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            

            <div class="px-12 mt-6">
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table id="masyarakatTable" class="w-full border border-gray-300 bg-white rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">ID Penjemputan</th>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Nama Masyarakat</th>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Nama Kurir</th>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Tanggal Penjemputan</th>
                                <th class="border px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Dropbox</th>
                                <th class="border px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Status</th>
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
                url: '{{ route("admin.penjemputan-sampah.riwayat.index") }}',
                type: 'GET'
            },
            columns: [
                {
                    data: 'id_penjemputan',
                    name: 'id_penjemputan',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'nama_masyarakat',
                    name: 'nama_masyarakat',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'nama_kurir',
                    name: 'nama_kurir',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'tanggal_penjemputan',
                    name: 'tanggal_penjemputan',
                    orderable: true,
                    searchable: false
                },
                {
                    data: 'dropbox',
                    name: 'nama_dropbox',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                }
            ],
            order: [[0, 'asc']], // Sort by id_penjemputan ascending by default
            dom: 't'
        });

                

                
            });
        });


        
    function toggleDropdown() {
        const dropdown = document.getElementById('filterDropdown');
        dropdown.classList.toggle('hidden');
    }

    // Optional: Close the dropdown if clicked outside
    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('filterDropdown');
        const button = event.target.closest('button');
        
        if (!dropdown.contains(event.target) && !button) {
            dropdown.classList.add('hidden');
        }
    });


    


        
    </script>
@endsection
