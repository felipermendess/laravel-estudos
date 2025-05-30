@extends('layouts.default')

@section('title', 'Perfil')

@section('sidebar')
    Meu conteúdo personalizado <br><br>
    @parent <br>
    @each('user.show_users', $users, 'user')
@endsection

@section('content')
	Contéudo do Yield
@endsection

<!--
    Diferença entre section e yield:
    - section: abre blocode código, permite adicionar conteúdo personalizado e chamar o padrão, blocos de código (sidebar, footer, etc.)
    - yield: não abre bloco de código, não aparece conteúdo padrão, conteúdos principais (texto da página, etc.)
-->
