<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- Menggunakan Vite untuk memuat file CSS dan JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tambahkan link FontAwesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMZdBzGLD3JGzplp3MOEkaMv4aVQLu1vYB6UBB" crossorigin="anonymous">

</head>
<body>

    <main>
        @yield('content')  <!-- Konten dari halaman lain akan ditampilkan di sini -->
    </main>

</body>
</html>
