<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/build/assets/app-VWK6wNPp.css">
    <link rel="stylesheet" href="/build/assets/app-CUeHaCoi.css">
    <script type="module" src="/build/assets/app-CMzFeA1K.js"></script>
    {{-- Link Fav Icon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    {{-- Icon fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
