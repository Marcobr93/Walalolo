$(function () {
    review();
});

function review() {
    $("#comentario").on({
        keypress: function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                comentar($("#comentario").val());
            }
        }
    });
}


function comentar(comentario) {

    $(event.target).addClass("active");
    axios.post('/comentar', {
        comentario: comentario
    }).then(function (response) {
        $("#mostrarReviews").html(response.data);
        review();
    }).catch(function (error) {
        console.log(error);
    });
}