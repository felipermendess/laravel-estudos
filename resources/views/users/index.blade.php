@extends('layouts.default')

@section('title', 'Listagem de usuários')

@section('content')
<h1 class="user-name">{{ $greeting }}</h1>
<img src="{{ Vite::asset('resources/images/ilustracao.png') }}" alt="">
@php
$name = 'felipe';
@endphp

@foreach ($users as $user)
<div>{{ $user->name }} - {{ $user->email }}</div>
@endforeach

{{ $name }}

{{ dd($users) }}
@endsection