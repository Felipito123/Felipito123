$(document).ready(function () {
    tablapermisoadministrativo = $('#tabla_certificado').DataTable({
        "responsive": true,
        "paging": false,  //le oculto la paginación
        "searching": false, //le oculto el buscador
        "info": false,  //le oculto la información de las entradas de la tabla
        "cache": false,
        "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        //"lengthMenu": [[5, 12, 36, 48, -1], [5, 12, 36, 48, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 3 }, //enviamos una opcion para que haga un SELECT
            "dataSrc": "",
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
            }
        },
        "columns": [
            // {
            //     "data": "ID_SPE",
            //     "render": function (data, type, JsonResultRow, row) {
            //         let res = 200 + parseInt(data);
            //         return res;
            //     }
            // },
            // { "data": "RUT" },
            { "data": "NOMBRE_FUNCIONARIO_SOLICITANTE" },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<div class='btn-group'>" +
                    "<button class='btn btn-danger btn-sm btnVerPermiso' title=\"VerPermiso\"><i class='fas fa-file-pdf'></i></button>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
            }
        ], "columnDefs": [{

            "targets": [], //oculto la columna que tiene posición 0
            "visible": false,
            // "width": "10%", "targets": 0,
            // "width": "10%", "targets": 1, 
            // "width": "10%", "targets": 2
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
            "sEmptyTable": "No hay solicitudes de permiso  administrativo aprobados",
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

    $(document).on('click', '.btnVerPermiso', function () { //AQUI VEO LA BOLETA DE UNA SOLICITUD EN PARTICULAR
        let IDPA = (tablapermisoadministrativo.row($(this).closest('tr')).data().ID_PA);
        let RUTSOLICITANTE = (tablapermisoadministrativo.row($(this).closest('tr')).data().RUTSOLICITANTE);


        let comprobarDirectorio = new Request('CERTIFICADO_SOLICITUDES/' + RUTSOLICITANTE + '-' + IDPA + '/SPA.pdf');

        fetch(comprobarDirectorio).then(function (respuesta) {
            //console.log(respuesta.status); // returns 200
            if (respuesta.status == 200) {
                mostrarcertficado();
            } else {
                toastr.error("certificado no encontrado");
            }
        }).catch(function (error) {
            console.log(error);
        });

        function mostrarcertficado() {
            Swal.fire({
                title: '<h2><strong>V E R  &nbsp; S O L I C I T U D&nbsp;  D E&nbsp;  P E R M I S O &nbsp;  \n A D M I N IS T R A T I V O </strong></h2>',
                html: `<div class="container-fluid">
                    <div class="row justify-content-center" id="framecertificado">
                        <iframe id="frameboleta" src="CERTIFICADO_SOLICITUDES/`+ RUTSOLICITANTE + `-` + IDPA + `/SPA.pdf" frameborder="0" scrolling="si" width="100%" height="750px"></iframe>
                    </div>
                </div> `,
                focusConfirm: false,
                showCancelButton: true,
                showConfirmButton: false,
                allowOutsideClick: false,
                // confirmButtonText: 'Guardar',
                // confirmButtonColor: "#f6c23e",
                cancelButtonText: '<div style="width:200px"><i class="fa fa-close pr-2" aria-hidden="true"></i> Cerrar</div>',
                cancelButtonColor: "#858796",
                width: '1050px'
            });
        }


    });

});