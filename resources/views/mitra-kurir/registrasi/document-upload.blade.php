@extends('mitra-kurir.registrasi.layout')
@section('title', 'Document Upload')
@section('content')
<div class="flex items-center justify-center min-h-screen ">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <h1 class="text-2xl font-bold mb-8">Upload Berkas</h1>
        
        <form action="upload.php" method="POST" enctype="multipart/form-data" class="space-y-6">
            <!-- KTP Upload -->
            <div>
                <label class="block mb-2">
                    <span class="text-gray-700">Upload KTP<span class="text-red-500">*</span></span>
                </label>
                <div class="border-2 border-dashed border-gray-400 rounded-lg p-6 bg-[#EFEFEF]">
                    <div class="flex flex-col items-center justify-center space-y-2">
                        <input type="file" name="ktp" id="ktp" class="hidden" accept=".pdf,.jpg,.jpeg,.png" required>
                        <label for="ktp" class="cursor-pointer text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="text-sm text-gray-600">Drag & drop or click to choose file</p>
                        </label>
                        <p class="text-xs text-gray-500">Max file size: 10MB</p>
                    </div>
                </div>
            </div>

            <!-- KK Upload -->
            <div>
                <label class="block mb-2">
                    <span class="text-gray-700">Upload KK<span class="text-red-500">*</span></span>
                </label>
                <div class="border-2 border-dashed border-gray-400 rounded-lg p-6 bg-[#EFEFEF]">
                    <div class="flex flex-col items-center justify-center space-y-2">
                        <input type="file" name="kk" id="kk" class="hidden" accept=".pdf,.jpg,.jpeg,.png" required>
                        <label for="kk" class="cursor-pointer text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="text-sm text-gray-600">Drag & drop or click to choose file</p>
                        </label>
                        <p class="text-xs text-gray-500">Max file size: 10MB</p>
                    </div>
                </div>
            </div>

            <!-- NPWP Upload -->
            <div>
                <label class="block mb-2">
                    <span class="text-gray-700">Upload NPWP (Opsional)</span>
                </label>
                <div class="border-2 border-dashed border-gray-400 rounded-lg p-6 bg-[#EFEFEF]">
                    <div class="flex flex-col items-center justify-center space-y-2">
                        <input type="file" name="npwp" id="npwp" class="hidden" accept=".pdf,.jpg,.jpeg,.png">
                        <label for="npwp" class="cursor-pointer text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="text-sm text-gray-600">Drag & drop or click to choose file</p>
                        </label>
                        <p class="text-xs text-gray-500">Max file size: 10MB</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] rounded-md hover:bg-gradient-to-r hover:from-green-600 hover:to-green-800 transition-colors">
                    Kirim Dokumen
                </button>
            </div>
        </form>

        <!-- Success Modal -->
        <div id="successModal" style="display: none; background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; align-items: center; justify-content: center; z-index: 50;">
            <div style="background: white; padding: 20px; border-radius: 10px; width: 90%; max-width: 400px; text-align: center; position: relative;">

        <!-- Tombol Close -->
        <button onclick="closeModal()" 
        class="absolute top-3 right-3 hover:bg-gray-300 p-2 rounded-full transition-colors duration-300 ease-in-out transform hover:scale-105 z-50">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
        </button>
                <h2 class="text-lg font-bold mb-4">Selamat anda sudah berhasil mengunggah dokumen anda</h2>
                <div class="flex justify-center mb-4">
                    <img src="/img/mitra-kurir/icon-pop-up.png" alt="Success Icon" class="w-32 sm:w-40 !important">
                </div>
                <p class="text-gray-700 mt-4">Butuh Waktu 7x24 Jam Untuk Admin Memvalidasi</p>
                <button onclick="closeModal()" class="mt-6 px-4 py-2 bg-green-700 text-[#FFFFFF] rounded-md hover:bg-green-800 transition-all duration-300 ease-in-out transform hover:scale-105">Kembali ke Menu Utama</button> 
        </div>
    </div>
</div>

<script>
    const dropZones = document.querySelectorAll('.border-dashed');
    
    dropZones.forEach(zone => {
        zone.addEventListener('dragover', (e) => {
            e.preventDefault();
            zone.classList.add('border-blue-500');
        });

        zone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            zone.classList.remove('border-blue-500');
        });

        zone.addEventListener('drop', (e) => {
            e.preventDefault();
            zone.classList.remove('border-blue-500');
            const input = zone.querySelector('input[type="file"]');
            const files = e.dataTransfer.files;
            if (files.length) {
                input.files = files;
            }
        });
    });

    // Modal functionality
function openModal() {
    const modal = document.getElementById('successModal');
    modal.style.display = 'flex';
}

function closeModal() {
    const modal = document.getElementById('successModal');
    modal.style.display = 'none';
}

// Handle form submission
function handleFormSubmission(event) {
    event.preventDefault();
    openModal();
}

const form = document.querySelector('form');
form.addEventListener('submit', handleFormSubmission);

// Close modal when clicking outside of it
document.querySelector('#successModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

</script>
@endsection