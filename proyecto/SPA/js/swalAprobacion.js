function alertaAprobORechazo(id_pa, decision, rol) {
    // toastr.error(rol);
    let colorbotonconfirmar;
    let titulo;

    if (decision == 1) {
        colorbotonconfirmar = '#009688';
        titulo='APROBAR';
    } else if (decision == 2) {
        colorbotonconfirmar = '#e74a3b';
        titulo='RECHAZAR';
    }

    //onkeypress="return sololetrasynumeros(event)"
    Swal.fire({
        title: 'ANTES DE '+titulo,
        html: `
        <div class="row justify-content-center pt-3">
            <div class="col-lg-9">

                <div class="form-group" id="CNG" hidden>
                    <label id="labelparaswal">Dias acumulados con goce de remuneraciones</label>
                    <input type="number" class="form-control" id="diascongoce" placeholder="Ingrese número de dias" min="0" max="1000" minlength="1" maxlength="4" onkeypress="return solonumeros(event)" value="0" autocomplete="off" onpaste="return false" required> 
                </div>

                <div class="form-group" id="CSG" hidden>
                    <label id="labelparaswal">Dias acumulados sin goce de remuneraciones</label>
                    <input type="number" class="form-control" id="diassingoce" placeholder="Ingrese número de dias" min="0" max="1000" minlength="1" maxlength="4" onkeypress="return solonumeros(event)" value="0" autocomplete="off" onpaste="return false" required> 
                </div>

                <div class="form-group">
                    <label id="labelparaswal">Comentario de la decisión (opcional)</label>
                    <textarea class="form-control" id="comentario" placeholder="Complete este campo" rows="3" col="10" minlength="0" maxlength="150" onkeypress="return soloCaractDeConversacion(event)" onpaste="return false" autocomplete="off" style="resize:none" required></textarea>
                    <small class="col-sm-7">
                        Escrito <span id="escrito1" style="color:red;">00</span>
                        Restantes <span id="contadorcaract1" style="color:#28a745;">00</span>
                    </small>
                </div>

                <div class="form-group" id="OTR" hidden>
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
            if (rol == 12 && decision==1) { $('#CNG').removeAttr('hidden'); $('#CSG').removeAttr('hidden'); $('#OTR').removeAttr('hidden'); }

            $("#comentario").keyup(function () {
                let noc = $("#comentario").val().length;
                let now = $("#comentario").val();
                let escrito = noc;
                // en caso que en el html del navegador alguien cambie el maxlenght
                if (noc >= 150) { $('#comentario').attr('maxlength', '150') }
                noc = 150 - noc;
                now = now.match(/\w+/g);
                if (!now) { now = 0;
                } else {now = now.length;}
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
                if (!now) { now = 0;
                } else {now = now.length;}
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
            let diascongoce = $('#diascongoce').val();
            let diassingoce = $('#diassingoce').val();
            let otros = $('#otros').val();
            let archivo = document.getElementById("firma").files[0]; // file from input
            var formData = new FormData();

            if (validavacioynulo([firma]) && existefirma == 'no' && (rol == 7 || rol == 8 || rol == 11 || rol == 13 || rol == 15)) {
                /*Los jefes directo(J.Unidad, J.Sector, Director,J.Subrogante) se les pide la firma y al Jefe de Sistema de Salud 
                pero no al Encargado(a) de personal, por eso no está el rol 12 */
                $('#divfirma').show();
                $('#firma').prop('required', true);
                Swal.showValidationMessage('campo de la firma vacio');
            } else if (validavacioynulo([diascongoce]) && rol == 12) {
                Swal.showValidationMessage('campo dias con goce no puede ser vacío');
            } else if (validavacioynulo([diassingoce]) && rol == 12) {
                Swal.showValidationMessage('campo dias sin goce no puede ser vacío');
            } else if ((otros.length<0 || otros.length>150) && rol == 12) {
                Swal.showValidationMessage('campo otros inválido, tamaño máximo 150 caracteres');
            } else if ((comentario.length<0 || comentario.length>150) && rol == 12) {
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
                formData.append('diascongoce', diascongoce);
                formData.append('diassingoce', diassingoce);
                formData.append('otros', otros);
                formData.append('id_pa', id_pa);
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
                        tablapermisoadministrativo.ajax.reload(null, false);
                        toastr.success("Solicitud respondida", "Éxito");
                        LlenarDatos('', maximo); //mostrar datos
                    } else if (respuesta == 12) {
                        toastr.error("No se han recibido parámetros", "UpS");
                    } else if (respuesta == 13) {
                        toastr.error("Ingrese su firma", "UpS");
                    } else if (respuesta == 14) {
                        toastr.error("Tamaño de la imagen de la firma excede los 20MB", "UpS");
                    }
                }).fail(function (res) {
                    console.log(res);
                });

            }
        }
    });


    let comprobarDirectorio = new Request('../perfil/firmas/' + rut);
    var existefirma = 'si';

    if (rol == 7 || rol == 8 || rol == 11 || rol == 13 || rol == 15) { //pide firma sólo si es jefe de sector o jefe de Unidad,Jefe subrogante, Director, Jefe sistema salud según documento
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
                toastr.error("Sólo se permiten imagenes con formato PNG");
                // console.log("Extensión no permitida: " + ext);
            }
        }
    });
}