<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Link Fav Icon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    {{-- Link Font Google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400;600;800&display=swap" rel="stylesheet">

    {{-- Link Load CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>E-WastePas</title>
</head>

<body>

    {{-- Header --}}
    @include('partials.header', [
        'userName' => 'Beyonce Kumalasari', 
        'userRole' => 'Mitra Kurir', 
        'profileImage' => 'https://via.placeholder.com/40'
    ])

    {{-- Sidebar --}}
    @include('partials.sidebar-mitrakurir')

    {{-- Main Content --}}
    <div class="pt-6 pl-[20rem]">
        @yield('content')
    </div>    

</body>
</html>
