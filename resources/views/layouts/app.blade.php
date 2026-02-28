<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Travel Management System')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor -->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Corporate Theme -->
    <link href="{{ asset('css/corporate.css') }}" rel="stylesheet">
</head>

<body id="page-top">

<div id="wrapper">

    @include('layouts.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            @include('layouts.topbar')

            <div class="container-fluid py-4">
                @yield('content')
            </div>

        </div>

        <footer class="footer-corporate">
            © {{ date('Y') }} PT Travel Umrah & Haji. All Rights Reserved.
        </footer>
    </div>

</div>

<script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

@stack('scripts')
</body>
</html>