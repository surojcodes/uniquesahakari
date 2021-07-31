<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            @yield('title')
        </title>

        <meta content="website for unique savings and credit cooperative ltd." name="descriptison">
        <meta content="savings, credit, bank, finance, economy, nepal" name="keywords">

        <link href="{{asset('img/favicon.png')}}" rel="icon">
        <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/icofont/icofont.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/animate.css/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/venobox/venobox.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('css/theme.css')}}">
    </head>
    <body>
        <!-- ======= Top Bar ======= -->
        <section id="topbar" class="d-none d-lg-block">
            <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-envelope"></i><span style=' color: #c48b31;'>uniquesacos@gmail.com</span>
                <i class="icofont-phone phone-icon"></i> <span style=' color: #c48b31;'>01-4350919</span>
            </div>
            <div class="social-links">
            <h5 style='color:#00733c;'>युनिक बचत तथा ऋण सहकारी संस्था लि</h5>
            </div>
            </div>
        </section>
        <!-- ======= Header ======= -->
        <header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center">
            <div class="logo mr-auto">
                <!-- <h1 class="text-light"><a href="/">Uni<span>Que</span></a></h1> -->
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="/"><img src="{{asset('img/logo.png')}}" alt="" class="img-fluid"></a>
            </div>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                @auth
                    <li><a href="/home">Dashboard</a></li>
                @else
                    <li><a href="/">Home</a></li>
                @endauth
                    <li class="drop-down"><a href="#">About</a>
                        <ul>
                            <li><a href="/about/introduction">Introduction</a></li>
                            <li><a href="/about/mvo">Mission,Vision and Objective</a></li>
                            <li><a href="/about/membership">Membership</a></li>
                            <li><a href="/about/principle">Principle of cooperative</a></li>
                            <li><a href="/about/bod">Board of Directors</a></li>
                        </ul>
                    </li>
                    <li class="drop-down"><a href="">Services</a>
                        <ul>
                            <li><a href="/services/loanScheme">Loan Services</a></li>
                            <li><a href="/services/savingScheme">Saving Scheme</a></li>
                            <li><a href="/services/mobileBanking">Mobile Banking</a></li>
                            <li><a href="/services/smsBanking">SMS Banking</a></li>
                            <li><a href="/services/remittance">Remittance</a></li>
                            <li><a href="/services/other">Other</a></li>
                        </ul>
                    </li>
                    <li><a href="/gallery">Gallery</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/notices">Notices</a></li>
                    <li><a href="/downloads">Downloads</a></li>
                    <li><a href="/online-account" class='animate__animated animate__pulse animate__infinite' style='color:#c48b31;'>Onine Account</a></li>
                    <li><a href="/online-loan" class='animate__animated animate__pulse animate__infinite' style=' color: #c48b31;'>Apply Loan</a></li>
                </ul>
            </nav>
            </div>
        </header>

        @yield('content') 
        <!-- ======= Footer ======= -->
        <footer id="footer">
        <a href="#" class="back-to-top" style="display: inline;"><i class="icofont-simple-up"></i></a>
            <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/about">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/notices">Notices</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/downloads">Downloads</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/contact">Contact</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/online-account">Open Online Account</a></li>

                        </ul>
                    </div>
                    <div class="col-md-3 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i><a href="/services/loanScheme">Loan Services</a></li>
                            <li><i class="bx bx-chevron-right"></i><a href="/services/savingScheme">Saving Scheme</a></li>
                            <li><i class="bx bx-chevron-right"></i><a href="/services/mobileBanking">Mobile Banking</a></li>
                            <li><i class="bx bx-chevron-right"></i><a href="/services/smsBanking">SMS Banking</a></li>
                            <li><i class="bx bx-chevron-right"></i><a href="/services/remittance">Remittance</a></li>
                            <li><i class="bx bx-chevron-right"></i><a href="/services/other">Other</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 text-left">
                        <iframe src="https://www.hamropatro.com/widgets/calender-small.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:200px; height:290px;" allowtransparency="true"></iframe>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-info">
                        <h3>Unique Savings and Credit Co-operative Ltd.</h3>
                        <p>
                            Samakhusi, Kathmandu <br>
                            NP 44600, Nepal<br><br>
                            <strong>Phone:</strong> 01-4389441<br>
                            <strong>Email:</strong> uniquesacos@gmail.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            </div>
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>UniqueSacos</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Made By
                    <a href="https://msuroj.com.np/">SurojCodes</a>
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/ -->
                    <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
                </div>
            </div>
        </footer>

        <!-- Vendor JS Files -->
        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('vendor/jquery.easing/jquery.easing.min.js')}}"></script>
        <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
        <script src="{{asset('vendor/jquery-sticky/jquery.sticky.js')}}"></script>
        <script src="{{asset('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('vendor/counterup/counterup.min.js')}}"></script>
        <script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('vendor/venobox/venobox.min.js')}}"></script>
        <script src="{{asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>

       <script src="{{asset('js/theme.js')}}"></script>
       @yield('scripts')

    </body>
</html>
