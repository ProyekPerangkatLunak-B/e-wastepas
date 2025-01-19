@extends('layouts.main')

@section('content')
    <div class="w-[83%] min-h-screen px-[5rem] py-14 mx-[22rem] bg-gray-100">
        <div class="flex justify-between">
            <!-- Kolom Kiri: Total Sampah dan Poin -->
            <div class="w-3/5 mx-auto">
                <h2 class="text-xl font-semibold leading-relaxed">Total Sampah dan Poin</h2>
                <p class="text-base font-normal">Semua total sampah elektronik dan poin di akun anda.</p>

                <!-- Grid untuk Total Sampah dan Total Poin -->
                <div class="grid grid-cols-1 gap-6 mt-6 ">
                    <!-- Card Total Sampah -->
                    <div
                        class="flex flex-col items-center w-4/5 p-8 shadow-sm bg-white-normal rounded-xl group hover:shadow-md">
                        <h3 class="text-2xl font-bold text-gray-800">Total Sampah</h3>
                        <div class="flex items-baseline mt-4">
                            <span class="mb-2 text-6xl font-bold text-secondary-normal">{{ $totalSampah }}</span>
                            <span class="ml-1 text-2xl font-bold text-gray-900">Pcs</span>
                        </div>
                        <p class="mt-2 text-base text-center text-gray-500">Total sampah yang sudah diangkut.</p>
                    </div>

                    <!-- Card Total Poin -->
                    <div
                        class="flex flex-col items-center w-4/5 p-8 shadow-sm bg-white-normal rounded-xl group hover:shadow-md">
                        <h3 class="text-2xl font-bold text-gray-800">Total Poin</h3>
                        <div class="flex items-baseline mt-4">
                            <span class="mb-2 text-6xl font-bold text-secondary-normal">{{ $totalPoin }}</span>
                            <span class="ml-1 text-2xl font-bold text-gray-900">Poin</span>
                        </div>
                        <p class="mt-2 text-base text-center text-gray-500">Total poin yang sudah didapatkan.</p>
                    </div>
                </div>

            </div>

            <!-- Kolom Kanan: Riwayat Penjemputan -->
            <div class="w-full mx-auto">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold leading-relaxed">Riwayat Penjemputan Terbaru</h2>
                        <p class="text-base font-normal text-gray-600">Daftar penjemputan sampah terbaru di akun anda.</p>
                    </div>

                    <!-- Button Tampilkan Lebih Banyak -->
                    <a href="{{ route('masyarakat.penjemputan.riwayat') }}"
                        class="flex items-center justify-center w-[220px] h-[50px] px-4 py-2 text-black-normal transition duration-300 bg-secondary-200 hover:bg-secondary-300 rounded-2xl shadow-sm border border-secondary-normal">
                        Tampilkan Lebih Banyak
                    </a>
                </div>

                <!-- Container Grid Card -->
                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">
                    @if ($penjemputan->isEmpty())
                        <!-- Tampilkan pesan jika tidak ada riwayat -->
                        <div class="w-[400px] h-[300px] pt-20 mx-auto mt-24 text-center shadow-lg col-span-full bg-white-normal rounded-2xl"">
                            <img src="{{ asset('img/masyarakat/penjemputan-sampah/batal.png') }}" alt="Tidak Ditemukan"
                                class="w-[100px] h-[100px] mx-auto mb-4">
                            <p class="text-lg font-semibold text-gray-500">Data Penjemputan tidak ditemukan.</p>
                        </div>
                    @else
                        @foreach ($penjemputan as $p)
                            <a href="{{ route('masyarakat.penjemputan.detail-riwayat', $p->id_penjemputan) }}"
                                class="block">
                                <div
                                    class="relative flex flex-col justify-between h-[230px] bg-white-normal shadow-sm rounded-xl hover:shadow-lg">
                                    <!-- Waktu Penjemputan -->
                                    <div class="flex justify-between mx-6 mt-4">
                                        <span class="text-lg font-bold text-gray-800">
                                            {{ $p->kode_penjemputan }}
                                        </span>
                                    </div>

                                    <!-- Konten -->
                                    <div class="flex justify-between px-4">
                                        <div class="flex-grow px-2 my-auto">
                                            @foreach ($p->detailPenjemputan as $s)
                                                @if ($loop->index == 2 && count($p->detailPenjemputan) > 2)
                                                    <p class="text-lg font-light">Lainnya...</p>
                                                    @break
                                                @endif
                                                <p class="overflow-hidden text-xl font-semibold whitespace-nowrap text-ellipsis">
                                                    {{ \Illuminate\Support\Str::words($s->jenis->nama_jenis, 2, '...') }}
                                                </p>
                                            @endforeach
                                        </div>

                                    <!-- Poin Sampah -->
                                    <div class="flex flex-col items-end">
                                        <div class="flex items-baseline mx-auto my-10">
                                            <p
                                                class="text-4xl font-bold
                                                @switch($p->getLatestPelacakan->status)
                                                        @case('Diproses')
                                                        @case('Diterima')
                                                            text-tertiary-600
                                                            @break
                                                        @case('Dijemput Kurir')
                                                        @case('Menuju Lokasi Penjemputan')
                                                        @case('Sampah Diangkut')
                                                            text-white-dark
                                                            @break
                                                        @case('Menuju Dropbox')
                                                        @case('Menyimpan Sampah di Dropbox')
                                                        text-primary-normal
                                                            @break
                                                        @case('Selesai')
                                                            text-secondary-normal
                                                            @break
                                                        @case('Dibatalkan')
                                                        text-red-normal
                                                            @break
                                                        @default
                                                        text-tertiary-600
                                                    @endswitch
                                                ">
                                        +{{ $p->total_poin }}
                                            </p>
                                            <span class="ml-1 text-2xl font-bold text-gray-700">Poin</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Catatan -->
                                <div class="px-6">
                                    <p class="mb-4 text-sm text-gray-600">
                                        {{ Carbon\Carbon::parse($p->created_at)->diffForHumans() }}
                                    </p>
                                </div>

                                <!-- Status -->
                                <div class="absolute right-0 bottom-1">
                                    <span
                                        class="px-10 py-2 font-semibold text-white-normal rounded-tl-3xl rounded-br-xl
                                        bg-primary-normal
                                        @switch($p->getLatestPelacakan->status)
                                        @case('Dijemput Kurir')
                                        @case('Menuju Lokasi Penjemputan')
                                        @case('Sampah Diangkut')
                                            bg-white-dark
                                            @break
                                        @case('Menuju Dropbox')
                                        @case('Menyimpan Sampah di Dropbox')
                                        @case('Selesai')
                                            bg-secondary-normal
                                            @break
                                        @case('Dibatalkan')
                                            bg-red-normal
                                            @break
                                        @default
                                            bg-tertiary-600
                                    @endswitch;">
                                        @switch($p->getLatestPelacakan->status)
                                            @case('Dijemput Kurir')
                                            @case('Menuju Lokasi Penjemputan')

                                            @case('Sampah Diangkut')
                                                Dijemput Kurir
                                            @break

                                            @case('Menuju Dropbox')
                                            @case('Menyimpan Sampah di Dropbox')
                                                Menuju Dropbox
                                            @break

                                            @case('Selesai')
                                                Selesai
                                            @break

                                            @case('Dibatalkan')
                                                Dibatalkan
                                            @break

                                            @default
                                                Diproses
                                        @endswitch
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
