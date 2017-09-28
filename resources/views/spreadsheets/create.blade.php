@extends('layout.default')

@section('content')
<div id="tables-create">
    <div class="row">
        <div class="col-md-12">
            <h1>Criar folha de dados</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" placeholder="Nome" data-bind="value: name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="type">Tipo</label>
                <select class="form-control" data-bind="value: type, options: types, optionsText: 'text', optionsValue: 'value'"></select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Colunas</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody data-bind="foreach: columns">
                    <tr>
                        <td><div data-bind="text: $data"></div></td>
                        <td class="text-right"><a data-bind="click: $root.removeColumn">apagar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="column">Adicionar coluna</label>
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" data-bind="value: columnName">
                </div>
                <button class="btn btn-default" type="button" data-bind="click: addColumn">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Adicionar coluna
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Tabela</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr data-bind="foreach: columns">
                        <th data-bind="text: $data"></th>
                    </tr>
                </thead>
                <tbody data-bind="foreach: itens">
                    <tr data-bind="foreach: $parent.columns">
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" data-bind="value: $parent[$data]">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-success" data-bind="click: addLine">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Adicionar linha
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <hr>
            <span data-bind="text: saveMessage"></span>
            <button type="submit" class="btn btn-default" data-bind="click: save">Salvar</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function ViewModel() {
        var self = this;
        
        self.types = [
            { value: '', text: 'Selecione...' }, 
            { value: 'csv', text: 'Valores separados por vírgula (.csv)' }, 
            { value: 'json', text: 'Notação de Objeto JavaScript (.json)' }, 
            { value: 'xls', text: 'Planilha Excel 2007 (.xls)' },
            { value: 'xlsx', text: 'Planilha Excel 2007 (.xlsx)' }
        ];
        
        self.name = ko.observable();
        self.type = ko.observable();
        
        self.columnName = ko.observable();
        
        self.columns = ko.observableArray(['name']);
        self.itens = ko.observableArray([]);
        
        self.text = ko.computed(function () {
        });
        
        self.saveMessage = ko.observable(null);
        
        self.addColumn = function () {
            self.columns.push(self.columnName());
            self.columnName('');
        };
        
        self.removeColumn = function (column) {
            self.columns.remove(column);
        };
        
        self.addLine = function () {
            var line = {};
            var columns = self.columns();
            
            for (var i = 0; i < columns.length; i++) {
                line[columns[i]] = '';
            }
            
            self.itens.push(line);
        };
        
        self.parseCSV = function () {
            //TODO
        };
        
        self.text = ko.computed(function () {
            switch (self.type()) {
                case 'csv':
                    return self.parseCSV();
                    break;
                case 'json':
                case 'xls':
                case 'xlsx':
                    return JSON.stringify(ko.toJS(self.itens()));
            }
        });
        
        self.save = function () {
            ajax.spreadsheetsSave(
                self.name(), 
                self.type(), 
                self.text()
            )
            .then(function (result) {
                window.location.href = '/spreadsheets';
            })
            .catch(function (err) {
                self.saveMessage(err.message);
                window.setTimeout(function () {
                    self.saveMessage(null);
                }, 2000);
            });
        };
    }
</script>
@endsection
