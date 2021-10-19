function formularioFirmaDigital() {
    form = $("#formfirmadigital");

    let firmadigital = $('#firmabase64').val();

    var formData = new FormData(form[0]); //form[0]

    formData.append('seleccionar', '1');

    // for (var i of formData.entries()) {
    //     console.log(i[0] + ', ' + i[1]);
    // }

    // formData.append('idregionselected', region); //lo uso para reestablecer la sesion 

    // console.log("FIRMA: " + firmadigital + "\nNOMBREROL: " + rol);

    if (validavacioynulo([firmadigital])) { toastr.error("Debe dibujar la firma", "Un momento"); return; }
    else {
        // toastr.success("¡Bieeeeeeeeen!");
        $.ajax({
            type: 'POST',
            url: 'funciones/acciones.php',
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
                toastr.error("Campos vacio, no se ha recibido la firma digital");
            } else if (respuesta == 2) {
                toastr.error("¡Ha ocurrido un error al subir la firma digital!", "un momento");
            } else if (respuesta == 3) {
                refrescaimagen();
                // location.reload();
                toastr.success("¡Firma subida!");
                sig.signature('clear');
                $("#firmabase64").val('');
                
            } else if (respuesta == 4) {
                toastr.error("No se han recibido parametros", "un momento");
            }
        }).fail(function (res) {
            console.log(res);
            swalfire("ERROR", "error");
        });
    }
}


// function formularioEditarContrasena() {
//     form = $("#formcontrasena");

//     let contrasenaactual = $('#contrasena').val();
//     let contrasenanueva1 = $('#contranueva1').val();
//     let contrasenanueva2 = $('#contranueva2').val();

//     if (validavacioynulo([contrasenaactual, contrasenanueva1, contrasenanueva2])) { swalfire("¡Campos vacíos inválidos!", "info"); }
//     else if (contrasenaactual.length < 2 || contrasenaactual.length > 200) { swalfire("Tamaño de la contraseña actual, \nmínimo: 2 y máximo: 200 caracteres", "info"); }
//     else if (contrasenanueva1.length < 2 || contrasenanueva1.length > 200) { swalfire("Tamaño de la primera contraseña nueva, \nmínimo: 2 y máximo: 200 caracteres", "info"); }
//     else if (contrasenanueva2.length < 2 || contrasenanueva2.length > 200) { swalfire("Tamaño de la contraseña de confirmacion, \nmínimo: 2 y máximo: 200 caracteres", "info"); }
//     else if (contrasenanueva1 != contrasenanueva2) { swalfire("contraseñas deben ser iguales", "info"); }
//     else {

//         $.post('funciones/fun_editar_perfil.php', { seleccionar: 2, actualpass: contrasenaactual, contrasenanueva: contrasenanueva1 }, function (respuesta) {
//             console.log("RESP EDITAR CONTRA: " + respuesta);
//             if (respuesta == 1) {
//                 swalfire("¡Campos vacios, compruebe datos!", "error");
//             } else if (respuesta == 2 || respuesta == 4) {
//                 swalfire("¡Ha ocurrido un error al editar contraseña!", "error");
//             } else if (respuesta == 3) {
//                 swalfire("Las contraseña actual no coincide", "error");
//             } else if (respuesta == 5) {
//                 form[0].reset();
//                 // limpiacampocontrasenas();
//                 swalfire("¡Contraseña cambiada exitosamente!", "success");
//             } else if (respuesta == 6 || respuesta == 444) {
//                 swalfire("¡No se ha recibido los parametros!", "error");
//             }
//         }).fail(function () { swalfire("No se pudo cargar el selector", "error") });

//     }
// }