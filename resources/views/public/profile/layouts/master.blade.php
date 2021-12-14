<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>@yield('title')</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="{{ asset('publik/profil/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Light Gallery Plugin Css -->
    <link rel="stylesheet" href="{{ asset('publik/profil/assets/plugins/light-gallery/css/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ asset('publik/profil/assets/plugins/fullcalendar/fullcalendar.min.css') }}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('publik/profil/assets/css/style.min.css') }}">
    <!-- Bootstrap Select Css -->
    <link rel="stylesheet"
        href="{{ asset('publik/profil/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
</head>

<body class="theme-blush">
    @yield('content')
    <!-- Jquery Core Js -->
    <script src="{{ asset('publik/profil/assets/bundles/libscripts.bundle.js') }}"></script>
    <!-- Lib Scripts Plugin Js -->
    <script src="{{ asset('publik/profil/assets/bundles/vendorscripts.bundle.js') }}"></script>
    <!-- Lib Scripts Plugin Js -->

    <script src="{{ asset('publik/profil/assets/plugins/light-gallery/js/lightgallery-all.min.js') }}"></script>
    <!-- Light Gallery Plugin Js -->
    <script src="{{ asset('publik/profil/assets/bundles/fullcalendarscripts.bundle.js') }}"></script>
    <!--/ calender javascripts -->
    <!-- Custom Js -->
    <script src="{{ asset('publik/profil/assets/js/pages/medias/image-gallery.js') }}"></script>
    <script src="{{ asset('publik/profil/assets/js/pages/calendar/calendar.js') }}"></script>

    <script src="{{ asset('publik/profil/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('publik/profil/assets/js/pages/forms/advanced-form-elements.js') }}"></script>

    <script src="{{ asset('publik/profil/assets/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
    <!-- Bootstrap Notify Plugin Js -->

    <script src="{{ asset('publik/profil/assets/bundles/mainscripts.bundle.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('publik/profil/assets/js/pages/ui/notifications.js') }}"></script>
    <!-- Custom Js -->
</body>

</html>
