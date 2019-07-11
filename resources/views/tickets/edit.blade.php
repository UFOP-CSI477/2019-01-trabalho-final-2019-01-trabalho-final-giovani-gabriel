@extends('principal')

@section('titulo','Editar Sessão')

@section('breadcrumb')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('ticket.index') }}">Ingresso</a></li>
		<li class="breadcrumb-item"><a href="{{route('ticket.show', $ticket->id )}}">Ver Ingresso</a></li>
		<li class="breadcrumb-item active" aria-current="page">Editar Ingresso</li>
	</ol>
</nav>

@endsection

@section('conteudo')

<br>
<div class="container mb-4">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card border-dark">
				<div class="card-header bg-dark text-center text-light">
					Atualizar Ticket
				</div>
				<div class="card-body">
					<form method="post" action="{{ route('ticket.update', $ticket->id) }}">
						@csrf @method('PATCH')
						<div class="form-group row">
							<label for="session_id" class="col-md-4 col-form-label text-md-right">Sessão</label>
							<div class="col-md-6">
								<select  class="form-control" name="released">
		                            @foreach ($sessions as $session)
										@if($session->id == $ticket->session_id)
											@foreach ($films as $film)
												@if($film->id == $session->film_id)
													<option value="session->id" 
					                            		@if($film->id == $session->film_id)
					                            			selected
					                            		@endif
					                            	>{{ $film->title }}: {{ $session->date }}</option>	
												@endif
											@endforeach
										@endif
									@endforeach
	                            </select>
							</div>
						</div>   
						<div class="form-group row">
							<label for="user_id" class="col-md-4 col-form-label text-md-right">Usuário</label>
							<div class="col-md-6">
								<select class="form-control" name="released">
									@foreach ($users as $user)
										<option value="user->id" 
											@if($user->id == $ticket->user_id)
												selected
											@endif
										>{{$user->id}}: {{$user->name}}</option>	
									@endforeach
								</select>
							</div>
						</div> 
					</div>
					<div class="card-footer bg-secondary border-dark text-right">
						<div class="float-right">
							<a class="btn btn-success btn active" role="button" aria-pressed="true" href={{route('ticket.show', $ticket->id )}}>Voltar</a>
							<input class="btn btn-primary" type="submit" name="btnSalvar" value="Atualizar">
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


@endsection