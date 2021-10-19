function ColorDelBagdeSegunFecha(fecharecibidainicio) {
    let inicio = fecharecibidainicio.split(" "); //separo la fecha de la hora
    let fechaI = inicio[0].split("-"); //porciono la fecha para dar nuevo formato mes/dia/año
    let fechainicio = parseInt(fechaI[1]) + '/' + fechaI[2] + '/' + fechaI[0];

    const fechaactual = new Date();
    const añoActual = fechaactual.getFullYear();
    const mesActual = fechaactual.getMonth() + 1;
    const diaActual = fechaactual.getDate();

    let fechafin = mesActual + '/' + diaActual + '/' + añoActual;

    const date1 = new Date(fechainicio);
    const date2 = new Date(fechafin);
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));


    let res = '';

    if (diffDays >= 0 && diffDays <= 7) {
        res += 'bg-green, Reciente';
    } else if (diffDays > 7 && diffDays <= 14) {
        res += 'bg-blue, ' + diffDays + ' dias';
    } else if (diffDays > 14 && diffDays <= 21) {
        res += 'bg-amber, ' + diffDays + ' dias';
    } else if (diffDays > 21 && diffDays <= 31) {
        res += 'bg-blush, ' + diffDays + ' dias';
    } else if (diffDays > 31 && diffDays <= 90) {
        res += 'bg-red, ' + diffDays + ' dias';
    } else {
        res += 'bg-black, Más de 3 meses';
    }
    // console.log(res);
    return res;

}

function CalcularDiasEntreFechaInicioYdiaActual(fecharecibidainicio) {
    let inicio = fecharecibidainicio.split(" "); //separo la fecha de la hora
    let fechaI = inicio[0].split("-"); //porciono la fecha para dar nuevo formato mes/dia/año
    let fechainicio = parseInt(fechaI[1]) + '/' + fechaI[2] + '/' + fechaI[0];

    const fechaactual = new Date();
    const añoActual = fechaactual.getFullYear();
    const mesActual = fechaactual.getMonth() + 1;
    const diaActual = fechaactual.getDate();

    let fechafin = mesActual + '/' + diaActual + '/' + añoActual;

    const date1 = new Date(fechainicio);
    const date2 = new Date(fechafin);
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    // console.log(res);
    return diffDays;

}



function cambioselect(valor) {
    LlenarDatos('', valor);
}


function LlenadoSelect() {
    $.post('funciones/acceso.php', {
        seleccionar: 1
    }, function (respuesta) {
        console.log("RESP: " + respuesta);

        // console.log("PASE POR LLENADO DE SELECT");
        // toastr.error(respuesta);

        $('#columna1').removeAttr('hidden');
        $('#columna2').removeAttr('hidden');

        /*Si hay datos en las solicitudes y además los roles son 12 o 13 
        (Encargado(a) de personal o Jefe Sistema de Salud se remueve el hidden, 
        esto es para que se vea el div o tabla de datos) */


        if (rol == 12 || rol == 13) { //Uso el hidden en vez de hide() de jquery porque el html carga más rápido y no se nota el cambio
            $('#divcertificados').removeAttr('hidden');
            tablaferiadolegal.ajax.reload(null, false);
        } else {
            $("#divcertificados").attr("hidden", true);
        }

        if (respuesta == 1 || respuesta == 2) { //No hay datos
            $('#columna1').html('<div class="alert alert-danger text-center" role="alert"> Estimado(a) : No hay solicitudes de feriado legal para mostrar</div>');
            $('#columna2').html('<div class="alert alert-danger text-center" role="alert"> Estimado(a) : No hay solicitudes de feriado legal para mostrar</div>');
            // $("#divcertificados").attr("hidden",true);// $('#divcertificados').hide();
        } else {

            // toastr.error("Rol:" +rol);

            let res = JSON.parse(respuesta);

            /*=================================================PAGINADOR========================================*/
            largodearray = res.length;
            artxpaginas = parseInt(largodearray / maximo);

            if (artxpaginas == 0) { //en caso de que el maximo sea mayor al largo del array el artxpaginas va a dar cero
                artxpaginas = 1;
                maximo = largodearray;
            }
            // console.log("artxpaginas: " + artxpaginas);
            /*=================================================PAGINADOR========================================*/

            /*=================================================LLENA SELECT========================================*/
            let llenarselect = '';
            for (let i = 1; i <= artxpaginas; i++) {

                if ((maximo * i) == largodearray) {
                    llenarselect += '<option value="' + (maximo * i) + '">Página: ' + i + ' - todos</option>';
                } else {
                    llenarselect += '<option value="' + (maximo * i) + '">Página: ' + i + ' - ' + (maximo * i) + ' registro(s)</option>';
                }

                if ((maximo * i) < largodearray && i == artxpaginas) {
                    //en caso de que la cantidad de registros final (maximo * i) sea menor que el maximo de registros del json (largodearray)
                    //muestro un siguiente option, porque me quedarian datos que mostrar
                    llenarselect += '<option value="' + (largodearray) + '">Página: ' + (i + 1) + ' - todos</option>';
                }
            }

            $('#paginador').html(llenarselect);
            /*=================================================LLENA SELECT========================================*/
        }
    });
}


function LlenarDatos(searchField, numeropaginas) {

    $.post('funciones/acceso.php', {
        seleccionar: 1
    }, function (respuesta) {
        // console.log("RESP: " + respuesta);

        /*Si hay datos en las solicitudes y además los roles son 12 o 13 
(Encargado(a) de personal o Jefe Sistema de Salud se remueve el hidden, 
esto es para que se vea el div o tabla de datos) */

        if (rol == 12 || rol == 13) { //Uso el hidden en vez de hide() de jquery porque el html carga más rápido y no se nota el cambio
            // $('#divcertificados').show();
            $('#divcertificados').removeAttr('hidden');
            tablaferiadolegal.ajax.reload(null, false);
        } else {
            $("#divcertificados").attr("hidden", true);
        }

        // console.log("PASE POR LLENADO DE DATOS");
        if (respuesta == 1 || respuesta == 2) { //No hay datos

            $('#columna1').html('<div class="alert alert-danger text-center" role="alert"> Estimado(a) : No hay solicitudes de feriado legal para mostrar</div>');
            $('#columna2').html('<div class="alert alert-danger text-center" role="alert"> Estimado(a) : No hay solicitudes de feriado legal para mostrar</div>');
            // toastr.error("Vacio");
            // $("#divcertificados").attr("hidden",true);// $('#divcertificados').hide();
        } else {

            let mesesabreviados = {
                '01': 'Enero',
                '02': 'Febrero',
                '03': 'Marzo',
                '04': 'Abril',
                '05': 'Mayo',
                '06': 'Junio',
                '07': 'Julio',
                '08': 'Agosto',
                '09': 'Septiembre',
                '10': 'Octubre',
                '11': 'Noviembre',
                '12': 'Diciembre'
            };

            let res = JSON.parse(respuesta);

            if (searchField === '') { //si esta vacio lo que quiero buscar con el filtrador tomo el valor que está seleccionado en el select
                numeropaginas = $('#paginador').val();
            }
            var regex = new RegExp(searchField, "i");
            var output = '';
            // console.log("NOMBRE COMUNA: "+ res[0].NOMBRE_COMUNA);

            $.each(res, function (i, val) {
                let fecha_solicitud_y_marcador = ColorDelBagdeSegunFecha(val.FECHA_SOLICITUD).split(',');
                let porciones_fecha_solicitud = val.FECHA_SOLICITUD.split('-');
                let porciones_fecha_permiso = val.FECHA_PERMISO.split('-');
                let marcador = '';

                if (i < numeropaginas) {
                    if ((val.NOMBRE_SOLICITANTE.search(regex) != -1) || (val.RUT_SOLICITANTE.search(regex) != -1) || (val.NOMBRE_REEMPLAZANTE.search(regex) != -1)) {

                        if (fecha_solicitud_y_marcador[0] == 'bg-green') {
                            marcador = 'unread';
                        }
                        output += `
                    <li class="list-group-item ` + marcador + `">
                        <div class="media">
                            <div class="pull-left">
                                <div class="controls">
                                    <div class="btn-group">
                                        <button class="btn btn_verdeOscuro btn-sm" onclick="aprobar('` + val.ID_SFL + ',' + val.ID_PLF + `')" title="Aprobar solicitud"><i class="fas fa-check" style="width: 15px;"></i></button>
                                        <button class="btn btn-danger btn-sm" onclick="rechazar('` + val.ID_SFL + ',' + val.ID_PLF + `')" title="Rechazar solicitud"><i class="fas fa-times" style="width: 15px;"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                        <a href="javascript:void(0);" class="pr-2" >` + val.NOMBRE_SOLICITANTE + `</a>
                                        <span class="badge ` + fecha_solicitud_y_marcador[0] + `">` + fecha_solicitud_y_marcador[1] + `</span>
                                        <small class="float-right text-muted">` + mesesabreviados[porciones_fecha_solicitud[1]] + `  ` + porciones_fecha_solicitud[2] + `, ` + porciones_fecha_solicitud[0] + ` </small>
                                </div>

                                <small>Dia Permiso: ` + porciones_fecha_permiso[2] + ` de ` + mesesabreviados[porciones_fecha_permiso[1]] + `, ` + porciones_fecha_permiso[0] + ` </small> <br>
                                <small> Reemplazo:  ` + val.NOMBRE_REEMPLAZANTE + ` </small> <br>
                            </div>

                        </div>  
                    </li>`;

                    }


                }
            });
            if (validavacioynulo([output])) {
                LlenarDatos('', maximo); //mostrar datos en caso de que no se hallan recargado bien los datos
                // $('#contenidodelalista').html('<div class="container row justify-content-center"><div class="alert alert-info text-center justify-content-center col-6" role="alert">fUFUFU</div></div>');
            } else {
                $('#contenidodelalista').html(output);
            }
        }
    });
}

