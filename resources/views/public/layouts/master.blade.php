<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') &mdash; Kavlingan.id</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('flaticon/favicon.ico') }}" type="image/icon type">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('publik/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('publik/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('publik/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('publik/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('publik/css/owl.theme.default.mi') }}n.css">
    <link rel="stylesheet" href="{{ asset('publik/css/owl.theme.default.mi') }}n.css">

    <link rel="stylesheet" href="{{ asset('publik/css/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('publik/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('publik/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('publik/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('publik/css/style.css') }}">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        @include('public.layouts._includes._navbar')

        @yield('content')

        @include('public.layouts._includes._footer')

    </div> <!-- .site-wrap -->

    <script src="{{ asset('publik/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('publik/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('publik/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('publik/js/popper.min.js') }}"></script>
    <script src="{{ asset('publik/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('publik/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('publik/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('publik/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('publik/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('publik/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('publik/js/aos.js') }}"></script>
    <script src="{{ asset('publik/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('publik/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('publik/js/main.js') }}"></script>
    @stack('scripts')

</body>

</html>
