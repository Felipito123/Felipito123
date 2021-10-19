$('#tarjeta1').on('click', function () {
    // $("#myParagraph").css({"backgroundColor": "black", "color": "white"});
    $('#contenedor2').removeAttr('hidden');
    $('#contenedor2').html(`
                    <div class="card mb-4 shadow-sm rounded fadeInDown">
                        <img src="./head/fondoagendamedica.jpg" class="img-fluid" alt="" style="max-height: 300px;">
                    </div>

                    <div class="card mb-4 shadow rounded fadeInDown">
                        <div class="card-body rounded" style="border-top: 10px solid #69b0d6;">
                            <h1 class="text-center text-dark">Agende el retiro de sus medicamentos</h1>

                            <div class="mb-3" style="color:#5a5959">
                                <p>

                                <div>
                                    La unidad de Farmacia del centro de salud familiar de Los Álamos (CESFAM), brinda el servicio de agendamiento para el retiro de medicamentos para anticipar la preparación de éstos y agilizar la entrega evitando demoras en sala de espera.
                                </div>

                                <div class="pt-3 pb-3">
                                    ¿Cómo Funciona?
                                </div>

                                <div>
                                    1.- Complete el sgte. formulario si tiene receta vigente. (si no la tiene solicitar en policlínico correspondiente) <br>
                                    2.- Recuerde agendar con al menos 2 días hábiles de anticipación a la fecha del retiro. <br>
                                    3.- Retire sus medicamentos en ventanilla de Farmacia el día agendado mencionando que desea retirar un medicamento AGENDADO.
                                </div>

                                <div class="pt-3 pb-3">
                                    ¡Muchas Gracias!
                                </div>

                                <div class="row col-sm-8">
                                    Farmacia En Linea <br>
                                    CESFAM Los Álamos
                                </div>

                                <div class="pt-3" style="color:#d93025;">
                                    *Obligatorio
                                </div>

                                </p>
                            </div>
                        </div>
                    </div>


                    <form id="formu" method="post" autocomplete="off" class="pt-2">


                        <div class="card mb-3 shadow">
                            <div class="card-body pb-5">
                                <h2 class="text-left text-dark">RUT <span style="color:#d93025;">*</span> </h2>
                                <div class="row justify-content-between pb-2 pl-3"><small class="form-text text-muted">El RUN tiene que tener el siguiente formato <strong> 16123888K </strong>, donde se aceptaria como: 16.123.888-k (sin puntos y sin el guion) </small></div>
                                <input type="text" id="rutdeagenda" name="RUT" placeholder="Tu respuesta" style="border-top: none;border-left: none;border-right: none;" data-rule="required|minlength-8|maxlength-9" onkeypress="return solorut(event)" />
                            </div>
                        </div>

                        <div class="card mb-3 shadow">
                            <div class="card-body pb-5">
                                <h2 class="text-left text-dark">¿Qué día desea retirar los medicamentos en ventanilla de Farmacia? Recuerde agendar con al menos 2 días de anticipación.<span style="color:#d93025;">*</span> </h2>
                                <input type="text" id="fechadeagenda" name="fechadeagenda" placeholder="Tu respuesta" style="border-top: none;border-left: none;border-right: none;" data-rule="required" data-large-mode="true" data-lang="es" data-large-default="true" data-translate-mode="false" data-format="d/m/Y" data-theme="my-style" />
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <input type="submit" id="btningresaramedicamento" value="Agendar">
                        </div>
                    </form>`);


    // <div class="card mb-3 shadow">
    //     <div class="card-body pb-5">
    //         <h2 class="text-left text-dark">Nombre completo <span style="color:#d93025;">*</span> </h2>
    //         <input type="text" name="NOMBRE" placeholder="Tu respuesta" style="border-top: none;border-left: none;border-right: none;" data-rule="required|name|minlength-12" onkeypress="return sololetras(event)" />
    //     </div>
    // </div>

    // <div class="card mb-3 shadow">
    //     <div class="card-body pb-5">
    //         <h2 class="text-left text-dark">Correo electrónico <span style="color:#d93025;">*</span> </h2>
    //         <input type="text" id="CORREO" name="CORREO" placeholder="Tu respuesta" style="border-top: none;border-left: none;border-right: none;" data-rule="required|email" />
    //     </div>
    // </div>

    // <div class="card mb-3 shadow">
    //     <div class="card-body pb-5">
    //         <h2 class="text-left text-dark">Telefonos de contacto <span style="color:#d93025;"></span> </h2>
    //         <input type="text" id="TELEFONO" name="TELEFONO" placeholder="Tu respuesta" style="border-top: none;border-left: none;border-right: none;" data-rule="required|phone|minlength-9" onkeypress="return solotelefono(event)" />
    //     </div>
    // </div>

    // let au= fechaDeHaceDosDias.toLocaleDateString('en-GB');
    // console.log("fecha restada: "+au);
    //Tuve que importar el moment.min.js de la carpeta js del proyecto, para formatear a mes,dia y año el resultado final, porque el dateDropper usa el default con ese parámetro

    // let mesdiaano = moment(fechaDeHaceDosDias).format('MM/DD/YYYY');
    // $('.agregarinputdate').html('<input type="text" id="FECHASOLICITUD" name="FECHASOLICITUD" placeholder="Tu respuesta" style="border-top: none;border-left: none;border-right: none;" data-rule="required" data-large-mode="true" data-lang="es" data-large-default="true" data-default-date="' + mesdiaano + '" data-translate-mode="false" data-format="d/m/Y" data-theme="my-style" />');

    $('#fechadeagenda').dateDropper({
        format: 'dd-mm-yyyy'
    });

    new Validator(document.querySelector('#formu'), function (err, res) {
        // console.log("REEES:  "+err);
        // console.log("REEES2:  "+res);

        if (res) {

            var rutdeagenda = $("#rutdeagenda").val();
            let fechadeagenda = $("#fechadeagenda").val();
            let hoy = new Date(); //toLocaleString
            let diasasumar = 1000 * 60 * 60 * 24 * 2; //el último es el dia, en este caso resto dos dias a la fecha actual
            let suma = hoy.getTime() + diasasumar;
            let fechaDosDiasDespues = new Date(suma);
            fechaDosDiasDespues = fechaDosDiasDespues.toLocaleDateString('en-GB');
            let date1 = new Date(fechadeagenda);
            let date2 = new Date(fechaDosDiasDespues);
            let datehoy = new Date(hoy.toLocaleDateString('en-GB'));
            let tiempodehoy = datehoy.getTime();
            let tiempoinput = date1.getTime();
            let tiempodosdiasdespues = date2.getTime();

            if (validavacioynulo([rutdeagenda])) {
                alertify.set('notifier', 'position', 'top-left');
                alertify.warning("Campo R.U.T vacío.");
            } else if (validavacioynulo([fechadeagenda])) {
                alertify.set('notifier', 'position', 'top-left');
                alertify.warning("Campo Fecha vacío");
            } else if (tiempodehoy == tiempoinput) {
                alertify.warning("La fecha no puede ser menor o igual a la actual, fecha mínima: " + fechaDosDiasDespues);
            } else {

                // alertify.success("akJLSKjas");
                $.post('agenda/acceso.php', {
                    rutagenda: rutdeagenda,
                    fechadeagenda: fechadeagenda,
                    fechaDosDiasDespues: fechaDosDiasDespues,
                    seleccionar: 1
                }, function (respuesta) {
                    console.log("RESPUESTA: " + respuesta);
                    if (respuesta == 1) {
                        alertify.error("¡Campos vacios!");
                    } else if (respuesta == 2) {
                        alertify.error("Fecha inválida debe ser mínimo: " + fechaDosDiasDespues);
                    } else if (respuesta == 3 || respuesta == 4 || respuesta == 6) {
                        alertify.error("Ocurrio un problema, si persiste, por favor contacte a soporte.");
                    } else if (respuesta == 4) {
                        alertify.error("Parámetros no recibidos");
                    } else if (respuesta == 5) {
                        alertify.error("Ya tiene una fecha agendada en el mes");
                    } else if (respuesta == 7) {
                        alertify.set('notifier', 'position', 'top-left');
                        alertify.success("¡Hora agendada recibida!");

                        $.post('agenda/acceso.php', { seleccionar: 2, rutdelpaciente: rutdeagenda }, (respuesta) => {
                            console.log(respuesta);
                            let recibo_correo = respuesta;
                            if (recibo_correo == 1) {
                                alertify.error("Campos vacios");
                                console.log("Campo del POST VACIOS");
                            } else if (recibo_correo == 3) {
                                alertify.error("No se ha enviado parámetros");
                            } else {
                                $.post('../Notificaciones/RetiroMedicamento/', { correo: recibo_correo, fechadeagenda: fechadeagenda }, function (responses) {
                                    console.log("Respuesta notificacion retiro medicamento: " + responses);
                                    if (responses == 1) {
                                        console.log("Reunión agendada y notificaciones enviadas");
                                    } else if (responses == 2) {
                                        console.log("No se han recibido parámetros");
                                    }
                                });
                            }
                        });

                        limpiarFormulario();

                    } else if (respuesta == 8) {
                        alertify.error("El R.U.T ingresado no se encuentra registrado, por favor, contacte a farmacia.");
                    } else if (respuesta == 9 || respuesta == 10 || respuesta == 11) {
                        alertify.error("¡Parámetros no recibidos!");
                    }
                }).fail(function () {
                    alertify.error("Ocurrio un Error Inesperado, Por favor contacte a soporte.", "error")
                });
            }
        } else {
            return res;
        }


    });


    function limpiarFormulario() {
        let fechaactual = new Date().toLocaleDateString('en-GB'); //toLocaleString
        $("#fechadeagenda").val(fechaactual);
        $("#rutdeagenda").val('');
    }

    // $("#formu").on('submit', function (event) {
    //     form = $("#formu");
    //     event.preventDefault();

    //     alertify.success("juanito");

    //     // let hoy = new Date(); //toLocaleString
    //     // let diasarestar = 1000 * 60 * 60 * 24 * 2; //el último es el dia, en este caso resto dos dias a la fecha actual
    //     // let resta = hoy.getTime() - diasarestar;
    //     // let fechaDeHaceDosDias = new Date(resta);
    //     //let hola= fechaDeHaceDosDias.toLocaleDateString('en-GB');

    // });

    // $("#content").css({
    //     "backgroundColor": "#e9f3f9"
    // });

});

$('#tarjeta2').on('click', function () {
    // alertify.success("asasasa");
    $('#contenedor2').removeAttr('hidden');

    $('#contenedor2').html(`
        <div class="card rounded shadow-sm  fadeInDown">
            <div class="card-body text-center card-img-top p-4">
                <img src="./head/seguimiento.png" alt="" class="mb-1 img-thumbnail mx-auto border-0" style="max-height:160px;">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h2>SEGUIMIENTO DE LA SOLICITUD DE MEDICAMENTO</h2>
                            <form id="buscarmedicamento" action="estado/" method="POST" autocomplete="off">
                                <input type="text" class="form-control fadeIn second text-center" placeholder="código de la solicitud o número de seguimiento Ej:301350023 " id="codigo" name="codigo" minlength="8" maxlength="10" onkeypress="return solonumeros(event)" onpaste="return false" autofocus required>
                                <div class="pb-2"></div>
                                <button type="submit" class="btn btn-danger col-lg-6 fadeIn second " id="btnbuscarmedicamento">
                                        Ver seguimiento
                                </button>

                            </form>
                    </div>
                </div>
            </div>
        </div>
`);

    $('#codigo').on('keydown', function (ev) { //si en el input se apreta enter se activa el formulario
        if (ev.key === 'Enter') {
            //No salta directo al formulario sino que al hacer click al submit, valida en html primero, luego js
            $('#btnbuscarmedicamento').trigger("click");
        }
    });
});

$('#tarjeta3').on('click', function () {
    // alertify.success("asasasa");
    $('#contenedor2').removeAttr('hidden');
    $('#contenedor2').html(`
            <div class="fadeInDown">
                <div class="card shadow-sm rounded pb-2">
                    <div class="row">
                        <label class="btn btn-danger col-3 text-center" style="border-radius: 5px 20px 20px 5px;height:55px"><i class="fas fa-pills" style="font-size:25px"></i></label>
                            <div class="col-lg-12 text-center pt-2 p-4">
                                <h2 style="font-size: 30px;">Mi cuenta Farmacia en linea</h2>
                                <form id="ingresomedicamento" autocomplete="off" class="pt-4">
                                    <input type="text" class="form-control col-sm-6 fadeIn second text-center" placeholder="Ingrese su rut" id="rut" name="rut" minlength="8" maxlength="9" onkeypress="return solorut(event)" onpaste="return false" autofocus required>
                                    <div class="row justify-content-center pb-4"><small class="form-text text-muted">Rut sin puntos ni guión </small></div>
                                    <input type="submit" class="fadeIn second" id="btningresaramedicamento" value="Ingresar">
                                </form>
                            </div>
                    </div>

                    <div class="py-3"></div>
                </div>
            </div>
       `);

    $('#rut').on('keydown', function (ev) { //si se presiona enter en el último input se activa el formulario
        if (ev.key === 'Enter') {
            $('#btningresaramedicamento').trigger("click");
        }
    });

    $("#ingresomedicamento").on('submit', function (event) { //AQUI QUEDE AMIGO FELIPE
        event.preventDefault();
        form = $("#ingresomedicamento");
        let rutrecibido = $("#rut").val();

        if (validavacioynulo([rutrecibido])) {
            swalfire("¡Campo rut vacio!", "info");
        } else if (rutrecibido.length < 8 || rutrecibido.length > 9) {
            swalfire("Tamaño del Rut inválido, \nmínimo: 8 y máximo: 9 caracteres", "info");
        } else {
            // console.log("Rut: " + rutrecibido);
            $.post('acceso.php', {
                rut: rutrecibido
            }, function (respuesta) {
                // console.log(respuesta);
                if (respuesta == 1) {
                    swalfire("¡Campo rut vacio", "error");
                } else if (respuesta == 2) {
                    swalfire("¡No se pudo informar el usuario, contacte a soporte!", "error");
                } else if (respuesta == 3) {
                    window.setTimeout(function () {
                        location.href = 'agregar/';
                    }, 1000);
                } else if (respuesta == 4) {
                    swalfire("No esta registrado, verifique datos o contacte a soporte", "error");
                }
            });
        }
    });


    function swalfire(titulo, icono) {
        let color;
        if (icono == "success") {
            color = "#1d7d4d";
        } else if (icono == "error") {
            color = "#dd3333";
        } else if (icono == "info") {
            color = "#17a2b8";
        }
        Swal.fire({
            // title: titulo,
            icon: icono,
            // inputLabel: titulo,
            title: titulo,
            showCloseButton: false,
            showCancelButton: true,
            showConfirmButton: false,
            showDenyButton: false,
            focusConfirm: false,
            width: '470px',
            // confirmButtonText: 'OK',
            // denyButtonText: 'Continuar',
            cancelButtonText: 'Esta bien 👍', //Ya toma el color gris por defecto
            //confirmButtonColor: "#dd3333", 
            cancelButtonColor: color //1d7d4d 

        });
    }

    // $("#content").css({
    //     "backgroundColor": "#e9f3f9"
    // });
});