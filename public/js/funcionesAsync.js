$(function () {
    review();
    borrar();
    valoraracion();
});


function review() {
    $("#comentario").on({
        click: function (e) {
            e.preventDefault();
            comentar($("#comentario").val());
        }
    });
}

function borrar() {
    let producto = null;

    $("#borrarAsync").on({
        click: function (e) {
            e.preventDefault();
            producto = e.target.id;

            borrarProducto(producto);
        }
    });
}

function valoraracion() {
    $("#valorar").on({
        click: function (e) {
            e.preventDefault();
            valorar($("#valoracion").val());
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

function borrarProducto(producto) {
    axios.post('/borrar-producto' + producto, {
    }).then(function (response) {
        borrar();
    }).catch(function (error) {
        console.log(error);
    });
}


function valorar(valoracion) {
    axios.post('/valorar', {
        valoracion: valoracion
    }).then(function (response) {
        $("#usuario").html(response.data);
        valoraracion();
    }).catch(function (error) {
        console.log(error);
    });
}