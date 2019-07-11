@extends('principal')

@section('titulo', 'Inserir Sessão')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('session.index') }}">Sessão</a></li>
    <li class="breadcrumb-item active" aria-current="page">Adicionar sessão</li>
</ol>
</nav>
@endsection

@section('conteudo')
<div class="container mb-4">
   <div class="row justify-content-center">
       <div class="col-md-6">
          <div class="card border-dark">
            <div class="card-header bg-dark text-center text-light">
                Nova Sessão
            </div>

            <form name="sesioncreate" method="POST" action="{{ route('session.store') }}">
              <div class="card-body">
                @csrf
                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label text-md-right">Data</label>
                    <div class="col-md-6">
                        <input id="date" type="datetime-local" class="form-control" name="date" value="" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="room" class="col-md-4 col-form-label text-md-right">Sala</label>
                    <div class="col-md-6">
                        <select  class="form-control" name="room_id">
                            @foreach ($rooms as $room)
                            <option value="{{$room->id}}" >{{$room->id}}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="film_id" class="col-md-4 col-form-label text-md-right">Filme</label>
                    <div class="col-md-6">
                        <select  class="form-control" name="film_id">
                            @foreach ($films as $film)
                            <option value="{{$film->id}}" selected >{{$film->title}}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">Preço</label>
                    <div class="col-md-6">
                        <input id="price" type="number" class="form-control" name="price" value="" required autofocus>
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="dimensions" class="col-md-4 col-form-label text-md-right">3D</label>
                    <div class="col-md-6">
                        <select class="form-control" name="dimensions">
                            <option value="1">3D</option>
                            <option value="0">2D</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-secondary border-dark text-right">
                <button type="submit" onclick="return sessionValidator(document.sesioncreate)" class="btn btn-success">Inserir</button>           
            </form>
        </div>
    </div>
</div>
</div>
</div>

<script type="text/javascript" src="<?php echo asset('js/validators.js')?>"></script>
@endsection
