<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Link Fav Icon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    {{-- Link Font Google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400;600;800&display=swap" rel="stylesheet">
    
    {{-- Link Load CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-semibold text-gray-900">Profile</h2>
                <p class="text-gray-500">Lengkapi profil Anda</p>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Current profile picture -->
                <img src="" 
                     alt="User Profile" class="w-10 h-10 rounded-full">
                <span class="text-sm font-semibold text-gray-700"></span>
            </div>
        </div>

        <!-- Form Profil -->
        <form id="profileForm" method="POST" action="{{ route('masyarakat.profile.save') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf <!-- Token CSRF untuk keamanan -->

            <!-- Input untuk Nama -->
            <div>
                <label for="nama" class="block text-gray-700 font-medium">Nama</label>
                <input type="text" name="nama" id="nama" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nama" value="" required>
            </div>

            <!-- Input untuk Tanggal Lahir -->
            <div>
                <label for="tanggal_lahir" class="block text-gray-700 font-medium">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" value="" required>
            </div>

            <!-- Input untuk No. Telepon -->
            <div>
                <label for="nomor_telepon" class="block text-gray-700 font-medium">No. Telepon</label>
                <input type="text" name="nomor_telepon" id="nomor_telepon" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" value="" required>
            </div>

            <!-- Input untuk No. Rekening -->
            <div>
                <label for="no_rekening" class="block text-gray-700 font-medium">No. Rekening</label>
                <input type="text" name="no_rekening" id="no_rekening" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" value="" required>
            </div>

            <!-- Input untuk Alamat -->
            <div>
                <label for="alamat" class="block text-gray-700 font-medium">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" value="" required>
            </div>

            <!-- Input untuk Foto Profil -->
            <div>
                <label for="foto_profil" class="block text-gray-700 font-medium">Foto Profil</label>
                <input type="file" name="foto_profil" id="foto_profil" accept="image/*" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Tombol Simpan -->
            <div class="mt-6">
                <button type="button" onclick="validateForm()"
                    class="w-full bg-green-500 text-white py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 hover:bg-green-600">
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
            <h2 class="text-xl font-bold text-gray-900">Profil Berhasil Diperbarui</h2>
            <img src="../img/masyarakat/registrasi/popup-reset.png" alt="Success Icon" class="w-20 h-20 mx-auto mt-4">
            <p class="mt-4 text-gray-500">Sekarang Anda Menggunakan Profile yang baru saja diperbarui</p>
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

</body>
</html>