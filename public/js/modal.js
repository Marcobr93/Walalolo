$(function () {
    $("#modalValorar").iziModal({
        width: 1050,
        zindex: 999,

    });

    $("#abrirModalValorar").on('click', function () {
        $("#modalValorar").iziModal('open')
    })
});
