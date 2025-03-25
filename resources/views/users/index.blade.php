@extends('layouts.default')

@section('title', 'Listagem de usuários')

@section('content')
<h1>{{ $greeting }}</h1>

@php
$name = 'felipe';
@endphp

@foreach ($users as $user)
<div>{{ $user->name }} - {{ $user->email }}</div>
@endforeach

{{ $name }}

{{ dd($users) }}
@endsection