@extends('principal')

@section('titulo','Exibir Filme')

@section('breadcrumb')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		@if($film->released == 0)
			<li class="breadcrumb-item"><a href="{{ route('films.emBreve') }}">Em Breve</a></li>
		@else
			<li class="breadcrumb-item"><a href="{{ route('films.emCartaz') }}">Em Cartaz</a></li>
		@endif
		<li class="breadcrumb-item active" aria-current="page">{{$film->title}}</li>
	</ol>
</nav>
@endsection

@section('conteudo')

<div class="container">
	<div class="row justify-content-center">
		<div class="card text-white bg-secondary mb-4" style="max-width: 950px;">
			<div class="row no-gutters">
				<div class="col-md-4">
					<img src="{{$film->photo}}" class="card-img" alt="{{$film->title}}">
				</div>
				<div class="col-md-8 ">
					<div class="card-body">
						<h5 class="card-title">
							<div class="container">
								<div class="row">
									<div class="col-9 text-left">
										{{$film->title}}
									</div>
									<div class="col-3 text-right">
										@if($film->rating==0)
											<td> livre </td>
										@elseif($film->rating>25)
											<td> --- </td>
										@else
											<td> +{{$film->rating}} </td>
										@endif
									</div>
								</div>
							</div>
						</h5>
						<hr>
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<h6>Elenco: {{$film->casting}}</h6>
								</div>
							</div>
							<div class="row">
								<div class="col text-center">
									<h6>Direção: {{$film->director}}</h6>
								</div>
								<div class="col text-center">
									<h6>Gênero: 
										@foreach($genres as $genre)
											@if($genre->id == $film->genre)
												{{$genre->name}}
											@endif
										@endforeach
									</h6>
								</div>
								<div class="col text-center">
									@if($film->time > 300)
										<h6>Duração: - </h6>
									@else
										<h6>Duração: {{$film->time}}</h6>
									@endif
								</div>
							</div>
						</div>
						<hr>
						<p class="card-text">{{$film->synopsis}}</p>
						<hr>
						@if($film->released == 1)
							@php $count=0; @endphp
							@foreach($sessions as $session)
								@if($session->dimensions == 0 && $session->film_id == $film->id) 	{{-- 2d --}}
									@if($count == 0)
										<h4>2D</h4>
									@endif
									@if($count%3 == 0)
										<div class="row">
									@endif
											<div class="col">	
									{{ date('d/m/Y H:m', strtotime($session->date)) }}
											</div>
									@if($count%3 == 2)
										</div>
									@endif
									@php $count++ @endphp
								@endif
							@endforeach
							@if($count%3 == 1)
								<div class="col">&nbsp</div>
								<div class="col">&nbsp</div>
								</div>
							@endif
							@if($count%3 == 2)
								<div class="col">&nbsp</div>
								</div>
							@endif
						
							@php $count=0; @endphp
							@foreach($sessions as $session)
								@if($session->dimensions == 1 && $session->film_id == $film->id) 	{{-- 2d --}}
									@if($count == 0)
										<h4>3D</h4>
									@endif
									@if($count%3 == 0)
										<div class="row">
									@endif
											<div class="col">	
									{{ date('d/m/Y H:m', strtotime($session->date)) }}
											</div>
									@if($count%3 == 2)
										</div>
									@endif
									@php $count++ @endphp
								@endif
							@endforeach
							@if($count%3 == 1)
								<div class="col">&nbsp</div>
								<div class="col">&nbsp</div>
								</div>
							@endif
							@if($count%3 == 2)
								<div class="col">&nbsp</div>
								</div>
							@endif
						@endif
					</div>
				</div>
			</div>
			@if(Auth::check() && $film->released == 1)
				<div class="card-footer">
					<p align="right"><button onclick="exibeCompra()" class="btn btn-success">Comprar</button></p>
				</div>
			@endif
		</div>
	</div>

	<div class="row justify-content-center" name="divcompra" id="divcompra" style="display: none;">
		@if (Auth::check())
		<div class="container" style="max-width: 600px;">
			<div class="card text-white bg-secondary mb-3">
				<div class="row no-gutters">
					<div class="card-body">
						<h5 class="card-title" align="center"> Comprar ingresso</h5>
						<hr>
						<div class="container">
							<form name="comprar" method="POST" action="{{ route('ticket.store') }}">
								@csrf
								<div class="form-group row" style="display: none;">
									<label for="user_id" class="col-md-3 col-form-label">Usuário</label>
									<div class="col-md-9">
										<input id="user_id" type="number" class="form-control" name="user_id" value="{{Auth::user()->id}}" autofocus>
									</div>
								</div>
								<div class="form-group row">
									<label for="seat" class="col-md-3 col-form-label">Filmes</label>
									<div class="col-md-9">
										<label class="form-control disabled" disabled value="{{$film->id}}">{{$film->title}}</label>
									</div>
								</div>
								<div class="form-group row">
									<label for="seat" class="col-md-3 col-form-label">Sessão</label>
									<div class="col-md-9">
										<select class="form-control" name="session_id" id="session_id">
											<option class="form-control" selected value="-1">Selecione sua sessão</option>
											@foreach($sessions as $session)
												@if($session->film_id == $film->id)
												<option class="form-control" value="{{$session->id}}">
													@if( $session->dimensions == 1 )
														3D
													@else
														2D
													@endif
													- {{ date('d/m/Y - H:m', strtotime($session->date)) }}
												</option>
												@endif
											@endforeach
										</select>
									</div>
								</div>
								<p align="right"><button onclick="return validaCompra()" type="submit" class="btn btn-success">Comprar</button></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>

<script type="text/javascript" src="<?php echo asset('js/validators.js')?>"></script>
<script type="text/javascript">
	function exibeCompra(){
		divcompra.style.display = "block";
	}
</script>

@endsection