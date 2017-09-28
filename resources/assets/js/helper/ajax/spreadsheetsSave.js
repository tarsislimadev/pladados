ajax.spreadsheetsSave = function (name, type, text) {
    var request = {
        name: name, 
        type: type, 
        text: text
    };
    
    return ajax.load(ajax.METHOD_POST, 'spreadsheets/save', request);
};
