<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.layouts.front_templates.cssandmeta')
</head>
<body>
    @include('front.layouts.front_templates.header')
    @yield('front_content')
    @include('front.layouts.front_templates.footer')
</body>
</html>
