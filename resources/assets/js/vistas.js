$(function () {
    perfil();
});

function perfil() {
    $("#perfilCuenta").on({
        click: function (e) {
            e.preventDefault();
            datosDireccion();
        }
    });

    $("#perfilDatosPersonales").on({
        click: function (e) {
            e.preventDefault();
            datosPersonales();
        }
    });

    $("#perfilLocalizacion").on({
        click: function (e) {
            e.preventDefault();
            datosLocalizacion();
        }
    });
}


function datosDireccion() {
    axios.get('/perfil/cuenta').then(function (response) {
        $("#datosPerfil").html(response.data);
    }).catch(function (error) {
        console.log(error);
        alert('ERROR')
    });
    // window.scrollTo($("#logo").left, $("#logo").top);
}

function datosPersonales() {
    axios.get('/perfil/datos-personales').then(function (response) {
        $("#datosPerfil").html(response.data);
    }).catch(function (error) {
        console.log(error);
        alert('ERROR')
    });
    // window.scrollTo($("#logo").left, $("#logo").top);
}

function datosLocalizacion() {
    axios.get('/perfil/localizacion').then(function (response) {
        $("#datosPerfil").html(response.data);
    }).catch(function (error) {
        console.log(error);
        alert('ERROR')
    });
    // window.scrollTo($("#logo").left, $("#logo").top);
}