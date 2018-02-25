if($('#modalValorar').length) {
    $(function () {
        $("#modalValorar").iziModal({
            width: 1050,
            zindex: 999,

        });

        $("#abrirModalValorar").on('click', function () {
            $("#modalValorar").iziModal('open')
        })
    });
}


if($('#modalComentar').length) {
    $(function () {
        $("#modalComentar").iziModal({
            width: 1050,
            zindex: 999,

        });

        $("#abrirModalComentar").on('click', function () {
            $("#modalComentar").iziModal('open')
        })
    });
}


if($('#modalMD').length) {
    $(function () {
        $("#modalMD").iziModal({
            width: 1050,
            zindex: 999,

        });

        $("#abrirModalMD").on('click', function () {
            $("#modalMD").iziModal('open')
        })
    });
}


if($('#modalContraoferta').length) {
    $(function () {
        $("#modalContraoferta").iziModal({
            width: 1050,
            zindex: 999,

        });

        $("#abrirModalContraoferta").on('click', function () {
            $("#modalContraoferta").iziModal('open')
        })
    });
}
