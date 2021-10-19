function enviarcorreo() {
    form = $("#form-reestablecer-contra");
    var formData = new FormData(form[0]); //form[0]
    formData.append('seleccionar', '1');

    let contra1 = $("#contrasena1").val();
    let contra2 = $("#contrasena2").val();
    let correo = $("#correoencriptado").val();

    if (validavacioynulo([contra1, correoencriptado])) {
        NotifTipoIntranet("Advertencia", "Campo(s) vacio(s)", "warning"); //swalfire("¡Campo(s) vacio(s)!", "error");
    } else if (contra1 != contra2) {
        NotifTipoIntranet("Advertencia", "Las contraseñas no coinciden", "warning");
        // swalfire("Las contraseñas no coinciden", "error");
    } else if (contra1.length < 2 || contra1.length > 255) {
        NotifTipoIntranet("Advertencia", "Longitud de la contraseña inválido, mínimo 2 y máximo 255 caracteres permitidos", "warning");
        // swalfire("¡Longitud de la contraseña inválido, mínimo 2 y máximo 255 caracteres permitidos!", "error");
    } else {
        $.ajax({
            type: 'POST',
            url: 'funciones/acceso.php',
            data: formData,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            // beforeSend: function () {
            //     // form[0].reset(); 
            // }
        }).done(function (respuesta) {
            console.log(respuesta);

            if (respuesta == 1) {
                NotifTipoIntranet("Advertencia", "¡Campos vacios , compruebe datos!", "warning");
                // swalfire("¡Campos vacios , compruebe datos!", "error");
            } else if (respuesta == 2) {
                form[0].reset();
                NotifTipoIntranet("Exito", "¡Cambio de Contraseña Exitoso!", "success");
                // swalfire("¡Cambio de Contraseña Exitoso!", "success");
                $.post('../Notificaciones/reestablecercontra/cambioclaveexitoso.php', { correoencriptado: correo }, function (respuesta) {
                    if (respuesta == 1) {
                        location.href = '../login/';
                    } else if (respuesta == 2) {
                        NotifTipoIntranet("Error", "Ha ocurrido un error al enviar correo", "error");
                        console.log("¡Ha ocurrido un error al enviar correo!");
                    }
                });
            } else if (respuesta == 3) {
                NotifTipoIntranet("Error", "Ha ocurrido un error al reestablecer la contraseña", "error");
                // swalfire("¡Ha ocurrido un error al reestablecer la contraseña!", "error");
            } else if (respuesta == 4 || respuesta == 444) {
                NotifTipoIntranet("Información", "No se recibieron parámetros", "info");
                // swalfire("¡No se recibieron parámetros!", "error");
            } else if (respuesta == 5) {
                NotifTipoIntranet("Error", "Ha ocurrido un error, si el problema persiste, por favor contacte a soporte", "error");
                // swalfire("¡Ha ocurrido un error, si el problema persiste, por favor contacte a soporte!", "error");
            } else if (respuesta == 6) {
                NotifTipoIntranet("Información", "El funcionario se encuentra inactivo", "info");
                // swalfire("¡El funcionario se encuentra inactivo!", "error");
            } else if (respuesta == 7) {
                $('#contienelogin').html('<div class="alert alert-danger mt-3" role="alert">El tiempo para reestablecer la contraseña ha caducado.</div>');
                NotifTipoIntranet("Información", "El tiempo para reestablecer ha caducado", "info");
            } else if (respuesta == 8) {
                $('#contienelogin').html('<div class="alert alert-danger mt-3" role="alert">No tiene reestablecimientos asociados.</div>');
                NotifTipoIntranet("Información", "No tiene reestablecimientos asociados", "info");
            }

        }).fail(function (res) {
            console.log("¡Error! " + res);
        });
    }
}