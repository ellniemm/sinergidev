<!doctype html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logotefa1.png') }}">
    @livewireStyles
</head>

<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap'); */
    @font-face {
        font-family: 'Montserrat';
        src: url('{{ asset('fonts/Montserrat-VariableFont_wght.ttf') }}') format('truetype');
    }

    body {
        font-family: 'Montserrat';
        background: #0D192F;
        color: #fff;
    }
</style>

<body>
    @if(!in_array(request()->route()->getName(), ['login', 'register', 'verify.email','resend.email','forgot.password','reset.password']))
    @include('pages.components.navbarAdmin')
    @endif
    @yield('main')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @livewireScripts
</body>

</html>