<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hello {{ $user->name }}</h1>

    @if ($user->id === 1)
    <div>Sou admin</div>
    @else
    <div>Não sou admin</div>
    @endif

    {{ dd($user) }}
</body>

</html>