<!doctype html>
<html class="h-full bg-white">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Register Mitra Kurir')</title>
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  {{-- baru --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Script akan dijalankan setelah halaman dimuat sepenuhnya
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const eyeOpen = document.getElementById(`eye-open-${inputId}`);
            const eyeClosed = document.getElementById(`eye-closed-${inputId}`);

            if (input.type === 'password') {
                input.type = 'text';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            } else {
                input.type = 'password';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            }
        }

        // Make togglePassword available globally
        window.togglePassword = togglePassword;
    });
  </script>
</head>
<body class="h-full font-sans">
    @yield('content')
</body>
</html>

