@extends('principal')

@section('titulo','Editar Sessão')

@section('breadcrumb')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('session.index') }}">Sessões</a></li>
		<li class="breadcrumb-item"><a href="{{route('session.show', $session->id )}}">Ver sessão</a></li>
		<li class="breadcrumb-item active" aria-current="page">Editar Sessão</li>
	</ol>
</nav>
@endsection

@section('conteudo')

<div class="container mb-4">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card border-dark">
				<div class="card-header bg-dark text-center text-light">
					Editar Sessão
				</div>
				<div class="card-body">
					<form name="sessionedit" method="post" action="{{ route('session.update', $session->id) }}">
						@csrf @method('PATCH')
						<div class="form-group row">
							<label for="date" class="col-md-4 col-form-label text-md-right">Data</label>
							<div class="col-md-6">
								<input class="form-control" id="date" type="datetime" class="form-control" name="date" value="{{$session->date}}" required autofocus>
							</div>
						</div>
						<div class="form-group row">
							<label for="room" class="col-md-4 col-form-label text-md-right">Sala</label>
							<div class="col-md-6">
								<select  class="form-control" name="room_id">
									@foreach ($rooms as $room)
									<option value="{{$room->id}}" 
										@if($room->id == $session->room_id)
										selected
										@endif
										>{{$room->id}}</option>	
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="film_id" class="col-md-4 col-form-label text-md-right">Filme</label>
								<div class="col-md-6">
									<select  class="form-control" name="film_id">
										@foreach ($films as $film)
										<option value="{{$film->id}}" 
											@if($film->id == $session->film_id)
											selected
											@endif
											>{{$film->title}}</option>	
											@endforeach
										</select>
									</div>
								</div> 
								<div class="form-group row">
									<label for="price" class="col-md-4 col-form-label text-md-right">Preço</label>
									<div class="col-md-6">
										<input class="form-control" id="price" type="number" class="form-control" name="price" value="{{$session->price
										}}" required autofocus>
									</div>
								</div>
								<div class="form-group row ">
									<label for="3d" class="col-md-4 col-form-label text-md-right">3D</label>
									<div class="col-md-6">
										<select  class="form-control" name="dimensions">
											@if( $session->dimensions == 1 )
											<option value="1" selected>3D</option>
											<option value="0">2D</option>
											@else
											<option value="1" >3D</option>
											<option value="0" selected>2D</option>
											@endif
										</select>
									</div>
								</div>  
							</div>
							<div class="card-footer bg-secondary border-dark text-right">
								<div class="float-right">
									<input class="btn btn-primary" onclick="return sessionValidator(document.sessionedit)" type="submit" name="btnSalvar" value="Atualizar">

									<a class="btn btn-success btn active" role="button" aria-pressed="true" href={{route('session.show', $session->id )}}>Voltar</a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="<?php echo asset('js/validators.js')?>"></script>
		@endsection