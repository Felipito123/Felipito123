

function subirpermiso() {

    form = $("#formRegistrarPermisoFeriadoLegal");

    let rut = $('#rut').val();
    let nombrecompleto = $('#nombrecompleto').val();
    let cargo = $('#cargo').val();
    let ano_permiso = $('#ano_permiso').val();
    let numero_dia = $('#numero_dia').val();
    let fechapermiso = $('#fecha_permiso').val();
    let firma = $('#archivo_firma').val();
    let reemplazante = $('#rut_reemplazante').val();

    let varaño = fechapermiso.split("-");

    console.log("R.U.T: " + rut +
        "\nNombres y apellidos " + nombrecompleto +
        "\nCargo: " + cargo +
        "\nAño permiso: " + ano_permiso +
        "\nNúmero de dias: " + numero_dia +
        "\nFecha permiso: " + fechapermiso +
        "\nFirma: " + firma +
        "\nReemplazante: " + reemplazante +
        "\n¿Existe firma?: " + existefirma);


    if (validavacioynulo([rut])) { toastr.error('Campo R.U.T vacio'); return; }
    else if (validavacioynulo([nombrecompleto])) { toastr.error('Campo Nombres y apellidos, vacio'); return; }
    else if (validavacioynulo([cargo])) { toastr.error('Campo cargo, vacio'); return; }
    else if (validavacioynulo([ano_permiso])) { toastr.error('Campo "Correspondiente al año", vacio'); return; }
    else if (validavacioynulo([numero_dia])) { toastr.error('Campo "Número de dias", vacio'); return; }
    else if (validavacioynulo([fechapermiso])) { toastr.error('Campo fecha, vacio'); return; }
    else if (validavacioynulo([reemplazante])) { toastr.error('Campo reemplazante, vacio'); return; }
    else if (varaño[0] < (anoactual-3)) {
        toastr.error('El año debe ser mínimo 3 años anteriores al actual'); return;
    }else if (varaño[0] > anoactual) {
        toastr.error('El año no debe ser de años futuros'); return;
    }else if (existefirma == 'no' && validavacioynulo([firma])) {
        $('#divfirma').show();
        $('#archivo_firma').prop('required', true);
        toastr.error('No tiene firmas registradas, porfavor ingrese una. \n En caso de haberla registrado, refresque la página.');
        return;
    } else {

        // toastr.info("PASE POR AQUI");

        var formData = new FormData(form[0]); //form[0]
        formData.append('seleccionar', '1');
        formData.append('existefirma', existefirma);

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
                toastr.error('Campos vacios', 'UpS!');
            } else if (respuesta == 2) {
                toastr.error('Revise la fecha, no puede ser menor al año actual', 'UpS!');
            } else if (respuesta == 3) {
                toastr.error('Ingrese su firma', 'UpS!');
            } else if (respuesta == 4) {
                toastr.error('Tamaño de la imagen de la firma excede los 20MB', 'UpS!');
            } else if (respuesta == 5) {
                toastr.error('Formato de imagen inválido', 'UpS!');
            } else if (respuesta == 6) {
                toastr.error('¡Ha ocurrido un error al ingresar la firma!', 'UpS!');
            } else if (respuesta == 7) {
                toastr.error('¡Ha ocurrido un error al registrar el permiso!', 'UpS!');
            } else if (respuesta == 8) {
                toastr.error('¡Ha ocurrido un error inesperado, por favor, contacte a soporte!', 'UpS!');
            } else if (respuesta == 9) {
                toastr.error('¡Ha ocurrido un error inesperado, por favor, contacte a soporte!', 'UpS!');
            } else if (respuesta == 10 || respuesta == 11) {
                toastr.success('¡Permiso registrado!', '¡Correcto!');
                $('#divfirma').hide();
                $('#archivo_firma').prop('required', false);
                LimpiarAlgunosInputsformulario();
                LlenarSeguimiento();
            } else if (respuesta == 12) {
                toastr.error('¡No se han recibido parámetros!', 'UpS!');
            }
        }).fail(function (res) {
            // swalfire("Ocurrio un Error Inesperado", "error");
            console.log(res);
        });
    }
}

function LlenarSeguimiento() {
    $.post('funciones/acceso.php', {
        seleccionar: 2
    }, function (respuesta) {
        console.log("SELECT SEGUIMIENTO: " + respuesta);
        // if (respuesta == 3) {
        //     $('#divNoHaySolicitudes').show();
        //     $('#divSiHaySolicitudes').hide();
        // }else {
        //     $('#divNoHaySolicitudes').hide();
        //     $('#divSiHaySolicitudes').show();
        //     $('#buscarpermiso').html(respuesta);
        // }
        if (respuesta == 1) {
            toastr.error("Ha ocurrido un error, al cargar los datos");
        } else if (respuesta == 0) {
            $('#divNoHaySolicitudes').show();
            $('#divSiHaySolicitudes').hide();
        } else {
            $('#divNoHaySolicitudes').hide();
            $('#divSiHaySolicitudes').show();
            $('#buscarpermiso').html(respuesta);
        }
    }).fail(function () {
        swalfire("No se pudo cargar", "error")
    });
}

function LimpiarAlgunosInputsformulario() {
    $("#tipo_degoce").val("").change();
    $("#tipo_dia").val("").change();
    $("#rut_reemplazante").val("").change();
    $("#motivo").val("");
    $('#fecha_permiso').val(datestring);
    $('#archivo_firma').val('');
}

$('#buscarpermiso').on('change', function () { //cambio del select del registro
    let IDpermiso = $(this).val();

    if (IDpermiso == '') {
        $('#divgeneralseguimiento').hide();
        $('#imagenydescripcion').show();
    } else {
        $('#divgeneralseguimiento').show();
        // alertify.success(IDpermiso);
        $.post('funciones/acceso.php', { seleccionar: 3, IDpermiso: IDpermiso }, function (respuesta) {
            // console.log("RESP: " + respuesta);
            if (respuesta == 1) {
                toastr.error('No se ha recibido parametros', 'UpS!');
            } else if (respuesta == 2) {
                toastr.error('Ha ocurrido un error, por favor, contacte a soporte', 'UpS!');
            } else {
                console.log(respuesta);
                $('#imagenydescripcion').hide();
                $('#contenidoseguimiento').html(respuesta);
            }
        }).fail(function () { swalfire("No se pudo cargar el selector", "error") });
    }
});