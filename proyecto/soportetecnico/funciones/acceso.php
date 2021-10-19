<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
include '../../funcionesphp/borrarcarpeta.php';
include '../../funcionesphp/detectarNavegadoreIP.php';

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%F"); //strftime("%F") ó strftime("%Y-%m-%d") Ej:2021-12-23
$anoactual = strftime("%Y");
$mesactual = strftime("%m");
$diaactual = strftime("%d");

$fechayhoradehoy = strftime("%F") . ' ' . strftime("%T");
$horaactual = strftime("%H");
$minutoactual = strftime("%M");
$segundoactual = strftime("%S");
$fomateofecha = $diaactual . '/' . $mesactual . '/' . $anoactual;
$pm_o_am = ($horaactual >= 12 && ($horaactual < 23 && $minutoactual <= 59)) ? 'PM' : 'AM';


session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];

if (isset($_POST['seleccionar'])) {
    $seleccion = $_POST['seleccionar'];
    if ($seleccion == 1) {
        $json = '';

        $sql1 = "SELECT rut FROM usuario WHERE id_rol=22";
        $consulta1 = mysqli_query($mysqli, $sql1);

        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
            $rutSoporteTecnico = $fila1['rut'];

            $sql2 = "SELECT id_sop_tec, emisor, receptor, fechayhora_sop_tec, comentario_sop_tec, estado_eliminado_sop_tec FROM soporte_tecnico WHERE emisor='$rutsesion' or receptor='$rutsesion'"; //ORDER BY id_sop_tec DESC
            $consulta2 = mysqli_query($mysqli, $sql2);

            if (mysqli_num_rows($consulta2) > 0) {
                while ($fila2 = mysqli_fetch_array($consulta2)) {
                    $ID_SOPORTE_TEC = $fila2['id_sop_tec'];
                    $fecharecibida = $fila2['fechayhora_sop_tec'];
                    $porciones = explode(" ", $fecharecibida);
                    $porciones2 = explode("-", $porciones[0]);
                    $porciones3 = explode(":", $porciones[1]);
                    $ano = $porciones2[0];
                    $mes = $porciones2[1];
                    $dia = $porciones2[2];
                    $nformateofecha = $dia . '/' . $mes . '/' . $ano;
                    $hora = $porciones3[0];
                    $minuto = $porciones3[1];
                    $segundo = $porciones3[2];
                    $pm_o_am2 = ($hora >= 12 && ($hora < 23 && $minuto <= 59)) ? 'PM' : 'AM';

                    if ($rutsesion == $fila2['emisor']) {

                        if ($fila2['estado_eliminado_sop_tec'] == 1) {
                            $json .= '
                            <div class="table-responsive">
                                <div class="media w-50 ml-auto mb-3">
                                    <div class="media-body">
                                        <div class="bg-danger rounded py-2 px-3 mb-2">
                                            <p class="text-small mb-0 text-white pt-1">
                                            <em><i class="fas fa-ban"></i> Eliminaste este mensaje</em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                        } else {
                            $json .= '
                            <div class="table-responsive">
                                <div class="media w-50 ml-auto mb-3">
                                    <div class="media-body">
                                        <div class="rounded py-2 px-3 mb-2" style="background-color: #1191d0;">
                                            <button type="button" class="btn btn-transparent btn-sm float-right botoneliminar" value="' . $ID_SOPORTE_TEC . '" title="Eliminar mensaje"><i class="fas fa-window-close text-light fa-1x"></i></button>
                                            <p class="text-small mb-0 text-white pt-1">
                                            ' . $fila2['comentario_sop_tec'] . '
                                            </p>
                                        </div>
                                        <p class="small text-muted">' . $porciones[1] . ' ' . $pm_o_am2 . ' | ' . $nformateofecha . '</p>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    } else {
                        if ($fila2['estado_eliminado_sop_tec'] != 1) {
                            $json .= '
                        <div class="media w-50 mb-3"><img src="soporte.png" alt="user" width="50" class="rounded-circle">
                            <div class="media-body ml-3">
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">
                                    ' . $fila2['comentario_sop_tec'] . '
                                    </p>
                                </div>
                                <p class="small text-muted">' . $porciones[1] . ' ' . $pm_o_am2 . ' | ' . $nformateofecha . '</p>
                            </div>
                        </div>
                        ';
                        }
                    }
                }
            } else {
                $json .= '
                <div class="media w-50 mb-3"><img src="soporte.png" alt="user" width="50" class="rounded-circle">
                    <div class="media-body ml-3">
                        <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted">
                                ¡Hola! Este es nuestro Chat de asistencia técnica, ¿En qué podemos ayudarte?, escríbenos.
                            </p>
                        </div>
                        <p class="small text-muted">' . strftime("%T") . ' ' . $pm_o_am . ' | ' . $fomateofecha . ' </p>
                    </div>
                </div>
                ';
                // $json .= $fechayhoradehoy;
            }
            echo $json;
        } else {
            echo 1; //no existe soporte técnico
            return;
        }
    } else if ($seleccion == 2) {

        if (isset($_POST['comentario'])) {
            $comentario = soloCaractDeConversacion($_POST['comentario']);

            if (validavacioenarreglo(array($comentario))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $infoNav = detectanavegador();
                $sistemaoperativo = $infoNav["os"];
                $navegador = $infoNav["browser"];
                $version_navegador = $infoNav["version"];

                $sql1 = "SELECT rut FROM usuario WHERE id_rol=22";
                $consulta1 = mysqli_query($mysqli, $sql1);
                if (mysqli_num_rows($consulta1) > 0) {
                    $fila1 = mysqli_fetch_assoc($consulta1);
                    $rutSoporteTecnico = $fila1['rut'];

                    $sql2 = "INSERT INTO soporte_tecnico (id_sop_tec,emisor,receptor,fechayhora_sop_tec,comentario_sop_tec,
                    estado_eliminado_sop_tec,sistemaoperativo_sop_tec,navegador_sop_tec, versionnaveg_sop_tec) 
                    VALUES (NULL,'$rutsesion','$rutSoporteTecnico','$fechayhoradehoy','$comentario','0','$sistemaoperativo','$navegador','$version_navegador')";

                    $resultado2 = mysqli_query($mysqli, $sql2);

                    if (!$resultado2) {
                        echo 2;
                        return;
                    } else {
                        echo 3;
                        return;
                    }
                } else {
                    echo 4;
                    return;
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 3) {

        if (isset($_POST['iden'])) {
            $iden = solonumeros($_POST['iden']);

            if (validavacioenarreglo(array($iden))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $sql1 = "SELECT id_sop_tec FROM soporte_tecnico WHERE id_sop_tec='$iden' and estado_eliminado_sop_tec='1'";
                $consulta1 = mysqli_query($mysqli, $sql1);
                if (mysqli_num_rows($consulta1) > 0) {
                    echo 2; //ya se encuentra eliminado el comentario
                    return;
                } else {
                    $sql2 = "UPDATE soporte_tecnico SET estado_eliminado_sop_tec='1' WHERE id_sop_tec='$iden'";

                    $resultado2 = mysqli_query($mysqli, $sql2);

                    if (!$resultado2) {
                        echo 3;
                        return;
                    } else {
                        echo 4;
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    }  else if ($seleccion == 4) {

        $sql1 = "SELECT COUNT(id_sop_tec) as mensajes_enviados FROM soporte_tecnico WHERE emisor='$rutsesion' and estado_eliminado_sop_tec='0'";
        $sql2 = "SELECT COUNT(id_sop_tec) as mensajes_eliminados FROM soporte_tecnico WHERE emisor='$rutsesion' and estado_eliminado_sop_tec='1'";

        $consulta1 = mysqli_query($mysqli, $sql1);
        $consulta2 = mysqli_query($mysqli, $sql2);

        /* RESPUESTAS */
        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['mensajes_enviados'] = 0;
        }
        if (mysqli_num_rows($consulta2) > 0) {
            $fila2 = mysqli_fetch_assoc($consulta2);
        } else {
            $fila2['mensajes_eliminados'] = 0;
        }

        $datos = array();
        $datos[0] = array('mensajes_enviados'    => $fila1['mensajes_enviados']);
        $datos[1] = array('mensajes_eliminados'  => $fila2['mensajes_eliminados']);

        echo json_encode(toutf8($datos));
    }  
}
mysqli_close($mysqli);
