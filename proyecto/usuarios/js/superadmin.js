//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {
    tablausuarios=$('#tabla-usuarios').DataTable({
        "responsive": true,
        "ordering": false,
        "lengthMenu": [[8, 15, 25, 50, -1], [8, 15, 25, 50, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 1 }, //enviamos una opcion para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            {
                "data": "ESTADO",
                "render": function (data, type, JsonResultRow, row) {
                    if (data == 1) {
                        return '<label class="btn btn-success btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;font-weight: bold;">Activo</label>';
                    }

                }
            },
            { "data": "RUT" },
            { "data": "NOMBRE_USUARIO" },
            { "data": "TELEFONO" },
            { "data": "DIRECCION" },
            // { "data": "ENTRADA" },
            {
                "data": "ENTRADA",
                "render": function (data, type, JsonResultRow, row) {
                    let v1 = data.split('-');//Ej: 2020-11-12
                    //return v1[2]+v1[1]+v1[0]; //dia, mes, añ0
                    return v1[2] + '-' + v1[1] + '-' + v1[0];
                }

            },
            { "data": "CORREO" },
            { "data": "ID_ROL" },
            { "data": "NOMBRE_ROL" },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<div class='btn-group'>" +
                    "<button class='btn btn-info btn-sm btnEditar' title=\"Editar funcionario\"><i class='fa fa-pencil-square-o' aria-hidde='true'></i></button>" +
                    "<button class='btn btn-danger btn-sm btnBorrar' title=\"Inactivar funcionario\"><i class='fa fa-ban' aria-hidde='true'></i></button>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
            }
        ], "columnDefs": [{

            "targets": [7], //oculto la columna ID_USUARIO que tiene posición 0 Y 4
            "visible": false,
            "searchable": true
        },

        ],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="8">8</option>' +
                '<option value="15">15</option>' +
                '<option value="20">20</option>' +
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
                titleAttr: 'Exportar excel',
                className: 'btn btn-success'
            },

            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'Exportar PDF',
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

    tablausuariosinactivos = $('#tabla-usuarios-inactivo').DataTable({
        "responsive": true,
        "destroy": true,
        "paging": false,  //le oculto la paginación
        //"searching": false, //le oculto el buscador
        "info": false,  //le oculto la información de las entradas de la tabla
        "cache": false,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        //"lengthMenu": [[5, 12, 36, 48, -1], [5, 12, 36, 48, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 2 }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "RUTUSIN" },
            { "data": "NOMBRE" },
            {
                "data": "ENTRADA",
                "render": function (data, type, JsonResultRow, row) {
                    let v1 = data.split('-');//Ej: 2020-11-12
                    //return v1[2]+v1[1]+v1[0]; //dia, mes, añ0
                    return v1[2] + '-' + v1[1] + '-' + v1[0];
                }
            },
            { "data": "CORREO" },
            { "data": "IDROL" },
            { "data": "NOMBREROL" },
            {
                "defaultContent":
                    "<div class='row justify-content-center'>" +
                    "<div class='col align-items-center'>" +
                    "<div class='btn-group'>" +
                    //"<input type='checkbox' id='btncheck' value='hola'/>" +
                    "<button class='btn btn-success btn-sm' id='btncheck' title=\"Activar funcionario\"><i class='fa fa-check-circle'></i></button>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
            }


        ],
        "columnDefs": [{

            "targets": [4], //oculto la columna que tiene posición 0
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
            "sEmptyTable": "No hay usuarios inactivos",
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

    $("#seleccionsector").val("null").change();
    // $('#divselectorsector').hide();
    $('#divclavepordefecto').hide();

    LLenaSectorYUnidad();
    llenaCargoSelector();
    llenaRegionSelector();
    llenaRolSelector();
    DetectaCambiosSelectoresRegionYcomuna();
    // DetectaCambioRadioSector();



    //===================================================================AGREGAR BANNER IMAGEN===================================================================//      
    $('#sa_contrasena').on('keydown', function (ev) { //si se presiona enter  en el último input se activa el formulario
        if (ev.key === 'Enter') {
            //No salta directo al formulario sino que al hacer click al submit, valida en html primero, luego js
            $('#btnregistrousuario').trigger("click");
        }
    });

    $("#formSuperAdmin").on('submit', function (event) {
        event.preventDefault();
        formRegistroUsuario();
    });

    //===================================================================AGREGAR BANNER IMAGEN===================================================================//   


    //===================================================================BOTON EDITAR DEL DATATABLE===================================================================// 

    $(document).on("click", ".btnEditar", function () {
        // let id_usuario = (tablausuarios.row($(this).closest('tr')).data().ID_USUARIO);
        let rut_usuario = (tablausuarios.row($(this).closest('tr')).data().RUT);
        let nombre_usuario = (tablausuarios.row($(this).closest('tr')).data().NOMBRE_USUARIO);
        let correo = (tablausuarios.row($(this).closest('tr')).data().CORREO);
        let rol = (tablausuarios.row($(this).closest('tr')).data().ID_ROL);
        let direccion = (tablausuarios.row($(this).closest('tr')).data().DIRECCION);
        let telefono = (tablausuarios.row($(this).closest('tr')).data().TELEFONO);
        let fecha = (tablausuarios.row($(this).closest('tr')).data().ENTRADA);
        let IDCARGO = (tablausuarios.row($(this).closest('tr')).data().ID_CARGO);
        let IDSECTOR = (tablausuarios.row($(this).closest('tr')).data().ID_SECTOR);
        let IDUNIDAD = (tablausuarios.row($(this).closest('tr')).data().ID_UNIDAD);

        // let fechaseteada = fecha.split('-'); //fecha del input

        $('#modal-superadmin').modal('show');
        // $('#id-modal-superadmin').val(id_usuario);
        $('#rut_sa').val(rut_usuario);
        $("#nombre_sa").val(nombre_usuario);
        $("#telefono_sa").val(telefono);
        $("#direccion_sa").val(direccion);//fecha_sa
        $("#fecha_sa").val(fecha);
        $("#correo_sa").val(correo);
        $("#rol_sa").val(rol); //a pesar que se muestran los roles en php, aqui le asigno el valor por defecto 
        $("#cargo_sa").val(IDCARGO);



        $("#unidad_sa").val(''+ IDUNIDAD).change();
        $("#sector_sa").val(''+IDSECTOR).change();

        // if(IDSECTOR==null || IDSECTOR=='null'){
        //     $('#sector_sa').prop('required', false);
        //     $("#sector_sa").val("null").change();
        //     $('#divsectoresmodalusuario').hide();

        //     $('#unidad_sa').prop('required', true);
        //     $("#unidad_sa").val(''+ IDUNIDAD).change();
        //     $('#divunidadesmodalusuario').show();

        // }else{
        //     $('#divsectoresmodalusuario').show();
        //     $("#sector_sa").val(''+IDSECTOR).change();
        //     $('#sector_sa').prop('required', true);

        //     $('#unidad_sa').prop('required', false);
        //     $("#unidad_sa").val("null").change();
        //     $('#divunidadesmodalusuario').hide();
        // }
        // toastr.error(''+IDSECTOR, 'Un momento!');
    

    });
    //===================================================================BOTON EDITAR DEL DATATABLE===================================================================//   



    //=======================================================================ENVIO DEL MODAL ================================================================================= //

    $("#form-modal-editar-usuarios").on('submit', function (event) {
        event.preventDefault(); //RETIENE LA RECARGA 
        formEditarUsuario();
    });

    //=======================================================================ENVIO DEL MODAL ================================================================================= //


    //===================================================================BOTON ELIMINAR DEL DATATABLE===================================================================// 

    $(document).on('click', '.btnBorrar', function () {

        Swal.mixin({

            icon: "warning",
            //puede ser text, number, email, password, textarea, select, radio
            confirmButtonText: 'Confirmar ',
            cancelButtonText: 'Cancelar ',
            confirmButtonColor: "#a00",
            showCancelButton: true,
            progressSteps: [1, 2],

        }).queue([
            {
                input: 'password',
                title: '¡Un momento!',
                text: 'Ingrese su contraseña para confirmar',
                inputValidator: (value) => {
                    if (!value) {
                        return 'Campo no puede ser vacio'
                    }
                    else if (value.includes("'")) {
                        return 'Carácter no permitido'
                    }
                    // else if (value.length < 6) {
                    //     return 'Campo muy corto'
                    // }
                    else if (value.length >= 250) {
                        return 'Campo muy largo'
                    }
                }
            },
            {
                title: '¡Un momento!',
                text: 'Este funcionario será inactivado y no podrá entrar en el sistema. Confirme que desea realizar esta acción.',
            },
        ]).then((resultado) => {
            if (resultado.value) {
                let rut = (tablausuarios.row($(this).closest('tr')).data().RUT);
                let clave = resultado.value;
                clave = clave[0];
                //console.log("RUT: " + rut + "Contraa: " + clave);

                $.post('funciones/acceso.php', { rutusuarioaeliminar: rut, clave: clave, seleccionar: 5 }, function (response) { //
                    //console.log(response);
                    if (response == 0) {
                        swalfire("¡El usuario NO pudo ser inactivado!", "error");
                    } else if (response == 1) {
                        tablausuarios.ajax.reload(null, false);
                        tablausuariosinactivos.ajax.reload(null, false);
                        swalfire("El usuario ha sido inactivado", "success");
                    } else if (response == 2) {
                        swalfire("¡contraseña inválida!", "error");
                    } else if (response == 3 || response == 444) {
                        swalfire("¡no se ha recibido parámetros!", "error");
                    }
                });

            } else {
                // swal("¡Cancelado!", "Eliminación cancelada", "info");
            }

        });

    });
    //===================================================================BOTON ELIMINAR DEL DATATABLE===================================================================// 
    //  $("#btncheck").prop('checked', true);
    // $("#btncheck").removeAttr("checked");

    $(document).on("click", "#btncheck", function () {
        Swal.mixin({
            icon: "warning",
            showClass: { //para esta animación del modal integre un css llamado animate.min.css
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            confirmButtonText: 'Confirmar ',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: "#1cc88a",
            showCancelButton: true,

        }).queue([{
            title: '¡Espere Un momento!',
            text: '¿Está seguro(a) que desea activar al usuario?',
        },

        ]).then((result) => {
            if (result.value) {
                let rut = (tablausuariosinactivos.row($(this).closest('tr')).data().RUTUSIN);

                $.post('funciones/acceso.php', { rutusuarioin: rut, seleccionar: 6 }, function (respuesta) { //, seleccionar: 4
                    // console.log("ACTIVAR MATERIAL : " + respuesta);
                    if (respuesta == 0) {
                        swalfire("¡El usuario NO pudo ser activado!", "error");
                    } else if (respuesta == 1) {
                        tablausuarios.ajax.reload(null, false);
                        tablausuariosinactivos.ajax.reload(null, false);
                        swalfire("El usuario ha sido activado", "success");
                    } else if (respuesta == 2 || respuesta == 444) {
                        swalfire("¡Parámetros no recibidos!", "error");
                    }
                }).fail(function () {
                    swalfire("Ocurrio un Error Inesperado", "error")
                });
            }
        });

    });


    document.getElementById('ckeckclavepordefecto').onchange = function () { //DETECTO EL CAMBIO DEL CHECKBOX
        if (this.checked) {
            if($('#sa_rut').val()==''){
                toastr.error('Ingrese R.U.T', 'Un momento!');
                // alertify.error("Ingrese R.U.T antes");
                $(this).prop('checked',false);
            }else if($('#sa_rut').val().length<8){
                // alertify.error("Longitud del R.U.T inválida");
                toastr.error('Longitud del R.U.T inválida', 'Un momento!');
                $(this).prop('checked',false);
            }else{
                $('#sa_contrasena').text($('#sa_rut').val());
                $('#sa_contrasena').val($('#sa_rut').val());
            }

        }
        else {
            $('#sa_contrasena').val('');
        }
    }

    // $(document).on('change', '#btncheck', function () {

    //     if (this.checked) {
    //         Swal.mixin({
    //             icon: "warning",
    //             showClass: { //para esta animación del modal integre un css llamado animate.min.css
    //                 popup: 'animate__animated animate__fadeInDown'
    //             },
    //             hideClass: {
    //                 popup: 'animate__animated animate__fadeOutUp'
    //             },
    //             confirmButtonText: 'Confirmar ',
    //             cancelButtonText: 'Cancelar',
    //             confirmButtonColor: "#4e73df",
    //             showCancelButton: true,

    //         }).queue([{
    //             title: '¡Espere Un momento!',
    //             text: '¿Está seguro(a) que desea activar al usuario?',
    //         },

    //         ]).then((result) => {
    //             if (result.value) {
    //                 let rut = (tablausuariosinactivos.row($(this).closest('tr')).data().RUTUSIN);

    //                 $.post('funciones/acceso.php', { rutusuarioin: rut, seleccionar: 6 }, function (respuesta) { //, seleccionar: 4
    //                     // console.log("ACTIVAR MATERIAL : " + respuesta);
    //                     if (respuesta == 0) {
    //                         swalfire("¡El usuario NO pudo ser activado!", "error");
    //                     } else if (respuesta == 1) {
    //                         tablausuarios.ajax.reload(null, false);
    //                         tablausuariosinactivos.ajax.reload(null, false);
    //                         swalfire("El usuario ha sido activado", "success");
    //                     } else if (respuesta == 2 || respuesta == 444) {
    //                         swalfire("¡Parámetros no recibidos!", "error");
    //                     }
    //                 }).fail(function () {
    //                     swalfire("Ocurrio un Error Inesperado", "error")
    //                 });

    //             }
    //             else if (result.dismiss == 'cancel') {
    //                 // swalfire("¡Cancelo!", "error");
    //                 // $('#btncheck').attr('checked', false);
    //                 // $('#btncheck')[0].checked = false;
    //                 //$("#btncheck").prop('checked', false);
    //                 $("#btncheck").removeAttr("checked");
    //             }
    //             else { //Si selecciona el boton cancelar del swal que el checkbox también se desckequee
    //                 // $("#btncheck").removeAttr("checked");
    //                 // $("#btncheck").prop('checked', false);
    //                 // $('#btncheck')[0].checked = false;
    //                 $("#btncheck").removeAttr("checked");
    //             }
    //         });
    //     }

    // });

});
