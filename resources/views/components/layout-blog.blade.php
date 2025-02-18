<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ $title ?? 'Manifest Digital Kreatif' }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css')}}">
    
    <link rel="stylesheet" href="{{ asset('css/blog/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/blog/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/blog/aos.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/blog/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/blog/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ asset('css/blog/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/blog-main-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/blog-second-style.css') }}">

  </head>
  
  <body>
    <x-preloader></x-preloader>    

    {{ $slot }}

    <!-- Main Template Javascript -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    
    <!-- Other Javascript -->
    <script src="{{ asset('js/mainblog.js') }}"></script>
    <script src="{{ asset('js/animation.js') }}"></script>
    
  </body>
</html>