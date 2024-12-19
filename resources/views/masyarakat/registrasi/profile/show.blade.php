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
            <div>
                <h2 class="text-3xl font-semibold text-gray-900 ms-24">Profile</h2>
            </div>
            <div class="md:col-span-6 mt-4 ms-32">
                <div class="mt-1 flex items-center">
                  <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                  </span>
                  <div class="container">
                    <h3 class="ms-8 font-semibold text-xl">Profile Picture</h3>
                    <p class="ms-8">PNG, JPG, JPEG Under 15MB</p>
                </div>
                </div>
              </div>

        <!-- Form Profil -->
        <form id="profileForm" method="POST" action="{{ route('masyarakat.profile.save') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf <!-- Token CSRF untuk keamanan -->

            <!-- Input untuk Nama -->
            <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-3 justify-center w-full">
                <div class="w-full mt-6">
                    <label for="" class="dark:text-gray-300">Nama</label>
                    <input type="text"
                            class="p-4 w-full border-2 rounded-lg text-gray-200 border-gray-200"
                            placeholder="Masukkan Nama">
                </div>
                <div class="w-full mt-6">
                    <h3 class="dark:text-gray-300">Tanggal Lahir</h3>
                    <input type="date"
                            class="text-grey p-4 w-full border-2 rounded-lg text-gray-400 border-gray-200"
                            placeholder="Masukkan Tanggal Lahir">
                </div>
            </div>
            <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-3 justify-center w-full">
                <div class="w-full">
                    <label for="no-telepon" class="dark:text-gray-300">Masukkan No. Telepon</label>
                    <input type="tel"
                            class="p-4 w-full border-2 rounded-lg text-gray-200 border-gray-200"
                            placeholder="Masukkan No. Telepon">
                </div>
                <div class="w-full">
                    <label for="no-rekening" class=" dark:text-gray-300">No. Rekening</label>
                    <input type="text"
                            class="p-4 w-full border-2 rounded-lg text-gray-200 border-gray-200"
                            placeholder="Masukkan No. Rekening">
                </div>
            </div>
            <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col">
                <div class="">
                    <label for="alamat" class="dark:text-gray-300">Alamat</label>
                    <textarea type="text"
                            class="p-4 w-full border-2 rounded-lg text-gray-200 border-gray-200"
                            placeholder="Masukkan Alamat"></textarea>
                </div>
            </div>
            <!-- Input untuk Foto Profil -->
         <!--   <div>
                <label for="foto_profil" class="block text-gray-700 font-medium">Foto Profil</label>
                <input type="file" name="foto_profil" id="foto_profil" accept="image/*" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div> -->

            <!-- Tombol Simpan -->
            <div class="mt-6 flex justify-end items-end">
                <button type="button" onclick="validateForm()"
                    class="focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l py-3 px-5 justify-end font-bold ms-80 rounded-lg text-base">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div id="modelConfirm" class="fixed inset-0 z-50 hidden w-full h-full px-4 overflow-y-auto bg-gray-900 bg-opacity-60">
    <div class="relative max-w-md mx-auto bg-white rounded-lg shadow-xl top-40 flex flex-col">
        <div class="flex justify-end p-2">
            <button onclick="closeModal('modelConfirm')" type="button"
                class="text-gray-400 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="p-6 text-center flex flex-col justify-between flex-grow">
            <h2 class="text-xl font-bold text-gray-900">Profile Anda Berhasil Diperbaharui</h2>
            <img src="../img/masyarakat/registrasi/popup-reset.png" alt="Success Icon" class="w-20 h-20 mx-auto mt-4">
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
