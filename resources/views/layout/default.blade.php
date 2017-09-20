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
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" placeholder="E-mail" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Senha" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Entrar</button>
                        <a type="submit" class="btn btn-danger" href="#">Cadastrar-se</a>
                    </form>
                </div><!--/.navbar-collapse -->
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
