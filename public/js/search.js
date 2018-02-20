$( function() {
    $.getJSON('/autocomplete', function(data) {
        autoComplete = [];
        for (let i = 0, len = data.length; i < len; i++) {
            autoComplete.push(data[i]);
        }
        $( "#poblacion" ).autocomplete({
            source: autoComplete
        });
    });
});