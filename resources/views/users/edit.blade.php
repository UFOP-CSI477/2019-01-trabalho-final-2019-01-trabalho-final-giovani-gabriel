@extends('principal')

@section('titulo','Editar Usuário')

@section('breadcrumb')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('user.index') }}">Usuario</a></li>
		<li class="breadcrumb-item active" aria-current="page">Editar Usuario</li>
	</ol>
</nav>
@endsection

@section('conteudo')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card border-dark">
				<div class="card-header bg-dark text-center text-light">
					Editar Usuário
				</div>
				<div class="card-body">
					<form name="useredit" method="post" action="{{ route('user.update', $user->id) }}">
						@csrf @method('PATCH')	
						<div class="form-group row align-items-center">
							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
								<div class="col-md-6">
									<input class="form-control" id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
								<div class="col-md-6">
									<input class="form-control" id="email" type="text" class="form-control" name="email" value="{{$user->email}}" required autofocus>
								</div>
							</div>
							<div class="form-group row">
								<label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>
								<div class="col-md-6">
									<input class="form-control" id="cpf" type="number" class="form-control" name="cpf" value="{{$user->cpf}}" required autofocus>
								</div>
							</div>   
							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
								<div class="col-md-6">
									<input class="form-control" id="password" type="number" class="form-control" name="password" value="" autofocus>
								</div>
							</div> 
							<div class="form-group row">
								<label for="type" class="col-md-4 col-form-label text-md-right">Tipo</label>
								<div class="col-md-6">
									<input class="form-control" id="type" type="number" class="form-control" name="type" value="{{$user->type}}" required autofocus>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer bg-secondary border-dark text-right">
						<div class="float-right">
							<a class="btn btn-success btn active" role="button" aria-pressed="true" href={{route('user.show', $user->id )}}>Voltar</a>
							<input class="btn btn-primary" onclick="return userValidator(document.useredit)" type="submit" name="btnSalvar" value="Atualizar">
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo asset('js/validators.js')?>"></script>

@endsection