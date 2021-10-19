$(document).ready(function () {
    TablaMedicOcultos = $('#tabla_medic_ocultos').DataTable({
        "responsive": true,
        "cache": false,
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 1, subselect: 2 }, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
            }
        },
        "columns": [
            {
                "data": "IMAGEN_MEDICAMENTO",
                "render": function (data, type, JsonResultRow, row) {
                    return ` <button class="btn btn-outline-danger btn-sm btnImagen" title="Editar Medicamento"><i class="fas fa-images"></i></button>`;
                }

            },
            { "data": "NOMBRE_TIPO_MEDICAMENTO" },
            { "data": "NOMBRE_CATEGORIA" },
            { "data": "NOMBRE_MEDICAMENTO" },
            { "data": "STOCK_MEDICAMENTO" },
            {
                "data": "VISIBILIDAD_MEDICAMENTO",
                "render": function (data, type, JsonResultRow, row) {

                    if (data == '0') {
                        //<span class="badge badge-success">Success</span>
                        return '<span class="badge badge-danger pl-3 pr-3">Oculto</span>';
                    } else {
                        return '<span class="badge badge-success">Disponible</span>';
                    }
                }
            },
            {
                "defaultContent":
                    "<div class='row justify-content-center'>" +
                    "<div class='col align-items-center'>" +
                    "<div class='btn-group'>" +
                    "<input type='checkbox' id='btnOcultarMedicamento'>" +
                    // "<button class='btn btn-success btn-sm'><i class='fa fa-unlock' aria-hidde='true'></i> Mostrar</button>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
            }
        ],
        "columnDefs": [{

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
            "sEmptyTable": "No hay medicamentos ocultos en esta tabla",
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

   

    // $("body").on("mouseout", "#p3", function() {
    //     $('#p3 a').miniPreview({ prefetch: 'parenthover' });
    //   });


    $(document).on('change', '#btnOcultarMedicamento', function () {
        let IDM = (TablaMedicOcultos.row($(this).closest('tr')).data().ID_MEDICAMENTO);
        // allowOutsideClick: false, permite que al clickear fuera del modal no se cierre sino hasta cuando se aprete el boton cancelar
        if (this.checked) {
            Swal.fire({
                title: '¿Desea visibilizar el medicamento?',
                //icon: 'info',
                showClass: { //para esta animación del modal integre un css llamado animate.min.css
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Si, confirmo',
                cancelButtonText: 'No, cancelar',
                confirmButtonColor: "#17a2b8",
                cancelButtonColor: "#858796",
                allowOutsideClick: false,
                width: '550px',
                preConfirm: () => {
                    if (validavacioynulo([IDM])) { Swal.showValidationMessage('¡No se ha recibido parámetro del medicamento!') }
                    else {
                        $.post('funciones/acceso.php', { idmedicamento: parseInt(IDM), seleccionar: 8 }, function (respuesta) {
                            console.log("VISIBILIZAR MEDICAMENTO: " + respuesta);
                            if (respuesta == 1) {
                                swalfire("¡Campo vacio!", "error");
                            } else if (respuesta == 2) {
                                swalfire("¡Medicamento ya se encuentra Visible", "error");
                                tablamedicamentos.ajax.reload(null, false);
                                TablaMedicOcultos.ajax.reload(null, false);
                            }  else if (respuesta == 3) {
                                swalfire("¡Hubo un error al visibilizar el  medicamento", "error");
                            } else if (respuesta == 4) {
                                swalfire("Medicamento visible!", "success");
                                tablamedicamentos.ajax.reload(null, false);
                                TablaMedicOcultos.ajax.reload(null, false);
                            } else if (respuesta == 5) {
                                swalfire("¡Parámetros no recibidos!", "error");
                            }
                        }).fail(function () {
                            swalfire("Ocurrio un Error Inesperado", "error");
                        });
                    }
                }
            }).then((respuestaaccion) => {
                if (respuestaaccion.value) {
                    // console.log('boton confirmar');
                    $("#btnOcultarMedicamento").prop('checked', false);
                } else if (respuestaaccion.dismiss == 'cancel') {
                    // console.log('boton cancelar');
                    $("#btnOcultarMedicamento").prop('checked', false);
                }
            });
        }

    });



    $("body").on("mouseover", ".btnImagen", function() {
        let IDM = (TablaMedicOcultos.row($(this).closest('tr')).data().ID_MEDICAMENTO);
        let NombreImagen = (TablaMedicOcultos.row($(this).closest('tr')).data().IMAGEN_MEDICAMENTO);
        Swal.fire({
            // title: 'Imagen',
            // icon: 'success',
            showClass: { //para esta animación del modal integre un css llamado animate.min.css
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            html: `
            <div class="row justify-content-center">
                <div class="col-lg-12">
                <img src="img/`+IDM+`/`+NombreImagen+`" width="300" height="350"/>
                </div>
            </div>`,
            focusConfirm: false,
            showCancelButton: true,
            // confirmButtonText: 'Guardar',
            // cancelButtonText: 'Cancelar',
            // confirmButtonColor: "#e74a3b",
            // cancelButtonColor: "#858796",
            showCancelButton: false, // There won't be any cancel button
            showConfirmButton: false,
            timer: 2000,
            width: '500px'
        });
    });

});