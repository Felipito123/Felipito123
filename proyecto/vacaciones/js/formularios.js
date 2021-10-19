/*====================================================================FORMULARIOS======================================================*/

function formRegistroVacacion() {
    form = $("#form-modal-registrar-vacaciones");
    let R_rut = $("#MRRUT").val();
    let R_tipo = $("#MRtipo").val();
    let R_razon = $("#MRrazon").val();
    let R_diastomados = $("#MRDiasTomados").val();
    let R_fechainicio = $("#MRFechaInicio").val();
    let R_observacion = $("#MRObservacion").val();
    let diasrestantes = $("#MaximoDiasDisponibles").val();

    // console.log("diastomados"+R_diastomados);
    // console.log("diasrestantes"+diasrestantes);
    // let validadiastomados = false;

    var formData = new FormData(form[0]); //form[0]
    formData.append('seleccionar', '3');

    // for (let ba = 0; ba < arreglo.length; ba++) {
    //     if (arreglo[ba].RUT == R_rut) {
    //         if (R_diastomados > arreglo[ba].DIASRES) {
    //             validadiastomados = true;
    //             break;
    //         }
    //     }
    // }

    if (validavacioynulo([R_rut, R_tipo, R_razon, R_diastomados, R_fechainicio, R_observacion,diasrestantes])) { swalfire("¡Campo(s) vacio(s)!", "info"); }
    else if (R_rut.length < 8 || R_rut.length > 11) { swalfire("Tamaño del Rut, \nmínimo: 8 y máximo: 11 caracteres", "info"); }
    else if (R_tipo.length < 5 || R_tipo.length > 8) { swalfire("Tamaño de Motivo de la vacación, \nmínimo: 5 y máximo: 8 caracteres", "info"); }
    else if (R_razon.length < 2 || R_razon.length > 1000) { swalfire("Tamaño de la razón, \nmínimo: 2 y máximo: 1000 caracteres", "info"); }
    else if (R_diastomados.length < 1 || R_diastomados.length > 2) { swalfire("Tamaño de los dias disponibles, \nmínimo: 1 y máximo: 2 caracteres", "info"); }
    else if (R_fechainicio.length < 10 || R_fechainicio.length > 10) { swalfire("Tamaño de la fecha de inicio, \nmínimo: 10 y máximo: 10 caracteres", "info"); }
    else if (R_observacion.length < 2 || R_observacion.length > 1000) { swalfire("Tamaño de la observación, \nmínimo: 2 y máximo: 1000 caracteres", "info"); }
    else if(parseInt(R_diastomados)==0) { swalfire("El dia tomado no puede ser cero", "info"); }
    else if(parseInt(R_diastomados)>parseInt(diasrestantes)) { swalfire("Se han tomados más dias de los disponibles", "info"); }
    else {

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
            if (respuesta == 1) {
                swalfire("¡Campos vacios, compruebe datos!", "error");
            } else if(respuesta==2){
                swalfire("Ya ocupo todas las vacaciones", "error");
            } else if(respuesta==3){
                swalfire("Excedio el máximo permitido, verifique los dias disponibles", "error");
            }else if (respuesta == 4 || respuesta == 5 || respuesta==555) {
                swalfire("¡Ha ocurrido un error al registrar la vacacion!", "error");
            }else if (respuesta == 6) {
                $('#modal-registrar-vacaciones').modal('hide');
                tablavacaciones.ajax.reload(null, false);
                form[0].reset();
                swalfire("¡Vacacion registrada exitosamente!", "success");
            } else if (respuesta == 7 || respuesta == 444) {
                swalfire("¡No se ha recibido los parametros!", "error");
            }
        }).fail(function (res) {
            console.log(res);
        });
    }
}


function formularioEditarArchivo() {
    // form = $("#form-modal-editar-calidad");

    // let IDDOC = $("#id_modal_editar").val();
    // let DESCRIPCIONDOC = $("#descripcion_modal_editar").val();

    // var formData = new FormData(form[0]); //form[0]
    // formData.append('seleccionar', '4');

    // // for (var i of formData.entries()) {
    // //     console.log(i[0] + ', ' + i[1]);
    // // }

    // if (validavacioynulo([IDDOC, DESCRIPCIONDOC])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
    // else if (DESCRIPCIONDOC.length < 2 || DESCRIPCIONDOC.length > 50) { swalfire("Tamaño de la descripción, \nmínimo: 2 y máximo: 50 caracteres", "error"); }
    // else {
    //     $.ajax({
    //         type: 'POST',
    //         url: 'funciones/acceso.php',
    //         data: formData,
    //         dataType: 'text',
    //         contentType: false,
    //         cache: false,
    //         processData: false
    //     }).done(function (respuesta) {
    //         //console.log("respuesta: " + respuesta);
    //         if (respuesta == 1) {
    //             swalfire("Tamaño excedido > 20 MB", "error");
    //         } else if (respuesta == 2) {
    //             swalfire("¡Ha ocurrido un error al editar el archivo!", "error");
    //         } else if (respuesta == 3) {
    //             // swalfire("¡Ha ocurrido un error!", "error");
    //             $('#modal-editar-calidad').modal('hide');
    //             tablacalidad.ajax.reload(null, false);
    //             form[0].reset();
    //             swalfire("¡Archivo editado exitosamente!", "success");
    //         } else if (respuesta == 4) {
    //             swalfire("¡Ha ocurrido un error al editar el archivo!", "error");
    //         } else if (respuesta == 5) {
    //             $('#modal-editar-calidad').modal('hide');
    //             tablacalidad.ajax.reload(null, false);
    //             form[0].reset();
    //             swalfire("¡Archivo editado exitosamente!", "success");
    //         } else if (respuesta == 6) {
    //             swalfire("¡El formato del archivo no es válido!", "error");
    //         } else if (respuesta == 7 || respuesta == 444) {
    //             swalfire("¡No se ha recibido el parametro!", "error");
    //         } else if (respuesta == 11) {
    //             swalfire("¡Campos vacios, verifique datos!", "error");
    //         }
    //     }).fail(function (res) {
    //         console.log("Ha ocurrido un error: "+ res);
    //         // swalfire("¡Ha o!", "error");
    //     });
    // }
}

/*====================================================================FORMULARIOS======================================================*/