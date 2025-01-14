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

    {{-- Link Load CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>E-WastePas</title>
</head>

<body>

    @include('partials.admin-header', [
        'userName' => auth()->user()->nama ?? 'No name',
        'userRole' => auth()->user()->peran->nama_peran ?? 'No role assigned',
    ])

    {{-- Sidebar --}}
    @include('partials.sidebar-admin')

    {{-- Main Content --}}
    <div class="pt-6 pl-[20rem]">
        @yield('content')
    </div>
</body>

</html>
