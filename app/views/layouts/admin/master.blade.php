<!DOCTYPE html>
<html lnag="en">
<head>
    <title>@yield('title') | MadRambles</title>
    <meta name="env" content="{{ App::environment() }}">
    <meta name="token" content="{{ Session::token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="{{ asset('assests/modernizr/modernizr.js')}}" type="text/javascript"></script>

    <link rel="stylesheet" href="{{ asset('components/css/admin.style.css')}}">
</head>
<body>
    <div class="container-fluid">
        <div class="row-fluid">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('assests/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('components/js/pretty.js')}}" type="text/javascript"></script>
</body>
</html>
