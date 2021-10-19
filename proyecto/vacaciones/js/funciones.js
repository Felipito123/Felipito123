function generainformemensual() {
    let ano = $('#seleccionanoreporte').val();
    let mes = $('#seleccionmesreporte').val();
    //console.log("Año: " + ano + "\nMes: " + mes);
    if (ano === undefined || mes === undefined) { Swal.showValidationMessage('¡UpS! , al parecer no hay datos para consultar.'); } //en caso de que habilite el disabled en html y pueda guardar no estan definidas las variables
    else if (validavacioynulo([mes])) { Swal.showValidationMessage('¡Campo mes, está vacio!'); }
    else if (validavacioynulo([ano])) { Swal.showValidationMessage('¡Campo año, está vacio!'); }
    else if (mes.length < 1 || mes.length > 2) { Swal.showValidationMessage('Tamaño del mes inválido'); }
    else if (ano.length < 4 || ano.length > 4) { Swal.showValidationMessage('Tamaño del año inválido'); }
    // else if (ano < 2020 || ano > 2999) { Swal.showValidationMessage('El año, no puede ser menor a 2020'); }
    // else if (ano > 2999) { Swal.showValidationMessage('El año, no puede ser mayor a 2999'); }
    else {
        $.post('funciones/acceso.php', {
            seleccionar: 6,
            subselect: 3,
            ano: ano,
            mes: mes
        }, function (respuesta) {
            console.log("RESP INFORME: " + respuesta);
            if (respuesta == 1) {
                swalfire("¡Campos vacios, compruebe datos!", "error");
            } else if (respuesta == 2) {
                swalfire("¡No hay datos para el mes y año seleccionado", "error");
            } else if (respuesta == 3) {
                swalfire("Reporte generado correctamente, por favor, dirigirse a la carpeta de descargas de su Laptop", "success");
            } else if (respuesta == 4 || respuesta == 444) {
                swalfire("¡No se han recibido parámetros", "error");
            }
            // var jsonNuevo = JSON.parse(respuesta);
            // for (let i = 0; i < jsonNuevo.length; i++) {
            //     console.log(jsonNuevo[i]);
            // }
        }).fail(function () {
            swalfire("¡UPS! \n Ocurrió un Error Inesperado", "error")
        });
    }
}

function generainformesemestral() {
    let SemestreReporteSemestral = $('#seleccionsemestrereporte').val();
    let AnoReporteSemestral = $('#seleccionanosemestralreporte').val();
    // console.log("Semestre: " + SemestreReporteSemestral + "\nAno: " + AnoReporteSemestral);
    if (SemestreReporteSemestral === undefined || AnoReporteSemestral === undefined) { Swal.showValidationMessage('¡UpS! , al parecer no hay datos para consultar.'); } //en caso de que habilite el disabled en html y pueda guardar no estan definidas las variables
    else if (validavacioynulo([SemestreReporteSemestral])) { Swal.showValidationMessage('¡Seleccione el campo semestre!'); }
    else if (validavacioynulo([AnoReporteSemestral])) { Swal.showValidationMessage('¡Seleccione el campo año!'); }
    else if (SemestreReporteSemestral.length < 1 || SemestreReporteSemestral.length > 1) { Swal.showValidationMessage('Tamaño del semestre inválido'); }
    else if (AnoReporteSemestral.length < 4 || AnoReporteSemestral.length > 4) { Swal.showValidationMessage('Tamaño del año inválido'); }
    else {
        $.post('funciones/acceso.php', {
            seleccionar: 6,
            subselect: 5,
            semestre: SemestreReporteSemestral,
            ano: AnoReporteSemestral
        }, function (respuesta) {
            //console.log("RESP INFORME SEMESTRAL: " + respuesta);
            if (respuesta == 1) {
                swalfire("¡Campos vacios, compruebe datos!", "error");
            } else if (respuesta == 2) {
                swalfire("¡No hay datos para el semestre y año seleccionado", "error");
            } else if (respuesta == 3) {
                swalfire("Reporte semestral generado correctamente, por favor, dirigirse a la carpeta de descargas de su Laptop", "success");
            } else if (respuesta == 4 || respuesta == 444) {
                swalfire("¡No se han recibido parámetros", "error");
            }
        }).fail(function () {
            swalfire("¡UPS! \n Ocurrió un Error Inesperado", "error")
        });
    }
}

function llenaMesSelector(){
    $.post('funciones/acceso.php', { seleccionar: 6, subselect: 1 }, function (respuesta) {
        //console.log("RESP1: " + respuesta);
        if (respuesta == 1) {
            $('#selectuno').html('<div class="alert alert-danger" role="alert">¡UpS! Al parecer no hay meses registrados.<br> Por favor, Contacte a Soporte.</div>');
            $('#selectdos').html('<div class="alert alert-danger" role="alert">¡UpS! Al parecer no hay años registrados.<br> Por favor, Contacte a Soporte.</div>');
            $(".swal2-confirm").attr('disabled', 'disabled');
        } else {
            $('#seleccionmesreporte').html(respuesta);
        }
    }).fail(function () { swalfire("No se pudo cargar el selector", "error") });
}


function OcultaSelectores(){
    $('#selectorgeneral2').hide(); //oculto por defecto el segundo select, el semestral
    document.getElementById('ckeckeasemestralomensual').onchange = function () { //DETECTO EL CAMBIO DEL CHECKBOX
        if (this.checked) {
            $('#ckeckeasemestralomensual').val('2');
            $('#selectorgeneral1').hide();//Se oculta el Mensual, se puede usar fadeOut() para el desvanecimiento
            $('#selectorgeneral2').show();//Se muestra el Semestral, se puede usar fadeIn() para el desvanecimiento
            $('#nombredelreporte').text('Semestral');//ckeckeasemestralomensual
        }
        else {
            $('#ckeckeasemestralomensual').val('1');
            $('#selectorgeneral2').hide();//Se oculta el Semestral, se puede usar fadeOut() para el desvanecimiento
            $('#selectorgeneral1').show();//Se muestra el Mensual, se puede usar fadeIn() para el desvanecimiento
            $('#nombredelreporte').text('Mensual');
        }
    }
}


function DetectaCambiosSelectores(){
    //================DETECTA EL CAMBIO DEL SELECTOR MENSUAL Y DE ACUERDO AL MES SE CONSULTA EL AÑO=================//
    $('#seleccionmesreporte').on('change', function () {
        var mes = $(this).val();
        // console.log("SELECC: " + mes);
        if (mes) {
            $.post('funciones/acceso.php', { seleccionar: 6, subselect: 2, messeleccionado: mes }, function (respuesta) {
                // console.log("RESP2: " + respuesta);
                if (respuesta == 1) {
                    $('#selectdos').html('<div class="alert alert-danger" role="alert">¡UpS! Al parecer no hay años registrados.</div>');
                } else if (respuesta == 2) {
                    $('#selectdos').html('<div class="alert alert-danger" role="alert">¡UpS! No se ha recibido parámetros. Contacte a Soporte.</div>');
                } else {
                    $('#seleccionanoreporte').html(respuesta);
                }
            }).fail(function () { swalfire("No se pudo cargar el selector", "error") });
        } else {
            $('#seleccionanoreporte').html('<option value="">Seleccione un mes primero...</option>');
        }
    });

    //================DETECTA EL CAMBIO DEL SELECTOR SEMESTRAL Y DE ACUERDO AL SEMESTRE SE CONSULTA EL AÑO=================//
    $('#seleccionsemestrereporte').on('change', function () {
        var semestre = $(this).val();
        // console.log("SELECC SEMESTRE: " + mes);
        if (semestre) {
            $.post('funciones/acceso.php', { seleccionar: 6, subselect: 4, semestreseleccionado: semestre }, function (respuesta) {
                // console.log("RESP SEMESTRE: " + respuesta);
                if (respuesta == 1) {
                    $('#selecttres').html('<div class="alert alert-danger" role="alert">¡UpS! Al parecer no hay semestres registrados.</div>');
                } else if (respuesta == 2) {
                    $('#selecttres').html('<div class="alert alert-danger" role="alert">¡UpS! No se ha recibido parámetros. Contacte a Soporte.</div>');
                } else {
                    $('#seleccionanosemestralreporte').html(respuesta);
                }
            }).fail(function () { swalfire("No se pudo cargar el selector", "error") });
        } else {
            $('#seleccionanosemestralreporte').html('<option value="">Seleccione un semestre primero...</option>');
        }
    });
}