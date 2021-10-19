//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {

    tablacalidad = $('#tabla-calidad').DataTable({
        "responsive": true,
        "cache": false,
        "destroy": true,
        "ordering": false,
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR,
        "bInfo": false,
        "bLengthChange": false,
        // "bFilter": true,
        // "bPaginate": true,
        // // "bLengthMenu" : false, 
        "lengthMenu": [[12, 24, 36, 48, -1], [12, 24, 36, 48, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 1 }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error);
                swalfire("Ha ocurrido un error con el llenado de la tabla", "error")
            }
        },
        "columns": [
            /*<a href="" download></a>*/
            // { "data": "ID_CALIDAD" },
            { "data": "DESCRIPCION_CALIDAD" },
            {
                "data": "ARCHIVO_CALIDAD",
                "render": function (data, type, JsonResultRow, row) {

                    // return '<a href="CalidadArchivo/' + JsonResultRow.ID_CALIDAD + '/' + data + '" class="btn btn-info btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;" target="_blank"><i class="fa fa-files-o"></i></a>';
                    return '<div class="row justify-content-center"><div class="col align-items-center">' +
                        '<button class="btn btn-info btn-sm btnmodalcalidadadmin" style="height:23px;text-align:center;font-size:10px;"><i class="fa fa-files-o" style="color:white;"></i> Ver documento</button>' +
                        '</div></div>';
                }

            },
            {
                "data": "ESTADO_CALIDAD",
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
                    "<div class='col align-items-center'>" +
                    "<label class='btn btn-info btn-circle btn-sm btnEditar' title='Editar'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></label>" +
                    "<label class='btn btn-success btn-circle btn-sm btnActivo' title='Activar'><i class='fa fa-check-circle' aria-hidden='true'></i></label>" +
                    "<label class='btn btn-warning btn-circle btn-sm btnInactivo' style='color:white' title='Inactivar'><i class='fa fa-minus-circle' aria-hidden='true'></i></label>" + //times-circle
                    "<label class='btn btn-danger btn-circle btn-sm btnBorrar' style='color:white' title='Eliminar'><i class='fa fa-trash-o' aria-hidden='true'></i></label>" +
                    "</div>" +
                    "</div>"
            }
        ], "columnDefs": [{

            "targets": [], //oculto la columna que tiene posición 0
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


    // let dtTable = $("#tabla-calidad").DataTable();

    $('#descripcion_calidad').on('keydown', function (ev) { //si en el input se apreta enter se activa el formulario
        if (ev.key === 'Enter') {
            formularioRegistro();
        }
    });

    $('#descripcion_modal_editar').on('keydown', function (ev) { //si en el input se apreta enter se activa el formulario
        if (ev.key === 'Enter') {
            formularioEditarArchivo();
        }
    });


    $("#form-documento-calidad").on('submit', function (event) {
        event.preventDefault();
        formularioRegistro();
    });


    $(document).on('click', '.btnEditar', function () {

        let id_calidad = (tablacalidad.row($(this).closest('tr')).data().ID_CALIDAD);
        let descripcion_calidad = (tablacalidad.row($(this).closest('tr')).data().DESCRIPCION_CALIDAD);

        $(function () { //Por conflicto entre modals, ya que tengo el de agregar y editar. Uno de los dos no se mostraba
            $("#modal-editar-calidad").appendTo("body");
            $('#modal-editar-calidad').modal('show');
        });

        // $('body').on('hidden.bs.modal', '.modal', function () {
        //     $(this).removeData('bs.modal');
        // });

        // $('#modal-editar-calidad').modal('show');

        $("#id_modal_editar").val(id_calidad);
        $("#descripcion_modal_editar").val(descripcion_calidad);
    });


    // //=======================================================================ENVIO DEL MODAL ================================================================================= //



    $("#form-modal-editar-calidad").on('submit', function (event) {
        event.preventDefault(); //RETIENE LA RECARGA 
        formularioEditarArchivo();
    });


    //=======================================================================ENVIO DEL MODAL ================================================================================= //


    //=======================================================================BOTON ACTIVAR ================================================================================= //
    $(document).on("click", ".btnActivo", function () {
        let tipoboton = 1; //botonActivar
        let IDBTN = (tablacalidad.row($(this).closest('tr')).data().ID_CALIDAD);

        if (validavacioynulo([IDBTN, tipoboton])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
        else {
            $.post('funciones/acceso.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton), seleccionar: 2 }, function (respuesta) {
                // console.log(respuesta);
                if (respuesta == 1 || respuesta == 444) {
                    swalfire("¡Parámetros vacíos!", "info");
                } else if (respuesta == 2) {
                    swalfire("¡Archivo ya está activo!", "info");
                } else if (respuesta == 3) {
                    swalfire("¡Ha ocurrido un error!", "error");
                } else if (respuesta == 4) {
                    tablacalidad.ajax.reload(null, false);
                    swalfire("¡Archivo activado!", "success");
                }
            });
        }
    });
    //=======================================================================BOTON ACTIVAR ================================================================================= //

    //=======================================================================BOTON INACTIVAR ================================================================================= //
    $(document).on("click", ".btnInactivo", function () {
        let tipoboton = 2; //botonInactivo
        let IDBTN = (tablacalidad.row($(this).closest('tr')).data().ID_CALIDAD);

        if (validavacioynulo([IDBTN, tipoboton])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
        else {
            $.post('funciones/acceso.php', { idbtn: parseInt(IDBTN), tipoBTN: parseInt(tipoboton), seleccionar: 2 }, function (respuesta) {
                //  console.log(respuesta);
                if (respuesta == 1 || respuesta == 444) {
                    swalfire("¡Parámetros vacíos!", "info");
                } else if (respuesta == 2) {
                    swalfire("¡Archivo ya está inactivo!", "info");
                } else if (respuesta == 3) {
                    swalfire("¡Ha ocurrido un error!", "error");
                } else if (respuesta == 4) {
                    tablacalidad.ajax.reload(null, false);
                    swalfire("¡Archivo inactivado!", "success");
                }
            });
        }
    });
    //=======================================================================BOTON INACTIVAR ================================================================================= //

    //===================================================================BOTON ELIMINAR===================================================================// 

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
                text: 'El archivo será eliminado y no se podra recuperar. ¿Desea continuar?',
            },

        ]).then((result) => {
            if (result.value) {
                let id_calidad = (tablacalidad.row($(this).closest('tr')).data().ID_CALIDAD);
                console.log(id_calidad);
                if (validavacioynulo([id_calidad])) { swalfire("¡Campo(s) vacio(s)!", "error"); }
                else {
                    $.post('funciones/acceso.php', { idcalidad: parseInt(id_calidad), seleccionar: 5 }, function (respuesta) {
                        //console.log("Se ha borrado el documento: " + respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Campos vacios, verifique datos!", "error");
                        } else if (respuesta == 2) {
                            swalfire("¡Ha ocurrido un error al eliminar un documento!", "error");
                        } else if (respuesta == 3) {
                            tablacalidad.ajax.reload(null, false);
                            //Aunque no existe el directorio si lo borra de la base de datos,
                            //entonces igual hay que refrescar la datatable
                            // swalfire("¡No existe el directorio!", "error");
                            swalfire("¡Archivo eliminado correctamente!", "success");
                        } else if (respuesta == 4) {
                            tablacalidad.ajax.reload(null, false);
                            swalfire("¡Archivo eliminado correctamente!", "success");
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

    //===================================================================BOTON ELIMINAR===================================================================// 


    /*  function recarga(){  //NO ME SIRVE RECARGAR CADA 5 SEGUNDOS PORQUE SI ELIMINAMOS ALGO Y SE ALCANZA A RECARGAR ANTES, SE PIERDE EL ID DE DATO Y NO SE PUEDE ELIMINAR
          dtTable.ajax.reload(null, false);
        }
        setInterval(recarga, 5000); */

    $(document).on("click", ".btnmodalcalidadadmin", function () {
        $('#modalcalidadADMIN').modal('show');

        let ID = (tablacalidad.row($(this).closest('tr')).data().ID_CALIDAD);
        let UBICACION = (tablacalidad.row($(this).closest('tr')).data().ARCHIVO_CALIDAD);


        $(function () { //Por conflicto entre modals, ya que tengo el de agregar y editar. Uno de los dos no se mostraba
            $("#modalcalidadADMIN").appendTo("body");
            $('#modalcalidadADMIN').modal('show');
        });


        let comprobarDirectorio = new Request('../uscalidad/CalidadArchivo/' + ID + '/' + UBICACION);

        fetch(comprobarDirectorio).then(function (respuesta) {
            //console.log(respuesta.status); // returns 200
            if (respuesta.status == 200) {
                $('#framecalidadadmin').attr('src', '../uscalidad/CalidadArchivo/' + ID + '/' + UBICACION);
                $("#error").hide();
            } else {
                $('#framecalidadadmin').attr('src', '../../imgpordefecto/lupa.png');
                document.getElementById("framecalidadadmin").style.width = "70%";
                $("#error").show();
            }

        }).catch(function (error) {
            console.log(error);
        });

    });

});

