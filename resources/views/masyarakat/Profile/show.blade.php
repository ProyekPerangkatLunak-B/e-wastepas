<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-semibold text-gray-900">Profile</h2>
                <p class="text-gray-500">Perbarui profil Anda</p>
            </div>
            <div class="flex items-center space-x-4">
                <img src="https://i.pinimg.com/originals/4d/7f/a0/4d7fa04f0b93e67d67b01558b8cb1c85.jpg" alt="User Profile" class="w-10 h-10 rounded-full">
                <span class="text-sm font-semibold text-gray-700">Beyonce Kumalasari</span>
            </div>
        </div>

        <!-- Form Profil -->
        <form method="POST" action="" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Foto Profil -->
            <div class="flex items-center space-x-4 mb-8">
                <div class="relative">
                    <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover border-2 border-gray-300">
                    <input type="file" name="profile_picture" accept="image/jpeg, image/png" id="profile_picture" class="absolute bottom-0 right-0 text-sm opacity-0 cursor-pointer">
                </div>
                <div class="text-sm text-gray-500">
                    <label for="profile_picture" class="block font-semibold">Profile Picture</label>
                    <p>JPG, JPEG, PNG, Under 15MB</p>
                </div>
            </div>

            <!-- Nama dan Tanggal Lahir -->
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label for="name" class="block text-gray-700 font-medium">Nama</label>
                    <input type="text" name="nama" id="nama" value="" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nama">
                </div>

                <div>
                    <label for="dob" class="block text-gray-700 font-medium">Tanggal Lahir</label>
                    <input type="date" name="dob" id="dob" value="" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Tanggal Lahir">
                </div>
            </div>

            <!-- No. Telepon dan No. Rekening -->
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label for="phone" class="block text-gray-700 font-medium">No. Telepon</label>
                    <input type="text" name="phone" id="phone" value="" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan No Telepon">
                </div>

                <div>
                    <label for="bank_account" class="block text-gray-700 font-medium">No. Rekening</label>
                    <input type="text" name="bank_account" id="bank_account" value="" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan No Rekening">
                </div>
            </div>

            <!-- Alamat -->
            <div>
                <label for="address" class="block text-gray-700 font-medium">Alamat</label>
                <input type="text" name="address" id="address" value="" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Alamat">
            </div>

            <!-- Tombol Simpan -->
            <div class="mt-6">
                <a href="{{ route('masyarakat.penjemputan.kategori') }}" 
                    class="block w-full text-center bg-green-500 text-white py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 hover:bg-green-600">
                    Simpan
                </a>
            </div>
            
            
            
        </form>
    </div>
</div>

</body>
</html>
