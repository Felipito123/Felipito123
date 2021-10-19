//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {

    tabla_baner_imagenes = $('#tabla-banner-imagen').DataTable({
        "responsive": true,
        "ordering": false,
        "lengthMenu": [[8, 16, 35, 50, -1], [8, 16, 35, 50, "All"]],
        "ajax": {
            "url": "funciones/fun_llenar_banner_imagenes.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [

            // { "data": "ID_BAN_IMAGENES" },
            { "data": "LINK_BAN_IMAGENES" },
            {
                "data": "NOMBRE_BAN_IMAGENES",
                "render": function (data, type, JsonResultRow, row) {

                    return '<img src="banimg/' + JsonResultRow.ID_BAN_IMAGENES + '/' + data + '" width="100" height="45"/>';
                }

            },
            {
                "data": "ESTADO_BAN_IMAGENES",
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
                    "<button class='btn btn-info btn-circle btn-sm btnEditar' title=\"Editar\"><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>" +
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
                '<option value="8">8</option>' +
                '<option value="16">16</option>' +
                '<option value="35">35</option>' +
                '<option value="50">50</option>' +
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


    let dtTable = $("#tabla-banner-imagen").DataTable();



    //===================================================================AGREGAR BANNER IMAGEN===================================================================//      
    $("#formBannerImagen").on('submit', function (event) {
        form = $("#formBannerImagen");

        let linkbanner = $("#linkbanner").val();
        let imagenbanner = $("#imagenbanner").val(); //valor del input imagenbanner
        console.log("Link: " + linkbanner + "\nImagen:" + imagenbanner);

        if (validavacioynulo([linkbanner])) { toastr.info("Ingrese un link"); }
        else if (validavacioynulo([imagenbanner])) { toastr.info("Seleccione una imagen"); }
        else if (linkbanner.length < 2 || linkbanner.length > 200) { toastr.info("Tamaño del link inválido, \nmínimo: 2 y máximo: 200 caracteres");}
        else if (!validaLaUrl(linkbanner)) { toastr.info("Link invalido"); }
        else {
            $.ajax({
                type: 'POST',
                url: 'funciones/fun_agregar_banner_imagenes.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    //form[0].reset(); //LUEGO DE ENVIAR SE RESETE O LIMPIE EL FORMULARIO, SINO QUEDAN GUARDADOS ALGUNOS DATOS AL VOLVER ATRÁS

                }
            }).done(function (respuesta) {
                // console.log(respuesta);
                if (respuesta == 1) {
                    swalfire("Tamaño de la imagen excedida > 20 MB", "error");
                } else if (respuesta == 2) {
                    swalfire("¡Error al subir imagen!", "error");
                } else if (respuesta == 3) {
                    swalfire("Error al mostrar el último id", "error");
                } else if (respuesta == 4) {
                    swalfire("¡Imagen subida!", "success");
                    dtTable.ajax.reload(null, false);
                    form[0].reset();
                } else if (respuesta == 5) {
                    swalfire("¡El formato de la imagen no es válido!", "error");
                } else if (respuesta == 6) {
                    swalfire("¡No se ha recibido el parametro!", "error");
                } else if (respuesta == 7) {
                    swalfire("¡Parámetros vacíos!", "info");
                } else if (respuesta == 8) {
                    swalfire("Tamaño del link inválido, \nmínimo: 2 y máximo: 200 caracteres", "info");
                } else if (respuesta == 9) {
                    toastr.error("Existe el mismo link vinculado a un banner");
                } else if (respuesta == 10) {
                    toastr.error("Existe la misma imagen vinculado a un banner");
                } else {
                    swalfire("ERROR ERROR", "error");
                }

            }).fail(function (res) {
                console.log(res);
                swalfire("ERROR ERROR ERROR ", "error");
            });

        }

        event.preventDefault();

    });

    //===================================================================AGREGAR BANNER IMAGEN===================================================================//   


    //===================================================================BOTON EDITAR DEL DATATABLE===================================================================// 

    $(document).on("click", ".btnEditar", function () {
        let id_ban_imagen = (dtTable.row($(this).closest('tr')).data().ID_BAN_IMAGENES);
        let nombre_ban_imagen = (dtTable.row($(this).closest('tr')).data().NOMBRE_BAN_IMAGENES);
        let link_ban_imagen = (dtTable.row($(this).closest('tr')).data().LINK_BAN_IMAGENES);
        // let estado = (dtTable.row($(this).closest('tr')).data().ESTADO_BAN_IMAGENES);

        $('#modal-banner-imagenes').modal('show');
        $('#id_banner_imagenes').val(id_ban_imagen);
        /* $("#estado_banner_imagenes").val(estado);*/
        $("#link_banner_imagenes").val(link_ban_imagen);

        zoomdelaimagen('banimg/' + id_ban_imagen + '/' + nombre_ban_imagen);

        $('#modal-banner-imagenes').on('hidden.bs.modal', function () {
            document.getElementById('archivo_banner_imagenes').setCustomValidity('');
            $('#archivo_banner_imagenes').val('');
        });

    });
    //===================================================================BOTON EDITAR DEL DATATABLE===================================================================//   

    //=======================================================================ENVIO DEL MODAL ================================================================================= //
    $("#form-modal-banner-imagenes").on('submit', function (event) {
        event.preventDefault(); //RETIENE LA RECARGA 

        let idmodal = $("#id_banner_imagenes").val();
        let linkbannermodal = $("#link_banner_imagenes").val();
        let archivomodal = $("#archivo_banner_imagenes").val(); //valor del input imagenbanner


        // console.log("ID: " + idmodal + "\nLink: " + linkbannermodal + "\nImagen:" + archivomodal);

        if (validavacioynulo([idmodal, linkbannermodal])) { swalfire("Campo(s) vacio(s)", "error"); }
        else if (linkbannermodal.length < 2 || linkbannermodal.length > 200) { swalfire("Tamaño del link inválido, \nmínimo: 2 y máximo: 200 caracteres", "error"); }
        else if (!validaLaUrl(linkbannermodal)) { swalfire("Link invalido", "error"); }
        else {
            $.ajax({
                type: 'POST',
                url: 'funciones/fun_editar_banner_imagenes.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {

                }
            }).done(function (respuesta) {
                console.log(respuesta);
                if (respuesta == 1) {
                    swalfire("Tamaño de la imagen excedida,es mayor a 20 MB permitidos", "error");
                } else if (respuesta == 2) {
                    swalfire("¡Error al editar imagen!", "error");
                } else if (respuesta == 3) {
                    swalfire("¡Imagen editada correctamente!", "success");
                    dtTable.ajax.reload(null, false);
                } else if (respuesta == 4) {
                    swalfire("¡Error al editar imagen!", "error");
                } else if (respuesta == 5) {
                    swalfire("¡Imagen editada correctamente!", "success");
                    dtTable.ajax.reload(null, false);
                } else if (respuesta == 6) {
                    swalfire("¡Formato de la imagen no válida!", "error");
                } else if (respuesta == 7) {
                    swalfire("¡No se ha recibido el parametro!", "error");
                } else if (respuesta == 8) {
                    swalfire("¡Parámetros vacíos!", "info");
                } else if (respuesta == 9) {
                    swalfire("Tamaño del link inválido, \nmínimo: 2 y máximo: 200 caracteres", "info");
                } else if (respuesta == 10) {
                    toastr.error("Ya existe ese link");
                } else if (respuesta == 11) {
                    toastr.error("Ya existe esa imagen");
                }  else {
                    swalfire("ERROR 1", "error");
                }

                if (respuesta == 3 || respuesta == 5) {
                    $('#modal-banner-imagenes').modal('hide');
                }
            }).fail(function (res) {
                console.log(res);
                swalalerta("ERROR 2", "error");
            });

        }


    });


    //=======================================================================ENVIO DEL MODAL ================================================================================= //


    $(document).on("click", ".btnActivo", function () {
        let tipoboton = 1; //botonActivar
        let IDBTN = (dtTable.row($(this).closest('tr')).data().ID_BAN_IMAGENES);

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
                text: '¿Desea Activar imagen?',
            }
        ]).then((respuesta) => {
            if (respuesta.value) {
                if (validavacioynulo([IDBTN, tipoboton])) { swalfire("No se encuentran datos", "error"); }
                else {
                    $.post('funciones/fun_editar_activacion_banner_imagenes.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton) }, function (respuesta) {
                        console.log("ACTIVACIÓN: " + respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Parámetros vacíos!", "info");
                        } else if (respuesta == 2) {
                            swalfire("¡Imagen ya está activa!", "info");
                        }
                        else if (respuesta == 3) {
                            swalfire("¡No se pudo hacer la consulta!", "error");
                        } else if (respuesta == 4) {
                            swalfire("¡Imagen activada!", "success");
                            dtTable.ajax.reload(null, false);
                        }
                        else if (respuesta == 5) {
                            swalfire("¡Datos vacíos!", "error");
                        }
                    });
                }
            } else {
                // swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });
    });

    $(document).on("click", ".btnInactivo", function () {
        let tipoboton = 2; //botonInactivo
        let IDBTN = (dtTable.row($(this).closest('tr')).data().ID_BAN_IMAGENES);

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
                text: '¿Desea Inactivar imagen?',
            }
        ]).then((respuesta) => {
            if (respuesta.value) {
                if (validavacioynulo([IDBTN, tipoboton])) { swalfire("No se encuentran datos", "error"); }
                else {
                    $.post('funciones/fun_editar_activacion_banner_imagenes.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton) }, function (respuesta) {
                        console.log("INACTIVACIÓN: " + respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Parámetros vacíos!", "info");
                        }
                        else if (respuesta == 2) {
                            swalfire("¡Imagen ya está Inactiva!", "info");
                        }
                        else if (respuesta == 3) {
                            swalfire("¡No se pudo hacer la consulta!", "error");
                        } else if (respuesta == 4) {
                            swalfire("¡Imagen Inactiva!", "success");
                            dtTable.ajax.reload(null, false);
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
        let id_ban_imagen = (dtTable.row($(this).closest('tr')).data().ID_BAN_IMAGENES);
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
                text: 'Su Imagen sera eliminada y no se podra recuperar',
            },

        ]).then((result) => {
            if (result.value) {
                //console.log("ID IMAGEN:"+id_ban_imagen);
                if (validavacioynulo([id_ban_imagen])) { swalfire("No se encuentra la imagen", "error"); }
                else {
                    $.post('funciones/fun_eliminar_banner_imagenes.php', { ID_BAN_IMG: parseInt(id_ban_imagen) }, function (respuesta) {
                        console.log(respuesta);

                        if (respuesta == 1) {
                            swalfire("¡Imagen eliminada exitosamente!", "success");
                            dtTable.ajax.reload(null, false);
                        }
                        else if (respuesta == 2) {
                            swalfire("¡No se pudo hacer la consulta en la BD para eliminar!", "error");
                        } else if (respuesta == 3) {
                            swalfire("¡No se recibieron parametros!", "error");
                        }
                        else if (respuesta == 4) {
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


function zoomdelaimagen(imgUrl) {
    if (imgUrl == null) {
        console.log('imagen es null');
        var imageninput = document.getElementById('archivo_banner_imagenes');
        if (imageninput.files && imageninput.files[0]) {
            var myImg = document.getElementById("miImagen");
            myImg.src = URL.createObjectURL(imageninput.files[0]); // set src to blob url
        }
    } else {
        // console.log('imagen NO es null');
        var myImg = document.getElementById("miImagen");
        myImg.src = imgUrl; // set src to blob url
    }
}