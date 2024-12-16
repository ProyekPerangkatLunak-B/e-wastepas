@extends('manajemen.registrasi.app')

@section('title', 'Register')

@section('content')
    <div class="flex min-h-screen">
        <!-- Bagian Form Registrasi -->
        <div class="flex items-center justify-center flex-1 p-8 bg-white">
            <div class="w-full max-w-lg">
                <div class="mb-6 text-center">
                    <img src="{{ asset('/images/logo.png') }}" alt="Logo E-WastePas" class="w-24 h-24 mx-auto mb-4">
                    <h1 class="text-2xl font-bold text-green-700">Selamat Datang di E-WastePas!</h1>
                    <p class="text-gray-600">Isi formulir di bawah ini untuk mendaftar.</p>
                </div>

                @if ($errors->any())
                    <div class="w-full px-4 py-3 mt-4 text-red-700 bg-red-100 border border-red-400 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('manajemen.registrasi.register') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Nama</label>
                        <input type="text" name="name" id="name" class="w-full p-2 mt-1 border rounded-xl"
                            placeholder="Masukkan Nama" required>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700">No. Telepon</label>
                        <input type="text" name="phone" id="phone" class="w-full p-2 mt-1 border rounded-xl"
                            placeholder="Masukkan No. Telepon" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="w-full p-2 mt-1 border rounded-xl"
                            placeholder="Masukkan Email" required>
                    </div>

                    <div class="relative mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full p-2 pr-10 mt-1 border rounded-xl" placeholder="Masukkan Password" required>
                        <span class="absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer" onclick="togglePasswordVisibility()">
                            <i id="eyeIcon" class="fa fa-eye"></i>
                        </span>
                            <!-- Teks tambahan di bawah kolom password -->
                        <p class="mt-1 text-sm text-gray-500">Minimal harus terdiri dari 8 karakter.</p>
                    </div>

                    <button type="submit"
                        class="w-full py-4 mt-8 text-base font-bold rounded-lg focus:outline-none text-slate-50 bg-gradient-to-r from-lime-500 to-green-600 hover:bg-gradient-to-l">
                        Daftar
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p>Sudah punya akun? <a href="{{ route('manajemen.registrasi.login') }}"
                            class="text-blue-500 hover:underline">Masuk</a></p>
                </div>
            </div>
        </div>

        <!-- Bagian Gambar -->
        <div class="flex-1 bg-center bg-cover" style="background-image: url('{{ asset('/images/tree-microchip.png') }}');">
        </div>
    </div>

    <!-- Tambahkan FontAwesome CDN jika belum ada di layout utama -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Script untuk toggle visibility password -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash'); // Icon mata tertutup
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye'); // Icon mata terbuka
            }
        }
    </script>
@endsection
