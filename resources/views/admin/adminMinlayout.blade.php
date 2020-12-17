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
        @yield('content') 
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
