$(function () {
    review();
});

function review() {
    $("#comentario").on({
        click: function (e) {
            e.preventDefault();
            comentar();
        }
    });
}


function comentar(comentario) {
    axios.post('/comentar', {
        comentario: comentario
    }).then(function (response) {
        $("#mostrarReviews").html(response.data);
        review();
    }).catch(function (error) {
        console.log(error);
    });
}