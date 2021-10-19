function alertaAprobORechazo(id_pe, decision, rol) {
    // toastr.error(rol);
    let colorbotonconfirmar;

    if(decision==1){
        colorbotonconfirmar='#1cc88a';
    }else if(decision==2){
        colorbotonconfirmar='#e74a3b';
    }

    Swal.fire({
        title: 'Observación',
        html: `
<div class="row justify-content-center pt-3">
<div class="col-lg-9">
    <div class="form-group">
        <label id="labelparaswal">Escriba un comentario (opcional)</label>
<input type="text" class="form-control" id="comentario" placeholder="Complete este campo" minlength="2" maxlength="100" onkeypress="return sololetrasynumeros(event)" onpaste="return false" autocomplete="off" required>
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
</div>`,
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
            let archivo = document.getElementById("firma").files[0]; // file from input
            var formData = new FormData();

            if (validavacioynulo([firma]) && existefirma == 'no' && (rol == 7 || rol == 8)) {
                $('#divfirma').show();
                $('#firma').prop('required', true);
                Swal.showValidationMessage('campo de la firma vacio');
            } else {

                if (existefirma == 'no' && (rol == 7 || rol == 8)) {
                    formData.append("firma", archivo);
                }else {
                    formData.append("firma", '');
                }

                // if (existefirma == 'no' && (rol == 7 || rol == 8)) {
                //     formData.append("firma", archivo);
                // }else if (existefirma == 'si' && (rol == 7 || rol == 8)) {
                //     formData.append("firma", '');
                // } else {
                //     formData.append("firma", '');
                // }
                
                formData.append("seleccionar", 2);
                formData.append("comentario", comentario);
                formData.append('existefirma', existefirma);
                formData.append('decision', decision);
                formData.append('id_pe', id_pe);
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
                }).done(function(respuesta) {
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
                        tablapermisoespecial.ajax.reload(null, false);
                        toastr.success("Solicitud respondida", "Éxito");
                        LlenarDatos('', maximo); //mostrar datos
                        // $("#divcertificados").hide();
                        // $("#tabla_certificado").hide();
                    } else if (respuesta == 12){
                        toastr.error("No se han recibido parámetros", "UpS");
                    }else if (respuesta == 13){
                        toastr.error("Ingrese su firma", "UpS");
                    }else if (respuesta == 14){
                        toastr.error("Tamaño de la imagen de la firma excede los 20MB", "UpS");
                    }
                }).fail(function(res) {
                    console.log(res);
                });
                
            }
        }
    });


    let comprobarDirectorio = new Request('../perfil/firmas/' + rut);
    var existefirma = 'si';

    if (rol == 7 || rol == 8) { //pide firma sólo si es jefe de sector o jefe de Unidad, según documento
        fetch(comprobarDirectorio).then(function(respuesta) {
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
        }).catch(function(error) {
            console.log(error);
        });
    } else { //oculta la firma
        $('#divfirma').hide();
        $('#firma').prop('required', false);
    }


    $('#firma').on('change', function() { //en caso de que quieran cambiar manualmente la extensión, lo valido
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