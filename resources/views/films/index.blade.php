@extends('principal')

@section('titulo', 'Filmes')

@section('breadcrumb')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Filmes</li>
	</ol>
</nav>
@endsection

@section('conteudo')

<div class="p-3 mb-2 container">

	<table class="table table-striped table-dark table-hover table-sm table-responsive-sm">
		<thead class="thead-dark">
			<tr>
				<th>Título</th>
				<th>Tempo</th>
				<th>Classificação</th>
				<th>Genero</th>
				<th>Director</th>
				<th>Released</th>
				<th>Visualizar</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>

		@foreach($films as $film)
		<tr>
			<td> {{ $film->title }} </td>
			
			@if($film->time > 300)
				<td>---</td>
			@else
				<td>{{$film->time}}</td>
			@endif
			
			@if($film->rating==0)
				<td> livre </td>
			@elseif($film->rating>25)
				<td> --- </td>
			@else
				<td> +{{$film->rating}} </td>
			@endif
			
			@foreach ($genres as $genre)
				@if($film->genre == $genre->id)
					<td> {{ $genre->name }} </td>
				@endif
			@endforeach
			
			<td> {{ $film->director }} </td>
			
			@if($film->released==1)
				<td> Em Cartaz </td>
			@else
				<td> Em Breve </td>
			@endif
			
			<td><a class="text-white" href="{{route('films.show', $film->id )}}">Visualizar</a></td>
			<td><a class="text-white btn btn-info btn-sm" href="{{route('films.edit', $film->id )}}">Editar</a></td>
			<td><form id="logout-form" method="post" action="{{ route('films.destroy',$film->id) }}" onsubmit="return confirm('cofirma exclusão do exame?');">
				@csrf
				@method('DELETE')
				<input class="btn btn-danger btn-sm" type="submit" value="Excluir">
			</form>
		</td>
	</tr>
	@endforeach

</table>


	<p align="right"><a class="btn btn-dark btn-lg active" role="button" aria-pressed="true" href={{ route('films.create') }}>Inserir Filme</a></p>

</div>


@endsection