
function formRegistroUsuario() {
    form = $("#formSuperAdmin");
    let rut = $("#sa_rut").val();
    let cargo = $("#seleccioncargo").val();
    let sector = $("#seleccionsector").val(); //sector puede ser null, entonces no lo valido más abajo
    let unidad = $("#seleccionunidad").val(); //unidad puede ser null, entonces no lo valido más abajo
    let region = $("#seleccionregion").val();
    let rol = $("#seleccionrol").val();
    let comuna = $("#seleccioncomuna").val();
    let direccion = $("#sa_direccion").val();
    let telefono = $("#sa_telefono").val();
    let nombre = $("#sa_nombre").val();
    let correo = $("#sa_correo").val();
    let fechainicio = $("#sa_fechainicio").val();
    let contrasena = $("#sa_contrasena").val();

    console.log("RUT: " + rut +
        "\nCargo " + cargo +
        "\nSector: " + sector +
        "\nUnidad: " + unidad +
        "\nRegión: " + region +
        "\nComuna: " + comuna +
        "\nRol: " + rol +
        "\nDirección: " + direccion +
        "\nTeléfono: " + telefono +
        "\nNombre:" + nombre +
        "\nCorreo:" + correo +
        "\nFecha Ingreso:" + fechainicio +
        "\nClave:" + contrasena);

    if (validavacioynulo([rut, region, comuna, nombre, correo, fechainicio, contrasena, direccion, telefono, cargo, rol])) { swalfire("Campo(s) vacio(s)!", "error"); }
    else if (rut.length < 8 || rut.length > 11) { swalfire("Tamaño del rut inválido, \nmínimo: 8 y máximo: 11 caracteres", "info"); }
    else if (!esunrut(rut)) { swalfire("¡Rut inválido!", "info"); }
    else if (direccion.length < 2 || direccion.length > 100) { swalfire("Tamaño del dirección inválido, \nmínimo: 2 y máximo: 100 caracteres", "info"); }
    else if (telefono.length < 8 || telefono.length > 9) { swalfire("Tamaño del teléfono inválido, \nmínimo: 8 y máximo: 9 caracteres", "info"); }
    else if (nombre.length < 2 || nombre.length > 50) { swalfire("Tamaño del nombre inválido, \nmínimo: 2 y máximo: 50 caracteres", "info"); }
    else if (correo.length < 11 || correo.length > 70) { swalfire("Tamaño del correo inválido, \nmínimo: 11 y máximo: 70 caracteres", "info"); }
    else if (fechainicio.length > 10) { swalfire("Tamaño de la fecha inválido, \nmáximo: 10 caracteres", "info"); }
    else if (contrasena.length < 2 || contrasena.length > 200) { swalfire("Tamaño de la contraseña inválido, \nmínimo: 2 y máximo: 200 caracteres", "info"); }
    else if (rol == 7 && sector == 'null') { //debido a que en el select defini el value="null" queda como un string y necesito comparar con las comillas
        swalfire("Si es Jefe de sector, debe seleccionar un sector", "info");
    }
    // else if (rol != 7 && sector != 'null') { //si el rol es distinto de jefe de sector, pero aún así selecciono un sector no tiene que dejarlo pasar
    //     swalfire("El rol seleccionado no pertenece a un sector", "info");
    // } else if (rol == 1 && sector == 'null') { //Si es un funcionario debe tener un sector definido
    //     swalfire("Si es Funcionario, debe seleccionar un sector", "info");
    // } else if (rol == 2 && sector == 'null') { //Si es un Administrador debe tener un sector definido
    //     swalfire("Si es Administrador, debe seleccionar un sector", "info");
    // } else if (rol == 3 && sector == 'null') { //Si es un SuperAdministrador debe tener un sector definido
    //     swalfire("Si es SuperAdministrador, debe seleccionar un sector", "info");
    // } else if (rol == 4 && sector == 'null') { //Si es de Calidad debe tener un sector definido
    //     swalfire("Si es de Calidad, debe seleccionar un sector", "info");
    // } else if (rol == 5 && sector == 'null') { //Si es de Dentista debe tener un sector definido
    //     swalfire("Si es Dentista, debe seleccionar un sector", "info");
    // } else if (rol == 6 && sector == 'null') { //Si es de Farmacia debe tener un sector definido
    //     swalfire("Si es de Farmacia, debe seleccionar un sector", "info");
    // }
    else if (rol == 8 && unidad != 'null') { //Si es de Jefe de unidad NO debe tener un sector definido
        swalfire("Si es Jefe de Unidad, debe seleccionar una", "info");
    }else if (sector == 'null' && unidad == 'null') { //Si es de Jefe de unidad NO debe tener un sector definido
        swalfire("Debe seleccionar si pertenece a un sector o a una unidad", "info");
    }else {
        // if(sector=='null' || sector=='') sector="NULL";

        $.post('funciones/acceso.php', {
            sa_rut: rut,
            sa_cargo: cargo,
            sa_sector: sector,
            sa_unidad: unidad,
            sa_rol: rol,
            sa_comuna: comuna,
            sa_direccion: direccion,
            sa_telefono: telefono,
            sa_nombre: nombre,
            sa_correo: correo,
            sa_fechainicio: fechainicio,
            sa_contrasena: contrasena,
            seleccionar: 4
        }, function (respuesta) {
            console.log(respuesta);
            if (respuesta == 1) {
                swalfire("¡El rut o el correo, ya existe!", "error");
            } else if (respuesta == 2) {
                swalfire("¡Error al mostrar el último usuario!", "error");
            } else if (respuesta == 3) {
                swalfire("¡Agregado exitosamente!", "success");
                tablausuarios.ajax.reload(null, false);
                form[0].reset();

                // $('#seleccionsector').prop('required', false);
                $("#seleccionsector").val("null").change();
                $("#seleccionunidad").val("null").change();
                // $('#divselectorsector').fadeOut();
                $('#divclavepordefecto').fadeOut();
            } else if (respuesta == 4) {
                swalfire("¡Error en la query insertar!", "error");
            } else if (respuesta == 5 || respuesta == 444) {
                swalfire("¡No se ha recibido parametros!", "error");
            } else if (respuesta == 6) {
                swalfire("¡Ya existe un Jefe con ese sector respectivo!", "error");
            } else if (respuesta == 7) {
                swalfire("¡Ya existe un Jefe de Unidad!", "error");
            } else if (respuesta == 8) {
                swalfire("¡Ya existe un Jefe de DAS!", "error");
            } else if (respuesta == 9) {
                swalfire("¡Ya existe el encargado(a) de Dirección!", "error");
            } else if (respuesta == 10) {
                swalfire("¡Ya existe un Director, y sólo hay un Director en el Cesfam!", "error");
            } else if (respuesta == 11) {
                swalfire("¡Ya existe un encargado(a) de personal!", "error");
            } else if (respuesta == 12) {
                swalfire("¡Ya existe un Jefe Sistema de Salud!", "error");
            }else if (respuesta == 13) {
                swalfire("¡Ya existe un Jefe con esa unidad respectiva!", "error");
            }
        });
    }
}

function formEditarUsuario() {
    form = $("#form-modal-editar-usuarios");
    let rut = $("#rut_sa").val();

    let cargo = $("#cargo_sa").val();
    let sector = $("#sector_sa").val(); //sector puede ser null, entonces no lo valido más abajo
    let unidad = $("#unidad_sa").val(); //sector puede ser null, entonces no lo valido más abajo

    let direccion = $("#direccion_sa").val();
    let telefono = $("#telefono_sa").val();
    let nombre = $("#nombre_sa").val();
    let correo = $("#correo_sa").val();
    let fecha = $("#fecha_sa").val();
    let rol = $("#rol_sa").val();

    // console.log("RUT: " + rut +
    // "\nCargo " + cargo +
    // "\nSector: " + sector +
    // "\nRegión: " + region +
    // "\nComuna: " + comuna +
    // "\nRol: " + rol +
    // "\nDirección: " + direccion +
    // "\nTeléfono: " + telefono +
    // "\nNombre:" + nombre +
    // "\nCorreo:" + correo +
    // "\nFecha Ingreso:" + fechainicio +
    // "\nClave:" + contrasena);

    if (validavacioynulo([rut, nombre, direccion, telefono, correo, fecha, rol, cargo])) { swalfire("Campo(s) vacio(s)!", "error"); }
    else if (rut.length < 8 || rut.length > 11) { swalfire("Tamaño del rut inválido, \nmínimo: 8 y máximo: 11 caracteres", "error"); }
    else if (!esunrut(rut)) { swalfire("¡Rut inválido!", "error"); }
    else if (direccion.length < 2 || direccion.length > 100) { swalfire("Tamaño del dirección inválido, \nmínimo: 2 y máximo: 100 caracteres", "error"); }
    else if (telefono.length < 8 || telefono.length > 9) { swalfire("Tamaño del teléfono inválido, \nmínimo: 8 y máximo: 9 caracteres", "error"); }
    else if (nombre.length < 2 || nombre.length > 50) { swalfire("Tamaño del nombre inválido, \nmínimo: 2 y máximo: 50 caracteres", "error"); }
    else if (correo.length < 11 || correo.length > 70) { swalfire("Tamaño del correo inválido, \nmínimo: 11 y máximo: 70 caracteres", "error"); }
    else if (fecha.length > 10) { swalfire("Tamaño de la fecha inválido, \nmáximo: 10 caracteres", "error"); }
    else if (rol == 7 && sector == 'null') { //debido a que en el select defini el value="null" queda como un string y necesito comparar con las comillas
        swalfire("Si es Jefe de sector, debe seleccionar un sector", "info");
    }else if (rol == 8 && unidad == 'null') { //debido a que en el select defini el value="null" queda como un string y necesito comparar con las comillas
        swalfire("Si es Jefe de Unidad, debe seleccionar una unidad", "info");
    }
    // else if ((rol != 1 || rol != 2 || rol != 3 || rol != 4 || rol != 5 || rol != 6 || rol != 7) && sector != 'null') { //si el rol es distinto de jefe de sector, pero aún así selecciono un sector no tiene que dejarlo pasar
    //     swalfire("El rol seleccionado no pertenece a un sector1", "info");
    // } 
    // else if (rol == 1 && sector == 'null') { //Si es un funcionario debe tener un sector definido
    //     swalfire("Si es Funcionario, debe seleccionar un sector", "info");
    // } else if (rol == 2 && sector == 'null') { //Si es un Administrador debe tener un sector definido
    //     swalfire("Si es Administrador, debe seleccionar un sector", "info");
    // } else if (rol == 3 && sector == 'null') { //Si es un SuperAdministrador debe tener un sector definido
    //     swalfire("Si es SuperAdministrador, debe seleccionar un sector", "info");
    // } else if (rol == 4 && sector == 'null') { //Si es de Calidad debe tener un sector definido
    //     swalfire("Si es de Calidad, debe seleccionar un sector", "info");
    // } else if (rol == 5 && sector == 'null') { //Si es de Dentista debe tener un sector definido
    //     swalfire("Si es Dentista, debe seleccionar un sector", "info");
    // } else if (rol == 6 && sector == 'null') { //Si es de Farmacia debe tener un sector definido
    //     swalfire("Si es de Farmacia, debe seleccionar un sector", "info");
    // } 
    
    else {

        // toastr.error("Paso por aqui");

        $.post('funciones/acceso.php', {
            s_rut: parseInt(rut),
            s_cargo: cargo,
            s_sector: sector,
            s_unidad: unidad,
            s_direccion: direccion,
            s_telefono: telefono,
            s_nombre: nombre,
            s_correo: correo,
            s_fecha: fecha,
            s_rol: rol,
            seleccionar: 3
        }, function (respuesta) {
            console.log(respuesta);
            if (respuesta == 1) {
                swalfire("¡Ya existe un Jefe con ese sector respectivo!", "error");
            } else if (respuesta == 2) {
                swalfire("¡Ya existe un Jefe de Unidad!", "error");
            } else if (respuesta == 3) {
                swalfire("¡Ya existe un Jefe DAS!", "error");
            } else if (respuesta == 4) {
                swalfire("¡Ya existe un encargado(a) de Dirección!", "error");
            } else if (respuesta == 5) {
                swalfire("¡Ya existe un Director!", "error");
            } else if (respuesta == 6) {
                swalfire("¡Ya existe un encargado(a) de personal!", "error");
            } else if (respuesta == 7) {
                swalfire("¡Ya existe un Jefe Sistema de Salud!", "error");
            } else if (respuesta == 8 || respuesta == 11 || respuesta == 444) {
                swalfire("¡No se ha recibido parametros!", "error");
            } else if (respuesta == 9) {
                swalfire("¡Ha ocurrido un error, por favor, intente nuevamente o  contacte a soporte!", "error");
            } else if (respuesta == 10) {
                tablausuarios.ajax.reload(null, false);
                form[0].reset();
                $('#modal-superadmin').modal('hide');
                swalfire("¡Usuario editado exitosamente!", "success");
            }
            // $('#modal-superadmin').modal('hide');
        }).fail(function (res) {
            swalfire("¡Error!, " + res, "error");
        });
    }
}




function llenaRegionSelector() {
    $.post('funciones/acceso.php', { seleccionar: 7, subselect: 1 }, function (respuesta) {
        // console.log("RESP1: " + respuesta);
        if (respuesta == 1) { //No hay regiones registradas
            $('#s1').hide(); $('#s2').hide();
            $('#a1').removeAttr('hidden'); $('#a2').removeAttr('hidden');
        } else {
            $('#seleccionregion').html(respuesta);
        }
    }).fail(function () { swalfire("No se pudo cargar el selector", "error") });
}

function DetectaCambiosSelectoresRegionYcomuna() {
    //================DETECTA EL CAMBIO DEL SELECTOR MENSUAL Y DE ACUERDO AL MES SE CONSULTA EL AÑO=================//
    $('#seleccionregion').on('change', function () {
        var region = $(this).val();
        // console.log("SELECC: " + region);
        if (region) {
            $.post('funciones/acceso.php', { seleccionar: 7, subselect: 2, regionseleccionada: region }, function (respuesta) {
                //  console.log("RESP2: " + respuesta);
                if (respuesta == 1) { //No hay comunas registradas
                    $('#s2').hide();
                    $('#a2').removeAttr('hidden');
                } else if (respuesta == 2) { //No hay regiones registradas
                    $('#s1').hide();
                    $('#a1').removeAttr('hidden');
                } else {
                    $('#seleccioncomuna').html(respuesta);
                }
            }).fail(function () { swalfire("No se pudo cargar el selector", "error") });
        } else {
            $('#seleccioncomuna').html('<option value="">Seleccione una región primero...</option>');
        }
    });
}


function llenaCargoSelector() {
    $.post('funciones/acceso.php', { seleccionar: 8 }, function (respuesta) {
        // console.log("RESP1: " + respuesta);
        if (respuesta == 1) { //No hay cargos registrados
            $('#divprofesion').html('<div class="alert alert-danger text-center" role="alert">¡UpS! Al parecer no hay cargos registrados.<br> Por favor, Contacte a Soporte.</div>');
        } else {
            $('#seleccioncargo').html(respuesta);
        }
    }).fail(function () { swalfire("No se pudo cargar el selector", "error") });
}

// function DetectaCambioRadioSector() {
//     $('input:radio[name=radiosector]').change(function () { //para seleccionar si pertenece el funcionario a un sector

//         if ($(this).val() == 'si') {

//             $('#divselectorsector').fadeIn();

//             $.post('funciones/acceso.php', { seleccionar: 9 }, function (respuesta) {
//                 // console.log("RESP: " + respuesta);
//                 if (respuesta == 1) { //No hay sectores registrados
//                     $('#divselectorsector').html('<div class="alert alert-danger text-center" role="alert">¡UpS! Al parecer no hay sectores registrados.<br> Por favor, Contacte a Soporte.</div>');
//                 } else {
//                     $('#seleccionsector').html(respuesta);
//                     $('#seleccionsector').prop('required', true);
//                     // $("#seleccionsector").val("1").change();
//                 }
//             }).fail(function () { swalfire("No se pudo cargar el selector", "error") });

//             // alertify.success("si");
//         }
//         else if ($(this).val() == 'no') {

//             $('#seleccionsector').prop('required', false);
//             $("#seleccionsector").val("null").change();// también puede ser: $('#seleccionsector  option[value="NULL"]').prop("selected", true);
//             $('#divselectorsector').fadeOut();
//             // alertify.success("no"); 
//         }
//     });
// }

function llenaRolSelector() {
    $.post('funciones/acceso.php', { seleccionar: 10 }, function (respuesta) {
        // console.log("RESP1: " + respuesta);
        if (respuesta == 1) { //No hay roles registrados
            $('#divrol').html('<div class="alert alert-danger text-center" role="alert">¡UpS! Al parecer no hay roles registrados.<br> Por favor, Contacte a Soporte.</div>');
        } else {
            $('#seleccionrol').html(respuesta);
        }
    }).fail(function () { swalfire("No se pudo cargar el selector", "error") });
}


function LLenaSectorYUnidad(){
    $.post('funciones/acceso.php', { seleccionar: 9 }, function (respuesta) {
        // console.log("RESP: " + respuesta);
        if (respuesta == 1) { //No hay sectores registrados
            $('#divselectorsector').html('<div class="alert alert-danger text-center" role="alert">¡UpS! Al parecer no hay sectores registrados.<br> Por favor, Contacte a Soporte.</div>');
        } else {
            $('#seleccionsector').html(respuesta);
            $('#seleccionsector').prop('required', true);
            // $("#seleccionsector").val("1").change();
        }
    }).fail(function () { swalfire("No se pudo cargar el selector", "error") });

    $.post('funciones/acceso.php', { seleccionar: 11 }, function (respuesta) {
        // console.log("RESP: " + respuesta);
        if (respuesta == 1) { //No hay sectores registrados
            $('#divselectorunidad').html('<div class="alert alert-danger text-center" role="alert">¡UpS! Al parecer no hay unidades registradass.<br> Por favor, Contacte a Soporte.</div>');
        } else {
            $('#seleccionunidad').html(respuesta);
            $('#seleccionunidad').prop('required', true);
            // $("#seleccionunidad").val("1").change();
        }
    }).fail(function () { swalfire("No se pudo cargar el selector", "error") });
}


$('#seleccionrol').on('change', function () { //cambio del select del ROL en registro
    let rolselect = $(this).val();
    // toastr.error("SELECC: " + rolselect);

    /*si selecciona un rol que sea distinto de: Superadmin, administrador, dentista, calidad, funcionario, farmacia, jefe de sector 
    y tiene abierto el select de sectores, lo cierra y le da el valor null por defecto*/
    
    // if (rolselect == 1 || rolselect == 2 || rolselect == 3 || rolselect == 4 || rolselect == 5 || rolselect == 6 || rolselect == 7) {
        // toastr.success("hola");
        // $.post('funciones/acceso.php', { seleccionar: 9 }, function (respuesta) {
        //     // console.log("RESP: " + respuesta);
        //     if (respuesta == 1) { //No hay sectores registrados
        //         $('#divselectorsector').html('<div class="alert alert-danger text-center" role="alert">¡UpS! Al parecer no hay sectores registrados.<br> Por favor, Contacte a Soporte.</div>');
        //     } else {
        //         $('#seleccionsector').html(respuesta);
        //         $('#seleccionsector').prop('required', true);
        //         // $("#seleccionsector").val("1").change();
        //     }
        // }).fail(function () { swalfire("No se pudo cargar el selector", "error") });

        // $("#opcion2sector").prop("checked", true);
        // $('#seleccionsector').prop('required', true);
        // $("#seleccionsector").val("").change();// también puede ser: $('#seleccionsector  option[value="NULL"]').prop("selected", true);
        // $('#divselectorsector').fadeIn();
    // } else {
        // $("#opcion1sector").prop("checked", true);
        // $('#seleccionsector').prop('required', false);
        // $("#seleccionsector").val("null").change();// también puede ser: $('#seleccionsector  option[value="NULL"]').prop("selected", true);
        // $('#divselectorsector').fadeOut();
    // }
});

$('#rol_sa').on('change', function () { //detecta cambio en el select del modal
    // let rolselect = $(this).val();
    // toastr.error("SELECC: " + rolselect);

    /*si selecciona un rol que sea distinto de: Superadmin, administrador, dentista, calidad, funcionario, farmacia, jefe de sector 
    y tiene abierto el select de sectores, lo cierra y le da el valor null por defecto*/
    // if (rolselect == 1 || rolselect == 2 || rolselect == 3 || rolselect == 4 || rolselect == 5 || rolselect == 6 || rolselect == 7) {
    //     // toastr.success("hola");
    //     $('#sector_sa').prop('required', true);
    //     $("#sector_sa").val("").change();
    //     $('#divsectoresmodalusuario').fadeIn();
    // } else {
    //     $('#sector_sa').prop('required', false);
    //     $("#sector_sa").val("null").change();// también puede ser: $('#seleccionsector  option[value="NULL"]').prop("selected", true);
    //     $('#divsectoresmodalusuario').fadeOut();
    // }
});


$('#sa_rut').on('keyup', function () {
    let valorinputrut = $(this).val();
    let largoinput = valorinputrut.length;
    // console.log("input rut: " + valorinputrut);

    if (valorinputrut != '' && largoinput >= 8) {
        $('#divclavepordefecto').fadeIn();
    } else {
        $('#sa_contrasena').val('');
        $('#divclavepordefecto').fadeOut();
    }
});

