@extends('layout.default')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Cadastre-se</h1>
        
        <form action="{{ route('home.make-signup') }}" method="POST">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="name">Sobrenome</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Sobrenome">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
            </div>
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
                    <input type="checkbox" name="terms"> Li e concordo com os <a>Termos de Compromisso</a>.
                </label>
            </div>
            <button type="submit" class="btn btn-default">Cadastrar</button>
        </form>
    </div>
</div>
@endsection
