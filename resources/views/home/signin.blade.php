@extends('layout.default')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Entrar</h1>
        
        <form action="{{ route('home.make-signin') }}" method="POST">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Lembrar-me
                </label>
            </div>
            <button type="submit" class="btn btn-default">Entrar</button>
        </form>
    </div>
</div>
@endsection
