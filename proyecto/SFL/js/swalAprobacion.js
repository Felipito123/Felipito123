function alertaAprobORechazo(id_pfl, decision, rol) {
    // toastr.error(rol);
    let colorbotonconfirmar;
    let titulo;

    if (decision == 1) {
        colorbotonconfirmar = '#009688';
        titulo = 'APROBAR';
    } else if (decision == 2) {
        colorbotonconfirmar = '#e74a3b';
        titulo = 'RECHAZAR';
    }

    let fechaactual = new Date().toLocaleDateString('en-GB');
    let separarfecha = fechaactual.split("/");
    let mes = separarfecha[1];
    let annoo = separarfecha[2];
    let diia = separarfecha[0];

    // alertify.success("AÑO: "+fechaactual);

    let un_ano_antes = anoactual - 1;
    let dos_ano_antes = un_ano_antes - 1;

    //Fechas formateadas al date de boostrap donde usa el formato año-mes-dia
    // let fechaminima= dos_ano_antes+'-'+mes+'-'+diia;
    // let fechamaxima= anoactual+'-12-30';
    let fechaminima = annoo + '-' + mes + '-' + diia;
    let fechamaxima = annoo + '-12-30';
    let fechahoy = annoo + '-' + mes + '-' + diia;

    // alertify.success("fecha minima: "+fechaminima+"\nfecha máxima: "+fechamaxima);

    Swal.fire({
        title: 'ANTES DE ' + titulo,
        html: `
        <div class="row justify-content-center pt-3">
            <div class="col-lg-9">

                <div class="form-group row" id="form_accion" hidden>
                        <label class="col-sm-3"></label>
                        <div style="max-width: 0; max-height: 0; overflow: hidden;"><input autofocus="true" /></div>
                        <div class="custom-control custom-radio col-sm-3 pt-2">
                            <input name="accion" id="autoriza" type="radio" class="custom-control-input" value="1">
                            <label class="custom-control-label pt-1" id="labelparaswal" for="autoriza">Autoriza</label>
                        </div>

                        <div class="custom-control custom-radio col-sm-3 pt-2">
                            <input name="accion" id="prorroga" type="radio" class="custom-control-input" value="2">
                            <label class="custom-control-label pt-1" id="labelparaswal" for="prorroga">Prorroga</label>
                        </div>
                </div>

                <div class="form-group" id="form_desde" hidden>
                    <label id="labelparaswal">Desde:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="far fa-calendar-alt" aria-hidden="true" style="width: 13px;"></i></span>
                        <input type="date" class="form-control" id="desde" name="desde" onkeypress="return fechausuarios(event)" minlength="10" maxlength="10" min="`+ fechaminima + `" max="` + fechamaxima + `" onpaste="return false" required>
                    </div>
                </div>

                <div class="form-group" id="form_hasta" hidden>
                    <label id="labelparaswal">Hasta:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="far fa-calendar-alt" aria-hidden="true" style="width: 13px;"></i></span>
                        <input type="date" class="form-control" id="hasta" name="hasta" onkeypress="return fechausuarios(event)" minlength="10" maxlength="10" min="`+ fechaminima + `" max="` + fechamaxima + `" onpaste="return false" required>
                    </div>
                </div>

                <div class="form-group" id="form_ano_feriado" hidden>
                    <label id="labelparaswal">Feriado acumulado del año</label>
                    <select class="form-control custom-select" id="ano_feriado_acumulado">
                        <option value="null">Seleccione un año</option>
                        <option value="`+ anoactual + `">` + anoactual + `</option>
                        <option value="`+ un_ano_antes + `">` + un_ano_antes + `</option>
                        <option value="`+ dos_ano_antes + `">` + dos_ano_antes + `</option>
                    </select>
                </div>

                <div class="form-group" id="form_dia_feriado" hidden>
                    <label id="labelparaswal">Dias feriados acumulados</label>
                    <select class="form-control custom-select" id="dias_feriados_acumulados">
                        <option value="null">Seleccione un dia</option>
                        <option value="1">1 dia</option><option value="2">2 dias</option><option value="3">3 dias</option>
                        <option value="4">4 dias</option><option value="5">5 dias</option><option value="6">6 dias</option>
                        <option value="7">7 dias</option><option value="8">8 dias</option><option value="9">9 dias</option>
                        <option value="10">10 dias</option><option value="11">11 dias</option><option value="12">12 dias</option>
                        <option value="13">13 dias</option><option value="14">14 dias</option><option value="15">15 dias</option>
                        <option value="16">16 dias</option><option value="17">17 dias</option><option value="18">18 dias</option>
                        <option value="19">19 dias</option><option value="20">20 dias</option><option value="21">21 dias</option>
                        <option value="22">22 dias</option><option value="23">23 dias</option><option value="24">24 dias</option>
                        <option value="25">25 dias</option><option value="26">26 dias</option><option value="27">27 dias</option>
                        <option value="28">28 dias</option><option value="29">29 dias</option><option value="30">30 dias</option>
                    </select>
                </div>

                <div class="form-group">
                    <label id="labelparaswal">Comentario de la decisión (opcional)</label>
                    <textarea class="form-control" id="comentario" placeholder="Complete este campo" rows="3" col="10" minlength="0" maxlength="150" onkeypress="return soloCaractDeConversacion(event)" onpaste="return false" autocomplete="off" style="resize:none" required></textarea>
                    <small class="col-sm-7">
                        Escrito <span id="escrito1" style="color:red;">00</span>
                        Restantes <span id="contadorcaract1" style="color:#28a745;">00</span>
                    </small>
                </div>

                <div class="form-group" id="form_otros" hidden>
                    <label id="labelparaswal">Otros (opcional)</label>
                    <textarea class="form-control" id="otros" placeholder="Complete este campo" rows="3" col="10" minlength="0" maxlength="150" onkeypress="return soloCaractDeConversacion(event)" onpaste="return false" autocomplete="off" style="resize:none" required></textarea>
                    <small class="col-sm-7">
                        Escrito <span id="escrito2" style="color:red;">00</span>
                        Restantes <span id="contadorcaract2" style="color:#28a745;">00</span>
                    </small>
                </div>

            </div>
        </div>

        <div class="row justify-content-center" id="divfirma">
            <div class="col-lg-9">
                <div class="form-group">
                    <label id="labelparaswal">Firma</label>
                    <input type="file" class="form-control-file estilo-archivo" id="firma" name="firma" accept=".png" required>
                </div>
            </div>
        </div>

`, didOpen: function () {
            if (rol == 12 && decision == 1) {
                $('#form_accion').removeAttr('hidden');
                $('#form_desde').removeAttr('hidden');
                $('#form_hasta').removeAttr('hidden');
                $('#form_ano_feriado').removeAttr('hidden');
                $('#form_dia_feriado').removeAttr('hidden');
                $('#form_otros').removeAttr('hidden');
            }

            $("#comentario").keyup(function () {
                let noc = $("#comentario").val().length;
                let now = $("#comentario").val();
                let escrito = noc;
                // en caso que en el html del navegador alguien cambie el maxlenght
                if (noc >= 150) { $('#comentario').attr('maxlength', '150') }
                noc = 150 - noc;
                now = now.match(/\w+/g);
                if (!now) {
                    now = 0;
                } else { now = now.length; }
                $("#escrito1").text(escrito);
                $("#contadorcaract1").text(noc);
            });


            $("#otros").keyup(function () {
                let noc = $("#otros").val().length;
                let now = $("#otros").val();
                let escrito = noc;
                // en caso que en el html del navegador alguien cambie el maxlenght
                if (noc >= 150) { $('#otros').attr('maxlength', '150') }
                noc = 150 - noc;
                now = now.match(/\w+/g);
                if (!now) {
                    now = 0;
                } else { now = now.length; }
                $("#escrito2").text(escrito);
                $("#contadorcaract2").text(noc);
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
            let firma = $('#firma').val(); //este lo uso para validar y el let archivo, para enviar como file
            let comentario = $('#comentario').val();
            let ano_feriado_acumulado = $('#ano_feriado_acumulado').val();
            let dias_feriados_acumulados = $('#dias_feriados_acumulados').val();
            let desde = $('#desde').val();
            let hasta = $('#hasta').val();
            let accion = $("input[name=accion]:checked").val();

            // alertify.success("acción: "+accion+" AC: "+CHECK);

            let otros = $('#otros').val();
            let archivo = document.getElementById("firma").files[0]; // file from input
            var formData = new FormData();

            if (validavacioynulo([firma]) && existefirma == 'no' && (rol == 7 || rol == 8 || rol == 11 || rol == 13 || rol == 15)) {
                //Los jefes directo(J.Unidad, J.Sector, Director,J.Subrogante) se les pide la firma y al Jefe de Sistema de Salud pero no 
                //al Encargado(a) de personal, por eso no está el rol 12
                $('#divfirma').show();
                $('#firma').prop('required', true);
                Swal.showValidationMessage('campo de la firma vacio');
            } else if ((validavacioynulo([accion]) || !accion) && rol == 12 && decision == 1) {
                Swal.showValidationMessage('Seleccione si: autoriza o prorroga');
            } else if (validavacioynulo([desde]) && rol == 12 && decision == 1) {
                Swal.showValidationMessage('Seleccione una fecha en el campo "Desde"');
            } else if (validavacioynulo([hasta]) && rol == 12 && decision == 1) {
                Swal.showValidationMessage('Seleccione una fecha en el campo "Hasta"');
            } else if ((new Date(desde).getTime() > new Date(hasta).getTime()) && rol == 12 && decision == 1) {
                Swal.showValidationMessage('La fecha "Desde", no puede ser mayor a la fecha "Hasta" ');
            } else if ((new Date(desde).getTime() == new Date(hasta).getTime()) && rol == 12 && decision == 1) {
                Swal.showValidationMessage('La fechas no pueden ser iguales');
            } else if ((validavacioynulo([ano_feriado_acumulado]) || !ano_feriado_acumulado || ano_feriado_acumulado == 'null') && rol == 12 && decision == 1) {
                Swal.showValidationMessage('Seleccione año en el campo "Feriado acumulado del año"');
            } else if ((validavacioynulo([dias_feriados_acumulados]) || !dias_feriados_acumulados || dias_feriados_acumulados == 'null') && rol == 12 && decision == 1) {
                Swal.showValidationMessage('Seleccione un dia en el campo "Dias feriados acumulados"');
            } else if ((otros.length < 0 || otros.length > 150) && rol == 12 && decision == 1) { //El campo otros si puede ser vacio
                Swal.showValidationMessage('campo otros inválido, tamaño máximo 150 caracteres');
            } else if (comentario.length < 0 || comentario.length > 150) { //El campo comentaro si puede ser vacio
                Swal.showValidationMessage('campo comentario inválido, tamaño máximo 150 caracteres');
            } else {

                if (existefirma == 'no' && (rol == 7 || rol == 8 || rol == 11 || rol == 13 || rol == 15)) {
                    formData.append("firma", archivo);
                } else {
                    formData.append("firma", '');
                }

                formData.append("seleccionar", 2);
                formData.append("comentario", comentario);
                formData.append('existefirma', existefirma);
                formData.append('decision', decision);
                formData.append('ano_feriado_acumulado', ano_feriado_acumulado);
                formData.append('dias_feriados_acumulados', dias_feriados_acumulados);
                formData.append('desde', desde);
                formData.append('hasta', hasta);
                formData.append('accion', accion);
                formData.append('otros', otros);
                formData.append('id_pfl', id_pfl);
                // formData.append("firma", archivo);

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
                    console.log("respuesta: " + respuesta);
                    if (respuesta == 1) {
                        toastr.error("Campos vacios", "UpS");
                    } else if (respuesta == 2 || respuesta == 6 || respuesta == 8 || respuesta == 10) {
                        toastr.error("Ha ocurrido un error, si el mensaje persiste, por favor, contacte a soporte", "UpS");
                    } else if (respuesta == 3) {
                        toastr.error("Solicitud ya ha sido aprobada por un jefe de sector o jefe de unidad", "UpS");
                    } else if (respuesta == 4) {
                        toastr.error("Solicitud ya ha sido aprobada por el encargado(a) de personal", "UpS");
                    } else if (respuesta == 5) {
                        toastr.error("Solicitud ya ha sido aprobada por el jefe sistema de salud", "UpS");
                    } else if (respuesta == 7 || respuesta == 9 || respuesta == 11) {
                        tablaferiadolegal.ajax.reload(null, false);
                        toastr.success("Solicitud respondida", "Éxito");
                        LlenarDatos('', maximo); //mostrar datos
                    } else if (respuesta == 12) {
                        toastr.error("No se han recibido parámetros", "UpS");
                    } else if (respuesta == 13) {
                        toastr.error("Ingrese su firma", "UpS");
                    } else if (respuesta == 14) {
                        toastr.error("Tamaño de la imagen de la firma excede los 20MB", "UpS");
                    } else if (respuesta == 16) {
                        toastr.error("Fechas inválidas, no pueden ser iguales ni la fecha 'Desde' no debe ser mayor a la fecha 'Hasta' ", "UpS");
                    }
                }).fail(function (res) {
                    console.log(res);
                });

            }
        }
    });


    let comprobarDirectorio = new Request('../perfil/firmas/' + rut);
    var existefirma = 'si';

    if (rol == 7 || rol == 8 || rol == 11 || rol == 13 || rol == 15) { //pide firma sólo si es jefe de sector, jefe de Unidad,Jefe subrogante, Director, Jefe sistema salud según documento
        fetch(comprobarDirectorio).then(function (respuesta) {
            console.log(respuesta.status); // returns 200
            if (respuesta.status == 200) {
                $('#divfirma').hide();
                $('#firma').prop('required', false);
                // toastr.error("si se encuentra");
            } else {
                $('#divfirma').show();
                $('#firma').prop('required', true);
                existefirma = 'no'; //no existe firma
                // toastr.error("no se encuentra");
            }
        }).catch(function (error) {
            console.log(error);
        });
    } else { //oculta la firma
        $('#divfirma').hide();
        $('#firma').prop('required', false);
    }


    $('#firma').on('change', function () { //en caso de que quieran cambiar manualmente la extensión, lo valido
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != '') {
            if (ext == "png") { //ext == "jpg" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG" || ext == "bmp"
                // console.log("La extensión es: " + ext);
                if ($(this)[0].files[0].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYPR A 20 MB)
                    // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                    // console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                    toastr.error("Tamaño excede a 20 MB");
                    $(this).val('');
                }
            } else {
                $(this).val('');
                toastr.error("Sólo se permiten imagenes con extensión PNG");
                // console.log("Extensión no permitida: " + ext);
            }
        }
    });
}