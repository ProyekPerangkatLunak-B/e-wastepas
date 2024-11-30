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

            <!-- Button Batalkan Penjemputan -->
            <a href="{{ route('masyarakat.penjemputan.riwayat') }}"
                class="flex items-center justify-center w-[220px] h-[50px] px-4 py-2 text-black-normal transition duration-300 bg-secondary-200 hover:bg-secondary-300 rounded-2xl shadow-md border border-secondary-normal">
                Tampilan lebih banyak
            </a>
        </div>

        <!-- Container Grid Card -->
        <div class="grid grid-cols-3 gap-4 mt-6">
            @foreach ($penjemputan as $p)
                <!-- Card -->
                <a href="{{ route('masyarakat.penjemputan.detail-riwayat') }}" class="block">
                    <div class="relative w-[450px] h-[230px] bg-white-normal shadow-md rounded-xl hover:shadow-lg">
                        <!-- Header Card -->
                        <div class="flex justify-between px-6 py-4">
                            <span class="text-lg font-bold text-gray-800">{{ $p->tanggal_penjemputan }}</span>
                        </div>

                        <!-- Konten Card -->
                        <div class="flex items-start justify-between px-6 mt-2">
                            <!-- Informasi Sampah -->
                            <div class="flex-1">
                                @foreach ($p->sampahDetail as $s)
                                    @if ($loop->index == 2 && count($p->sampahDetail) > 3)
                                        <p class="text-xl font-semibold">...</p>
                                    @break
                                @endif
                                <p class="text-xl font-semibold">{{ $s->jenis->nama_jenis }}</p>
                            @endforeach
                            {{-- <p class="mt-8 text-sm text-black-normal">{{ $p->catatan }}</p> --}}
                            <p class="mt-8 text-sm text-black-normal">
                                @if (strlen($p->catatan) > 25)
                                    {{ substr($p->catatan, 0, 25) }}...
                                @else
                                    {{ $p->catatan }}
                                @endif
                            </p>
                        </div>

                        <!-- Jumlah Poin -->
                        <div class="flex items-baseline justify-end mt-4 space-x-2">
                            <span class="text-6xl font-bold text-secondary-normal">+{{ $p->total_poin }}</span>
                            <span class="text-lg font-bold text-black-normal">Poin</span>
                        </div>
                    </div>

                    <!-- Status Button -->
                    <div class="absolute right-0 bottom-2">
                        <span class="px-8 py-3 font-semibold text-white-normal text-md rounded-tl-3xl rounded-br-xl"
                            style="background-color:
                                @if ($p->getLatestPelacakan->status === 'Menunggu konfirmasi') #888E86
                                @elseif ($p->getLatestPelacakan->status === 'Dijemput Driver') #595959
                                @elseif ($p->getLatestPelacakan->status === 'Menuju Dropbox') #437252
                                @elseif ($p->getLatestPelacakan->status === 'E-Waste Tiba') #60B15B
                                @else #888E86 @endif;">
                            {{ $p->getLatestPelacakan->status }}
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
