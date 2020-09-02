<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('dashboardAssets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('dashboardAssets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboardAssets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboardAssets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="'{{ asset('dashboardAssets/vendor/charts/chartist-bundle/chartist.css') }}'">
    <link rel="stylesheet" href="{{ asset('dashboardAssets/vendor/charts/morris-bundle/morris.css') }}">

    <title>@yield('title', 'Traders Income Global')</title>
    <style>
        .form-control {
            box-shadow: none !important
        }

        /* .navbar-toggler {
            background-color: black;
            background-image: none;
            border: 1px solid transparent;
        }

        .navbar-toggler-icon {
            background-color: transparent;
        } */

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md text-white sticky-top" style="background-color: green; color:white">
        <a class="navbar-brand text-white" href="/" style="font-size: 20px">Traders Income Fund</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span aria-hidden="true" class="bg-white p-1 ml-3">Menu </span>

        </button>
        <div id="my-nav" class="collapse  navbar-collapse">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="{{ route('register') }}">Register <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled text-white" href="{{ route('login') }}" tabindex="-1"
                        aria-disabled="true">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <footer class=" p-3" style="background-color: green; color:white">
        <div class="bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-xs-12 text-lg-left text-center">
                        <p class="copyright-text">
                            &copy; Copyright <strong>Traders Income</strong>. All Rights Reserved
                        </p>
                    </div>

                    <div class="col-lg-6 col-xs-12 text-lg-right text-center">

                    </div>

                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('dashboardAssets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('dashboardAssets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('dashboardAssets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <!-- chart chartist js -->
    <script src="{{ asset('dashboardAssets/vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
    <!-- sparkline js -->
    <script src="{{ asset('dashboardAssets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <!-- morris js -->
    <script src="{{ asset('dashboardAssets/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
    <script src="{{ asset('dashboardAssets/vendor/charts/morris-bundle/morris.js') }}"></script>
    <!-- chart c3 js -->
    <script src="{{ asset('dashboardAssets/vendor/charts/c3charts/c3.min.js') }}"></script>
    <script src="{{ asset('dashboardAssets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>

</body>

</html>
