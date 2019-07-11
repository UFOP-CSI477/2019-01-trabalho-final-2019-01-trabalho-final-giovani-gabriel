@extends('principal')

@section('titulo', 'Usuários')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Usuario</li>
      </ol>
    </nav>
@endsection

@section('conteudo')
	
	<div class="p-3 mb-2 container mt-4">	
		<table class="table table-striped table-dark table-hover table-sm table-responsive-sm">
		<thead class="thead-dark">
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Cpf</th>
			<th>Tipo</th>
			<th>Visualizar</th>
		</tr>
		</thead>

		@foreach($users as $user)
			<tr>
				<td> {{ $user->name }} </td>
				<td> {{ $user->email }} </td>
				<td> {{ $user->cpf }} </td>
				<td> {{ $user->type }} </td>
				<td><a class="text-white" href="{{route('user.show', $user->id )}}">Visualizar</a></td>
			</tr>
		@endforeach

	</table>
		<p align="right"><a class="btn btn-dark btn-lg active" role="button" aria-pressed="true" href={{ route('user.create') }}>Inserir Usuario</a></p>


	</div>
	

@endsection