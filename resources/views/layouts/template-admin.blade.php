<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('admin/assets/img/brand/favicon.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">

    {{-- Font awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/argon.css?v=1.1.0') }}" type="text/css">

    {{-- Css Manual --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/css/master.css') }}">

    {{-- Taskbar Icon --}}
    <link rel="icon" type="image/png" href="{{ asset('icons/otaku-store.svg') }}" />

    {{-- Yield css optional --}}
    @yield('css')

    {{-- Yield title admin pages --}}
    @yield('title')
</head>

<body>
    {{-- Include side nav --}}
    @include('layouts.admin.side-nav')

    <!-- Main content -->
    <div class="main-content" id="panel">

        {{-- Include top nav --}}
        @include('layouts.admin.navbar-admin')

        {{-- Yield Content --}}
        @yield('content')

        {{-- Include footer admin --}}
        {{-- @include('layouts.admin.footer-admin') --}}

    </div>

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('admin/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>

    <!-- Optional JS -->
    <script src="{{ asset('admin/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>

    <!-- Argon JS -->
    <script src="{{ asset('admin/assets/js/argon.js?v=1.1.0') }}"></script>

    <!-- Demo JS - remove this in your project -->
    {{-- <script src="{{ asset('admin/assets/js/demo.min.js') }}"></script> --}}

    {{-- Yielf custom js --}}
    @yield('script')
</body>

</html>
