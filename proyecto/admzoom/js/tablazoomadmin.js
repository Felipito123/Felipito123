//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {
    const url = window.location.search;
    const buscaparametro = new URLSearchParams(url);
    const variableabuscar = buscaparametro.get('p');

    if (variableabuscar == 'yaexiste') { alertify.success("Ya existe"); limpiaGetenURL(); }
    else if (variableabuscar == 'exito') { alertify.success("Token creado"); limpiaGetenURL(); }

    tablazoom = $('#tabla-zoom').DataTable({
        "responsive": true,
        "bAutoWidth": false, //LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "lengthMenu": [[5, 12, 36, 48, -1], [5, 12, 36, 48, "All"]],
        "ajax": {
            "url": "funciones/fun_llenar_tabla_zoom.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            /*<a href="" download></a>*/
            { "data": "ID_REUNION" },//CODIGO_REUNION
            { "data": "CODIGO_REUNION" },
            { "data": "ASUNTO_REUNION" },
            {
                "data": "URL_REUNION",
                "render": function (data, type, JsonResultRow, row) {
                    //Agregue el onclick para que no se mostrara la ruta, tengo que seguir mejorando para que no se muestra la ruta en la nueva pestaña
                    //onclick="location.href=\'planillaArchivo/' + JsonResultRow.ID_PLANILLA + '/' + data +' \'"
                    //href="planillaArchivo/' + JsonResultRow.ID_PLANILLA + '/' + data + '"
                    return '<a href="' + data + '"  class="btn btn-danger btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;background-color:red;" target="_blank" id="aaa">Iniciar</a>';
                }

            },
            //{ "data": "FECHA_REUNION" },
            {
                "data": "FECHA_REUNION",
                "render": function (data, type, JsonResultRow, row) {
                    let var1 = data.split('T');//Ej: 2020-11-12T15:09:00 , en var1[0]=2020-11-12 y en var1[1]=15:09:00
                    let v1 = var1[0].split('-'); // voy a dar vuelta los valores ya que la fecha se muestra al reves 2020-11-04
                    //return v1[2]+v1[1]+v1[0]; //dia, mes, añ0
                    return v1[2] + '-' + v1[1] + '-' + v1[0] + ' ' + var1[1];
                }

            },
            {
                "data": "DURACION_REUNION",
                "render": function (data, type, JsonResultRow, row) {
                    return data + ' minutos';
                }
            },
            //{ "data": "DURACION_REUNION" },
            { "data": "CONTRASENA_REUNION" },
            { "data": "ESTADO_REUNION" },
            {
                "data": "DURACION_REUNION",
                "render": function (data, type, JsonResultRow, row) {

                    return `<div class='row justify-content-center'>
                    <div class='col align-items-center'>
                    <label class='btn btn-primary btn-sm btnVisualizarDestinatarios' title='Visualizar Destinatarios' ><i class='fa fa-eye' aria-hidden='true'></i> Visualizar</label>
                    </div>`;
                    // return data + ' minutos';
                }
            },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    // "<div class='btn-group'>" +  
                    "<label class='btn btn-info btn-circle btn-sm btnEditar' title='Editar' ><i class='fa fa-pencil-square-o' aria-hidden='true'></i></label>" +
                    "<label class='btn btn-success btn-circle btn-sm btnActivo' title='Activar'><i class='fa fa-check-circle' aria-hidden='true'></i></label>" +
                    "<label class='btn btn-warning btn-circle btn-sm btnPendiente' style='color:white' title='Pendiente'><i class='fa fa-minus-circle' aria-hidden='true'></i></label>" + //times-circle
                    "<label class='btn btn-info btn-circle btn-sm btnFinalizar' style='color:white' title='Finalizar'><i class='fa fa-times-circle' aria-hidden='true'></i></label>" +
                    "<label class='btn btn-secondary btn-circle btn-sm btnCopiar' style='color:white' title='Copiar link'><i class='fas fa-copy'></i></label>" +
                    "<label class='btn btn-danger btn-circle btn-sm btnBorrar' style='color:white' title='Eliminar'><i class='fa fa-trash-o' aria-hidden='true'></i></label>" +
                    // "</div>" +
                    "</div>" +
                    "</div>"
            }
        ], "columnDefs": [{

            "targets": [0], //oculto la columna que tiene posición 0
            "visible": false,
            "searchable": true
        },

        ],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="5">5</option>' +
                '<option value="12">12</option>' +
                '<option value="36">36</option>' +
                '<option value="48">48</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay videoconferencias agendadas",
            "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Filtrar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Por favor espere - cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }

    });
    //===================================================================LLENADO DE DATATABLE===================================================================//     


    // $.post('funciones/enviarcorreo.php', { boton: 1 }, (respuesta) => {
    //     console.log(respuesta);

    //     // console.log("R1: "+JSON.stringify(respuesta)); //JSON.parse
    //     // console.log("R2: "+JSON.parse(JSON.stringify(respuesta)));
    //     // console.log("R3: "+JSON.parse(respuesta));
    //     // console.log("R4: "+JSON.stringify(JSON.parse(respuesta)));

    //     if (respuesta.length > 0) {
    //         //let a = JSON.stringify(respuesta);
    //         for (let i = 0; i < respuesta.length; i++) {
    //            console.log(respuesta[i].CORREO+'\n');
    //             // $.post('../notificaciones/enviacorreo.php', { correo: a[i].correo, stock: a[i].Stock_total, material: a[i].NOMBRE_MATERIAL }, function (responses) {
    //             //     console.log(responses);
    //             // });
    //         }
    //     }
    // });

    // let tablazoom = $("#tabla-zoom").DataTable();

    $("#form-zoom").on('submit', function (event) {
        event.preventDefault();
        form = $("#form-zoom");

        let asunto = $("#asunto").val();
        let duracion = $("#duracion").val();
        let fecha = $("#fechaS").val();
        let hora = $("#hora").val();
        let contra = $("#contra").val();
        let varaño = fecha.split("-");

        var formData2 = new FormData(form[0]);
        // var formData3 = new FormData(form[0]);

        for (var i of formData2.entries()) {
            console.log("1: " + i[0] + ', ' + i[1]);
        }

        // for (var i of formData3.entries()) {
        //     console.log("2: "+i[0] + ', ' + i[1]);
        // }

        //anoactual lo tomo de topbar
        if (validavacioynulo([asunto, duracion, fecha, hora, contra])) { toastr.info("Campo(s) vacio(s)!"); }
        else if (duracion.length > 3) { toastr.info("Largo duración excedido"); }
        else if (hora.length > 5) { toastr.info("Largo hora excedido"); }
        else if (fecha.length > 10) { toastr.info("Largo fecha excedido"); }
        else if (varaño[0] < anoactual) {
            toastr.info('La fecha debe ser en el año presente o futuro');
        } else if (!esunnumero(duracion) || duracion < 0) { toastr.info("Formato duracion incorrecto"); }
        else if (esunnumero(fecha) || fecha < 0) { toastr.info("Formato fecha incorrecto"); }
        else if (esunnumero(hora) || hora < 0) { toastr.info("Formato hora incorrecto"); }
        else {
            // console.log("asunto: " + asunto + "\nduracion: " + duracion + "\nfecha: " + fecha + "\nhora: " + hora + "\ncontra: " + contra);

            $.ajax({
                type: 'POST',
                url: '../Zoom/crear.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false
            }).done(function (respuesta) {
                console.log("RESP1: " + respuesta);
                if (respuesta == 1) {
                    form[0].reset();
                    $('.selector-multiple').select2('');
                    tablazoom.ajax.reload(null, false);
                    cargadecorreozoom();
                    formData2.append('tipoBTN', 5);
                    $.ajax({
                        type: 'POST',
                        url: 'funciones/fun_acciones_zoom.php',
                        data: formData2,
                        dataType: 'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            //form[0].reset(); //LUEGO DE ENVIAR SE RESETE O LIMPIE EL FORMULARIO, SINO QUEDAN GUARDADOS ALGUNOS DATOS AL VOLVER ATRÁS
                        }
                    }).done(function (respuesta2) {

                        if (respuesta2 == 400) {
                            toastr.error("Ha ocurrido un error. Si el problema persiste, por favor contacte a soporte.");
                        } else {
                            // console.log("RESP2: " + respuesta2);
                            var totalregistros = respuesta2.length;
                            // console.log("TOTAL REGISTROS: " + totalregistros);
                            if (totalregistros > 0) {
                                var contador = 0;
                                for (let i = 0; i < totalregistros; i++) {
                                    // console.log("cor: "+a[i].CORREO); //respuesta2[i].CORREO
                                    $.post('../Notificaciones/reunionzoom/', { correo: respuesta2[i].CORREO }, function (responses) {
                                        contador = contador + 1;
                                        if (totalregistros == contador) {
                                            $(".swal2-container").attr("hidden", true);
                                            toastr.success("Reunión agendada y notificaciones enviadas");
                                        } if (responses == 1) {
                                            console.log("Reunión agendada y notificaciones enviadas");
                                        } else if (responses == 2) {
                                            console.log("Hubo un error al enviar las notificaciones");
                                        } else if (responses == 3) {
                                            console.log("No se han recibido parámetros");
                                        }
                                    });
                                }
                            } else {
                                console.log("No hay más datos");
                            }
                        }

                    });


                } else if (respuesta == 2) {
                    toastr.error("¡Error al guardar reunión!");
                } else if (respuesta == 3) {
                    toastr.error("¡Intente nuevamente!");
                }
            }).fail(function (res) {
                console.log(res);
                toastr.error("Es recomendable clickear el botón <strong>Generar Token</strong>. Si el problema persiste, por favor, contacte a soporte. ", "Un momento");
            });
        }

    });



    $(document).on('click', '.btnEditar', function () {

        $('#modal-zoom').modal();

        let identificador = (tablazoom.row($(this).closest('tr')).data().ID_REUNION);
        let codigozoom = (tablazoom.row($(this).closest('tr')).data().CODIGO_REUNION);
        let asunto = (tablazoom.row($(this).closest('tr')).data().ASUNTO_REUNION);
        let duracion = (tablazoom.row($(this).closest('tr')).data().DURACION_REUNION);
        let fechacompleta = (tablazoom.row($(this).closest('tr')).data().FECHA_REUNION);
        let contrasena = (tablazoom.row($(this).closest('tr')).data().CONTRASENA_REUNION);

        /*$(function () { //Por conflicto entre modals, ya que tengo el de agregar y editar. Uno de los dos no se mostraba
            $("#modalzoom").appendTo("body");
        });*/
        var porciones = fechacompleta.split('T');
        //console.log(porciones[1]);

        $('#idmodal').val(identificador);
        $('#codigozoommodal').val(codigozoom);
        $('#asuntomodal').val(asunto);
        $('#duracionmodal').val(duracion);
        $('#fechamodal').val(porciones[0]);
        $('#horamodal').val(porciones[1]);
        $("#contramodal").val(contrasena);

    });


    //=======================================================================MODIFICAR REUNION ZOOM==================================================================== //
    $("#form-modal-zoom").on('submit', function (event) {
        event.preventDefault(); //RETIENE LA RECARGA 
        modificarZoom();
    });
    //=======================================================================MODIFICAR REUNION ZOOM==================================================================== //


    //=======================================================================BOTON ACTIVAR ================================================================================= //
    $(document).on("click", ".btnActivo", function () {
        let tipoboton = 1; //botonActivar
        let IDBTN = (tablazoom.row($(this).closest('tr')).data().ID_REUNION);

        Swal.mixin({
            icon: "warning",
            //puede ser text, number, email, password, textarea, select, radio
            confirmButtonText: 'Confirmar ',
            cancelButtonText: 'Cancelar ',
            confirmButtonColor: "#a00",
            showCancelButton: true
        }).queue([
            {
                title: '¡Un momento!',
                text: '¿Desea Activar La Reunión?',
            }
        ]).then((respuesta) => {
            if (respuesta.value) {
                $.post('funciones/fun_acciones_zoom.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton) }, function (respuesta) {
                    console.log("Activa: " + respuesta);
                    if (respuesta == 1) {
                        toastr.info("Parámetros vacíos");
                    } else if (respuesta == 2) {
                        toastr.info("Reunión ya está activa");
                    } else if (respuesta == 3) {
                        toastr.info("Ha ocurrido un error, si el problema persiste, contacte a soporte");
                    } else if (respuesta == 4) {
                        toastr.success("Reunión Activada");
                        tablazoom.ajax.reload(null, false);
                    } else if (respuesta == 5) {
                        toastr.info("Parámetros vacíos");
                    }
                });
            } else {
                //swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });
    });
    //=======================================================================BOTON ACTIVAR ================================================================================= //

    //=======================================================================BOTON PENDIENTE ================================================================================= //
    $(document).on("click", ".btnPendiente", function () {
        let tipoboton = 2; //botonInactivo
        let IDBTN = (tablazoom.row($(this).closest('tr')).data().ID_REUNION);

        Swal.mixin({
            icon: "warning",
            //puede ser text, number, email, password, textarea, select, radio
            confirmButtonText: 'Confirmar ',
            cancelButtonText: 'Cancelar ',
            confirmButtonColor: "#a00",
            showCancelButton: true
        }).queue([
            {
                title: '¡Un momento!',
                text: '¿Desea dejar pendiente la Reunión?',
            }
        ]).then((respuesta) => {
            if (respuesta.value) {
                $.post('funciones/fun_acciones_zoom.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton) }, function (respuesta) {
                    console.log("PENDIENTE: " + respuesta);
                    if (respuesta == 1) {
                        toastr.info("Parámetros vacíos");
                    } else if (respuesta == 2) {
                        toastr.info("Reunión ya está pendiente");
                    } else if (respuesta == 3) {
                        toastr.info("Ha ocurrido un error, si el problema persiste, contacte a soporte");
                    } else if (respuesta == 4) {
                        toastr.success("Reunión Pendiente");
                        tablazoom.ajax.reload(null, false);
                    } else if (respuesta == 5) {
                        toastr.info("Parámetros vacíos");
                    }
                });
            } else {
                //swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });
    });
    //=======================================================================BOTON PENDIENTE ================================================================================= //


    //=======================================================================BOTON FINALIZAR ================================================================================= //
    $(document).on("click", ".btnFinalizar", function () {
        let tipoboton = 3; //btnFinalizar
        let IDBTN = (tablazoom.row($(this).closest('tr')).data().ID_REUNION);
        let tablareunionesterminadas = $("#tabla-admin-zoom-finalizada").DataTable();
        Swal.mixin({
            icon: "warning",
            //puede ser text, number, email, password, textarea, select, radio
            confirmButtonText: 'Confirmar ',
            cancelButtonText: 'Cancelar ',
            confirmButtonColor: "#a00",
            showCancelButton: true
        }).queue([
            {
                title: '¡Un momento!',
                text: '¿Desea Finalizar la Reunión?',
            }
        ]).then((respuesta) => {
            if (respuesta.value) {
                $.post('funciones/fun_acciones_zoom.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton) }, function (respuesta) {
                    console.log("FINALIZADA: " + respuesta);
                    if (respuesta == 1) {
                        toastr.info("Parámetros vacíos");
                    } else if (respuesta == 2) {
                        toastr.info("Reunión ya está finalizada");
                    } else if (respuesta == 3) {
                        toastr.info("Ha ocurrido un error, si el problema persiste, contacte a soporte");
                    } else if (respuesta == 4) {
                        tablazoom.ajax.reload(null, false); //Recarga la tabla sin verse
                        tablareunionesterminadas.ajax.reload(null, false);
                        toastr.success("Reunión Finalizada");
                    } else if (respuesta == 5) {
                        toastr.info("Parámetros vacíos");
                    }
                });
            } else {
                //swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });
    });
    //=======================================================================BOTON FINALIZAR ================================================================================= //


    //===================================================================BOTON ELIMINAR===================================================================// 

    $(document).on('click', '.btnBorrar', function () {
        let iden = (tablazoom.row($(this).closest('tr')).data().ID_REUNION);
        let codigo = (tablazoom.row($(this).closest('tr')).data().CODIGO_REUNION);
        Swal.mixin({
            icon: "warning",
            //puede ser text, number, email, password, textarea, select, radio
            confirmButtonText: 'Confirmar ',
            cancelButtonText: 'Cancelar ',
            confirmButtonColor: "#a00",
            showCancelButton: true
        }).queue([
            {
                title: '¡Un momento!',
                text: 'La Reunión será eliminada y no se podra recuperar',
            }
        ]).then((result) => {
            if (result.value) {
                console.log(iden);
                $.post('../Zoom/borrar.php', { ID: iden, CODIGOREUNION: codigo }, function (response) {
                    console.log(response);
                    if (response == 1) {
                        toastr.error("¡Ha ocurrido un error, si el problema persiste, contacte a soporte!");
                    } else if (response == 2) {
                        tablazoom.ajax.reload(null, false);
                        tablareunionesterminadas.ajax.reload(null, false);
                        toastr.success("¡Eliminado exitosamente!");
                    } else if (response == 3) {
                        toastr.error("¡No se recibieron parametros!");
                    }
                })
            } else {
                // swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });


    });

    //===================================================================BOTON ELIMINAR===================================================================// 

    $(document).on('click', '.btnCopiar', function () {

        alertify.success("Copiado en el portapapeles");

        let url = (tablazoom.row($(this).closest('tr')).data().URL_REUNION);
        $('#copiarurl').val(url);
        funcioncopiar();
        // tippy('#btnCopiar', {
        //   content: 'My tooltip!',
        // });
    });

    $(document).on('click', '#generatoken', function () {
        $.post('../Zoom/callback.php', { tipoBTN: 1 }, function (response) {
            // console.log("RESPUESTA TOKEN: "+response);
            if (response == 1) {
                swalfire("¡Token generado correctamente!", "success");
            } else if (response == 2) {
                swalfire("¡Hubo algún error!", "success");
                //    console.log("¡Hubo algún error!");
            }
        }).fail(function (xhr, status, error) {
            console.log("¡ERRORE!" + error + "estado: " + status);
        });
    });


    function funcioncopiar() {
        /* Get the text field */
        var copyText = document.getElementById("copiarurl");
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        /* Copy the text inside the text field */
        document.execCommand("copy");
        /* Alert the copied text */
        // console.log("Copied the text: " + copyText.value);
    }

    $(document).on("click", ".btnVisualizarDestinatarios", function () {
        let idreunion = (tablazoom.row($(this).closest('tr')).data().ID_REUNION);
        let rutcreador = (tablazoom.row($(this).closest('tr')).data().RUT_CREADOR);
        let imagencreador = (tablazoom.row($(this).closest('tr')).data().IMAGEN_CREADOR);
        let nombrecreador = (tablazoom.row($(this).closest('tr')).data().NOMBRE_CREADOR);

        // alertify.success("ID: "+idreunion+"RUT: "+rutcreador+" IMAGEN: "+imagencreador+" NOMBRE: "+nombrecreador);

        MuestraDestinatarios(rutcreador, imagencreador, nombrecreador);

        $.post('funciones/fun_acciones_zoom.php', { tipoBTN: 6, IDREUN: idreunion }, function (respuesta) {
            // console.log("ACTIVACIÓN: " + respuesta);
            let parseo = JSON.parse(respuesta);
            let largo = parseo.length;
            let i = 0;
            let concatenar = ``;
            while (i < largo) {
                concatenar += `
                <div class="card_perfil">
                    <div class="card_image"> <img class="img-fluid" src="../perfil/fotodeperfiles/`+ parseo[i].RUT_DESTINATARIO + `/` + parseo[i].IMG_DESTINATARIO + `" /> </div>
                    <div class="card_title text-light">
                        <p>`+ parseo[i].NOMBRE_DESTINATARIO + `</p>
                    </div>
                </div>
                `;
                i++;
            }

            $('#lista').html(concatenar);
            // if (respuesta == 1 || respuesta == 444) {
            //     swalfire("¡Parámetros vacíos!", "info");
            // } else if (respuesta == 2) {
            //     swalfire("¡Documento ya está activo!", "info");
            // }
        });
    });


    tablausuariozoomfinalizada = $('#tabla-admin-zoom-finalizada').DataTable({
        "responsive": true,
        "paging": false,  //le oculto la paginación
        "searching": false, //le oculto el buscador
        "info": false,  //le oculto la información de las entradas de la tabla
        "cache": false,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        //"lengthMenu": [[5, 12, 36, 48, -1], [5, 12, 36, 48, "All"]],
        "ajax": {
            "url": "funciones/fun_llenar_tabla_reunionfinalizada.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "ASUNTO_REUNION" },
            //{ "data": "FECHA_REUNION" },
            {
                "data": "FECHA_REUNION",
                "render": function (data, type, JsonResultRow, row) {
                    let var1 = data.split('T');//Ej: 2020-11-12T15:09:00 , en var1[0]=2020-11-12 y en var1[1]=15:09:00
                    let v1 = var1[0].split('-'); // voy a dar vuelta los valores ya que la fecha se muestra al reves 2020-11-04
                    //return v1[2]+v1[1]+v1[0]; //dia, mes, añ0
                    return v1[2] + '-' + v1[1] + '-' + v1[0] + ' ' + var1[1];
                }

            },
            { "data": "DURACION_REUNION" },
            { "data": "CONTRASENA_REUNION" },
            { "data": "ANFITRION_REUNION" },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<div class='btn-group'>" +
                    "<label class='btn btn-success btn-sm btnActivarFinalizada' title='Reanudar reunión'><i class='fa fa-check-circle' aria-hidden='true'></i> Reanudar</label>" +
                    "<label class='btn btn-primary btn-sm btnVerDest' style='color:white' title='Ver destinatarios'><i class='fas fa-bezier-curve' aria-hidden='true'></i> Destinatarios</label>" + //times-circle
                    "</div>" +
                    "</div>" +
                    "</div>"
            }
        ], "columnDefs": [{

            "targets": [], //oculto la columna que tiene posición 0
            "visible": false,
            //"searchable": false //true
        },

        ],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="5">5</option>' +
                '<option value="12">12</option>' +
                '<option value="36">36</option>' +
                '<option value="48">48</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay videoconferencias terminadas",
            "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Filtrar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Por favor espere - cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }

    });

    $(document).on("click", "#limpiarreuniones", function () {
        // let tipoboton = 4;
        // $.post('funciones/fun_acciones_zoom.php', { tipoBTN: parseInt(tipoboton) }, function (respuesta) {
        //     console.log("NO VISIBLE: " + respuesta);
        //     if (respuesta == 1) {
        //         toastr.info("Ha ocurrido un error, si el problema persiste, contacte a soporte");
        //     } else if (respuesta == 2) {
        //         tablareunionesterminadas.ajax.reload(null, false);
        //         toastr.success("Registros limpiados");
        //     }
        // });
    });

    $(document).on("click", ".btnVerDest", function () {
        let idreunion = (tablareunionesterminadas.row($(this).closest('tr')).data().ID_REUNION);
        let rutcreador = (tablareunionesterminadas.row($(this).closest('tr')).data().RUT_CREADOR);
        let imagencreador = (tablareunionesterminadas.row($(this).closest('tr')).data().IMAGEN_CREADOR);
        let nombrecreador = (tablareunionesterminadas.row($(this).closest('tr')).data().NOMBRE_CREADOR);

        // alertify.success("ID: "+idreunion+"RUT: "+rutcreador+" IMAGEN: "+imagencreador+" NOMBRE: "+nombrecreador);

        MuestraDestinatarios(rutcreador, imagencreador, nombrecreador);

        $.post('funciones/fun_acciones_zoom.php', { tipoBTN: 6, IDREUN: idreunion }, function (respuesta) {
            // console.log("ACTIVACIÓN: " + respuesta);
            let parseo = JSON.parse(respuesta);
            let largo = parseo.length;
            let i = 0;
            let concatenar = ``;
            while (i < largo) {
                concatenar += `
                <div class="card_perfil">
                    <div class="card_image"> <img class="img-fluid" src="../perfil/fotodeperfiles/`+ parseo[i].RUT_DESTINATARIO + `/` + parseo[i].IMG_DESTINATARIO + `" /> </div>
                    <div class="card_title text-light">
                        <p>`+ parseo[i].NOMBRE_DESTINATARIO + `</p>
                    </div>
                </div>
                `;
                i++;
            }

            $('#lista').html(concatenar);
            // if (respuesta == 1 || respuesta == 444) {
            //     swalfire("¡Parámetros vacíos!", "info");
            // } else if (respuesta == 2) {
            //     swalfire("¡Documento ya está activo!", "info");
            // } else if (respuesta == 3) {
            //     swalfire("¡Ha ocurrido un error!", "error");
            // } else if (respuesta == 4) {
            //     swalfire("¡Documento activado!", "success");
            //     tabladocumentacion.ajax.reload(null, false);
            // }
        });
    });


    $(document).on("click", ".btnActivarFinalizada", function () {
        let idreunion = (tablareunionesterminadas.row($(this).closest('tr')).data().ID_REUNION);

        $.post('funciones/fun_acciones_zoom.php', { tipoBTN: 7, IDREUN: idreunion }, function (respuesta) {
            // console.log("ACTIVAR FINALIZADA: " + respuesta);
            if (respuesta == 1 || respuesta == 500) {
                toastr.info("¡Parámetros vacíos!");
            } else if (respuesta == 2) {
                toastr.info("¡Esta reunión no esta finalizada, por lo tanto no puede activar!");
            } else if (respuesta == 3) {
                toastr.info("¡Ha ocurrido un error, si el problema persiste, por favor contacte a soporte!");
            } else if (respuesta == 4) {
                toastr.success("¡Reunión activada!");
                tablazoom.ajax.reload(null, false);
                tablareunionesterminadas.ajax.reload(null, false);
            }
        });
    });


    function MuestraDestinatarios(rutcreador, imagencreador, nombrecreador) {

        Swal.fire({
            title: '<span style="color:white"> <strong>D E S T I N A T A R I O S</strong></span>',
            background: '#fff url("fondo.svg") fixed no-repeat',
            html: `
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="cards-list">

                        <div class="card_perfil_principal">

                            <div class="card_image"> 
                            <img class="img-fluid" src="../perfil/fotodeperfiles/`+ rutcreador + `/` + imagencreador + `" /> 
                            </div>
                            <div class="card_title text-white">
                                <p style="font-family:FANTASY">T I T U L A R <br> <small style="font-family:Arial"> `+ nombrecreador + `</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cards-list" id="lista">
            </div>

        </div>
        `,
            focusConfirm: false,
            showCancelButton: false,
            showConfirmButton: false,
            confirmButtonText: 'Responder &rarr;',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: "#858796",
            cancelButtonColor: "#858796",
            width: '1000px',
        });

    }


});


function limpiaGetenURL() {
    var url = location.href.split("?")[0];
    window.history.pushState('object', document.title, url);
}



function finalizarreunion() {
    tablareunionesterminadas = $("#tabla-admin-zoom-finalizada").DataTable();
    $.ajax({
        url: "funciones/fun_finalizareunion_zoom.php",
        type: "POST",
        datatype: "json",
        data: { tipoBTN: 3 },
        success: function () {
            /* swalalerta("Inactivo", "success");
             tablazoom.ajax.reload(null, false); //Recarga la tabla sin verse*/
        },
        error: function (request, status, error) {
            console.log(request.responseText);
        }
    }).done(function (respuesta) {

        // console.log(respuesta);

        if (respuesta == 1) {
            console.log("¡No se hizo consulta para finalizar reunion!");
        } else if (respuesta == 2) {
            console.log("¡Reunión Ha finalizado!");
            tablazoom.ajax.reload(null, false);
            tablareunionesterminadas.ajax.reload(null, false);
        } else if (respuesta == 3 || respuesta == 4) {
            console.log("¡Parámetros no recibidos!");
            // console.log("¡No hay reunión para finalizar!");
        }
        // else if (respuesta == 4) {
        //     //console.log("¡No datos en la BD para finalizar!");
        // }  else if (respuesta == 5) {
        //     console.log("¡No se ha recibido la acción del botón!");
        // } else if (respuesta == 6) {
        //     console.log("¡No se recibieron parametros!");
        // }
    });
}
setInterval(finalizarreunion, 3000);

