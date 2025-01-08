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
        /* Aturan untuk print */
        @media print {
            .no-print {
                display: none !important;
            }

            @page {
                size: A4;
                margin: 10mm;
            }

            body {
                margin: 0;
                font-size: 12px;
                line-height: 1.5;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 8px;
                border: 1px solid #000;
                word-wrap: break-word;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            p {
                page-break-after: avoid;
                page-break-inside: avoid;
            }

            .note-lengkap {
                background-color: #e6e6e6 !important; /* Memastikan latar belakang abu-abu muncul saat print */
                padding: 8px;
                border-radius: 5px;
                color: #000;
            }
        }

        /* Tampilan umum */
        body {
            font-family: 'Mulish', sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .flex-between {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .title-section {
            margin-left: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: #000000;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 16px;
            font-weight: 600;
            color: #666666;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-right: 20px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 15px 40px;
            color: white;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #555555;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
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

        .invoice-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f0f0f0;
        }

        .sampah-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .sampah-field {
            display: flex;
            align-items: center;
        }

        .note {
            color: red;
        }

        .note-lengkap {
            background-color: #e6e6e6;
            padding: 8px;
            border-radius: 5px;
            color: #000;
        }
    </style>

    <title>Invoice Penjemputan Sampah</title>
</head>

<body>
    <!-- Header -->
    <div class="container no-print">
        <div class="flex-between">
            <div class="title-section">
                <h2 class="title">Detail Riwayat Penjemputan Sampah</h2>
                <p class="subtitle">Semua Data Detail Riwayat Penjemputan Sampah</p>
            </div>
            <!-- Tombol di sebelah kanan -->
            <div class="button-group">
                <button onclick="window.close()" class="btn btn-back">Kembali</button>
                <button onclick="window.print()" class="btn btn-print">Cetak PDF</button>
            </div>
        </div>
    </div>

    <!-- Konten -->
    <div class="invoice-container">
        <div>
            <h3>Invoice Penjemputan Sampah</h3>
            <p><strong>Kode Penjemputan:</strong> {{ $penjemputan->kode_penjemputan }}</p>
            <p>Dibuat Pada: {{ Carbon\Carbon::parse($penjemputan->created_at)->locale(app()->getLocale())->translatedFormat('H:i, j F Y') }}</p>
        </div>

        <div>
            <h4><strong>Kurir:</strong></h4>
            <p>{{ $penjemputan->penggunaKurir ? $penjemputan->penggunaKurir->nama . ' - ' . $penjemputan->penggunaKurir->nomor_telepon : '-' }}</p>
            <h4><strong>Alamat Penjemputan:</strong></h4>
            <p>{{ $penjemputan->alamat_penjemputan }}</p>
        </div>

        <div>
            <h3>Rincian Sampah</h3>
            <table>
                <thead>
                    <tr>
                        <th>Jenis Sampah</th>
                        <th>Kategori</th>
                        <th>Berat</th>
                        <th>Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjemputan->detailPenjemputan as $s)
                        <tr>
                            <td class="sampah-field">
                                <img src="{{ $s->jenis->gambar_url }}" alt="Sampah" class="sampah-img">
                                {{ $s->jenis->nama_jenis }}
                            </td>
                            <td>{{ $s->kategori->nama_kategori }}</td>
                            <td>{{ $s->berat }} Kg</td>
                            <td>{{ $s->jenis->poin }} Poin</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <h3>Detail Pelacakan</h3>
            <table>
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Daerah</th>
                        <th>Dropbox</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjemputan->pelacakan as $p)
                        <tr>
                            <td>{{ $p->status }}</td>
                            <td>{{ Carbon\Carbon::parse($p->created_at)->locale(app()->getLocale())->translatedFormat('j F Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($p->created_at)->locale(app()->getLocale())->translatedFormat('H:i') }}</td>
                            <td>{{ $p->dropbox ? $p->dropbox->daerah->nama_daerah : '-' }}</td>
                            <td>{{ $p->dropbox ? $p->dropbox->nama_dropbox : '-' }}</td>
                            <td>{{ $p->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <p><strong>Total Berat:</strong> {{ $penjemputan->total_berat }} Kilogram</p>
            <p><strong>Total Poin:</strong> {{ $penjemputan->total_poin }} Poin</p>
        </div>

        <div>
            <h3 class="note">Catatan : </h3>
            <p class="note-lengkap">{{ $penjemputan->catatan }}</p>
        </div>
    </div>
</body>

</html>
