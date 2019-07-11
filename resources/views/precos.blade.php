@extends('principal')

@section('breadcrumb')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Preços</li>
	</ol>
</nav>
@endsection


@section('conteudo')
<div class="container">

	<div class="card-deck">
		<div class="card border-dark">
			<div class="card-header bg-dark text-center text-light">
				<h2>Segunda Feira</h2>
			</div>
			<div class="card-body">      
				<table class="table table-borderless">
					<tr>
						<td class="align-middle">
							<h4 align="center">2D</h4>
						</td>
						<td>						
							<div class="d-flex justify-content-center ">
								<small>Inteira</small> 
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 16,00</h4>
							</div>
						</td>
						<td >
							<div class="d-flex justify-content-center">
								<small>Meia</small>
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 8,00</h4>	
							</div>
						</td>
					</tr>
					<tr>
						<td class="align-middle">
							<h4 align="center">3D</h4>
						</td>
						<td>						
							<div class="d-flex justify-content-center ">
								<small>Inteira</small> 
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 21,00</h4>
							</div>
						</td>
						<td >
							<div class="d-flex justify-content-center">
								<small>Meia</small>
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 10,50</h4>	
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="card border-dark">
			<div class="card-header bg-dark text-center text-white">
				<h2>Terça Feira</h2>
			</div>
			<div class="card-body">      
				<table class="table table-borderless">
					<tr>
						<td class="align-middle">
							<h4 align="center">2D</h4>
						</td>
						<td>						
							<div class="d-flex justify-content-center ">
								<small>Inteira</small> 
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 16,00</h4>
							</div>
						</td>
						<td >
							<div class="d-flex justify-content-center">
								<small>Meia</small>
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 8,00</h4>	
							</div>
						</td>
					</tr>
					<tr>
						<td class="align-middle">
							<h4 align="center">3D</h4>
						</td>
						<td>						
							<div class="d-flex justify-content-center ">
								<small>Inteira</small> 
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 21,00</h4>
							</div>
						</td>
						<td >
							<div class="d-flex justify-content-center">
								<small>Meia</small>
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 10,50</h4>	
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="card-deck mt-4 mb-4">
		<div class="card border-dark">
			<div class="card-header bg-dark text-center text-light">
				<h2>Quarta Feira</h2>
			</div>
			<div class="card-body">      
				<table class="table table-borderless">
					<tr>
						<td class="align-middle">
							<h4 align="center">2D</h4>
						</td>
						<td>						
							<div class="d-flex justify-content-center ">
								<small>Inteira</small> 
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 16,00</h4>
							</div>
						</td>
						<td >
							<div class="d-flex justify-content-center">
								<small>Meia</small>
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 8,00</h4>	
							</div>
						</td>
					</tr>
					<tr>
						<td class="align-middle">
							<h4 align="center">3D</h4>
						</td>
						<td>						
							<div class="d-flex justify-content-center ">
								<small>Inteira</small> 
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 21,00</h4>
							</div>
						</td>
						<td >
							<div class="d-flex justify-content-center">
								<small>Meia</small>
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 10,50</h4>	
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="card border-dark">
			<div class="card-header bg-dark text-center text-white">
				<h2>Quinta a Domingo</h2>
			</div>
			<div class="card-body">      
				<table class="table table-borderless">
					<tr>
						<td class="align-middle">
							<h4 align="center">2D</h4>
						</td>
						<td>						
							<div class="d-flex justify-content-center ">
								<small>Inteira</small> 
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 19,00</h4>
							</div>
						</td>
						<td >
							<div class="d-flex justify-content-center">
								<small>Meia</small>
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 9,50</h4>	
							</div>
						</td>
					</tr>
					<tr>
						<td class="align-middle">
							<h4 align="center">3D</h4>
						</td>
						<td>						
							<div class="d-flex justify-content-center ">
								<small>Inteira</small> 
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 22,00</h4>
							</div>
						</td>
						<td >
							<div class="d-flex justify-content-center">
								<small>Meia</small>
							</div>
							<div class="d-flex justify-content-center">
								<h4>R$ 11,00</h4>	
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection