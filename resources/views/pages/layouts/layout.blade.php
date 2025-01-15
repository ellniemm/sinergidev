<!doctype html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>

<style>
    body {
        font-family: 'Montserrat';
        background: #0D192F;
        color: #fff;
    }
</style>

<body>
    @yield('main')
</body>

</html>
