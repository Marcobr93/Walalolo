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
    axios.post('/editar/validar',
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
            case "current_password":
                gestionarErrores(target, response.data.current_password);
                break;
            case "password":
                gestionarErrores(target, response.data.password);
                break;
            case "name":
                gestionarErrores(target, response.data.name);
                break;
            case "apellido":
                gestionarErrores(target, response.data.apellido);
                break;
            case "dni":
                gestionarErrores(target, response.data.dni);
                break;
            case "num_telefono":
                gestionarErrores(target, response.data.num_telefono);
                break;
            case "direccion":
                gestionarErrores(target, response.data.direccion);
                break;
            case "poblacion":
                gestionarErrores(target, response.data.poblacion);
                break;
            case "fecha_nac":
                gestionarErrores(target, response.data.fecha_nac);
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
    $("#nombre_usuario,#email,#current_password,#password,#name,#apellido,#dni,#num_telefono,#direccion,#poblacion,#fecha_nac,#descripcion").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonEditar").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;
        formData.append('nombre_usuario', $("#nombre_usuario").val());
        formData.append('email', $("#email").val());
        formData.append('current_password', $("#current_password").val());
        formData.append('password', $("#password").val());
        formData.append('name', $("#name").val());
        formData.append('apellido', $("#apellido").val());
        formData.append('dni', $("#dni").val());
        formData.append('num_telefono', $("#num_telefono").val());
        formData.append('direccion', $("#direccion").val());
        formData.append('poblacion', $("#poblacion").val());
        formData.append('fecha_nac', $("#fecha_nac").val());
        formData.append('descripcion', $("#descripcion").val());


        axios.post('/editar/validar', formData)
            .then(function (response) {
                if (gestionarErrores("#nombre_usuario", response.data.nombre_usuario)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#email", response.data.email)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#current_password", response.data.current_password)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#password", response.data.password)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#name", response.data.name)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#apellido", response.data.apellido)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#dni", response.data.dni)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#num_telefono", response.data.num_telefono)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#direccion", response.data.direccion)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#poblacion", response.data.poblacion)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#fecha_nac", response.data.fecha_nac)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#descripcion", response.data.descripcion)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true) {
                    $("#formularioEditar").submit();
                }
            });
    });
});