$(function () {
    $("#modalValorar").iziModal({
        width: 1050,
        zindex: 999,

    });

    $("#abrirModalValorar").on('click', function () {
        $("#modalValorar").iziModal('open')
    })
});

$(function () {
    $("#modalComentar").iziModal({
        width: 1050,
        zindex: 999,

    });

    $("#abrirModalComentar").on('click', function () {
        $("#modalComentar").iziModal('open')
    })
});

$(function () {
    $("#modalMD").iziModal({
        width: 1050,
        zindex: 999,

    });

    $("#abrirModalMD").on('click', function () {
        $("#modalMD").iziModal('open')
    })
});