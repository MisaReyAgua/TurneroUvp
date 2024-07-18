<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Mi Aplicación')</title>
    @vite(['resources/css/app.css'])
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>
<body class="fondoLogin body-form">

    @yield('content')
    
    @vite(['resources/js/app.js'])
</body>
</html>