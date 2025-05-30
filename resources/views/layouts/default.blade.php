<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel app')</title>
</head>

<body>
    @section('sidebar')
        Conteúdo padrão
    @show
    <br>
    @yield('content', 'Conteúdo padrão do yield')
</body>

</html>
