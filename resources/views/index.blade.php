@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="max-w-6xl p-8 mx-10 text-center rounded-lg shadow-lg bg-white-normal">
            <h1 class="my-3 text-3xl font-bold tracking-tight text-black-normal">
                E-Wastepas Home Page
            </h1>
            <div>
                <p class="max-w-2xl mx-auto my-2 text-base text-gray-500 md:leading-relaxed md:text-xl dark:text-gray-400">
                    Halaman Depan dari aplikasi E-Wastepas
                </p>
            </div>
            <div class="flex flex-col items-center justify-center gap-5 mt-6 md:flex-row">
                <a class="inline-block w-auto text-center min-w-[200px] px-6 py-4 text-white transition-all duration-300 transform shadow-xl sm:w-auto text-gray-100 border rounded-xl bg-gradient-to-r from-secondary-normal to-primary-normal border-tertiary-normal hover:scale-105 hover:shadow-2xl hover:-translate-y-1 hover:bg-gradient-to-l from-primary-normal to-secondary-normal"
                    href="{{ route('masyarakat.login') }}">Masyarakat
                </a>
                <a class="inline-block w-auto text-center min-w-[200px] px-6 py-4 text-white transition-all duration-300 transform shadow-xl sm:w-auto text-gray-100 border rounded-xl bg-gradient-to-r from-secondary-normal to-primary-normal border-tertiary-normal hover:scale-105 hover:shadow-2xl hover:-translate-y-1 hover:bg-gradient-to-l from-primary-normal to-secondary-normal"
                    href="{{ route('mitra-kurir.login') }}">Mitra Kurir
                </a>
                <a class="inline-block w-auto text-center min-w-[200px] px-6 py-4 text-white transition-all duration-300 transform shadow-xl sm:w-auto text-gray-100 border rounded-xl bg-gradient-to-r from-secondary-normal to-primary-normal border-tertiary-normal hover:scale-105 hover:shadow-2xl hover:-translate-y-1 hover:bg-gradient-to-l from-primary-normal to-secondary-normal"
                    href="{{ route('admin.login.index') }}">Admin
                </a>
                <a class="inline-block w-auto text-center min-w-[200px] px-6 py-4 text-white transition-all duration-300 transform shadow-xl sm:w-auto text-gray-100 border rounded-xl bg-gradient-to-r from-secondary-normal to-primary-normal border-tertiary-normal hover:scale-105 hover:shadow-2xl hover:-translate-y-1 hover:bg-gradient-to-l from-primary-normal to-secondary-normal"
                    href="{{ route('manajemen.datamaster.dashboard.index') }}">Manajemen
                </a>
            </div>
        </div>
    </div>
@endsection
