function llenarSelectMateriales() {
    $.post('funciones/acceso.php', { seleccionar: 4 }, function (respuesta) {
        //  console.log("RESPP: " + respuesta);
        $('#mat_mb').html(respuesta);
    }).fail(function () {
        swalfire("No se pudo cargar la categoria del material", "error")
    });
}

llenarSelectMateriales();

$(document).ready(function () {

    
        tabla_solicitar_bodega = $('#tabla_solicitar_bodega').DataTable({
            "responsive": true,
            "cache": false,
            "destroy": true,
            "ordering": false, //le quito el ordenamiento ascendente o descendente
            "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
            "bFilter": true,
            "bPaginate": true,
            // "bLengthMenu" : false, 
            "bLengthChange": false,
            "bInfo": false,
            "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
            "ajax": {
                "url": "funciones/acceso.php",
                "method": 'POST', //usamos el metodo POST
                "data": { seleccionar: 1}, //enviamos una opcion para que haga un SELECT
                "dataSrc": "",
                error: function (jqXHR, textStatus, error) {
                    console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
                }
            },
            "columns": [
                {
                    "data": "ID_SEGUIMIENTO",
                    "render": function (data, type, JsonResultRow, row) {
                        let resultado;
                        if (data == 1) resultado = '<span><i class="fas fa-circle fa-2x" style="color: #808080 !important;"></i></span>';
                        else if (data == 2) resultado = '<span><i class="fas fa-circle fa-2x" style="color: #009688 !important;"></i></span>';
                        else if (data == 3) resultado = '<span><i class="fas fa-circle fa-2x" style="color: #e74a3b !important;"></i></span>';
                        return resultado;
                    }
                },
                { "data": "NOMBRE_CATEGORIA_MB" },
                { "data": "CANTIDAD_SL" },
                { "data": "NOMBRE_MATERIAL_MB" },
                {
                    "data": "FECHA_REGISTRO_SL",
                    "render": function (data, type, JsonResultRow, row) {
                        let separar = data.split("-");
                        return separar[2] + '/' + separar[1] + '/' + separar[0];
                    }
                },
                { "data": "COMENTARIO" },
                {
                    render: function (data, type, JsonResultRow, row) {
                        let concatenar = `
                            <div class='row justify-content-center'>
                                <div class='col align-items-center'>
                                    <div class='btn-group'>
                        `;
    
                        if (JsonResultRow.ID_SEGUIMIENTO == 1 || JsonResultRow.ID_SEGUIMIENTO == 3) { //sólo si las solicitudes con ID_SEGUIMIENTO, pendientes y rechazadas, podrán ser eliminadas
                            concatenar += ` 
                            <button class='btn btn-danger btn-sm btnEliminarSolicitud' title=\"Eliminar Solicitud\"><i class='fa fa-trash-o' aria-hidde='true'></i></button>`;
                        } else if(JsonResultRow.ID_SEGUIMIENTO == 2){
                            concatenar += `<label>Solicitud Aprobada</label>`;
                        }
                        concatenar += `
                        </div></div></div>`;
                        return concatenar;
                    }
                }
            ], "columnDefs": [{
                "targets": [], //oculto la columna ID_USUARIO que tiene posición 0 Y 4
                "visible": false,
                "searchable": true
            },
            ],
            "oLanguage": {
                "sProcessing": "Procesando...",
                "sLengthMenu": 'Mostrar <select>' +
                    '<option value="10">10</option>' +
                    '<option value="25">25</option>' +
                    '<option value="40">40</option>' +
                    '<option value="80">80</option>' +
                    '<option value="-1">Todos</option>' +
                    '</select> registros',
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "No se encontraron resultados en esta tabla",
                "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
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




        // $(".dataTables_filter").hide(); //oculto el filtrador por defecto del datatable
        // tabla_inventario_bodega.search("lavalozas").draw();


        $(document).on("click", ".btnEliminarSolicitud", function () {
            let identificador = (tabla_solicitar_bodega.row($(this).closest('tr')).data().ID_SOLICITUD);
            // toastr.success(""+identificador, "Éxito");

            Swal.fire({
                title: '¿Desea eliminar la solicitud?',
                //icon: 'info',
                // showClass: { //para esta animación del modal integre un css llamado animate.min.css
                //     popup: 'animate__animated animate__fadeInDown'
                // },
                // hideClass: {
                //     popup: 'animate__animated animate__fadeOutUp'
                // },
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Si, confirmo',
                cancelButtonText: 'No, cancelar',
                confirmButtonColor: "#e74a3b",
                cancelButtonColor: "#858796",
                width: '550px',
                preConfirm: () => {
                    if (validavacioynulo([identificador])) { Swal.showValidationMessage('¡No se ha recibido parámetro del medicamento!') }
                    else {
                        $.post('funciones/acceso.php', { id_solicitud: identificador, seleccionar: 6 }, function (respuesta) {
                            // console.log("ELIMINAR PACIENTE: " + respuesta);
                            if (respuesta == 1) {
                                toastr.error("Campos vacios", "UpS");
                            } else if (respuesta == 2) {
                                toastr.error("Esta solicitud ya ha sido aprobada, por lo tanto, no se puede eliminar", "UpS");
                                tabla_solicitar_bodega.ajax.reload(null, false);
                            } else if (respuesta == 3) {
                                toastr.error("Ha ocurrido un error, si el mensaje persiste, por favor, contacte a soporte", "UpS");
                            } else if (respuesta == 4) {
                                tabla_solicitar_bodega.ajax.reload(null, false);
                                llenarpanel();
                                toastr.success("Solicitud eliminada correctamente", "Éxito");
                            } else if (respuesta == 444) {
                                toastr.error("Parámetros no recibidos", "UpS");
                            }

                        }).fail(function () {
                            swalfire("Ocurrio un Error Inesperado", "error")
                        });
                    }
                }
            });

        });


    $("#formularioRegSolMaterial").on('submit', function (event) {
        form = $("#formularioRegSolMaterial");

        let id_mat_mb = $('#mat_mb').val();
        let cantidadmaterial = $('#cantidadmaterial').val();
        let maximodisponible = $('#MaximoCantDisponibles').val();

        if (validavacioynulo([id_mat_mb, cantidadmaterial])) {
            toastr.info("Parámetros vacíos");
        } else if (cantidadmaterial.length < 1 || cantidadmaterial.length > 500) {
            toastr.info("Debe seleccionar una cantidad");
        } else if (parseInt(cantidadmaterial) == 0 || parseInt(cantidadmaterial) < 1) {
            toastr.info("La cantidad a solicitar debe ser mayor a 0");
        }else if (parseInt(cantidadmaterial) > parseInt(maximodisponible)) {
            toastr.info("El stock disponible es menor a la cantidad solicitada");
        } else {
            // consultadatos(rut_consultar, ano_consultar, 2);
            $.post('funciones/acceso.php', { seleccionar: 5, id_mat_mb: parseInt(id_mat_mb), cantidadmaterial: parseInt(cantidadmaterial) }, function (respuesta) {
                console.log("RESPP: " + respuesta);
                if (respuesta == 1) {
                    toastr.error("Parámetros vacíos");
                }else if (respuesta == 2) {
                    toastr.error("Ocurrió un error al registrar el material, si el problema persiste, por favor contacte a soporte.");
                } else if (respuesta == 3) {
                    form[0].reset();
                    llenarpanel();
                    tabla_solicitar_bodega.ajax.reload(null, false);
                    $('#indicecantidad').fadeOut();
                    toastr.success("Solicitud registrada");
                }
            }).fail(function () {
                swalfire("No se pudo mostrar stock maximo de ese estado en particular", "error");
            });

        }
        event.preventDefault();
    });

});



llenarpanel();
function llenarpanel() {
    let jsonresp, contador;
    $.post('funciones/acceso.php', { seleccionar: 9 }, function (respuesta) {
        jsonresp = JSON.parse(respuesta);
        contador = jsonresp.length;
        console.log("LLENAR PANEL: " + respuesta);
        console.log("LARGO DEL ARRAY " + contador);

        if (contador === 0) {
            $('#solicitudes_pendiente').text('0');
            $('#solicitudes_aprobadas').text('0');
            $('#solicitudes_rechazadas').text('0');
        } else if (contador > 0) {
            // for (let i = 0; i < contador; i++) {
            //     if (jsonresp[i].ID_SEGUIMIENTO == 1) {
            //         $('#solicitudes_pendiente').text(jsonresp[i].CANTIDAD);
            //     } else if (jsonresp[i].ID_SEGUIMIENTO == 2) {
            //         $('#solicitudes_aprobadas').text(jsonresp[i].CANTIDAD);
            //     } else if (jsonresp[i].ID_SEGUIMIENTO == 3) {
            //         $('#solicitudes_rechazadas').text(jsonresp[i].CANTIDAD);
            //     } else {
            //         console.log("es otra categoria");
            //     }
            // }
            $('#solicitudes_pendiente').text(jsonresp[0].solicitud_pendientes_acum);
            $('#solicitudes_aprobadas').text(jsonresp[1].solicitud_aprobadas_acum);
            $('#solicitudes_rechazadas').text(jsonresp[2].solicitud_rechazadas_acum);
        }

    }).fail(function () {
        swalfire("No se pudo mostrar stock maximo de ese estado en particular", "error");
    });
}