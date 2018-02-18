function gestionarErrores(input, errores) {
    let noEnviarFormulario = false;
    input = $(input);
    if (typeof errores !== typeof undefined) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".invalid-feedback").remove();
        for (let error of errores) {
            input.after(`<div class="invalid-feedback">
                <strong> ${error} </strong>
            </div>`);
        }
        noEnviarFormulario = true;
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        input.nextAll(".invalid-feedback").remove();
    }
    return noEnviarFormulario;
}

function validateTarget(target) {
    let formData = new FormData();
    formData.append(target.id, target.value);
    $(target).parent().next(".spinner").addClass("loader");
    axios.post('/producto/validar',
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (target.id) {
            case "titulo":
                gestionarErrores(target, response.data.titulo);
                break;
            case "precio":
                gestionarErrores(target, response.data.precio);
                break;
            case "categoria":
                gestionarErrores(target, response.data.categoria);
                break;
            case "tipo_envio":
                gestionarErrores(target, response.data.tipo_envio);
                break;
            case "negociacion_precio":
                gestionarErrores(target, response.data.negociacion_precio);
                break;
            case "intercambio_producto":
                gestionarErrores(target, response.data.intercambio_producto);
                break;
            case "destacado":
                gestionarErrores(target, response.data.destacado);
                break;
            case "descripcion":
                gestionarErrores(target, response.data.descripcion);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#titulo,#precio,#categoria,#tipo_envio,#negociacion_precio,#intercambio_producto,#destacado,#descripcion").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonCreacionProducto").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;
        formData.append('titulo', $("#titulo").val());
        formData.append('precio', $("#precio").val());
        formData.append('categoria', $("#categoria").val());
        formData.append('tipo_envio', $("#tipo_envio").val());
        formData.append('negociacion_precio', $("#negociacion_precio").val());
        formData.append('intercambio_producto', $("#intercambio_producto").val());
        formData.append('destacado', $("#destacado").val());
        formData.append('descripcion', $("#descripcion").val());

        axios.post('/producto/validar', formData)
            .then(function (response) {
                if (gestionarErrores("#titulo", response.data.titulo)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#precio", response.data.precio)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#categoria", response.data.categoria)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#tipo_envio", response.data.tipo_envio)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#negociacion_producto", response.data.negociacion_producto)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#intercambio_producto", response.data.intercambio_producto)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#destacado", response.data.destacado)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#descripcion", response.data.descripcion)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true){
                    $("#formularioCreacionProducto").submit();
                }
            });
    });
});