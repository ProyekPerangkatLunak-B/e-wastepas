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
                    <h2 class="mb-1 ml-20 text-xl font-bold text-black-normal">Detail Riwayat Penjemputan Sampah</h2>
                    <p class="ml-20 font-semibold text-gray-600 text-md">Hasil Invoice Detail Riwayat Penjemputan Sampah Elektronik</p>
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
                <div class="p-6 mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="mb-1 text-3xl font-bold text-black-normal">Invoice Penjemputan Sampah</h3>
                            <p class="text-gray-600">Waktu: {{ Carbon\Carbon::parse($penjemputan->created_at)->locale(app()->getLocale())->translatedFormat('H:i, j F Y') }}</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="text-lg font-semibold text-gray-600">Kode Penjemputan :</span>
                            <p class="text-lg font-bold text-black-normal">{{ $penjemputan->kode_penjemputan }}</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Kurir -->
                <div class="p-6">
                    <div class="flex justify-between">
                        <div class="w-1/2">
                            <h4 class="text-xl font-bold">Kurir</h4>
                            <p class="text-gray-600">
                                @if ($penjemputan->penggunaKurir == null)
                                    -
                                @else
                                    {{ $penjemputan->penggunaKurir->nama }} - {{ $penjemputan->penggunaKurir->nomor_telepon }}
                                @endif
                            </p>
                        </div>
                        <div class="w-1/2">
                            <h4 class="text-xl font-bold">Alamat Penjemputan</h4>
                            <p class="text-gray-600">{{ $penjemputan->alamat_penjemputan }}</p>
                        </div>
                    </div>
                </div>

                <!-- Rincian Sampah dalam Tabel -->
                <div class="p-6">
                    <h3 class="mb-4 text-xl font-bold">Rincian Sampah</h3>
                    <div class="overflow-x-auto rounded-md">
                        <table class="w-full border-collapse table-auto">
                            <thead>
                                <tr class="bg-gray-400">
                                    <th class="px-4 py-2 text-lg font-bold text-center text-gray-900 border">Jenis Sampah</th>
                                    <th class="px-4 py-2 text-lg font-bold text-center text-gray-900 border">Kategori</th>
                                    <th class="px-4 py-2 text-lg font-bold text-center text-gray-900 border">Berat</th>
                                    <th class="px-4 py-2 text-lg font-bold text-center text-gray-900 border">Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjemputan->detailPenjemputan as $s)
                                    <tr class="bg-gray-100 hover:bg-tertiary-200">
                                        <td class="px-4 py-2 border">
                                            <div class="flex items-center space-x-4">
                                                <img src="{{ asset('img/masyarakat/penjemputan-sampah/kategori-jenisSampah.jpg') }}" alt="Jenis Sampah" class="object-cover w-12 h-12 rounded-lg">
                                                <span class="text-lg font-semibold">{{ $s->jenis->nama_jenis }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border">{{ $s->kategori->nama_kategori }}</td>
                                        <td class="px-4 py-2 border">{{ $s->berat }} Kg</td>
                                        <td class="px-4 py-2 border">{{ $s->jenis->poin }} Poin</td>
                                    </tr>
                                @endforeach
                                {{-- <tr class="bg-gray-100 hover:bg-tertiary-200">
                                    <td class="px-4 py-2 border">
                                        <div class="flex items-center space-x-4">
                                            <img src="{{ asset('img/masyarakat/penjemputan-sampah/kategori-jenisSampah.jpg') }}" alt="Jenis Sampah" class="object-cover w-12 h-12 rounded-lg">
                                            <span class="text-lg font-semibold">Sampah Organik</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border">Organik</td>
                                    <td class="px-4 py-2 border">5 Kg</td>
                                    <td class="px-4 py-2 border">10 Poin</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tabel Detail Pelacakan -->
                <div class="p-6">
                    <h3 class="mb-4 text-xl font-bold">Detail Pelacakan</h3>
                    <div class="overflow-x-auto rounded-md">
                        <table class="w-full border-collapse table-auto">
                            <thead>
                                <tr class="bg-gray-400">
                                    <th class="px-4 py-2 text-lg font-bold text-center text-gray-900 border">Status</th>
                                    <th class="px-4 py-2 text-lg font-bold text-center text-gray-900 border">Tanggal</th>
                                    <th class="px-4 py-2 text-lg font-bold text-center text-gray-900 border">Waktu</th>
                                    <th class="px-4 py-2 text-lg font-bold text-center text-gray-900 border">Daerah</th>
                                    <th class="px-4 py-2 text-lg font-bold text-center text-gray-900 border">Dropbox</th>
                                    <th class="px-4 py-2 text-lg font-bold text-center text-gray-900 border">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjemputan->pelacakan as $p)
                                    <tr class="bg-gray-100 hover:bg-tertiary-200">
                                        <td class="px-4 py-2 border text-pretty">{{ $p->status }}</td>
                                        <td class="px-4 py-2 border text-pretty">{{ Carbon\Carbon::parse($p->created_at)->locale(app()->getLocale())->translatedFormat('j F Y') }}</td>
                                        <td class="px-4 py-2 border text-pretty">{{ Carbon\Carbon::parse($p->created_at)->locale(app()->getLocale())->translatedFormat('H:i') }}</td>
                                        <td class="px-4 py-2 border text-pretty">
                                            @if ($p->dropbox == null)
                                                -
                                            @else
                                                {{ $p->dropbox->daerah->nama_daerah }}
                                            @endif
                                        </td>
                                        <td class="px-4 py-2 border text-pretty">
                                            @if ($p->dropbox == null)
                                                -
                                            @else
                                                {{ $p->dropbox->nama_dropbox }}
                                            @endif
                                        </td>
                                        <td class="px-4 py-2 border text-pretty">{{ $p->keterangan }}</td>
                                    </tr>
                                @endforeach
                                {{-- <tr class="bg-gray-100 hover:bg-tertiary-200">
                                    <td class="px-4 py-2 border text-pretty">Menyimpan Sampah di Dropbox</td>
                                    <td class="px-4 py-2 border text-pretty">2 Januari 2025</td>
                                    <td class="px-4 py-2 border text-pretty">00.00</td>
                                    <td class="px-4 py-2 border text-pretty">Banda Aceh</td>
                                    <td class="px-4 py-2 border text-pretty">Dropbox A</td>
                                    <td class="px-4 py-2 border text-pretty">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas, ea.</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Total Berat dan Poin -->
                <div class="p-10">
                    <div class="flex justify-between">
                        <div>
                            <h4 class="text-xl font-bold">Total Berat</h4>
                            <p class="text-lg text-gray-600">{{ $penjemputan->total_berat }} Kilogram</p>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold">Total Poin</h4>
                            <p class="text-lg text-gray-600">{{ $penjemputan->total_poin }} Poin</p>
                        </div>
                    </div>
                </div>

                <!-- Catatan -->
                <div class="p-10 mb-8">
                    <h3 class="mb-1 text-xl font-bold text-red-normal">Catatan</h3>
                    <div class="p-4 bg-gray-100 rounded-lg shadow-sm">
                        <p class="text-gray-600">{{ $penjemputan->catatan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Custom JS --}}
    <script type="text/javascript" src="{{ asset('js/masyarakat/penjemputan-sampah/custom.js') }}"></script>
</body>

</html>
