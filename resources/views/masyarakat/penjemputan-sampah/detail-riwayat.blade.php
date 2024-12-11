@extends('layouts.main')

@section('content')
<div class="w-[81%] min-h-screen px-[5rem] py-12 mx-[22rem] bg-gray-100">

    {{-- Breadcrumbs section --}}
    <div class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center -ml-3 space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="{{ route('masyarakat.penjemputan.total-riwayat') }}" class="inline-flex ml-1 text-sm font-medium text-gray-800 hover:underline md:ml-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-4">
                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
              Total Sampah & Riwayat Penjemputan
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <span class="mx-2.5 text-gray-800 ">/</span>
              <a href="{{ route('masyarakat.penjemputan.riwayat') }}" class="ml-1 text-sm font-medium text-gray-800 hover:underline md:ml-2">
                Riwayat Penjemputan
              </a>
            </div>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <span class="mx-2.5 text-gray-800 ">/</span>
              <span class="ml-1 text-sm font-medium text-gray-800 hover:underline md:ml-2">
                Detail Riwayat
              </span>
            </div>
          </li>
        </ol>
      </div>

    <div class="flex items-center justify-between mx-auto mt-8">
        <div>
            <h2 class="text-xl font-semibold leading-relaxed">Detail Riwayat</h2>
            <p class="text-base font-normal text-gray-600">Dibuat pada : 08.00, 27 Desember 2024</p>
        </div>
        <div class="inline-flex items-center justify-end ml-auto space-x-4">
            {{-- Button PDF dan XLSX(Excel) --}}
            <a href="#"
               class="flex items-center justify-center w-[150px] h-[50px] px-4 text-white-normal transition duration-300 bg-primary-normal hover:bg-primary-300 rounded-2xl shadow-sm">
                Export to Excel
            </a>
            <a href="#"
               class="flex items-center justify-center w-[150px] h-[50px] px-4 text-white-normal transition duration-300 bg-red-normal hover:bg-red-400 rounded-2xl shadow-sm">
                Export to PDF
            </a>
        </div>
    </div>

     <!-- Container untuk Detail Alamat dan Detail Pelacakan -->
     <div class="w-[1380px] h-auto mx-auto pb-10 mt-6 bg-white-normal shadow-sm rounded-xl">
        <div class="flex justify-center mb-12 space-x-28">
            <span class="w-24 h-2 bg-red-200 rounded"></span>
            <span class="w-24 h-2 bg-blue-300 rounded"></span>
            <span class="w-24 h-2 bg-red-200 rounded"></span>
            <span class="w-24 h-2 bg-blue-300 rounded"></span>
            <span class="w-24 h-2 bg-red-200 rounded"></span>
            <span class="w-24 h-2 bg-blue-300 rounded"></span>
            <span class="w-24 h-2 bg-red-200 rounded"></span>
        </div>

            <!-- Tracking & Details -->
            <div class="px-8 mt-6">
                <div class="flex justify-between">
                    <!-- Nama, Alamat Penjemputan -->
                    <div class="w-1/2 pr-6 mt-2">

                        <h3 class="mb-2 text-lg font-bold">Driver</h3>
                        <p class="mb-8 text-gray-600">
                            {{-- Asep Surasep - 0851632668923 --}}
                            @if ($penjemputan->id_pengguna_kurir)
                                {{ $penjemputan->penggunaKurir->nama }} - {{ $penjemputan->penggunaKurir->nomor_telepon }}
                            @else
                                -
                            @endif
                        </p>

                        <h3 class="mb-2 text-lg font-bold">Diambil dari</h3>
                        <p class="mb-8 text-gray-600">
                            {{ $penjemputan->alamat_penjemputan }}
                        </p>

                        <h3 class="mt-4 mb-2 text-lg font-bold">Dikirim ke</h3>
                        <p class="text-gray-600">
                            @if (
                                $penjemputan->status === 'Diterima' &&
                                    ($penjemputan->getLatestPelacakan->status === 'Menuju Dropbox' ||
                                        $penjemputan->getLatestPelacakan->status === 'Sudah Sampai'))
                                {{ $penjemputan->dropbox->nama_dropbox }} - {{ $penjemputan->dropbox->alamat_dropbox }}
                            @else
                                -
                            @endif
                        </p>

                    </div>

                    <div class="relative w-1/2 mt-2">
                        <h3 class="mx-auto mb-2 text-lg font-bold">Detail Pelacakan</h3>
                        <div class="relative max-h-[450px] space-y-4 overflow-y-auto">
                            <!-- Garis Vertikal -->
                            <div class="absolute top-0 bottom-0 w-1 bg-gray-200 left-[149px] h-auto"></div>
                            <div class="relative flex items-start space-x-4">
                                <!-- Time and Date -->
                                <div class="flex flex-col items-end">
                                    <p class="text-sm font-semibold text-black">
                                        {{ Carbon\Carbon::parse($penjemputan->created_at)->locale(app()->getLocale())->translatedFormat('H:i') }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        {{ Carbon\Carbon::parse($penjemputan->created_at)->locale(app()->getLocale())->translatedFormat('j F Y') }}
                                    </p>
                                </div>

                                <!-- Icon Bullet -->
                                <div
                                    class="relative z-10 flex-shrink-0 w-6 h-6 rounded-full
                                    @if ($penjemputan->status === 'Diproses') bg-green-500
                                    @else bg-gray-400 @endif
                                ">
                                </div>
                                <!-- Text Content -->
                                <div class="flex-1">
                                    <p class="text-base font-bold text-black">Menunggu Konfirmasi</p>
                                    <p class="text-sm text-gray-600">Penjemputan diajukan</p>
                                </div>
                            </div>

                            @if ($penjemputan->status === 'Diterima')
                                @foreach ($penjemputan->pelacakan as $p)
                                @if ($p->status !== 'Menunggu Konfirmasi')

                                <div class="relative flex items-start space-x-4">
                                    <!-- Time and Date -->
                                    <div class="flex flex-col items-end">
                                        <p class="text-sm font-semibold text-black">
                                            {{ Carbon\Carbon::parse($p->created_at)->locale(app()->getLocale())->translatedFormat('H:i') }}
                                        </p>
                                        <p class="text-sm text-gray-600">
                                            {{ Carbon\Carbon::parse($p->created_at)->locale(app()->getLocale())->translatedFormat('j F Y') }}
                                        </p>
                                    </div>
                                    <!-- Icon Bullet -->
                                    <div
                                    class="relative z-10 flex-shrink-0 w-6 h-6 rounded-full
                                    @if ($p->id_pelacakan === $penjemputan->getLatestPelacakan->id_pelacakan) bg-green-500
                                    @else bg-gray-400 @endif
                                    ">
                                </div>
                                <!-- Text Content -->
                                <div class="flex-1">
                                    <p class="text-base font-bold text-black">{{ $p->status }}</p>
                                    <p class="text-sm text-gray-600">{{ $p->keterangan }}</p>
                                </div>
                            </div>
                                @endif
                            @endforeach
                            @elseif($penjemputan->status === 'Dibatalkan')
                            <div class="relative flex items-start space-x-4">
                                <!-- Time and Date -->
                                <div class="flex flex-col items-end">
                                    <p class="text-sm font-semibold text-black">
                                        {{ Carbon\Carbon::parse($penjemputan->updated_at)->locale(app()->getLocale())->translatedFormat('H:i') }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        {{ Carbon\Carbon::parse($penjemputan->updated_at)->locale(app()->getLocale())->translatedFormat('j F Y') }}
                                    </p>
                                </div>
                                <!-- Icon Bullet -->
                                <div class="relative z-10 flex-shrink-0 w-6 h-6 rounded-full bg-red-normal"></div>
                                <!-- Text Content -->
                                <div class="flex-1">
                                    <p class="text-base font-bold text-black">{{ $penjemputan->status }}</p>
                                    <p class="text-sm text-gray-600">Pesanan dibatalkan oleh pengguna</p>
                                </div>
                            </div>
                        @elseif($penjemputan->status === 'Ditolak')
                            <div class="relative flex items-start space-x-4">
                                <!-- Time and Date -->
                                <div class="flex flex-col items-end">
                                    <p class="text-sm font-semibold text-black">
                                        {{ Carbon\Carbon::parse($penjemputan->getLatestPelacakan->created_at)->locale(app()->getLocale())->translatedFormat('H:i') }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        {{ Carbon\Carbon::parse($penjemputan->getLatestPelacakan->created_at)->locale(app()->getLocale())->translatedFormat('j F Y') }}
                                    </p>
                                </div>
                                <!-- Icon Bullet -->
                                <div class="relative z-10 flex-shrink-0 w-6 h-6 bg-red-500 rounded-full"></div>
                                <!-- Text Content -->
                                <div class="flex-1">
                                    <p class="text-base font-bold text-black">{{ $penjemputan->status }}</p>
                                    <p class="text-sm text-gray-600">Permintaan penjemputan tidak diterima</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
     </div>

     <div class="w-[1380px] h-[623px] flex items-center justify-between mt-4 rounded-2xl shadow-sm bg-white-normal relative">
        <div class="flex justify-between w-full px-8">
            <!-- Status Selesai -->
            <div class="absolute text-center top-1.5 right-0">
                <div>
                    <span
                        class="px-12 py-2 text-white-normal text-md font-semibold rounded-tr-2xl rounded-bl-2xl
                        @if ($penjemputan->getLatestPelacakan->status === 'Dijemput Driver') bg-white-dark
                        @elseif ($penjemputan->getLatestPelacakan->status === 'Menuju Dropbox') bg-primary-normal
                        @elseif ($penjemputan->getLatestPelacakan->status === 'Sudah Sampai') bg-secondary-normal
                        @elseif ($penjemputan->status === 'Ditolak') bg-red-500
                        @elseif ($penjemputan->status === 'Dibatalkan') bg-red-normal
                        @else bg-tertiary-600 @endif;">
                        {{ $penjemputan->status === 'Diterima' ? $penjemputan->getLatestPelacakan->status : $penjemputan->status }}
                    </span>
                </div>

                <!-- Gambar Ceklis Hijau -->
                <div class="mx-auto mt-4">
                    <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam-hijau.png') }}" alt="Ceklis Hijau" class="w-16 h-16 mx-auto">
                </div>

                <!-- Waktu Penjemputan -->
                <div class="mx-auto mt-2">
                    <p class="text-2xl font-bold text-secondary-normal">
                        {{ Carbon\Carbon::parse($penjemputan->getLatestPelacakan->created_at)->locale(app()->getLocale())->translatedFormat('H:i') }}
                    </p>
                </div>
            </div>
            <!-- Bagian Rincian Sampah -->
            <div class="w-1/2 mb-4 ml-12">
                <h3 class="mb-4 text-xl font-bold">Rincian Sampah</h3>
                <div class="max-h-[450px] space-y-4 overflow-y-auto pr-4">
                    @foreach ($penjemputan->detailPenjemputan as $dp)
                        <div class="relative flex items-center justify-between w-[500px] h-[120px] bg-gray-100 border shadow-sm rounded-2xl overflow-hidden border-secondary-normal">
                            <!-- Gambar Sampah -->
                            <div class="flex items-center justify-center w-[120px] h-full overflow-hidden rounded-lg rounded-l-none rounded-t-none rounded-b-none">
                                <img src="https://picsum.photos/400/400" alt="Sampah" class="object-cover w-full h-full">
                            </div>

                            <!-- Detail Sampah -->
                            <div class="flex flex-col items-center justify-center flex-1 px-4">
                                <p class="font-medium text-center text-gray-600 text-md">Kategori {{ $dp->kategori->nama_kategori }}</p>
                                <p class="text-lg font-bold text-center text-black">{{ $dp->jenis->nama_jenis }}</p>
                            </div>

                            <!-- Jumlah -->
                            <div class="flex flex-col items-center justify-center mr-6">
                                <p class="font-bold text-green-500 text-md">{{ $dp->berat }} Kilogram</p>
                            </div>

                            <!-- Poin di Ujung Kanan Atas card sampah -->
                            <div class="absolute top-0 right-0 px-1 py-1 shadow-sm bg-white-normal rounded-tr-2xl rounded-bl-2xl">
                                <p class="text-2xl font-bold text-green-500">{{ $dp->jenis->poin }}
                                    <span class="mr-1 text-sm text-black-normal">Poin</span>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Bagian Total Sampah -->
            <div class="w-1/2 pr-10 mx-16">
                <!-- Total Sampah -->
                <h3 class="mb-4 text-xl font-bold">Total Sampah</h3>
                <p class="font-normal text-md text-black-normal">
                    {{ count($penjemputan->detailPenjemputan) }} pcs
                </p>

                <!-- Total Berat -->
                <h3 class="my-4 text-xl font-bold">Total Berat</h3>
                <p class="font-normal text-md text-black-normal">
                    {{ $penjemputan->detailPenjemputan->sum('berat') }} Kilogram
                </p>

                <!-- Total Poin -->
                <h3 class="mt-4 text-xl font-bold">Total Poin</h3>
                <div class="flex items-baseline pb-4 mx-auto">
                    <p
                        class="text-5xl font-bold text-secondary-normal">
                        +{{ $penjemputan->total_poin }}
                    </p>
                    <span class="ml-1 text-xl font-bold text-black-normal">Poin</span>
                </div>

                <!-- Catatan -->
                <div class="pr-6">
                    <h3 class="mb-2 text-xl font-bold text-red-normal">*Catatan</h3>
                    <div class="w-[554px] h-[120px] p-6 bg-gray-100 border rounded-lg shadow-sm">
                        <p class="text-gray-800">
                            {{ $penjemputan->catatan ?? 'Tidak ada catatan tambahan.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection
