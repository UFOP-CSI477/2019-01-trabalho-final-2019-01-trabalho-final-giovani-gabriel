@extends('principal')

@section('titulo', 'Sessão')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ingressos</li>
      </ol>
    </nav>
@endsection

@section('conteudo')
	
	<div class="p-3 mb-2 container mt-4">
		
		<table class="table table-striped table-dark table-hover table-sm table-responsive-sm">
		<thead class="thead-dark">
		<tr>
			<th>Preço</th>
			<th>Filme</th>
			<th>Dia</th>
			<th>Horário</th>
			<th>Nome do Usuário</th>
			<th>Id do Usuário</th>
			<th>Visualizar</th>
		</tr>
		</thead>

		@foreach($tickets as $ticket)
			<tr>
				@foreach ($sessions as $session)
					@if($session->id == $ticket->session_id)
						<td> {{ $session->price }} </td>
						@foreach ($films as $film)
							@if($film->id == $session->film_id)
								<td> {{ $film->title }}</td>  
								<td> {{ date('d/m/Y', strtotime($session->date)) }}</td>
								<td> {{ date('H:m', strtotime($session->date)) }}</td>
							@endif
						@endforeach
					@endif
				@endforeach
				@foreach ($users as $user)
					@if($user->id == $ticket->user_id )
						<td> {{ $user->name }} </td>
						<td> {{ $user->id }} </td>
					@endif
				@endforeach
				<td><a class="text-white" href="{{route('ticket.show', $ticket->id )}}">Visualizar</a></td>
			</tr>
		@endforeach

	</table>

		<p align="right"><a class="btn btn-dark btn-lg active" role="button" aria-pressed="true" href={{ route('ticket.create') }}>Inserir Ticket</a></p>

	</div>
	

@endsection