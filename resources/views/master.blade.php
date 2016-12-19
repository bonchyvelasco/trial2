<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AniMall - @yield('title')</title>
    <link rel = "stylesheet" type = "text/css" href = "{{elixir('css/app.css')}}">
    <!-- Styles -->
    @yield('style')

    
    <!-- Scripts -->
    @yield('scripts')
</head>
<body>
    @yield('navbar')
    @yield('content')
    <!-- Scripts -->
</body>
</html>
