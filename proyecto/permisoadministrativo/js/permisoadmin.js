$(document).ready(function () {

    // LlenarSelectMotivoPermiso();
    // LlenarSelectComunas();
    LlenarSeguimiento();

    $("#formRegistrarPermisoAdministrativo").on('submit', function (event) {
        event.preventDefault();
        // $('#time-picker-cancel-button').click();
        subirpermiso();
    });
});