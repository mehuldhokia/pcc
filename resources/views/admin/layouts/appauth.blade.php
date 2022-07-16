<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js" dir="ltr">

<head>
    <!-- Preload CSS / JS Files -->
    @include('admin.layouts.preload')
    <!-- Closed Preload CSS / JS Files -->

    <!-- Extra CSS / JS -->
    @yield('header')
    <!-- Closed Extra CSS / JS -->
</head>

<body>
    <div id="pcc-layout" class="theme-indigo">

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Body -->
            @yield('content')

            <!-- Modal Custom Settings-->
            {{-- @include('layouts.settings_model') --}}

        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('dist/assets/bundles/libscripts.bundle.js') }}"></script>

    <!-- Plugin Js -->
    <script src="{{ asset('dist/assets/bundles/apexcharts.bundle.js') }}"></script>
    <script src="{{ asset('dist/assets/bundles/dataTables.bundle.js') }}"></script>

    <!-- Jquery Page Js -->
    <script src="{{ asset('dist/assets/js/template.js') }}"></script>

    <script>
        $('#myDataTable')
            .addClass('nowrap')
            .dataTable({
                responsive: true,
                columnDefs: [{
                    targets: [-1, -3],
                    className: 'dt-body-right'
                }]
            });
    </script>

    <!-- Extra Bottom Scripts -->
    @yield('js')

</body>

</html>
