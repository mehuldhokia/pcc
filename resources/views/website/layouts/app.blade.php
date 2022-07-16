<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Preload CSS / JS Files -->
    @include('website.layouts.preload')
    <!-- Closed Preload CSS / JS Files -->

    <!-- Extra CSS / JS -->
    @yield('header')
    <!-- Closed Extra CSS / JS -->
</head>

<body id="page-top" class="home">
    <!-- PAGE WRAP -->
    <div id="page-wrap">

        <!-- PRELOADER -->
        <div id="preloader">
            <div class="pre-icon">
                <div class="pre-item pre-item-1"></div>
                <div class="pre-item pre-item-2"></div>
                <div class="pre-item pre-item-3"></div>
                <div class="pre-item pre-item-4"></div>
            </div>
        </div>
        <!-- END / RELOADER -->

        <!-- HEADER -->
        @include('website.layouts.header')
        <!-- END / HEADER -->

        <!-- Body: Body -->
        @yield('content')

        <!-- FOOTER -->
        @include('website.layouts.footer')
        <!-- END / FOOTER -->

    </div>
    <!-- END / PAGE WRAP -->


    <!-- Load jQuery -->
    <script type="text/javascript" src="{{ asset('assets/styles/scripts/library/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/styles/scripts/scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/styles/scripts/mklb.js') }}"></script>

    <!-- Extra Bottom Scripts -->
    @yield('js')

</body>

</html>
