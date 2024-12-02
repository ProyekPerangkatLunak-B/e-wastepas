@extends('mitra-kurir.registrasi.account-profile.layout')
@section('title', 'Profile')
@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center w-full py-8 mt-[5.5rem]">
    <div class="flex-1 bg-gray-100">
        {{-- Container utama untuk profil --}}
        <div class="container px-4 mx-auto py-8">
            <div style="background-color: white;" 
            class="rounded-[2rem] shadow-2xl w-full 
            sm:max-w-xl md:max-w-3xl lg:max-w-4xl
            p-4 sm:p-6 md:p-8 
            min-h-[500px] sm:min-h-[600px] md:min-h-[700px] 
            relative flex flex-col justify-center items-center
            mx-auto -mt-14">

                {{-- Bagian judul profil --}}
                <div class="text-left w-full mb-8">
                    <h2 class="text-2xl sm:text-2xl font-semibold text-gray-900 mb-2 sm:mb-3">
                        Profile
                    </h2>
                </div>
                
                {{-- Bagian Foto Profil --}}
                <div class="w-full max-w-md mx-auto mb-8">
                    <div class="flex flex-col items-center">
                        {{-- Pratinjau Gambar Profil --}}
                        <div class="relative group">
                            <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-200 mb-4">
                                @if(isset($profile->photo))
                                    <img src="{{ asset('storage/' . $profile->photo) }}" 
                                         alt="Profile Photo"
                                         class="w-full h-full object-cover" />
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <img src="{{ asset('/img/mitra-kurir/icon-account.png') }}" 
                                             alt="Default Profile Photo"
                                             class="w-full h-full object-cover" />                                    
                                    </div>
                                @endif
                            </div>
                            
                            
                            <!-- Upload Button Overlay -->
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <label for="photo-upload" 
                                       class="absolute bottom-0 w-full h-1/3 bg-black bg-opacity-50 flex items-center justify-center cursor-pointer">
                                       <img src="{{ asset('/img/mitra-kurir/icon-camera.png') }}" 
                                       alt="Camera Icon"
                                       class="w-6 h-6" />                                
                                </label>
                            </div>
                            
                            <!-- Hidden File Input -->
                            <input type="file" 
                                   id="photo-upload" 
                                   name="photo" 
                                   accept="image/*"
                                   class="hidden"
                                   onchange="handlePhotoUpload(this)" />
                        </div>

                        <div>
                            <p class="text-sm sm:text-xl font-semibold text-gray-900 mb-1 sm:mb-3">Nama</p>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-md mx-auto">
                    <?php if (isset($error)): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 max-w-md mx-auto text-sm">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($success)): ?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 max-w-md mx-auto text-sm">
                            <?php echo $success; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" class="max-w-md w-full mx-auto px-4" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            @include('components.mitra-kurir.auth.input', [
                                'id' => 'email', 
                                'name' => 'Email', 
                                'label' => 'Email', 
                                'type' => 'email', 
                                'placeholder' => 'Masukkan Email'
                            ])
                        </div>
                        <div class="mb-2">
                            @include('components.mitra-kurir.auth.input', [
                                'id' => 'phone', 
                                'name' => 'NomorHP', 
                                'label' => 'No. Telepon', 
                                'type' => 'tel', 
                                'placeholder' => 'Masukkan No.Telepon'
                            ])
                        </div>
                        <div class="mb-2">
                            @include('components.mitra-kurir.auth.input', [
                                'id' => 'name', 
                                'name' => 'nama', 
                                'label' => 'Alamat', 
                                'type' => 'text', 
                                'placeholder' => 'Masukkan Alamat'
                            ])
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
                const imgPreview = input.parentElement.querySelector('img') || 
                                 input.parentElement.querySelector('.flex');
                
                if (imgPreview.tagName === 'IMG') {
                    imgPreview.src = e.target.result;
                } else {
                    // Create new image if doesn't exist
                    const newImg = document.createElement('img');
                    newImg.src = e.target.result;
                    newImg.classList.add('w-full', 'h-full', 'object-cover');
                    imgPreview.parentElement.replaceChild(newImg, imgPreview);
                }
            };
            
            reader.readAsDataURL(file);
            
            // Here you might want to trigger the form submission or handle the upload
            // Example:
            const formData = new FormData();
            formData.append('photo', file);
            
            // Uncomment and modify this section to handle the upload
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