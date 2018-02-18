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
    axios.post('/registro/validar',
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (target.id) {
            case "nombre_usuario":
                gestionarErrores(target, response.data.nombre_usuario);
                break;
            case "email":
                gestionarErrores(target, response.data.email);
                break;
            case "emailLogin":
                gestionarErrores(target, response.data.email);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#nombre_usuario,#email,#emailLogin").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonRegistro").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;
        formData.append('nombre_usuario', $("#nombre_usuario").val());
        formData.append('email', $("#email").val());

        axios.post('/registro/validar', formData)
            .then(function (response) {
                if (gestionarErrores("#nombre_usuario", response.data.nombre_usuario)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#email", response.data.email)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#emailLogin", response.data.email)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true){
                    $("#formularioRegistro").submit();
                }
            });
    });
});