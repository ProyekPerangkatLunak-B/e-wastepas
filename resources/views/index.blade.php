@extends('layouts.app')

@section('content')

<div class="bg-white-normal">
    <div class="relative px-6 isolate pt-14 lg:px-8">
      <div class="absolute inset-x-0 overflow-hidden -top-40 -z-10 transform-gpu blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#60b15b] to-[#cee7cc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
      </div>
      <div class="max-w-2xl py-32 mx-auto sm:py-48 lg:py-56">
        <div class="text-center">
          <div class="flex items-center justify-center gap-4">
            <img src="{{ asset('img/logoEwaste.png') }}" alt="Logo E-waste" class="w-auto h-16">
            <h1 class="text-5xl font-semibold tracking-tight text-gray-900 text-balance sm:text-7xl">E-Wastepas</h1>
          </div>
          <p class="mt-8 text-lg font-medium text-gray-500 text-pretty sm:text-xl/8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, quas?</p>
          <div class="flex items-center justify-center mt-10 gap-x-6">
            @foreach (['masyarakat.login' => 'Masyarakat', 'mitra-kurir.login' => 'Mitra Kurir', 'admin.login.index' => 'Admin', 'manajemen.datamaster.dashboard.index' => 'Manajemen'] as $route => $label)
              <a href="{{ route($route) }}" class="rounded-md bg-secondary-normal px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-secondary-dark hover:scale-105 transition transform duration-300 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-secondary-normal">
                {{ $label }}
              </a>
            @endforeach
          </div>
        </div>
      </div>
      <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
        <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#60b15b] to-[#cee7cc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
      </div>
    </div>
  </div>

@endsection
