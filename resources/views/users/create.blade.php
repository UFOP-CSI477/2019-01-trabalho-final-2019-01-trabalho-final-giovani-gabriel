@extends('principal')

@section('titulo', 'Inserir Usuário')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Usuario</a></li>
        <li class="breadcrumb-item active" aria-current="page">Adicionar Usuario</li>
      </ol>
    </nav>
@endsection

@section('conteudo')
	<div class="container mb-4">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
        		<div class="card border-dark">
                <div class="card-header bg-dark text-center text-light">
                    Novo Usuário
                </div>

                    <form name="usercreate" method="POST" action="{{ route('user.store') }}">
                		<div class="card-body">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>
                            <div class="col-md-6">
                                <input id="cpf" type="number" class="form-control" name="cpf" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Tipo</label>
                            <div class="col-md-6">
                                <select  class="form-control" name="type">
                                    <option value="1">Administrador</option>
                                    <option value="2" >Usuario Comum</option> 
                                </select>
                            </div>
                        </div>
                </div>
                <div class="card-footer bg-secondary border-dark text-right">
                    <button type="submit" onclick="return userValidator(document.usercreate)" class="btn btn-success">Inserir</button>           
                    </form>
            </div>
        </div>
            </div>
        </div>
	</div>
    <script type="text/javascript" src="<?php echo asset('js/validators.js')?>"></script>
@endsection
				