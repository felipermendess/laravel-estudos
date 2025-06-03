<div>
    <h1>Listagem de usuários</h1>
    @foreach ($users as $user)
        {{ $user->name }} <br>
    @endforeach
</div>
