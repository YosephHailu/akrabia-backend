<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>
    <!-- Favicon -->
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('dist/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('dist/css/all.min.css') }}">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/argon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" type="text/css">
</head>

<body>

    @yield('content')

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="https://use.fontawesome.com/9ba3ead60b.js"></script>
    <script src="{{ asset('dist/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/js.cookie.js') }}"></script>
    <script src="{{ asset('dist/jquery/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('dist/jquery/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('dist/js/Chart.min.js') }}"></script>
    <script src="{{ asset('dist/js/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    @stack('js')
    <script src="{{ asset('dist/js/argon.js') }}"></script>
</body>

</html>
