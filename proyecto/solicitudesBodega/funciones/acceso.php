<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
include '../../funcionesphp/borrarcarpeta.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%F"); //strftime("%F") ó strftime("%Y-%m-%d") Ej:2021-12-23
$anoactual = strftime("%Y");
$mesactual = strftime("%m");
$diaactual = strftime("%d");
session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];

if (isset($_POST['seleccionar'])) {
    $seleccion = $_POST['seleccionar'];
    if ($seleccion == 1) {

        // $sql = "SELECT smb.id_sl_mat_bg,mb.id_mb,cmb.nombre_cat_mb,mb.nombre_material_mb, smb.id_seg_sl_mat_bg,
        // smb.fecha_sl_mat_bg,smb.stock_sl_mat_bg,smb.comentario_sl_mat_bg,smb.rut
        // FROM materiales_bodega mb, categoria_mb cmb, solicitud_mat_bodega smb 
        // WHERE mb.id_cat_mb=cmb.id_cat_mb and smb.id_mb=mb.id_mb";

        $sql = "SELECT smb.id_sl_mat_bg,mb.id_mb,cmb.nombre_cat_mb,mb.nombre_material_mb, smb.id_seg_sl_mat_bg,
        smb.fecha_sl_mat_bg,smb.stock_sl_mat_bg,smb.comentario_sl_mat_bg,smb.rut, us.nombre_usuario
        FROM materiales_bodega mb, categoria_mb cmb, solicitud_mat_bodega smb, usuario us
        WHERE mb.id_cat_mb=cmb.id_cat_mb and smb.id_mb=mb.id_mb and smb.rut=us.rut";

        $consulta = mysqli_query($mysqli, $sql);

        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_SOLICITUD'         => $fila["id_sl_mat_bg"],
                'ID_MB'                => $fila["id_mb"],
                'RUT_SOLICITANTE'      => $fila["rut"],
                'NOMBRE_SOLICITANTE'   => $fila["nombre_usuario"],
                'ID_SEGUIMIENTO'       => $fila["id_seg_sl_mat_bg"],
                'NOMBRE_CATEGORIA_MB'  => $fila["nombre_cat_mb"],
                'NOMBRE_MATERIAL_MB'   => $fila["nombre_material_mb"],
                'FECHA_REGISTRO_SL'    => $fila["fecha_sl_mat_bg"],
                'CANTIDAD_SL'          => $fila["stock_sl_mat_bg"],
                'COMENTARIO'           => $fila["comentario_sl_mat_bg"]
            );
        }

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 2) {
        //Como muestro números, por la cantidad de stock del material debo validar con números negativos, ya que el stock puede dar 2 y el js va a tomar el 2 de la validacion
        if (isset($_POST['id_solicitud']) && isset($_POST['id_seguimiento']) && isset($_POST['id_mb']) && isset($_POST['solicitud']) && isset($_POST['stock']) && isset($_POST['comentario'])) {
            $id_solicitud = solonumeros($_POST['id_solicitud']);
            $id_mb = solonumeros($_POST['id_mb']);
            $solicitud = solonumeros($_POST['solicitud']);
            $stock = solonumeros($_POST['stock']);
            $id_seguimiento = solonumeros($_POST['id_seguimiento']);
            $comentario = soloCaractDeConversacion($_POST['comentario']);


            if (validavacioenarreglo(array($id_solicitud, $id_seguimiento, $id_mb, $solicitud))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                if ($solicitud == 1) {

                    if ($id_seguimiento == 2) { //Viene de una solicitud aprobada por tanto debo restar al material entregado de la tabla historial_mat_bodega,  sumar al disponible del historial_mat_bodega y a la cantidad_mb de la tabla materiales_bodega

                        //Si la suma de los estados de la tabla historial_mat_bodega y la del historial de la tabla materiales_bodega es cero, 
                        //quiere decir que no hay datos disponibles o bien, hay un error
                        if (verificarstockmaximo($mysqli, $id_mb) == 0 && verificarSumaStockEstados($mysqli, $id_mb) == 0) {
                            echo 5;
                            return;
                        }
                        //La suma de los estados de la tabla historial_mat_bodega no puede ser mayor al historial de la tabla materiales_bodega
                        else if (verificarSumaStockEstados($mysqli, $id_mb) > verificarstockmaximo($mysqli, $id_mb)) {
                            echo 6;
                            return;
                        }
                        //el historial del materiales_bodega no puede ser menor que el stock que se solicita
                        else if (verificarstockmaximo($mysqli, $id_mb) < $stock || verificarSumaStockEstados($mysqli, $id_mb) < $stock) {
                            echo 7;
                            return;
                        }
                        //No puedo reincorporar más stock de medicamento del que tiene ese estado Entregado (2)
                        else if (verificarstockDeUnMedicamento($mysqli, 2, $id_mb) < $stock) {
                            echo 8;
                            return;
                        } else {

                            //Sumo el stock a solicitar en el cantidad_mb total de la tabla de materiales_bodega
                            $sql1 = "UPDATE materiales_bodega SET cantidad_mb=cantidad_mb+'$stock' WHERE id_mb='$id_mb'";
                            $res1 = mysqli_query($mysqli, $sql1);

                            //Sumo stock que solicito al estado 1 (Estado disponible) de la tabla historial_mat_bodega
                            $sql2 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg+'$stock' 
                    WHERE id_est_mat_bg=1 and id_mb='$id_mb'";
                            $res2 = mysqli_query($mysqli, $sql2);
                            //Resto stock solicitado al estado entregado, porque se han restaurado los Entregado
                            $sql3 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg-'$stock' 
                    WHERE id_est_mat_bg=2 and id_mb='$id_mb'";
                            $res3 = mysqli_query($mysqli, $sql3);

                            $sql4 = "UPDATE solicitud_mat_bodega SET id_seg_sl_mat_bg='$solicitud', comentario_sl_mat_bg='$comentario'
                            WHERE id_sl_mat_bg='$id_solicitud'";
                            $res4 = mysqli_query($mysqli, $sql4);

                            if (!$res1 && !$res2 && !$res3 && !$res4) {
                                echo 9;
                                return;
                            } else {
                                echo 10;
                                return;
                            }
                        }
                    } else {
                        $sql1 = "SELECT id_sl_mat_bg FROM solicitud_mat_bodega WHERE id_sl_mat_bg='$id_solicitud' and id_seg_sl_mat_bg='$solicitud'";
                        $resultado1 = mysqli_query($mysqli, $sql1);
                        $contador = mysqli_num_rows($resultado1);

                        if ($contador >= 1) {
                            echo 2; //ya está pendiente
                            return;
                        } else {
                            $sql2 = "UPDATE solicitud_mat_bodega SET id_seg_sl_mat_bg='$solicitud', comentario_sl_mat_bg='$comentario'  
                        WHERE id_sl_mat_bg='$id_solicitud'";
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
                } else if ($solicitud == 2) {

                    $sql1 = "SELECT id_sl_mat_bg FROM solicitud_mat_bodega WHERE id_sl_mat_bg='$id_solicitud' and id_seg_sl_mat_bg='$solicitud'";
                    $resultado1 = mysqli_query($mysqli, $sql1);
                    $contador = mysqli_num_rows($resultado1);

                    if ($contador >= 1) {
                        echo 2; //ya está aprobada
                        return;
                    } else {

                        //Si la suma de los estados de la tabla historial_mat_bodega y la del historial de la tabla materiales_bodega es cero,
                        // quiere decir que no hay datos disponibles o bien, hay un error
                        if (verificarstockmaximo($mysqli, $id_mb) == 0 && verificarSumaStockEstados($mysqli, $id_mb) == 0) {
                            echo 3;
                            return;
                        }
                        //La suma de los estados del historial_mat_bodega no puede ser mayor al historial del materiales_bodega
                        else if (verificarSumaStockEstados($mysqli, $id_mb) > verificarstockmaximo($mysqli, $id_mb)) {
                            echo 4;
                            return;
                        }
                        //el historial del material no puede ser menor que el stock que se solicita
                        else if (verificarstockmaximo($mysqli, $id_mb) < $stock) {
                            echo 5;
                            return;
                        }
                        //No puedo registrar más stock entregado de material del que tiene el estado disponible
                        else if (verificarstockDeUnMedicamento($mysqli, 1, $id_mb) < $stock) {
                            echo 6;
                            return;
                        } else {

                            //Sumo stock que solicito al estado 2 (registrar material Entregado)
                            $sql = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg+'$stock' 
                    WHERE id_est_mat_bg=2 and id_mb='$id_mb'";
                            $res = mysqli_query($mysqli, $sql);
                            //Resto stock solicitado al estado disponible 
                            $sql2 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg-'$stock' 
                    WHERE id_est_mat_bg=1 and id_mb='$id_mb'";
                            $res2 = mysqli_query($mysqli, $sql2);

                            //Resto el stock a solicitar en el cantidad_mb total de la tabla de materiales_bodega
                            $sql3 = "UPDATE materiales_bodega SET cantidad_mb=cantidad_mb-'$stock' 
                    WHERE id_mb='$id_mb'";
                            $res3 = mysqli_query($mysqli, $sql3);

                            $sql4 = "UPDATE solicitud_mat_bodega SET id_seg_sl_mat_bg='$solicitud', comentario_sl_mat_bg='$comentario'
                        WHERE id_sl_mat_bg='$id_solicitud'";
                            $res4 = mysqli_query($mysqli, $sql4);

                            if (!$res && !$res2 && !$res3 && !$res4) {
                                echo 7;
                                return;
                            } else {
                                echo 8;
                                return;
                            }
                        }
                    }
                } else if ($solicitud == 3) {

                    if ($id_seguimiento == 2) { //Viene de una solicitud aprobada por tanto debo restar al material entregado de la tabla historial_mat_bodega,  sumar al disponible del historial_mat_bodega y a la cantidad_mb de la tabla materiales_bodega

                        //Si la suma de los estados de la tabla historial_mat_bodega y la del historial de la tabla materiales_bodega es cero, 
                        //quiere decir que no hay datos disponibles o bien, hay un error
                        if (verificarstockmaximo($mysqli, $id_mb) == 0 && verificarSumaStockEstados($mysqli, $id_mb) == 0) {
                            echo 5;
                            return;
                        }
                        //La suma de los estados de la tabla historial_mat_bodega no puede ser mayor al historial de la tabla materiales_bodega
                        else if (verificarSumaStockEstados($mysqli, $id_mb) > verificarstockmaximo($mysqli, $id_mb)) {
                            echo 6;
                            return;
                        }
                        //el historial del materiales_bodega no puede ser menor que el stock que se solicita
                        else if (verificarstockmaximo($mysqli, $id_mb) < $stock || verificarSumaStockEstados($mysqli, $id_mb) < $stock) {
                            echo 7;
                            return;
                        }
                        //No puedo reincorporar más stock de medicamento del que tiene ese estado Entregado (2)
                        else if (verificarstockDeUnMedicamento($mysqli, 2, $id_mb) < $stock) {
                            echo 8;
                            return;
                        } else {

                            //Sumo el stock a solicitar en el cantidad_mb total de la tabla de materiales_bodega
                            $sql1 = "UPDATE materiales_bodega SET cantidad_mb=cantidad_mb+'$stock' WHERE id_mb='$id_mb'";
                            $res1 = mysqli_query($mysqli, $sql1);

                            //Sumo stock que solicito al estado 1 (Estado disponible) de la tabla historial_mat_bodega
                            $sql2 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg+'$stock' 
                    WHERE id_est_mat_bg=1 and id_mb='$id_mb'";
                            $res2 = mysqli_query($mysqli, $sql2);
                            //Resto stock solicitado al estado entregado, porque se han restaurado los Entregado
                            $sql3 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg-'$stock' 
                    WHERE id_est_mat_bg=2 and id_mb='$id_mb'";
                            $res3 = mysqli_query($mysqli, $sql3);

                            $sql4 = "UPDATE solicitud_mat_bodega SET id_seg_sl_mat_bg='$solicitud', comentario_sl_mat_bg='$comentario'
                            WHERE id_sl_mat_bg='$id_solicitud'";
                            $res4 = mysqli_query($mysqli, $sql4);

                            if (!$res1 && !$res2 && !$res3 && !$res4) {
                                echo 9;
                                return;
                            } else {
                                echo 10;
                                return;
                            }
                        }
                    } else {
                        $sql1 = "SELECT id_sl_mat_bg FROM solicitud_mat_bodega WHERE id_sl_mat_bg='$id_solicitud' and id_seg_sl_mat_bg='$solicitud'";
                        $resultado1 = mysqli_query($mysqli, $sql1);
                        $contador = mysqli_num_rows($resultado1);

                        if ($contador >= 1) {
                            echo 2; //ya está rechazado
                            return;
                        } else {
                            $sql2 = "UPDATE solicitud_mat_bodega SET id_seg_sl_mat_bg='$solicitud', comentario_sl_mat_bg='$comentario'
                        WHERE id_sl_mat_bg='$id_solicitud'";
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
                }
                // $sql1 = "SELECT cantidad_mb FROM materiales_bodega WHERE id_mb='$id_material'";
                // $resultado1 = mysqli_query($mysqli, $sql1);
                // $fila = mysqli_fetch_assoc($resultado1);

                // if (!$resultado1) {
                //     echo 2;
                //     return;
                // } else {
                //     echo $fila['cantidad_mb'];
                //     return;
                // }
            }
        } else {
            echo -444;
            return;
        }
    } else if ($seleccion == 3) {

        // $sql = "SELECT smb.id_seg_sl_mat_bg, COUNT(smb.id_seg_sl_mat_bg) as cantidad
        // FROM solicitud_mat_bodega smb
        // GROUP BY smb.id_seg_sl_mat_bg
        // ORDER BY smb.id_seg_sl_mat_bg"; //ASC LIMIT 3

        // $res = mysqli_query($mysqli, $sql);
        // $datos = array();
        // while ($fila = mysqli_fetch_array($res)) {
        //     $datos[] = array(
        //         'ID_SEGUIMIENTO' => $fila["id_seg_sl_mat_bg"],
        //         'CANTIDAD' => $fila["cantidad"]
        //     );
        // }

        $sql1 = "SELECT COUNT(id_sl_mat_bg) as contadortotal,
        (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=1) as solicitud_pendientes_acum,
        (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=2)as solicitud_aprobadas_acum,
        (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=3) as solicitud_rechazadas_acum
        FROM solicitud_mat_bodega";

        $sql2 = "SELECT COUNT(id_sl_mat_bg) as contadortotal,
        (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=1 and year(fecha_sl_mat_bg)= '$anoactual') as ano_actual_solicitud_pendientes_acum,
        (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=2 and year(fecha_sl_mat_bg)= '$anoactual')as ano_actual_solicitud_aprobadas_acum,
        (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=3 and year(fecha_sl_mat_bg)= '$anoactual') as ano_actual_solicitud_rechazadas_acum
        FROM solicitud_mat_bodega WHERE year(fecha_sl_mat_bg)= '$anoactual'";

        if ($mesactual == 1 || $mesactual == 01 || $mesactual == '1' || $mesactual == '01') {
            $mesanterior = 12;
        } else {
            $mesanterior = $mesactual - 1;
        }

        $sql3 = "SELECT COUNT(id_sl_mat_bg) as contadortotal,
        (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=1 and year(fecha_sl_mat_bg)= '$anoactual' and month(fecha_sl_mat_bg)= '$mesanterior') as mes_anterior_solicitud_pendientes_acum,
        (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=2 and year(fecha_sl_mat_bg)= '$anoactual' and month(fecha_sl_mat_bg)= '$mesanterior')as mes_anterior_solicitud_aprobadas_acum,
        (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=3 and year(fecha_sl_mat_bg)= '$anoactual' and month(fecha_sl_mat_bg)= '$mesanterior') as mes_anterior_solicitud_rechazadas_acum
        FROM solicitud_mat_bodega WHERE year(fecha_sl_mat_bg)= '$anoactual' and month(fecha_sl_mat_bg)= '$mesanterior'";

        $res1 = mysqli_query($mysqli, $sql1);
        $res2 = mysqli_query($mysqli, $sql2);
        $res3 = mysqli_query($mysqli, $sql3);


        $fila1 = mysqli_fetch_assoc($res1);
        $fila2 = mysqli_fetch_assoc($res2);
        $fila3 = mysqli_fetch_assoc($res3);

        $datos = array();

        $datos[0] = array('solicitud_pendientes_acum'   =>  $fila1["solicitud_pendientes_acum"]);
        $datos[1] = array('solicitud_aprobadas_acum'    =>  $fila1["solicitud_aprobadas_acum"]);
        $datos[2] = array('solicitud_rechazadas_acum'   =>  $fila1["solicitud_rechazadas_acum"]);
        $datos[3] = array('total_solicitudes'           =>  $fila1["contadortotal"]);

        $datos[4] = array('ano_actual_sl_pend'      =>  $fila2["ano_actual_solicitud_pendientes_acum"]);
        $datos[5] = array('ano_actual_sl_apr'       =>  $fila2["ano_actual_solicitud_aprobadas_acum"]);
        $datos[6] = array('ano_actual_sl_rechz'     =>  $fila2["ano_actual_solicitud_rechazadas_acum"]);
        $datos[7] = array('mes_anterior_sl_pend'    =>  $fila3["mes_anterior_solicitud_pendientes_acum"]);
        $datos[8] = array('mes_anterior_sl_apr'     =>  $fila3["mes_anterior_solicitud_aprobadas_acum"]);
        $datos[9] = array('mes_anterior_sl_rechz'   =>  $fila3["mes_anterior_solicitud_rechazadas_acum"]);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 4) {

        // $sql = "SELECT COUNT(id_sl_mat_bg) as contadortotal,
        // (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=1 and year(fecha_sl_mat_bg)= '$anoactual') as ano_actual_solicitud_pendientes_acum,
        // (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=2 and year(fecha_sl_mat_bg)= '$anoactual')as ano_actual_solicitud_aprobadas_acum,
        // (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=3 and year(fecha_sl_mat_bg)= '$anoactual') as ano_actual_solicitud_rechazadas_acum
        // FROM solicitud_mat_bodega WHERE year(fecha_sl_mat_bg)= '$anoactual'";

        // if ($mesactual == 1 || $mesactual == 01 || $mesactual == '1' || $mesactual == '01') {
        //     $mesanterior = 12;
        // } else {
        //     $mesanterior = $mesactual - 1;
        // }

        // $sql2 = "SELECT COUNT(id_sl_mat_bg) as contadortotal,
        // (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=1 and year(fecha_sl_mat_bg)= '$anoactual' and month(fecha_sl_mat_bg)= '$mesanterior') as mes_anterior_solicitud_pendientes_acum,
        // (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=2 and year(fecha_sl_mat_bg)= '$anoactual' and month(fecha_sl_mat_bg)= '$mesanterior')as mes_anterior_solicitud_aprobadas_acum,
        // (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=3 and year(fecha_sl_mat_bg)= '$anoactual' and month(fecha_sl_mat_bg)= '$mesanterior') as mes_anterior_solicitud_rechazadas_acum
        // FROM solicitud_mat_bodega WHERE year(fecha_sl_mat_bg)= '$anoactual' and month(fecha_sl_mat_bg)= '$mesanterior'";


        // $res = mysqli_query($mysqli, $sql);
        // $res2 = mysqli_query($mysqli, $sql2);
        // $fila = mysqli_fetch_assoc($res);
        // $fila2 = mysqli_fetch_assoc($res2);


        // $datos = array();

        // $datos[0] = array('ano_actual_sl_pend'      =>  $fila["ano_actual_solicitud_pendientes_acum"]);
        // $datos[1] = array('ano_actual_sl_apr'       =>  $fila["ano_actual_solicitud_aprobadas_acum"]);
        // $datos[2] = array('ano_actual_sl_rechz'     =>  $fila["ano_actual_solicitud_rechazadas_acum"]);
        // $datos[4] = array('mes_anterior_sl_pend'    =>  $fila["mes_anterior_solicitud_pendientes_acum"]);
        // $datos[5] = array('mes_anterior_sl_apr'     =>  $fila["mes_anterior_solicitud_aprobadas_acum"]);
        // $datos[6] = array('mes_anterior_sl_rechz'   =>  $fila["mes_anterior_solicitud_rechazadas_acum"]);

        // echo json_encode(toutf8($datos));
    } else {
        echo 555;
        return;
    }
}
mysqli_close($mysqli);


//=================================================================================================================//
function verificarstockmaximo($conexion, $IDmaterial)
{
    $sql = "SELECT historial_mb FROM materiales_bodega WHERE id_mb='$IDmaterial'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['historial_mb'];
    }
    return $resultado;
}

function verificarSumaStockEstados($conexion, $IDmaterial)
{
    $sql = "SELECT SUM(stock_hs_mat_bg) as sumaEstados FROM historial_mat_bodega WHERE id_mb='$IDmaterial'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['sumaEstados'];
    }
    return $resultado;
}

function verificarstockDeUnMedicamento($conexion, $IDESTADO, $IDmaterial)
{
    $sql = "SELECT stock_hs_mat_bg FROM historial_mat_bodega WHERE id_est_mat_bg='$IDESTADO' and id_mb='$IDmaterial'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['stock_hs_mat_bg'];
    }
    return $resultado;
}
//=================================================================================================================//