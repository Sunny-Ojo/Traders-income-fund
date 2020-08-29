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
    <link rel="stylesheet"
        href="{{ asset('dashboardAssets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="'{{ asset('dashboardAssets/vendor/charts/c3charts/c3.css') }}'">
    <link rel="stylesheet" href="{{ asset('dashboardAssets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <title>@yield('title', 'Traders Income Global')</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-color fixed-top">
                <a class="navbar-brand text-white" href="{{ route('home') }}">TRADERS Income</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">

                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="{{ route('home') }}">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{ route('home') }}"><i
                                        class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('guider') }}"><i
                                        class="fa fa-fw fa-user"></i>Guider</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-2" aria-controls="submenu-2"><i
                                        class="fa fa-fw fa-rocket"></i>Investment</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">

                                        @if (!auth()->user()->times_invested > 0)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('investment.create') }}">Make an
                                                    Investment</a>
                                            </li>
                                        @endif
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('investments') }}">Investment History</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('withdrawals') }}">Withdrawal History</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-3" aria-controls="submenu-3"><i
                                        class="fas fa-fw fa-chart-pie"></i>Account</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('downlines') }}"><i
                                        class="fab fa-fw fa-wpforms"></i>Downlines</a>
                            </li>
                            <li class="nav-divider">
                                Others
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="testimony.html"><i class="fas fa-fw fa-file"></i> Testimony
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-fw fa-file"></i>
                                    Logout </a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Traders Income Global funds Dashboard </h2>
                                @yield('ref_link')
                                <p class="pageheader-text"></p>
                                @if (Session::has('  '))

                                @endif

                                @include('layouts.session_messages')

                                <hr>
                                @include('layouts.messages')
                                @if (auth()->user()->awaiting_approval === 'awaiting')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            {{-- <span aria-hidden="true">&times;</span>
                                            --}}
                                        </button>
                                        <strong>Your proof of payment is waiting for confirmation. Please kindly
                                            exercise patience or call <a href="tel://08121225275">08121225275</a> to
                                            make the confirmation faster</strong>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <div class="alert-wrap2 shadow-inner wrap-alert-b">
                                <div class="alert-title">
                                    <h2></h2>
                                </div>
                                <div style="text-align:center"> </div>
                            </div>
                        </div>
                    </div> <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    @yield('content')

                    <div class="footer bg-success text-white">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    Copyright © 2020 Vegas. All rights reserved. </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="text-md-right footer-links d-none d-sm-block">
                                        <a href="javascript: void(0);">About</a>
                                        <a href="javascript: void(0);">Support</a>
                                        <a href="javascript: void(0);">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <script src="{{ asset('dashboardAssets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
                <!-- bootstap bundle js -->
                <script src="{{ asset('dashboardAssets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
                <!-- slimscroll js -->
                <script src="{{ asset('dashboardAssets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
                <!-- main js -->
                <script src="{{ asset('dashboardAssets/libs/js/main-js.js') }}"></script>
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
                <script src="{{ asset('dashboardAssets/vendor/charts/c3charts/C3chartjs.js') }}"></script>
                <script src="{{ asset('dashboardAssets/libs/js/dashboard-ecommerce.js') }}"></script>

                {{-- <script type="text/javascript">
                    function showImage() {
                        if (this.files && this.files[0]) {
                            var obj = new FileReader();
                            obj.onload = function(data) {
                                var image = document.getElementById('image');
                                image.src = data.target.result;
                                image.style.display = 'block';
                            }

                            obj.readAsDataURL(this.files[0]);
                        }
                    };

                    function upload(id) {
                        $.post("execute/pop-modal.php", {
                            id: id
                        }, function(result) {
                            $("#pop-up").html(result);
                            $("#pop" + id).modal('show');
                        });
                    };


                    function checkWithdrawal(id) {
                        var text = '';
                        if (id == 3) {
                            text = 'Make a recommitment by clicking on recommitment button';
                        } else if (id == 2) {
                            text = 'Not due for withdrawal at the moment';
                        } else if (id == 1) {
                            text = 'No current investment at the moment';
                        } else if (id == 4) {
                            text = 'Transaction(s) not yet confirmed';
                        }

                        $("#wc").modal('show');
                        $("#show-content").html(text);
                    };

                </script> --}}
</body>

</html>