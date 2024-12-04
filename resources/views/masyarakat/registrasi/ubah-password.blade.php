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
                <h1 class="text-2xl font-bold">Ubah Password</h3>
                    <div class="mx-auto max-w-md">
                      <form action="#" method="POST">
                        <label for="password" class="block mt-4 text-md font-bold leading-9 text-gray-900">Password Lama</label>
                        <input
                            class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-sm focus:outline-none focus:border-green-800 focus:bg-white"
                            type="password" placeholder="Enter your password" required name="password"/>
                        <label for="password" class="block mt-4 text-md font-bold leading-9 text-gray-900">Password Baru</label>
                        <input
                            class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-sm focus:outline-none focus:border-green-800 focus:bg-white"
                            type="password"  placeholder="Enter your password" name="password"/>
                        <label for="password" class="block mt-4 text-md font-bold leading-9 text-gray-900">Konfirmasi Password Baru</label>
                        <input
                            class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-sm focus:outline-none focus:border-green-800 focus:bg-white"
                            type="password"  placeholder="Enter your password" name="password"/>
            <button
            class="focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l w-[100px] py-2 font-bold rounded-lg mt-8 text-base mx-auto"> Masuk
        </button>
        </div>

    </div>
</div>
@endsection
