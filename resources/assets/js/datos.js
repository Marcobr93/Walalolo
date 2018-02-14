function obtenerDatosPagina(){
    event.preventDefault();

    let enlace = $(event.target);
    let valor = parseInt(enlace.text());

    $(event.target).addClass("active");
    axios.get('/dameProductos?page='+valor)
        .then(function(response){
            $("#paginacion").html(response.data);
            asociarEventoAsincrono();
        }).catch(function (error) {
        console.log(error);
    });
}

function asociarEventoAsincrono(){
    $(".pagination > li > a").on("click",obtenerDatosPagina);
}

$(function(){
    asociarEventoAsincrono();
});
