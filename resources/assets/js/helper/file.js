function file(f) {
    return new Promise(function (success, fail) {
        var fr = new FileReader();

        fr.onload = function () {
            success({
                name: f.name, 
                text: fr.result
            });
        };

        fr.onerror = function () {
            fail(new Error('Não foi possível carregar o arquivo.'));
        };

        fr.readAsText(f);
    });
}