function toogle() {
    $("#mostrarReviews").collapse("toggle");
}

$(function() {
    $("#btnCollapse").on('click', function (e) {
        toogle();
    })
});

function toogleBusqueda() {
    $("#mostrarBusqueda").collapse("toggle");
}

$(function() {
    $("#btnCollapseBusqueda").on('click', function (e) {
        toogleBusqueda();
    })
});