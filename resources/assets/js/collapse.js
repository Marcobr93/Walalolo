function toogle() {
    $("#mostrarReviews").collapse("toggle");
}

$(function() {
    $("#btnCollapse").on('click', function (e) {
        toogle();
    })
});

