@extends('layouts.main-admin') <!-- Menggunakan layout utama untuk halaman admin -->

@section('content') <!-- Awal dari section konten -->

    <style>
        /* Styling untuk elemen h2 */
        h2 {
            color: black;
            /* Hijau tua */
            margin-bottom: 15px;
            border-bottom: 3px solid #2ecc71;
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

        thead {
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
            /* Hijau */
            background-color: #27ae60;
            color: white
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

        .popup {
      display: none; /* Pop-up disembunyikan secara default */
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      z-index: 1000;
    }

    /* Overlay untuk memberikan efek gelap pada background */
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

    /* Tombol Close */
    .popup .close-btn {
      background-color: red;
      color: white;
      border: none;
      padding: 5px 10px;
      border-radius: 5px;
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
                        <tr>
                            <th> contoh untuk mengetes button detail</th>
                            <th><button id="openPopupBtn">Detail</button>

                                <!-- Overlay -->
                                <div id="overlay" class="overlay"></div>
                              
                                <!-- Konten Pop-Up -->
                                <div id="popup" class="popup">
                                    <div class=" mt-6">
                                        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                                            <table id="masyarakatTable" class="w-full border border-gray-300 bg-white rounded-lg">
                                                <thead>
                                                    <tr>
                                                        <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                                            style="color: white">ID Penjemputan</th>
                                                        <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                                            style="color: white">Nama Masyarakat</th>
                                                        <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                                            style="color: white">Nama Kurir</th>
                                                        <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                                            style="color: white">Tanggal Penjemputan</th>
                                                        <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                                            style="color: white">Dropbox</th>
                                                        <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                                            style="color: white">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Data akan dimuat melalui AJAX -->
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                <button class="close-btn mt-4" id="closePopupBtn">Tutup</button></th>
                        </tr>
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>
</div>

    <script>
openPopupBtn.addEventListener('click', () => {
      popup.style.display = 'block';
      overlay.style.display = 'block';
    });

    // Fungsi untuk menyembunyikan pop-up
    closePopupBtn.addEventListener('click', () => {
      popup.style.display = 'none';
      overlay.style.display = 'none';
    });

    // Menutup pop-up jika overlay diklik
    overlay.addEventListener('click', () => {
      popup.style.display = 'none';
      overlay.style.display = 'none';
    });

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


        

    


        
    </script>
@endsection <!-- Akhir dari section konten -->