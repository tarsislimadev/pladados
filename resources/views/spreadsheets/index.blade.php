@extends('layout.default')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Minhas folhas de dados</h1>
        @if(count($sheets))
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
                    @foreach($sheets as $sheet)
                    <tr>
                        <td>{{ $sheet->name }}</td>
                        <td>{{ $sheet->type }}</td>
                        <td>{{ strlen($sheet->text) }} bytes</td>
                        <td>{{ $sheet->created_at }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('spreadsheets.edit', ['id' => $sheet->id]) }}" title="editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
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
        <p>Você não existem folhas de dados para serem exibidas.</p>
        @endif
        <p><a href="{{ route('spreadsheets.create') }}" class="btn btn-success">Criar folha de dados</a></p>
    </div>
</div>
@endsection
