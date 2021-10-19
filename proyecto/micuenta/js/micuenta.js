//===================================================================LLENADO DE DATATABLE===================================================================// 

$(document).ready(function () {

    tablagaleria = $('#tabla-planilla-usuario').DataTable({
        "responsive": true,
        "ordering": false,
        "lengthMenu": [[5, 10, 35, 50, -1], [5, 10, 35, 50, "All"]],
        "ajax": {
            "url": "funciones/fun_llenar_planilla_usuario.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "ID_DOCUMENTO_US" },
            { "data": "RUT_DOCUMENTO_US" },
            { "data": "NOMBRE_USUARIO_DOCUMENTO_US" },
            { "data": "DESCRIPCION_DOCUMENTO_US" },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<button class='btn btn-secondary btn-sm btnmodalpdf' title='Descargar' style='height:23px;text-align:center;font-size:10px;background-color:gray;color:white !important;'><i class='fa fa-file-pdf-o' style='color:white;'></i> Ver y descargar</button>" +
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


    function muestra() {
        $.ajax({
            type: 'POST',
            url: 'funciones/fun_llenar_micuenta.php',
            data: { 'pues': 1 },
            complete: function () { $('#gif').remove(); }
        }).done(function (html) {
            $('#mostrar').html(html);
        }).fail(function () {

        });
    }

    llenarcirculomicuenta();
    function llenarcirculomicuenta() {
        $.get("funciones/llenar_circulo.php", function (data) {
            var jsonNuevo = JSON.parse(data);
            // console.log(jsonNuevo);

            $('#total_micuenta').html('+ '+jsonNuevo[0].total_documentosmicuenta);
            $('#total_calidad').html('+ '+jsonNuevo[1].total_documentoscalidad);
            $('#total_sl_permisos').html('+ '+jsonNuevo[2].total_solicitudesdepermiso);
            $('#total_videoconf').html('+ '+jsonNuevo[3].total_videoconferencias);


            // for (let i = 0; i < jsonNuevo.length; i++) {
            //     // console.log(jsonNuevo[i]);
            //     if(jsonNuevo[i].DIASTOMADOS==0 || jsonNuevo[i].DIASTOMADOS==null) {
            //         $('#diastomados').html(0 + ' DIAS');
            //     } else if(jsonNuevo[i].DIASRESTANTES==0 || jsonNuevo[i].DIASRESTANTES==null) {
            //         $('#diasrestantes').html(0 + ' DIAS');
            //     }else if(jsonNuevo[i].DIASGANADOS==0 || jsonNuevo[i].DIASGANADOS==null) {
            //         $('#diasganados').html(0 + ' DIAS');
            //     }else{
            //         $('#diasganados').html(jsonNuevo[i].DIASGANADOS + ' DIAS');
            //         $('#diastomados').html(jsonNuevo[i].DIASTOMADOS + ' DIAS');
            //         $('#diasrestantes').html(jsonNuevo[i].DIASRESTANTES + ' DIAS');
            //     } 
            // }
        });
    }
    


    setInterval(muestra, 2000);



    /* $(document).on("click", ".limpiar", function () {
        let limpiar = 1;
        $.post('./funcionesphp/fun_limpiar_documentacion_usuario.php', { limpiado: limpiar }, function (respuesta) {
            console.log(respuesta);
            if (respuesta == 1) {
                alertify.error("¡Error en la consulta!");
            } else if (respuesta == 2) {
                alertify.success("Limpiado correctamente");
            }
            else if (respuesta == 3) {
                alertify.error("No se recibieron parámetros");
            }
            else if (respuesta == 4) {
                alertify.error("El boton limpiar no envia parámetro");
            }
        });
    });*/

    $(document).on("click", ".btnmodalpdf", function () {

        let ID = (tablagaleria.row($(this).closest('tr')).data().ID_DOCUMENTO_US);
        let UBICACION = (tablagaleria.row($(this).closest('tr')).data().NOMBRE_DOCUMENTO_US);

        $('#modalpdfmicuenta').modal('show');

        let comprobarDirectorio = new Request('archivomicuenta/' + ID + '/' + UBICACION);

        fetch(comprobarDirectorio).then(function (respuesta) {
            //console.log(respuesta.status); // returns 200
            if (respuesta.status == 200) {
                $('#framemicuenta').attr('src', 'archivomicuenta/' + ID + '/' + UBICACION);
                $("#error").hide();
            } else {
                $('#framemicuenta').attr('src', '../../imgpordefecto/lupa.png');
                document.getElementById("framemicuenta").style.width = "70%";
                document.getElementById("framemicuenta").style.height = "500px";
                $("#error").show();
            }

        }).catch(function (error) {
            console.log(error);
        });


    });

});