function formularioEditarPerfil() {
    form = $("#formueditarperfil");

    let nombre = $('#nombre').val();
    let region = $('#region').val();
    let comuna = $('#comuna').val();
    let correo = $('#correo').val();
    let telefono = $('#telefono').val();
    let direccion = $('#direccion').val();
    let contrasena = $('#contrasena').val();
    let archivo = $('#filemu').val();

    let nombreregion = $("#region option:selected").text();
    let nombrecomuna = $("#comuna option:selected").text();

    var formData = new FormData(form[0]); //form[0]
    formData.append('seleccionar', '1');
    formData.append('idregionselected', region); //lo uso para reestablecer la sesion 
    formData.append('nombreregionselected', nombreregion); //lo uso para reestablecer la sesion 
    formData.append('nombrecomunaselected', nombrecomuna); //lo uso para reestablecer la sesion 

    // console.log("RUT: " + rut + "\nNOMBREROL: " + rol + "\nUSUARIO: " + nombre + "\nTeléfono: " + telefono + "\nDirección: " + direccion + "\nCORREO: " + correo + "\nContrasena: " + contrasena + "\nImagen: " + archivo);

    if (validavacioynulo([nombre, region, comuna, correo, telefono, direccion])) { swalfire("¡Datos inválidos!", "error"); }
    else if (!validarcorreo(correo)) { swalfire("¡Correo inválido!", "error"); }
    else {
        $.ajax({
            type: 'POST',
            url: 'funciones/fun_editar_perfil.php',
            data: formData,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                //form[0].reset(); //LUEGO DE ENVIAR SE RESETE O LIMPIE EL FORMULARIO, SINO QUEDAN GUARDADOS ALGUNOS DATOS AL VOLVER ATRÁS
            }
        }).done(function (respuesta) {
            console.log(respuesta);

            if (respuesta == 1) {
                alertify.error("Excedio el tamaño 20MB");
            } else if (respuesta == 2) {
                swalfire("¡Ha ocurrido un error al editar datos!", "error");
            } else if (respuesta == 3) {
                swalfire("¡Ha editado sus datos correctamente!", "success");
                $("#filemu").val('');
                llenar_perfil();
                imagenpequena(); //Esta función está en el topbar
            } else if (respuesta == 4) {
                swalfire("¡Ha ocurrido un error al editar datos!", "error");
            } else if (respuesta == 5) {
                swalfire("¡Ha editado sus datos correctamente!", "success");
                $('#previsualizacion').fadeOut(); //si ha cerrado la ventana para seleccionar un archivo oculto la etiqueta img con un desvanecimiento lento
                setTimeout(function () { document.getElementById('previsualizacion').removeAttribute('src'); }, 2000); //le quito la direccion src, después de los 2 segundos del fadeOut, porque sino se muestra la img vacia
                $('#filemu').val('');
                llenar_perfil();
                imagenpequena();
            } else if (respuesta == 6) {
                swalfire("No es formato de imagen", "error");
            } else if (respuesta == 7) {
                swalfire("No se han recibido parametros", "error");
            } else if (respuesta == 8) {
                swalfire("¡Parámetros vacíos!", "info");
            }

        }).fail(function (res) {
            console.log(res);
            swalfire("ERROR", "error");
        });
    }
}


function formularioEditarContrasena() {
    form = $("#formcontrasena");

    let contrasenaactual = $('#contrasena').val();
    let contrasenanueva1 = $('#contranueva1').val();
    let contrasenanueva2 = $('#contranueva2').val();

    if (validavacioynulo([contrasenaactual, contrasenanueva1, contrasenanueva2])) { swalfire("¡Campos vacíos inválidos!", "info"); }
    else if (contrasenaactual.length < 2 || contrasenaactual.length > 200) { swalfire("Tamaño de la contraseña actual, \nmínimo: 2 y máximo: 200 caracteres", "info"); }
    else if (contrasenanueva1.length < 2 || contrasenanueva1.length > 200) { swalfire("Tamaño de la primera contraseña nueva, \nmínimo: 2 y máximo: 200 caracteres", "info"); }
    else if (contrasenanueva2.length < 2 || contrasenanueva2.length > 200) { swalfire("Tamaño de la contraseña de confirmacion, \nmínimo: 2 y máximo: 200 caracteres", "info"); }
    else if (contrasenanueva1 != contrasenanueva2) { swalfire("contraseñas deben ser iguales", "info"); }
    else {

        $.post('funciones/fun_editar_perfil.php', { seleccionar: 2, actualpass: contrasenaactual, contrasenanueva: contrasenanueva1 }, function (respuesta) {
            console.log("RESP EDITAR CONTRA: " + respuesta);
            if (respuesta == 1) {
                swalfire("¡Campos vacios, compruebe datos!", "error");
            } else if (respuesta == 2 || respuesta == 4) {
                swalfire("¡Ha ocurrido un error al editar contraseña!", "error");
            } else if (respuesta == 3) {
                swalfire("Las contraseña actual no coincide", "error");
            } else if (respuesta == 5) {
                form[0].reset();
                // limpiacampocontrasenas();
                swalfire("¡Contraseña cambiada exitosamente!", "success");
            } else if (respuesta == 6 || respuesta == 444) {
                swalfire("¡No se ha recibido los parametros!", "error");
            }
        }).fail(function () { swalfire("No se pudo cargar el selector", "error") });

    }
}


function llenar_perfil() {
    $.getJSON('funciones/fun_llenar_editar_perfil.php', function (data) {

        // console.log("RUT: " + data[0].RUT + "\nNOMBREROL: " + data[0].NOMBREROL + "\nUSUARIO: " + data[0].NOMBRE_USUARIO + "\nCORREO: " + data[0].CORREO);
        $('#rut').val(data[0].RUT);
        $('#rol').text(data[0].NOMBREROL);
        $('#nombre').val(data[0].NOMBRE_USUARIO);
        $('#correo').val(data[0].CORREO);
        $('#telefono').val(data[0].TELEFONO);
        $('#direccion').val(data[0].DIRECCION);

        if (data[0].NOMBREIMAGEN == '' || data[0].NOMBREIMAGEN == null) { //En caso de que no halla imagen en la BD , ya que el valor por defecto del nombre_imagen_perfil de la BD es NOT NULL (es decir, si vacio)
            $('#imagendeperfil').attr('src', '../../imgpordefecto/no-imagen.jpg'); //attr sustituye el src de la imagen
        } else {
            let comprobarDirectorio = new Request('fotodeperfiles/' + data[0].RUT + '/' + data[0].NOMBREIMAGEN);
            fetch(comprobarDirectorio).then(function (respuesta) {
                // console.log("codigo: "+respuesta.status);
                if (respuesta.status == 200) {
                    $('#imagendeperfil').attr('src', 'fotodeperfiles/' + data[0].RUT + '/' + data[0].NOMBREIMAGEN);
                } else {
                    $('#imagendeperfil').attr('src', '../../imgpordefecto/no-imagen.jpg');
                }

            }).catch(function (error) {
                console.log(error);
            });
        }
    });

    $.post('funciones/fun_llena_select.php', { seleccionar: 1, subselect: 1 }, function (respuesta) {
        //console.log("RESP1: " + respuesta);
        if (respuesta == 1) { //No hay regiones registradas
            $('#s1').hide(); $('#s2').hide();
            $('#a1').removeAttr('hidden'); $('#a2').removeAttr('hidden');
        } else {
            $('#region').html(respuesta);
            let region = $('#region').val(); //toma el valor por defecto de la sesion 
            $.post('funciones/fun_llena_select.php', { seleccionar: 1, subselect: 2, regionseleccionada: region }, function (respuesta) {
                //  console.log("RESP2: " + respuesta);
                if (respuesta == 1) { //No hay comunas registradas
                    $('#s2').hide();
                    $('#a2').removeAttr('hidden');
                } else if (respuesta == 2) { //No hay regiones registradas
                    $('#s1').hide();
                    $('#a1').removeAttr('hidden');
                } else {
                    $('#comuna').html(respuesta);
                }
            }).fail(function () { swalfire("No se pudo cargar el selector", "error") });

        }
    }).fail(function () { swalfire("No se pudo cargar el selector", "error") });

}