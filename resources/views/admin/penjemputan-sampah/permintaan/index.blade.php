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

        table {
            border-collapse: collapse;
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
        }

        thead {
            background-color: #2ecc71;
            color: white;
        }

        th {
            padding: 12px;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
        }

        td {
            padding: 12px;
            text-align: left;
            background: white;
            border: 1px solid #e0e0e0;
        }

        .detail-btn {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .detail-btn:hover {
            background-color: #27ae60;
        }

        /* Pop-up styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 80%;
            max-width: 800px;
        }

        .popup table {
            margin-bottom: 20px;
        }

        .popup th {
            background-color: #2ecc71;
            color: white;
            padding: 12px;
            text-align: center;
        }

        .close-btn {
            background-color: #ff4444;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            float: right;
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
    </style>

    <div class="container max-w-full px-4 mx-auto bg-[#F1F5F9]">
        <div class="py-8">
            <h2 class="text-2xl font-bold leading-relaxed ml-14">Permintaan Penjemputan Sampah</h2>
            <h4 class="text-base font-light ml-14">Daftar Permintaan Penjemputan Sampah.</h4>

            <div class="pl-12 mt-6">
                <div class="bg-white rounded-lg shadow">
                    <table id="masyarakatTable">
                        <thead>
                            <tr>
                                <th>ID PERMINTAAN PENJEMPUTAN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop-up Detail -->
    <div id="overlay" class="overlay"></div>
    <div id="popup" class="popup">
        <table>
            <thead>
                <tr>
                    <th>ID PERMINTAAN PENJEMPUTAN</th>
                    <th>JENIS DAN KATEGORI</th>
                    <th>TOTAL BERAT</th>
                    <th>ALAMAT</th>
                    <th>DROPBOX</th>
                    <th>TANGGAL PENGAJUAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="detail-id"></td>
                    <td id="detail-jenis"></td>
                    <td id="detail-berat"></td>
                    <td id="detail-alamat"></td>
                    <td id="detail-dropbox"></td>
                    <td id="detail-tanggal"></td>
                </tr>
            </tbody>
        </table>
        <button class="close-btn" id="closePopupBtn">Tutup</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const table = $('#masyarakatTable').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                paging: false,
                ajax: '{{ route("admin.penjemputan-sampah.permintaan.index") }}',
                columns: [
                    { data: 'id_penjemputan', name: 'id_penjemputan' },
                    { 
                        data: 'action', 
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    }
                ],
                order: [[0, 'asc']],
                dom: 't',
            });
        });

        function showDetail(button) {
            document.getElementById('detail-id').textContent = button.dataset.id;
            document.getElementById('detail-jenis').textContent = button.dataset.jenis;
            document.getElementById('detail-berat').textContent = `${button.dataset.berat} kg`;
            document.getElementById('detail-alamat').textContent = button.dataset.alamat;
            document.getElementById('detail-dropbox').textContent = button.dataset.dropbox;
            document.getElementById('detail-tanggal').textContent = new Date(button.dataset.tanggal)
                .toLocaleDateString('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });
            
            document.getElementById('popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        document.getElementById('closePopupBtn').addEventListener('click', () => {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        });

        document.getElementById('overlay').addEventListener('click', () => {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.getElementById('popup').style.display = 'none';
                document.getElementById('overlay').style.display = 'none';
            }
        });
    </script>
@endsection