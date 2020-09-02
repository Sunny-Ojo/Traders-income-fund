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
    <link href="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <title>@yield('title', 'Traders Income Global')</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <!-- navbar -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-color fixed-top">
                <a class="navbar-brand text-white" href="{{ url('/') }}">TRADERS Income</a>
                <a class="navbar-brand float-right text-white text-small" href="#"> <i class="fa fa-sign-out-alt mr-2"
                        aria-hidden="true"></i>{{ Auth::user()->name }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                </div>
            </nav>
        </div>
        <!-- end navbar -->

        <!-- left sidebar -->
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
                                <a class="nav-link active" href="{{ route('admin') }}"><i
                                        class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('userActivations') }}"><i
                                        class="fa fa-fw fa-user"></i>Pending
                                    Activations @if ($userPaymentProof > 0)
                                        <span class="bg-danger p-1 text-white">{{ $userPaymentProof }}</span>
                                    @endif</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('userInvestments') }}"><i
                                        class="fa fa-fw fa-user"></i>Users First-
                                    Trades @if ($unconfirmed_investments > 0)
                                        <span class="bg-danger p-1 text-white">{{ $unconfirmed_investments }}</span>
                                    @endif
                                </a>
                            </li>



                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('userRecommitments') }}"><i
                                        class="fa fa-fw fa-user"></i>User
                                    Recommitments
                                    @if ($unconfirmedRecommitment > 0)
                                        <span class="bg-danger p-1 text-white">{{ $unconfirmedRecommitment }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('userWithdrawals') }}"><i
                                        class="fa fa-fw fa-rocket"></i>User Withdrawals @if ($userWithdrawals > 0)
                                        <span class="bg-danger p-1 text-white">{{ $userWithdrawals }}</span>
                                    @endif</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('users') }}"><i
                                        class="fa fa-fw fa-users"></i>Registered User
                                    <span class="bg-danger p-1 text-white">{{ $allUsers }}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-3" aria-controls="submenu-3"><i
                                        class="fas fa-fw fa-chart-pie"></i>Admin Bank Accounts</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('adminBankDetails') }}">Admin
                                                Accounts
                                            </a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" href="{{ route('addAdminBankDetails') }}">Add a Bank
                                                Account
                                            </a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('changePassword') }}">Change Password
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-4" aria-controls="submenu-4"><i
                                        class="fa fa-arrow-up"></i>Site
                                    Pages</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('about') }}">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('support') }}">Support</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-5" aria-controls="submenu-5"><i
                                        class="fas fa-fw fa-chart-pie"></i>Account</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('adminDownlines') }}"><i
                                        class="fab fa-fw fa-wpforms"></i>Downlines</a>
                            </li>
                            <li class="nav-divider">
                                Others
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="testimony.html"><i class="fas fa-fw fa-file"></i> Testimony
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" onclick="return confirm('You will be logged out!')"
                                    href="{{ route('logout') }}"><i class="fas fa-fw fa-file"></i>
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
                                <h2 class="pageheader-title">Traders Income Global funds <ins
                                        class="text-danger">Admin</ins> Dashboard
                                </h2>
                                <hr>
                                <p class="pageheader-text"></p>
                                @yield('ref_link')
                                @include('layouts.messages')

                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    {{-- <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                            <div class="alert-wrap2 shadow-inner wrap-alert-b">
                                <div class="alert-title">
                                    <h2></h2>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @yield('content')
                    <div class="footer bg-success text-white ">
                        {{-- <div class="container-fluid">
                            --}}
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    Copyright &copy; Traders Income. All Rights Reserved. </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="text-md-right footer-links d-none d-sm-block">
                                        <a href="{{ route('about') }}">About</a>
                                        <a href="{{ route('support') }}">Support</a>
                                        <a href="{{ route('contact') }}">Contact Us</a>

                                    </div>
                                </div>

                            </div>
                            {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <!-- jquery 3.3.1 -->
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

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/demo/datatables-demo.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('dashboard/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('dashboard/vendor/chart.js/Chart.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('dashboard/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('dashboard/js/demo/chart-pie-demo.js') }}"></script>
        <script src="{{ asset('dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>


</body>

</html>
