<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? 'Manifest Digital Kreatif' }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="SoonLaunch">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/Logo.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-4.5.0.min.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/lineicons.css"> -->
    <link rel="stylesheet" href="{{ asset('css/csoon/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('css/csoon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animated.css')}}">
</head>
    
<body>
    <x-preloader></x-preloader>    

    {{ $slot }}
    
    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{ asset('js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap-4.5.0.min.js')}}"></script>
    <!-- <script src="assets/js/countdown.js"></script> -->
    <script src="{{ asset('js/wow.min.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>

    <script src="{{ asset('js/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/owl-carousel.js')}}"></script>
    <script src="{{ asset('js/custom.js')}}"></script>
</body>
</html>
