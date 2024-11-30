@extends('layouts.main')

@section('content')
    <div class="w-[81%] min-h-screen px-[5rem] py-14 mx-[22rem] bg-gray-100">
        <h2 class="text-xl font-semibold leading-relaxed">Total Sampah dan Poin</h2>
        <div class="flex items-center justify-between">
            <h4 class="text-base font-normal">Semua total sampah elektronik dan poin di akun anda.</h4>
        </div>

        {{-- Section 1 Total Sampah dan Total Poin --}}
        <div class="grid grid-cols-2 gap-4 mt-4 mr-60">
            <!-- Card Total Sampah -->
            <div
                class="relative w-[550px] h-[130px] p-6 shadow-md bg-white-normal rounded-2xl group hover:shadow-lg flex items-center">
                <div class="flex items-center mr-8">
                    <span class="text-6xl font-bold leading-none text-green-600">{{ $totalSampah }}</span>
                    <span class="mx-auto mt-8 text-lg font-bold leading-none text-black-normal">Pcs</span>
                </div>
                <div class="flex flex-col justify-center ml-8">
                    <h3 class="text-2xl font-semibold text-center text-gray-900">Total Sampah</h3>
                    <p class="text-gray-500 text-md">Total sampah yang sudah diangkut.</p>
                </div>
            </div>

            <!-- Card Total Poin -->
            <div
                class="relative w-[550px] h-[130px] p-6 shadow-md bg-white-normal rounded-2xl group hover:shadow-lg flex items-center">
                <div class="flex items-center mr-8">
                    <span class="text-6xl font-bold leading-none text-green-600">{{ $totalPoin }}</span>
                    <span class="mx-auto mt-8 text-lg font-bold leading-none text-black-normal">Poin</span>
                </div>
                <div class="flex flex-col justify-center ml-8">
                    <h3 class="text-2xl font-semibold text-center text-black-normal">Total Poin</h3>
                    <p class="text-gray-500 text-md">Total poin yang sudah didapatkan.</p>
                </div>
            </div>
        </div>

        {{-- Section 2 Riwayat Penjemputan --}}
        <div class="flex items-center justify-between mx-auto mt-6">
            <div>
                <h2 class="text-xl font-semibold leading-relaxed">Riwayat Penjemputan</h2>
                <p class="text-base font-normal text-gray-600">Daftar penjemputan sampah terbaru di akun anda.</p>
            </div>

            <!-- Button Tampilkan lebih banyak -->
            <a href="{{ route('masyarakat.penjemputan.riwayat') }}"
                class="flex items-center justify-center w-[220px] h-[50px] px-4 py-2 text-black-normal transition duration-300 bg-secondary-200 hover:bg-secondary-300 rounded-2xl shadow-md border border-secondary-normal">
                Lihat selengkapnya
            </a>
        </div>

        <!-- Container Grid Card -->
        <div class="grid grid-cols-3 gap-4 mt-6">
            @if($penjemputan->isEmpty())
            <!-- Tampilkan pesan jika tidak ada riwayat -->
            <div class="w-1/2 p-6 mx-auto mt-64 text-center shadow-lg col-span-full bg-white-normal rounded-2xl">
                <img src="{{ asset('img/masyarakat/penjemputan-sampah/x-circle 3.png') }}"
                    alt="Tidak Ditemukan" class="w-[100px] h-[100px] mx-auto mb-4">
                <p class="text-lg font-semibold text-gray-500">Tidak ada riwayat penjemputan tersedia.</p>
            </div>
        @else
            @foreach ($penjemputan as $p)
                <a href="{{ route('masyarakat.penjemputan.detail-riwayat') }}" class="block">
                    <div class="relative w-[450px] h-[230px] bg-white-normal shadow-md rounded-xl hover:shadow-lg">
                        <div class="flex justify-between">
                            <span class="mx-6 my-2 text-lg font-bold text-gray-800">
                                {{ date("H:i d/m", $p->waktu_penjemputan) }}
                            </span>
                        </div>

                        <!-- Isi Konten -->
                        <div class="flex px-6 mt-4 space-x-6">
                            <!-- Bagian Jenis dan Deskripsi Sampah -->
                            <div class="flex-grow my-4">
                                @foreach ($p->sampahDetail as $s)
                                    @if ($loop->index == 2 && count($p->sampahDetail) > 3)
                                        <p class="text-lg font-semibold">...</p>
                                        @break
                                    @endif
                                    <p class="text-lg font-semibold">{{ $s->jenis->nama_jenis }}</p>
                                @endforeach
                                {{-- Catatan --}}
                                <div class="absolute left-6 bottom-4 w-[calc(100%-1.5rem)]">
                                    <p class="text-sm text-black-normal">
                                        @if (strlen($p->catatan) > 25)
                                            {{ substr($p->catatan, 0, 25) }}...
                                        @else
                                            {{ $p->catatan }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-between">
                                <img src="{{ asset('img/masyarakat/penjemputan-sampah/journal-check 2.png') }}"
                                    alt="Icon" class="w-[100px] h-[100px]">
                                <!-- Status -->
                                <div class="absolute right-0 bottom-1">
                                    <span class="px-4 py-2 font-semibold text-white-normal rounded-tl-3xl rounded-br-xl
                                        @if ($p->getLatestPelacakan->status === 'Dijemput Driver') bg-white-dark
                                        @elseif ($p->getLatestPelacakan->status === 'Menuju Dropbox') bg-primary-normal
                                        @elseif ($p->getLatestPelacakan->status === 'E-Waste Tiba') bg-secondary-normal
                                        @else bg-tertiary-600
                                        @endif;">
                                        {{ $p->getLatestPelacakan->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
</div>
@endsection
