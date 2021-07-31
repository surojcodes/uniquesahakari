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
        <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    </head>
    <body>
        <section id="topbar" class="d-none d-lg-block">
            <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-envelope"></i><span style=' color: #c48b31;'>uniquesacos@gmail.com</span>
                <i class="icofont-phone phone-icon"></i> <span style=' color: #c48b31;'>01-4350919</span>
            </div>
            <div class="social-links">
                @auth
                <a href="/home" style='color:#00733c;'><i class="icofont-home"></i> Admin Dashboard</a>
                @endauth
            </div>
            </div>
        </section>
        <!-- ======= Header ======= -->
        <header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center">
            @auth
            <div class="logo mr-auto">
                <a href="/"><img src="{{asset('img/logo.png')}}" alt="" class="img-fluid"></a>
            </div>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="/home">Account Application </a></li>
                    <!-- <li><a href="#">Loan Application </a></li> -->
                    <li><a href="{{route('sliders.index')}}">Slider Images</a></li>
                    <li><a href="{{route('notices.index')}}">Notices</a></li>
                    <li><a href="{{route('downloads.index')}}">Downloads</a></li>
                    <li class="drop-down"><a href="">Services</a>
                        <ul>
                            <li><a href="/admin/loanScheme">Loan Services</a></li>
                            <li><a href="/admin/savingScheme">Saving Scheme</a></li>
                            <li><a href="/admin/mobileBanking">Mobile Banking</a></li>
                            <li><a href="/admin/smsBanking">SMS Banking</a></li>
                            <li><a href="/admin/remittance">Remittance</a></li>
                            <li><a href="/admin/other">Other</a></li>
                        </ul>
                    </li>
                     <li class="drop-down"><a href="#">About</a>
                        <ul>
                            <li><a href="/admin/introduction">Introduction</a></li>
                            <li><a href="/admin/mvo">Mission,Vision and Objective</a></li>
                            <li><a href="/admin/membership">Membership</a></li>
                            <li><a href="/admin/principle">Principle of cooperative</a></li>
                            <li><a href="/admin/bod">Board of Directors</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="text-danger" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                              <i class="icofont-logout"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                        </form>
                    </li>
                </ul>
            @endauth
            </nav>
            </div>
        </header>

        @yield('content') 

        <!-- ======= Footer ======= -->
        <footer id="footer">
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
       <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
       <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/8gx4czf9vs2sbm6gmcaxcli899ibbk66h2nhomptwgtsffir/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

       @yield('scripts')
       <script>
        @if(Session::has('success'))
           toastr.success("{{Session::get('success')}}")
        @elseif(Session::has('error'))
           toastr.error("{{Session::get('error')}}")
        @elseif(Session::has('info'))
           toastr.info("{{Session::get('info')}}")
        @endif
        </script>
    </body>
</html>
