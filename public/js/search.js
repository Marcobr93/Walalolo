$( function() {
    var cache = {};
    $( "#poblacion" ).autocomplete({
        minLength: 2,
        source: function( request, response ) {
            var term = request.term;
            if ( term in cache ) {
                response( cache[ term ] );
                return;
            }

            $.getJSON( "search.php", request, function( data, status, xhr ) {
                cache[ term ] = data;
                response( data );
            });
        }
    });
} );