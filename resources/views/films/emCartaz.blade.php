@extends('principal')

@section('titulo', 'Em Cartaz')

@section('style')
<style>
	html, body {
		background-color: #949296; /* !important */
	}
</style>
@endsection

@section('breadcrumb')

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Filme Em Cartaz</li>
	</ol>
</nav>

@endsection

@section('conteudo')
<div class="p-3 mb-2 container mt-4">
	@php
	$break = 0;
	@endphp
	<div class="card-deck">
		@foreach($films as $film)
		@if($break % 2 == 0)
		<div class="card-deck">
			@endif
			<div class="card text-white bg-secondary mb-3" style="max-width: 540px;">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="{{$film->photo}}" class="card-img" alt="{{$film->title}}">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title">{{$film->title}}</h5>  {{-- 195 --}}
							@if(strlen($film->synopsis) > 195)
							<p class="card-text">
								@php
								echo substr($film->synopsis,0,193) . "...";
								@endphp
							</p>
							@else
							<p class="card-text">{{$film->synopsis}}</p>
							@endif
							<p class="card-text text-right"><u><small class="text-muted"><a class="text-white text" href="{{route('films.show', $film->id )}}">Ver Mais</a></small></p></u>
						</div>
					</div>
				</div>

			</div>
			@if($break % 2 == 1)
		</div>
		@endif
		@php
		$break++;
		@endphp
		@endforeach
		@if($break % 2 == 0)
	</div>
	@endif
</div>
</div>
@endsection