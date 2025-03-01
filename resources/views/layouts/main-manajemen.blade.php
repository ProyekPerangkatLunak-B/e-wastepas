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
    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Link Load CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>E-WastePas</title>
</head>
<style>
    .chart-container {
    position: relative;
}
.label-top, .label-right, .label-bottom, .label-left {
    font-size: 14px;
    color: #333;
}

</style>
<body>

    {{-- Header --}}
    @include('partials.header', [
        'userName' => 'Asep Sitohang',
        'userRole' => 'Manajemen',
        'profileImage' => 'https://via.placeholder.com/40',
    ])

    {{-- Sidebar --}}
    @include('partials.sidebar-manajemen')

    {{-- Main Content --}}
    <div class="pt-6 pl-[20rem]">
        @yield('content')
    </div>

</body>

</html>
