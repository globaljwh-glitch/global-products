<!DOCTYPE html>
<html lang="en">

<head>
   <title>Global Products Corporation :: Homepage</title>
   <!-- <title>@yield('title', 'Website')</title> -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link
      href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet">
   <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
   <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
   <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
   <!-- <link rel="stylesheet" href="css/slick.css"> -->
   <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
   <!-- <link rel="stylesheet" href="css/slick-theme.css"> -->
   <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
   <!-- <link rel="stylesheet" href="css/core.css"> -->
   <link rel="stylesheet" href="{{ asset('css/core.css') }}">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>

<body>

   @include('frontend.partials.header')

   @yield('content')

   @include('frontend.partials.footer')

</body>

</html>