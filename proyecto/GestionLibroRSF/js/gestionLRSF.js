$(document).ready(function () {

    resultadostabla();
    function resultadostabla() {

        tabla_responder_libroRSF = $('#tabla_responder_libroRSF').DataTable({
            "responsive": true,
            "cache": false,
            "ordering": false, //le quito el ordenamiento ascendente o descendente
            "bAutoWidth": false,//LE QUITA EL CACHE DEL DATATABLE CUANDO PRESIONO EL INSPECCIONADOR
            "lengthMenu": [[10, 25, 40, 80, -1], [10, 25, 40, 80, "All"]],
            "ajax": {
                "url": "funciones/acceso.php",
                "method": 'POST', //usamos el metodo POST
                "data": { seleccionar: 1 }, //enviamos una opcion para que haga un SELECT
                "dataSrc": "",
                error: function (jqXHR, textStatus, error) {
                    console.log("Error: " + error + "\nTexto: " + jqXHR + "\nESTADO: " + textStatus);
                }
            },
            "columns": [
                { "data": "NOMBRES" },
                {
                    render: function (data, type, JsonResultRow, row) {

                        return JsonResultRow.APELLIDO_PATERNO + ' ' + JsonResultRow.APELLIDO_MATERNO;
                    }
                },
                // { "data": "SEXO" },
                {
                    "data": "FECHA_NACIMIENTO",
                    "render": function (data, type, JsonResultRow, row) {
                        var hoy = new Date();
                        var cumpleanos = new Date(data);
                        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                        var m = hoy.getMonth() - cumpleanos.getMonth();

                        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                            edad--;
                        }
                        return edad + ' Años';
                    }
                },
                { "data": "TELEFONO_PRIMARIO" },
                { "data": "TIPO_SOLICITUD" },
                {
                    "data": "FECHA_EVENTO",
                    "render": function (data, type, JsonResultRow, row) {
                        let separar = data.split("-");
                        let fecha = separar[2] + '/' + separar[1] + '/' + separar[0];
                        return fecha;
                    }
                },
                { "data": "NOMBRE_AREA" },
                { "data": "NOMBRE_INSTITUCION" },
                {
                    render: function (data, type, JsonResultRow, row) {
                        let concatenar = `
                        <div class='row justify-content-center'>
                            <div class='col align-items-center'>
                                <div class='btn-group'>
                                `;
                        if (JsonResultRow.ESTADO_RESPUESTA == '1') { //si ya esta en transito aparece solo el boton de entrega
                            concatenar += `<label class="btn btn-success btn-sm">Respondida</label><label class='btn btn-info btn-sm btnDetalle' title='Ver detalle del R.S.F'><i class="far fa-file-alt"></i></label>`;
                        } else if (JsonResultRow.ESTADO_RESPUESTA == '0' && (JsonResultRow.TIPO_SOLICITUD == 'sugerencia' || JsonResultRow.TIPO_SOLICITUD == 'reclamo')) { //si ya esta en entrega aparece solo el boton de en transito, en caso que quiera retroceder el paso
                            concatenar += `<label class='btn btn-warning btn-sm btnResponder' title='Responder'><i class="fas fa-reply"></i></label><label class='btn btn-info btn-sm btnDetalle' title='Ver detalle del R.S.F'><i class="far fa-file-alt"></i></label>`;
                        }
                        else {
                            concatenar += `<label class='btn btn-info btn-sm btnDetalle' title='Ver detalle del R.S.F'><i class="far fa-file-alt"></i></label>`;
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
                "sEmptyTable": "No hay reclamos, felcitaciones ni sugerencias disponibles en esta tabla",
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
                }
            ]

        });


        $('.buttons-excel').hide();
        $('.buttons-print').hide();
        $('.buttons-pdf').hide();

        $(document).on('click', '#expoExcel', function () { $('.buttons-excel').click(); });
        $(document).on('click', '#expoPdf', function () { $('.buttons-pdf').click(); });
        $(document).on('click', '#Imprimir', function () { $('.buttons-print').click(); });

        $(document).on('click', '.btnResponder', function () {

            let idLibroRSF = (tabla_responder_libroRSF.row($(this).closest('tr')).data().ID_LIBRO_RSF);
            let fecha_registro = fomatearFecha((tabla_responder_libroRSF.row($(this).closest('tr')).data().FECHA_REGISTRO));
            let rutsolicitante = (tabla_responder_libroRSF.row($(this).closest('tr')).data().RUT_SOLICITANTE);
            let nacionalidad = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NACIONALIDAD);
            let nombre_pueblos_indigenas = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NOMBRE_PUEBLOS_INDIGENAS);
            let nombres = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NOMBRES);
            let apellido_paterno = (tabla_responder_libroRSF.row($(this).closest('tr')).data().APELLIDO_PATERNO);
            let apellido_materno = (tabla_responder_libroRSF.row($(this).closest('tr')).data().APELLIDO_MATERNO);
            let sexo = (tabla_responder_libroRSF.row($(this).closest('tr')).data().SEXO);
            let fecha_nacimiento = edad((tabla_responder_libroRSF.row($(this).closest('tr')).data().FECHA_NACIMIENTO));
            let telefonoprimario = (tabla_responder_libroRSF.row($(this).closest('tr')).data().TELEFONO_PRIMARIO);
            let tipo_solicitud = (tabla_responder_libroRSF.row($(this).closest('tr')).data().TIPO_SOLICITUD);
            let esafectado = (tabla_responder_libroRSF.row($(this).closest('tr')).data().ESAFECTADO);
            let fecha_evento = fomatearFecha((tabla_responder_libroRSF.row($(this).closest('tr')).data().FECHA_EVENTO));
            let detalle = (tabla_responder_libroRSF.row($(this).closest('tr')).data().DETALLE);
            let observaciones = (tabla_responder_libroRSF.row($(this).closest('tr')).data().OBSERVACIONES);
            let nombre_area = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NOMBRE_AREA);
            let nombre_institucion = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NOMBRE_INSTITUCION);
            let correo = (tabla_responder_libroRSF.row($(this).closest('tr')).data().CORREO);
            let Nombre_Funcionario = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NOMBRE_FUNCIONARIO);
            let Nombre_Rol = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NOMBRE_ROL);
            let Fecha_Respuesta_Funcionario = fomatearFecha((tabla_responder_libroRSF.row($(this).closest('tr')).data().FECHA_RESPUESTA));

            // console.log(
            //     "Fecha registro: " + fecha_registro +
            //     "\nID: " + idLibroRSF +
            //     "\nNombres: " + nombres +
            //     "\nR.U.T: " + rutsolicitante +
            //     "\nNacionalidad: " + nacionalidad +
            //     "\nApellido Paterno: " + apellido_paterno +
            //     "\nApellido Materno: " + apellido_materno +
            //     "\nFecha Nacimiento: " + fecha_nacimiento +
            //     "\nSexo: " + sexo +
            //     "\nTelefono primario: " + telefonoprimario +
            //     "\nConfirma si es solicitante: " + esafectado +
            //     "\nCorreo Electrónico: " + correo +
            //     "\nTipo de solicitud: " + tipo_solicitud +
            //     "\nInstitución: " + nombre_institucion +
            //     "\nÁrea: " + nombre_area +
            //     "\nFecha del evento: " + fecha_evento +
            //     "\nDetalle: " + detalle +
            //     "\nObservaciones: " + observaciones +
            //     "\nNombre Funcionario: " + Nombre_Funcionario +
            //     "\nNombre Rol: " + Nombre_Rol);


            let colorbotonconfirmar;
            colorbotonconfirmar = '#f6c23e';

            Swal.fire({
                title: 'COMENTARIO DE RESPUESTA',
                html: `
            <div class="row justify-content-center pt-3">
                <div class="col-xl-12 col-sm-12">
                    <div class="form-group row">
                        <label id="labelparaswal" class="col-sm-3 col-form-label">Es importante que indiques un comentario con la posible solución a la problemática.</label>
                        <textarea name="comentario" id="comentario" class="form-control col-sm-9" rows="5" cols="20" onkeypress="return soloCaractDeConversacion(event)"  onpaste="return false" autocomplete="off" minlength="2" maxlength="2000" style="resize:none"></textarea>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-5"></div>
                    <small class="col-sm-7">
                        Escrito <span id="escrito1" style="color:red;">00</span>
                        Restantes <span id="contadorcaracteres1" style="color:#28a745;">00</span>
                    </small>
                    </div>
                </div>
            </div>`,
                didOpen: function () {
                    $("#comentario").keyup(function () {
                        let noc = $("#comentario").val().length;
                        let now = $("#comentario").val();
                        let escrito = noc;

                        if (noc >= 2000) { // en caso que en el html del navegador alguien cambie el maxlenght
                            $('#comentario').attr('maxlength', '2000')
                        }

                        noc = 2000 - noc;
                        now = now.match(/\w+/g);

                        if (!now) {
                            now = 0;
                        } else {
                            now = now.length;
                        }
                        $("#escrito1").text(escrito);
                        // $("#contadordepalabras").text(now);
                        $("#contadorcaracteres1").text(noc);
                    });

                },
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Responder &rarr;',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: colorbotonconfirmar,
                cancelButtonColor: "#858796",
                width: '600px',

                preConfirm: () => {

                    let comentario = $('#comentario').val();
                    var formData = new FormData();

                    if (validavacioynulo([comentario])) {
                        Swal.showValidationMessage('Campo comentario vacío');
                    } else if (comentario.length < 2 || comentario.length > 2000) {
                        Swal.showValidationMessage('Largo inválido <br> mínimo: 2 carácteres <br>maximo: 2000 carácteres.');
                    } else {
                        formData.append("seleccionar", 2);
                        formData.append("comentario", comentario);
                        formData.append('id_libro_rsf', idLibroRSF);
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
                            // console.log("respuesta: " + respuesta);
                            if (respuesta == 1) {
                                toastr.error("Campos vacios", "UpS");
                            } else if (respuesta == 2) {
                                toastr.error("Ha ocurrido un error, si el mensaje persiste, por favor, contacte a soporte", "UpS");
                            } else if (respuesta == 3) {
                                toastr.success("Respuesta enviada al usuario", "Exito");
                                tabla_responder_libroRSF.ajax.reload(null, false);

                                $.post('../Notificaciones/LibroRSF/respuesta/', {
                                    fecha_registro: fecha_registro, tipo_solicitud: tipo_solicitud, rut: rutsolicitante, nacionalidad: nacionalidad, pueblos_indigenas: nombre_pueblos_indigenas,
                                    nombre: nombres, apellido_paterno: apellido_paterno, apellido_materno: apellido_materno, edad: fecha_nacimiento, correo: correo,
                                    telefono: telefonoprimario, institucion: nombre_institucion, area: nombre_area, descripcion: detalle, quienredacta: Nombre_Funcionario,
                                    cargoquienredacta: Nombre_Rol, fecharespuestafuncionario: Fecha_Respuesta_Funcionario, comentariorespuesta: comentario
                                }, function (responses) {
                                    console.log("Respuesta notificacion: " + responses);
                                    if (responses == 1) {
                                        console.log("Notificacion enviada");
                                    } else if (responses == 2) {
                                        console.log("No se han recibido parámetros");
                                    }
                                });

                            } else if (respuesta == 4) {
                                toastr.error("NO se han recibido parámetros");
                            }
                        }).fail(function (res) {
                            console.log(res);
                        });

                    }
                }
            });
        });

        $(document).on('click', '.btnDetalle', function () {

            let idLibroRSF = (tabla_responder_libroRSF.row($(this).closest('tr')).data().ID_LIBRO_RSF);
            let fecha_registro = fomatearFecha((tabla_responder_libroRSF.row($(this).closest('tr')).data().FECHA_REGISTRO));
            let rutsolicitante = (tabla_responder_libroRSF.row($(this).closest('tr')).data().RUT_SOLICITANTE);
            let rutfuncionario = (tabla_responder_libroRSF.row($(this).closest('tr')).data().RUT_FUNCIONARIO);
            let nacionalidad = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NACIONALIDAD);
            let nombre_pueblos_indigenas = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NOMBRE_PUEBLOS_INDIGENAS);
            // let nombres = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NOMBRES);
            // let apellido_paterno = (tabla_responder_libroRSF.row($(this).closest('tr')).data().APELLIDO_PATERNO);
            // let apellido_materno = (tabla_responder_libroRSF.row($(this).closest('tr')).data().APELLIDO_MATERNO);
            let sexo = (tabla_responder_libroRSF.row($(this).closest('tr')).data().SEXO);
            let fecha_nacimiento = fomatearFecha((tabla_responder_libroRSF.row($(this).closest('tr')).data().FECHA_NACIMIENTO));
            let telefono_secundario = (tabla_responder_libroRSF.row($(this).closest('tr')).data().TELEFONO_SECUNDARIO);
            let tipo_solicitud = (tabla_responder_libroRSF.row($(this).closest('tr')).data().TIPO_SOLICITUD);
            let tipo_persona = (tabla_responder_libroRSF.row($(this).closest('tr')).data().TIPO_PERSONA);
            let esafectado = (tabla_responder_libroRSF.row($(this).closest('tr')).data().ESAFECTADO);
            let estado_respuesta = (tabla_responder_libroRSF.row($(this).closest('tr')).data().ESTADO_RESPUESTA);
            let comentario_respuesta = (tabla_responder_libroRSF.row($(this).closest('tr')).data().COMENTARIO_RESPUESTA);
            let fecha_evento = fomatearFecha((tabla_responder_libroRSF.row($(this).closest('tr')).data().FECHA_EVENTO));
            let detalle = (tabla_responder_libroRSF.row($(this).closest('tr')).data().DETALLE);
            let observaciones = (tabla_responder_libroRSF.row($(this).closest('tr')).data().OBSERVACIONES);
            let nombre_area = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NOMBRE_AREA);
            let nombre_institucion = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NOMBRE_INSTITUCION);
            let correo = (tabla_responder_libroRSF.row($(this).closest('tr')).data().CORREO);
            let Nombre_Funcionario = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NOMBRE_FUNCIONARIO);
            let Nombre_Rol = (tabla_responder_libroRSF.row($(this).closest('tr')).data().NOMBRE_ROL);
            let Fecha_Respuesta_Funcionario = fomatearFecha((tabla_responder_libroRSF.row($(this).closest('tr')).data().FECHA_RESPUESTA));

            var concat = `
            <div class="row justify-content-center">
            <div class="col-xl-12 col-sm-12">
                <div class="card" style="border-top: 5px solid #085682;">
                    <div class="card-body">
                        <div class="row">
                        
                            <div style="max-width: 0; max-height: 0; overflow: hidden;"><input autofocus="true" /> Hago esto para deshabilitar el autofocus del primer input</div>

                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">R.U.T SOLICITANTE</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ej: 141112229" value="`+ rutsolicitante + `" style="pointer-events: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>`;

            if (rutfuncionario == null || !rutfuncionario) {
                concat += `
                                <div class="col-xl-6 col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label-sm">R.U.T FUNCIONARIO</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Ej: 141112229" value="No tiene asignaciones" style="pointer-events: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;
            } else {
                concat += `
                                <div class="col-xl-6 col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label-sm">R.U.T FUNCIONARIO</label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Ej: 141112229" value="`+ rutfuncionario + `" style="pointer-events: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
            }

            concat += `
                                <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">NACIONALIDAD</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ej: 141112229" value="`+ nacionalidad + `" style="pointer-events: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">SEXO</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ej: 141112229" value="`+ sexo + `" style="pointer-events: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">FECHA NACIMIENTO</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ej: 141112229" value="`+ fecha_nacimiento + `" style="pointer-events: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">PUEBLOS INDÍGENAS</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ej: 141112229" value="`+ nombre_pueblos_indigenas + `" style="pointer-events: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">TIPO PERSONA</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ej: 141112229" value="`+ tipo_persona + `" style="pointer-events: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">ES AFECTADO(A)</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ej: 141112229" value="`+ esafectado + `" style="pointer-events: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">FECHA REGISTRO</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ej: 141112229" value="`+ fecha_registro + `" style="pointer-events: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="col-xl-6 col-sm-6">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label-sm">FECHA DEL EVENTO</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Ej: 141112229" value="`+ fecha_evento + `" style="pointer-events: none;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-6">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label-sm">ÁREA</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <textarea class="form-control" rows="5" cols="20" style="resize:none;pointer-events: none;">`+ nombre_area + `</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-6">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label-sm">INSTITUCIÓN</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <textarea class="form-control" rows="5" cols="20" style="resize:none;pointer-events: none;">`+ nombre_institucion + `</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-6">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label-sm">DETALLE</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <textarea class="form-control" rows="5" cols="100" style="resize:none;" readonly>`+ detalle + `</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-6">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label-sm">OBSERVACIONES</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <textarea class="form-control" rows="5" cols="100" style="resize:none;" readonly>`+ observaciones + `</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-sm-12">
                            <div class="form-group row text-left">
                                <label class="col-sm-12 col-form-label" style="color: #858796; font-weight:700">DATOS DEL FUNCIONARIO</label>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-6">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label-sm">FECHA RESPUESTA FUNCIONARIO(A)</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Ej: 141112229" value="`+ Fecha_Respuesta_Funcionario + `" style="pointer-events: none;">
                                    </div>
                                </div>
                            </div>
                        </div>`;

            if (estado_respuesta == 0) {
                concat += `
                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">ESTADO RESPUESTA</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                        <span class="badge badge-info" style="padding: 5px;width:150px;">sin efecto</span>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            } else if (estado_respuesta == 1) {
                concat += `
                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">ESTADO RESPUESTA</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                        <span class="badge badge-success" style="padding: 5px;width:150px;">Respondida</span>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            }


            if (comentario_respuesta == null || comentario_respuesta == 'NULL') {
                concat += `
                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">COMENTARIO RESPUESTA</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <textarea class="form-control" rows="5" cols="20" style="resize:none;pointer-events: none;">Sin comentarios</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            } else {
                concat += `
                            <div class="col-xl-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label-sm">COMENTARIO RESPUESTA</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <textarea class="form-control" rows="5" cols="20" style="resize:none;pointer-events: none;">`+ comentario_respuesta + `</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            }
            concat += `
                        <div class="col-xl-6 col-sm-6">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label-sm">TELÉFONO SECUNDARIO</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Ej: 141112229"  value="`+ telefono_secundario + `" style="pointer-events: none;">
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-xl-12 col-sm-12 pt-3">
                        <table id="tabla_archivos" class="table table-bordered">
                            <thead class="text-center" style="background-color: #085682;color:white;">
                                <tr>
                                    <th scope="col">NOMBRE IMAGEN</th>
                                    <th scope="col">DESCARGAR</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>

                <div class="card-footer">
                    <div class="row justify-content-end">
                        <div class="col-xl-12">
                            <button type="button" class="btn btn-secondary col-sm-3 btn-xs float-right botoncancelar" title="Cerrar"><i class="fa fa-close"></i> Cerrar Ventana</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;

            Swal.fire({
                title: 'DETALLE DE ' + tipo_solicitud.toUpperCase(),
                html: concat,
                didOpen: function () {

                    $(".botoncancelar").on('click', function () {
                        Swal.close();
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


            $.post('funciones/acceso.php', {
                IDEN: idLibroRSF, seleccionar: 3
            }, function (responses) {
                let contenidotabla = ``;
                for (let i = 0; i < responses.length; i++) {
                    // console.log("Respuesta para tabla: " + responses.length);
                    let IDRSF = responses[i].ID_LIBRO_RSF;
                    let NOMBREIMAGEN = responses[i].NOMBRE_IMAGEN;
                    contenidotabla += `
                    <tr>
                        <td>`+ NOMBREIMAGEN + `</td>
                        
                        <td><button type="button" class="btn btn-outline-danger botondescargar" value="`+ IDRSF + `,`+ NOMBREIMAGEN + `"><i class="fas fa-download"></i></button></td>
                    </tr>                    
                    `;
                }

                $("#tabla_archivos tbody").append(contenidotabla);

                $(".botondescargar").on('click', function () {
                    var filename = "" + this.value;
                    let separar = filename.split(",");
                    Descargar(separar[0],separar[1]);
                });

            });

        });

    }


    function Descargar(IDCARPETA, filename){
        // console.log("HAH " + filename);
        //Set the File URL.
        var url = "../LibroRSF/archivos/"+""+IDCARPETA+"/"+""+filename;

        //Create XMLHTTP Request.
        var req = new XMLHttpRequest();
        req.open("GET", url, true);
        req.responseType = "blob";
        req.onload = function () {
            //Convert the Byte Data to BLOB object.
            var blob = new Blob([req.response], { type: "application/octetstream" });

            //Check the Browser type and download the File.
            var isIE = false || !!document.documentMode;
            if (isIE) {
                window.navigator.msSaveBlob(blob, fileName);
            } else {
                var url = window.URL || window.webkitURL;
                link = url.createObjectURL(blob);
                var a = document.createElement("a");
                a.setAttribute("download", filename);
                a.setAttribute("href", link);
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            }
        };
        req.send();
    }  


    function edad(variable) {
        var hoy = new Date();
        var cumpleanos = new Date(variable);
        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
        var m = hoy.getMonth() - cumpleanos.getMonth();

        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
            edad--;
        }
        return edad;
    }

    function fomatearFecha(fecharecibida) {
        let separar = fecharecibida.split("-");
        let fecha = separar[2] + '/' + separar[1] + '/' + separar[0];
        return fecha;
    }


    //===================================================================LLENADO DE DATATABLE===================================================================//     

});
