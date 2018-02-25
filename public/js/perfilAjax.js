$(function () {

    $("#btnTabla").on("click", function (e) {
        e.preventDefault();

        displayData('/tabla-busqueda');
    });


});


function displayData(ruta) {
    axios.get(ruta, {}).then(function (response) {
        $("#panel").html(response.data);
    })
        .catch(function (error) {
            console.log(error);
            alert("EERRRORR")
        });
}