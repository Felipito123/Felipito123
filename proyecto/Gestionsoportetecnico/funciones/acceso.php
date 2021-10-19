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
$imagenfuncsesion = $_SESSION['sesionCESFAM']['imagenusuario'];

if (isset($_POST['seleccionar'])) {
    $seleccion = $_POST['seleccionar'];
    if ($seleccion == 1) {
        // $agrega_a_consulta = "";
        $sql = "SELECT COUNT(spt.id_sop_tec) as Veces_msj_emisor, spt.emisor, us.nombre_usuario, us.enlinea_usuario, us.imagen_usuario
        FROM soporte_tecnico spt, usuario us  
        WHERE spt.emisor!='$rutsesion' and us.rut=spt.emisor GROUP BY spt.emisor";

        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'RUTEMISOR'             => $fila["emisor"],
                'NOMBRE_USUARIO'        => $fila["nombre_usuario"],
                'ACTIVIDAD_USUARIO'     => $fila["enlinea_usuario"],
                'IMAGEN_USUARIO'        => $fila["imagen_usuario"],
                'CANT_MSJ_TOTAL_EMISOR' => $fila["Veces_msj_emisor"]
            );
        }
        echo json_encode(toutf8($datos));
        return;
    } else if ($seleccion == 2) {

        if (isset($_POST['rutemisor'])) {
            $rutemisor = validarut($_POST['rutemisor']);

            $json = '';

            $sql1 = "SELECT rut FROM usuario WHERE id_rol=22";
            $consulta1 = mysqli_query($mysqli, $sql1);

            if (mysqli_num_rows($consulta1) > 0) {
                $fila1 = mysqli_fetch_assoc($consulta1);
                $rutSoporteTecnico = $fila1['rut'];

                $sql2 = "SELECT id_sop_tec, emisor, receptor, fechayhora_sop_tec, comentario_sop_tec, estado_eliminado_sop_tec FROM soporte_tecnico WHERE emisor='$rutemisor' or receptor='$rutemisor'";
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
                                <div class="media w-75 ml-auto mb-3">
                                    <div class="media-body">
                                        <div class="bg-danger rounded py-2 px-3 mb-2">
                                        <button type="button" class="btn btn-transparent btn-sm float-right botonrestaurarmsj" value="' . $ID_SOPORTE_TEC . '" title="Mostrar mensaje"><i class="fas fa-eye text-light fa-1x"></i></button>
                                        <button type="button" class="btn btn-transparent btn-sm float-right botoneliminardefinitivo" value="' . $ID_SOPORTE_TEC . '" title="Eliminar definitivamente"><i class="fas fa-trash text-light fa-1x"></i></button>
                                            <p class="text-small mb-0 text-white pt-1">
                                            <em><i class="fas fa-ban"></i> Eliminaste este mensaje</em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                            } else {
                                $sqldos = "SELECT enlinea_usuario FROM usuario WHERE rut='$rutsesion'";
                                $consultados = mysqli_query($mysqli, $sqldos);
                                $resestadoactividad = mysqli_fetch_assoc($consultados);

                                if ($resestadoactividad['enlinea_usuario'] == 1) {
                                    $avatarimagen = '
                                    <div class="avatar avatar-online bg-white mr-1" style="border: 2px solid #16d39a;padding: 2px;">
                                        <img src="../perfil/fotodeperfiles/' . $rutsesion . '/' . $imagenfuncsesion . '" class="img-fluid rounded-circle" alt="Avatar Image">
                                        <span class="ficon feather icon-github"></span>
                                        <i></i>
                                    </div>
                                    ';
                                } else {
                                    $avatarimagen = '
                                    <div class="avatar avatar-offline bg-white mr-1" style="border: 2px solid #e84118;padding: 2px;">
                                        <img src="../perfil/fotodeperfiles/' . $rutsesion . '/' . $imagenfuncsesion . '" class="img-fluid rounded-circle" alt="Avatar Image">
                                        <span class="ficon feather icon-github"></span>
                                        <i></i>
                                    </div>
                                    ';
                                }

                                // <img src="../perfil/fotodeperfiles/' . $rutsesion . '/' . $imagenfuncsesion . '" alt="user" width="50" class="rounded-circle">

                                $json .= '
                            <div class="table-responsive">
                                <div class="media w-75 ml-auto mb-3 scrollmsj">
                               ' . $avatarimagen . '
                                    <div class="media-body ml-3">
                                        <div class="bg-info rounded py-2 px-2 mb-2">
                                            <button type="button" class="btn btn-transparent btn-sm float-left botoneliminar" value="' . $ID_SOPORTE_TEC . '" title="Eliminar mensaje"><i class="fas fa-window-close text-light fa-1x"></i></button>
                                            <p class="text-small mb-0 text-white pt-1" style="width:157px; word-wrap:break-word;">
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

                            if ($fila2['estado_eliminado_sop_tec'] == 1) {
                                $json .= '
                            <div class="table-responsive">
                                <div class="media w-75 mb-3">
                                    <div class="media-body">
                                        <div class="bg-danger rounded py-2 px-3 mb-2">
                                            <p class="text-small mb-0 text-white pt-1">
                                            <em><i class="fas fa-ban"></i> El funcionario ha eliminado este mensaje</em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                            } else {
                                $rutreceptor = $fila2['emisor'];
                                $sql3 = "SELECT imagen_usuario, enlinea_usuario FROM usuario WHERE rut='$rutreceptor'";
                                $consulta3 = mysqli_query($mysqli, $sql3);
                                $filaimagenreceptor = mysqli_fetch_assoc($consulta3);

                                if ($filaimagenreceptor['enlinea_usuario'] == 1) {
                                    $avatarimagen = '
                                    <div class="avatar avatar-online bg-white mr-1" style="border: 2px solid #16d39a;padding: 2px;">
                                        <img src="../perfil/fotodeperfiles/' . $fila2['emisor'] . '/' . $filaimagenreceptor['imagen_usuario'] . '" class="img-fluid rounded-circle" alt="Avatar Image">
                                        <span class="ficon feather icon-github"></span>
                                        <i></i>
                                    </div>
                                    ';
                                } else {
                                    $avatarimagen = '
                                    <div class="avatar avatar-offline bg-white mr-1" style="border: 2px solid #e84118;padding: 2px;">
                                        <img src="../perfil/fotodeperfiles/' . $fila2['emisor'] . '/' . $filaimagenreceptor['imagen_usuario'] . '" class="img-fluid rounded-circle" alt="Avatar Image">
                                        <span class="ficon feather icon-github"></span>
                                        <i></i>
                                    </div>
                                    ';
                                }

                                // <img src="../perfil/fotodeperfiles/' . $fila2['emisor'] . '/' . $filaimagenreceptor['imagen_usuario'] . '" alt="user" width="50" class="rounded-circle">
                                $json .= '
                                <div class="media w-75 mb-3">
                                ' . $avatarimagen . '
                                    <div class="media-body ml-3">
                                        <div class="bg-light rounded py-2 px-3 mb-2">
                                            <p class="text-small mb-0 text-muted" style="width:157px; word-wrap:break-word;">
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
                <div class="media w-75 mb-3">
                <img src="soporte.png" alt="user" width="50" class="rounded-circle">
                    <div class="media-body ml-3">
                        <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted">
                                ¡Hola! Este es nuestro Chat de asistencia técnica, por ahora no se encuentran mensajes disponibles que mostrar.
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
        } else {
            echo 2; //no se han recibido parámetros, es decir, el rutemisor
            return;
        }
    } else if ($seleccion == 3) {

        if (isset($_POST['comentario']) && isset($_POST['rutaenviarmensaje'])) {
            $comentario = soloCaractDeConversacion($_POST['comentario']);
            $rutaenviarmensaje = validarut($_POST['rutaenviarmensaje']);

            if (validavacioenarreglo(array($comentario))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $infoNav = detectanavegador();
                $sistemaoperativo = $infoNav["os"];
                $navegador = $infoNav["browser"];
                $version_navegador = $infoNav["version"];

                $sql2 = "INSERT INTO soporte_tecnico (id_sop_tec,emisor,receptor,fechayhora_sop_tec,comentario_sop_tec,
                estado_eliminado_sop_tec,sistemaoperativo_sop_tec,navegador_sop_tec, versionnaveg_sop_tec) 
                VALUES (NULL,'$rutsesion','$rutaenviarmensaje','$fechayhoradehoy','$comentario','0','$sistemaoperativo','$navegador','$version_navegador')";

                $resultado2 = mysqli_query($mysqli, $sql2);

                if (!$resultado2) {
                    echo 2;
                    return;
                } else {
                    echo 3;
                    return;
                }
            }
        } else {
            echo 4;
            return;
        }
    } else if ($seleccion == 4) {

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
    } else if ($seleccion == 5) {

        if (isset($_POST['iden'])) {
            $iden = solonumeros($_POST['iden']);

            if (validavacioenarreglo(array($iden))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $sql1 = "SELECT id_sop_tec FROM soporte_tecnico WHERE id_sop_tec='$iden'";
                $consulta1 = mysqli_query($mysqli, $sql1);
                if (mysqli_num_rows($consulta1) > 0) {
                    $sql2 = "DELETE FROM soporte_tecnico WHERE id_sop_tec='$iden'";

                    $resultado2 = mysqli_query($mysqli, $sql2);

                    if (!$resultado2) {
                        echo 3;
                        return;
                    } else {
                        echo 4;
                        return;
                    }
                } else {
                    echo 2; //ya se encuentra eliminado el comentario
                    return;
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 6) {

        if (isset($_POST['iden'])) {
            $iden = solonumeros($_POST['iden']);

            if (validavacioenarreglo(array($iden))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $sql1 = "SELECT id_sop_tec FROM soporte_tecnico WHERE id_sop_tec='$iden' and estado_eliminado_sop_tec='0'";
                $consulta1 = mysqli_query($mysqli, $sql1);
                if (mysqli_num_rows($consulta1) > 0) {
                    echo 2; //ya se encuentra restaurado el comentario
                    return;
                } else {
                    $sql2 = "UPDATE soporte_tecnico SET estado_eliminado_sop_tec='0' WHERE id_sop_tec='$iden'";

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
    } else if ($seleccion == 7) {

        if (isset($_POST['subitem'])) {
            $subitem = $_POST['subitem'];
            if ($subitem == 1) {
                if (isset($_POST['reciberutemisor'])) {
                    $reciberutemisor = $_POST['reciberutemisor'];
                    $sql = "SELECT emisor, navegador_sop_tec FROM soporte_tecnico WHERE emisor='$reciberutemisor' GROUP BY navegador_sop_tec";
                    $consulta = mysqli_query($mysqli, $sql);
                    $datos = array();
                    while ($fila = mysqli_fetch_array($consulta)) {
                        $datos[] = array(
                            'NAVEGADORES'  => $fila["navegador_sop_tec"]
                        );
                    }
                    echo json_encode(toutf8($datos));
                    return;
                } else {
                    echo 502;
                    return;
                }
            } else if ($subitem == 2) {
                if (isset($_POST['reciberutemisor'])) {
                    $reciberutemisor = $_POST['reciberutemisor'];
                    $sql = "SELECT emisor, versionnaveg_sop_tec FROM soporte_tecnico WHERE emisor='$reciberutemisor' GROUP BY versionnaveg_sop_tec";
                    $consulta = mysqli_query($mysqli, $sql);
                    $datos = array();
                    while ($fila = mysqli_fetch_array($consulta)) {
                        $datos[] = array(
                            'VERSIONES_NAVEGADOR'  => $fila["versionnaveg_sop_tec"]
                        );
                    }
                    echo json_encode(toutf8($datos));
                    return;
                } else {
                    echo 502;
                    return;
                }
            } else if ($subitem == 3) {
                if (isset($_POST['reciberutemisor'])) {
                    $reciberutemisor = $_POST['reciberutemisor'];
                    $sql = "SELECT emisor, sistemaoperativo_sop_tec FROM soporte_tecnico WHERE emisor='$reciberutemisor' GROUP BY sistemaoperativo_sop_tec";
                    $consulta = mysqli_query($mysqli, $sql);
                    $datos = array();
                    while ($fila = mysqli_fetch_array($consulta)) {
                        $datos[] = array(
                            'SISTEMAS_OPERATIVOS'  => $fila["sistemaoperativo_sop_tec"]
                        );
                    }
                    echo json_encode(toutf8($datos));
                    return;
                } else {
                    echo 502;
                    return;
                }
            } else {
                echo 501;
                return;
            }
        } else {
            echo 500;
            return;
        }
    } else if ($seleccion == 8) {
        
        if (isset($_POST['rutemisor'])) {
            $rutemisor = $_POST['rutemisor'];
            $sql1 = "SELECT COUNT(DISTINCT navegador_sop_tec) as contador_navegadores FROM soporte_tecnico WHERE emisor='$rutemisor'";
            $sql2 = "SELECT COUNT(DISTINCT versionnaveg_sop_tec) as contador_versiones FROM soporte_tecnico WHERE emisor='$rutemisor'";
            $sql3 = "SELECT COUNT(DISTINCT sistemaoperativo_sop_tec) as contador_sistop FROM soporte_tecnico WHERE emisor='$rutemisor'";
            $sql4 = "SELECT COUNT(id_sop_tec) as mensajes_enviados FROM soporte_tecnico WHERE emisor='$rutemisor' and estado_eliminado_sop_tec='0'";
            $sql5 = "SELECT COUNT(id_sop_tec) as mensajes_eliminados FROM soporte_tecnico WHERE emisor='$rutemisor' and estado_eliminado_sop_tec='1'";
    
            $consulta1 = mysqli_query($mysqli, $sql1);
            $consulta2 = mysqli_query($mysqli, $sql2);
            $consulta3 = mysqli_query($mysqli, $sql3);
            $consulta4 = mysqli_query($mysqli, $sql4);
            $consulta5 = mysqli_query($mysqli, $sql5);
    
            /* RESPUESTAS A GESTIÓN DE SOPORTE TÉCNICO  */
            if (mysqli_num_rows($consulta1) > 0) {
                $fila1 = mysqli_fetch_assoc($consulta1);
            } else {
                $fila1['contador_navegadores'] = 0;
            }
            if (mysqli_num_rows($consulta2) > 0) {
                $fila2 = mysqli_fetch_assoc($consulta2);
            } else {
                $fila2['contador_versiones'] = 0;
            }
            if (mysqli_num_rows($consulta3) > 0) {
                $fila3 = mysqli_fetch_assoc($consulta3);
            } else {
                $fila3['contador_sistop'] = 0;
            }
            if (mysqli_num_rows($consulta4) > 0) {
                $fila4 = mysqli_fetch_assoc($consulta4);
            } else {
                $fila4['mensajes_enviados'] = 0;
            }
            if (mysqli_num_rows($consulta5) > 0) {
                $fila5 = mysqli_fetch_assoc($consulta5);
            } else {
                $fila5['mensajes_eliminados'] = 0;
            }
    
            $datos = array();
            $datos[0] = array('contador_navegadores'  => $fila1['contador_navegadores']);
            $datos[1] = array('contador_versiones'    => $fila2['contador_versiones']);
            $datos[2] = array('contador_sistop'       => $fila3['contador_sistop']);
            $datos[3] = array('mensajes_enviados'     => $fila4['mensajes_enviados']);
            $datos[4] = array('mensajes_eliminados'   => $fila5['mensajes_eliminados']);
    
            echo json_encode(toutf8($datos));
        }else{
            echo 'error';
            return;
        }
    }
}
mysqli_close($mysqli);
