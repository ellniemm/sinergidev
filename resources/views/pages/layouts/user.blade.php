<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logotefa1.png') }}">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap'); */
    @font-face{
        font-family: 'Montserrat';
        src: url('{{ asset('fonts/Montserrat-VariableFont_wght.ttf') }}') format('truetype');
    }
        body {
            font-family: 'Montserrat';
            
            color: #fff;
        }
         html{
            scroll-behavior: smooth;
         }
    </style>
<body>
    @include('pages.components.navbarUser')
    <main>
        @yield('content')
    </main>
    @include('pages.components.footer')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script> <!-- Flowbite -->
</body>
</html>