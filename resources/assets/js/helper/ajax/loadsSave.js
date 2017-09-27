ajax.loadsSave = function (id, name, type, text, separator, quote_char, header) {
    var request = {
        id: id, 
        name: name, 
        type: type, 
        text: text, 
        separator: separator, 
        quote_char: quote_char, 
        header: header
    };
    
    return ajax.load(ajax.METHOD_POST, 'loads/save', request);
};
