@extends('principal')

@section('titulo', 'Sessão')

@section('breadcrumb')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Sessões</li>
	</ol>
</nav>
@endsection

@section('conteudo')

<div class="p-3 mb-4 container mt-4">

	<table class="table table-striped table-dark table-hover table-sm table-responsive-sm">
		<thead class="thead-dark">
			<tr>
				<th>Data</th>
				<th>Sala</th>
				<th>Filme</th>
				<th>3D</th>
				<th>Preço</th>
				<th>Visualizar</th>
			</tr>
		</thead>

		@foreach($sessions as $session)
		<tr>
			<td> {{ date('d/m/Y H:m', strtotime($session->date)) }}</td>
			<td> {{ $session->room_id }} </td>
			@foreach ($films as $film)
			@if($film->id == $session->film_id)
			<td> {{ $film->title }} </td>
			@endif
			@endforeach
			@if( $session->dimensions == 1)

			<td> 3D </td>
			@else
			<td> 2D </td>
			@endif
			<td> {{ $session->price }} </td>
			<td><a class="text-white" href="{{route('session.show', $session->id )}}">Visualizar</a></td>
		</tr>
		@endforeach
	</table>
		
	<p align="right"><a class="btn btn-dark btn-lg active" role="button" aria-pressed="true" href={{ route('session.create') }}>Inserir Sessão</a></p>
		
</div>

@endsection