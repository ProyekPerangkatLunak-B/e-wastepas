@extends('layouts.registrasi.main-ubah')

@section('content')
<div class="w-[81%] min-h-screen px-[5rem] py-12 mx-[22rem] bg-gray-100">

    <div class="flex" aria-label="Breadcrumb">
            <div class="flex items-center">
            </div>
            <div style="background-color: white;"
            class="rounded-[2rem] w-full
                   sm:max-w-2xl md:max-w-3xl lg:max-w-4xl
                   p-8 sm:p-10 md:p-12
                   min-h-[400px] sm:min-h-[500px] md:min-h-[600px]
                   relative flex flex-col justify-content items-center">
                   <div class="w-full flex-20 mt-4">
                    <div class="flex flex-col flex justify-around items-center">
                </div>
                    <div class="mx-auto max-w-md">
                        <div class="container p-8">
                            <h1>Edit Profil Masyarakat</h1>

    <form method="POST" action="{{ route('masyarakat.profile.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $user->nama) }}" required>
            @error('nama')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $user->alamat) }}">
            @error('alamat')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $user->nomor_telepon) }}">
            @error('nomor_telepon')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kata_sandi" class="form-label">Password Baru (Opsional)</label>
            <input type="password" name="kata_sandi" id="kata_sandi" class="form-control">
            @error('kata_sandi')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kata_sandi_confirmation" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" name="kata_sandi_confirmation" id="kata_sandi_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <label for="foto_profil" class="form-label">Foto Profil (Opsional)</label>
            <input type="file" name="foto_profil" id="foto_profil" class="form-control">
            @error('foto_profil')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
