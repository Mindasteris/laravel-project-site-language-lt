<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- BS Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    {{-- Tab Logo --}}
    <link rel="icon" href="/img/gaming_web.png">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    {{-- Local CSS --}}
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div id="app">
        @include('partials.navigation')

        <main class="container py-4">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>
</body>
</html>
