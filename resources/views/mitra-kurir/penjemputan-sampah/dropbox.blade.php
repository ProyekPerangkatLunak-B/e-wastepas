@extends('layouts.main-mitrakurir')

@section('content')
    <div class="container max-w-full px-4 mx-auto bg-gray-100">

        @if ($penjemputan === null && $pelacakan === null)
            <div class="py-8">
            @else
                <div class="py-8" x-data="{ currentStatus: '{{ $pelacakan->status }}', updateStatus: '' }">
                    {{-- <p>Current Status: <span x-text="currentStatus"></span></p>
                    <p>Update Status: <span x-text="updateStatus"></span></p> --}}
        @endif
        <div class="relative flex items-center justify-center w-full">
            @if (session('error'))
                {{-- FE GAK GUNA --}}
                <div id="alert-box"
                    class="absolute top-0 p-4 px-10 mt-2 text-sm text-red-800 bg-red-100 border border-red-200 rounded-lg animate-fade-in w-fit dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
                    role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
                    <span id="hs-soft-color-danger-label" class="font-bold">Danger</span>
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                {{-- FE GAK GUNA --}}
                <div id="alert-box"
                    class="p-4 mt-2 text-sm text-teal-800 bg-teal-100 border border-teal-200 rounded-lg animate-fade-in dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
                    role="alert" tabindex="-1" aria-labelledby="hs-soft-color-success-label">
                    <span id="hs-soft-color-success-label" class="font-bold">Success</span>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <!-- judul & button -->
        <!-- judul & button -->
        <div class="flex items-center justify-between mx-14">
            <div>
                <h2 class="text-xl font-semibold">Dropbox</h2>
                <p class="text-base font-normal text-gray-600">Rute penjemputan untuk penyimpanan sampah pada dropbox</p>
                {{-- Debuging --}}
                {{-- @if (Auth::user() !== null)
                    <h3><b>Nama kurir:</b> {{ Auth::user()->nama }} - <i class="text-red-400">debugging</i></h3>
                    <h3><b>Peran:</b> {{ Auth::user()->peran->nama_peran }} - <i class="text-red-400">debugging</i></h3>
                @else
                    <h3><b>Nama kurir:</b> {{ Auth::user()->nama }} - <i class="text-red-400">debugging</i></h3>
                    <h3><b>Peran:</b> {{ Auth::user()->peran->nama_peran }} - <i class="text-red-400">debugging</i></h3>
                    @if (!$penjemputan === null && !$pelacakan === null)
                        <h3><b>Status pjpt:</b> {{ $pelacakan->status }} - <i class="text-red-400">debugging</i></h3>
                        <h3><b>Penjemputan no:</b> {{ $penjemputan->id_penjemputan }} - <i
                                class="text-red-400">debugging</i>
                        </h3>
                    @endif
                @endif --}}
                {{-- akhir Debugging --}}
            </div>
            <!-- button jemput sekarang -->
            @if ($penjemputan === null && $pelacakan === null)
                <a href="#" id="openModalBtn"
                    class="flex items-center justify-center hidden px-10 py-2 shadow-md opacity-50 pointer-events-none h-max bg-gradient-to-b from-secondary-normal to-primary-normal text-white-100 rounded-2xl">
                    Jemput Sekarang
                </a>
            @else
                <button data-status="Diterima" data-next-status="Dijemput Kurir" type="button"
                    x-bind:class="{
                        'flex hidden items-center justify-center px-10 py-2 shadow-md bg-gradient-to-b from-secondary-normal to-primary-normal text-white-100 rounded-2xl': currentStatus ===
                            $el.getAttribute('data-status'),
                        'flex hidden items-center justify-center px-10 py-2 shadow-md opacity-50 pointer-events-none cursor-not-allowed bg-gradient-to-b from-secondary-normal to-primary-normal text-white-100 rounded-2xl': currentStatus !==
                            $el.getAttribute('data-status')
                    }"
                    x-on:click.prevent="if (currentStatus !== $el.getAttribute('data-next-status')) {
                    updateStatus = $el.getAttribute('data-next-status');
                    $refs.formUpdate.submit();}">
                    Jemput Sekarang
                </button>
            @endif
        </div>

        @if ($penjemputan === null && $pelacakan === null)
            <!-- Tampilkan pesan jika tidak ada data -->
            <div class="w-1/2 p-6 mx-auto my-64 text-center shadow-2xl col-span-full bg-white-normal rounded-2xl">
                <img src="{{ asset('img/masyarakat/penjemputan-sampah/batal.png') }}" alt="Tidak Ditemukan"
                    class="w-[100px] h-[100px] mx-auto mb-4">
                <p class="text-lg font-semibold text-gray-500">Tidak ada data penjemputan tersedia.</p>
            </div>
        @else
            <!-- Container checkpoint -->
            <div class="mt-4 shadow-md mx-14 bg-white-100 rounded-2xl">
                <div class="flex justify-between p-4">
                    <div>
                        <p class="text-base text-gray-600">ID Penjemputan: {{ $penjemputan->id_penjemputan }}</p>
                        <p class="text-lg font-semibold">{{ $penjemputan->kode_penjemputan }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-semibold text-gray-900">Checkpoint Mitra Kurir</p>
                    </div>
                </div>

                <!-- Tracking Status -->
                <div class="flex items-center justify-center p-5 mt-1 space-x-4">


                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/masyarakat/penjemputan-sampah/truck-hijau.png') }}" class="w-14 h-14"
                            alt="Dijemput Kurir">
                        <span class="mt-2 text-sm text-center text-gary-900">Menuju Lokasi Penjemputan</span>
                        <button type="button" data-status="Dijemput Kurir" data-next-status="Menuju Lokasi Penjemputan"
                            x-bind:class="{
                                'px-5 py-2 mt-2 text-sm text-center shadow-md bg-secondary-normal text-white-100 rounded-2xl': currentStatus ===
                                    $el.getAttribute('data-status'),
                                'px-5 py-2 mt-2 text-sm text-center shadow-md bg-gray-400 text-gray-200 rounded-2xl cursor-not-allowed': currentStatus !==
                                    $el.getAttribute('data-status')
                            }"
                            x-on:click.prevent="if (currentStatus !== $el.getAttribute('data-next-status')) {
                                updateStatus = $el.getAttribute('data-next-status'); setTimeout(() => $refs.formUpdate.submit(), 500); }">
                            Tiba di Lokasi
                        </button>
                    </div>

                    <div class="h-2 rounded w-28 bg-gradient-to-r from-gray-300 to-green-400"></div>

                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam-hijau.png') }}" class="w-14 h-14"
                            alt="Menyimpan Sampah di Dropbox">
                        <span class="mt-2 text-sm text-center text-gray-900">Sampah Diangkut</span>
                        <button type="button" data-status="Menuju Lokasi Penjemputan" data-next-status="Sampah Diangkut"
                            x-bind:class="{
                                'px-5 py-2 mt-2 text-sm text-center shadow-md bg-secondary-normal text-white-100 rounded-2xl': currentStatus ===
                                    $el.getAttribute('data-status'),
                                'px-5 py-2 mt-2 text-sm text-center shadow-md bg-gray-400 text-gray-200 rounded-2xl cursor-not-allowed': currentStatus !==
                                    $el.getAttribute('data-status')
                            }"
                            x-on:click.prevent="if (currentStatus !== $el.getAttribute('data-next-status')) {updateStatus = $el.getAttribute('data-next-status'); setTimeout(() => $refs.formUpdate.submit(), 500);}">
                            Selesai
                        </button>
                    </div>

                    <div class="h-2 rounded w-28 bg-gradient-to-r from-gray-300 to-green-400"></div>

                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/masyarakat/penjemputan-sampah/truck-hijau.png') }}" class="w-14 h-14"
                            alt="Menuju Lokasi Dropbox Terdekat">
                        <span class="mt-2 text-sm text-center text-gray-900">Menuju Lokasi Dropbox Terdekat</span>
                        <button type="button" data-status="Sampah Diangkut" data-next-status="Menuju Dropbox"
                            x-bind:class="{
                                'px-5 py-2 mt-2 text-sm text-center shadow-md bg-secondary-normal text-white-100 rounded-2xl': currentStatus ===
                                    $el.getAttribute('data-status'),
                                'px-5 py-2 mt-2 text-sm text-center shadow-md bg-gray-400 text-gray-200 rounded-2xl cursor-not-allowed': currentStatus !==
                                    $el.getAttribute('data-status')
                            }"
                            x-on:click.prevent="if (currentStatus !== $el.getAttribute('data-next-status')) {updateStatus = $el.getAttribute('data-next-status'); setTimeout(() => $refs.formUpdate.submit(), 500);}">Tiba
                            di Lokasi
                        </button>
                    </div>

                    <div class="h-2 rounded w-28 bg-gradient-to-r from-gray-300 to-green-400"></div>

                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/masyarakat/penjemputan-sampah/box-seam-hijau.png') }}" class="w-14 h-14"
                            alt="Menyimpan Sampah di Dropbox">
                        <span class="mt-2 text-sm text-center text-gray-900">Menyimpan Sampah di Dropbox</span>
                        <button type="button" data-status="Menuju Dropbox" data-next-status="Menyimpan Sampah di Dropbox"
                            x-bind:class="{
                                'px-5 py-2 mt-2 text-sm text-center shadow-md bg-secondary-normal text-white-100 rounded-2xl': currentStatus ===
                                    $el.getAttribute('data-status'),
                                'px-5 py-2 mt-2 text-sm text-center shadow-md bg-gray-400 text-gray-200 rounded-2xl cursor-not-allowed': currentStatus !==
                                    $el.getAttribute('data-status')
                            }"
                            x-on:click.prevent="if (currentStatus !== $el.getAttribute('data-next-status')) {updateStatus = $el.getAttribute('data-next-status'); setTimeout(() => $refs.formUpdate.submit(), 500);}">
                            Selesai
                        </button>
                    </div>

                    <div class="h-2 rounded w-28 bg-gradient-to-r from-gray-300 to-green-400"></div>

                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/masyarakat/penjemputan-sampah/patch-check-hijau.png') }}" class="w-14 h-14"
                            alt="Penjemputan Selesai">
                        <span class="mt-2 text-sm text-center text-gray-900">Penjemputan Selesai</span>
                        <button type="button" data-status="Menyimpan Sampah di Dropbox" data-next-status="Selesai"
                            x-bind:class="{
                                'px-5 py-2 mt-2 text-sm text-center shadow-md bg-secondary-normal text-white-100 rounded-2xl': currentStatus ===
                                    $el.getAttribute('data-status'),
                                'px-5 py-2 mt-2 text-sm text-center shadow-md bg-gray-400 text-gray-200 rounded-2xl cursor-not-allowed': currentStatus !==
                                    $el.getAttribute('data-status')
                            }"
                            x-on:click.prevent="if (currentStatus !== $el.getAttribute('data-next-status')) {updateStatus = $el.getAttribute('data-next-status'); setTimeout(() => $refs.formUpdate.submit(), 500);}">
                            Selesai
                        </button>
                    </div>

                    <form x-ref="formUpdate" class="hidden" action="{{ route('mitra-kurir.penjemputan.updateStatus') }}"
                        x-on:submit.prevent="setTimeout(() => $refs.formUpdate.submit(), 9000);" method="post">
                        @csrf

                        <input type="text" class="hidden" name="id_pelacakan" value="{{ $pelacakan->id_pelacakan }}">
                        <input type="text" class="hidden" name="status" x-bind:value="updateStatus">
                        <button type="submit">Submit</button>
                    </form>

                </div>
            </div>

            <!-- Container alamat & sampah -->
            <div class="mt-6 space-x-4 shadow-md bg-white-100 rounded-2xl mx-14">
                <div class="flex justify-between px-8 space-x-5">
                    <span class="w-20 h-1 bg-red-500 rounded"></span>
                    <span class="w-20 h-1 bg-blue-500 rounded"></span>
                    <span class="w-20 h-1 bg-red-500 rounded"></span>
                    <span class="w-20 h-1 bg-blue-500 rounded"></span>
                    <span class="w-20 h-1 bg-red-500 rounded"></span>
                    <span class="w-20 h-1 bg-blue-500 rounded"></span>
                    <span class="w-20 h-1 bg-red-500 rounded"></span>
                    <span class="w-20 h-1 bg-blue-500 rounded"></span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between">
                        <!-- nama & alamat -->
                        <div class="w-1/2">
                            <h3 class="flex items-center mb-8 space-x-2 text-lg font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    fill="currentColor" class="mr-2 bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                {{ $penjemputan->penggunaMasyarakat->nama }} -
                                {{ $penjemputan->penggunaMasyarakat->nomor_telepon }}
                            </h3>
                            <h3 class="text-lg font-semibold">Alamat Penjemputan</h3>
                            <p class="text-gray-600">
                                {{ $penjemputan->alamat_penjemputan }}</p>
                            <h3 class="mt-4 text-lg font-semibold">Daerah Penjemputan</h3>
                            <p class="text-gray-600">{{ $penjemputan->daerah->nama_daerah }}</p>
                            <h3 class="mt-4 text-lg font-semibold">Lokasi Dropbox Terdekat</h3>
                            <p class="text-gray-600">{{ $penjemputan->dropbox->nama_dropbox }},
                                {{ $penjemputan->dropbox->alamat_dropbox }},
                                {{ $penjemputan->dropbox->daerah->nama_daerah }}</p>
                        </div>

                        <!-- sampah -->
                        <div class="w-1/2">
                            <h3 class="text-lg font-semibold">Sampah</h3>
                            <div class="grid grid-cols-2 gap-3 mt-4 overflow-y-auto max-h-44">
                                <!-- card sampah -->
                                @foreach ($penjemputan->detailPenjemputan as $det)
                                    <div class="relative px-4 py-5 bg-gray-100 border shadow-sm rounded-2xl">
                                        <p class="text-base font-medium">{{ $det->kategori->nama_kategori }}</p>
                                        <p class="mt-2 text-lg font-semibold">{{ $det->jenis->nama_jenis }}</p>
                                        <p class="absolute text-2xl font-bold top-6 right-4 text-primary-normal">1 pcs
                                        </p>
                                        <div
                                            class="absolute bottom-0 right-0 px-6 py-1 text-sm font-semibold bg-primary-normal text-white-100 rounded-tl-2xl rounded-br-2xl">
                                            {{ $det->berat }}.Kg
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- catatan --}}
                            <p class="mt-4 font-bold text-red-normal">*Catatan</p>
                            <p class="text-black">{{ Str::limit(strip_tags($penjemputan->catatan), 150) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
        <div class="w-full max-w-sm p-6 text-center shadow-lg bg-white-100 rounded-2xl">
            <h2 class="text-base font-normal text-gray-500 justify-self-start">Notifikasi</h2>
            <div class="w-10 h-0.5 bg-secondary-normal rounded-xl ml-3"></div>
            <p class="mt-6 mb-6 text-lg">Penjemputan berhasil dimulai!</p>
            <button id="closeModalBtn"
                class="px-10 py-2 font-normal bg-gradient-to-r from-secondary-normal to-primary-normal text-white-100 rounded-2xl hover:bg-gradient-to-l">
                OK
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
        document.getElementById('openModalBtn').addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        });

        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });
    </script>
@endsection
