<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Mulish', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .header {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
            margin: 0;
        }

        .header p {
            font-size: 16px;
            color: #666666;
            margin: 0;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 15px 40px;
            color: #ffffff;
            background-color: #555555;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #333333;
        }

        .btn-back {
            background-color: #888888;
        }

        .btn-back:hover {
            background-color: #666666;
        }

        .btn-print {
            background-color: #FE6969;
        }

        .btn-print:hover {
            background-color: #be3632;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .list-disc {
            list-style: disc;
            padding-left: 20px;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .no-print {
                display: none;
            }

            .container {
                box-shadow: none;
                margin: 0;
                border-radius: 0;
            }

            table {
                margin: 0;
                border: 1px solid #000;
            }

            th, td {
                font-size: 12px;
                color: #000;
                background: transparent;
            }
        }
    </style>
    <title>Riwayat Penjemputan</title>
</head>

<body>
    <!-- Header Section -->
    <div class="header no-print">
        <div>
            <h2>Semua Riwayat Penjemputan Sampah</h2>
            <p>Daftar Tabel Riwayat Penjemputan Sampah</p>
        </div>
        <div class="button-group">
            <button onclick="window.close()" class="btn btn-back">Kembali</button>
            <button onclick="window.print()" class="btn btn-print">Cetak PDF</button>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container">
        <div>
            <h3>Semua Riwayat Penjemputan Sampah</h3>
            <p><strong>Kode Penjemputan:</strong> {{ $riwayat->first()->kode_penjemputan }}</p>
            <p>Dibuat pada: {{ Carbon\Carbon::parse($riwayat->first()->created_at)->locale(app()->getLocale())->translatedFormat('H:i, j F Y') }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Kode Penjemputan</th>
                    <th>Total Berat</th>
                    <th>Total Poin</th>
                    <th>Sampah Elektronik</th>
                    <th>Tanggal Penjemputan</th>
                    <th>Alamat Penjemputan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayat as $r)
                <tr>
                    <td>{{ $r->kode_penjemputan }}</td>
                    <td>{{ $r->total_berat }} kg</td>
                    <td>{{ $r->total_poin }}</td>
                    <td>
                        <ul class="list-disc">
                            @foreach ($r->detailPenjemputan as $detail)
                            <li>{{ $detail->jenis->nama_jenis }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($r->tanggal_penjemputan)->translatedFormat('d F Y') }}</td>
                    <td>{{ $r->alamat_penjemputan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
