@extends('mitra-kurir.registrasi.account-profile.layout')
@section('title', 'Account')
@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center w-full py-8 mt-[5.5rem]">
    <div class="flex-1 bg-gray-100">
        <div class="container px-4 mx-auto py-8">
            <div style="background-color: white;" 
            class="rounded-[2rem] shadow-2xl w-full 
            sm:max-w-xl md:max-w-3xl lg:max-w-4xl
            p-4 sm:p-6 md:p-8 
            min-h-[500px] sm:min-h-[600px] md:min-h-[700px] 
            relative flex flex-col justify-center items-center
            mx-auto -mt-14">

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
                                onclick="showVerificationModal()"
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
</script>
@endsection