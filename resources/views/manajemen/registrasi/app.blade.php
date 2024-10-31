<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- Menggunakan Vite untuk memuat file CSS dan JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <main>
        @yield('content')  <!-- Konten dari halaman lain akan ditampilkan di sini -->
    </main>

</body>
</html>
