<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo', 'Cinema')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <style>
        html, body {
            background-color: #949296; /* !important */
        }
        @yield('style')
    </style>
</head>

<body @yield('load')>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="/" class="navbar-brand">Cinema</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toogle" href="#" data-toggle="dropdown">Filmes</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href={{ route('films.emBreve') }}>Em Breve</a>
                        <a class="dropdown-item" href={{ route('films.emCartaz') }}>Em Cartaz</a>
                    </div>
                </li> 
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('snackBar')}}">SnackBar</a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('precos')}}">Preços</a> 
                </li>
                @if (Auth::check() && Auth::user()->type == 1)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toogle" href="#" data-toggle="dropdown">Área administrativa</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('session.index') }}">Sessões</a>
                        <a class="dropdown-item" href="{{ route('films.index') }}">Filmes (Add e Del)</a>
                        <a class="dropdown-item" href="{{ route('ticket.index') }}">Ingressos</a>
                        <a class="dropdown-item" href="{{ route('user.index') }}">Usuários</a>
                    </div>
                </li> 
                @endif
            </ul>
            <ul class="navbar-nav navbar-right mr-2">
                @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toogle" href="#" data-toggle="dropdown">{{Auth::user()->name}}</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <a class="dropdown-item" href="{{route('user.show',Auth::user()->id )}}">Meu perfil</a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
                        </form>
                    </div>
                </li>                       
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toogle" href="#" data-toggle="dropdown">Acessar</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        <a class="dropdown-item" href="{{ route('register') }}">Registrar</a>
                    </div>
                </li> 
                @endif
            </ul>
            
        </div>
    </nav>
    
    @yield('breadcrumb')

    @if( Session::has('mensagem') )
    <div class="container alert alert-secondary alert-dismissible fade show mt-0" role="alert">
        <h6 class="align-middle">{{ Session::get('mensagem') }}</h6>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif

    @yield('conteudo')  

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">$('.alert').alert()</script>

    @yield('script')
</body>

<footer class="page-footer font-small blue pt-4 footer-dark bg-dark text-white">
    <div class="container-fluid text-center text-md-left">
        <div class="row">
            <div class="col text-center">
                <h5 class="text-uppercase"><font color=gray>Filmes</font></h5>
                <ul class="list-unstyled">
                    <li><a href={{ route('films.emCartaz') }}><font color=white>Em Cartaz</font></a></li>
                    <li><a href={{ route('films.emBreve') }}><font color=white>Em Breve</font></a></li>
                </ul>
            </div>

            <div class="col text-center">
                <h5 class="text-uppercase"><font color=gray>SnackBar</font></h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('snackBar')}}"><font color=white>SnackBar</font></a></li>
                </ul>
            </div>

            <div class="col text-center">
                <h5 class="text-uppercase"><font color=gray>preços</font></h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('precos')}}"><font color=white>Preços</font></a></li>
                </ul>
            </div>

            @if (Auth::check())
            @if(Auth::user()->type == 1)
            <div class="col text-center">
                <h5 class="text-uppercase"><font color=gray>Área administrativa</font></h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('ticket.index') }}"><font color=white>Ingressos</font></a></li>
                    <li><a href="{{ route('user.index') }}"><font color=white>Usuários</font></a></li>
                    <li><a href="{{ route('session.index') }}"><font color=white>Sessões</font></a></li>
                    <li><a href="{{ route('films.index') }}"><font color=white>Filmes</font></a></li>
                </ul>
            </div>
            @endif
            @endif

            <div class="col text-center">
                <h5 class="text-uppercase"><font color=gray>
                    @if (Auth::check())
                    {{Auth::user()->name}}</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{route('user.show',Auth::user()->id )}}"><font color=white>Meu perfil</font></a></li>
                        <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><font color=white>Logout</font></a></li>
                    </ul>
                    @else
                Login</font></h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('register') }}"><font color=white>Registrar</font></a></li>
                    <li><a href="{{ route('login') }}"><font color=white>Login</font></a></li>
                </ul>
                @endif
            </div>
        </div>

        </div>
        <hr class="bg-white">
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
            <p><font color=white>Universidade Federal de Ouro Preto</font></p>
        </div>
    </div>
</footer>


</html>