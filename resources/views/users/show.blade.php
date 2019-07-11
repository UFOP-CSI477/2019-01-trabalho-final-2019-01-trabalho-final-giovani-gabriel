@extends('principal')

@section('titulo','Exibir Usuário')

@section('breadcrumb')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('user.index') }}">Usuario</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
	</ol>
</nav>
@endsection


@section('conteudo')

<div class="container">
	<ul class="nav nav-tabs text-dark" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active text-dark" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Perfil</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-dark" id="profile-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="profile" aria-selected="false">Meus ingressos</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-dark" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Gerenciar conta</a>
		</li>
	</ul>
</div>

<div class="tab-content">
	<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
		<div class="container mt-3">
			<form>
				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
					<div class="col-md-6">
						<input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" disabled>
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
					<div class="col-md-6">
						<input id="email" type="text" class="form-control" name="email" value="{{$user->email}}" disabled>
					</div>
				</div>
				<div class="form-group row">
					<label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>
					<div class="col-md-6">
						<input id="cpf" type="number" class="form-control" name="cpf" value="{{$user->cpf}}" disabled>
					</div>
				</div>
			</form>    
		</div>
	</div>
	<div class="tab-pane" id="perfil" role="tabpanel" aria-labelledby="profile-tab">

		<div class="container mt-3">

			<table class="table table-striped table-dark table-hover table-sm table-responsive-sm">
				<thead class="thead-dark">
					<tr>
						<th>Identificador</th>
						<th>Nome do filme</th>
						<th>Data</th>
						<th>Sala</th>
						<th>Preço</th>
					</tr>
				</thead>

				@foreach($tickets as $ticket)
				@if($ticket->user_id == Auth::user()->id)
				<tr>
					<td> {{ $ticket->id }} </td>
					@foreach($sessions as $session)
					@if($session->id == $ticket->session_id)
					@foreach($films as $film)
					@if($session->film_id == $film->id)
					<td> {{ $film->title }} </td>
					@endif
					@endforeach
					<td> {{ date('d/m/Y H:m', strtotime($session->date)) }} </td>
					<td> {{ $session->room_id }} </td>
					<td> R$ {{ $session->price }} </td>
					@endif
					@endforeach
				</tr>
				@endif
				@endforeach
			</table>
		</div>
	</div>
	<div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
		<div class="container mt-3">
			<form name="usersshow" method="post" action="{{ route('user.update', $user->id) }}">
				@csrf @method('PATCH')
				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
					<div class="col-md-6">
						<input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
					<div class="col-md-6">
						<input id="email" type="text" class="form-control" name="email" value="{{$user->email}}" required autofocus>
					</div>
				</div>
				<div class="form-group row">
					<label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>
					<div class="col-md-6">
						<input id="cpf" type="number" class="form-control" name="cpf" value="{{$user->cpf}}" required autofocus>
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
					<div class="col-md-6">
						<input id="password" type="number" class="form-control" name="password" value="" autofocus>
					</div>
				</div>
				<div class="container row">
					<div class="col">
						<p align="right"><input class="btn btn-success" onclick="return userValidator(document.usersshow)" type="submit" name="btnSalvar" value="Atualizar"></p>
						</form>
					</div>
					@php
					$bool = true;
					foreach($tickets as $ticket)
						if($ticket->user_id == $user->id)
							$bool = false;
						@endphp
						<form id="logout-form" method="post" action="{{ route('user.destroy',$user->id) }}" onsubmit="return confirm('cofirma exclusão do usuário?');">
							@csrf @method('DELETE')
							<p align="right"><input class="btn btn-danger"type="submit" value="Excluir"
							@if(!$bool)
								disabled
							@endif ></p>
						</form>    
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="<?php echo asset('js/validators.js')?>"></script>
	<script>
		$(function () {
			$('#myTab li:last-child a').tab('show')
		})
	</script>

	@endsection