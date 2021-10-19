$(document).ready(function () {

    resultadostabla();

    function resultadostabla(rut, ano) {

        tabla_consulta_corporativa = $('#tabla_consulta_corporativa').DataTable({
            "responsive": true,
            "cache": false,
            "destroy": true,
            "ordering": false, //le quito el ordenamiento ascendente o descendente
            "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
            "bFilter": false,
            "bPaginate": false,
            "bInfo": false,
            "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
            "ajax": {
                "url": "funciones/acceso.php",
                "method": 'POST', //usamos el metodo POST
                "data": { seleccionar: 1, rut: rut, ano: ano }, //enviamos una opcion para que haga un SELECT
                "dataSrc": "",
                error: function (jqXHR, textStatus, error) {
                    console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
                }
            },
            "columns": [
                {
                    "data": "ID_HISTORIALC",
                    "render": function (data, type, JsonResultRow, row) {
                        return (100000 + parseInt(data));
                    }
                },
                { "data": "NOMBRE_ROL" }
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
            }
        });



        $("#rut").on("change", function () {

            let rut_consultar = $('#rut').val();
            let ano_consultar = $('#ano_consultar').val(); //ano_consultar
            // toastr.success("R.U.T: " + rut_consultar + " AÑO: " + ano_consultar);
            if (validavacioynulo([rut_consultar])) {
                // No valido con toastr porque se valida en el consultadatos
                console.log("Debe ingresar el rut completamente");
                $('#nombre').val('');
            } else if (validavacioynulo([ano_consultar])) {
                // No valido con toastr porque se valida en el consultadatos
                console.log("Debe ingresar el rut completamente");
                $('#nombre').val('');
            } else {
                consultadatos(rut_consultar, ano_consultar, 1);
            }

        });


        function consultadatos(rut, ano, accion) {

            if (accion == 1) {
                $.post('funciones/acceso.php', {
                    rut_consultar: rut,
                    ano_consultar: ano,
                    seleccionar: 3
                }, function (responses) {

                    // console.log("Respuesta1: " + responses);

                    if (responses == 1 || responses == 2 || responses == 4) {
                        toastr.error("Verifique datos");
                    }
                    else if (responses == 3) {
                        // toastr.error("R.U.T inválido");
                        $('#nombre').val('');
                        $('#tabla_consulta_corporativa').dataTable().fnClearTable();
                    }
                    else {
                        $('#nombre').val(responses);
                        // $('#nombre').val(responses[0].NOMBRE_USUARIO);
                    }
                });
            } else if (accion == 2) {
                $.post('funciones/acceso.php', {
                    rut_consultar: rut,
                    ano_consultar: ano,
                    seleccionar: 3
                }, function (responses) {
                    console.log("Respuesta2: " + responses);
                    if (responses == 1 || responses == 2 || responses == 4) {
                        toastr.error("Verifique datos");
                    } else if (responses == 3) {
                        $('#nombre').val('');
                        $('#tabla_consulta_corporativa').dataTable().fnClearTable();
                        // $('#tabla_consulta_corporativa').dataTable().fnDraw();
                        // $('#tabla_consulta_corporativa').dataTable().fnDestroy();
                        // $("#tabla_consulta_corporativa").empty();
                    } else {
                        $('#nombre').val(responses);
                        // $('#nombre').val(responses[0].NOMBRE_USUARIO);
                        resultadostabla('' + rut, '' + ano);
                    }
                });
            }
        }


        $("#formulario").on('submit', function (event) {
            form = $("#formulario");


            let rut_consultar = $('#rut').val();
            let ano_consultar = $('#ano_consultar').val(); //ano_consultar

            if (validavacioynulo([rut_consultar])) {
                toastr.error("Debe ingresar el rut completamente");
                // return;
            } else if (validavacioynulo([ano_consultar])) {
                toastr.error("Debe seleccionar un año");
                // return;
            } else if (rut_consultar.length < 8 || rut_consultar.length > 11) {
                toastr.error("R.U.T inválido");
                // return;
            } else {
                consultadatos(rut_consultar, ano_consultar, 2);
            }
            event.preventDefault();
        });

    }



    $(document).on('click', '.BtnFiltrar', function () {

        Swal.fire({
            title: 'BUSCAR PERSONAL',
            html:
                `
        <div class="row justify-content-end">
            <div class="col-xl-4">
            <div style="max-width: 0; max-height: 0; overflow: hidden;"><input autofocus="true" /> Hago esto para deshabilitar el autofocus del primer input</div>
                <button type="button" class="btn btn-danger col-sm-7 btn-xs float-right botoncerrar" title="Cerrar"><i class="fa fa-close"></i> Cerrar Ventana</button>
            </div>
        </div>

        <div class="row justify-content-center pt-3 pb-3">
            <div class="col-xl-12 col-sm-12">
                <div class="card" style="border-top: 5px solid #607d8b;">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">Nombre o Apellido</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="Swalnombre" placeholder="" value="" autocomplete="off" onkeypress="return sololetras(event)" onpaste="return false">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-12 col-sm-12">

                                <div class="col-xl-12 col-sm-12 text-right"><label id="resultadostotales"></label></div>

                                <div class="table-responsive">
                                    <table id="tabla_seleccionar" class="table">
                                        <thead class="text-center" style="background-color: #607d8b;color:white;">
                                            <tr>
                                                <th scope="col">R.U.T</th>
                                                <th scope="col">NOMBRE</th>
                                                <th scope="col">SELECCIONE</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="container row justify-content-center text-center">
                            <div class="col-xl-3 col-sm-6">
                                <button type="button" class="btn btn-colornuevo btn-block botonmodalFiltrar"><i class="fas fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>`,
            didOpen: function () {
                // let cont = 0;
                // cont++;
                // console.log("AS: " + cont);
                $("#tabla_seleccionar tbody").html('<tr><td></td><td>No hay datos disponibles en esta tabla</td><td></td></tr>');

                // <div class="col-xl-6 col-sm-6">
                //     <div class="form-group row">
                //         <label class="col-sm-5 col-form-label-sm">APELLIDO</label>
                //         <div class="col-sm-7">
                //             <div class="input-group">
                //                 <input type="text" class="form-control" id="Swalapellido" placeholder="" value="">
                //             </div>
                //         </div>
                //     </div>
                // </div>

                $(".botoncerrar").on('click', function () {
                    Swal.close();
                });

                $(".botonmodalFiltrar").on('click', function () {
                    // let apellido = $('#Swalapellido').val();
                    let nombre = $('#Swalnombre').val();

                    // console.log("Contenido tabla: "+nombre);

                    if (validavacioynulo([nombre]) || nombre == '\'') { //en caso que ingrese un ' , sino me genera error la comilla simple
                        $("#resultadostotales").text("");
                        $("#tabla_seleccionar tbody").html('<tr><td></td><td>No se han encontrado resultados</td><td></td></tr>');
                        toastr.error("Debe ingresar un nombre o apellido");
                    } else {
                        // alertify.success("as");

                        $.post('funciones/acceso.php', {
                            nombre: nombre, seleccionar: 2
                        }, function (respuesta) {

                            let ResR= JSON.parse(respuesta);

                            var contenidotabla = ``;
                            var contarresultados = 0;
                            for (let i = 0; i < ResR.length; i++) {
                                // console.log("Respuesta para tabla: " + ResR.length);

                                let RUT = ResR[i].RUT;
                                let NOMBRE = ResR[i].NOMBRE;

                                contenidotabla += `
                                        <tr>
                                            <td>`+ RUT + `</td>
                                            <td>`+ NOMBRE + `</td>
                                            <td><button type="button" class="btn btn-colornuevo btn-sm elegir" title="Seleccionar" value="`+ RUT + `,` + NOMBRE + `"><i class="fas fa-check-square"></i></button></td>
                                        </tr>                    
                                        `;
                                contarresultados++;
                            }

                            if (contarresultados == 0) { $("#tabla_seleccionar tbody").html('<tr><td></td><td>No se han encontrado resultados</td><td></td></tr>'); $("#resultadostotales").text("0 Resultado(s)"); }
                            else { $("#tabla_seleccionar tbody").html(contenidotabla); $("#resultadostotales").text(contarresultados + " Resultado(s)"); }


                            $(".elegir").on('click', function () {
                                let separar = this.value.split(",");
                                $('#rut').val(separar[0]);
                                $('#nombre').val(separar[1]);
                                Swal.close();
                                $("#botonbuscar").click();
                            });

                        });
                    }
                });
            },
            focusConfirm: false,
            showCancelButton: false,
            showConfirmButton: false,
            confirmButtonText: 'Responder &rarr;',
            cancelButtonText: '<div style="width:300px;max-width:400px;">Cancelar</div>',
            confirmButtonColor: "#1cc88a",
            cancelButtonColor: "#858796",
            allowOutsideClick: false,
            width: '970px',

            preConfirm: () => { }
        });
    });
});
