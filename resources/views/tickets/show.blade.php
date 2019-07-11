@extends('principal')

@section('titulo','Exibir Sessão')

@section('breadcrumb')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('ticket.index') }}">Ingressos</a></li>
		<li class="breadcrumb-item active" aria-current="page">Exibir Ingresso</li>
	</ol>
</nav>
@endsection

@section('conteudo')

<br>
<div class="container  mb-4">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card border-dark">
				<div class="card-header bg-dark text-center text-light">
					<label>Ingresso</label>
				</div>
				<div class="card-body">
					<div class="list-group">
						<label class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary"> 
							@foreach ($sessions as $session)
							@if($session->id == $ticket->session_id )
							@foreach ($films as $film)
							@if($session->film_id == $film->id)
							{{ $film->title }} - {{ date('d/m/Y H:m', strtotime($session->date)) }}
							@endif
							@endforeach
							@endif
							@endforeach
						</label>
					</div>
					<div class="list-group">
						@foreach ($users as $user)
						@if($user->id == $ticket->user_id )
						<label class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">Usuário ({{ $user->id }}): {{ $user->name }}</label>

						@endif
						@endforeach
					</div>
				</div>
				<div class="card-footer bg-secondary border-dark text-right">
					<div class="d-flex justify-content-end">
						<a class="btn btn-success btn-sm mr-2" role="button" aria-pressed="true" href={{ route('ticket.index') }}>Voltar</a>
						<a class="btn btn-info btn-sm mr-2" role="button" aria-pressed="true" href={{ route('ticket.edit',$ticket->id) }}>Editar</a>

						<form id="logout-form" method="post" action="{{ route('ticket.destroy',$ticket->id) }}" onsubmit="return confirm('cofirma exclusão do exame?');">
							@csrf
							@method('DELETE')
							<input class="btn btn-danger btn-sm" type="submit" value="Excluir">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	@endsection