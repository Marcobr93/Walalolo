$(function () {

    // tablaProductos =  $("#tablaProductos");


    $("#tabla-productos").on("click",function (e) {
        e.preventDefault();

        displayData('tabla-busqueda',"");
    });

});


function displayData(ruta,param) {

    axios.get(ruta, {
    }).then(function (response) {
        $("#tabla").html(response.data);
        if(typeof param === 'function'){
            param();
        }
    })
        .catch(function (error) {
            console.log(error);
            alert("EERRRORR")
        });
}



