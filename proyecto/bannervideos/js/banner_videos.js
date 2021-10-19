//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {

    tabla_baner_videos = $('#tabla-banner-videos').DataTable({
        "responsive": true,
        "ordering": false,
        "lengthMenu": [[10, 16, 32, 64, -1], [10, 16, 32, 64, "All"]],
        "ajax": {
            "url": "funciones/fun_llenar_banner_videos.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [

            // { "data": "ID_BAN_VIDEOS" },
            { "data": "TITULO_BAN_VIDEOS" },
            { "data": "NOMBRE_BAN_VIDEOS" },
            {
                "data": "ESTADO_BAN_VIDEOS",
                "render": function (data, type, JsonResultRow, row) {
                    if (data == 0) {
                        return '<label class="btn btn-danger btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;font-weight: bold;">Inactivo</label>';
                    }
                    else {
                        return '<label class="btn btn-success btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;font-weight: bold;">Activo</label>';
                    }

                }
            },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<button class='btn btn-info btn-circle btn-sm btnEditar' title=\"Editar\" ><i class='fa fa-pencil-square-o' aria-hidde='true'></i></button>" +
                    "<button class='btn btn-success btn-circle btn-sm btnActivo' title='Activar'><i class='fa fa-check-circle' aria-hidden='true'></i></button>" +
                    "<button class='btn btn-warning btn-circle btn-sm btnInactivo' title='Inactivar'><i class='fa fa-minus-circle' aria-hidden='true' style='color:white'></i></button>" +
                    "<button class='btn btn-danger btn-circle btn-sm btnBorrar' title=\"Eliminar\"><i class='fa fa-trash-o' aria-hidde='true'></i></button>" +
                    "</div>" +
                    "</div>"
            }
        ], "columnDefs": [{

            "targets": [], //oculto la columna ID_BAN_IMAGENES que tiene posición 0
            "visible": false,
            "searchable": true
        },

        ],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="10">10</option>' +
                '<option value="16">16</option>' +
                '<option value="32">32</option>' +
                '<option value="64">64</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
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
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad",

            }
        },
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Generar informe en excel',
                className: 'btn btn-success'
            },

            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'Generar informe en PDF',
                className: 'btn btn-danger'
            },

            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]
    });

    //===================================================================LLENADO DE DATATABLE===================================================================//     


    let dtTable = $("#tabla-banner-videos").DataTable();

    //===================================================================AGREGAR BANNER IMAGEN===================================================================//      
    $("#formBannerVideo").on('submit', function (event) {
        form = $("#formBannerVideo");

        let titulovideobanner = $("#titulovideobanner").val();
        let videobanner = $("#videobanner").val(); //valor del input videobanner

        //console.log("Titulo: " + titulovideobanner + " Video:" + videobanner);

        if (validavacioynulo([titulovideobanner, videobanner])) { swalfire("Campo(s) vacio(s)", "error"); }
        else if (titulovideobanner.length < 2 || titulovideobanner.length > 55) { swalfire("El tamaño de titulo inválido, \nmínimo: 2 y máximo: 55 caracteres", "error"); }
        else if (!esunvideo(videobanner)) {
            swalfire("Formato inválido", "error");
        }
        else {
            $.ajax({
                type: 'POST',
                url: 'funciones/fun_agregar_banner_videos.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    //form[0].reset(); //LUEGO DE ENVIAR SE RESETE O LIMPIE EL FORMULARIO, SINO QUEDAN GUARDADOS ALGUNOS DATOS AL VOLVER ATRÁS
                }
            }).done(function (respuesta) {
                //console.log(respuesta);
                if (respuesta == 1) {
                    swalfire("Tamaño de la imagen excedida > 40 MB", "error");
                } else if (respuesta == 2) {
                    swalfire("¡Error al subir imagen!", "error");
                } else if (respuesta == 3) {
                    swalfire("Error al mostrar el último id", "error");
                } else if (respuesta == 4) {
                    swalfire("¡Video subido!", "success");
                    dtTable.ajax.reload(null, false);
                    form[0].reset();
                } else if (respuesta == 5) {
                    swalfire("¡El formato del video no es válido!", "error");
                } else if (respuesta == 6) {
                    swalfire("¡No se ha recibido el parametro!", "error");
                } else if (respuesta == 7) {
                    swalfire("¡Parámetros vacíos!", "info");
                } else if (respuesta == 8) {
                    swalfire("El tamaño de titulo inválido, \nmínimo: 2 y máximo: 55 caracteres", "info");
                } else if (respuesta == 9) {
                    toastr.error("Existe el mismo titulo vinculado a un banner");
                } else if (respuesta == 10) {
                    toastr.error("Existe el mismo video vinculado a un banner");
                }  else {
                    swalfire("ERROR 1", "error");
                }

            }).fail(function (res) {
                console.log(res);
                swalfire("ERROR 2", "error");
            });

        }

        event.preventDefault();

    });

    //===================================================================AGREGAR BANNER IMAGEN===================================================================//   

    //===================================================================BOTON EDITAR DEL DATATABLE===================================================================// 

    $(document).on("click", ".btnEditar", function () {
        let id_ban_videos = (dtTable.row($(this).closest('tr')).data().ID_BAN_VIDEOS);
        let titulo_ban_videos = (dtTable.row($(this).closest('tr')).data().TITULO_BAN_VIDEOS);
        let nombre_ban_videos = (dtTable.row($(this).closest('tr')).data().NOMBRE_BAN_VIDEOS);

        $('#modal-banner-videos').modal('show');
        $('#id_banner_videos').val(id_ban_videos);
        $("#titulo_banner_videos").val(titulo_ban_videos);

        var video = document.getElementById('video');
        var sources = video.getElementsByTagName('source');
        sources[0].src = "banvideos/" + id_ban_videos + "/" + nombre_ban_videos + "";
        video.load();

        $('#modal-banner-videos').on('hidden.bs.modal', function () {
            document.getElementById('archivo_banner_videos').setCustomValidity('');
            $('#archivo_banner_videos').val('');
        });


    });
    //===================================================================BOTON EDITAR DEL DATATABLE===================================================================//   


    //=======================================================================ENVIO DEL MODAL(EDITAR) ================================================================================= //
    $("#form-modal-banner-videos").on('submit', function (event) {
        event.preventDefault(); //RETIENE LA RECARGA 

        let idban = $("#id_banner_videos").val();
        let tituloban = $("#titulo_banner_videos").val();
        let videoban = $("#archivo_banner_videos").val(); //valor del input videobanner del modal
       // let estado = false;

        // console.log("Titulo: " + tituloban + " Video:" + videoban);

        if (validavacioynulo([idban])) { toastr.info("Campo(s) vacio(s)"); }
        else if (validavacioynulo([tituloban])) { toastr.info("Ingrese un titulo para el banner de video"); }
        else if (titulovideobanner.length < 2 || titulovideobanner.length > 55) { toastr.info("El tamaño de titulo inválido, \nmínimo: 2 y máximo: 55 caracteres"); }
        else {
            if (videoban != '') {
                if (!esunvideo(videoban)) {
                    swalfire("Formato inválido, ingrese sólo video", "error");
                   // estado = true;
                    return;
                }
            }
            $.ajax({
                type: 'POST',
                url: 'funciones/fun_editar_banner_videos.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                }
            }).done(function (respuesta) {
               // console.log(respuesta);
                if (respuesta == 1) {
                    swalfire("Tamaño del video excedida, es mayor a 40 MB permitidos", "error");
                } else if (respuesta == 2) {
                    swalfire("¡Error al editar video!", "error");
                } else if (respuesta == 3) {
                    swalfire("¡Video editado correctamente!", "success");
                    dtTable.ajax.reload(null, false);
                } else if (respuesta == 4) {
                    swalfire("¡Error al editar video!", "error");
                } else if (respuesta == 5) {
                    swalfire("¡Video editado correctamente!", "success");
                    dtTable.ajax.reload(null, false);
                } else if (respuesta == 6) {
                    swalfire("¡Formato del video no válido!", "error");
                } else if (respuesta == 7) {
                    swalfire("¡No se ha recibido el parametro!", "error");
                } else if (respuesta == 8) {
                    swalfire("¡Parámetros vacíos!", "info");
                } else if (respuesta == 9) {
                    swalfire("El tamaño de titulo inválido, \nmínimo: 2 y máximo: 55 caracteres", "info");
                } else if (respuesta == 10) {
                    toastr.error("Existe el mismo titulo vinculado a un banner");
                } else if (respuesta == 11) {
                    toastr.error("Existe el mismo video vinculado a un banner");
                }  


                if (respuesta == 3 || respuesta == 5) { //&& respuesta==3
                    $('#modal-banner-videos').modal('hide');
                }

            }).fail(function (res) {
                console.log(res);
                swal("ERROR", {
                    icon: "error",
                    buttons: false,
                });
            });
        }

    });

    //=======================================================================ENVIO DEL MODAL(EDITAR) ================================================================================= //


    $(document).on("click", ".btnActivo", function () {
        let tipoboton = 1; //botonActivar
        let IDBTN = (dtTable.row($(this).closest('tr')).data().ID_BAN_VIDEOS);

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
                text: '¿Desea Activar Video?',
            }
        ]).then((respuesta) => {
            if (respuesta.value) {

                if (validavacioynulo([IDBTN, tipoboton])) { swalfire("Campo(s) vacio(s)", "error"); }
                else {
                    $.post('funciones/fun_editar_activacion_banner_videos.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton) }, function (respuesta) {
                        // console.log("ACTIVACIÓN: " + respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Parámetros vacíos!", "info");
                        } else if (respuesta == 2) {
                            swalfire("Video ya está activo", "info");
                        }
                        else if (respuesta == 3) {
                            swalfire("¡Error al modificar!", "error");
                        } else if (respuesta == 4) {
                            dtTable.ajax.reload(null, false);
                            swalfire("Video activado exitosamente", "success");
                        }
                        else if (respuesta == 5) {
                            swalfire("¡Datos vacíos!", "error");
                        }
                    });
                }

            } else {
                //swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });
    });

    $(document).on("click", ".btnInactivo", function () {
        let tipoboton = 2; //botonInactivo
        let IDBTN = (dtTable.row($(this).closest('tr')).data().ID_BAN_VIDEOS);

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
                text: '¿Desea Inactivar Video?',
            }
        ]).then((respuesta) => {
            if (respuesta.value) {

                if (validavacioynulo([IDBTN, tipoboton])) { swalfire("No se encuentra el video", "error"); }
                else {
                    $.post('funciones/fun_editar_activacion_banner_videos.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton) }, function (respuesta) {
                        // console.log("INACTIVACIÓN: " + respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Parámetros vacíos!", "info");
                        } else if (respuesta == 2) {
                            swalfire("Video ya está Inactivo", "info");
                        }
                        else if (respuesta == 3) {
                            swalfire("¡Error al modificar!", "error");
                        } else if (respuesta == 4) {
                            dtTable.ajax.reload(null, false);
                            swalfire("El Video ha sido activado exitosamente", "success");
                        }
                        else if (respuesta == 5) {
                            swalfire("¡Datos vacíos!", "error");
                        }
                    });
                }
            } else {
                //swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });
    });




    //===================================================================BOTON ELIMINAR DEL DATATABLE===================================================================// 

    $(document).on('click', '.btnBorrar', function () {
        let id_ban_videos_DT = (dtTable.row($(this).closest('tr')).data().ID_BAN_VIDEOS);
        Swal.mixin({
            icon: "warning",
            //puede ser text, number, email, password, textarea, select, radio
            confirmButtonText: 'Confirmar ',
            cancelButtonText: 'Cancelar ',
            confirmButtonColor: "#a00",
            showCancelButton: true,

        }).queue([
            {
                title: '¡Un momento!',
                text: 'Su Video sera eliminado y no se podra recuperar',
            },

        ]).then((result) => {
            if (result.value) {
                //console.log(id_ban_videos_DT);
                if (validavacioynulo([id_ban_videos_DT])) { swalfire("No se encuentra el video", "error"); }
                else {
                    $.post('funciones/fun_eliminar_banner_videos.php', { ID_BAN_VID: parseInt(id_ban_videos_DT) }, function (response) {
                        //console.log(response);
                        if (response == 1) {
                            swalfire("¡Video eliminado exitosamente!", "success");
                            dtTable.ajax.reload(null, false);
                        } else if (response == 2) {
                            swalfire("¡Error al eliminar!", "error");
                        } else if (response == 3) {
                            swalfire("¡No se recibieron parametros!", "error");
                        } else if (response == 4) {
                            swalfire("¡Parámetros vacíos!", "info");
                        }
                    });
                }
            } else {
                // swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });


    });

    //===================================================================BOTON ELIMINAR DEL DATATABLE===================================================================// 



});

