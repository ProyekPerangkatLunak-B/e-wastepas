<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Verifikasi</title>
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

        .status {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: #4caf50;
            margin-top: 10px;
        }

        .reason {
            margin-top: 20px;
            padding: 20px;
            background: #ffebee;
            border: 1px solid #f44336;
            border-radius: 8px;
            color: #f44336;
            font-size: 16px;
            line-height: 1.6;
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
            <h1>Notifikasi Verifikasi Akun</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p>Yth. <strong>{{ $masyarakat->nama }}</strong>,</p>

            <div class="status">
                Status Verifikasi: <span>{{ $status }}</span>
            </div>

            @if ($status === 'Ditolak' && isset($alasan))
                <div class="reason">
                    <strong>Alasan Penolakan:</strong>
                    <p>{{ $alasan }}</p>
                </div>
                <p>Mohon maaf, akun Anda untuk sementara akan diblokir selama 7 hari. Kami sarankan untuk menghubungi tim kami jika memerlukan informasi lebih lanjut.</p>
            @elseif ($status === 'Diterima')
                <p>Selamat! Akun Anda telah berhasil diverifikasi. Anda kini dapat menikmati layanan kami sepenuhnya. Terima kasih atas kepercayaan Anda.</p>
            @endif

            <p class="note">
                Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami melalui <a href="mailto:support@example.com">support@example.com</a>.
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Sistem Verifikasi. Semua hak dilindungi undang-undang.</p>
        </div>
    </div>
</body>

</html>
