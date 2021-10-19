function agregarpatologia() {

    form = $("#formRegistrarPatologia");

    let nombrepatologia = $('#nombrepatologia').val();

    if (validavacioynulo([nombrepatologia])) { toastr.info('Campo nombre inválido') }
    else if (nombrepatologia.length < 2 || nombrepatologia.length > 50) { toastr.info('Tamaño del campo nombre, <br> mínimo: 2 y máximo: 50 caracteres'); }
    else if (/^[0-9\s]+$/.test(nombrepatologia)) { toastr.info('El campo nombre de la patología no puede contener sólo números');}
    else if (!/^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ\s]+$/.test(nombrepatologia)) { toastr.info('El campo nombre de la patología puede contener sólo números y letras');}
    else {
        $.post('funciones/acceso.php', { Npatologia: nombrepatologia, seleccionar: 2 }, function (respuesta) {
            // console.log("INGRESAR DEL SWAL: " + respuesta);
            if (respuesta == 1) {
                swalfire("¡Campo vacio!", "error");
            } else if (respuesta == 2) {
                swalfire("¡Existe una patología con el mismo nombre", "error");
            } else if (respuesta == 3) {
                swalfire("¡Hubo un error al ingresar la patología", "error");
            } else if (respuesta == 4) {
                swalfire("¡Patología Ingresada!", "success");
                tablapatologia.ajax.reload(null, false);
                form[0].reset();
                llenarselectpatologias();
            } else if (respuesta == 5) {
                swalfire("¡Parámetros no recibidos!", "success");
            }
        }).fail(function () {
            swalfire("Ocurrio un Error Inesperado", "error")
        });
    }
}


function editarpatologia(IDpatologia, Nombrepatologia) {

    Swal.fire({
        title: 'Editar Patología',
        //icon: 'info',
        showClass: { //para esta animación del modal integre un css llamado animate.min.css
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
        html: `
<div class="row justify-content-center pt-3">
<div class="col-lg-12">
    <div class="form-group">
        <label id="labelparaswal">Nombre</label>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa fa-etsy" aria-hidden="true" style="width: 13px;"></i></span>
            <input type="text" class="form-control" id="Enombrepatologia" name="Enombrepatologia"  minlength="2" maxlength="50" placeholder="Nombre de la patología" value="`+ Nombrepatologia + `" onkeypress="return sololetrasynumeros(event)" onpaste="return false" required>
        </div>
    </div>
</div>
</div>`,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: "#17a2b8",
        cancelButtonColor: "#858796",
        width: '500px',

        preConfirm: () => {
            let Enombrepatologia = $('#Enombrepatologia').val();

            if (validavacioynulo([IDpatologia, Enombrepatologia])) { Swal.showValidationMessage('Campo nombre inválido') }
            else if (Enombrepatologia.length < 2 || Enombrepatologia.length > 50) { Swal.showValidationMessage('Tamaño del campo nombre, <br> mínimo: 2 y máximo: 50 caracteres'); }
            else if (/^[0-9\s]+$/.test(Enombrepatologia)) { Swal.showValidationMessage('El campo nombre de la patología no puede contener sólo números');}
            else if (!/^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ\s]+$/.test(Enombrepatologia)) { Swal.showValidationMessage('El campo nombre de la patología puede contener sólo números y letras');}
            else {
                $.post('funciones/acceso.php', { IDpatologia: IDpatologia, Enombrepatologia: Enombrepatologia, seleccionar: 3 }, function (respuesta) {
                    // console.log("EDITAR DEL SWAL: " + respuesta);
                    if (respuesta == 1) {
                        swalfire("¡Campo vacio!", "error");
                    } else if (respuesta == 2) {
                        swalfire("¡Hubo un error al editar la patología", "error");
                    } else if (respuesta == 3) {
                        swalfire("¡Patología Editada!", "success");
                        tablapatologia.ajax.reload(null, false);
                        llenarselectpatologias();
                    } else if (respuesta == 4) {
                        swalfire("¡Parámetros no recibidos!", "success");
                    }
                }).fail(function () {
                    swalfire("Ocurrio un Error Inesperado", "error")
                });
            }

        }
    });
}

function eliminarpatologia(idpatologia) {
    Swal.fire({
        title: '¿Desea eliminar la patología?',
        //icon: 'info',
        showClass: { //para esta animación del modal integre un css llamado animate.min.css
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Si, confirmo',
        cancelButtonText: 'No, cancelar',
        confirmButtonColor: "#17a2b8",
        cancelButtonColor: "#858796",
        width: '550px',

        preConfirm: () => {

            if (validavacioynulo([idpatologia])) { Swal.showValidationMessage('¡Ha ocurrido un error al eliminar la patología!') }
            else {
                $.post('funciones/acceso.php', { IDPatologia: parseInt(idpatologia), seleccionar: 4 }, function (respuesta) {
                    console.log("ELIMINAR DEL SWAL: " + respuesta);
                    if (respuesta == 1) {
                        swalfire("¡Campo vacio!", "error");
                    } else if (respuesta == 2) {
                        swalfire("¡Esta categoria esta vinculada a un paciente, por lo tanto, no se puede eliminar", "error");
                    } else if (respuesta == 3) {
                        swalfire("¡Hubo un error al eliminar la patología", "error");
                    } else if (respuesta == 4) {
                        swalfire("¡Patología Eliminada!", "success");
                        tablapatologia.ajax.reload(null, false);
                        llenarselectpatologias();
                    } else if (respuesta == 5) {
                        swalfire("¡Parámetros no recibidos!", "success");
                    }
                }).fail(function () {
                    swalfire("Ocurrio un Error Inesperado", "error")
                });
            }
        }
    });
}



function agregarpaciente() {

    form = $("#formRegistrarPaciente");

    let nombres = $('#nombrespaciente').val();
    let apellidos = $('#apellidospaciente').val();
    let direccion = $('#direccionpaciente').val();
    let telefono = $('#telefonopaciente').val();
    let correo = $('#correopaciente').val();
    let rutpaciente = $('#rutpaciente').val();
    let tipodepatologia = $('#tipodepatologia').val();
    let edad = $('#edadpaciente').val();
    let sexo = $('#sexopaciente').val();


    let hoy = new Date();
    let añoactual = hoy.getFullYear();
    let añoedad = edad.split("-");

    // console.log("Edad recibida: " + añoedad[0] +
    // "\nAño actual2: " + añoactual+
    // "\nResto: " + (añoactual-añoedad[0]));

    // console.log("Nombres: " + nombres +
    // "\nApellidos " + apellidos +
    // "\nDirección: " + direccion +
    // "\nTeléfono: " + telefono +
    // "\nCorreo: " + correo +
    // "\nR.U.T: " + rutpaciente +
    // "\nPatologia: " + tipodepatologia +
    // "\nEdad: " + edad
    // "\nSexo: " + sexo);

    if (validavacioynulo([nombres])) { toastr.info('Campo nombre vacio'); }
    else if (validavacioynulo([apellidos])) { toastr.info('Campo apellidos vacio'); }
    else if (validavacioynulo([direccion])) { toastr.info('Campo dirección vacio'); }
    else if (!/^[0-9\s]+$/.test(telefono)) { toastr.info('Campo telefono debe contener sólo números'); }
    else if (telefono.length<9 || telefono.length>9) { toastr.info('logitud del campo teléfono inválida. (Se requieren 9 dígitos numéricos)'); }
    else if (validavacioynulo([telefono])) { toastr.info('Campo teléfono vacio'); }
    else if (parseInt(telefono) < 922222222) { toastr.info('Campo teléfono debe ser superior o igual a 922222222'); }
    else if (validavacioynulo([correo])) { toastr.info('Campo correo vacio'); }
    else if (validavacioynulo([rutpaciente])) { toastr.info('Campo rut vacio'); }
    else if (validavacioynulo([edad])) { toastr.info('Campo edad vacio'); }
    else if (añoedad[0] >= añoactual) { toastr.info('Campo edad inválido'); }
    else if ((añoactual - añoedad[0]) < 65) { toastr.info('Campo edad inválido, recuerde que el minimo es 65 años'); }
    else if (validavacioynulo([tipodepatologia])) { toastr.info('no ha seleccionado patología'); }
    else if (validavacioynulo([sexo])) { toastr.info('Seleccione el sexo'); }
    else {
        $.post('funciones/acceso.php', {
            nombres: nombres,
            apellidos: apellidos,
            direccion: direccion,
            telefono: telefono,
            correo: correo,
            rutpaciente: rutpaciente,
            tipodepatologia: tipodepatologia,
            edad: edad,
            sexo: sexo,
            seleccionar: 7
        }, function (respuesta) {
            console.log("INGRESAR PACIENTE: " + respuesta);
            if (respuesta == 1) {
                toastr.info("¡Campos vacios!");
            } else if (respuesta == 2) {
                toastr.info("¡Hubo un error al ingresar el paciente");
            } else if (respuesta == 3) {
                swalfire("¡Paciente Ingresado!", "success");
                tablapacientes.ajax.reload(null, false);
                form[0].reset();
            } else if (respuesta == 4) {
                toastr.info("¡Parámetros no recibidos!", "error");
            } else if (respuesta == 5) {
                toastr.info("Ya existe un paciente asociado");
            }
        }).fail(function () {
            swalfire("Ocurrio un Error Inesperado", "error")
        });
    }
}


function editarpaciente(idpatologia, rutpaciente, nombrepaciente, apellidospaciente, direccionpaciente, telefonopaciente, correopaciente, edadpaciente, sexopaciente) {

    let hoy = new Date();
    let añoactual = hoy.getFullYear();
    let añominimo = añoactual - 120;
    let mesactual = (hoy.getMonth() + 1).toString().padStart(2, "0");
    let diaactual = hoy.getDate().toString().padStart(2, "0");
    let fecha_minima = añominimo + '-' + mesactual + '-' + diaactual;



    Swal.fire({
        title: 'Editar Paciente',
        //icon: 'info',
        showClass: { //para esta animación del modal integre un css llamado animate.min.css
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
        html: `
        <div class="row justify-content-center pt-3">
        <div class="col-lg-6">
            <div class="form-group">
                <label id="labelparaswal">Nombres</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true" style="width: 13px;"></i></span>
                    <input type="text" class="form-control" id="nombrespacienteEditar" placeholder="Ingrese Nombres" minlength="2" maxlength="100" value="`+ nombrepaciente + `" onkeypress="return sololetras(event)" onpaste="return false" required>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="form-group">
                <label id="labelparaswal">Apellidos</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true" style="width: 13px;"></i></span>
                    <input type="text" class="form-control" id="apellidospacienteEditar" placeholder="Ingrese Apellidos" minlength="2" maxlength="100" value="`+ apellidospaciente + `" onkeypress="return sololetrasycomillasimple(event)" onpaste="return false" required>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="form-group">
                <label id="labelparaswal">Dirección</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-compass" aria-hidden="true" style="width: 13px;"></i></span>
                    <input type="text" class="form-control" id="direccionpacienteEditar" placeholder="Ingrese Dirección" minlength="2" maxlength="100" value="`+ direccionpaciente + `" onkeypress="return solodireccion(event)" onpaste="return false" required>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="form-group">
                <label id="labelparaswal">Teléfono (+56)</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true" style="width: 13px;"></i></span>
                    <input type="number" class="form-control" id="telefonopacienteEditar" placeholder="Ingrese Teléfono" min="922222222" oninput="if(this.value.length>=9) { this.value = this.value.slice(0,9);}" pattern="[0-9]+" value="`+ telefonopaciente + `" onkeypress="return solonumeros(event)" onpaste="return false" required>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="form-group">
                <label id="labelparaswal">Correo</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true" style="width: 13px;"></i></span>
                    <input type="email" class="form-control" id="correopacienteEditar" placeholder="Ingrese Correo" minlength="11" maxlength="70" value="`+ correopaciente + `" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" onkeypress="return solocorreo(event)" onpaste="return false" required>
                </div>
            </div>
        </div>
    

        <div class="col-lg-6" hidden>
            <div class="form-group">
                <label id="labelparaswal">Rut</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true" style="width: 13px;"></i></span>
                    <input type="text" class="form-control" id="rutpacienteEditar" placeholder="Ingrese Rut" value="`+ rutpaciente + `" onkeypress="return solorut(event)" minlength="8" maxlength="11" onpaste="return false" required>
                </div>
            </div>
        </div>


    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="form-group">
                <label id="labelparaswal">Fecha de nacimiento</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-birthday-cake" aria-hidden="true" style="width: 13px;"></i></span>
                        <input type="date" class="form-control" id="edadpacienteEditar" placeholder="Ingrese fecha de nacimiento" value="`+ edadpaciente + `" onkeypress="return fechausuarios(event)" minlength="10" maxlength="10" min="` + fecha_minima + `" max="` + edadpaciente + `" onpaste="return false" required>
                    </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="form-group">
                <label id="labelparaswal" class="col-form-label">Sexo:</label>
                <select class="form-control" id="sexorecibidopaciente" required>
                <option value="">Seleccione el sexo</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="form-group">
                <label id="labelparaswal" class="col-form-label">Tipo de Patología:</label>
                <select class="form-control" id="tipodepatologiaEditar" required>
                <option value="">Seleccione un tipo de patologia</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
            <input type="text" class="form-control" id="valordeldisabledseleccionado" hidden/>
            </div>
        </div>
    </div>
    `,
        didOpen: function () {
            $('#sexorecibidopaciente option[value="' + sexopaciente + '"]').prop('selected', true);
            // $("#sexopaciente select").val(""+sexopaciente).change();
        },
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: "#17a2b8",
        cancelButtonColor: "#858796",
        width: '600px',
        preConfirm: () => {

            let nombres = $('#nombrespacienteEditar').val();
            let apellidos = $('#apellidospacienteEditar').val();
            let direccion = $('#direccionpacienteEditar').val();
            let telefono = $('#telefonopacienteEditar').val();
            let correo = $('#correopacienteEditar').val();
            // let rutpacienteeditar = $('#rutpacienteEditar').val();
            let tipodepatologia = $('#tipodepatologiaEditar').val();
            let valordeldisabledseleccionado = $('#valordeldisabledseleccionado').val();
            let edad = $('#edadpacienteEditar').val();
            let sexorecibidopaciente = $('#sexorecibidopaciente').val();



            // console.log("sexo: " + sexorecibidopaciente);

            let hoy = new Date();
            let añoactual = hoy.getFullYear();
            let añoedad = edad.split("-");
            let anopredefinida = añoactual - 65;

            let resto = parseInt(añoactual) - parseInt(añoedad[0]);


            // console.log("tipodepatologia: " + tipodepatologia+"valordeldisabledseleccionado: " + valordeldisabledseleccionado);


            // console.log(" añoactual: " + añoactual + " Año edad: " + añoedad[0] + " Año predefinido: " + anopredefinida+ " Resto: " + resto);

            // resto < 65 -> Ej: año actual= 2021, año edad=1957, resto= 64 y el minimo es 65, asi que valida.
            //resto > anopredefinida -> Ej: año actual= 2021, año edad=0001, resto= 2020, anopredefinida= (2021-65= 1956), entonces 2020 > 1956, no debe ser un año mayor al predefindo, asi que valida.
            //añoedad[0] > anopredefinida ->Ej: año actual= 2021, año edad=1957, anopredefinida= (2021-65= 1956), entonces 2022 > 1956, asi que valida.
            // resto > 65 -> Ej: año actual= 2021, año edad=1900, resto= 121 y el máximo es 120 años, asi que valida.
 

            if (validavacioynulo([nombres])) { Swal.showValidationMessage('campo nombres vacio'); }
            else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ /s]*$/.test(nombres)) { Swal.showValidationMessage('campo nombres inválido'); } // debe contener sólo letras
            else if (validavacioynulo([apellidos])) { Swal.showValidationMessage('campo apellidos vacio'); }
            else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ' /s]*$/.test(apellidos)) { Swal.showValidationMessage('campo apellidos inválido'); } //debe contener sólo letras y comilla simple
            else if (validavacioynulo([direccion])) { Swal.showValidationMessage('campo dirección vacio'); }
            else if (!/^[0-9\s]+$/.test(telefono)) { Swal.showValidationMessage('campo telefono debe contener sólo números'); }
            else if (telefono.length<9 || telefono.length>9) { Swal.showValidationMessage('logitud del campo teléfono inválida. (Se requieren 9 dígitos numéricos)'); }
            else if (validavacioynulo([telefono])) { Swal.showValidationMessage('campo teléfono vacio'); }
            else if (parseInt(telefono) < 922222222) { Swal.showValidationMessage('campo teléfono debe ser superior o igual a 922222222'); }
            else if (validavacioynulo([correo])) { Swal.showValidationMessage('campo correo vacio'); }
            else if (validavacioynulo([rutpaciente])) { Swal.showValidationMessage('campo rut vacio'); }
            // else if (validavacioynulo([rutpacienteeditar])) { Swal.showValidationMessage('campo rut vacio'); }
            else if (validavacioynulo([edad])) { Swal.showValidationMessage('Campo fecha nacimiento vacio'); }
            else if ((resto < 65 || resto > 120) || resto > anopredefinida || añoedad[0] > anopredefinida) { Swal.showValidationMessage('campo fecha nacimiento inválido, el mínimo es 65 y el máximo 120 años. <br> Año máximo predefinido: ' + anopredefinida); }
            else if (validavacioynulo([tipodepatologia]) && (idpatologia == valordeldisabledseleccionado)) { Swal.showValidationMessage('Esta patología se encuentra inactiva'); }
            else if (validavacioynulo([tipodepatologia])) { Swal.showValidationMessage('No ha seleccionado patología'); }
            else if (validavacioynulo([sexorecibidopaciente]) || !sexorecibidopaciente) { Swal.showValidationMessage('no ha seleccionado un sexo'); }
            else {
                // alertify.success("saasa");
                //antes iba rutpacienteeditar por rutpaciente
                // y en ajax tenia esto agregado rutpacienteeditar: rutpacienteeditar,

                $.post('funciones/acceso.php', {
                    nombres: nombres,
                    apellidos: apellidos,
                    direccion: direccion,
                    telefono: telefono,
                    correo: correo,
                    rutpacienteDatatable: rutpaciente,
                    tipodepatologia: tipodepatologia,
                    edad: edad,
                    sexo: sexorecibidopaciente,
                    seleccionar: 8
                }, function (respuesta) {
                    //console.log("EDITAR PACIENTE: " + respuesta);
                    if (respuesta == 1) {
                        toastr.error("¡Campos vacios!");
                    }
                    // else if (respuesta == 2) {
                    //     toastr.error("Existe un paciente con ese R.U.T");
                    // } 
                    else if (respuesta == 2) {
                        toastr.error("Hubo un error al editar el paciente");
                    } else if (respuesta == 3) {
                        toastr.success("¡Paciente Editado!");
                        tablapacientes.ajax.reload(null, false);
                    } else if (respuesta == 4) {
                        toastr.error("¡Parámetros no recibidos!");
                    }
                }).fail(function () {
                    toastr.error("Ocurrio un Error Inesperado")
                });
            }
        }
    });

    $('#tipodepatologiaEditar').on('change', function () {
        var valorselect = $(this).val();
        $('#valordeldisabledseleccionado').val(valorselect);
    });


    // console.log("ID PATOLOGIA: "+idpatologia);
    // llenarselecteditarpaciente(1);
}

function eliminarpaciente(rut) {
    let descripcion = '';
    $.post('funciones/acceso.php', { rutpaciente: rut, seleccionar: 13 }, function (respuesta) {
        console.log("CONSULTA SI TIENE SOLICITUDES DE AGENDA O MEDICAMENTOS: " + respuesta);
        if (respuesta == 1) {
            toastr.info("¡Campo vacio!");
        } else if (respuesta == 2) {
            descripcion = 'Este paciente tiene solicitudes de agenda de retiro y solicitudes de medicamentos. Si desea confirmar, se borrarán también las solicitudes.';
        } else if (respuesta == 3) {
            descripcion = 'Este paciente tiene solicitudes de medicamentos. Si desea confirmar, se borrarán también la(s) solicitud(es).';
        } else if (respuesta == 4) {
            descripcion = 'Este paciente tiene solicitudes de agenda de medicamentos. Si desea confirmar, se borrará(n) también la(s) solicitud(es).';
        } else if (respuesta == 5) {
            descripcion = 'No tiene solicitudes de agenda ni de medicamentos.';
        }

        Swal.fire({
            title: '¿Desea eliminar el paciente?',
            //icon: 'info',
            html: '<small>'+descripcion+'</small>',
            showClass: { //para esta animación del modal integre un css llamado animate.min.css
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Si, confirmo',
            cancelButtonText: 'No, cancelar',
            confirmButtonColor: "#17a2b8",
            cancelButtonColor: "#858796",
            width: '550px',
            preConfirm: () => {
                if (validavacioynulo([rut])) { Swal.showValidationMessage('¡Rut vacío al eliminar el paciente!') }
                else {
                    $.post('funciones/acceso.php', { rutpaciente: rut, seleccionar: 9 }, function (respuesta) {
                        //console.log("ELIMINAR PACIENTE: " + respuesta);
                        if (respuesta == 1) {
                            swalfire("¡Campo vacio!", "error");
                        } else if (respuesta == 2) {
                            swalfire("¡Hubo un error al eliminar la paciente", "error");
                        } else if (respuesta == 3) {
                            swalfire("¡Paciente Eliminado!", "success");
                            tablapacientes.ajax.reload(null, false);
                        } else if (respuesta == 4) {
                            swalfire("¡Parámetros no recibidos!", "success");
                        }
                    }).fail(function () {
                        swalfire("Ocurrio un Error Inesperado", "error")
                    });
                }
            }
        });
    }).fail(function () {
        swalfire("Ocurrio un Error Inesperado", "error")
    });


}

// toastr.success("juann");
function ActivaroInactivarPatologia(IDpatologia, estado) {

    if (estado == 1) {
        if (validavacioynulo([IDpatologia])) { swalfire("¡Campo vacio!", "info"); }
        else {
            $.post('funciones/acceso.php', { IDpatologia: parseInt(IDpatologia), seleccionar: 10 }, function (respuesta) {
                console.log("ACTIVAR DEL SWAL: " + respuesta);
                if (respuesta == 1) {
                    swalfire("¡Campo vacio!", "error");
                } else if (respuesta == 2) {
                    swalfire("¡La patología ya esta activa", "info");
                } else if (respuesta == 3) {
                    swalfire("¡Hubo un error al activar la patología, Por favor contacte a soporte.", "error");
                } else if (respuesta == 4) {
                    swalfire("¡Patología Activada!", "success");
                    llenarselectpatologias();
                    tablapatologia.ajax.reload(null, false);
                } else if (respuesta == 5) {
                    swalfire("¡Parámetros no recibidos!", "success");
                }
            }).fail(function () {
                swalfire("Ocurrio un Error Inesperado", "error")
            });
        }
    } else if (estado == 2) {
        if (validavacioynulo([IDpatologia])) { swalfire("¡Campo vacio!", "info"); }
        else {
            $.post('funciones/acceso.php', { IDpatologia: parseInt(IDpatologia), seleccionar: 11 }, function (respuesta) {
                console.log("INACTIVAR DEL SWAL: " + respuesta);
                if (respuesta == 1) {
                    swalfire("¡Campo vacio!", "error");
                } else if (respuesta == 2) {
                    swalfire("¡La patología ya esta Inactiva", "info");
                } else if (respuesta == 3) {
                    swalfire("¡Hubo un error al Inactivar la patología, Por favor contacte a soporte.", "error");
                } else if (respuesta == 4) {
                    swalfire("¡Patología Inactivada!", "success");
                    tablapatologia.ajax.reload(null, false);
                    llenarselectpatologias();
                } else if (respuesta == 5) {
                    swalfire("¡Parámetros no recibidos!", "success");
                }
            }).fail(function () {
                swalfire("Ocurrio un Error Inesperado", "error")
            });
        }
    }
}


function llenarselectpatologias() {
    $.post('funciones/acceso.php', { seleccionar: 6 }, function (respuesta) {
        //  console.log("RESPP: " + respuesta);
        $('#tipodepatologia').html(respuesta);
    }).fail(function () {
        swalfire("No se pudo cargar la categoria de material", "error")
    });
}

// function llenarselecteditarpaciente(idpatologia) {
//     $.post('funciones/acceso.php', { seleccionar: 6 }, function (respuesta) {
//         console.log("RESPP: " + respuesta);
//         $('#tipodepatologiaEditar').html(respuesta);
//         $('#tipodepatologiaEditar option[value="' + idpatologia + '"]').prop('selected', true);
//     }).fail(function () {
//         swalfire("No se pudo cargar la categoria de material", "error")
//     });
// }


function llenarselecteditarpaciente(idpatologia) {
    $.post('funciones/acceso.php', { seleccionar: 12 }, function (respuesta) {
        console.log("RESPP: " + respuesta);
        $('#tipodepatologiaEditar').html(respuesta);
        $('#tipodepatologiaEditar option[value="' + idpatologia + '"]').prop('selected', true);


        // var obtenerlosselectdisabled = $('#tipodepatologiaEditar option[disabled]').map(function(i,v) {
        //     return this.value;
        // }).get();

        var obtenerlosselectSeleccionadodisabled = $('#tipodepatologiaEditar option[disabled]:selected').map(function (i, v) {
            return this.value;
        }).get();

        // console.log("TODOS LOS SELECT DISABLED: "+obtenerlosselectdisabled); 

        console.log("SELECT DISABLED SELECCIONADOS: " + obtenerlosselectSeleccionadodisabled);
        $('#valordeldisabledseleccionado').val(obtenerlosselectSeleccionadodisabled);

        $('option:disabled').css({
            color: '#495057',
            opacity: '1',
            backgroundColor: '#e9ecef'
        });
    }).fail(function () {
        swalfire("No se pudo cargar la categoria de material", "error")
    });
}