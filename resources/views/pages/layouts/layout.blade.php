<!doctype html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>

<style>
/* @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap'); */
@font-face{
    font-family: 'Montserrat';
    src: url('{{ asset('./fonts/Montserrat-VariableFont_wght.ttf') }}') format('truetype');
}
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
