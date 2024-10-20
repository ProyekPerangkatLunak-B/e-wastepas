<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Link Fav Icon --}}
    <link rel="icon" href="{{ asset('#') }}" type="image/x-icon" />

    {{-- Link Font Google  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    {{-- Link Load CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])`

    {{-- Alphine Js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>E-Wastepas</title>
</head>

<body class="">

    {{-- Components --}}

    @yield('content')

</body>

</html>