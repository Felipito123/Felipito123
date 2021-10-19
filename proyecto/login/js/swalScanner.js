function ScannearQR() {
    var scanner;
    var sonido;
    // alertify.success("AÑO: "+fechaactual);
    // alertify.success("fecha minima: "+fechaminima+"\nfecha máxima: "+fechamaxima);

    Swal.fire({
        title: 'LECTOR CÓDIGO QR',
        html: `
        <div class="row justify-content-center pt-3">
            <div class="col-xl-12 col-sm-12">
                <video id="previsualizacion" class="p-1" style="width:100%; border: 2px solid gray"></video>
            </div>
        </div>
`,
        // background:'transparent',
        didOpen: function () {

            sonido = new Audio("barcode.wav");

            scanner = new Instascan.Scanner({
                video: document.getElementById('previsualizacion'),
                scanPeriod: 5,
                mirror: false
            });

            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No se han encontrado camaras');
                    alertify.error('Camaras no encontradas.');
                }
            }).catch(function (e) {
                console.error("ERROR: "+ e);
                alertify.error("Ha ocurrido un error. Asegurese del protocolo de seguridad.");
            });

            scanner.addListener('scan', function (respuesta) {
                sonido.play();
                console.log("CONTENIDO: " + respuesta);

                // $('#previsualizacion').css({'border': "2px solid green"});
                // scanner.stop();

                // let limpia = respuesta.replace("chl");
                let parametros = respuesta.split(",");
                let rut = parametros[0];
                let contrasena  = parametros[1];

                var formData = new FormData();
                formData.append("rut", rut);
                formData.append('contrasena', contrasena);

                for (var i of formData.entries()) {
                    console.log(i[0] + ', ' + i[1]);
                }

                $.ajax({
                    type: 'POST',
                    url: 'funciones/loginCDQR.php',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false
                }).done(function (respuesta) {
                    console.log("respuesta: " + respuesta);
                    if (respuesta == 1) {
                        toastr.error("Campos vacios", "UpS");
                        $('#previsualizacion').css({'border': "2px solid red"});
                    } else if (respuesta == 2) {
                        toastr.error("Rut o contraseña inválida", "UpS");
                        $('#previsualizacion').css({'border': "2px solid red"});
                    } else if (respuesta == 3) {
                        toastr.error("Ha ocurrido un error, si el mensaje persiste, por favor, contacte a soporte", "UpS");
                        $('#previsualizacion').css({'border': "2px solid red"});
                    } else if (respuesta == 4) {
                        $('#previsualizacion').css({'border': "2px solid green"});
                        scanner.stop();
                        window.setTimeout(function () { location.href = '../indice/'; }, 1200);
                    } else if (respuesta == 5) {
                        toastr.error("No hay coincidencias de contraseñas detectado", "UpS");
                        $('#previsualizacion').css({'border': "2px solid red"});
                    } else if (respuesta == 6) {
                        toastr.error("Funcionario Inactivo o no registrado en la BD", "UpS");
                        $('#previsualizacion').css({'border': "2px solid red"});
                    } else if (respuesta == 7) {
                        toastr.error("Usted ha dejado de ejercer sus funciones en el CESFAM o su cuenta esta inactiva", "UpS");
                        $('#previsualizacion').css({'border': "2px solid red"});
                    } 
                }).fail(function (res) {
                    console.log(res);
                });


            });

        },
        focusConfirm: false,
        showCancelButton: true,
        showConfirmButton: false,
        allowOutsideClick: false,
        confirmButtonText: 'Responder &rarr;',
        cancelButtonText: '<div style="width:300px;">Cancelar</div>',
        confirmButtonColor: "#009688",
        cancelButtonColor: "#858796",
        width: '600px'
    }).then((result) => {

        if (result.dismiss) {
            scanner.stop();
        }

        scanner.stop();
        // console.log('¡Cerrar modal!');
    });




}