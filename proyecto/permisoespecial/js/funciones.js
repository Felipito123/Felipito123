// function agregarpatologia() {

//     form = $("#formRegistrarPatologia");

//     let nombrepatologia = $('#nombrepatologia').val();

//     if (validavacioynulo([nombrepatologia])) { toastr.error('Campo nombre inválido') }
//     else if (nombrepatologia.length < 2 || nombrepatologia.length > 50) { toastr.error('Tamaño del campo nombre, <br> mínimo: 2 y máximo: 50 caracteres'); }
//     else {
//         $.post('funciones/acceso.php', { Npatologia: nombrepatologia, seleccionar: 2 }, function (respuesta) {
//             // console.log("INGRESAR DEL SWAL: " + respuesta);
//             if (respuesta == 1) {
//                 swalfire("¡Campo vacio!", "error");
//             } else if (respuesta == 2) {
//                 swalfire("¡Hubo un error al ingresar la patología", "error");
//             } else if (respuesta == 3) {
//                 swalfire("¡Patología Ingresada!", "success");
//                 tablapatologia.ajax.reload(null, false);
//                 form[0].reset();
//             } else if (respuesta == 4) {
//                 swalfire("¡Parámetros no recibidos!", "success");
//             }
//         }).fail(function () {
//             swalfire("Ocurrio un Error Inesperado", "error")
//         });
//     }
// }

// $('#divseguimiento').hide();

function subirpermiso() {

    form = $("#formRegistrarPermisoEspecial");

    let rut = $('#rut').val();
    let nombrecompleto = $('#nombrecompleto').val();
    // let sector = $('#sector').val();
    let comuna = $('#comuna').val();
    let fechapermiso = $('#fechapermiso').val();
    let horainicio = $('#horainicio').val();
    let horafin = $('#horafin').val();
    let firma = $('#archivo_firma').val();
    let motivo = $('#selectmotivopermiso').val();

    let varaño = fechapermiso.split("-");

    // console.log("R.U.T: " + rut +
    //     "\nNombres y apellidos " + nombrecompleto +
    //     "\nSector: " + sector +
    //     "\nComuna: " + comuna +
    //     "\nFecha permiso: " + fechapermiso +
    //     "\nHora Inicio: " + horainicio +
    //     "\nHora Fin: " + horafin +
    //     "\nFirma: " + firma +
    //     "\nMotivo: " + motivo +
    //     "\n¿Existe firma?: " + existefirma);


    /*===================Valida que la hora de inicio no sea mayor a la de fin====================*/
    var hi = new Date("May 26, 2021 " + horainicio);
    hi = hi.getTime();

    var hf = new Date("May 26, 2021 " + horafin);
    hf = hf.getTime();
    /*===================Valida que la hora de inicio no sea mayor a la de fin====================*/


    if (validavacioynulo([rut])) { toastr.error('Campo R.U.T vacio'); }
    else if (validavacioynulo([nombrecompleto])) { toastr.error('Campo Nombres y apellidos, vacio'); }
    // else if (validavacioynulo([sector])) { toastr.error('Campo sector vacio'); }
    else if (validavacioynulo([comuna])) { toastr.error('Campo comuna vacio'); }
    else if (validavacioynulo([fechapermiso])) { toastr.error('Campo fecha vacio'); }
    else if (validavacioynulo([horainicio])) { toastr.error('Campo hora inicio vacio'); }
    else if (validavacioynulo([horafin])) { toastr.error('Campo hora fin, vacio'); }
    else if (validavacioynulo([motivo])) { toastr.error('no ha seleccionado patología'); }
    else if (varaño[0] < anoactual) {
        toastr.error('La fecha debe ser en el año presente o futuro');
    } else if (existefirma == 'no' && validavacioynulo([firma])) {
        $('#divfirma').show();
        $('#archivo_firma').prop('required', true);
        toastr.error('No tiene firmas registradas, porfavor ingrese una. \n En caso de haberla registrado, refresque la página.');
    } else if (hi > hf) {
        toastr.error('La hora "Hasta" no puede ser menor a la hora "Desde"');
    } else if (hi == hf) {
        toastr.error('La horas no pueden ser igual ');
    } else {

        // toastr.info("PASE POR AQUI");

        var formData = new FormData(form[0]); //form[0]
        formData.append('seleccionar', '3');
        formData.append('existefirma', existefirma);

        // for (var i of formData.entries()) {
        //     console.log(i[0] + ', ' + i[1]);
        // }

        $.ajax({
            type: 'POST',
            url: 'funciones/acceso.php',
            data: formData,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false
        }).done(function (respuesta) {
            console.log("respuesta: " + respuesta);

            if(respuesta==1){
                toastr.error('No se ha recibido parametros','UpS!'); 
            }else if(respuesta==2){
                toastr.error('Revise la fecha, no puede ser menor al año actual','UpS!');
            }else if(respuesta==3){
                toastr.error('La hora de inicio no puede ser mayor a la hora de fin','UpS!'); 
            }else if(respuesta==4){
                toastr.error('La hora de inicio Y de fin, no pueden ser iguales','UpS!');
            }else if(respuesta==5){
                toastr.error('Ingrese su firma','UpS!');
            }else if(respuesta==6){
                toastr.error('Tamaño de la imagen de la firma excede los 20MB','UpS!');
            }else if(respuesta==7){
                toastr.error('Formato de imagen inválido','UpS!'); 
            }else if(respuesta==8){
                toastr.error('¡Ha ocurrido un error al ingresar la firma!','UpS!');
            }else if(respuesta==9){
                toastr.error('¡Ha ocurrido un error al registrar el permiso!','UpS!');
            }else if(respuesta==10){
                toastr.error('¡Ha ocurrido un error inesperado, por favor, contacte a soporte!','UpS!');
            }else if(respuesta==11){
                toastr.error('¡Ha ocurrido un error inesperado, por favor, contacte a soporte!','UpS!');
            }else if(respuesta==12){
                toastr.success('¡Permiso registrado!','¡Correcto!');
                $('#divfirma').hide(); 
                $('#archivo_firma').prop('required', false);
                LimpiarAlgunosInputsformulario();
                LlenarSeguimiento();
            }else if(respuesta==13){
                toastr.success('¡Permiso registrado!','¡Correcto!');
                $('#divfirma').hide(); 
                $('#archivo_firma').prop('required', false);
                LimpiarAlgunosInputsformulario();
                LlenarSeguimiento();
            }
        }).fail(function (res) {
            // swalfire("Ocurrio un Error Inesperado", "error");
            console.log(res);
        });
    }
}

function LlenarSelectMotivoPermiso() {
    $.post('funciones/acceso.php', { seleccionar: 1 }, function (respuesta) {
        //  console.log("RESPP: " + respuesta);
        $('#selectmotivopermiso').html(respuesta);
    }).fail(function () {
        swalfire("No se pudo cargar el motivo del permiso", "error")
    });
}

function LlenarSelectComunas() {
    $.post('funciones/acceso.php', { seleccionar: 2 }, function (respuesta) {
        //  console.log("RESPP: " + respuesta);
        $('#comuna').html(respuesta);
    }).fail(function () {
        swalfire("No se pudo cargar las comunas", "error")
    });
}

function LlenarSeguimiento() {
    $.post('funciones/acceso.php', {
        seleccionar: 4
    }, function(respuesta) {
        console.log("SELECT SEGUIMIENTO: " + respuesta);
        if (respuesta == 1) {
            toastr.error("Ha ocurrido un error, al cargar los datos");
        } else if (respuesta == 0) {
            $('#divNoHaySolicitudes').show();
            $('#divSiHaySolicitudes').hide();
        } else {
            $('#divNoHaySolicitudes').hide();
            $('#divSiHaySolicitudes').show();
            $('#buscarpermiso').html(respuesta);
        }
    }).fail(function() {
        swalfire("No se pudo cargar el motivo del permiso", "error")
    });
}

function LimpiarAlgunosInputsformulario(){
    $("#selectmotivopermiso").val("").change();
    $("#comuna").val("").change();
    $('#horainicio').val('');
    $('#horafin').val('');
}

$('#buscarpermiso').on('change', function () { //cambio del select del registro
    let IDpermiso = $(this).val();

    if(IDpermiso==''){
        $('#divgeneralseguimiento').hide();
        $('#imagenydescripcion').show(); 
    }else{
        $('#divgeneralseguimiento').show();
        // alertify.success(IDpermiso);

        $.post('funciones/acceso.php', { seleccionar: 5, IDpermiso:IDpermiso }, function (respuesta) {
            // console.log("RESP: " + respuesta);
            if (respuesta == 1) { 
                toastr.error('No se ha recibido parametros','UpS!'); 
            } else if (respuesta == 2) { 
                toastr.error('Ha ocurrido un error, por favor, contacte a soporte','UpS!'); 
            } else {
                console.log(respuesta);
                $('#imagenydescripcion').hide(); 
                $('#contenidoseguimiento').html(respuesta);
            }
        }).fail(function () { swalfire("No se pudo cargar el selector", "error") });
    }
    });


/*=========================================SQL============================================== */


// SELECT spe.id_spe, spe.id_pe, spe.rut, spe.id_decision_spe, spe.id_etapas_spe, spe.fecha_spe,spe.observacion_spe, rl.nombre_rol
// FROM solicitud_permiso_especial spe, permiso_especial pe, usuario us, rol rl 
// WHERE spe.id_pe=pe.id_pe and spe.rut=us.rut and us.id_rol=rl.id_rol and
// spe.id_pe='3'


// 117775500 JEFE SECTOR
// 33221104 ENCARGADA DE PERSONAL
// 33221105 JEFE SISTEMA SALUD