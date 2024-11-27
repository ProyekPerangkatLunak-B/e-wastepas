{{-- sementara --}}
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <title>@yield('title', 'Register Mitra Kurir')</title>
</head>

<body class="overflow-x-hidden">

    {{-- Header --}}
    {{-- @include('mitra-kurir.registrasi.header-test', [
        'userName' => '',
        'userRole' => '',
        'profileImage' => '',
    ]) --}}
    @include('components.mitra-kurir.account-profile.navbar')

    {{-- Sidebar --}}
    @include('mitra-kurir.registrasi.account-profile.sidebar')

    {{-- Main Content --}}
    {{-- <div class=" pl-[22rem]">
        @yield('content')
    </div> --}}

    <!-- Ubah div content untuk responsivitas -->
    <div class="lg:pl-[22rem] transition-all duration-300">
        @yield('content')
    </div>

</body> 

</html>
