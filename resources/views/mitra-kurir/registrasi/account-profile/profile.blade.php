@extends('mitra-kurir.registrasi.account-profile.layout')
@section('title', 'Profile')
@section('content')
    <div class="min-h-screen bg-gray-100 flex items-center justify-center w-full py-8 mt-12">
        <div class="flex-1 bg-gray-100 overflow-y-auto">
            <div class="container px-4 mx-auto py-8">
                <div style="background-color: white;"
                    class="rounded-[2rem] shadow-2xl w-full
                sm:max-w-xl md:max-w-3xl lg:max-w-4xl
                p-4 sm:p-6 md:p-8
                min-h-[500px] sm:min-h-[600px] md:min-h-[700px]
                relative flex flex-col mx-auto">

                    <div class="text-left w-full mb-6">
                        <h2 class="text-2xl font-semibold text-gray-900">Profil</h2>
                    </div>
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <div class="relative px-4 py-3 mt-4 mb-4 text-red-700 bg-red-100 rounded" role="alert">
                                    <li>{{ $error }}</li>
                                </div>
                            @endforeach
                        </ul>
                    @endif

                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- Bagian Profil Pengguna --}}
                    <div class="bg-[#F7F7F7] border border-[#C0C0C0] rounded-lg p-6 shadow-sm relative mb-6">
                        <a id="editButton"
                            class="absolute top-4 right-4 z-10 flex items-center gap-2 font-light text-gray-600 py-2 px-4 rounded-md
                        border border-gray-300 bg-white hover:bg-gray-100 transition-all duration-300"
                            onclick="enableEditMode()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 3.487a2.25 2.25 0 113.182 3.182L7.5 19.213l-4.346 1.087 1.087-4.346L16.862 3.487z" />
                            </svg>
                            Edit
                        </a>
                        <form method="POST" class="w-full" enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-wrap md:flex-nowrap items-start gap-6">
                                <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-200">

                                    <input id="photoInput" name="photo" type="file" class="hidden"
                                        accept=".jpg,.jpeg,.png" onchange="previewImage(event)" />
                                    <label for="photoInput" class="cursor-pointer">
                                        @if (isset($user->foto_profil))
                                            <img id="profilePhoto" src="{{ asset('storage/' . $user->foto_profil) }}"
                                                alt="Profile Photo" class="w-full h-full object-cover" />
                                        @else
                                            <img id="profilePhoto" src="{{ asset('/img/mitra-kurir/icon-account.png') }}"
                                                alt="Default Profile Photo" class="w-full h-full object-cover" />
                                        @endif
                                    </label>
                                </div>
                                <div>
                                    {{-- <input id="nameInput" type="text" class="text-2xl font-semibold text-gray-900 bg-transparent border-0 focus:ring-0 focus:outline-none" value="Jane Doe" readonly /> --}}

                                    <div class="flex-1">
                                        <div class="relative mt-2">
                                            <input id="nameInput" name="name" type="text" placeholder="Masukkan Nama"
                                                class="text-2xl font-semibold text-gray-900 w-full mt-2 px-5 py-4 rounded-2xl bg-gray-100 text-md focus:outline-none focus:bg-white"
                                                value="{{ $user->nama }}" readonly />
                                        </div>
                                    </div>
                                    <div class="flex flex-col ml-5">
                                        <p class="text-sm font-semibold text-gray-700">Mitra Kurir</p>
                                        <p class="text-sm font-medium text-green-600">
                                            @if ($user->status_verifikasi == 'Diterima')
                                                Tervalidasi
                                            @elseif ($user->status_verifikasi == 'Diproses')
                                                Validasi sedang Diproses
                                            @else
                                                Belum Tervaliadasi
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                    </div>

                    {{-- Bagian Data Diri --}}
                    <div class="bg-[#F9F9F9] border border-[#E0E0E0] rounded-lg p-6 shadow-sm relative mt-6">
                        <h5 class="text-xl font-semibold text-gray-900 mb-5">Data Diri</h5>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <div class="mb-4">
                                    <label for="email"
                                        class="block mt-2 text-sm font-medium leading-7 text-gray-500">Email</label>
                                    <div class="relative mt-2">
                                        <input id="email" name="email" type="email" placeholder="Masukkan Email"
                                            class="w-full mt-2 px-5 py-4 rounded-2xl font-medium bg-gray-100 text-md focus:outline-none focus:bg-white"
                                            value="{{ $user->email }}" disabled />
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="address" class="block mt-2 text-sm font-medium leading-7 text-gray-500">No
                                        Ktp</label>
                                    <div class="relative mt-2">
                                        <input id="noktp" name="address" type="text" placeholder="Masukkan Alamat"
                                            class="w-full mt-2 px-5 py-4 rounded-2xl font-medium bg-gray-100 text-md focus:outline-none focus:bg-white"
                                            value="{{ $user->nomor_ktp }}" disabledgi />
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="phone" class="block mt-2 text-sm font-medium leading-7 text-gray-500">No.
                                        HP</label>
                                    <div class="relative mt-2">
                                        <input id="phone" name="phone" type="tel" placeholder="Masukkan No.HP"
                                            class="w-full mt-2 px-5 py-4 rounded-2xl font-medium bg-gray-100 text-md focus:outline-none focus:bg-white"
                                            value="{{ $user->nomor_telepon }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="mb-4">
                                    <label for="address"
                                        class="block mt-2 text-sm font-medium leading-7 text-gray-500">Alamat</label>
                                    <div class="relative mt-2">
                                        <input id="address" name="address" type="text" placeholder="Masukkan Alamat"
                                            class="w-full mt-2 px-5 py-4 rounded-2xl font-medium bg-gray-100 text-md focus:outline-none focus:bg-white"
                                            value="{{ $user->alamat }}" readonly />
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="tanggalLahir"
                                        class="block mt-2 text-sm font-medium leading-7 text-gray-500">Tanggal
                                        Lahir</label>
                                    <div class="relative mt-2">
                                        <input id="tanggalLahir" name="tanggalLahir" type="date"
                                            placeholder="Masukkan Tanggal Lahir"
                                            class="w-full mt-2 px-5 py-4 rounded-2xl font-medium bg-gray-100 text-md focus:outline-none focus:bg-white"
                                            value="{{ \Carbon\Carbon::parse($user->tanggal_lahir)->format('Y-m-d') }}"
                                            readonly />
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="noRekening"
                                        class="block mt-2 text-sm font-medium leading-7 text-gray-500">No. Rekening</label>
                                    <div class="relative mt-2">
                                        <input id="noRekening" name="noRekening" type="text"
                                            placeholder="Masukkan No Rekening"
                                            class="w-full mt-2 px-5 py-4 rounded-2xl font-medium bg-gray-100 text-md focus:outline-none focus:bg-white"
                                            value="{{ $user->no_rekening }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end space-x-4">
                            <button type="button" id="cancelButton" style="display:none;"
                                class="w-full sm:w-32  bg-red-normal hover:bg-red-400 text-[#FFFFFF] py-2 px-4 rounded-md
                                                 transition-all duration-300 ease-in-out
                                                transform hover:scale-105 text-sm sm:text-base">
                                Batal
                            </button>
                            <button type="submit" id="saveButton" style="display:none;"
                                class="w-full sm:w-32  bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] py-2 px-4 rounded-md
                                                hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out
                                                transform hover:scale-105 text-sm sm:text-base">
                                Simpan
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let originalValues = {}; // Object untuk menyimpan nilai asli

        function enableEditMode() {
            const inputs = document.querySelectorAll('input');

            // Simpan nilai asli dari input
            inputs.forEach(input => {
                if (!originalValues[input.id]) {
                    originalValues[input.id] = input.value;
                }
                input.removeAttribute('readonly');
            });

            document.getElementById('saveButton').style.display = 'inline-block';
            document.getElementById('cancelButton').style.display = 'inline-block';
            document.getElementById('editButton').style.display = 'none';
        }

        function cancelEditMode() {
            const inputs = document.querySelectorAll('input');

            // Kembalikan nilai input ke nilai asli
            inputs.forEach(input => {
                if (originalValues[input.id] !== undefined) {
                    input.value = originalValues[input.id];
                }
                input.setAttribute('readonly', 'readonly');
            });

            document.getElementById('saveButton').style.display = 'none';
            document.getElementById('cancelButton').style.display = 'none';
            document.getElementById('editButton').style.display = 'inline-block';
        }

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profilePhoto');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // Tambahkan event listener untuk tombol Batal
        document.getElementById('cancelButton').addEventListener('click', cancelEditMode);
    </script>

@endsection
