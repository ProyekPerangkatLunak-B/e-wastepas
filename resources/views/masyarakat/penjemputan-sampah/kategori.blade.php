@extends('layouts.main')

@section('content')
    <div class="min-h-screen mx-[22rem] mt-2 bg-gray-100 w-[82%]">
        <div class="py-8">
            <h2 class="pl-20 text-xl font-semibold leading-relaxed">Kategori Sampah Elektronik</h2>
            <div class="flex items-center justify-between">
                <h4 class="pl-20 text-base font-normal">Daftar semua kategori sampah elektronik di akun anda.</h4>
            </div>

            {{-- Card Section --}}
            <div class="flex items-center justify-center mt-4">
                <div class="grid grid-cols-3 gap-4 mx-auto">
                    @if (count($kategori) == 0)
                        <div
                            class="flex justify-center mt-56 items-center col-span-full bg-white-normal w-[400px] h-[300px] rounded-xl shadow-sm">
                            <div class="text-center">
                                <img src="{{ asset('img/masyarakat/penjemputan-sampah/batal.png') }}"
                                    alt="Tidak Ditemukan" class="w-[100px] h-[100px] mx-auto mb-4">
                                <p class="text-lg font-semibold text-gray-500">Kategori {{ $search ?? 'Sampah Elektronik' }}
                                    tidak ditemukan.</p>
                            </div>
                        </div>
                    @else
                        @foreach ($kategori as $k)
                            @php
                                $imagePath = 'img/masyarakat/gambarKategoriSampah/' . ($k->gambar ?? $k->nama_kategori . '.png');
                                $image = file_exists(public_path($imagePath)) ? $imagePath : 'img/masyarakat/gambarKategoriSampah/no-image.png';
                            @endphp
                            <x-card title="{{ $k->nama_kategori }}" description="{{ $k->deskripsi_kategori }}"
                                poin="{{ $k->poin }}"
                                image="{{ asset($image) }}"
                                link="{{ route('masyarakat.penjemputan.detail', $k->id_kategori) }}" />
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
