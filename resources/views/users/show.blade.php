@extends('layouts.default')

@section('title', 'Mostrando Usuário '.$user->name)

@section('content')
<h1>Hello {{ $user->name }}</h1>

@if ($user->id === 1)
<div>Sou admin</div>
@else
<div>Não sou admin</div>
@endif

{{ dd($user) }}
@endsection