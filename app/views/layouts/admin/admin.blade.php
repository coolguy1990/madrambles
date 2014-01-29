<!DOCTYPE html>
<html lang="en">
<head>
    <title>MadRambles</title>
    <meta charset="utf-8">
    <meta name="env" content="{{ App::environment() }}">
    <meta name="token" content="{{ Session::token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Modernizr -->
    <script src="{{ asset('assests/modernizr/modernizr.js')}}"></script>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assests/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('components/css/admin.style.css')}}">
    <!-- Stylesheets -->
</head>
<body class="{{ $body_class }}">
    @if (isset( $nav ))
        {{ $nav }}
    @endif

    {{ $content }}

    <!-- Javascripts -->
    <script src="{{ asset('assests/jquery/jquery.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assests/bootstrap/dist/js/bootstrap.js')}}" type="text/javascript"></script>
    <!-- Javascripts -->
</body>
</html>
