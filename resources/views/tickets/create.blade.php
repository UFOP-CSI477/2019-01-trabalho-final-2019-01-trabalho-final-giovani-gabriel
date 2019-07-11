@extends('principal')

@section('titulo', 'Inserir Sessão')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('ticket.index') }}">Ingressos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Criar Ingresso</li>
      </ol>
    </nav>
@endsection

@section('conteudo')
	<div class="container mb-4">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
        		<div class="card border-dark">
                <div class="card-header bg-dark text-center text-light">
                    Novo Ticket
                </div>

                    <form method="POST" action="{{ route('ticket.store') }}">
                		<div class="card-body">
                        @csrf
                        <div class="form-group row">
                            <label for="session_id" class="col-md-4 col-form-label text-md-right">Sessão</label>
                            <div class="col-md-6">
                                <select  class="form-control" name="session_id">
                                    @foreach ($sessions as $session)
                                        @foreach ($films as $film)
                                            @if($session->film_id == $film->id)
                                                <option value="{{$session->id}}" 
                                                    @if($film->id == $session->film_id)
                                                        selected
                                                    @endif
                                                >{{ $film->title }}: {{ $session->date }}</option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Usuário</label>
                            <div class="col-md-6">
                                <select class="form-control" name="user_id">
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}" selected >{{$user->id}}: {{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                <div class="card-footer bg-secondary border-dark text-right">
                    <button type="submit" class="btn btn-success">Inserir</button>           
                    </form>
            </div>
        </div>
            </div>
        </div>
	</div>

@endsection
				