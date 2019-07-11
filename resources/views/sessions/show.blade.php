@extends('principal')

@section('titulo','Exibir Sessão')

@section('breadcrumb')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('session.index') }}">Sessões</a></li>
		<li class="breadcrumb-item active" aria-current="page">Exibir Sessão</li>
	</ol>
</nav>
@endsection

@section('conteudo')

<div class="container mb-4">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card border-dark">
				<div class="card-header bg-dark text-center text-light">
					<label>Sessão</label>
				</div>
				<div class="card-body">
					<div class="list-group">
						<label class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">Data:  {{ date('d/m/Y H:m', strtotime($session->date)) }}
						</label>
					</div>
					<div class="list-group">
						<label class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">Sala: {{ $session->room_id }} </label>
					</div>
					<div class="list-group">
						<label class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">Filme: 
							@foreach ($films as $film)
							@if($film->id == $session->film_id)
							{{ $film->title }} 
							@endif
							@endforeach
						</label>
					</div>
					<div class="list-group">
						<label class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">3D:
							@if( $session->dimensions == 1)
							<td> Sim </td>
							@else
							<td> Não </td>
							@endif
						</label>
					</div>
					<div class="list-group">
						<label class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">Preço: {{ $session->price }} </label>
					</div>
				</div>
				<div class="card-footer bg-secondary border-dark text-right">
					<div class="d-flex justify-content-end">
						<a class="btn btn-success btn-sm mr-2" role="button" aria-pressed="true" href={{ route('session.index') }}>Voltar</a>
						<a class="btn btn-info btn-sm mr-2" role="button" aria-pressed="true" href={{ route('session.edit',$session->id) }}>Editar</a>
						<form id="logout-form" method="post" action="{{ route('session.destroy',$session->id) }}" onsubmit="return confirm('cofirma exclusão do exame?');">
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