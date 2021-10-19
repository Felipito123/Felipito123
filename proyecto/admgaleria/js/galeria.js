//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {
    tablagaleria = $('#tabla-galeria').DataTable({
        "responsive": true,
        "ordering": false,
        "lengthMenu": [[12, 24, 36, 48, -1], [12, 24, 36, 48, "All"]],
        "ajax": {
            "url": "funciones/fun_llenar_galeria.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            {
                "data": "ID_IMG_GALERIA",
                "render": function (data, type, JsonResultRow, row) {
                    return '<input type="checkbox" class="ajas" value=" ' + data + ' ">'; //class="form-check-input"
                }
            },
            {
                "data": "NOMBRE_IMG_GALERIA",
                "render": function (data, type, JsonResultRow, row) {

                    return '<img src="../pgaleria/galeria/' + JsonResultRow.ID_IMG_GALERIA + '/' + data + '" width="100" height="45"/>';
                }

            },
            { "data": "TITULO_IMG_GALERIA" },
            {
                "data": "ESTADO_IMG_GALERIA",
                "render": function (data, type, JsonResultRow, row) {
                    if (data == 0) {
                        return '<label class="btn btn-danger btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;font-weight: bold;">Inactiva</label>';
                    }
                    else {
                        return '<label class="btn btn-success btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;font-weight: bold;">Activa</label>';
                    }

                }
            },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    // "<div class='btn-group'>" +
                    "<label class='btn btn-info btn-circle btn-sm btnEditar' title='Editar'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></label>" +
                    "<label class='btn btn-success btn-circle btn-sm btnActivo' title='Activar'><i class='fa fa-check-circle' aria-hidden='true'></i></label>" +
                    "<label class='btn btn-warning btn-circle btn-sm btnInactivo' title='Inactivar'><i class='fa fa-minus-circle' aria-hidden='true' style='color:white'></i></label>" + //times-circle
                    //"</div>" +
                    "</div>" +
                    "</div>"
            }
        ], "columnDefs": [{

            //"targets": [], //oculto la columna que tiene posición 0
            "visible": false,
            "searchable": true
        },

        ],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="12">12</option>' +
                '<option value="24">24</option>' +
                '<option value="36">36</option>' +
                '<option value="48">48</option>' +
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


    let dtTable = $("#tabla-galeria").DataTable();

    // $("#formTablaGaleria").on('submit', function (event) {
    //     event.preventDefault();
    //     form = $("#formTablaGaleria");

    //     // let imagengaleria = $("#imagengaleria").val();
    //     // console.log(imagengaleria);

    //     // if (files.length == 0) {  toastr.info("Debe cargar al menos 1 imagen"); }
    //     // else if (files.length < 1 || files.length > 10){
    //     //     toastr.info("Debe cargar al menos 1 imagen como mínimo y hasta 10 imagenes como máximo");
    //     // }else 

    //     // if (validaimagen(files)) { toastr.error("Hay un(os) archivo(s) que no cumple(n) el formato de imagen"); }
    //     // else {
    //         $.ajax({
    //             type: 'POST',
    //             url: 'funciones/fun_agregar_img_galeria.php',
    //             data: new FormData(this),
    //             dataType: 'json',
    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             beforeSend: function () {
    //                 //form[0].reset(); //LUEGO DE ENVIAR SE RESETE O LIMPIE EL FORMULARIO, SINO QUEDAN GUARDADOS ALGUNOS DATOS AL VOLVER ATRÁS
    //             }
    //         }).done(function (respuesta) {
    //             console.log(respuesta);
    //             if (respuesta == 1) {
    //                 toastr.error("No se encontraron imagenes para insertar");
    //             } else if (respuesta == 2) {
    //                 dtTable.ajax.reload(null, false);
    //                 form[0].reset();
    //                 toastr.success("¡Ha Ingresado imagenes correctamente!");
    //             } else if (respuesta == 3) {
    //                 toastr.error("No se encontraron parámetros");
    //             } else if (respuesta == 4) {
    //                 toastr.info("imagen(s) vacias");
    //             } else if (respuesta == 5) {
    //                 toastr.info("¡Formato de la imagen no válida!");
    //             } else {
    //                 toastr.error("ERROR 1");
    //             }

    //         }).fail(function (res) {
    //             console.log(res);
    //             toastr.error("ERROR 2");
    //         });
    //     // }

    // });

    // Register the plugin with FilePond
    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginFileMetadata,
        FilePondPluginImageCrop,
        FilePondPluginImagePreview,
        FilePondPluginFileValidateSize,
        FilePondPluginImageEdit,
        FilePondPluginImageExifOrientation
    );

    //PREVISUALIZACION CON IMAGEN
    const inputElement = document.querySelector('#imagengaleria');
    const pond = FilePond.create(inputElement, {
        imageCropAspectRatio: "1:1",
        allowImageCrop: true,
        dropOnPage: true,
        dropOnElement: true,
        // imageResizeTargetWidth: 200,
        // // open editor on image drop
        // imageEditInstantEdit: true,

        // // configure Doka
        // imageEditEditor: Doka.create({
        //   // Doka.js options here ...

        //   cropAspectRatioOptions: [
        //     {
        //       label: 'Free',
        //       value: null
        //     },
        //     {
        //       label: 'Portrait',
        //       value: 1.25
        //     },
        //     {
        //       label: 'Square',
        //       value: 1
        //     },
        //     {
        //       label: 'Landscape',
        //       value: .75
        //     }
        //   ]
        // }),
        fileMetadataObject: {
            markup: [
                [
                    "rect",
                    {
                        left: 0,
                        right: 0,
                        bottom: 0,
                        height: "60px",
                        backgroundColor: "rgba(0,0,0,.5)",
                    },
                ],
                [
                    "image",
                    {
                        right: "10px",
                        bottom: "10px",
                        width: "128px",
                        height: "34px",
                        src: "",
                        fit: "contain",
                    },
                ],
            ],
        },
    });


    // pond.addFile("./beach.jpeg"); AGREGA IMAGEN POR DEFECTO

    var pond2;
    pond2 = FilePond.create(
        document.querySelector('#imagengaleria'), {
        imageCropAspectRatio: "1:1",
        fileMetadataObject: {
            markup: [
                [
                    "rect",
                    {
                        left: 0,
                        right: 0,
                        bottom: 0,
                        height: "60px",
                        backgroundColor: "rgba(0,0,0,.5)",
                    },
                ],
                [
                    "image",
                    {
                        right: "10px",
                        bottom: "10px",
                        width: "128px",
                        height: "34px",
                        src: "",
                        fit: "contain",
                    },
                ],
            ],
        },
        checkValidity: true,
        allowMultiple: true,
        allowReorder: true,
        allowImageCrop: true,
        dropValidation: true,
        allowFileTypeValidation: true,
        allowImageExifOrientation: true,
        acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
        dropOnPage: true,
        dropOnElement: true,
        labelIdle: 'Arrastra y suelta tus archivos o <span class = "filepond--label-action"> Examinar <span>',
        labelInvalidField: "El campo contiene archivos inválidos",
        labelFileWaitingForSize: "Esperando tamaño",
        labelFileSizeNotAvailable: "Tamaño no disponible",
        labelFileLoading: "Cargando",
        labelFileLoadError: "Error durante la carga",
        labelFileProcessing: "Cargando",
        labelFileProcessingComplete: "Carga completa",
        labelFileProcessingAborted: "Carga cancelada",
        labelFileProcessingError: "Error durante la carga",
        labelFileProcessingRevertError: "Error durante la reversión",
        labelFileRemoveError: "Error durante la eliminación",
        labelTapToCancel: "toca para cancelar",
        labelTapToRetry: "tocar para volver a intentar",
        labelTapToUndo: "tocar para deshacer",
        labelButtonRemoveItem: "Eliminar",
        labelButtonAbortItemLoad: "Abortar",
        labelButtonRetryItemLoad: "Reintentar",
        labelButtonAbortItemProcessing: "Cancelar",
        labelButtonUndoItemProcessing: "Deshacer",
        labelButtonRetryItemProcessing: "Reintentar",
        labelButtonProcessItem: "Cargar",
        labelMaxFileSizeExceeded: "El archivo es demasiado grande",
        labelMaxFileSize: "El tamaño máximo del archivo es {filesize}",
        labelMaxTotalFileSizeExceeded: "Tamaño total máximo excedido",
        labelMaxTotalFileSize: "El tamaño total máximo de los archivos es {filesize}",
        labelFileTypeNotAllowed: "Archivo de tipo no válido",
        fileValidateTypeLabelExpectedTypes: "Espera {allButLastType} o {lastType}",
        imageValidateSizeLabelFormatError: "Tipo de imagen no compatible",
        imageValidateSizeLabelImageSizeTooSmall: "La imagen es demasiado pequeña",
        imageValidateSizeLabelImageSizeTooBig: "La imagen es demasiado grande",
        imageValidateSizeLabelExpectedMinSize: "El tamaño mínimo es {minWidth} × {minHeight}",
        imageValidateSizeLabelExpectedMaxSize: "El tamaño máximo es {maxWidth} × {maxHeight}",
        imageValidateSizeLabelImageResolutionTooLow: "La resolución es demasiado baja",
        imageValidateSizeLabelImageResolutionTooHigh: "La resolución es demasiado alta",
        imageValidateSizeLabelExpectedMinResolution: "La resolución mínima es {minResolution}",
        imageValidateSizeLabelExpectedMaxResolution: "La resolución máxima es {maxResolution}",
        imageValidateSizeMinWidth: 500,
        imageValidateSizeMinHeight: 500,
        maxFileSize: '5MB',
        maxTotalFileSize: '15MB',
        maxFiles: 10,
        instantUpload: false,
        allowProcess: false,
        allowDrop: true,
        required: true,

    });

    $("#formTablaGaleria").submit(function (e) {
        e.preventDefault();
        form = $("#formTablaGaleria");
        var fd = new FormData(this);
        // append files array into the form data
        pondFiles = pond2.getFiles();
        for (var i = 0; i < pondFiles.length; i++) {
            fd.append('imagengaleria[]', pondFiles[i].file);
        }

        // funciones/fun_agregar_img_galeria.php
        // funciones/ver.php
        $.ajax({
            url: 'funciones/fun_agregar_img_galeria.php',
            type: 'POST',
            data: fd,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                //    todo the logic
                // remove the files from filepond, etc
            },
            error: function (data) {
                //    todo the logic
            }
        }).done(function (respuesta) {
            console.log("Respuesta " + respuesta);
            if (respuesta == 1) {
                toastr.error("No se encontraron imagenes para insertar");
            } else if (respuesta == 2) {
                dtTable.ajax.reload(null, false);
                //YA QUE NO ME FUNCIONA EL FORM.RESET() PARA ELIMINARLO DEL FILEPONT, TENGO QUE HACERLO ASÍ
                pond2.removeFiles();
                toastr.success("¡Ha Ingresado imagenes correctamente!");
            } else if (respuesta == 3) {
                toastr.error("No se encontraron parámetros");
            } else if (respuesta == 4) {
                toastr.info("imagen(s) vacias");
            } else if (respuesta == 5) {
                toastr.info("¡Formato de la imagen no válida!");
            } else {
                toastr.error("ERROR 1");
            }
        }).fail(function (res) {
            console.log(res);
            // toastr.error("ERROR 2");
        });
    });


    $("#botoneliminar").click(function () {
        var id = $('.ajas:checked').map(function () {
            return $(this).val();
        }).get();

        //console.log('ides:' + id);

        if (id == '') {
            swalfire("Seleccione fila", "error");
        }
        else {
            $.post('funciones/fun_eliminar_multiple_img_galeria.php', { iden: id }, function (respuesta) { //aqui no se parsea porque el map envia los id asi: 19,20,21
                console.log('RESPUESTA:' + respuesta);
                if (respuesta == 1) {
                    swalfire("¡Se eliminaron correctamente!", "success");
                    dtTable.ajax.reload(null, false);
                }
                else if (respuesta == 2) {
                    swalfire("Seleccione fila", "error");
                }
                else if (respuesta == 3) {
                    swalfire("No se han recibido imagenes a eliminar", "info");
                }
                else {
                    swalfire("ERROR 1", "error");
                }
            });
        }
    });


    $(document).on('click', '.btnEditar', function () {
        let id_img_galeria = (dtTable.row($(this).closest('tr')).data().ID_IMG_GALERIA);
        let nombre_img_galeria = (dtTable.row($(this).closest('tr')).data().NOMBRE_IMG_GALERIA);
        let titulo_img_galeria = (dtTable.row($(this).closest('tr')).data().TITULO_IMG_GALERIA);
        // let estado_img_galeria = (dtTable.row($(this).closest('tr')).data().ESTADO_IMG_GALERIA);

        $('#modal-img-galeria').modal('show');
        $('#id_img_galeria').val(id_img_galeria);
        $("#titulo_img_galeria").val(titulo_img_galeria);
        // $("#estado_img_galeria").val(estado_img_galeria);


        zoomdelaimagen('../pgaleria/galeria/' + id_img_galeria + '/' + nombre_img_galeria);

        $('#modal-img-galeria').on('hidden.bs.modal', function () {
            document.getElementById('archivo_img_galeria').setCustomValidity('');
            $('#archivo_img_galeria').val('');
        });


    });


    //=======================================================================ENVIO DEL MODAL ================================================================================= //
    $("#form-modal-img-galeria").on('submit', function (event) {
        event.preventDefault(); //RETIENE LA RECARGA 
        form = $("#form-modal-img-galeria");

        let ina = $("#id_img_galeria").val();
        let titulomodal = $("#titulo_img_galeria").val();
        var files = $("#archivo_img_galeria")[0].files;

        if (validavacioynulo([ina, titulomodal])) { swalfire("Campo(s) vacio(s)", "error"); }
        else if (titulomodal.length < 2 || titulomodal.length > 100) { swalfire("Tamaño del titulo inválido, \nmínimo: 2 y máximo: 100 caracteres", "error"); }
        // if (files.length == 0) { swalfire("Ingrese una imagen", "error");}
        // else if(validaimagen(files)){swalfire("Hay un(os) archivo(s) que no cumple(n) el formato de imagen", "error");}
        else {
            $.ajax({
                type: 'POST',
                url: 'funciones/fun_editar_img_galeria.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {

                }
            }).done(function (respuesta) {
                //console.log(respuesta);
                if (respuesta == 1) {
                    swalfire("Tamaño de la imagen excedida > 5 MB", "error");
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
                    swalfire("Parámetros vacios", "info");
                } else if (respuesta == 9) {
                    swalfire("¡Tamaño del titulo inválido!", "info");
                }
                // else {
                //     swalfire("ERROR ERROR", "error");
                // }

                if (respuesta == 3 || respuesta == 5) {
                    $('#modal-img-galeria').modal('hide');
                }
            }).fail(function (res) {
                console.log(res);
                swalfire("ERROR", "error");
            });
        }

    });


    //=======================================================================ENVIO DEL MODAL ================================================================================= //



    $(document).on("click", ".btnActivo", function () {
        let tipoboton = 1; //botonActivar
        let IDBTN = (dtTable.row($(this).closest('tr')).data().ID_IMG_GALERIA);

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
                if (validavacioynulo([IDBTN, tipoboton])) { swalfire("No se pudo enviar datos", "error"); }
                else {
                    $.post('funciones/fun_editar_activacion_img.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton) }, function (respuesta) {
                        //console.log("ACTIVACIÓN: " + respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Parámetros vacíos!", "info");
                        } else if (respuesta == 2) {
                            swalfire("¡Imagen ya está activa!", "info");
                        } else if (respuesta == 3) {
                            swalfire("¡No se pudo hacer la consulta!", "error");
                        } else if (respuesta == 4) {
                            swalfire("¡Imagen activada!", "success");
                            dtTable.ajax.reload(null, false);
                        } else if (respuesta == 5) {
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
        let IDBTN = (dtTable.row($(this).closest('tr')).data().ID_IMG_GALERIA);

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
                if (validavacioynulo([IDBTN, tipoboton])) { swalfire("No se pudo enviar datos", "error"); }
                else {
                    $.post('funciones/fun_editar_activacion_img.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton) }, function (respuesta) {
                        // console.log("INACTIVAR: " + respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Parámetros vacíos!", "info");
                        } else if (respuesta == 2) {
                            swalfire("¡Imagen ya está inactiva!", "info");
                        } else if (respuesta == 3) {
                            swalfire("¡No se pudo hacer la consulta!", "error");
                        } else if (respuesta == 4) {
                            swalfire("¡Imagen Inactiva!", "success");
                            dtTable.ajax.reload(null, false);
                        } else if (respuesta == 5) {
                            swalfire("¡Datos vacíos!", "error");
                        }
                    });
                }
            } else {
                // swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });
    });

});



function zoomdelaimagen(imgUrl) {
    if (imgUrl == null) {
        console.log('imagen es null');
        var imageninput = document.getElementById('archivo_img_galeria');
        if (imageninput.files && imageninput.files[0]) {
            var myImg = document.getElementById("miImagen_img_galeria");
            myImg.src = URL.createObjectURL(imageninput.files[0]); // set src to blob url
        }
    } else {
        console.log('imagen NO es null');
        var myImg = document.getElementById("miImagen_img_galeria");
        myImg.src = imgUrl; // set src to blob url
    }
}