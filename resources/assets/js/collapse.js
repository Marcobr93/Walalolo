function toogle() {
    $("#elemento1").collapse("toggle");
}

$(function() {
    $("#btntoggle").on('click', function (e) {
        toogle();
    })
});