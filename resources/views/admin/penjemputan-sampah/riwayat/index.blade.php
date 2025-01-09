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

        thead {
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
            text-align: left;
        }

        th {
            text-align: center;
        }

        button {
            margin: 2px;
            border-radius: 4px;
            padding: 4px;
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 10px rgba(0, 255, 0, 0.1);
            background-color: #27ae60;
            color: white;
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

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            z-index: 1000;
            max-width: 80%;
            width: auto;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .close-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .detail-btn {
            background-color: #27ae60;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>

    <div class="container max-w-full px-4 mx-auto bg-[#F1F5F9]">
        <div class="py-8">
            <h2 class="text-2xl font-bold leading-relaxed ml-14 text-black">Riwayat Sampah</h2>
            <h4 class="text-base font-light ml-14 text-black">Admin dapat melihat history penjemputan sampah elektronik.</h4>

            <div class="pl-12 mt-6 grid grid-cols-2">
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table id="masyarakatTable" class="w-full border border-gray-300 bg-white rounded-lg">
                        <thead>
                            <tr>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">ID Penjemputan</th>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Aksi</th>
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

    <!-- Overlay -->
    <div id="overlay" class="overlay"></div>

    <!-- Popup -->
    <div id="popup" class="popup">
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 bg-white rounded-lg">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center text-sm font-semibold" style="color: white">ID Penjemputan</th>
                        <th class="border px-4 py-2 text-center text-sm font-semibold" style="color: white">Nama Masyarakat</th>
                        <th class="border px-4 py-2 text-center text-sm font-semibold" style="color: white">Nama Kurir</th>
                        <th class="border px-4 py-2 text-center text-sm font-semibold" style="color: white">Tanggal Penjemputan</th>
                        <th class="border px-4 py-2 text-center text-sm font-semibold" style="color: white">Dropbox</th>
                        <th class="border px-4 py-2 text-center text-sm font-semibold" style="color: white">Status</th>
                    </tr>
                </thead>
                <tbody id="popupTableBody">
                    <!-- Detail data will be inserted here -->
                </tbody>
            </table>
        </div>
        <button class="close-btn mt-4" onclick="closePopup()">Tutup</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            $('#masyarakatTable').DataTable({
                processing: true,
                serverSide: true,
                paging: false,
                ajax: {
                    url: '{{ route("admin.penjemputan-sampah.riwayat.index") }}',
                    type: 'GET'
                },
                columns: [
                    { data: 'id_penjemputan', name: 'id_penjemputan' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[0, 'asc']],
                dom: 't'
            });
        });

        function showDetail(id) {
            $.ajax({
                url: '{{ route("admin.penjemputan-sampah.riwayat.index") }}',
                type: 'GET',
                data: { id_penjemputan: id },
                success: function(response) {
                    if (!response.error) {
                        const html = `
                            <tr>
                                <td class="border px-4 py-2">${response.id_penjemputan}</td>
                                <td class="border px-4 py-2">${response.nama_masyarakat}</td>
                                <td class="border px-4 py-2">${response.nama_kurir}</td>
                                <td class="border px-4 py-2">${response.tanggal_penjemputan}</td>
                                <td class="border px-4 py-2">${response.dropbox}</td>
                                <td class="border px-4 py-2">${response.status}</td>
                            </tr>
                        `;
                        $('#popupTableBody').html(html);
                        $('#popup').show();
                        $('#overlay').show();
                    }
                }
            });
        }

        function closePopup() {
            $('#popup').hide();
            $('#overlay').hide();
        }

        // Close popup when clicking overlay
        $('#overlay').click(function() {
            closePopup();
        });
    </script>
@endsection