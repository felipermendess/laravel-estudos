<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome User!</title>
</head>
<body>
    @include('heading', ['title' => 'Usuários'])

    <!-- foreach ($users as $user)
        include('user.show_users', ['user' => $user])
    endforeach -->

    @each('user.show_users', $users, 'user')

    @if (count($users) === 1)
        Tenho um usuário
    @elseif (count($users) > 1)
        Tenho mais de um usuário
    @else
        Não sei se tenho usuários
    @endif

    <br><br>

    @unless(!count($users))
        Tenho usuários
    @endunless

    <br><br>

    @isset($users)
        A variável existe
    @endisset

    <br><br>

    @empty($users)
        A variável está vazia
    @endempty

    @for($i = 0; $i <= 10; $i++)
        {{ $i }}
    @endfor

    <br><br>

    @foreach ($users as $user)
        {{ $user->email }} <br>
    @endforeach

    <br>

    @forelse ($users as $user)
        {{ $user->name }} <br>
    @empty
        Vazio
    @endforelse

    <br>

    @php
        $i = 0;
    @endphp
    @while($i <= 10)
        {{ $i++ }}
    @endwhile

    <br><br>

    @foreach ($users as $user)
        @if ($user->id === 1)
            @continue
        @endif

        {{ $user->remember_token }} <br>

        @if ($user->id === 5)
            @break
        @endif
    @endforeach

    <br><br>

    @switch (count($users))
        @case(0)
            Não tenho usuários
            @break
        @case(12)
            Tenho 12 usuários
            @break
        @default
            Não sei quantos usuários tenho
    @endswitch

    <br><br>

    @foreach ($users as $user)
        {{ dd($loop) }}
    @endforeach

    {{ dd($users) }}

    <!-- includes
        include -- Inclui um arquivo Blade
        includeIf -- Inclui um arquivo Blade se ele existir
        includeWhen -- Inclui um arquivo Blade quando uma condição for verdadeira
        includeUnless -- Inclui um arquivo Blade quando uma condição for falsa
        includeFirst -- Inclui o primeiro arquivo Blade que existir em uma lista de arquivos -->
</body>
</html>
