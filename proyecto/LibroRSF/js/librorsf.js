$(document).ready(function (event) {
    // $('input').on("focus", function () { //PARA DETECTAR VACIO DE LA DESCRIPCIÓN Y SETEAR EL CONTADOR CUANDO HAGO ALGÚN CAMBIO DE INPUT CON EL FOCUS 
    //     if ($('#contacto_descripcion').val() == '' || $('#contacto_descripcion').val() == null) {
    //         $('#hola').text(10000 + (" caracteres restantes"));
    //     }
    // });

    /*Formulario del libro RSF*/
    $("#formuRSF").on('submit', function (event) {
        form = $("#formuRSF");
        event.preventDefault();

        let tipo_persona = $("input[name=tipo_persona]:checked").val();
        let seleccionNacionalidad = $("#seleccionNacionalidad").val();
        let rut = $("#rut").val();
        let nombre = $("#nombre").val();
        let apellido_paterno = $("#apellido_paterno").val();
        let apellido_materno = $("#apellido_materno").val();
        let fechanacimiento = $("#fechanacimiento").val();
        let sexo = $("input[name=sexo]:checked").val();
        let pueblosindigenas = $("#pueblosindigenas").val();
        let ts1 = $("#ts1").val();
        let telefonoprimario = $("#telefonoprimario").val();
        let ts2 = $("#ts2").val();
        let telefonosecundario = $("#telefonosecundario").val();
        let confirmasolicitante = $("input[name=confirmasolicitante]:checked").val();
        let correoelectronico = $("#correoelectronico").val();
        let tiposolicitud = $("#tiposolicitud").val();
        let tipoinstitucion = $("#tipoinstitucion").val();
        let area = $("#area").val();
        let fechaevento = $("#fechaevento").val();
        let detalle = $("#detalle").val();
        let observaciones = $("#observaciones").val();

        // let archivo = document.getElementById("file-4").files[0];  // file from input

        let imagen = $("#file-4").val();

        // console.log("Tipo de Persona: " + tipo_persona +
        //     "\nNacionalidad:" + seleccionNacionalidad +
        //     "\nR.U.T:" + rut +
        //     "\nNombres:" + nombre +
        //     "\nApellido Paterno:" + apellido_paterno +
        //     "\nApellido Materno:" + apellido_materno +
        //     "\nFecha Nacimiento:" + fechanacimiento +
        //     "\nSexo:" + sexo +
        //     "\nPueblo Indigena:" + pueblosindigenas +
        //     "\nTipo celular 1:" + ts1 +
        //     "\nTelefono primario:" + telefonoprimario +
        //     "\nTipo celular 2:" + ts2 +
        //     "\nTelefono secundario:" + telefonosecundario +
        //     "\nConfirma si es solicitante:" + confirmasolicitante +
        //     "\nCorreo Electrónico:" + correoelectronico +
        //     "\nTipo de solicitud:" + tiposolicitud +
        //     "\nTipo de institución:" + tipoinstitucion +
        //     "\nÁrea:" + area +
        //     "\nFecha del evento:" + fechaevento +
        //     "\nDetalle:" + detalle +
        //     "\nObservaciones:" + observaciones +
        //     "\nImagen:" + imagen);

        let fechactual = new Date();
        let anoactual = fechactual.getFullYear(); //Año
        var separa = fechanacimiento.split("/");

        // console.log(anoactual+" && "+separa[2]);


        if (!tipo_persona || !sexo || !confirmasolicitante ||
            validavacioynulo([seleccionNacionalidad, rut, nombre, apellido_paterno, ts1,
                telefonoprimario, correoelectronico, tiposolicitud, tipoinstitucion, area, fechaevento])) {
            toastr.warning("¡Datos inválidos o vacíos!");
        }
        else if (!essolotexto(tipo_persona)) { toastr.warning("Campo inválido, contiene números"); }
        else if (!tipo_persona) { toastr.warning("Por favor, seleccione el tipo de persona"); }
        else if (!seleccionNacionalidad) { toastr.warning("Por favor, seleccione su nacionalidad"); }
        else if (!rut) { toastr.warning("Por favor, ingrese su R.U.T"); }
        else if (rut.length < 8 || rut.length > 14) { toastr.warning("Tamaño del rut inválido, \nmínimo: 8 y máximo: 14 caracteres"); }
        else if (!nombre) { toastr.warning("Por favor, ingrese su(s) Nombre(s)"); }
        else if (nombre.length < 2 || nombre.length > 45) { toastr.warning("Tamaño del nombre inválido, \nmínimo: 2 y máximo: 45 caracteres"); }
        else if (!apellido_paterno) { toastr.warning("Por favor, ingrese su Apellido Paterno"); }
        else if (apellido_paterno.length < 2 || apellido_paterno.length > 45) { toastr.warning("Tamaño del Apellido Paterno inválido, \nmínimo: 2 y máximo: 45 caracteres"); }
        else if (apellido_materno != '' && (apellido_materno.length < 2 || apellido_materno.length > 45)) {
            toastr.warning("Tamaño del Apellido Materno inválido, \nmínimo: 2 y máximo: 45 caracteres");
        } else if (fechanacimiento != '' && ((anoactual - separa[2]) < 12)) {
            toastr.warning("Debe tener al menos 12 años, cambie fecha de nacimiento");
        }
        else if (!sexo) { toastr.warning("Por favor, seleccione su sexo"); }
        else if (!pueblosindigenas) { toastr.warning("Por favor, seleccione un pueblo indigena"); }
        else if (!ts1) { toastr.warning("Por favor, seleccione el Tipo de teléfono"); }
        else if (!telefonoprimario) { toastr.warning("Por favor, ingrese su teléfono primario"); }
        else if (telefonoprimario.length < 9 || telefonoprimario.length > 13) { toastr.warning("Tamaño del teléfono primario inválido, \nmínimo: 9 y máximo: 13 caracteres"); }
        else if (telefonosecundario != '' && (telefonosecundario.length < 9 || telefonosecundario.length > 13)) {
            toastr.warning("Tamaño del teléfono secundario inválido, \nmínimo: 9 y máximo: 13 caracteres");
        }
        else if (!confirmasolicitante) { toastr.warning("Por favor, seleccione si es el afectado"); }
        else if (!correoelectronico) { toastr.warning("Por favor, ingrese su correo electronico"); }
        else if (correoelectronico.length < 11 || correoelectronico.length > 75) { toastr.warning("Tamaño del correo electronico inválido, \nmínimo: 11 y máximo: 75 caracteres"); }
        else if (!tiposolicitud) { toastr.warning("Por favor, seleccione el tipo de solicitud"); }
        else if (!tipoinstitucion) { toastr.warning("Por favor, seleccione el tipo de institución"); }
        else if (!area) { toastr.warning("Por favor, seleccione el tipo el área"); }
        else if (!fechaevento) { toastr.warning("Por favor, ingrese fecha de evento"); }
        else if (fechaevento.length < 10 || fechaevento.length > 10) {
            toastr.warning("Tamaño de la fecha de evento inválido, \nmínimo: 10 y máximo: 10 caracteres");
        }
        else if (detalle != '' && (detalle.length < 2 || detalle.length > 4000)) { toastr.warning("Por favor, escriba un detalle con la longitud requerida"); }
        else if (observaciones != '' && (observaciones.length < 2 || observaciones.length > 4000)) { toastr.warning("Por favor, escriba observaciones con la longitud requerida"); }
        else {
            // alertify.success("¡He aquí pase nuevamente!");

            $.ajax({
                type: 'POST',
                url: 'funciones/acciones.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    //form[0].reset(); //LUEGO DE ENVIAR SE RESETE O LIMPIE EL FORMULARIO, SINO QUEDAN GUARDADOS ALGUNOS DATOS AL VOLVER ATRÁS
                }
            }).done(function (respuesta) {
                // alertify.success(respuesta.responseText);
                console.log(respuesta);
                if (respuesta == 1) {
                    toastr.error("No se han recibido parametros");
                } else if (respuesta == 2) {
                    toastr.error("El formato de/los archivo/s es incorrecto");
                } else if (respuesta == 3 || respuesta == 6) {
                    toastr.error("Ocurrió un error al registrar formulario, si el problema persiste, por favor contacte a soporte");
                } else if (respuesta == 4) {
                    toastr.error("Error al mostrar el último ID del formulario");
                } else if (respuesta == 5 || respuesta == 7) {
                    toastr.success("¡Registrado exitosamente!");

                    $.post('../Notificaciones/LibroRSF/recepcion/', { correo: correoelectronico, tiposolicitud: tiposolicitud }, function (responses) {
                        console.log("Respuesta notificacion: " + responses);
                        if (responses == 1) {
                            console.log("CORREO ENVIADO");
                        } else if (responses == 2) {
                            console.log("No se han recibido parámetros");
                        }
                    });
                    limpiarFormulario();
                }
            }).fail(function (res) {
                console.log(res);
                swalfire("Ocurrió un error, por favor contacte a soporte.", "error");
            });
        }
    });
    /*Formulario del contacto*/

    function limpiarFormulario() {
        //No limpio los checkbox porque por defecto estan marcados y algunos select estan llenado en php. Sólo limpio los inputs de tipo texto o text,
        //y cambio los valores de los select no llenados por php sino en html
        let fechaactual = new Date().toLocaleDateString('en-GB'); //toLocaleString

        $("[name=tipo_persona]").val(["persona natural"]);
        $('#seleccionNacionalidad option[value="1"]').prop('selected', true);
        $("#rut").val('');
        $("#nombre").val('');
        $("#apellido_paterno").val('');
        $("#apellido_materno").val('');
        $("#fechanacimiento").val(fechaactual);
        $("#fechaevento").val(fechaactual);
        $('#ts1 option[value="fijo"]').prop('selected', true);
        $('#ts2 option[value="no tiene"]').prop('selected', true);
        $("#telefonoprimario").val('');
        $("#telefonosecundario").val('');
        $("[name=sexo]").val(["hombre"]);
        $('#pueblosindigenas option[value="7"]').prop('selected', true);
        $("[name=confirmasolicitante]").val(["si"]);
        $('#tiposolicitud option[value=""]').prop('selected', true);
        $('#tipoinstitucion option[value=""]').prop('selected', true);
        $('#area option[value=""]').prop('selected', true);
        $("#correoelectronico").val('');
        $("#detalle").val('');
        $("#observaciones").val('');
        $("#escrito1").html('0');
        $("#contadorcaracteres1").html('4000');
        $("#escrito2").html('0');
        $("#contadorcaracteres2").html('4000');
        $(".fileinput-remove-button").click();
        $("#file-4").val('');
    }
});