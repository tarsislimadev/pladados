Object.defineProperty(String.prototype, 'removeSpecialChars', {
    value: function () {
        var text = this.toLowerCase();
        var result = "";
        
        for (var t in text) {
            var charCode = text.charCodeAt(t);
            var char = ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122)) ? text[t] : '-';
            
            if (t === 0 && char === '-') {
                return '';
            }
            
            result += char;
        }

        return result;
    }
});
