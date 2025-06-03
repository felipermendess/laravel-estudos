<div>
	@if ($type === "lista")
	    <h1>Lista de usuários</h1>
		<ul class="list-group">
			@foreach ($users as $user)
				<li class="list-group-item">{{ $user->id }} {{ $user->name }}</li>
			@endforeach
		</ul>
	@elseif($type === "card")
	    <h1>Card de usuários</h1>
        @foreach ($users as $user)
            <div class="card shadow mb-2">
                <div class="card-body">
                    <p class="card-text">{{ $user->id }} {{ $user->name }}</p>
                </div>
            </div>
        @endforeach
	@endif
</div>
