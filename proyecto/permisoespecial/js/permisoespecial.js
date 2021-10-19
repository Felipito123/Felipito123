$(document).ready(function () {

    LlenarSelectMotivoPermiso();
    LlenarSelectComunas();
    LlenarSeguimiento();

    $("#formRegistrarPermisoEspecial").on('submit', function (event) {
        event.preventDefault();
        $('#time-picker-cancel-button').click();
        subirpermiso();
    });
});