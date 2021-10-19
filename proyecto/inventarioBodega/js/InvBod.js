function llenarSelectCategoriaMaterial() {
    $.post('funciones/acceso.php', { seleccionar: 4 }, function (respuesta) {
        //  console.log("RESPP: " + respuesta);
        $('#cat_mat_mb').html(respuesta);
    }).fail(function () {
        swalfire("No se pudo cargar la categoria del material", "error")
    });
}

llenarSelectCategoriaMaterial();

$(document).ready(function () {

    resultadostabla();

    function resultadostabla(fechadeinicio, fechadefin) {
        // , fechainicio: fechadeinicio, fechafin: fechadefin
        tabla_inventario_bodega = $('#tabla_inventario_bodega').DataTable({
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
                "data": { seleccionar: 1, fechainicio: fechadeinicio, fechafin: fechadefin }, //enviamos una opcion para que haga un SELECT
                "dataSrc": "",
                error: function (jqXHR, textStatus, error) {
                    console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
                }
            },
            "columns": [

                { "data": "NOMBRE_CATEGORIA_MB" },
                { "data": "CANTIDAD" },
                { "data": "NOMBRE_MATERIAL_MB" },
                // { "data": "FECHA_REGISTRO" }
                {
                    "data": "FECHA_REGISTRO",
                    "render": function (data, type, JsonResultRow, row) {
                        let separar = data.split("-");
                        return separar[2] + '/' + separar[1] + '/' + separar[0];
                    }
                },
                {
                    "defaultContent":
                        `<div class='row justify-content-center'>
                            <div class='col align-items-center'>
                                <div class='btn-group'>
                                    <button class='btn btn-colornuevo btn-sm btnEditarMaterial' title=\"Editar Material\"><i class='fa fa-pencil-square-o' aria-hidde='true'></i></button>
                                    <button class='btn btn-warning btn-sm btnMantencionMaterial' title=\"Mantencion del Material\"><i class='fa fa-retweet' aria-hidde='true'></i></button>
                                    <button class='btn btn-danger btn-sm btnBorrarMaterial' title=\"Eliminar Material\"><i class='fa fa-trash-o' aria-hidde='true'></i></button>
                                </div>
                            </div>
                        </div>`
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
                    titleAttr: 'Generar un informe en excel',
                    className: 'btn btn-success'
                },

                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Generar un informe en PDF',
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



        $(document).on("click", ".btnEditarMaterial", function () {
            let identificador = (tabla_inventario_bodega.row($(this).closest('tr')).data().ID_MB);
            let nombre_material = (tabla_inventario_bodega.row($(this).closest('tr')).data().NOMBRE_MATERIAL_MB);
            // let cantidad_material = (tabla_inventario_bodega.row($(this).closest('tr')).data().CANTIDAD);
            let fecha_registro = (tabla_inventario_bodega.row($(this).closest('tr')).data().FECHA_REGISTRO);

            let fechaactual = new Date().toLocaleDateString('en-GB'); //toLocaleString
            var separa = fechaactual.split("/");
            var ano_mes_dia = separa[2] + '-' + separa[1] + '-' + separa[0];

            // alert(ano_mes_dia);

            // console.log("ID: " + identificador + "\n nombre: " + nombre_material + "\n Cantidad: " + cantidad_material + "\n Fecha: " + fecha_registro);

            // <div class="form-group">
            //     <label id="labelparaswal">Cantidad (Unidades)</label>
            //     <input type="number" class="form-control" id="Ecantidad_material" placeholder="Ingrese número de dias" min="1" max="500" maxlength="3" onkeypress="return solonumeros(event)" value="`+ cantidad_material + `" autocomplete="off" onpaste="return false" required> 
            // </div>


            Swal.fire({
                title: 'EDITAR MATERIAL ',
                html: `
                <div class="row justify-content-center pt-3">
                    <div class="col-lg-9">
        
                        <div class="form-group">
                            <label id="labelparaswal">Detalle o nombre del material</label>
                            <textarea class="form-control" id="Edetalle_material" placeholder="Complete este campo" rows="3" col="10" minlength="2" maxlength="60" onkeyup="validarTexArea(this);" onkeypress="return soloNombreMaterialBodega(event)" onpaste="return false" autocomplete="off" style="resize:none" required>`+ nombre_material + `</textarea>
                            <small class="col-sm-7">
                                Escrito <span id="escrito1" style="color:red;">00</span>
                                Restantes <span id="contadorcaract1" style="color:#28a745;">00</span>
                            </small>
                        </div>
        
                        <div class="form-group">
                            <label id="labelparaswal">Fecha Registro</label>
                            <input type="date" class="form-control" id="Efecha_registro" placeholder="Ingrese fecha de nacimiento" onkeypress="return fechausuarios(event)" minlength="10" maxlength="10"  max='`+ ano_mes_dia + `' value="` + fecha_registro + `" onpaste="return false" required>
                        </div>
        
                    </div>
                </div>
    
        
        `, didOpen: function () {

                    contadordepalabras();
                    $("#Edetalle_material").keyup(function () {
                        contadordepalabras();
                    });

                    // $("#Ecantidad_material").keyup(function () {
                    //     let valrec = $("#Ecantidad_material").val();
                    //     if (valrec >= 501) {
                    //         valrec = valrec.substring(0, valrec.length - 1); //corto el último digito de ser mayor o igual 501
                    //         $('#Ecantidad_material').val(valrec);
                    //     }
                    // });

                    function contadordepalabras() {
                        let noc = $("#Edetalle_material").val().length;
                        let now = $("#Edetalle_material").val();
                        let escrito = noc;
                        // en caso que en el html del navegador alguien cambie el maxlenght
                        if (noc >= 45) { $('#Edetalle_material').attr('maxlength', '45') }
                        noc = 45 - noc;
                        now = now.match(/\w+/g);
                        if (!now) {
                            now = 0;
                        } else { now = now.length; }
                        $("#escrito1").text(escrito);
                        $("#contadorcaract1").text(noc);
                    }


                },
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Editar &rarr;',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: "#009688",
                cancelButtonColor: "#858796",
                width: '600px',

                preConfirm: () => {
                    // let cantidad = $('#Ecantidad_material').val();
                    let nombrematerial = $('#Edetalle_material').val();
                    let fecharegistro = $('#Efecha_registro').val();
                    var formData = new FormData();

                    if (validavacioynulo([identificador])) { //identificador
                        Swal.showValidationMessage('campos vacíos');
                    } else if (validavacioynulo([nombrematerial])) { //nombrematerial
                        Swal.showValidationMessage('campos nombre o detalle del material vacío');
                    } else if (/^[0-9\s]+$/.test(nombrematerial)) { // \s = caracter en blanco
                        Swal.showValidationMessage('El campo nombre o detalle del material inválido'); //no puede contener sólo números
                    } else if (!/[A-Za-zÁÉÍÓÚáéíóúñÑ]/i.test(nombrematerial)) {
                        Swal.showValidationMessage('El campo nombre o detalle del material no contiene letras');
                    } else if (validavacioynulo([fecharegistro])) { //fecharegistro
                        Swal.showValidationMessage('campos fecha del material vacío');
                    }
                    // else if (cantidad.length < 1 || cantidad.length > 500) {
                    //     Swal.showValidationMessage('cantidad de unidades inválida. Minimo 1 y Máximo 500 caracteres.');
                    // } 
                    else if (nombrematerial.length < 2 || nombrematerial.length > 45) {
                        Swal.showValidationMessage('longitud del detalle del material inválida. Minimo 2 y Máximo 45 caracteres.');
                    } else {

                        formData.append("seleccionar", 2);
                        // formData.append("cantidad", cantidad);
                        formData.append('nombrematerial', nombrematerial);
                        formData.append('fecharegistro', fecharegistro);
                        formData.append('id_mb', identificador);

                        for (var i of formData.entries()) {
                            console.log(i[0] + ', ' + i[1]);
                        }

                        $.ajax({
                            type: 'POST',
                            url: 'funciones/acceso.php',
                            data: formData,
                            dataType: 'text',
                            contentType: false,
                            cache: false,
                            processData: false
                        }).done(function (respuesta) {
                            console.log("respuesta editado: " + respuesta);
                            if (respuesta == 1) {
                                toastr.error("Campos vacios", "UpS");
                            } else if (respuesta == 2) {
                                // tabla_inventario_bodega.ajax.reload(null, false);
                                toastr.error("Ya existe un material con el mismo nombre", "UpS");
                            } else if (respuesta == 3) {
                                toastr.error("Ha ocurrido un error, si el mensaje persiste, por favor, contacte a soporte", "UpS");
                            } else if (respuesta == 4) {
                                tabla_inventario_bodega.ajax.reload(null, false);
                                toastr.success("Material editado correctamente", "Éxito");
                            }
                        }).fail(function (res) {
                            console.log(res);
                        });

                    }
                }
            });
        });

        $(document).on("click", ".btnBorrarMaterial", function () {
            let identificador = (tabla_inventario_bodega.row($(this).closest('tr')).data().ID_MB);
            // toastr.success(""+identificador, "Éxito");

            Swal.fire({
                title: '¿Desea eliminar el material?',
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
                confirmButtonColor: "#009688",
                cancelButtonColor: "#858796",
                width: '550px',
                preConfirm: () => {
                    if (validavacioynulo([identificador])) { Swal.showValidationMessage('¡No se ha recibido parámetro del medicamento!') }
                    else {
                        $.post('funciones/acceso.php', { id_mb: identificador, seleccionar: 6 }, function (respuesta) {
                            //console.log("ELIMINAR PACIENTE: " + respuesta);
                            if (respuesta == 1) {
                                toastr.error("Campos vacios", "UpS");
                            } else if (respuesta == 2) {
                                toastr.error("Ha ocurrido un error, si el mensaje persiste, por favor, contacte a soporte", "UpS");
                            } else if (respuesta == 3) {
                                tabla_inventario_bodega.ajax.reload(null, false);
                                toastr.success("Material eliminado correctamente", "Éxito");
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

        $(document).on("click", "#boton_restaurar_material", function () {
            // toastr.success("Hola", "Éxito");

            Swal.fire({
                title: 'R E S T A U R A R &nbsp; M A T E R I A L',
                html: `
                <div class="row justify-content-center pt-3">
                    <div class="col-xl-12">
        
                        <div class="table-responsive">
                            <table id="tabla_restaurar_material" class="table">
                                <thead class="text-center" style="background-color: #C9779F;color:white;">
                                    <tr>
                                        <th scope="col" title="Categoria">CATEGORÍA</th>
                                        <th scope="col" title="Cantidad">CANTIDAD</th>
                                        <th scope="col" title="Detalle">DETALLE</th>
                                        <th scope="col" title="Fecha registro">FECHA REG.</th>
                                        <th scope="col" title="Acciones">ACCION</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                </tbody>
                            </table>
                        </div>
        
                    </div>
                </div>
    
        
        `, didOpen: function () {

                    tabla_restaurar_material = $('#tabla_restaurar_material').DataTable({
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
                            "data": { seleccionar: 7 }, //enviamos una opcion para que haga un SELECT
                            "dataSrc": "",
                            error: function (jqXHR, textStatus, error) {
                                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
                            }
                        },
                        "columns": [

                            { "data": "NOMBRE_CATEGORIA_MB" },
                            { "data": "CANTIDAD" },
                            { "data": "NOMBRE_MATERIAL_MB" },
                            // { "data": "FECHA_REGISTRO" }
                            {
                                "data": "FECHA_REGISTRO",
                                "render": function (data, type, JsonResultRow, row) {
                                    let separar = data.split("-");
                                    return separar[2] + '/' + separar[1] + '/' + separar[0];
                                }
                            },
                            {
                                "defaultContent":
                                    `<div class='row justify-content-center'>
                                <div class='col align-items-center'>
                                    <div class='btn-group'>
                                        <button class='btn btn-colornuevo btn-sm btnActivarMaterial' title=\"Restaurar Material\"><i class='fas fa-arrow-alt-circle-up' aria-hidde='true'></i> Restaurar</button>
                                    </div>
                                </div>
                            </div>`
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
                        }
                    });

                    // $('.btnActivarMaterial').on("click", function () {
                    //     toastr.success("JUAJUA", "Éxito");
                    // });
                },
                focusConfirm: false,
                showCancelButton: true,
                showConfirmButton: false,
                allowOutsideClick: false,
                confirmButtonText: 'as &rarr;',
                cancelButtonText: 'Cerrar ventana',
                confirmButtonColor: "#009688",
                cancelButtonColor: "#858796",
                width: '900px'
            });
        });

        $(document).on("click", ".btnActivarMaterial", function () {
            let identificador_restaurar = (tabla_restaurar_material.row($(this).closest('tr')).data().ID_MB);
            // tabla_restaurar_material
            // toastr.success("JUAJUA: "+identificador_restaurar, "Éxito");
            $.post('funciones/acceso.php', { id_mb: identificador_restaurar, seleccionar: 8 }, function (respuesta) {
                //console.log("ELIMINAR PACIENTE: " + respuesta);
                if (respuesta == 1) {
                    toastr.error("Campos vacios", "UpS");
                } else if (respuesta == 2) {
                    toastr.error("Ha ocurrido un error, si el mensaje persiste, por favor, contacte a soporte", "UpS");
                } else if (respuesta == 3) {
                    tabla_restaurar_material.ajax.reload(null, false);
                    tabla_inventario_bodega.ajax.reload(null, false);
                    toastr.success("Material restaurado correctamente", "Éxito");
                } else if (respuesta == 444) {
                    toastr.error("Parámetros no recibidos", "UpS");
                }

            }).fail(function () {
                swalfire("Ocurrio un Error Inesperado", "error")
            });
        });

        $(document).on('click', '.btnMantencionMaterial', function () { //AQUI EDITO AL USUARIO
            let idmaterial = (tabla_inventario_bodega.row($(this).closest('tr')).data().ID_MB);
            let cantidadmaxima = (tabla_inventario_bodega.row($(this).closest('tr')).data().CANTIDADMAXIMA);
            let stocktotal = (tabla_inventario_bodega.row($(this).closest('tr')).data().CANTIDAD);
            // toastr.success("ID MATERIAL: "+idmaterial+"\nCANT.MAX: "+ cantidadmaxima+"\nCANT.TOTAL: "+ stocktotal);
            // toastr.success("ID MATERIAL: "+idmaterial+"\nCANT.TOTAL: "+ stocktotal);

            MantencionMaterial(idmaterial, cantidadmaxima, stocktotal);
        });

    }


    $("#formularioFiltrar").on('submit', function (event) {
        form = $("#formularioFiltrar");

        let fechainicio = $('#fechainicio').val();
        let fechafin = $('#fechafin').val(); //ano_consultar

        if (validavacioynulo([fechainicio, fechafin])) {
            toastr.error("Debe ingresar rango de fechas");
            // return;
        } else if (validavacioynulo([fechainicio])) {
            toastr.error("Debe seleccionar una fecha de inicio");
            // return;
        } else if (validavacioynulo([fechafin])) {
            toastr.error("Debe seleccionar una fecha de fin");
            // return;
        } else if ((new Date(fechainicio).getTime() > new Date(fechafin).getTime())) {
            toastr.error('La fecha de Inicio, no puede ser mayor a la fecha de Fin');
            // console.log('La fecha de Inicio, no puede ser mayor a la fecha de Fin');
        } else {
            resultadostabla('' + fechainicio, '' + fechafin);
            console.log("juanete");
            // tabla_inventario_bodega.search(fechainicio,fechafin).draw();
            // tabla_inventario_bodega.draw();
        }
        event.preventDefault();
    });



    $("#botonresetear").on("click", function () {
        resultadostabla();
    });



    $("#formularioRegMaterial").on('submit', function (event) {
        form = $("#formularioRegMaterial");

        let categoria_mb = $('#cat_mat_mb').val();
        let cantidadmaterial = $('#cantidadmaterial').val();
        let detalle_mb = $('#detalle_mb').val(); //ano_consultar

        if (validavacioynulo([categoria_mb, cantidadmaterial, detalle_mb])) {
            toastr.info("Parámetros vacíos");
            // return;
        } else if (cantidadmaterial.length < 1 || cantidadmaterial.length > 500) {
            toastr.info("Debe seleccionar una cantidad");
            // return;
        } else if (cantidadmaterial <= 0) {
            toastr.info("La cantidad debe ser mayor a cero");
            // return;
        } else if (detalle_mb.length < 2 || detalle_mb.length > 60) {
            toastr.info("Debe ingresar un detalle o nombre, con la longitud indicada.");
            // return;
        } else if (/^[0-9\s]+$/.test(detalle_mb)) {
            toastr.info('El campo detalle o nombre del material inválido'); //no puede contener sólo números
        } else if (!/[A-Za-zÁÉÍÓÚáéíóúñÑ]/i.test(detalle_mb)) {
            toastr.info('El campo detalle o nombre del material no contiene letras');
        } else {
            // consultadatos(rut_consultar, ano_consultar, 2);
            $.post('funciones/acceso.php', { seleccionar: 5, categoria_mb: parseInt(categoria_mb), cantidadmaterial: parseInt(cantidadmaterial), detalle_mb: detalle_mb }, function (respuesta) {
                console.log("RESPP: " + respuesta);
                if (respuesta == 1) {
                    toastr.error("Parámetros vacíos");
                } else if (respuesta == 2) {
                    toastr.error("Existe un material con ese nombre");
                } else if (respuesta == 3) {
                    toastr.error("Ocurrió un error al registrar el material, si el problema persiste, por favor contacte a soporte.");
                } else if (respuesta == 4) {
                    form[0].reset();
                    llenarpanel();
                    tabla_inventario_bodega.ajax.reload(null, false);
                    toastr.success("Material registrado");
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
        // console.log("LLENAR PANEL: " + respuesta);
        // console.log("LOBBY " + contador);

        if (contador === 0) {
            $('#mat_aseo').text('0');
            $('#mat_oficina').text('0');
            $('#mat_higiene').text('0');
        } else if (contador > 0) {
            for (let i = 0; i < contador; i++) {
                if (jsonresp[i].NOMBRE_CAT_MB == "Oficina") {
                    $('#mat_oficina').text(jsonresp[i].CANTIDAD);
                } else if (jsonresp[i].NOMBRE_CAT_MB == "Aseo") {
                    $('#mat_aseo').text(jsonresp[i].CANTIDAD);
                } else if (jsonresp[i].NOMBRE_CAT_MB == "Higiene") {
                    $('#mat_higiene').text(jsonresp[i].CANTIDAD);
                } else {
                    console.log("es otra categoria");
                    // $('#mat_higiene').text(jsonresp[i].CANTIDAD);
                }
            }
        }
        // console.log("LLENAR PANEL2: " + jsonresp[1].NOMBRE_CAT_MB);

    }).fail(function () {
        swalfire("No se pudo mostrar stock maximo de ese estado en particular", "error");
    });
}