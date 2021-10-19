//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {

    tabla_bandeja_mensajes = $('#tabla-bandeja-mensajes').DataTable({
        "responsive": true,
        "ordering":false,
        "lengthMenu": [[10, 20, 40, 80, -1], [10, 20, 40, 80, "All"]],
        "ajax": {
            "url": "funciones/fun_llenar_bandeja_mensajes.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [

            // { "data": "ID_CONTACTO" },
            { "data": "NOMBRE" },
            { "data": "CORREO" },
            { "data": "TELEFONO" },
            { "data": "ASUNTO" },
            { "data": "DESCRIPCION" },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<button class='btn btn-info btn-circle btn-sm btnver' title=\"Ver detalle\"><i class='fa fa-eye' aria-hidden='true'></i></button>" +
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
                '<option value="20">20</option>' +
                '<option value="40">40</option>' +
                '<option value="80">80</option>' +
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


    let dtTable = $("#tabla-bandeja-mensajes").DataTable();
    //===================================================================BOTON ELIMINAR DEL DATATABLE===================================================================// 

    $(document).on('click', '.btnBorrar', function () {
        let id = (dtTable.row($(this).closest('tr')).data().ID_CONTACTO);
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
                text: 'El mensaje será eliminado y no se podra recuperar',
            },

        ]).then((result) => {
            if (result.value) {
                // console.log(id);
                if (validavacioynulo([id])) { swalfire("No se encuentra el mensaje", "error"); }
                else {
                    $.post('funciones/fun_eliminar_mensaje_bandeja.php', { ID_CONTACTO: parseInt(id) }, function (response) {
                        console.log(response);
                        if (response == 1) {
                            swalfire("¡Mensaje eliminado exitosamente!", "success");
                            dtTable.ajax.reload(null, false);
                        }else if (response == 2) {
                            swalfire("¡No se pudo hacer la consulta en la BD para eliminar!", "error");
                        }else if (response == 3) {
                            swalfire("¡No se recibieron parametros!", "error");
                        }else if (response == 4) {
                            swalfire("¡Parámetros vacíos!", "info");
                        }
                    });
                }
            } else {
                //swal("¡Cancelado!", "Usted ha Cancelado", "info");
            }
        });


    });

    //===================================================================BOTON ELIMINAR DEL DATATABLE===================================================================// 

    $(document).on('click', '.btnver', function () {
        let obtiene_nombre = (dtTable.row($(this).closest('tr')).data().NOMBRE);
        // let obtiene_correo = (dtTable.row($(this).closest('tr')).data().CORREO);
        // let obtiene_telefono = (dtTable.row($(this).closest('tr')).data().TELEFONO);
        let obtiene_asunto = (dtTable.row($(this).closest('tr')).data().ASUNTO);
        let obtiene_descripcion = (dtTable.row($(this).closest('tr')).data().DESCRIPCION);

        $('#modal-ver-mensajes').modal('show');
        $('#nombre_modal_ver_mensajes').val(obtiene_nombre);
        // $('#correo_modal_ver_mensajes').val(obtiene_correo);
        // $('#telefono_modal_ver_mensajes').val(obtiene_telefono);
        $('#asunto_modal_ver_mensajes').val(obtiene_asunto);
        $("#descripcion_modal_ver_mensajes").val(obtiene_descripcion);

    });


});



