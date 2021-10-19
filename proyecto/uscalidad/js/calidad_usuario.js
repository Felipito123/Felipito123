//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {

    tablacalidad = $('#tabla-calidad-usuario').DataTable({
        "responsive": true,
        "ordering": false,
        "lengthMenu": [[5, 10, 35, 50, -1], [5, 10, 35, 50, "All"]],
        "ajax": {
            "url": "funciones/fun_llenar_calidad_usuario.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "ID_CALIDAD_US" },
            { "data": "DESCRIPCION_CALIDAD_US" },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<button class='btn btn-info btn-sm btnmodalarchivo' title='Descargar' style='height:23px;text-align:center;font-size:10px;background-color:#36b9cc'><i class='fa fa-files-o' style='color:white;'></i> Ver y descargar</button>" +
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
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
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
            }
        }

    });


    $(document).on("click", ".btnmodalarchivo", function () {

        let ID = (tablacalidad.row($(this).closest('tr')).data().ID_CALIDAD_US);
        let UBICACION = (tablacalidad.row($(this).closest('tr')).data().NOMBRE_ARCHIVO_CALIDAD_US);

        $('#modalarchivocalidad').modal('show');
        // $('#framecalidad').attr('src', 'CalidadArchivo/' + ID + '/' + UBICACION);

        let comprobarDirectorio = new Request('CalidadArchivo/'+ID+'/'+UBICACION); //si modificas la ruta a una ruta invalida aparecera la lupa 

        fetch(comprobarDirectorio).then(function (respuesta) {
            //console.log(respuesta.status); // returns 200
            if (respuesta.status == 200) {
                $('#framecalidad').attr('src','CalidadArchivo/'+ID+'/'+UBICACION);
                $("#error").remove();
            } else {
                $('#framecalidad').attr('src', '../../imgpordefecto/lupaceleste.png');
                document.getElementById("framecalidad").style.width = "70%";
                $("#error").show();
            }

        }).catch(function (error) {
            console.log(error);
        });
    });

    llenarcirculovacaciones();
    function llenarcirculovacaciones() {
        $.get("../micuenta/funciones/llenar_circulo.php", function (data) {
            console.log(data);
            var jsonNuevo = JSON.parse(data);
            $('#total_micuenta').html('+ '+jsonNuevo[0].total_documentosmicuenta);
            $('#total_calidad').html('+ '+jsonNuevo[1].total_documentoscalidad);
            $('#total_sl_permisos').html('+ '+jsonNuevo[2].total_solicitudesdepermiso);
            $('#total_videoconf').html('+ '+jsonNuevo[3].total_videoconferencias);
        });
    }
    


});