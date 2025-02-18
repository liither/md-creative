<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <title>{{ $title ?? 'Manifest Digital Kreatif' }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/Logo.png') }}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css')}}"> <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-small.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
  </head>

<body>

  <x-preloader></x-preloader>

  <x-navbar></x-navbar>

  {{ $slot }}

  <!-- Scripts -->
  <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/owl-carousel.js') }}"></script>
  <script src="{{ asset('js/animation.js') }}"></script>
  <script src="{{ asset('js/imagesloaded.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>