//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {

    tabladocumentacion = $('#tabladocumentos').DataTable({
        "responsive": true,
        // "destroy":true,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "cache": false,
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR,
        "lengthMenu": [[12, 24, 36, 48, -1], [12, 24, 36, 48, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 1 }, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error);
                swalfire("Ha ocurrido un error con el llenado de la tabla", "error")
            }
        },
        "columns": [
            /*<a href="" download></a>*/
            { "data": "ID" },
            { "data": "RUT" },
            { "data": "NOMBRE_USUARIO" },
            { "data": "DESCRIPCION" },
            {
                "data": "ARCHIVO",
                "render": function (data, type, JsonResultRow, row) {
                    //Agregue el onclick para que no se mostrara la ruta, tengo que seguir mejorando para que no se muestra la ruta en la nueva pestaña
                    //onclick="location.href=\'planillaArchivo/' + JsonResultRow.ID_PLANILLA + '/' + data +' \'"
                    //href="planillaArchivo/' + JsonResultRow.ID_PLANILLA + '/' + data + '"
                    //  return '<a href="planillaArchivo/' + JsonResultRow.ID_PLANILLA + '/' + data + '"  class="btn btn-danger btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;background-color:red;" target="_blank"><i class="fa fa-file-pdf-o" style="color:white"></i></a>';

                    return '<div class="row justify-content-center"><div class="col align-items-center">' +
                        '<button class="btn btn-danger btn-sm btnmodaldocumento" style="width:58px;height:23px;text-align:center;font-size:10px;background-color:red"><i class="fa fa-file-pdf-o" style="color:white;"></i></button>' +
                        '</div></div>';
                }

            },
            {
                "data": "ESTADO",
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
                    // "<div class='btn-group'>" +
                    "<label class='btn btn-info btn-circle btn-sm btnEditar' title='Editar' ><i class='fa fa-pencil-square-o' aria-hidden='true'></i></label>" +
                    "<label class='btn btn-success btn-circle btn-sm btnActivo' title='Activar'><i class='fa fa-check-circle' aria-hidden='true'></i></label>" +
                    "<label class='btn btn-warning btn-circle btn-sm btnInactivo' style='color:white' title='Inactivar'><i class='fa fa-minus-circle' aria-hidden='true'></i></label>" + //times-circle
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
            }
        }

    });
    //===================================================================LLENADO DE DATATABLE===================================================================//     

    tablanotificaciones = $('#tabla-de-notificaciones-admin').DataTable({
        "responsive": true,
        //"paging": false,  //le oculto la paginación
        //"searching": false, //le oculto el buscador
        //"info": false,  //le oculto la información de las entradas de la tabla
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "cache": false,
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "lengthMenu": [[8, 12, 36, 48, -1], [8, 12, 36, 48, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 2 }, //enviamos una opcion para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "NOMBRE_USUARIO" },
            { "data": "MENSAJE_NOTIFICACION" },
            { "data": "FECHA_NOTIFICACION" },
            {
                "data": "ESTADO_NOTIFICACION",
                "render": function (data, type, JsonResultRow, row) {
                    //https://fontawesome.com/v6.0/docs/web/style/animate
                    //Animaciones desde el css del head : fa-spin fa-bear fa-flip fa-flash
                    if(data == 'visto'){
                        return '<label><i class="fas fa-eye fa-flip text-success"></i> Visto</label>';
                    }else{
                        return '<label><i class="fas fa-eye-slash text-warning fa-flash"></i> No Visto</label>';
                    }
                }
            }
            // { "data": "ESTADO_NOTIFICACION" }
        ], "columnDefs": [{

            "targets": [], //oculto la columna que tiene posición 0
            "visible": false,
            "searchable": true //true
        },

        ],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": 'Mostrar <select>' +
                '<option value="8">8</option>' +
                '<option value="12">12</option>' +
                '<option value="36">36</option>' +
                '<option value="48">48</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay notificaciones para mostrar",
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


    let dtTable = $("#tabladocumentos").DataTable();


    $('#descripcion_modal').on('keydown', function (ev) { //si en el input se apreta enter se activa el filtro de busqueda
        if (ev.key === 'Enter') {
            formularioRegistro();
        }
    });


    $('#noti_desc').on('keydown', function (ev) { //si en el input se apreta enter se activa el filtro de busqueda
        if (ev.key === 'Enter') {
            formularioEnviarNotificacion();
        }
    });

    $('#descripcion_editar').on('keydown', function (ev) { //si en el input se apreta enter se activa el filtro de busqueda
        if (ev.key === 'Enter') {
            formularioEditarDocumento();
        }
    });


    $("#form-modal-planilla").on('submit', function (event) { //AQUI QUEDE AMIGO FELIPE
        event.preventDefault();
        formularioRegistro();
    });

    $(document).on('click', '.btnEditar', function () {
        let ID = (tabladocumentacion.row($(this).closest('tr')).data().ID);
        let RUT = (tabladocumentacion.row($(this).closest('tr')).data().RUT);
        let NOMBRE = (tabladocumentacion.row($(this).closest('tr')).data().NOMBRE_USUARIO);
        let DESCRIPCION = (tabladocumentacion.row($(this).closest('tr')).data().DESCRIPCION);

        $(function () { //Por conflicto entre modals, ya que tengo el de agregar y editar. Uno de los dos no se mostraba
            $("#modal-editar-planilla").appendTo("body");
            $('#modal-editar-planilla').modal('show');
        });

        $('#id_documento').val(ID);
        $('#nombre_usuario').val(RUT + " - " + NOMBRE);
        $("#descripcion_editar").val(DESCRIPCION);

        /*  
        zoomdelaimagen('galeria/' + id_img_galeria + '/' + nombre_img_galeria);
        $('#modal-img-galeria').on('hidden.bs.modal', function () {
        document.getElementById('archivo_img_galeria').setCustomValidity('');
        $('#archivo_img_galeria').val('');
          }); */

    });


    // //=======================================================================ENVIO DEL MODAL ================================================================================= //
    $("#form-modal-editar-planilla").on('submit', function (event) {
        event.preventDefault(); //RETIENE LA RECARGA 
        formularioEditarDocumento();
    });

    // //=======================================================================ENVIO DEL MODAL ================================================================================= //


    // //=======================================================================BOTON ACTIVAR ================================================================================= //
    $(document).on("click", ".btnActivo", function () {
        let tipoboton = 1; //botonActivar
        let IDBTN = (dtTable.row($(this).closest('tr')).data().ID);

        if (validavacioynulo([tipoboton, IDBTN])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
        else {
            $.post('funciones/acceso.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton), seleccionar: 5 }, function (respuesta) {
                //console.log("ACTIVACIÓN: " + respuesta);
                if (respuesta == 1 || respuesta == 444) {
                    swalfire("¡Parámetros vacíos!", "info");
                } else if (respuesta == 2) {
                    swalfire("¡Documento ya está activo!", "info");
                } else if (respuesta == 3) {
                    swalfire("¡Ha ocurrido un error!", "error");
                } else if (respuesta == 4) {
                    swalfire("¡Documento activado!", "success");
                    tabladocumentacion.ajax.reload(null, false);
                }
            });
        }
    });
    // //=======================================================================BOTON ACTIVAR ================================================================================= //

    // //=======================================================================BOTON INACTIVAR ================================================================================= //
    $(document).on("click", ".btnInactivo", function () {
        let tipoboton = 2; //botonInactivo
        let IDBTN = (dtTable.row($(this).closest('tr')).data().ID);

        if (validavacioynulo([tipoboton, IDBTN])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
        else {
            $.post('funciones/acceso.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton), seleccionar: 5 }, function (respuesta) {
                //console.log("INACTIVACIÓN: " + respuesta);
                if (respuesta == 1 || respuesta == 444) {
                    swalfire("¡Parámetros vacíos!", "info");
                } else if (respuesta == 2) {
                    swalfire("¡Documento ya está inactivo!", "info");
                } else if (respuesta == 3) {
                    swalfire("¡Ha ocurrido un error!", "error");
                } else if (respuesta == 4) {
                    swalfire("¡Documento inactivado!", "success");
                    tabladocumentacion.ajax.reload(null, false);
                }
            });
        }
    });
    // //=======================================================================BOTON INACTIVAR ================================================================================= //

    // //===================================================================BOTON ELIMINAR===================================================================// 

    $(document).on('click', '.btnBorrar', function () {

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
                text: 'El Documento será eliminado y no se podra recuperar. ¿Desea continuar?',
            },

        ]).then((result) => {
            if (result.value) {
                let id_documento = (tabladocumentacion.row($(this).closest('tr')).data().ID);
                // console.log(id_documento);
                if (validavacioynulo([id_documento])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
                else {
                    $.post('funciones/acceso.php', { iddocumento: parseInt(id_documento), seleccionar: 7 }, function (respuesta) {
                        //console.log("Se ha borrado el documento: " + respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Campos vacios, verifique datos!", "error");
                        } else if (respuesta == 2) {
                            swalfire("¡Ha ocurrido un error al eliminar un documento!", "error");
                        } else if (respuesta == 3) {
                            tabladocumentacion.ajax.reload(null, false);
                            //Aunque no existe el directorio si lo borra de la base de datos,
                            //entonces igual hay que refrescar la datatable
                            swalfire("¡No existe el directorio!", "error");
                        } else if (respuesta == 4) {
                            tabladocumentacion.ajax.reload(null, false);
                            swalfire("¡Documento eliminado correctamente!", "success");
                        } else if (respuesta == 5 || respuesta == 444) {
                            swalfire("¡No se ha recibido parametros!", "error");
                        }
                    });
                }
            } else {
                // swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });

    });

    // //===================================================================BOTON ELIMINAR===================================================================// 

    document.getElementById('checkboxdocumentos').onchange = function () { //DETECTO EL CAMBIO DEL CHECKBOX
        if (this.checked) {
            $("#divselect").fadeOut();//para que se desvanezca con una leve animación
            $("#not_rut").val('');  // vacia el select 
            $("#not_rut").removeAttr("required"); //remueve el required del select
            $('#checkboxdocumentos').val('todos'); //Value del checkbox
            $("#nombredelabel").html('Todos'); //Nombre del label 
        }
        else {
            $("#divselect").fadeIn(); //para que aparezca con una leve animación
            $("#not_rut").attr("required", "required");
            $('#checkboxdocumentos').val('funcionarios'); //Value del checkbox
            $("#nombredelabel").html('Funcionarios'); //Nombre del label 
        }
    }

    $("#form-notificacion-a-usuario").on('submit', function (event) { //Enviar notificacion
        event.preventDefault(); //RETIENE LA RECARGA 
        formularioEnviarNotificacion();
    });


    $(document).on("click", "#limpiarnotificacion", function () {
        let tipoboton = 1;
        $.post('funciones/acceso.php', { TB: parseInt(tipoboton), seleccionar: 9 }, function (respuesta) {
            console.log(respuesta);
            if (respuesta == 1) {
                alertify.error("¡No hay datos para limpiar!");
            } else if (respuesta == 2) {
                alertify.error("¡Ha ocurrido un error!");
            } else if (respuesta == 3) {
                tablanotificaciones.ajax.reload(null, false);
                alertify.success("¡Limpiado exitoso!");
            } else if (respuesta == 4) {
                alertify.error("¡El parametro no coincide!");
            } else if (respuesta == 5 || respuesta == 444) {
                alertify.error("¡No se recibieron parámetros!");
            }
        });
    });


    $(document).on("click", ".btnmodaldocumento", function () {
        $('#modal-mostrar-documento').modal('show');

        let ID = (tabladocumentacion.row($(this).closest('tr')).data().ID);
        let UBICACION = (tabladocumentacion.row($(this).closest('tr')).data().ARCHIVO);


        $(function () { //Por conflicto entre modals, ya que tengo el de agregar y editar. Uno de los dos no se mostraba
            $("#modal-mostrar-documento").appendTo("body");
            $('#modal-mostrar-documento').modal('show');
        });


        let comprobarDirectorio = new Request('../micuenta/archivomicuenta/' + ID + '/' + UBICACION);

        fetch(comprobarDirectorio).then(function (respuesta) {
            //console.log(respuesta.status); // returns 200
            if (respuesta.status == 200) {
                $('#framedocumento').attr('src', '../micuenta/archivomicuenta/' + ID + '/' + UBICACION);
                $("#error").hide();
            } else {
                $('#framedocumento').attr('src', '../../imgpordefecto/lupa.png');
                document.getElementById("framedocumento").style.width = "70%";
                $("#error").show();
            }

        }).catch(function (error) {
            console.log(error);
        });

    });



    // function recarga() {  //NO ME SIRVE RECARGAR CADA 5 SEGUNDOS PORQUE SI ELIMINAMOS ALGO Y SE ALCANZA A RECARGAR ANTES, SE PIERDE EL ID DE DATO Y NO SE PUEDE ELIMINAR
    //     tablaadminnotificaciones.ajax.reload(null, false);
    // }
    // // setInterval(recarga, 1000);



});
