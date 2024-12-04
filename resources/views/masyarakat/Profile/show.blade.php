@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profil Masyarakat</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <img src="{{ $user->foto_profil ? asset('storage/' . $user->foto_profil) : 'https://via.placeholder.com/150' }}" 
                 alt="Foto Profil" class="rounded-circle" width="150">
            <h5>Nama: {{ $user->nama }}</h5>
            <h5>Email: {{ $user->email }}</h5>
            <h5>Alamat: {{ $user->alamat }}</h5>
            <h5>Nomor Telepon: {{ $user->nomor_telepon }}</h5>
            <a href="{{ route('masyarakat.profile.edit') }}" class="btn btn-primary mt-3">Edit Profil</a>
        </div>
    </div>
</div>
@endsection
