<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aula de Laravel')</title>
    @vite('resources/css/app.css')
</head>

<body>
    @yield('content')
    @vite('resources/js/app.js')
</body>

</html>