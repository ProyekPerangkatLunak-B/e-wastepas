<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Link</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .email-header {
            background-color: #4caf50;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .email-body {
            padding: 20px;
        }

        .email-body p {
            line-height: 1.6;
            font-size: 16px;
        }

        .email-footer {
            background-color: #f4f4f4;
            color: #666666;
            text-align: center;
            padding: 10px;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4caf50;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .note {
            margin-top: 20px;
            font-size: 14px;
            color: #999999;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Login Link</h1>
        </div>

        <!-- Body -->
        <div class="email-body">

            <p>Halo, <strong>{{ $namaPengguna }}</strong></p>
            <p>Klik tombol di bawah ini untuk login ke akun Anda:</p>
            <a href="{{ $loginUrl }}" class="btn" style="color: white">Login Sekarang</a>

            <p class="note">
                Informasi Login:<br>
                IP Address: <strong>{{ $ipAddress }}</strong><br>
                Lokasi: <strong>{{ $location ?? 'Tidak Terdeteksi' }}</strong>
            </p>

            <div
                style="
                margin-top: 20px;
                padding: 20px;
                background: linear-gradient(135deg, #4caf50, #81c784);
                color: white;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            ">
                <h2 style="margin: 0; font-size: 20px; text-align: center;">🌍 Selamatkan Bumi dengan E-Wastepas</h2>
                <p style="margin: 10px 0; font-size: 16px; line-height: 1.6; text-align: center;">
                    Daur ulang perangkat elektronik Anda secara <strong>aman</strong> dan <strong>ramah
                        lingkungan</strong> bersama <span style="font-weight: bold;">E-Wastepas</span>.
                </p>
                <p style="margin: 10px 0; font-size: 14px; text-align: center;">
                    Kunjungi <a href="https://www.e-wastepas.com"
                        style="color: #fff; text-decoration: underline; font-weight: bold;">E-Wastepas</a> untuk
                    mengetahui lokasi terdekat
                    dan panduan daur ulang elektronik Anda.
                </p>
            </div>

            <p class="note">
                Jika Anda tidak meminta login ini, abaikan email ini. Link akan kadaluarsa dalam 30 menit.
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} - Sistem Login Aman. Semua Hak Dilindungi.</p>
        </div>
    </div>
</body>

</html>
