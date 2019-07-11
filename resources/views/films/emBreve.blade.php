@extends('principal')

@section('titulo', 'Em Breve')

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
		<li class="breadcrumb-item active" aria-current="page">Filme Em Breve</li>
	</ol>
</nav>

@endsection

@section('conteudo')
<div class="p-3 mb-2 container mt-4">
	@php
	$break = 0;
	@endphp
	{{-- <div class="card-deck"> --}}
		@foreach($films as $film)
		@if($break % 4 == 0)
		<div class="card-deck">
			@endif
			<div class="card text-white bg-secondary" >
				<img  src="{{$film->photo}}" class="card-img-top img-fluid" alt="{{$film->title}}">
				<div class="card-body">
					<p class="card-text">
						@if(strlen($film->synopsis) > 100)
						<p class="card-text">
							@php
							echo substr($film->synopsis,0,100) . "...";
							@endphp
						</p>
						@else
						<p class="card-text">{{$film->synopsis}}
						</p>
						@endif
						<p>
						</div>
						<div class="card-footer">
							<p class="card-text text-right"><u><small class="text-muted"><a class="text-white text" href="{{route('films.show', $film->id )}}">Ver Mais</a></small></u></p>
						</div>
					</div>
					@if($break % 4 == 3)
						</div>
						<br>
						@endif
				@php
				$break++;
				@endphp
				@endforeach

				@for ($i = 0; $i < 4-($break%4); $i++)
				<div class="card text-white bg-transparent border-0" ></div>
				@endfor
				
				@if($break % 4 != 3)
			</div>
			@endif
		</div>
	</div>
</div>


@endsection