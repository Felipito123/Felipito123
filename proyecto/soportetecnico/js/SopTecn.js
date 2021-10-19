var scrollearoriginal;
var scrollear2;
var minscrollear;
$(document).ready(function () {

    let bajarscroll = 0;

    mostrarComentarios();
    function mostrarComentarios() {
        $.post('funciones/acceso.php', {
            seleccionar: 1
        }, function (respuesta) {
            // let ResR= JSON.parse(respuesta);
            if (respuesta == 1) {
                console.log("No existe soporte técnico");
            } else {
                // console.log("Respuesta: " + respuesta);
                $('#contenidomensajes').html(respuesta);

                if (bajarscroll == 0) {
                    $("#cardbodyscroll").animate({ scrollTop: $('#cardbodyscroll').prop("scrollHeight") }, 0);
                    scrollearoriginal = $('#cardbodyscroll').scrollTop();
                    minscrollear = scrollearoriginal - 350;
                    bajarscroll++;
                }

                // if (scrollearoriginal < minscrollear) {
                //     $(".btnscrol").fadeIn();
                // }else{
                //     $(".btnscrol").fadeOut();
                // }

                // alertify.success("original: " + scrollearoriginal+" minimo: " + minscrollear);

                $('#cardbodyscroll').scroll(function (event) {
                    var scroll = $('#cardbodyscroll').scrollTop();
                    //alertify.success("minimo: " + minimo);
                    // alertify.success("original: " + scroll+" minimo: " + minscrollear);
                    if (scroll < minscrollear) {
                        $(".btnscrol").fadeIn();
                    } else {
                        $(".btnscrol").fadeOut();
                    }
                });

                // console.log("contador scroll: " + bajarscroll);
            }
        });

        $.post('funciones/acceso.php', { seleccionar: 4 }, function (respuesta) {
            let jsonresp, contador;
            jsonresp = JSON.parse(respuesta);
            contador = jsonresp.length;
            // console.log("LLENAR PANEL 2: " + respuesta);
            // console.log("LARGO DEL ARRAY: " + contador);
            //LLENADO DEL PANEL
            $('#cant_msj_enviados').text(jsonresp[0].mensajes_enviados);
            $('#cant_msj_eliminados').text(jsonresp[1].mensajes_eliminados);
        }).fail(function () {
            toastr.info("Ha ocurrido un error al cargar el segundo panel");
        });

    }

    $(document).on('click', '.btnscrol', function () {
        $("#cardbodyscroll").animate({ scrollTop: $('#cardbodyscroll').prop("scrollHeight") }, 1000);
    });

    $(document).on('click', '.botoneliminar', function () {
        let valor = $(this).val();
        $.post('funciones/acceso.php', {
            seleccionar: 3, iden: parseInt(valor)
        }, function (respuesta) {
            // console.log("Respuesta: " + respuesta);
            if (respuesta == 1) {
                toastr.error('No se ha recibido parametros', 'UpS!');
            } else if (respuesta == 2) {
                toastr.error('El comentario ya se encuentra eliminado.', 'UpS!');
                mostrarComentarios();
            } else if (respuesta == 3) {
                toastr.error('No se pudo eliminar el comentario, si el problema persiste, por favor envie un correo a soporte.', 'UpS!');
            } else if (respuesta == 4) {
                mostrarComentarios();
                // toastr.success('Comentario eliminado');
            } else if (respuesta == 5) {
                toastr.error('No se ha recibido parametros', 'UpS!');
            }
        });
        // NotifTipoIntranet("Exito", "Valor: " + valor, "success");
    });

    $('#comentarioasoporte').on('keydown', function (ev) { //si se presiona enter en el último input se activa el formulario
        if (ev.key === 'Enter') {
            $('#botonenviarcomentario').trigger("click");
        }
    });

    $("#formComentar").on('submit', function (event) {
        event.preventDefault();
        agregarcomentario();
    });

    function agregarcomentario() {
        form = $("#formComentar");
        let comentario = $('#comentarioasoporte').val();

        // console.log("Comentario: " + comentario);

        if (validavacioynulo([comentario])) { toastr.info('Campo Comentario vacio'); }
        else {
            $.post('funciones/acceso.php', {
                seleccionar: 2, comentario: comentario
            }, function (respuesta) {
                // console.log("Respuesta: " + respuesta);
                if (respuesta == 1) {
                    toastr.error('No se ha recibido parametros', 'UpS!');
                } else if (respuesta == 2) {
                    toastr.error('No se pudo ingresar el comentario, si el problema persiste, por favor envie un correo a soporte.', 'UpS!');
                } else if (respuesta == 3) {
                    mostrarComentarios();
                    $("#cardbodyscroll").animate({ scrollTop: $('#cardbodyscroll').prop("scrollHeight") }, 500);
                    form[0].reset();
                    // toastr.success('Comentario registrado');
                } else if (respuesta == 4) {
                    toastr.error('No existe funcionario encargado de soporte técnico', 'UpS!');
                } else if (respuesta == 5) {
                    toastr.error('No se ha recibido parametros', 'UpS!');
                }
            });
        }
    }

    setInterval(function () {
        mostrarComentarios();
    }, 2000);

});

