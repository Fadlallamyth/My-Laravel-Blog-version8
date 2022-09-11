<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ URL::asset('images/1.JPG') }}" type="image/x-icon" />
    <link rel="stylesheet" href='{{ asset('css/font-awesome-4.7.0/css/font-awesome.css') }}'>
    <link rel="stylesheet" href='{{ asset('css/animate.min.css') }}'>
    <link rel="stylesheet" href='{{ asset('css/style.css') }}'>
</head>
<body>
    @include('layouts.templates.header')
    @yield('content')
    @include('layouts.templates.scripts')
    @include('layouts.templates.messages')
    @stack('scripts')
</body>

</html>
