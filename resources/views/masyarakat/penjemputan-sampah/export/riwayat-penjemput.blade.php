<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Link Fav Icon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    {{-- Link Font Google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400;600;800&display=swap" rel="stylesheet">

    {{-- Link Load CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Link load CSS Custom --}}
    <link rel="stylesheet" href="{{ asset('css/masyarakat-penjemputan-sampah.css') }}">

    <title>E-WastePas</title>
</head>

<body>
    <div class="w-full min-h-screen pt-8 mx-auto mt-2 bg-gray-100">
        <div class="container mx-auto">
            <div class="flex items-center justify-between mx-auto">
                <div>
                    <h2 class="mb-1 ml-20 text-xl font-bold text-black-normal">Semua Riwayat Penjemputan Sampah</h2>
                    <p class="ml-20 font-semibold text-gray-600 text-md">Daftar Tabel Riwayat Penjemputan Sampah</p>
                </div>
                <div class="inline-flex items-center justify-end mr-20 space-x-4">
                    <a href="#" target="_blank" class="flex items-center justify-center w-[150px] h-[50px] px-4 text-white-normal transition duration-300 bg-red-normal hover:bg-red-400 rounded-2xl shadow-sm">
                        Cetak PDF
                    </a>
                </div>
            </div>

            {{-- Mulai Disini --}}
            <div class="w-[1380px] mx-auto mt-6 bg-white-normal shadow-sm rounded-xl p-10">
                <!-- Header Invoice -->
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="mb-1 text-3xl font-bold text-black-normal">Semua Riwayat Penjemputan Sampah</h3>
                            <p class="text-gray-600">Waktu:
                                {{ Carbon\Carbon::parse($riwayat->first()->created_at)->locale(app()->getLocale())->translatedFormat('H:i, j F Y') }}
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="text-lg font-semibold text-gray-600">Kode Penjemputan :</span>
                            <p class="text-lg font-bold text-black-normal">{{ $riwayat->first()->kode_penjemputan }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 px-0">
                    <div class="overflow-x-auto">
                        <table class="w-4/5 mx-auto text-left bg-white border-collapse rounded-lg shadow-sm min-w-max">
                            <thead>
                                <tr class="text-gray-900 bg-gray-400">
                                    <th class="px-4 py-3 font-bold tracking-wide text-center border text-md">Kode Penjemputan</th>
                                    <th class="px-4 py-3 font-bold tracking-wide text-center border text-md">Total Berat</th>
                                    <th class="px-4 py-3 font-bold tracking-wide text-center border text-md">Total Poin</th>
                                    <th class="px-4 py-3 font-bold tracking-wide text-center border text-md">Sampah Elektronik</th>
                                    <th class="px-4 py-3 font-bold tracking-wide text-center border text-md">Tanggal Penjemputan</th>
                                    <th class="px-4 py-3 font-bold tracking-wide text-center border text-md">Alamat Penjemputan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat as $r)
                                    <tr class="transition-colors duration-200 hover:bg-tertiary-200">
                                        <td class="px-4 py-3 text-gray-900 border">{{ $r->kode_penjemputan }}</td>
                                        <td class="px-4 py-3 text-gray-900 border">{{ $r->total_berat }} kg</td>
                                        <td class="px-4 py-3 text-gray-900 border">{{ $r->total_poin }}</td>
                                        <td class="px-4 py-3 text-gray-900 border">
                                            <ol class="list-disc list-inside">
                                                @foreach ($r->detailPenjemputan as $detail)
                                                    <li>{{ $detail->jenis->nama_jenis }}</li>
                                                @endforeach
                                            </ol>
                                        </td>
                                        <td class="px-4 py-3 text-gray-900 border">
                                            {{ \Carbon\Carbon::parse($r->tanggal_penjemputan)->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="px-4 py-3 text-gray-900 border">{{ $r->alamat_penjemputan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom JS --}}
    <script type="text/javascript" src="{{ asset('js/masyarakat/penjemputan-sampah/custom.js') }}"></script>
</body>
</html>
