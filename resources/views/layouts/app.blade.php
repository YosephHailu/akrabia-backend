<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('dist/css/all.min.css') }}">

    <!-- Page plugins -->
    <link rel="stylesheet" href="{{ asset('dist/css/argon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" type="text/css">

    <style>
        .uppercase {
            text-transform: uppercase
        }


        .bg-bluewish {
            background-color: #283895 !important;
        }

        @media print {
            .print-only {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    @include('layouts.sidenav')

    @include('layouts.header')

    @include('layouts.alerts')
    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script src="https://use.fontawesome.com/9ba3ead60b.js"></script>
    <script src="{{ asset('dist/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/js.cookie.js') }}"></script>
    <script src="{{ asset('dist/jquery/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('dist/jquery/jquery-scrollLock.min.js') }}"></script>
    <script src="{{ asset('dist/js/Chart.min.js') }}"></script>
    <script src="{{ asset('dist/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('dist/js/argon.js') }}"></script>

    <script>
        function hideSideNav() {
            const sideNav = document.getElementById('side-nav')
            const header = document.getElementById('panel')
            if(sideNav.style.display == 'none') {
                header.classList.add('main-content')
                sideNav.style.display = 'block'
            } else {
                header.classList.remove('main-content')
                sideNav.style.display = 'none'
            }
        }
    </script>

    @stack('js')


</body>

</html>