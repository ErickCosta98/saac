<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="src/js/scripts.js"></script> --}}
    {{-- <script src="{{ asset('src/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('src/js/all.min.js') }}"></script>
    <script src="{{ asset('src/js/scripts.js') }}"></script>



    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('src/css/styles.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="src/css/styles.css"> --}}
</head>
<body>
    @yield('contenido')
</body>
</html>
