@extends('principal')

@section('titulo', 'Inserir Filme')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('films.index') }}">Filmes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Adicionar Filme</li>
</ol>
</nav>
@endsection

@section('conteudo')

<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark">
                <div class="card-header bg-dark text-center text-light">
                    Novo filme
                </div>

                <form name="filmcreate" method="POST" action="{{ route('films.store') }}">
                  <div class="card-body">
                    @csrf

                    <div class="form-group row align-items-center">
                        <label for="title" class="col-sm-3 col-form-label">título</label>
                        <div class="col-sm-9">
                            <input id="title" type="text" class="form-control" name="title" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="time" class="col-sm-3 col-form-label">Duração</label>
                        <div class="col-sm-9">
                            <input id="time" type="number" class="form-control" name="time" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="rating" class="col-sm-3 col-form-label">Classificação</label>
                        <div class="col-sm-9">
                            <input id="rating" type="number" class="form-control" name="rating" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="genre" class="col-sm-3 col-form-label">Genero</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="genre">
                                @foreach($genres as $genre)
                                <option value="{{ $genre->id }}"> {{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="casting" class="col-sm-3 col-form-label">Elenco</label>
                        <div class="col-sm-9">
                            <input id="casting" type="textarea" class="form-control" name="casting" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="director" class="col-sm-3 col-form-label">Diretor</label>
                        <div class="col-sm-9">
                            <input id="director" type="text" class="form-control" name="director" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="synopsis" class="col-sm-3 col-form-label">Sinopse</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="synopsis" name="synopsis" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="released" class="col-sm-3 col-form-label">Lançado</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="released">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="photo" class="col-sm-3 col-form-label">Foto</label>
                        <div class="col-sm-9">
                            <input id="photo" type="text" class="form-control" name="photo" value="" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-secondary border-dark text-right">
                    <button type="submit" onclick="return filmValidator(document.filmcreate)" class="btn btn-success">Inserir</button>   
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo asset('js/validators.js')?>"></script>
@endsection
