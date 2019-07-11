@extends('principal')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">SnackBar</li>
      </ol>
    </nav>
@endsection

@section('conteudo')
	<img class="img-fluid" src="https://www.cinesystem.com.br/bomboniere/images/destaque/bombo-toy4.png">
	<img class="img-fluid" src="https://www.cinesystem.com.br/bomboniere/images/bomboniere-cineshake.png">
@endsection
