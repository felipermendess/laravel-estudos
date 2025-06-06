<div>
	@if ($type === "lista")
	    <h1 {{ $attributes }} >Lista de usuários</h1>
		<ul class="list-group">
			@foreach ($users as $user)
				<li class="list-group-item">{{ $user->id }} {{ $user->name }}</li>
			@endforeach
		</ul>
	@elseif($type === "card")
	    <h1 {{ $attributes }} >Card de usuários</h1>
        @foreach ($users as $user)
            <div class="card shadow mb-2 bg-{{ $cardClass }}">
                <div class="card-body">
                    {{ $isAdmin($user->name) }}
                    <p class="card-text">{{ $user->id }} {{ $user->name }} </p>
                </div>
            </div>
        @endforeach
	@endif
</div>
