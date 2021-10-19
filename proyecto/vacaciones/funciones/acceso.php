<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
include '../../funcionesphp/borrarcarpeta.php';


date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");

// session_start();
// $rutsesion = $_SESSION['sesionCESFAM']['rut'];


$seleccion = $_POST['seleccionar'];
if (isset($seleccion)) {

    if ($seleccion == 1) {
        $sql = "SELECT rut,nombre_usuario,fechaentrada_usuario,diasganados_usuario,diasrestantes_usuario FROM usuario WHERE estado_usuario=1"; // WHERE id_rol!=3
        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'RUT_USUARIO' => $fila["rut"],
                'NOMBRE_USUARIO' => $fila["nombre_usuario"],
                'FECHA_ENTRADA' => $fila["fechaentrada_usuario"],
                'DIAS_GANADOS' => $fila["diasganados_usuario"],
                'DIAS_RESTANTES' => $fila["diasrestantes_usuario"]
            );
        }
        // print json_encode($datos);
        // header('Content-type: application/json');
        echo json_encode(toutf8($datos)); //toutf8
        mysqli_close($mysqli);
    } else if ($seleccion == 2) {

        if (isset($_POST['rutabuscar'])) {
            $rutabuscar = $_POST['rutabuscar'];
            $sql = "SELECT va.id_vacaciones,va.rut,va.tipo_vacaciones,va.razon_vacaciones,va.dias_tomados_vacaciones,va.fecha_inicio_vacaciones,va.observacion_vacaciones,us.nombre_usuario FROM vacaciones va, usuario us WHERE va.rut=us.rut and va.rut='$rutabuscar'";
            $consulta = mysqli_query($mysqli, $sql);
            $datos = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos[] = array(
                    'ID_VACACIONES' => $fila["id_vacaciones"],
                    'RUT_USUARIO' => $fila["rut"],
                    'NOMBRE_USUARIO' => $fila["nombre_usuario"],
                    'TIPO_VACACIONES' => $fila["tipo_vacaciones"],
                    'RAZON_VACACIONES' => $fila["razon_vacaciones"],
                    'FECHA_INICIO_VACACIONES' => $fila["fecha_inicio_vacaciones"],
                    'DIAS_TOMADOS_VACACIONES' => $fila["dias_tomados_vacaciones"],
                    'OBSERVACION_VACACIONES' => $fila["observacion_vacaciones"]
                );
            }
        }

        // print json_encode($datos);
        // header('Content-type: application/json');
        echo json_encode(toutf8($datos));
        mysqli_close($mysqli);
    } else if ($seleccion == 3) { // Registrar vacacion

        if (
            isset($_POST['MRRUT']) &&
            isset($_POST['MRNOMUS']) &&
            isset($_POST['MRtipo']) &&
            isset($_POST['MRrazon']) &&
            isset($_POST['MRDiasTomados']) &&
            isset($_POST['MRFechaInicio']) &&
            isset($_POST['MRObservacion'])
        ) {

            $rutusuario = validarut($_POST['MRRUT']);
            $nombreusuario = sololetras($_POST['MRNOMUS']);
            $tipovacacion = sololetras($_POST['MRtipo']);
            $razon = soloCaractDeConversacion($_POST['MRrazon']);
            $diastomados = solonumeros($_POST['MRDiasTomados']);
            $fechavacacion = fechavacacion($_POST['MRFechaInicio']);
            $observacion = soloCaractDeConversacion($_POST['MRObservacion']);

            //==================================================PARA PROBAR PDF================================================//
            // $porciones = explode("-", $fechavacacion);
            // $diamesano = $porciones[2] . '-' . $porciones[1] . '-' . $porciones[0];
            // $sumardias = strtotime($diamesano . '+ ' . $diastomados . " days"); // Incrementando dias
            // $fechafinvacaciones = date("d-m-Y", $sumardias);

            // require '../../funcionesphp/fpdf/fpdf.php';
            // require '../funciones/exportaPDF.php';

            // $pdf = new FPDF();
            // obtienedatos($pdf, '888888888', $nombreusuario,$tipovacacion,$razon,$diamesano, $diastomados, $fechafinvacaciones,'88');

            // if (!is_dir('../certificado_vacaciones/888888888-88'. '/')) { //Si no existe el directorio 
            //     mkdir('../certificado_vacaciones/888888888-88'. '/', 0777, true); //lo crea
            // }

            // $pdf->Output('../certificado_vacaciones/888888888-88' . '/' . 'comprobante.pdf', 'F');
            //==================================================PARA PROBAR PDF================================================//

            if (validavacioenarreglo(array($rutusuario, $tipovacacion, $razon, $diastomados, $fechavacacion, $observacion))) {
                echo 1;
                return;
            } else {

                $sqlvalida1 = mysqli_query($mysqli, "SELECT diasganados_usuario FROM usuario WHERE rut='$rutusuario'");
                $res1 = mysqli_fetch_assoc($sqlvalida1);
                $sqlvalida2 = mysqli_query($mysqli, "SELECT SUM(dias_tomados_vacaciones) as diastomados FROM vacaciones WHERE rut='$rutusuario'");
                $res2 = mysqli_fetch_assoc($sqlvalida2);
                $sqlvalida3 = mysqli_query($mysqli, "SELECT diasrestantes_usuario FROM usuario WHERE rut='$rutusuario'");
                $res3 = mysqli_fetch_assoc($sqlvalida3);

                $validadiasrestantesdisponibles = $res1['diasganados_usuario'] - $res2['diastomados'];

                if ($validadiasrestantesdisponibles == 0) {
                    //Quiere decir que ya ocupo todas las vacaciones
                    echo 2;
                    return;
                } else if ($diastomados > $res3['diasrestantes_usuario']) {
                    // si los dias tomados o los que quiero tomar son mayor a los restantes, excedio el maximo 
                    echo 3;
                    return;
                } else {

                    $sql1 = "INSERT INTO vacaciones (id_vacaciones,
                    rut,
                    tipo_vacaciones,
                    razon_vacaciones,
                    dias_tomados_vacaciones,
                    fecha_inicio_vacaciones,
                    observacion_vacaciones) VALUES (NULL,
                    '$rutusuario',
                    '$tipovacacion',
                    '$razon',
                    '$diastomados',
                    '$fechavacacion',
                    '$observacion')";

                    $resultado_2 = mysqli_query($mysqli, $sql1); //Hasta aqui inserto la vacacion a la base de datos
                    if (!$resultado_2) {
                        echo 4; //Error al insertar la vacacion
                        return;
                        // die("error " . mysqli_error($mysqli));
                    } else {
                        $sql2 = "UPDATE usuario set diasrestantes_usuario=diasrestantes_usuario-'$diastomados' WHERE rut='$rutusuario'";
                        $resultado_3 = mysqli_query($mysqli, $sql2);

                        if (!$resultado_3) {
                            echo 5;
                            return;
                        } else {

                            //=============================================Para el certificado============================//
                            $porciones = explode("-", $fechavacacion);
                            $diamesano = $porciones[2] . '-' . $porciones[1] . '-' . $porciones[0];
                            $sumardias = strtotime($diamesano . '+ ' . $diastomados . " days"); // Incrementando dias
                            $fechafinvacaciones = date("d-m-Y", $sumardias);
                            //=============================================Para el certificado============================//

                            $sql4 = "SELECT id_vacaciones FROM vacaciones ORDER BY id_vacaciones DESC LIMIT 1"; //Muestro el último anexo insertado en la consulta anterior
                            $resultado_4 = mysqli_query($mysqli, $sql4);

                            if (!$resultado_4) {
                                echo 555; //Hubo un error no se pudo mostrar el último id de la vacacion
                                return;
                            } else {
                                $resultado4 = mysqli_fetch_assoc($resultado_4);
                                $IDVACACION = $resultado4["id_vacaciones"];
                                //Encripte el ID de la vacacion de la tabla vacaciones, para después cuando quiera borrar la vacion poder tener ese dato
                                //Y poder borrar la carpeta en archivomicuenta
                                $IDvacacion_encriptada = 1000 + (int)$IDVACACION;
                                $nombredeldocumento = $IDvacacion_encriptada . '.pdf';

                                require '../../funcionesphp/fpdf/fpdf.php';
                                require '../funciones/exportaPDF.php';
                                $pdf = new FPDF();
                                obtienedatos($pdf, $rutusuario, $nombreusuario, $tipovacacion, $razon, $diamesano, $diastomados, $fechafinvacaciones, $IDVACACION);

                                if (!is_dir('../certificado_vacaciones/' . $rutusuario . '-' . $IDVACACION . '/')) { //Si no existe el directorio 
                                    mkdir('../certificado_vacaciones/' . $rutusuario . '-' . $IDVACACION . '/', 0777, true); //lo crea
                                }
                                $pdf->Output('../certificado_vacaciones/' . $rutusuario . '-' . $IDVACACION . '/' . 'certificado.pdf', 'F');
                                $sql5 = "INSERT INTO documentos (id_documentos,
                                rut,
                                descripcion_documentos,
                                archivo_documentos,
                                estado_documentos) VALUES (NULL,
                                '$rutusuario',
                                'Se adjunta el certificado de su vacación.',
                                '$nombredeldocumento',
                                1)";
                                $resultado_5 = mysqli_query($mysqli, $sql5);

                                if (!$resultado_5) {
                                    echo 555; //Hubo un error al insertar el documento, esto para guardarlo automaticamente a la cuenta del funcionario
                                    return;
                                } else {

                                    $sql6 = "SELECT MAX(id_documentos) AS identificador FROM documentos"; //Muestro el último articulo insertado en la consulta anterior
                                    $resultado_6 = mysqli_query($mysqli, $sql6);

                                    if (!$resultado_6) {
                                        echo 555;
                                        return;
                                    } else {
                                        $fila = mysqli_fetch_assoc($resultado_6);
                                        $IDdocumento = $fila["identificador"];

                                        if (!is_dir('../../micuenta/archivomicuenta/' . $IDdocumento . '/')) { //Si no existe el directorio 
                                            mkdir('../../micuenta/archivomicuenta/' . $IDdocumento . '/', 0777, true); //lo crea
                                        }
                                        copy('../certificado_vacaciones/' . $rutusuario . '-' . $IDVACACION . '/' . 'certificado.pdf', '../../micuenta/archivomicuenta/' . $IDdocumento . '/' . $IDvacacion_encriptada . '.pdf');
                                    }
                                }
                            }

                            echo 6; //Se insertó la vacacion correctamente
                            return;
                        }
                    }
                }
            }
        } else {
            echo 7; //No se ha recibido el parametro desde formularios.js
            return;
        }

        mysqli_close($mysqli);
    } else if ($seleccion == 4) { //agregar más días

        if (isset($_POST["MRUT"]) && isset($_POST["MDiasAgregar"]) && isset($_POST["MDiasGanados"]) && isset($_POST["MDiasRestantes"])) {
            $RUT = validarut($_POST["MRUT"]);
            $DiasAgregar = solonumeros($_POST["MDiasAgregar"]);
            $DiasGanadosTotales = solonumeros($_POST["MDiasGanados"]);
            $DiasRestantesTotales = solonumeros($_POST["MDiasRestantes"]);


            if (validavacioenarreglo(array($RUT, $DiasAgregar, $DiasGanadosTotales, $DiasRestantesTotales))) {
                echo 1;
                return;
            } else {
                $sql1 = "SELECT SUM(dias_tomados_vacaciones) as diastomados FROM vacaciones WHERE rut='$RUT'";
                $res1 = mysqli_query($mysqli, $sql1);
                if (!$res1) {
                    echo 2;  //Ha ocurrido un error al registrar al agregar más dias
                    return;
                } else {
                    $fila1 = mysqli_fetch_assoc($res1);

                    if ($DiasGanadosTotales < $fila1['diastomados']) { //Error de concurrencia
                        echo 3;  //Los dias totales ganados del usuario no puede ser menor a la suma de los dias tomados totales en la tabla vacaciones
                        return;
                    } else {
                        if ($DiasAgregar > $DiasRestantesTotales) {
                            echo 4; //No se puede agregar más días de los restantes (dias restante datatable)
                            return;
                        } else {
                            $sql2 = "SELECT diasganados_usuario FROM usuario WHERE rut='$RUT'"; //dias ganados actuales
                            $res2 = mysqli_query($mysqli, $sql2);

                            if (!$res2) {
                                echo 5; //Ha ocurrido un error al registrar al agregar más dias
                                return;
                            } else {
                                $fila2 = mysqli_fetch_assoc($res2);
                                $maximototalrestantediasganados = 60 - $fila2['diasganados_usuario'];

                                if ($DiasAgregar > $maximototalrestantediasganados) {
                                    echo 6; //el dia a agregar no puede ser mayor al maximo total restante de dias ganados
                                    return; //No se puede agregar más días de los restantes (dias restante = 60-diasganados de la base de datos, para corroborar)
                                } else {
                                    $sql3 = "UPDATE usuario SET diasganados_usuario=diasganados_usuario+$DiasAgregar WHERE rut='$RUT'";
                                    $res3 = mysqli_query($mysqli, $sql3);
                                    if (!$res3) {
                                        echo 7; //Ha ocurrido un error al registrar al agregar más dias
                                        return;
                                    } else {
                                        $sql4 = "SELECT diasganados_usuario FROM usuario WHERE rut='$RUT'"; //dias ganados actuales
                                        $res4 = mysqli_query($mysqli, $sql4);
                                        if (!$res4) {
                                            echo 8; //Ha ocurrido un error al registrar al agregar más dias
                                            return;
                                        } else {
                                            $fila4 = mysqli_fetch_assoc($res4);
                                            //Los dias restantes son los dias ganados del usuario menos la suma de los dias tomados de las vacaciones
                                            //en otras palabras, dias restantes(usuario) = dias ganados(usuario)-suma de los dias tomados(vacaciones)
                                            $diasrestantes = $fila4['diasganados_usuario'] - $fila1['diastomados'];
                                            $res5 = mysqli_query($mysqli, "UPDATE usuario SET diasrestantes_usuario='$diasrestantes' WHERE rut='$RUT'");
                                            if (!$res5) {
                                                echo 9; //Ha ocurrido un error al registrar al agregar más dias
                                                return;
                                            } else {
                                                echo 10;
                                                return;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            mysqli_close($mysqli);
        }
    } else if ($seleccion == 5) { //eliminar vacacion y certificado


        if (isset($_POST["IDVACACIONES"]) && isset($_POST["RUTUSUARIO"]) && isset($_POST["DIASTOMADOS"])) {
            $ID_vacacion = solonumeros($_POST["IDVACACIONES"]);
            $RUT_usuario = validarut($_POST["RUTUSUARIO"]);
            $Dias_tomados = solonumeros($_POST["DIASTOMADOS"]);

            //porque yo al registrar la vacacion encripte el nombre del pdf,
            //sumando 1000 a la id de la vacacion y guardando en carpeta /micuenta/archivomicuenta
            $IDVACENCRIPT = (1000 + (int)$ID_vacacion) . '.pdf';

            if (validavacioenarreglo(array($ID_vacacion, $RUT_usuario, $Dias_tomados))) {
                echo 1;
                return;
            } else {
                $sql1 = "DELETE FROM vacaciones WHERE id_vacaciones='$ID_vacacion'";
                $res1 = mysqli_query($mysqli, $sql1);
                if (!$res1) {
                    echo 2;
                    return;
                } else {
                    $sql2 = "UPDATE usuario set diasrestantes_usuario=diasrestantes_usuario+$Dias_tomados WHERE rut='$RUT_usuario'";
                    $res2 = mysqli_query($mysqli, $sql2);
                    if (!$res2) {
                        echo 3;
                        return;
                    } else {
                        //borra el certificado sólo si existe el directorio, en la carpeta certificado_vacaciones//
                        if (is_dir('../certificado_vacaciones/' . $RUT_usuario . '-' . $ID_vacacion . '/')) { //borrara la carpeta solo si existe
                            borrarcarpeta('../certificado_vacaciones/' . $RUT_usuario . '-' . $ID_vacacion . '/');
                        }

                        //Aqui muestro el id del documento (con la id de la vacacion encriptada en el nombre del pdf),
                        // que sera el id de la carpeta en archivomicuenta 
                        $sql3 = "SELECT id_documentos FROM documentos WHERE archivo_documentos='$IDVACENCRIPT'";
                        $res3 = mysqli_query($mysqli, $sql3); //no necesito saber si se verifico o no, porque cabe la posibilidad de que este borrada en la BD pero en directorios

                        if (!$res3) {
                            echo 4;
                            return;
                        } else {
                            if (mysqli_num_rows($res3) > 0) { //Esta validacion es sumo importante cuando voy a usar fetch_assoc 
                                $fila1 = mysqli_fetch_assoc($res3);
                                $iddocumento = $fila1['id_documentos'];
                                //aqui verifico (if ($res4) ) porque estoy eliminando ahora en la BD y necesito borrar también en el directorio, sólo si borre en la BD
                                $sql4 = "DELETE FROM documentos WHERE id_documentos='$iddocumento'";
                                $res4 = mysqli_query($mysqli, $sql4);
                                if ($res4) {
                                    if (is_dir('../../micuenta/archivomicuenta/' . $iddocumento . '/')) { //borrara la carpeta solo si existe
                                        borrarcarpeta('../../micuenta/archivomicuenta/' . $iddocumento . '/');
                                    }
                                }
                                echo 5;
                                return;
                            } else {
                                echo 6;
                                return;
                            }
                        }
                    }
                }
            }
        } else {
            echo 7; //No se recibieron parámetros
            return;
        }

        mysqli_close($mysqli);
    } else if ($seleccion == 6) { //No se que viene aquí
        $subseleccion = solonumeros($_POST['subselect']);
        $ljson = '';

        if ($subseleccion == 1) {
            $sql = "SELECT DISTINCT month(fecha_inicio_vacaciones) as numerodemes FROM vacaciones";
            $consulta = mysqli_query($mysqli, $sql);
            $contar = mysqli_num_rows($consulta);

            if (!$consulta || $contar == 0) {
                echo 1;
                return;
            } else {
                $ljson .= '<option value="">Seleccione mes...</option>';
                while ($fila = mysqli_fetch_array($consulta)) {
                    $mes = $fila['numerodemes'];
                    $nombremes = strftime('%B', mktime(0, 0, 0, number_format($mes)));
                    $ljson .= '<option value="' . $mes . '">' . $nombremes . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                }
            }
            echo $ljson;
            return;
        } else if ($subseleccion == 2) {
            $messeleccionado = solonumeros($_POST['messeleccionado']);

            if (isset($messeleccionado)) {
                $sql2 = "SELECT DISTINCT year(fecha_inicio_vacaciones) as numerodeano FROM vacaciones WHERE month(fecha_inicio_vacaciones) = '$messeleccionado'";
                $consulta2 = mysqli_query($mysqli, $sql2);
                $contar2 = mysqli_num_rows($consulta2);

                if (!$consulta2 || $contar2 == 0) {
                    echo 1;
                    return;
                } else {
                    $ljson .= '<option value="">Seleccione año...</option>';
                    while ($fila2 = mysqli_fetch_array($consulta2)) {
                        $ano = $fila2['numerodeano'];
                        $ljson .= '<option value="' . $ano . '">' . $ano . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                    }
                    echo $ljson;
                    return;
                }
            } else {
                echo 2;
                return;
            }
        } else if ($subseleccion == 3) {

            if (isset($_POST["ano"]) && isset($_POST["mes"])) {
                $ano = solonumeros($_POST["ano"]);
                $mes = solonumeros($_POST["mes"]);

                if (validavacioenarreglo(array($ano, $mes))) {
                    echo 1;
                    return;
                } else {
                    $sql2 = "SELECT va.rut,
                    us.nombre_usuario,
                    va.tipo_vacaciones,
                    va.razon_vacaciones,
                    va.dias_tomados_vacaciones,
                    va.fecha_inicio_vacaciones,
                    va.observacion_vacaciones FROM vacaciones va, usuario us 
                    WHERE va.rut=us.rut and month(fecha_inicio_vacaciones)='$mes' 
                    and year(fecha_inicio_vacaciones)='$ano'";

                    require '../../funcionesphp/fpdf/fpdf.php';
                    $generainformemensual = new FPDF();
                    require '../funciones/exportaInformes.php';
                    obtenerdatosinformemensual($generainformemensual, $ano, $mes);

                    $consulta2 = mysqli_query($mysqli, $sql2);
                    $cantidaddefilasInforme = mysqli_num_rows($consulta2);

                    if (!$consulta2 || $cantidaddefilasInforme == 0) {
                        echo 2;
                        return;
                    } else {
                        // $datos = array();
                        while ($fila2 = mysqli_fetch_array($consulta2)) {

                            $porciones1 = explode("-", $fila2["fecha_inicio_vacaciones"]);
                            $fechainicio = $porciones1[2] . '-' . $porciones1[1] . '-' . $porciones1[0];
                            $nombrefechainicio = $porciones1[2] . ' ' . strftime('%B', mktime(0, 0, 0, number_format($porciones1[1]))) . ' del ' . $porciones1[0];

                            $porciones2 = explode("-", $fila2["fecha_inicio_vacaciones"]);
                            $diamesanofin = $porciones2[2] . '-' . $porciones2[1] . '-' . $porciones2[0];
                            $sumardiasfin = strtotime($diamesanofin . '+ ' . $fila2["dias_tomados_vacaciones"] . " days"); // Incrementando dias
                            $fechafin = date("d-m-Y", $sumardiasfin);
                            $porciones3 = explode("-", $fechafin);
                            $nombrefechafin = $porciones3[0] . ' ' . strftime('%B', mktime(0, 0, 0, number_format($porciones3[1]))) . ' del ' . $porciones3[2];

                            $hoy = date('d-m-Y');
                            $porcion = explode("-", $hoy);
                            $diaactual = $porcion[0];
                            $mesactual = $porcion[1];
                            $anoactual = $porcion[2];
                            $nombredelmesactual = strftime('%B', mktime(0, 0, 0, number_format($mesactual)));

                            $generainformemensual->Cell(18, 5, utf8_decode($fila2['rut']), "LBRT", 0, "L");
                            $generainformemensual->Cell(30, 5, utf8_decode($fila2['nombre_usuario']), "LBRT", 0, "L");
                            $generainformemensual->Cell(15, 5, utf8_decode($fila2['tipo_vacaciones']), "LBRT", 0, "L");
                            $generainformemensual->Cell(45, 5, $fila2['razon_vacaciones'], "LBRT", 0, "L");
                            $generainformemensual->Cell(10, 5, utf8_decode($fila2['dias_tomados_vacaciones']), "LBRT", 0, "C");
                            $generainformemensual->Cell(39, 5, utf8_decode($nombrefechainicio), "LBRT", 0, "L");
                            $generainformemensual->Cell(39, 5, utf8_decode($nombrefechafin), "LBRT", 0, "L");

                            $generainformemensual->Ln(5);

                            // $datos[] = array(
                            //     'RUT_USUARIO' => $fila2["rut"],
                            //     'NOMBRE_USUARIO' => $fila2["nombre_usuario"],
                            //     'TIPO_VACACION' => $fila2["tipo_vacaciones"],
                            //     'RAZON_VACACION' => $fila2["razon_vacaciones"],
                            //     'DIAS_TOMADOS' => $fila2["dias_tomados_vacaciones"],
                            //     'INICIO_VACACION' => $fechainicio,
                            //     'OBSERVACION' => $fila2["observacion_vacaciones"],
                            //     'FIN_VACACION' => $fechafin,
                            //     'NOMBRE_FECHA_INICIO' => $nombrefechainicio,
                            //     'NOMBRE_FECHA_FIN' => $nombrefechafin
                            // );
                        }
                        $generainformemensual->Ln(10);
                        $generainformemensual->SetFont('Arial', '', 7);
                        $generainformemensual->MultiCell(150, 8, utf8_decode("Los Álamos Chile, " . $diaactual . ' de ' . $nombredelmesactual . ' del ' . $anoactual . "."));

                        // if (!is_dir('../informesmensuales/' . $mes . '-' . $ano . '/')) { //Si no existe el directorio 
                        //     mkdir('../informesmensuales/' . $mes . '-' . $ano . '/', 0777, true); //lo crea
                        // }
                        // $generainformemensual->Output('../informesmensuales/' . $mes . '-' . $ano . '/' . 'informe-' . $mes . '-' . $ano . '.pdf', 'F');

                        $generainformemensual->Output('C:/Users/' . get_current_user() . '/Downloads' . '/' . 'informe-' . $mes . '-' . $ano . '.pdf', 'F');
                    }
                    // echo json_encode($datos); //toutf8
                    echo 3;
                    return;
                }
            } else {
                echo 4;
                return;
            }
        } else if ($subseleccion == 4) {
            $Semetreseleccionado = solonumeros($_POST['semestreseleccionado']);
            if (isset($Semetreseleccionado)) {

                if ($Semetreseleccionado == 1) {
                    $sql = "SELECT DISTINCT year(fecha_inicio_vacaciones) as numerodeano FROM vacaciones WHERE month(fecha_inicio_vacaciones) >= 1 and month(fecha_inicio_vacaciones) <=6";
                    $consulta = mysqli_query($mysqli, $sql);
                    $contar = mysqli_num_rows($consulta);
                } else if ($Semetreseleccionado == 2) {
                    $sql = "SELECT DISTINCT year(fecha_inicio_vacaciones) as numerodeano FROM vacaciones WHERE month(fecha_inicio_vacaciones) >= 7 and month(fecha_inicio_vacaciones) <=12";
                    $consulta = mysqli_query($mysqli, $sql);
                    $contar = mysqli_num_rows($consulta);
                }

                if (!$consulta || $contar == 0) {
                    echo 1;
                    return;
                } else {
                    $ljson .= '<option value="">Seleccione año...</option>';
                    while ($fila = mysqli_fetch_array($consulta)) {
                        $ano = $fila['numerodeano'];
                        $ljson .= '<option value="' . $ano . '">' . $ano . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                    }
                    echo $ljson;
                    return;
                }
            } else {
                echo 2;
                return;
            }
        } else if ($subseleccion == 5) {
            if (isset($_POST["semestre"]) && isset($_POST["ano"])) {
                $semestre = solonumeros($_POST["semestre"]);
                $ano = solonumeros($_POST["ano"]);

                if (validavacioenarreglo(array($semestre, $ano))) {
                    echo 1;
                    return;
                } else {
                    if ($semestre == 1) {
                        $sql = "SELECT va.rut,
                        us.nombre_usuario,
                        va.tipo_vacaciones,
                        va.razon_vacaciones,
                        va.dias_tomados_vacaciones,
                        va.fecha_inicio_vacaciones,
                        va.observacion_vacaciones FROM vacaciones va, usuario us 
                        WHERE va.rut=us.rut and month(fecha_inicio_vacaciones) >= 1 and month(fecha_inicio_vacaciones) <=6
                        and year(fecha_inicio_vacaciones)='$ano'";
                    } else if ($semestre == 2) {
                        $sql = "SELECT va.rut,
                        us.nombre_usuario,
                        va.tipo_vacaciones,
                        va.razon_vacaciones,
                        va.dias_tomados_vacaciones,
                        va.fecha_inicio_vacaciones,
                        va.observacion_vacaciones FROM vacaciones va, usuario us 
                        WHERE va.rut=us.rut and month(fecha_inicio_vacaciones) >= 7 and month(fecha_inicio_vacaciones) <=12
                        and year(fecha_inicio_vacaciones)='$ano'";
                    }
                }

                require '../../funcionesphp/fpdf/fpdf.php';
                $generainformesemestral = new FPDF();
                require '../funciones/exportaInformes.php';
                obtenerdatosinformesemestral($generainformesemestral, $semestre, $ano);

                $consulta = mysqli_query($mysqli, $sql);
                $contar = mysqli_num_rows($consulta);

                if (!$consulta || $contar == 0) {
                    echo 2;
                    return;
                } else {
                    while ($fila = mysqli_fetch_array($consulta)) {

                        $porciones1 = explode("-", $fila["fecha_inicio_vacaciones"]);
                        $fechainicio = $porciones1[2] . '-' . $porciones1[1] . '-' . $porciones1[0];
                        $nombrefechainicio = $porciones1[2] . ' ' . strftime('%B', mktime(0, 0, 0, number_format($porciones1[1]))) . ' del ' . $porciones1[0];

                        $porciones2 = explode("-", $fila["fecha_inicio_vacaciones"]);
                        $diamesanofin = $porciones2[2] . '-' . $porciones2[1] . '-' . $porciones2[0];
                        $sumardiasfin = strtotime($diamesanofin . '+ ' . $fila["dias_tomados_vacaciones"] . " days"); // Incrementando dias
                        $fechafin = date("d-m-Y", $sumardiasfin);
                        $porciones3 = explode("-", $fechafin);
                        $nombrefechafin = $porciones3[0] . ' ' . strftime('%B', mktime(0, 0, 0, number_format($porciones3[1]))) . ' del ' . $porciones3[2];

                        $hoy = date('d-m-Y');
                        $porcion = explode("-", $hoy);
                        $diaactual = $porcion[0];
                        $mesactual = $porcion[1];
                        $anoactual = $porcion[2];
                        $nombredelmesactual = strftime('%B', mktime(0, 0, 0, number_format($mesactual)));

                        $generainformesemestral->Cell(19, 5, utf8_decode($fila['rut']), "LBRT", 0, "L");
                        $generainformesemestral->Cell(30, 5, utf8_decode($fila['nombre_usuario']), "LBRT", 0, "L");
                        $generainformesemestral->Cell(15, 5, utf8_decode($fila['tipo_vacaciones']), "LBRT", 0, "L");
                        $generainformesemestral->Cell(45, 5, $fila['razon_vacaciones'], "LBRT", 0, "L");
                        $generainformesemestral->Cell(10, 5, utf8_decode($fila['dias_tomados_vacaciones']), "LBRT", 0, "C");
                        $generainformesemestral->Cell(39, 5, utf8_decode($nombrefechainicio), "LBRT", 0, "L");
                        $generainformesemestral->Cell(39, 5, utf8_decode($nombrefechafin), "LBRT", 0, "L");

                        $generainformesemestral->Ln(5);
                    }
                    $generainformesemestral->Ln(10);
                    $generainformesemestral->SetFont('Arial', '', 7);
                    $generainformesemestral->MultiCell(150, 8, utf8_decode("Los Álamos Chile, " . $diaactual . ' de ' . $nombredelmesactual . ' del ' . $anoactual . "."));

                    // if (!is_dir('../informesmensuales/' . $mes . '-' . $ano . '/')) { //Si no existe el directorio 
                    //     mkdir('../informesmensuales/' . $mes . '-' . $ano . '/', 0777, true); //lo crea
                    // }
                    // $generainformesemestral->Output('../informesmensuales/' . $mes . '-' . $ano . '/' . 'informe-' . $mes . '-' . $ano . '.pdf', 'F');

                    $generainformesemestral->Output('C:/Users/' . get_current_user() . '/Downloads' . '/' . 'informeSemestral-' . $semestre . '-' . $ano . '.pdf', 'F');
                    echo 3;
                    return;
                }
            } else {
                echo 4;
                return;
            }
        }
        mysqli_close($mysqli);
    }
} else {
    echo 444;
    return;
}
