<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/favicon.ico">

        <title>{{ config('app.name') }}</title>

        <link href="/css/app.css" rel="stylesheet" type="text/css">
        @yield('styles')
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
                </div>
                @if(isset($session_id) && $session_id)

                <div id="navbar" class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $session_name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Perfil</a></li>
                                <li><a href="#">Meus gráficos</a></li>
                                <li><a href="#">Meus mapas</a></li>
                                <li><a href="#">Minhas planilhas</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('home.signout') }}">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
                @else
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-right">
                        <p class="navbar-login">
                            <a type="submit" class="" href="{{ route('home.signin') }}">Entrar</a>
                            <a type="submit" class="btn btn-danger" href="{{ route('home.signup') }}">Cadastre-se</a>
                        </p>
                    </div>
                </div><!--/.navbar-collapse -->
                @endif
            </div>
        </nav>

        @yield('before')

        <div class="container">

            @yield('content')

            <hr>

            @yield('after')

            <footer>
                <p>&copy; 2016 Company, Inc.</p>
            </footer>
        </div> <!-- /container -->

        <script src="/js/app.js"></script>
        @yield('scripts')
    </body>
</html>
