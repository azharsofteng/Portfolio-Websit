<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>OhiduzzamanIt | @yield('title')</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome.min.css') }}" />
        <!-- Icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('fonts/simple-line-icons.css') }}" />
        <!-- Slicknav -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slicknav.css') }}" />
        <!-- Nivo Lightbox -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/nivo-lightbox.css') }}" />
        <!-- Animate -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}" />
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
        <!-- Responsive Style -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
        <style>
            .hero-area-bg {
                background: url("{{ asset($about->cover_picture) }}") no-repeat;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <!-- Header Area wrapper Starts -->
        <header id="header-wrap">
            <!-- Navbar Start -->
            @include('partials.navbar')
            <!-- Navbar End -->

        </header>
        <!-- Header Area wrapper End -->

        @yield('user-content')

        <!-- Footer Section Start -->
            @include('partials.footer')
        <!-- Footer Section End -->

        <!-- Go to Top Link -->
        <a href="#" class="back-to-top">
            <i class="icon-arrow-up"></i>
        </a>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/jquery-min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.mixitup.js') }}"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <script src="{{ asset('js/wow.js') }}"></script>
        <script src="{{ asset('js/jquery.nav.js') }}"></script>
        <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('js/nivo-lightbox.js') }}"></script>
        <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
