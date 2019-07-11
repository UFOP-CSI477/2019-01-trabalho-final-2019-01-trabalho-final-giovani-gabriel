@extends('principal')

@section('conteudo')

<div class="container">
	<h1 class="text-white mt-4" align="center">Em Cartaz</h1>
</div>

<div class="p-3 mb-2 container mt-4">
	@php
	$break = 0;
	@endphp
	<div class="card-deck">
		@foreach($filmsEmCartaz as $film)
		@if($break == 4)
		@php
		break;
		@endphp
		@endif
		<div class="card text-white bg-secondary" >
			<img  src="{{$film->photo}}" class="card-img-top img-fluid" alt="{{$film->title}}">
			<div class="card-body">
				<h4 class="card-text" align="center">{{$film->title}}</h4>
			</div>
			<div class="card-footer">
				<p class="card-text text-right"><u><small class="text-muted"><a class="text-white text" href="{{route('films.show', $film->id )}}">Ver Mais</a></small></p></u>
			</div>
		</div>
		@php
		$break++;
		@endphp
		@endforeach
	</div>
</div>

<div class="container" align="center">
	<h1 class="text-white">Em Breve</h1>
</div>

<div class="p-3 mb-2 container mt-4">
	@php
	$break = 0;
	@endphp
	<div class="card-deck">
		@foreach($filmsEmBreve as $film)
		@if($break == 4)
		@php
		break;
		@endphp
		@endif
		<div class="card text-white bg-secondary" >
			<img  src="{{$film->photo}}" class="card-img-top img-fluid" alt="{{$film->title}}">
			<div class="card-body">
				<h4 class="card-text" align="center">{{$film->title}}</h4>
			</div>
			<div class="card-footer">
				<p class="card-text text-right"><u><small class="text-muted"><a class="text-white text" href="{{route('films.show', $film->id )}}">Ver Mais</a></small></p></u>
			</div>
		</div>
		@php
		$break++;
		@endphp
		@endforeach
	</div>
</div>
@endsection
