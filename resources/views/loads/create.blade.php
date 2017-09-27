@extends('layout.default')

@section('content')
<div id="loads-create">
    <div class="row">
        <div class="col-md-12">
            <h1>Carregar carga</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="fileName">Nome</label>
                <input type="text" class="form-control" id="fileName" placeholder="Nome" data-bind="textInput: fileName" readonly="readonly">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="file">Carga</label>
                <div data-bind="visible: fileIsSaving">
                    <p>Salvando...</p>
                </div>
                <div data-bind="visible: !fileIsSaving()">
                    <div data-bind="visible: !fileName()">
                        <input type="file" id="file" accept=".kml,.json,.csv,.xls,.xlsx" data-bind="event: { change: onFileChange.bind($root, $element) }">
                        <p class="help-block">Permitidos: .kml, .csv, .json e .xls(x). Max.: 5 MB.</p>
                    </div>
                    <div data-bind="visible: fileName">
                        <p data-bind="text: fileName"></p>
                        <p><a href="#" data-bind="click: fileClear">limpar</a></p>
                    </div>
                </div>
            </div>
            <div data-bind="visible: fileType() === 'csv'">
                <div class="form-group">
                    <label for="separator">Separador</label>
                    <select class="form-control" data-bind="options: separators,
                        optionsText: 'value',
                        optionsValue: 'key',
                        value: fileSeparator,
                        optionsCaption: 'Separador'"></select>
                </div>
                <div class="form-group">
                    <label for="quoteChar">Caracter de citação</label>
                    <select class="form-control" data-bind="options: quoteChars,
                        optionsText: 'value',
                        optionsValue: 'key',
                        value: fileQuoteChar,
                        optionsCaption: 'Caracter de citação'"></select>
                </div>
                <div class="form-group">
                    <label for="header">Cabeçalho</label>
                    <select class="form-control" data-bind="options: headers,
                        optionsText: 'value',
                        optionsValue: 'key',
                        value: fileHeader,
                        optionsCaption: 'Cabeçalho'"></select>
                </div>
            </div>
        </div>
    </div>
    <div class="row" data-bind="visible: fileType">
        <div class="col-md-12">
            <hr>
            <p data-bind="saveMessage"></p>
            <button type="submit" class="btn btn-default pull-right" data-bind="click: save">Salvar</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function ViewModel() {
        var self = this;

        self.file = ko.observable(null);
        self.fileIsSaving = ko.observable(false);
        self.fileId = ko.observable("{{ isset($id) ? $id : '' }}");
        self.fileName = ko.observable("{{ isset($name) ? $name : '' }}");
        self.fileText = ko.observable("{{ isset($text) ? $text : '' }}");
        
        self.quoteChars = [
            {key:"'", value: "Aspas simples (')"}, 
            {key:'"', value: 'Aspas duplas (")'}
        ];
        self.fileQuoteChar = ko.observable('"');

        self.separators = [
            {key: ';', value: 'Ponto-e-virgula ;'},
            {key: ',', value: 'Virgula ,'}
        ];
        self.fileSeparator = ko.observable(';');
        
        self.headers = [{key:0,value:'Não'},{key:1,value:'Sim'}];
        self.fileHeader = ko.observable(0);

        self.fileMessage = ko.observable(null);
        self.saveMessage = ko.observable(null);

        self.init = function () { };

        self.onFileChange = function (el) {
            self.fileIsSaving(true);
            self.fileName('');
            self.fileText('');
            self.fileMessage(null);

            file(el.files[0])
                .then(function (result) {
                    self.fileIsSaving(false);
                    self.fileText(result.text);
                    self.fileName(result.name);
                })
                .catch(function (err) {
                    self.fileIsSaving(false);
                    self.fileMessage(err.message);
                });
        };

        self.fileClear = function () {
            self.file(null);
            self.fileName('');
            self.fileText('');
        };

        self.fileType = ko.computed(function () {
            var name = self.fileName();
            var lio = name.lastIndexOf('.');

            return name.substring(lio + 1, name.length);
        });

        self.save = function () {
            ajax.loadsSave(
                self.fileId(), 
                self.fileName(), 
                self.fileType(), 
                self.fileText(), 
                self.fileSeparator(),
                self.fileQuoteChar(), 
                self.fileHeader()
            )
            .then(function (result) {
                window.location.href = '/loads';
            })
            .catch(function (err) {
                self.saveMessage(err.message);
            });
        };
    }
</script>
@endsection
