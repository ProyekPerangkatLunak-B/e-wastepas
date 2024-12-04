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
                        class="flex flex-col items-center w-4/5 p-8 shadow-lg bg-white-normal rounded-xl group hover:shadow-xl">
                        <h3 class="text-2xl font-bold text-gray-800">Total Sampah</h3>
                        <div class="flex items-baseline mt-4">
                            <span class="mb-2 text-6xl font-bold text-secondary-normal">{{ $totalSampah }}</span>
                            <span class="ml-1 text-2xl font-bold text-gray-900">Pcs</span>
                        </div>
                        <p class="mt-2 text-base text-center text-gray-500">Total sampah yang sudah diangkut.</p>
                    </div>

                    <!-- Card Total Poin -->
                    <div
                        class="flex flex-col items-center w-4/5 p-8 shadow-lg bg-white-normal rounded-xl group hover:shadow-xl">
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
                        class="flex items-center justify-center w-[220px] h-[50px] px-4 py-2 text-black-normal transition duration-300 bg-secondary-200 hover:bg-secondary-300 rounded-2xl shadow-md border border-secondary-normal">
                        Tampilkan Lebih Banyak
                    </a>
                </div>

                <!-- Container Grid Card -->
                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">
                    @if ($penjemputan->isEmpty())
                        <!-- Tampilkan pesan jika tidak ada riwayat -->
                        <div class="w-full p-6 text-center shadow-lg col-span-full bg-white-normal rounded-2xl">
                            <img src="{{ asset('img/masyarakat/penjemputan-sampah/x-circle 3.png') }}" alt="Tidak Ditemukan"
                                class="w-[100px] h-[100px] mx-auto mb-4">
                            <p class="text-lg font-semibold text-gray-500">Tidak ada riwayat penjemputan tersedia.</p>
                        </div>
                    @else
                        @foreach ($penjemputan as $p)
                            <a href="{{ route('masyarakat.penjemputan.detail-riwayat') }}" class="block">
                                <div
                                    class="relative flex flex-col justify-between h-[230px] bg-white-normal shadow-md rounded-xl hover:shadow-lg">
                                    <!-- Waktu Penjemputan -->
                                    <div class="flex justify-between mx-6 mt-2">
                                        <span class="text-lg font-bold text-gray-800">
                                            {{ Carbon\Carbon::parse($p->created_at)->diffForHumans() }}
                                        </span>
                                    </div>

                                    <!-- Konten -->
                                    <div class="flex justify-between px-6">
                                        <div>
                                            @foreach ($p->detailPenjemputan as $s)
                                                @if ($loop->index == 2 && count($p->detailPenjemputan) > 3)
                                                    <p class="text-lg font-semibold">...</p>
                                                @break
                                            @endif
                                            <p class="text-2xl font-semibold">{{ $s->jenis->nama_jenis }}</p>
                                        @endforeach
                                    </div>

                                    <!-- Poin -->
                                    <div class="flex flex-col items-end">
                                        <div class="flex items-baseline">
                                            <p
                                                class="text-6xl font-bold
                                            @if ($p->status === 'Diterima' && $p->getLatestPelacakan->status === 'Sudah Sampai') text-secondary-normal
                                            @else text-tertiary-600 @endif
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
                                        @if (strlen($p->catatan) > 25)
                                            {{ substr($p->catatan, 0, 25) }}...
                                        @else
                                            {{ $p->catatan }}
                                        @endif
                                    </p>
                                </div>

                                <!-- Status -->
                                <div class="absolute
                                                right-0 bottom-1">
                                    <span
                                        class="px-4 py-2 font-semibold text-white-normal rounded-tl-3xl rounded-br-xl
                                    @if ($p->getLatestPelacakan->status === 'Dijemput Driver') bg-white-dark
                                    @elseif ($p->getLatestPelacakan->status === 'Menuju Dropbox') bg-primary-normal
                                    @elseif ($p->getLatestPelacakan->status === 'Sudah Sampai') bg-secondary-normal
                                    @elseif ($p->status === 'Ditolak') bg-red-500
                                    @elseif ($p->status === 'Dibatalkan') bg-red-normal
                                    @else bg-tertiary-600 @endif;">
                                        {{ $p->status === 'Diterima' ? $p->getLatestPelacakan->status : $p->status }}
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
