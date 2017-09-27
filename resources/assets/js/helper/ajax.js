function ajax() {}

ajax.URL = 'http://localhost:9876/';

ajax.METHOD_POST = 'POST';
ajax.METHOD_GET = 'GET';

ajax.load = function (method, action, payload, options) {
    return new Promise(function (s, f) {
        var xhr = new XMLHttpRequest();
        xhr.open(method, ajax.URL + action, true);
        
        xhr.onload = function () {
            try {
                var response = xhr.responseText;
                if (response !== '' && response !== null) {
                    s(JSON.parse(response));
                } else {
                    s();
                }
            } catch (e) {
                f(e);
            }
        };
        
        xhr.onerror = function () {
            f(new Error(xhr.statusText));
        };
        
        var fd = new FormData();
        
        for (var p in payload) {
            fd.append(p, payload[p]);
        }
        
        xhr.send(fd);
    });
};