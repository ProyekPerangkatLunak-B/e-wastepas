@extends('layouts.main-admin')

@section('content')
    <style>
        .container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            padding: 50px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            border-bottom: 3px solid #27ae60;
            display: inline-block;
            padding-bottom: 5px;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            padding: 20px;
            background: linear-gradient(to right, #e8f5e9, #f0f8ff);
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border: 4px solid transparent;
            background: linear-gradient(90deg, #27ae60, #2ecc71);
            padding: 3px;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .info-block {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-label {
            font-weight: bold;
            color: #555;
            flex: 0 0 200px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-value {
            color: #333;
            font-size: 16px;
            font-weight: 500;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .back-button {
            display: inline-block;
            background-color: #27ae60;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
        }

        .back-button:hover {
            background-color: #1e8449;
            transform: translateY(-3px);
        }
    </style>

    <div class="container max-w-full px-4 mx-auto bg-gray-50">
        <div class="py-8">
            <h2 class="text-2xl font-semibold leading-relaxed">Detail Masyarakat</h2>

            <div class="profile-header">
                <div class="profile-image">
                    @if($masyarakat->foto_profil)
                        <img src="{{ asset('storage/' . $masyarakat->foto_profil) }}" alt="Foto Profil">
                    @else
                        <img src="https://via.placeholder.com/120?text=No+Photo" alt="Foto Profil">
                    @endif
                </div>
                <div>
                    <h3 class="text-xl font-bold text-green-700">{{ $masyarakat->nama }}</h3>
                    <p class="text-gray-600"><i class="fas fa-envelope"></i> {{ $masyarakat->email }}</p>
                    <p class="text-gray-600"><i class="fas fa-phone"></i> {{ $masyarakat->nomor_telepon }}</p>
                </div>
            </div>

            <div class="grid-container">
                <div class="info-block">
                    <span class="info-label"><i class="fas fa-id-card"></i> Nomor KTP:</span>
                    <p class="info-value">{{ $masyarakat->nomor_ktp }}</p>
                </div>
                <div class="info-block">
                    <span class="info-label"><i class="fas fa-map-marker-alt"></i> Alamat:</span>
                    <p class="info-value">{{ $masyarakat->alamat }}</p>
                </div>
                <div class="info-block">
                    <span class="info-label"><i class="fas fa-calendar"></i> Tanggal Lahir:</span>
                    <p class="info-value">{{ $masyarakat->tanggal_lahir }}</p>
                </div>
                <div class="info-block">
                    <span class="info-label"><i class="fas fa-university"></i> Nomor Rekening:</span>
                    <p class="info-value">{{ $masyarakat->no_rekening }}</p>
                </div>
                <div class="info-block">
                    <span class="info-label"><i class="fas fa-coins"></i> Subtotal Poin:</span>
                    <p class="info-value">{{ $masyarakat->subtotal_poin }}</p>
                </div>
                <div class="info-block">
                    <span class="info-label"><i class="fas fa-envelope-open"></i> Tanggal Email Diverifikasi:</span>
                    <p class="info-value">
                        {{ $masyarakat->tanggal_email_diverifikasi ? $masyarakat->tanggal_email_diverifikasi : 'Belum Diverifikasi' }}
                    </p>
                </div>
                <div class="info-block">
                    <span class="info-label"><i class="fas fa-sync-alt"></i> Tanggal Update:</span>
                    <p class="info-value">{{ $masyarakat->tanggal_update }}</p>
                </div>
                <div class="info-block">
                    <span class="info-label"><i class="fas fa-check-circle"></i> Tanggal Diverifikasi:</span>
                    <p class="info-value">
                        {{ $masyarakat->tanggal_diverifikasi ? $masyarakat->tanggal_diverifikasi : 'Belum Diverifikasi' }}
                    </p>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.datamaster.masyarakat.index') }}" class="back-button">
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Tambahkan Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
