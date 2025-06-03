@extends('layouts.default')

@section('title', 'Perfil')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
@endpush

@prepend('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
@endprepend

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
