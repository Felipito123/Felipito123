//===================================================================LLENADO DE DATATABLE===================================================================// 
var arreglo = [];
$(document).ready(function () {
    tablavacaciones = $('#tabla-vacaciones').DataTable({
        "responsive": true,
        "bAutoWidth": false, //LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
        "ordering": false, //le quito el ordenamiento ascendente o descendente
        "lengthMenu": [[8, 12, 36, 48, -1], [8, 12, 36, 48, "All"]],
        "ajax": {
            "url": "funciones/acceso.php",
            "method": 'POST', //usamos el metodo POST
            "data": { seleccionar: 1 }, //enviamos opcion para que haga un SELECT
            "dataSrc": "",
            "async": false,
            complete: function (datos) {
                jsonNuevo = JSON.parse(formatoJsonDatable(datos));
                // for (let i = 0; i < (jsonNuevo.length); i++) {
                //     console.log(jsonNuevo[i]);
                // }
                for (let i = 0; i < (jsonNuevo.length / 2); i++) {
                    arreglo.push(JSON.parse(JSON.stringify({ "RUT": jsonNuevo[i].RUT_USUARIO, "DIASRES": jsonNuevo[i].DIAS_RESTANTES })));
                } //console.log("Datos: " + formatoJsonDatable(datos));
            },
            error: function (jqXHR, textStatus, error) {
                console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
            }
        },
        "columns": [
            // { "data": "RUT_USUARIO" },
            {
                "data": "RUT_USUARIO",
                "render": function (data, type, JsonResultRow, row) {

                    let digitoverificador = data[data.length - 1];//Ej: 19387124K, extrae el último dígito, quedando en la variable el K
                    let cortarrut = data.substring(0, data.length - 1); //Ej: 193871240, corta el último dígito, quedando 19387124
                    let rutcondigitoverificador = cortarrut + '-' + digitoverificador;//agrego e formato final 19387124-0

                    let imp= `<label class="btn btn-warning btn-sm" id="ball" style="text-align:center;font-size:10px;font-weight: bold;">`+rutcondigitoverificador +`</label>`;
                    // let imprimir= `<div class="row justify-content-center"><span class="badge badge-warning" id="ball">`+rutcondigitoverificador +`</span></div>`;

                    return imp;
                }
            },
            { "data": "NOMBRE_USUARIO" },
            {
                "data": "FECHA_ENTRADA",
                "render": function (data, type, JsonResultRow, row) {

                    //return data;

                    if (data == '' || data == null) { //por el valor por defecto del null en el la BD en la tabla usuarios columna fecha_entrada
                        return "fecha desconocida";
                    }
                    else {
                        let porcionesa = data.split('-');
                        return porcionesa[2] + '-' + porcionesa[1] + '-' + porcionesa[0];
                    }

                    // return '<a href="' + data + '"  class="btn btn-danger btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;background-color:red;" target="_blank" id="aaa">Iniciar</a>';
                }

            },
            {
                "data": "DIAS_GANADOS",
                "render": function (data, type, JsonResultRow, row) {
                    return data + ' dias';
                }
            },
            // { "data": "DIAS_GANADOS" },
            // { "data": "DIAS_RESTANTES" },
            {
                "data": "DIAS_RESTANTES",
                "render": function (data, type, JsonResultRow, row) {
                    return data + ' dias';
                }
            },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    // "<div class='btn-group'>" 
                    "<label class='btn btn-success btn-circle btn-sm btnRegistrarVacacion' title='Registrar vacacion' ><i class='fas fa-file-alt'></i></label>" +
                    "<label class='btn btn-info btn-circle btn-sm btnEditar' title='Agregar más dias' ><i class='fa fa-plus-circle' aria-hidden='true'></i></label>" +
                    "<label class='btn btn-warning btn-circle btn-sm btnDetalle' title='Detalle de las vacaciones'><i class='fas fa-list'></i></label>" +

                    // "</div>" +
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
                '<option value="8">8</option>' +
                '<option value="12">12</option>' +
                '<option value="36">36</option>' +
                '<option value="48">48</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay datos disponibles en la tabla",
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
            }
        }

    });
    //===================================================================LLENADO DE DATATABLE===================================================================//     
    // arreglo.forEach(function(elemento, indice, array) {
    //     console.log(elemento);
    // })
    function tabladetallevacaciones(valor) {

        tableho = $('#tabla-detalle-vacaciones').DataTable({
            "responsive": true,
            "destroy": true, //Lo necesito si le envio el parametro
            "bAutoWidth": false, //LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
            "ordering": false, //le quito el ordenamiento ascendente o descendente
            "lengthMenu": [[6, 12, 36, 48, -1], [6, 12, 36, 48, "All"]],
            "ajax": {
                "url": "funciones/acceso.php",
                "method": 'POST', //usamos el metodo POST
                "data": { rutabuscar: valor, seleccionar: 2 }, //enviamos opcion 4 para que haga un SELECT
                "dataSrc": "",
                error: function (jqXHR, textStatus, error) {
                    console.log("Error: " + error);
                }
            },
            "columns": [
                /*<a href="" download></a>*/
                { "data": "ID_VACACIONES" },
                { "data": "RUT_USUARIO" },
                { "data": "NOMBRE_USUARIO" },
                { "data": "TIPO_VACACIONES" },
                {
                    "data": "FECHA_INICIO_VACACIONES",
                    "render": function (data, type, JsonResultRow, row) {
                        let porcionesa = data.split('-');
                        return porcionesa[2] + '-' + porcionesa[1] + '-' + porcionesa[0];
                        // return '<a href="' + data + '"  class="btn btn-danger btn-sm" style="width:58px;height:23px;text-align:center;font-size:10px;background-color:red;" target="_blank" id="aaa">Iniciar</a>';
                    }
                },
                { "data": "RAZON_VACACIONES" },
                { "data": "DIAS_TOMADOS_VACACIONES" },
                { "data": "OBSERVACION_VACACIONES" },
                {
                    "defaultContent":
                        " <div class='row justify-content-center'>" +
                        "<div class=' col align-items-center'>" +
                        "<label class='btn btn-success btn-circle btn-sm btnVerCertificado' title='Ver o descargar certificado'><i class='fa fa-eye'></i></label>" +
                        "<label class='btn btn-warning btn-circle btn-sm btnEliminarDetalle' title='Eliminar vacacion'><i class='fas fa-trash'></i></label>" +
                        "</div>" +
                        "</div>"
                }
            ], "columnDefs": [{

                "targets": [0, 1], //oculto la columna que tiene posición 0
                "visible": false,
                "searchable": true
            },

            ],
            "oLanguage": {
                "sProcessing": "Procesando...",
                "sLengthMenu": 'Mostrar <select>' +
                    '<option value="6">6</option>' +
                    '<option value="12">12</option>' +
                    '<option value="36">36</option>' +
                    '<option value="48">48</option>' +
                    '<option value="-1">Todos</option>' +
                    '</select> registros',
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "No hay vacaciones registradas",
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
                }
            }
        });

    }


    // let dtTable = $("#tabla-vacaciones").DataTable();


    $(document).on('click', '.btnRegistrarVacacion', function () { //AQUI LLENO EL RUT EN EL MODAL DE REGISTRO
        $('#modal-registrar-vacaciones').modal();
        /*  $(function () { //Por conflicto entre modals, ya que tengo el de agregar y editar. Uno de los dos no se mostraba
            $("#modal-editar-vacaciones").appendTo("body");
            $('#modal-registrar-vacaciones').modal('show');
        });*/
        let rut_usuario = (tablavacaciones.row($(this).closest('tr')).data().RUT_USUARIO);
        let nombreusuario = (tablavacaciones.row($(this).closest('tr')).data().NOMBRE_USUARIO);
        let diasrestantes = (tablavacaciones.row($(this).closest('tr')).data().DIAS_RESTANTES);

        $('#MRRUT').val(rut_usuario);
        $('#MRNOMUS').val(nombreusuario);
        $('#MaximoDiasDisponibles').text(diasrestantes);
        $('#MaximoDiasDisponibles').val(diasrestantes);

        $('#modal-registrar-vacaciones').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
        });

        // $.ajaxSetup({ async: false }); //para poder obtener el dato y guardarlo en una variable global
        // $.post('funciones/acceso.php', { seleccionar: 1 }, (respuesta) => {
        //     var jsonNuevo = JSON.parse(respuesta);
        //     for (let i = 0; i < jsonNuevo.length; i++) {
        //         //console.log(jsonNuevo[i]);
        //         if (jsonNuevo[i].RUT_USUARIO == R_rut) {
        //             if (R_diastomados > jsonNuevo[i].DIAS_RESTANTES) {
        //                 validadiastomados = true;
        //                 return;
        //             }
        //         }
        //     }
        // });

    });

    $('#MRObservacion').on('keydown', function (ev) { //si en el input se apreta enter se activa el formulario
        if (ev.key === 'Enter') {
            //No salta directo al formulario sino que al hacer click al submit, valida en html primero, luego js
            $('#botonEnviarRegistro').trigger("click");
        }
    });

    //===================================================ENVIO DE FORMULARIO DE REGISTRO =============================================== //
    $("#form-modal-registrar-vacaciones").on('submit', function (event) {
        event.preventDefault(); //RETIENE LA RECARGA 
        formRegistroVacacion();
    });
    //===================================================ENVIO DE FORMULARIO DE REGISTRO =============================================== //


    $(document).on('click', '.btnEditar', function () { //AQUI EDITO AL USUARIO
        let diasganados = (tablavacaciones.row($(this).closest('tr')).data().DIAS_GANADOS);
        let diasrestantes = (tablavacaciones.row($(this).closest('tr')).data().DIAS_RESTANTES);
        let rut_usuario = (tablavacaciones.row($(this).closest('tr')).data().RUT_USUARIO);

        let maximoasumar = 60 - parseInt(diasganados);

        Swal.fire({
            title: '¿Desea agregar más dias?',
            // icon: 'info',
            showClass: { //para esta animación del modal integre un css llamado animate.min.css
                popup: 'animate__animated animate__fadeInDown',
                icon: 'animated heartBeat delay-1s'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            html:
                `<div class="row justify-content-center py-3">
        <div class="col-lg-11">
        <label for="anchomaterial" id="labelagregardias">Agregar días:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-sort-numeric-up-alt" aria-hidden="true" style="width: 16px;"></i></span>
                </div>
                <input type="number" class="form-control" placeholder="Ingrese el número de dias que desea agregar" id="editadias" name="editadias" min="1" max="31" onkeypress="return numeroSinCero(event)" onpaste="return false" required>
            </div>
            <small class="form-text text-muted float-right">Dias disponibles (max. <span id="MaxDiasDisponibles">`+ maximoasumar + `</span> dias)</small>
        </div>
    </div>`,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: "#17a2b8",
            cancelButtonColor: "#858796",
            width: '560px',
            preConfirm: () => {

                let editadias = $('#editadias').val();

                if (validavacioynulo([editadias])) { Swal.showValidationMessage('¡Campo vacio!'); }
                else if (editadias.length < 1 || editadias.length > 2) { Swal.showValidationMessage('Tamaño del campo, \nmínimo: 1 y máximo: 2 caracteres'); }
                else if (editadias > maximoasumar) { Swal.showValidationMessage('Máximo de dias disponibles sobrepasado'); }
                else {

                    $.post('funciones/acceso.php', {
                        seleccionar: 4,
                        MRUT: rut_usuario,
                        MDiasAgregar: editadias,
                        MDiasGanados: diasganados,
                        MDiasRestantes: diasrestantes
                    }, function (respuesta) {
                        console.log("RESP: " + respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Campos vacios, compruebe datos!", "error");
                        } else if (respuesta == 2 || respuesta == 5 || respuesta == 7 || respuesta == 8 || respuesta == 9) {
                            swalfire("¡Ha ocurrido un error al registrar al agregar más dias", "error");
                        } else if (respuesta == 3) {
                            //Los dias totales ganados del usuario no puede ser menor a la suma de los dias tomados totales de la tabla vacaciones
                            swalfire("¡Concurrencia", "error");
                        } else if (respuesta == 4 || respuesta == 5) {
                            //No se puede agregar más días de los restantes
                            swalfire("¡No se puede agregar más días de los dias disponibles totales", "error");
                        } else if (respuesta == 10) {
                            tablavacaciones.ajax.reload(null, false);
                            swalfire("¡Se han agregado más dias de vacaciones!", "success");
                        }
                    }).fail(function () {
                        swalfire("¡UPS! \n Ocurrió un Error Inesperado", "error")
                    });

                }
            }

        });

    });

    $(document).on('click', '.btnDetalle', function () { //AQUI EDITO AL USUARIO
        $('#modal-detalle-vacaciones').modal();
        // $(function () { //Por conflicto entre modals, ya que tengo el de agregar y editar. Uno de los dos no se mostraba
        //     $("#modal-detalle-vacaciones").appendTo("body");
        //     $('#modal-detalle-vacaciones').modal('show');
        // });
        let rut_usuario = (tablavacaciones.row($(this).closest('tr')).data().RUT_USUARIO);
        tabladetallevacaciones(rut_usuario);

        $('#modal-detalle-vacaciones').on('hide.bs.modal', function () {
            $(this).data('bs.modal', null);
            $('#modal-detalle-vacaciones').removeData();
        })


    });

    //==========================================BOTON ELIMINAR===================================================================// 

    $(document).on('click', '.btnEliminarDetalle', function () {
        let id_vacaciones = (tableho.row($(this).closest('tr')).data().ID_VACACIONES);
        let rut_usuario = (tableho.row($(this).closest('tr')).data().RUT_USUARIO);
        let diastomados = (tableho.row($(this).closest('tr')).data().DIAS_TOMADOS_VACACIONES);

        Swal.mixin({
            icon: "warning",
            //puede ser text, number, email, password, textarea, select, radio
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: "#f6c23e",
            cancelButtonColor: "#858796",

        }).queue([
            {
                title: '¡Un momento!',
                text: 'La Vacacion será eliminada y no se podra recuperar',
            },

        ]).then((result) => {
            if (result.value) {
                //console.log("ID vacaciones: "+id_vacaciones + "\nRut: " + rut_usuario + "\nDias Tomados: " + diastomados);
                if (validavacioynulo([id_vacaciones, rut_usuario, diastomados])) { swalfire('¡Campos vacios!', 'info'); }

                $.post('funciones/acceso.php', { IDVACACIONES: id_vacaciones, RUTUSUARIO: rut_usuario, DIASTOMADOS: diastomados, seleccionar: 5 }, function (respuesta) {
                    console.log(respuesta);
                    if (respuesta == 1) {
                        swalfire("¡Campos vacios, compruebe datos!", "error");
                    } else if (respuesta == 2 || respuesta == 3 || respuesta == 4) {
                        swalfire("¡Ha ocurrido un error al eliminar la vacacion", "error");
                    } else if (respuesta == 5) {
                        tablavacaciones.ajax.reload(null, false);
                        tableho.ajax.reload(null, false);
                        swalfire("¡Se ha eliminado la vacacion!", "success");
                    }else if (respuesta == 6) {
                        console.log("No se encuentran documentos a eliminar en la BD:  "+respuesta);
                        tablavacaciones.ajax.reload(null, false);
                        tableho.ajax.reload(null, false);
                        swalfire("¡Se ha eliminado la vacacion!", "success");
                    }else if (respuesta == 7 || respuesta == 444) {
                        swalalerta("¡No se recibieron parametros!", "error");
                    }
                });
            } else {
                //  swal("Cancelado", "Usted ha Cancelado", "info");
            }
        });


    });

    //=====================================================BOTON ELIMINAR===================================================================// 

    //===================================================BOTON GENERAR REPORTE MENSUAL O SEMESTRAL===================================================// 
    $(document).on('click', '#botongenerainformemensual', function () {
        llenaMesSelector();
        Swal.fire({
            title: 'Generar reporte',
            // icon: 'info',
            showClass: { //para esta animación del modal integre un css llamado animate.min.css
                popup: 'animate__animated animate__fadeInDown',
                icon: 'animated heartBeat delay-1s'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            html:
                `
<div class="row justify-content-center"> <span id="nombredelreporte" class="mr-2">Mensual:</span><input type="checkbox" id="ckeckeasemestralomensual" value="1" /></div>
<div class="container-fluid pb-2" id="selectorgeneral1">
    <div class="row justify-content-center pt-3 pb-2">
        <div class="col-lg-12" id="selectuno">
            <label for="anchomaterial" id="labelagregardias">Mes a indicar:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-day" aria-hidden="true" style="width: 16px;"></i></span>
                </div>
                <select class="form-control" id="seleccionmesreporte" name="seleccionmesreporte"> 
                </select>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12" id="selectdos">
            <label for="seleccionanoreporte" id="labelagregardias">Año a indicar:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-alt" aria-hidden="true" style="width: 16px;"></i></span>
                </div>
                <select class="form-control" id="seleccionanoreporte" name="seleccionanoreporte">
                <option value="">Seleccione un mes primero...</option>
                </select>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-9">
                    <small class="form-text text-muted text-right" id="textodereporte">se mostraran los meses y años disponibles</small>
                </div>
            </div>
        </div>
    </div> 
</div>


<div class="container-fluid pb-2" id="selectorgeneral2">
    <div class="row justify-content-center pt-3 pb-2">
        <div class="col-lg-12" id="selecttres">
            <label for="seleccionsemestrereporte" id="labelagregardias">Semestre a indicar:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-week" aria-hidden="true" style="width: 16px;"></i></span>
                </div>
                <select class="form-control" id="seleccionsemestrereporte" name="seleccionsemestrereporte"> 
                <option value="">Seleccione semestre...</option>
                <option value="1">Semestre uno</option>
                <option value="2">Semestre dos</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12" id="selectcuatro">
            <label for="seleccionanosemestralreporte" id="labelagregardias">Año a indicar:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-alt" aria-hidden="true" style="width: 16px;"></i></span>
                </div>
                <select class="form-control" id="seleccionanosemestralreporte" name="seleccionanosemestralreporte">
                <option value="">Seleccione un semestre primero...</option>
                </select>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-9">
                    <small class="form-text text-muted text-right" id="textodereportesemestral">se mostraran los semestres y años disponibles</small>
                </div>
            </div>
        </div>
    </div> 
</div>`,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: "rgb(70 216 164)", //#45d8a4
            cancelButtonColor: "#858796",
            width: '560px',
            preConfirm: () => {
                let checkebox = $('#ckeckeasemestralomensual').val();
                console.log("CHECKBOX: " + checkebox);
                if (checkebox && checkebox != null && checkebox != '' && checkebox !== undefined) {
                    if (checkebox == 1) {
                        generainformemensual();
                    } else if (checkebox == 2) {
                        generainformesemestral();
                    }
                }
                else {
                    console.log("¡UpS!, ocurrio un error de tipo: checkbox.");
                }
            }
        });

        //=========================DETECTA EL CHECKBOX DEL SWAL (MENSUAL O SEMESTRAL) Y OCULTA===========================//
        OcultaSelectores();
        DetectaCambiosSelectores();

    });
    //===================================================BOTON GENERAR REPORTE MENSUAL O SEMESTRAL===================================================// 

    $(document).on("click", ".btnVerCertificado", function () {
        $('#modalverdocvacacion').modal('show');
        let RUT = (tableho.row($(this).closest('tr')).data().RUT_USUARIO);
        let UBICACION = (tableho.row($(this).closest('tr')).data().ID_VACACIONES);
        // $(function () { //Por conflicto entre modals, ya que tengo el de agregar y editar. Uno de los dos no se mostraba
        //     $("#modalverdocvacacion").appendTo("body");
        //     $('#modalverdocvacacion').modal('show');
        // });

        // console.log('certificado_vacaciones/'+RUT+'-'+UBICACION+'/');
        let comprobarDirectorio = new Request('certificado_vacaciones/' + RUT + '-' + UBICACION + '/' + 'certificado.pdf');

        fetch(comprobarDirectorio).then(function (respuesta) {
            //console.log(respuesta.status); // returns 200
            if (respuesta.status == 200) {
                $('#frameMDV').attr('src', 'certificado_vacaciones/' + RUT + '-' + UBICACION + '/' + 'certificado.pdf');
                $("#error").hide();
            } else {
                $('#frameMDV').attr('src', '../../imgpordefecto/lupa.png');
                document.getElementById("frameMDV").style.width = "70%";
                document.getElementById("frameMDV").style.height = "500px";
                $("#error").show();
            }

        }).catch(function (error) {
            console.log(error);
        });

        $('#modalverdocvacacion').on('hide.bs.modal', function () {
            $('#modalverdocvacacion').removeData();
            $(this).data('bs.modal', null);
        })

    });



    // var jsonArray = JSON.parse(JSON.stringify([{"RUT":"5074727","DIAS":"5074727"},{"RUT":"5074727","DIAS":"5074727"}]));
    // console.log(arreglo);

    document.getElementById('checkbox_reg_vacacion').onchange = function () { //DETECTO EL CAMBIO DEL CHECKBOX
        if (this.checked) {
            $("#MRObservacion").val('Ninguna Observación');
        }
        else {
            $("#MRObservacion").val('');
        }
    }

    function formatoJsonDatable(valor) {
        let e1 = JSON.stringify(valor);
        let e2 = e1.replace('[', '').replace(']', '');//.replace('\r\n','')
        let e3 = e2.replace(/[\/\\]+/g, '');
        let e4 = e3.split('rn');
        let e5 = e4[1].split('],');
        let e6 = e5[0].replace(',"responseJSON":[', '').replace('""', '"').replace('}"', '},');
        let e7 = '[' + e6 + ']'//porc3.replace('},','}');
        return e7;
    }



});



