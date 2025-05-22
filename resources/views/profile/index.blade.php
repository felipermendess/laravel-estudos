<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome User!</title>
</head>
<body>
    <p>Hello User, how are you?</p>
    <p>subtext: {{ $greeting }}</p>

    @php
        foreach ($users as $user)
            echo "<p>{$user->name}</p>";
    @endphp
</body>
</html>
