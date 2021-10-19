/*====================================================================FORMULARIOS======================================================*/

function formularioRegistro() {
    form = $("#form-modal-planilla");

    let rutusuario = $("#rut_usuario").val();
    let archivo = $("#archivo_modal").val();
    let descripcion = $("#descripcion_modal").val();

    var formData = new FormData(form[0]); //form[0]
    formData.append('seleccionar', '3');

    // for (var i of formData.entries()) {
    //     console.log(i[0]+ ', ' + i[1]); 
    // }

    if (validavacioynulo([rutusuario, archivo, descripcion])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
    else if (descripcion.length < 2 || descripcion.length > 50) { swalfire("Tamaño de la descripción, \nmínimo: 2y máximo: 50 caracteres", "error"); }
    else {
        //swalalerta("HOLAAAAAA", "success");

        // console.log("RUT: " + rutusuario + "\narchivo: " + archivo + "\ndescripcion: " + descripcion);

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
                swalfire("Tamaño excedido > 20 MB", "error");
            } else if (respuesta == 2) {
                swalfire("¡Ha ocurrido un error al registrar el archivo!", "error");
            } else if (respuesta == 3) {
                swalfire("¡Ha ocurrido un error!", "error");
            } else if (respuesta == 4) {
                $('#modal-planilla').modal('hide');
                tabladocumentacion.ajax.reload(null, false);
                form[0].reset();
                swalfire("¡Documento subido exitosamente!", "success");
            } else if (respuesta == 5) {
                swalfire("¡El formato del archivo no es válido!", "error");
            } else if (respuesta == 6 || respuesta == 444) {
                swalfire("¡No se ha recibido el parametro!", "error");
            } else {
                swalfire("ERROR", "error");
            }
        });

    }
}


function formularioEnviarNotificacion() {
    form = $("#form-notificacion-a-usuario");
    let rut = $("#not_rut").val();
    let descripcion = $("#noti_desc").val();
    let valordecheckbox = $("#checkboxdocumentos").val();

    if (valordecheckbox == 'funcionarios') {

        if (validavacioynulo([rut, descripcion])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
        else if (descripcion.length < 2 || descripcion.length > 100) { swalfire("Tamaño de la descripción, \nmínimo: 2 y máximo: 100 caracteres", "error"); }
        else {
            console.log("Rut: " + rut + "\nDescripcion: " + descripcion);

            $.post('funciones/acceso.php', {
                n_rut: rut,
                n_descripcion: descripcion,
                seleccionar: 8
            }, function (respuesta) {
                //console.log(respuesta);
                if (respuesta == 3) {
                    form[0].reset();
                    tablanotificaciones.ajax.reload(null, false);
                    swalfire("¡Mensaje enviado!", "success");
                } else if (respuesta == 4) {
                    swalfire("¡Mensaje No enviado!", "error");
                } else if (respuesta == 11) {
                    swalfire("¡Campos vacios, compruebe datos!", "error");
                } else {
                    swalfire("¡No se ha recibido parametro!", "error");
                }
            });
        }
    }
    else {
        if (validavacioynulo([valordecheckbox, descripcion])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
        else {
            $.post('funciones/acceso.php', { paratodos: valordecheckbox, n_descripcion: descripcion, seleccionar: 8 }, function (respuesta) {
                console.log(respuesta);
                if (respuesta == 1) {
                    swalfire("¡Ha ocurrido un error!", "error");
                } else if (respuesta == 2) {
                    form[0].reset();
                    tablanotificaciones.ajax.reload(null, false);
                    swalfire("¡Mensaje enviado!", "success");
                } else if (respuesta == 11) {
                    swalfire("¡Campos vacios, compruebe datos!", "error");
                } else {
                    swalfire("¡No se ha recibido parametro!", "error");
                }
            });
        }
    }
}

function formularioEditarDocumento() {
    form = $("#form-modal-editar-planilla");

    let IDDOC = $("#id_documento").val();
    let DESCRIPCIONDOC = $("#descripcion_editar").val();

    var formData = new FormData(form[0]); //form[0]
    formData.append('seleccionar', '4');

    if (validavacioynulo([IDDOC, DESCRIPCIONDOC])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
    else if (DESCRIPCIONDOC.length < 2 || DESCRIPCIONDOC.length > 50) { swalfire("Tamaño de la descripción, \nmínimo: 2 y máximo: 50 caracteres", "error"); }
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
            //console.log("respuesta: " + respuesta);
            if (respuesta == 1) {
                swalfire("Tamaño excedido > 20 MB", "error");
            } else if (respuesta == 2) {
                swalfire("¡Ha ocurrido un error al editar el archivo!", "error");
            } else if (respuesta == 3) {
                // swalfire("¡Ha ocurrido un error!", "error");
                $('#modal-editar-planilla').modal('hide');
                tabladocumentacion.ajax.reload(null, false);
                form[0].reset();
                swalfire("¡Documento editado exitosamente!", "success");
            } else if (respuesta == 4) {
                swalfire("¡Ha ocurrido un error al editar el archivo!", "error");
            } else if (respuesta == 5) {
                $('#modal-editar-planilla').modal('hide');
                tabladocumentacion.ajax.reload(null, false);
                form[0].reset();
                swalfire("¡Documento editado exitosamente!", "success");
            } else if (respuesta == 6) {
                swalfire("¡El formato del archivo no es válido!", "error");
            } else if (respuesta == 7 || respuesta == 444) {
                swalfire("¡No se ha recibido el parametro!", "error");
            } else if (respuesta == 11) {
                swalfire("¡Campos vacios, verifique datos!", "error");
            }
        }).fail(function (res) {
            console.log("Ha ocurrido un error: "+ res);
            // swalfire("¡Ha o!", "error");
        });

    }
}

/*====================================================================FORMULARIOS======================================================*/