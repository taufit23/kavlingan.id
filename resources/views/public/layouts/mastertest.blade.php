<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') || Kavlingan.Id</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('flaticon/favicon.ico') }}" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('publik/penjual/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('publik/penjual/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('publik/penjual/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('publik/penjual/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('publik/penjual/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('publik/penjual/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('publik/penjual/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('publik/penjual/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('publik/penjual/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('publik/penjual/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('publik/penjual/css/style.css') }}">
</head>

<body>

    <div id="colorlib-page">

        {{-- sidebar --}}
        {{-- @include('public.penjual.layouts._includes._sidebar') --}}
        {{-- sidebar --}}
        <!-- END COLORLIB-ASIDE -->

        {{-- yield main --}}
        @yield('content')
        {{-- yield main --}}

    </div>

    <!-- END COLORLIB-PAGE -->

    {{-- @include('public.penjual.layouts._includes._loader') --}}

    {{-- script --}}
    {{-- @include('public.penjual.layouts._includes._script') --}}
    {{-- script --}}


    <script src="{{ asset('publik/penjual/js/jquery.min.js') }}"></script>
    <script src="{{ asset('publik/penjual/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('publik/penjual/js/popper.min.js') }}"></script>
    <script src="{{ asset('publik/penjual/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('publik/penjual/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('publik/penjual/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('publik/penjual/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('publik/penjual/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('publik/penjual/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('publik/penjual/js/aos.js') }}"></script>
    <script src="{{ asset('publik/penjual/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('publik/penjual/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="{{ asset('publik/penjual/js/google-map.js') }}"></script>
    <script src="{{ asset('publik/penjual/js/main.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')

</body>

</html>
