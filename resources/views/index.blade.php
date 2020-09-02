<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.vegasglobalfund.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Jul 2020 11:51:34 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Traders Income fund</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
    <meta property="og:title" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">


    <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.html') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.html') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/cssaf65.css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


</head>

<body>

    <!-- ======= Hero Section ======= -->
    <section class="hero">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <a class="hero-brand" href="/" title="Home"><img alt="Bell Logo"
                            src="{{ asset('assets/img/logo.png') }}" width="100%"></a>
                </div>
            </div>

            <div class="col-md-12">
                <h1>
                    #1 Investment platform
                </h1>

                <p class="tagline">
                    Traders Income Fund is a unique system that offers it's participant 50%-100% in 3 Days <br> with
                    100% Recommitment policy
                </p>
                <a class="btn btn-full scrollto" href="{{ route('register') }}">Register</a>
            </div>
        </div>

    </section><!-- End Hero -->

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <a href="/"><img src="{{ asset('assets/img/logo-nav.png') }}" alt=""></a>
                <!-- Uncomment below if you prefer to use a text image -->
                <!--<h1><a href="#hero">Bell</a></h1>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#features">Features</a></li>

                    </a>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-dark" href="/dashboard/home">
                                    {{ __('Dashboard') }}
                                </a>

                                {{-- <a class="dropdown-item text-dark"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                                                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a> --}}


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </nav>
            <!-- #nav-menu-container -->

            <nav class="nav social-nav pull-right d-none d-lg-inline">
                <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
            </nav>
        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section class="about" id="about">

            <div class="container text-center">
                <h2>
                    About Traders Income fund
                </h2>

                <p>
                    Traders Income Fund is a peer to peer investment platform that generate steady income in a unique
                    way of circulating the cash by funding other esteem investors to generate constant
                    profit.<br /><br />

                    Traders Income Fund is a unique system that offers it's participant 50%-100% in 3 Days with 100%
                    Recommitment policy
                </p>

                <div class="row stats-row">
                    <div class="stats-col text-center col-md-3 col-sm-6">
                        <div class="circle">
                            <span class="stats-no" data-toggle="counter-up">100</span> Satisfied Customers
                        </div>
                    </div>

                    <div class="stats-col text-center col-md-3 col-sm-6">
                        <div class="circle">
                            <span class="stats-no" data-toggle="counter-up">1,703</span> Users
                        </div>
                    </div>

                    <div class="stats-col text-center col-md-3 col-sm-6">
                        <div class="circle">
                            <span class="stats-no" data-toggle="counter-up">1,463</span> Investments
                        </div>
                    </div>

                    <div class="stats-col text-center col-md-3 col-sm-6">
                        <div class="circle">
                            <span class="stats-no" data-toggle="counter-up">1,463</span> Recommitment
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Call to Action Section ======= -->
        <section class="cta" style="background: #212529;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 text-lg-left text-center">
                        <h2>
                            Telegram support
                        </h2>

                        <p>
                            Join our telegram group for update/chats
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-12 text-lg-right text-center">
                        <a class="btn btn-ghost" href="https://t.me/joinchat/TIA951dhkd9nL8ucG4tJng.com">Join group</a>
                    </div>
                </div>
            </div>
        </section><!-- End Call to Action Section -->

        <!-- ======= Call to Action Section ======= -->
        <section class="cta" style="background: #212529;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 text-lg-left text-center">
                        <h2>
                            WhatsApp support
                        </h2>

                        <p>
                            Join our WhatsApp group for update/chats
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-12 text-lg-right text-center">
                        <a class="btn btn-ghost" href="https://chat.whatsapp.com/FFhqFAOFTVBEfoC0ok9i39">Join group</a>
                    </div>
                </div>
            </div>
        </section><!-- End Call to Action Section -->

        <!-- ======= Features Section ======= -->
        <section class="features" id="features">

            <div class="container">
                <h2 class="text-center">
                    Features
                </h2>

                <div class="row">
                    <div class="feature-col col-lg-4 col-xs-12">
                        <div class="card card-block text-center">
                            <div>
                                <div class="feature-icon" style="border: red">
                                    <span class="fa fa-rocket"></span>
                                </div>
                            </div>

                            <div>
                                <h3>
                                    Percentage
                                </h3>

                                <p>
                                    5O% to 100% return of investment in three (5) days
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="feature-col col-lg-4 col-xs-12">
                        <div class="card card-block text-center">
                            <div>
                                <div class="feature-icon">
                                    <span class="fa fa-rocket"></span>
                                </div>
                            </div>

                            <div>
                                <h3>
                                    Recommitment
                                </h3>

                                <p>
                                    100% recommtiment before withdrawal
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="feature-col col-lg-4 col-xs-12">
                        <div class="card card-block text-center">
                            <div>
                                <div class="feature-icon">
                                    <span class="fa fa-rocket"></span>
                                </div>
                            </div>

                            <div>
                                <h3>
                                    Bonus
                                </h3>

                                <p>
                                    5% REFERRAL BONUS ON FIRST PH AND 2.5 % CONTINUOUS REF BONUS
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- End Features Section -->

        <!-- ======= Call to Action Section ======= -->
        <section class="cta">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 text-lg-left text-center">
                        <h2>
                            Call to Action
                        </h2>

                        <p>
                            GET 15 DOWNLINES AND GET 50% ROI IN 5DAYS
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-12 text-lg-right text-center">
                        <a class="btn btn-ghost" href="{{ route('register') }}">Register</a>
                    </div>
                </div>
            </div>
        </section><!-- End Call to Action Section -->





        <!-- ======= Contact Section ======= -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="section-title">Contact Us</h2>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="info">

                            <div>
                                <i class="fa fa-envelope"></i>
                                <p>info@tradersincome.org</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-5 col-md-8">
                        <div class="form">
                            <form action="{{ route('sendContactMessage') }}" method="post" role="form">
                                <div class="form-group">
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                        id="name" placeholder="Your Name" />
                                    @error('name')
                                    <li class="text-danger">{{ $message }}</li>
                                    @enderror </div>
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" {{ old('email') }}
                                        placeholder="Your Email" />
                                    @error('email')
                                    <li class="text-danger">{{ $message }}</li>
                                    @enderror </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" value="{{ old('subject') }}"
                                        id="subject" placeholder="Subject" />
                                    @error('subject')
                                    <li class="text-danger">{{ $message }}</li>
                                    @enderror </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5"
                                        placeholder="Message">{{ old('message') }}</textarea>
                                    @error('message')
                                    <li class="text-danger">{{ $message }}</li>
                                    @enderror
                                </div>

                                <div class="text-center"><button class="btn btn-success" type="submit">Send
                                        Message</button></div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="site-footer">
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
    </footer><!-- End Footer -->

    <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/tether/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/lockfixed/jquery.lockfixed.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/superfish/superfish.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/hoverIntent/hoverIntent.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>



</html>
