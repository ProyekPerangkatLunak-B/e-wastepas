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
                            <h1 class="text-2xl font-bold mb-4">Profile</h1>
                            <div class="flex flex-col md:flex-row mt-4">
                                <div class="flex items-center mb-4">
                                    <img src="" alt="Profile Image"
                                    class="border border-green-300 rounded-full shadow-sm w-14 h-14">
                                  <div class="ml-4 mt-2">
                                    <p class="text-gray-500 font-semibold text-lg">Profile Picture</p>
                                    <p class="text-md text-gray-400">PNG, JPEG, PDF under 1MB</p>
                                  </div>
                                </div>
                              </div>
                              <div class="5xl:w-1/2">
                                <div class="grid grid-cols-1 w-full md:grid-cols-2 gap-6">
                                  <div>
                                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                                    <input type="nama" class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-sm focus:outline-none focus:border-green-800 focus:bg-white">
                                  </div>
                                  <div>
                                    <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                    <input type="date" class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-sm focus:outline-none focus:border-green-800 focus:bg-white">
                                  </div>
                                  <div>
                                    <label class="block text-sm font-medium text-gray-700">No. Telepon</label>
                                    <input type="tel" class= "w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-sm focus:outline-none focus:border-green-800 focus:bg-white">
                                  </div>
                                  <div>
                                    <label class="block text-sm font-medium text-gray-700">No. Rekening</label>
                                    <input type="no-rek" class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-sm focus:outline-none focus:border-green-800 focus:bg-white">
                                  </div>
                                  <div>
                                    <label class="block text-sm font-medium text-gray-700">Alamat</label>
                                    <input type="address" class="w-full mt-2 px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-300 text-sm focus:outline-none focus:border-green-800 focus:bg-white"></input>
                                  </div>
                                </div>
                                <div class="flex justify-end mt-4">
                                  <button class="focus:outline-none text-slate-50 bg-gradient-to-r w-[100px] py-3 from-lime-500 to-green-600 hover:bg-gradient-to-l rounded-lg mt-8 text-base">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
@endsection
