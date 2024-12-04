@extends('mitra-kurir.registrasi.account-profile.layout')
@section('title', 'Account')
@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center w-full py-8 mt-5">
    <div class="flex-1 bg-gray-100">
        <div class="container px-4 mx-auto py-8">
            <div style="background-color: white;" 
            class="rounded-[2rem] shadow-2xl w-full 
            sm:max-w-xl md:max-w-3xl lg:max-w-4xl
            p-4 sm:p-6 md:p-8 
            min-h-[500px] sm:min-h-[600px] md:min-h-[700px] 
            relative flex flex-col justify-center items-center
            mx-auto">

                <div class="text-left w-full mb-8">
                    <h2 class="text-2xl sm:text-2xl font-semibold text-gray-900 mb-2 sm:mb-3">
                        Account
                    </h2>
                </div>
                
                <div class="w-full max-w-3xl mx-auto">
                    <!-- Profile Photo Section dengan struktur yang sudah diperbaiki -->
                    <div class="flex flex-row items-start mb-8 gap-6">
                        <div class="relative group">
                            <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-200">
                                @if(isset($profile->photo))
                                    <img src="{{ asset('storage/' . $profile->photo) }}" alt="Profile Photo" class="w-full h-full object-cover" />
                                @else
                                    <img src="{{ asset('/img/mitra-kurir/icon-account.png') }}" alt="Default Profile Photo" class="w-full h-full object-cover" />
                                @endif
                            </div>
                            <input type="file" id="photo-upload" name="photo" accept="image/png, image/jpeg, image/jpg" class="hidden" onchange="handlePhotoUpload(this)" />
                        </div>
                        <div class="flex flex-col justify-center mt-4">
                            <p class="font-semibold mb-1 text-[#000000]">Profile Picture</p>
                            <p class="text-xs text-gray-600 mb-2">PNG, JPG, JPEG, max 15MB</p>
                            <label for="photo-upload" class="w-full sm:w-32 float-right
                                   bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] py-2 px-4 rounded-md cursor-pointer 
                                   hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out 
                                   transform hover:scale-105 text-sm sm:text-base inline-block">
                                Upload Foto
                            </label>
                        </div>
                    </div>
                </div>

                <form method="POST" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <div class="mb-6">
                                @include('components.mitra-kurir.auth.input', [
                                    'id' => 'email', 
                                    'name' => 'Email', 
                                    'label' => 'Email', 
                                    'type' => 'email', 
                                    'placeholder' => 'Masukkan Email'
                                ])
                            </div>
                            <div class="mb-6">
                                @include('components.mitra-kurir.auth.input', [
                                    'id' => 'phone', 
                                    'name' => 'NomorHP', 
                                    'label' => 'No. HP', 
                                    'type' => 'tel', 
                                    'placeholder' => 'Masukkan No.HP'
                                ])
                            </div>
                            <div class="mb-6">
                                @include('components.mitra-kurir.auth.input', [
                                    'id' => 'name', 
                                    'name' => 'nama', 
                                    'label' => 'Alamat', 
                                    'type' => 'text', 
                                    'placeholder' => 'Masukkan Alamat'
                                ])
                            </div>
                        </div>

                        <div>
                            <div class="mb-6">
                                @include('components.mitra-kurir.auth.input', [
                                    'id' => 'tanggallahhir', 
                                    'name' => 'tanggalLahir', 
                                    'label' => 'Tanggal Lahir', 
                                    'type' => 'text', 
                                    'placeholder' => 'Masukkan Tanggal Lahir'
                                ])
                            </div>
                            <div class="mb-6">
                                @include('components.mitra-kurir.auth.input', [
                                    'id' => 'name', 
                                    'name' => 'nama', 
                                    'label' => 'No. Rekening', 
                                    'type' => 'text', 
                                    'placeholder' => 'Masukkan No Rekening'
                                ])
                            </div>
                        </div>
                    </div>
                    <!-- Tombol Kirim -->
                    <div class="mt-6">
                        <button type="button"
                                onclick="showUpdateModal()"
                                class="w-full sm:w-32 float-right
                                       bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] py-2 px-4 rounded-md 
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

<!-- Pop-up Notification -->
<div name="account-update-modal" 
     style="display: none; background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; align-items: center; justify-content: center; z-index: 50;">
    <div style="background: white; padding: 20px; border-radius: 10px; width: 90%; max-width: 400px; text-align: center; position: relative;">
        <button onclick="closeUpdateModal()" 
                class="absolute top-3 right-3 hover:bg-gray-300 p-2 rounded-full transition-colors duration-300 ease-in-out transform hover:scale-105 z-50">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
            </svg>
        </button>
        <h2 class="text-xl font-bold mb-4">Data Berhasil Diubah</h2>
        <div class="flex justify-center mb-6">
            <img src="/img/mitra-kurir/icon-pop-up.png" alt="Success Icon" class="w-32 sm:w-40">
        </div>
        <div class="text-center mt-3 sm:mt-4">
            <p class="text-gray-600 text-lg sm:text-lg">Data profil Anda telah berhasil diperbarui.</p>
            <button onclick="closeUpdateModal()" 
                    class="mt-6 px-4 py-2 bg-gradient-to-r from-green-500 to-green-700 text-[#FFFFFF] rounded-md hover:bg-gradient-to-r hover:from-green-600 hover:to-green-800 transition-all duration-300 ease-in-out transform hover:scale-105">
                Kembali
            </button>
        </div>
    </div>
</div>

<script>
function handlePhotoUpload(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();
        
        reader.onload = function(e) {
            // Cari elemen img dalam parent terdekat yang memiliki class rounded-full
            const imgContainer = input.closest('.relative').querySelector('.rounded-full');
            const imgElement = imgContainer.querySelector('img');
            
            if (imgElement) {
                imgElement.src = e.target.result;
            } else {
                const newImg = document.createElement('img');
                newImg.src = e.target.result;
                newImg.classList.add('w-full', 'h-full', 'object-cover');
                imgContainer.appendChild(newImg);
            }
        };
        
        reader.readAsDataURL(file);
        
        // Persiapkan data untuk upload
        const formData = new FormData();
        formData.append('photo', file);
        
        // Uncomment dan sesuaikan bagian ini untuk menangani upload
        /*
        fetch('/upload-profile-photo', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Handle success
            } else {
                // Handle error
            }
        });
        */
    }
}

function showUpdateModal() {
    const modal = document.querySelector('[name="account-update-modal"]');
    modal.style.display = 'flex';
    console.log('Pop-up ditampilkan:', modal.style.display);
}

function closeUpdateModal() {
    const modal = document.querySelector('[name="account-update-modal"]');
    modal.style.display = 'none';
    console.log('Pop-up disembunyikan:', modal.style.display);
}

// Close modal ketika user klik di luar modal
document.querySelector('[name="account-update-modal"]').addEventListener('click', function(e) {
    if (e.target === this) {
        closeUpdateModal();
    }
});
</script>
@endsection