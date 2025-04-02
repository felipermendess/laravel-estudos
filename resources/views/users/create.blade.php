@extends('layouts.default')

@section('title', 'Cadastro de Usuário')

@section('content')
<h1>Cadastro de Usuário</h1>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    {{ $errors->any() }}
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div>
        {{ $error }}
    </div>
    @endforeach
    @endif
    <div>
        <label for="name">Nome</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" value="{{ old('email') }}">
    </div>
    <div>
        <label for="password">Senha</label>
        <input type="password" name="password">
    </div>
    <div>
        <button type="submit">Cadastrar</button>
    </div>
</form>
@endsection