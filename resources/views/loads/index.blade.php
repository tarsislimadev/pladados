@extends('layout.default')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Minhas cargas</h1>
        @if(count($loads))
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Tamanho</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loads as $load)
                    <tr>
                        <td>{{ $load->name }}</td>
                        <td>{{ $load->type }}</td>
                        <td>{{ strlen($load->text) }} bytes</td>
                        <td>{{ $load->created_at }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('loads.edit', ['id' => $load->id]) }}" title="editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Exportar <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Planilha</a></li>
                                    <li><a href="#">Mapa</a></li>
                                    <li><a href="#">Grafico</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Baixar</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
    @endforeach
</tbody>
</table>
</div>
@else
<p>Você não tem cargas a serem exibidas.</p>
@endif
<p><a href="{{ route('loads.create') }}" class="btn btn-success">Carregar carga</a></p>
</div>
</div>
@endsection
