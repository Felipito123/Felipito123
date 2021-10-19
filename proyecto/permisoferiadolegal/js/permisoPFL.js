$(document).ready(function () {

    // LlenarSelectMotivoPermiso();
    // LlenarSelectComunas();
    LlenarSeguimiento();

    $("#formRegistrarPermisoFeriadoLegal").on('submit', function (event) {
        event.preventDefault();
        // $('#time-picker-cancel-button').click();
        subirpermiso();
    });
});