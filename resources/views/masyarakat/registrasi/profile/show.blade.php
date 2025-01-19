@extends('layouts.registrasi.main-profil')

@section('content')
    <div class="w-[81%] min-h-screen px-[5rem] py-12 mx-[22rem] bg-gray-100">

        <div class="flex" aria-label="Breadcrumb">
            <div class="flex items-center">
            </div>
            <div style="background-color: white;"
                class="rounded-[2rem] w-full
                   sm:max-w-2xl md:max-w-3xl lg:max-w-4xl
                   p-6 sm:p-8 md:p-10 ms-24
                   relative flex flex-col justify-content items-center">
                <div class="w-full flex-20 mt-4">
                    <div class="flex flex-col flex justify-around items-center">
                    </div>
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <ul class="mt-2 list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div>
                        <h2 class="text-3xl font-semibold text-gray-900 ms-24">Profile</h2>
                    </div>
                </div>

                <!-- Form Profil -->
                <form id="profileForm" method="POST" action="{{ route('masyarakat.profile.save') }}"
                    enctype="multipart/form-data" class="space-y-8">
                    @csrf <!-- Token CSRF untuk keamanan -->

                    <!-- Input untuk Foto Profil -->
                    <div class="w-full mt-6">
                        <div class = "ml-22 flex">
                        <label for="foto_profil" class="">

                        </label>
                        <img src="{{ $user->foto_profil ? Storage::url($user->foto_profil) : 'https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw3fHxwZW9wbGV8ZW58MHwwfHx8MTcxMTExMTM4N3ww&ixlib=rb-4.0.3&q=80&w=1080' }}"
                            alt="Foto Profil" class="w-32 h-32 ml-24 rounded-full">
                            <div class="ml-8">
                                <h3 class="font-bold text-xl mt-8">Profile Picture</h3>
                                <p>PNG, JPG, JPEG Under 15MB</p>
                              </div>
                            </div>
                        <input type="file" name="foto_profil" id="foto_profil"
                            class="p-4 mt-6 w-full border-2 rounded-lg text-gray-800 border-gray-200">
                    </div>


                    <!-- Input untuk Nama -->
                    <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-3 justify-center w-full">
                        <div class="w-full mt-6">
                            <label for="nama" class="text-gray-500">Nama</label>
                            <input type="text" name="nama" id="nama"
                                class="p-4 w-full border-2 rounded-lg text-gray-800 border-gray-200"
                                placeholder="Masukkan Nama" value="{{ old('nama', $user->nama) }}" required>
                        </div>
                        <div class="w-full mt-6">
                            <label for="tanggal_lahir" class="text-gray-500">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                class="p-4 w-full border-2 rounded-lg text-gray-800 border-gray-200"
                                value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                        </div>
                    </div>

                    <!-- Input lainnya -->
                    <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-3 justify-center w-full">
                        <div class="w-full mt-6">
                            <label for="nomor_telepon" class="text-gray-500">No. Telepon</label>
                            <input type="tel" name="nomor_telepon" id="nomor_telepon"
                                class="p-4 w-full border-2 rounded-lg text-gray-800 border-gray-200"
                                placeholder="Masukkan No. Telepon" value="{{ old('nomor_telepon', $user->nomor_telepon) }}">
                        </div>
                        <div class="w-full mt-6">
                            <label for="alamat" class="text-gray-500">Alamat</label>
                            <input type="text" name="alamat" id="alamat"
                                class="p-4 w-full border-2 rounded-lg text-gray-800 border-gray-200"
                                placeholder="Masukkan Alamat" value="{{ old('alamat', $user->alamat) }}">
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="mt-6 flex justify-end items-end">
                        <button type="submit"
                            class="focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l py-3 px-5 justify-end font-bold ms-80 rounded-lg text-base">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div id="modelConfirm"
            class="fixed inset-0 z-50 hidden w-full h-full px-4 overflow-y-auto bg-gray-900 bg-opacity-60">
            <div class="relative max-w-md mx-auto bg-white rounded-lg shadow-xl top-40 flex flex-col">
                <div class="flex justify-end p-2">
                    <button onclick="closeModal('modelConfirm')" type="button"
                        class="text-gray-400 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 text-center flex flex-col justify-between flex-grow">
                    <h2 class="text-xl font-bold text-gray-900">Profile Anda Berhasil Diperbaharui</h2>
                    <img src="../img/masyarakat/registrasi/popup-reset.png" alt="Success Icon"
                        class="w-20 h-20 mx-auto mt-4">
                    <p class="mt-4 text-gray-500">Sekarang Anda Menggunakan Profile yang baru saja diperbaharui</p>
                    <a href="{{ route('masyarakat.penjemputan.kategori') }}"
                        class="px-5 py-2 mt-auto font-bold text-white bg-gradient-to-r from-lime-500 to-green-600 rounded-lg">
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <script>
            function validateForm() {
                const form = document.getElementById('profileForm');
                const inputs = form.querySelectorAll('input');
                let isValid = true;

                // Check if any input is empty
                inputs.forEach(input => {
                    if (input.required && !input.value) {
                        input.classList.add('border-red-500');
                        isValid = false;
                    } else {
                        input.classList.remove('border-red-500');
                    }
                });

                // If all fields are filled, open the modal
                if (isValid) {
                    openModal('modelConfirm');
                } else {
                    alert('Tolong lengkapi semua data sebelum menyimpan.');
                }
            }

            function openModal(modalId) {
                document.getElementById(modalId).style.display = 'block';
                document.body.classList.add('overflow-hidden');
            }

            function closeModal(modalId) {
                document.getElementById(modalId).style.display = 'none';
                document.body.classList.remove('overflow-hidden');
            }
        </script>
    </div>
    </div>

@endsection
