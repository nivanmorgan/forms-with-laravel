<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Seller Form') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!};

    </script>
</head>
<body class="bg-image">
    <div id="app" class="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="logo-container">
                <a class="navbar-brand" href="{{ url('/') }}" title="{{ config('app.name', 'Creative Market') }}" >
                </a>
            </div>
        </nav>
        <main class="py-5">
            @yield('content')
        </main>
    </div>
</body>
</html>
