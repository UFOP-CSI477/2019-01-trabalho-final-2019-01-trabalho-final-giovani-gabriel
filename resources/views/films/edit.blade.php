@extends('principal')

@section('titulo','Editar Filme')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('films.index') }}">Filmes</a></li>
        <li class="breadcrumb-item"><a href="{{ route('films.show', $film->id )}}">{{$film->title}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
      </ol>
    </nav>
@endsection

@section('conteudo')
	
	<div class="container mb-4">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
				<div class="card border-dark">
	                <div class="card-header bg-dark text-center text-light">
	                    Atualizar Filme
	                </div>
	                <div class="card-body">
	                    <form name="filmedit" method="post" action="{{ route('films.update', $film->id) }}">
							@csrf @method('PATCH')
							<div class="form-group row align-items-center">
	                            <label for="title" class="col-sm-3 col-form-label">Título</label>
	                            <div class="col-sm-9">
	     							<input class="form-control" id ="title" type="text" name="title" value="{{$film->title}}">
	   	 						</div>
	                        </div>
	                       	<div class="form-group row align-items-center">
	                            <label for="time" class="col-sm-3 col-form-label">Duração</label>
	                            <div class="col-sm-9">
	     							<input class="form-control" id ="time" type="number" name="time" value="{{ $film->time }}">
	   	 						</div>
	                        </div>
							<div class="form-group row align-items-center">
	                            <label for="rating" class="col-sm-3 col-form-label">Classificação</label>
	                            <div class="col-sm-9">
	     							<input class="form-control" id ="rating" type="number" name="rating" value="{{ $film->rating }}">
	   	 						</div>
	                        </div>
							<div class="form-group row align-items-center">
	                            <label for="director" class="col-sm-3 col-form-label">Diretor</label>
	                            <div class="col-sm-9">
	     							<input class="form-control" id ="director" type="text" name="director" value="{{ $film->director }}">
	   	 						</div>
	                        </div>
	                        <div class="form-group row align-items-center">
	                            <label for="casting" class="col-sm-3 col-form-label">Elenco</label>
	                            <div class="col-sm-9">
	     							<input class="form-control" id ="casting" type="text" name="casting" value="{{ $film->casting }}">
	   	 						</div>
	                        </div>
	                        <div class="form-group row align-items-center">
	                            <label for="genre" class="col-sm-3 col-form-label">Genero</label>
	                            <div class="col-sm-9">
	     							<select class="form-control" name="genre">
		                            	@foreach ($genres as $genre)
		                            		<option value="{{$genre->id}}" 
		                            			@if($film->genre == $genre->id)
		                            				selected
		                            			@endif
		                            		>{{$genre->name}}</option>	
		                            	@endforeach
	                            	</select>
	   	 						</div>
	                        </div>
	                        <div class="form-group row align-items-center">
	                            <label for="synopsis" class="col-sm-3 col-form-label">Sinopse</label>
	                            <div class="col-sm-9">
	                            	<textarea class="form-control" id="synopsis" name="synopsis" rows="5">{{ $film->synopsis }}</textarea>
	   	 						</div>
	                        </div>
	                        <div class="form-group row align-items-center">
	                            <label for="released" class="col-sm-3 col-form-label">Released</label>
	                            <div class="col-sm-9">
	                            	<select  class="form-control" name="released">
	                            		@if($film->released==1)
	                            			<option value="1" selected >Em Cartaz</option>
								    		<option value="0">Em Breve</option>
								    	@else
								    		<option value="1" >Em Cartaz</option>
								    		<option value="0" selected>Em Breve</option>
								    	@endif
	                            	</select>
	   	 						</div>
	                        </div>
	                        <div class="form-group row align-items-center">
	                            <label for="photo" class="col-sm-3 col-form-label">Foto</label>
	                            <div class="col-sm-9">
	     							<input class="form-control" id ="photo" type="text" name="photo" value="{{ $film->photo }}">
	   	 						</div>
	                        </div>
	                </div>
	                <div class="card-footer bg-secondary border-dark text-right">
	                	<div class="float-right">
	                		<a class="btn btn-success btn active" role="button" aria-pressed="true" href={{route('films.show', $film->id )}}>Voltar</a>
							<input class="btn btn-primary" onclick="return filmValidator(document.filmedit)" type="submit" name="btnSalvar" value="Atualizar">
							</form>
						</div>
	                </div>
            	</div>
          	</div>
        </div>
	</div>

<script type="text/javascript" src="<?php echo asset('js/validators.js')?>"></script>
@endsection