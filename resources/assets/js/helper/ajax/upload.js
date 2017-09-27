ajax.upload = function (file) {
    return ajax.load(ajax.METHOD_POST, 'loads/load', {file:file});
};