$(document).ready(function () {
    $.post('funciones/acceso.php', { seleccionar: 8 }, function (respuesta) {
        let jsonresp, contador;
        jsonresp = JSON.parse(respuesta);
        contador = jsonresp.length;

        // console.log("LLENAR PANEL 2: " + respuesta);
        // console.log("LARGO DEL ARRAY: " + contador);

        //LLENADO DEL SEGUNDO PANEL VIDEOCONFERENCIAS, MI CUENTA, CALIDAD Y EVENTOS
        $('#Pvideoconferencias').text(jsonresp[0].total_cantidad_videoconf);
        $('#PDocMicuenta').text(jsonresp[1].total_cantidad_micuenta);
        $('#PDocCalidad').text(jsonresp[2].total_cantidad_calidad);
        $('#PCantEventoCalendario').text(jsonresp[3].total_cantidad_eventos);
    }).fail(function () {
        toastr.info("Ha ocurrido un error al cargar el segundo panel");
    });

    $.post('funciones/acceso.php', { seleccionar: 9 }, function (respuesta) {
        let jsonresp, contador;
        jsonresp = JSON.parse(respuesta);
        contador = jsonresp.length;

        // console.log("LLENAR PANEL 3: " + respuesta);
        // console.log("LARGO DEL ARRAY: " + contador);

        //LLENADO DEL TERCER PANEL VIDEOCONFERENCIAS, MI CUENTA, CALIDAD Y EVENTOS
        $('#Pcantpacientes').text(jsonresp[0].total_cantidad_pacientes);
        $('#PcantPacMujeres').text(jsonresp[1].total_cantidad_pacientes_hom);
        $('#PcantPacHombres').text(jsonresp[2].total_cantidad_pacientes_muj);
        $('#PCantSolicitudesDeMedicamentos').text(jsonresp[3].total_cantidad_sol_medicamentos);
        $('#PCantAgendaRetiroDeMedicamentos').text(jsonresp[4].total_cantidad_agenda_retiro_med);
    }).fail(function () {
        toastr.info("Ha ocurrido un error al cargar el segundo panel");
    });

    $.post('funciones/acceso.php', { seleccionar: 14 }, function (respuesta) {
        let jsonresp, contador;
        jsonresp = JSON.parse(respuesta);
        contador = jsonresp.length;

        // console.log("PROBAR DATOS: " + respuesta);
        // console.log("LARGO DEL ARRAY: " + contador);

        //LLENADO DEL TERCER PANEL TOTAL DE PERMISOS, TOTAL PERMISO ESPECIAL, TOTAL PERMISO ADMINISTRATIVO, TOTAL FERIADO LEGAL
        $('#Pcant_total_de_perm').text(jsonresp[0].total_cantidad_permisos);
        $('#Pcant_perm_espec').text(jsonresp[1].total_cantidad_perm_esp);
        $('#Pcant_perm_adminis').text(jsonresp[2].total_cantidad_perm_admin);
        $('#Pcant_perm_feriado_legal').text(jsonresp[3].total_cantidad_perm_ferlegl);
    }).fail(function () {
        console.log("Ha ocurrido un error al cargar el segundo panel");
    });

    $.post('funciones/acceso.php', { seleccionar: 28 }, function (respuesta) {
        let jsonresp, contador;
        jsonresp = JSON.parse(respuesta);
        contador = jsonresp.length;

        // console.log("PROBAR DATOS: " + respuesta);
        // console.log("LARGO DEL ARRAY: " + contador);

        //LLENADO DEL PANEL DE LIBRO DE R.S.F (RECLAMOS, SUGERENCIAS Y FELICITACIONES)
        $('#PCantTotSolLibroRSF').text(jsonresp[0][0].CANTIDAD_TOTAL_SOLICITUDES);
        $('#PNombreInstMasSolLibroRSF').text(jsonresp[0][1].NOMBRE_INSTITUCION);
        $('#PCantPuebIndgPresCadaSolLibroRSF').text(jsonresp[0][2].CANTIDAD_PUEBLOS_INDIGENAS);
        $('#PCantFuncRespoSolLibroRSF').text(jsonresp[0][3].CANTIDAD_FUNC_RESPONDIDO);
    }).fail(function () {
        console.log("Ha ocurrido un error al cargar el segundo panel");
    });

    $.post('funciones/acceso.php', { seleccionar: 29 }, function (respuesta) {
        let jsonresp, contador;
        jsonresp = JSON.parse(respuesta);
        contador = jsonresp.length;

        // console.log("PROBAR DATOS: " + respuesta);
        // console.log("LARGO DEL ARRAY: " + contador);

        //LLENADO DEL PANEL DE LIBRO DE R.S.F (RECLAMOS, SUGERENCIAS Y FELICITACIONES)
        $('#PMaterialesBodDisponible').text(jsonresp[0][0].MATDISPONIBLES);
        $('#PMaterialesBodEntregados').text(jsonresp[0][1].MATENTREGADOS);
        $('#PMaterialesBodDefectuosos').text(jsonresp[0][2].MATDEFECTUOSOS);
        $('#PMaterialesBodPerdidos').text(jsonresp[0][3].MATPERDIDOS);
    }).fail(function () {
        console.log("Ha ocurrido un error al cargar el segundo panel");
    });


    $.post('funciones/acceso.php', { seleccionar: 35 }, function (respuesta) {
        let jsonresp, contador;
        jsonresp = JSON.parse(respuesta);
        contador = jsonresp.length;

        // console.log("PROBAR DATOS: " + respuesta);
        // console.log("LARGO DEL ARRAY: " + contador);

        //LLENADO DEL PANEL DE SOPORTE TÉCNICO
        $('#PAN_SOL_DE_AYUDA').text(jsonresp[0][0].SOLCITUDESDEAYUDA);
        $('#PAN_NAV_MAS_UTILIZADO').text(jsonresp[0][1].NAVMASUTILIZADO);
        $('#PAN_SIS_OP').text(jsonresp[0][3].SISTOPMASFRECUENTE);
        $('#PAN_MSJ_RESPONDIDOS_SPT').text(jsonresp[0][5].MENSJRESPONDIDOS);

        let totalsolicitudes = jsonresp[0][0].SOLCITUDESDEAYUDA;

        if (parseInt(totalsolicitudes) == 0) {
            $('#barra_progreso_sistemaoperativo').css('width', redondearDecimales(40, 2) + "%");
            $('#barra_progreso_nav_frecuentes').css('width', redondearDecimales(40, 2) + "%");
            $('#barra_progreso_msjrespondidos').css('width', redondearDecimales(40, 2) + "%");
            $('#barra_progreso_sistemaoperativo').text("No hay solicitudes");
            $('#barra_progreso_nav_frecuentes').text("No hay solicitudes");
            $('#barra_progreso_msjrespondidos').text("No hay solicitudes");
        } else {

            let porc_bar_SO_mas_frec = (parseInt(jsonresp[0][4].CANTSISTOPMASFRECUENTE) / totalsolicitudes * 100);
            let porc_bar_NAV_mas_util = (parseInt(jsonresp[0][2].CANTNAVMASUTILIZADO) / totalsolicitudes * 100);
            let porc_bar_CANT_SOL = (parseInt(jsonresp[0][5].MENSJRESPONDIDOS) / totalsolicitudes * 100);
            $('#barra_progreso_sistemaoperativo').css('width', redondearDecimales(porc_bar_SO_mas_frec, 2) + "%");
            $('#barra_progreso_nav_frecuentes').css('width', redondearDecimales(porc_bar_NAV_mas_util, 2) + "%");
            $('#barra_progreso_msjrespondidos').css('width', redondearDecimales(porc_bar_CANT_SOL, 2) + "%");
            $('#barra_progreso_sistemaoperativo').text(redondearDecimales(porc_bar_SO_mas_frec, 2) + "%");
            $('#barra_progreso_nav_frecuentes').text(redondearDecimales(porc_bar_NAV_mas_util, 2) + "%");
            $('#barra_progreso_msjrespondidos').text(redondearDecimales(porc_bar_CANT_SOL, 2) + "%");

            // barra_progreso_sistemaoperativo
            // barra_progreso_nav_frecuentes
            // barra_progreso_msjrespondidos
        }

    }).fail(function () {
        console.log("Ha ocurrido un error al cargar el segundo panel");
    });


    $.post('funciones/acceso.php', { seleccionar: 37 }, function (respuesta) {
        let jsonresp, contador;
        jsonresp = JSON.parse(respuesta);
        contador = jsonresp.length;

        // console.log("PROBAR DATOS: " + respuesta);
        // console.log("LARGO DEL ARRAY: " + contador);

        //LLENADO DEL PANEL DE SOPORTE TÉCNICO
        let VALORFINAL = jsonresp[0].CONTADORMESACTUAL;
        let VALORANTERIOR = jsonresp[1].CONTADORMESANTERIOR;
        let Porcentaje_crecimiento = 0;

        // console.log("VALORFINAL : " + VALORFINAL);
        // console.log("VALORANTERIOR : " + VALORANTERIOR);

        if (parseInt(contador) == 0) {
            $('#barra_progreso_PortjeCrecimiento').css('width', redondearDecimales(40, 2) + "%");
            $('#barra_progreso_PortjeCrecimiento').text("No hay solicitudes");
        } else {
            Porcentaje_crecimiento = ((VALORFINAL - VALORANTERIOR) / VALORANTERIOR);

            if (VALORFINAL == VALORANTERIOR) {
                $('#barra_progreso_PortjeCrecimiento').css('background-color', '#ffe0e6');
                $('#barra_progreso_PortjeCrecimiento').css('width', redondearDecimales(100, 2) + "%");
                $('#barra_progreso_PortjeCrecimiento').text(redondearDecimales(Porcentaje_crecimiento, 2) + "%");
            } else if (Porcentaje_crecimiento < 0) {
                $('#barra_progreso_PortjeCrecimiento').css('background-color', '#f59595');
                $('#barra_progreso_PortjeCrecimiento').css('width', redondearDecimales(100, 2) + "%");
                $('#barra_progreso_PortjeCrecimiento').text(redondearDecimales(Porcentaje_crecimiento, 2) + "%");
            } else if (Porcentaje_crecimiento > 0 && Porcentaje_crecimiento < 1) {
                $('#barra_progreso_PortjeCrecimiento').css('width', redondearDecimales(16, 2) + "%");
                $('#barra_progreso_PortjeCrecimiento').text(redondearDecimales(Porcentaje_crecimiento, 2) + "%");
            }  else if (Porcentaje_crecimiento > 1 && Porcentaje_crecimiento <= 9) {
                $('#barra_progreso_PortjeCrecimiento').css('width', redondearDecimales(9, 2) + "%");
                $('#barra_progreso_PortjeCrecimiento').text(redondearDecimales(Porcentaje_crecimiento, 2) + "%");
            }else {
                $('#barra_progreso_PortjeCrecimiento').css('width', redondearDecimales(Porcentaje_crecimiento, 2) + "%");
                $('#barra_progreso_PortjeCrecimiento').text(redondearDecimales(Porcentaje_crecimiento, 2) + "%");
            }

            // console.log("PORCENTAJE CRECIMIENTO : " + Porcentaje_crecimiento);
        }

    }).fail(function () {
        console.log("Ha ocurrido un error al cargar el segundo panel");
    });




});