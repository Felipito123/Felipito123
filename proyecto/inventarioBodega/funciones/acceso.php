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
        $concatenar = "";

        if (isset($_POST['fechainicio'])) {
            $fechainicio = fechausuarios($_POST['fechainicio']);
            $concatenar .= "and mb.fecharegistro_mb >= '$fechainicio'";
        }

        if (isset($_POST['fechafin'])) {
            $fechafin = fechausuarios($_POST['fechafin']);
            $concatenar .= " and mb.fecharegistro_mb <= '$fechafin'";
        }

        $sql = "SELECT mb.id_mb, mb.id_cat_mb,cmb.nombre_cat_mb,mb.fecharegistro_mb,mb.nombre_material_mb,mb.cantidad_mb,
        mb.cantidad_minima_mb,mb.cantidad_maxima_mb,mb.historial_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE mb.id_cat_mb=cmb.id_cat_mb and mb.estado_mb='1' " . $concatenar;

        $consulta = mysqli_query($mysqli, $sql);

        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_MB'                => $fila["id_mb"],
                'ID_CATEGORIA_MB'      => $fila["id_cat_mb"],
                'NOMBRE_CATEGORIA_MB'  => $fila["nombre_cat_mb"],
                'NOMBRE_MATERIAL_MB'   => $fila["nombre_material_mb"],
                'FECHA_REGISTRO'       => $fila["fecharegistro_mb"],
                'CANTIDAD'             => $fila["cantidad_mb"],
                'CANTIDADMINIMA'       => $fila["cantidad_minima_mb"],
                'CANTIDADMAXIMA'       => $fila["cantidad_maxima_mb"],
                'HISTORIAL'            => $fila["historial_mb"]
            );
        }

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 2) {

        if (isset($_POST['nombrematerial']) && isset($_POST['fecharegistro']) && isset($_POST['id_mb'])) { //isset($_POST['cantidad']) && 
            $fecharegistro = fechausuarios($_POST['fecharegistro']);
            // $cantidad = solonumeros($_POST['cantidad']);
            $id_mb = solonumeros($_POST['id_mb']);
            $nombrematerial = soloCaractDeConversacion($_POST['nombrematerial']);

            if (validavacioenarreglo(array($id_mb, $nombrematerial, $fecharegistro))) { //$cantidad //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $sql1 = "SELECT count(nombre_material_mb) as contador FROM materiales_bodega WHERE nombre_material_mb='$nombrematerial' and id_mb='$id_mb'"; //and cantidad_mb='$cantidad' 
                $consulta1 = mysqli_query($mysqli, $sql1);
                $resultado1 = mysqli_fetch_assoc($consulta1);

                $sql_Existe_Nom_Material = "SELECT count(nombre_material_mb) as contador FROM materiales_bodega WHERE nombre_material_mb='$nombrematerial'"; //and cantidad_mb='$cantidad' 
                $consulta_Existe_Nom_Material = mysqli_query($mysqli, $sql_Existe_Nom_Material);
                $resultado_Existe_Nom_Material = mysqli_fetch_assoc($consulta_Existe_Nom_Material);

                if ($resultado1['contador'] == 0 && $resultado_Existe_Nom_Material['contador'] >= 1) { 
                    echo 2;  //Existe una material con el mismo nombre e ID y Editado correctamente
                    return;
                } else {
                    $sql2 = "UPDATE materiales_bodega SET nombre_material_mb='$nombrematerial', fecharegistro_mb='$fecharegistro' WHERE id_mb='$id_mb'"; //cantidad_mb='$cantidad',
                    $resultado2 = mysqli_query($mysqli, $sql2);

                    if (!$resultado2) {
                        echo 3; //Ocurrió un error
                        return;
                    } else {
                        echo 4; //Editado correctamente
                        return;
                    }
                }
            }
        } else {
            echo 444;
            return;
        }
    } else if ($seleccion == 3) {

        if (isset($_POST['id_mb'])) {
            $id_mb = solonumeros($_POST['id_mb']);

            if (validavacioenarreglo(array($id_mb))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $sql1 = "DELETE FROM materiales_bodega WHERE id_mb='$id_mb'";
                $resultado1 = mysqli_query($mysqli, $sql1);

                if (!$resultado1) {
                    echo 2; //Ocurrió un error
                    return;
                } else {
                    echo 3; //Eliminado correctamente
                    return;
                }
            }
        } else {
            echo 444;
            return;
        }
    } else if ($seleccion == 4) {
        $sql = "SELECT id_cat_mb , nombre_cat_mb FROM categoria_mb";
        $consulta = mysqli_query($mysqli, $sql);
        $ljson = '';
        if (!$consulta) {
            echo 1;
            return;
        } else {
            //Toma la comuna por defecto de la sesion
            $ljson .= '<option value="">Seleccione una categoria</option>';

            while ($fila1 = mysqli_fetch_array($consulta)) {
                $idcat = $fila1['id_cat_mb'];
                $nombrecat = $fila1['nombre_cat_mb'];
                $ljson .= '<option value="' . $idcat . '">' . toutf8($nombrecat) . '</option>';
            }
            echo $ljson;
            return;
        }
    } else if ($seleccion == 5) {
        if (isset($_POST['categoria_mb']) && isset($_POST['cantidadmaterial']) && isset($_POST['detalle_mb'])) {
            $categoria_mb = solonumeros($_POST['categoria_mb']);
            $cantidadmaterial = solonumeros($_POST['cantidadmaterial']);
            $detalle_mb = soloNombreMaterialBodega($_POST['detalle_mb']);
            $calculo_cant_minima = floor($cantidadmaterial * 0.35);

            if (validavacioenarreglo(array($categoria_mb, $cantidadmaterial, $detalle_mb))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {

                $sql1 = "SELECT count(nombre_material_mb) as contador FROM materiales_bodega WHERE nombre_material_mb='$detalle_mb'";
                $consulta1 = mysqli_query($mysqli, $sql1);
                $resultado1 = mysqli_fetch_assoc($consulta1);

                if ($resultado1['contador'] >= 1) {
                    echo 2;  //Existe una categoria con el mismo nombre
                    return;
                } else {
                    $sql2 = "INSERT INTO materiales_bodega (id_mb,id_cat_mb,fecharegistro_mb,nombre_material_mb,
                    cantidad_mb,estado_mb,cantidad_minima_mb,cantidad_maxima_mb,historial_mb) VALUES (NULL,
                    '$categoria_mb','$fechadehoy','$detalle_mb','$cantidadmaterial','1',
                    '$calculo_cant_minima','$cantidadmaterial','$cantidadmaterial')";

                    $resultado2 = mysqli_query($mysqli, $sql2);

                    if (!$resultado2) {
                        echo 3;
                        return;
                    } else {

                        if (ultimomaterialinsertado($mysqli) == 0) {
                            echo 3;
                            return;
                        } else {
                            $ultimoID = ultimomaterialinsertado($mysqli);
                            $resultado3 = mysqli_query($mysqli, "INSERT INTO historial_mat_bodega (id_hs_mat_bg,id_mb,id_est_mat_bg,stock_hs_mat_bg) VALUES (NULL,'$ultimoID',1,'$cantidadmaterial')");
                            $resultado4 = mysqli_query($mysqli, "INSERT INTO historial_mat_bodega (id_hs_mat_bg,id_mb,id_est_mat_bg,stock_hs_mat_bg) VALUES (NULL,'$ultimoID',2,0)");
                            $resultado5 = mysqli_query($mysqli, "INSERT INTO historial_mat_bodega (id_hs_mat_bg,id_mb,id_est_mat_bg,stock_hs_mat_bg) VALUES (NULL,'$ultimoID',3,0)");
                            $resultado6 = mysqli_query($mysqli, "INSERT INTO historial_mat_bodega (id_hs_mat_bg,id_mb,id_est_mat_bg,stock_hs_mat_bg) VALUES (NULL,'$ultimoID',4,0)");

                            if (!$resultado3 && !$resultado4 && !$resultado5 && !$resultado6) { //no se han insertado en historial_medicamento
                                echo 3;
                                return;
                            } else {
                                echo 4;
                                return;
                            }
                        }
                    }
                }
            }
        }
    } else if ($seleccion == 6) {
        if (isset($_POST['id_mb'])) {
            $id_mb = solonumeros($_POST['id_mb']);

            if (validavacioenarreglo(array($id_mb))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {

                $sql1 = "UPDATE materiales_bodega SET estado_mb='0' WHERE id_mb='$id_mb'";
                $resultado1 = mysqli_query($mysqli, $sql1);

                if (!$resultado1) {
                    echo 2; //Ocurrió un error
                    return;
                } else {
                    echo 3; //Eliminado correctamente
                    return;
                }
            }
        } else {
            echo 444;
            return;
        }
    } else if ($seleccion == 7) {

        $sql = "SELECT mb.id_mb, mb.id_cat_mb,cmb.nombre_cat_mb,mb.fecharegistro_mb,mb.nombre_material_mb,mb.cantidad_mb 
        FROM materiales_bodega mb, categoria_mb cmb WHERE mb.id_cat_mb=cmb.id_cat_mb and mb.estado_mb='0'";

        $consulta = mysqli_query($mysqli, $sql);

        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_MB'                => $fila["id_mb"],
                'ID_CATEGORIA_MB'      => $fila["id_cat_mb"],
                'NOMBRE_CATEGORIA_MB'  => $fila["nombre_cat_mb"],
                'NOMBRE_MATERIAL_MB'   => $fila["nombre_material_mb"],
                'FECHA_REGISTRO'       => $fila["fecharegistro_mb"],
                'CANTIDAD'             => $fila["cantidad_mb"]
            );
        }

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 8) {
        if (isset($_POST['id_mb'])) {
            $id_mb = solonumeros($_POST['id_mb']);

            if (validavacioenarreglo(array($id_mb))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $sql1 = "UPDATE materiales_bodega SET estado_mb='1' WHERE id_mb='$id_mb'";
                $resultado1 = mysqli_query($mysqli, $sql1);

                if (!$resultado1) {
                    echo 2; //Ocurrió un error
                    return;
                } else {
                    echo 3; //Eliminado correctamente
                    return;
                }
            }
        } else {
            echo 444;
            return;
        }
    } else if ($seleccion == 9) {

        $sql = "SELECT cmb.nombre_cat_mb, COUNT(mb.id_mb) as cantidad 
        FROM materiales_bodega mb, categoria_mb cmb 
        WHERE mb.id_cat_mb=cmb.id_cat_mb
        GROUP BY cmb.nombre_cat_mb
        ORDER BY cmb.nombre_cat_mb ASC LIMIT 3";

        $res = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($res)) {
            $datos[] = array(
                'NOMBRE_CAT_MB' => $fila["nombre_cat_mb"],
                'CANTIDAD' => $fila["cantidad"]
            );
        }
        echo json_encode(toutf8($datos));

        // if (isset($_POST['id_mb'])) {
        //     // $id_mb = solonumeros($_POST['id_mb']);
        //     // if (validavacioenarreglo(array($id_mb))) { //Valida si estan vacios los datos
        //     //     echo 1;
        //     //     return;
        //     // } else {
        //     //     $sql1 = "UPDATE materiales_bodega SET estado_mb='1' WHERE id_mb='$id_mb'";
        //     //     $resultado1 = mysqli_query($mysqli, $sql1);

        //     //     if (!$resultado1) {
        //     //         echo 2; //Ocurrió un error
        //     //         return;
        //     //     } else {
        //     //         echo 3; //Eliminado correctamente
        //     //         return;
        //     //     }
        //     // }
        // } else {
        //     echo 444;
        //     return;
        // }
    } else if ($seleccion == 10) {
        $idmaterial = solonumeros($_POST['idmaterial']);
        $estado = solonumeros($_POST['estadohistorialmaterial']);
        // echo 'ID: '.$idmaterial.'ESTADO: '.$estado;
        // return;
        if (isset($idmaterial) && isset($estado)) {
            $sql = "SELECT stock_hs_mat_bg FROM historial_mat_bodega WHERE id_est_mat_bg='$estado' and id_mb='$idmaterial'";
            $resultado = mysqli_query($mysqli, $sql);
            //UTILICE NUMEROS NEGATIVOS PORQUE A VECES EL stock_historial_medicamento MOSTRABA UN 1,2,3 de la base de datos Y LO PASABA COMO ERROR
            if (!$resultado) {
                echo -1;
                return;
            } else {
                if (mysqli_num_rows($resultado) >= 1) {
                    $fila = mysqli_fetch_assoc($resultado);
                    echo $fila['stock_hs_mat_bg'];
                    return;
                } else {
                    echo -2;
                    return;
                }
            }
        } else {
            echo -3;
            return;
        }
    } else if ($seleccion == 11) {

        if (isset($_POST["accion"]) && isset($_POST["stockasolicitar"]) && isset($_POST["idmaterial"]) && isset($_POST["cantidadmaxima"]) && isset($_POST["stocktotal"])) {
            $accion = solonumeros($_POST["accion"]);
            $stockasolicitar = solonumeros($_POST["stockasolicitar"]);
            $idmaterial = solonumeros($_POST["idmaterial"]);
            $cantidadmaxima = solonumeros($_POST["cantidadmaxima"]);
            $stocktotal = solonumeros($_POST["stocktotal"]);

            $suma = $stocktotal + $stockasolicitar;

            /*Nota: si la accion es 1 (agregar stock) y si el stock a agregar sumado al stock total es mayor a la cantidad maxima inicial, 
            sera el nuevo stock total y el historial del medicamento editado(sumado) */
            if ($accion == 1 && ($suma >= $cantidadmaxima)) { //agregar nuevo stock 

                $cantidadminima = $suma * 0.35;

                $sql = "UPDATE materiales_bodega SET cantidad_mb=cantidad_mb+'$stockasolicitar', 
                cantidad_minima_mb='$cantidadminima', 
                cantidad_maxima_mb='$suma', 
                historial_mb=historial_mb+'$stockasolicitar'  
                WHERE id_mb='$idmaterial'";
                $res = mysqli_query($mysqli, $sql);

                $sql2 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg+'$stockasolicitar' 
                WHERE id_est_mat_bg=1 and id_mb='$idmaterial'";
                $res2 = mysqli_query($mysqli, $sql2);

                if (!$res && !$res2) {
                    echo 1;
                    return;
                } else {
                    echo 2;
                    return;
                }
            } else if ($accion == 1 && ($suma <= $cantidadmaxima)) { //agregar nuevo stock

                $sql = "UPDATE materiales_bodega SET cantidad_mb=cantidad_mb+'$stockasolicitar', 
                historial_mb=historial_mb+'$stockasolicitar'  
                WHERE id_mb='$idmaterial'";
                $res = mysqli_query($mysqli, $sql);

                $sql2 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg+'$stockasolicitar' 
                WHERE id_est_mat_bg=1 and id_mb='$idmaterial'";
                $res2 = mysqli_query($mysqli, $sql2);

                if (!$res && !$res2) {
                    echo 1;
                    return;
                } else {
                    echo 2;
                    return;
                }
            } else if ($accion == 2) { //registrar estado perdido

                //Si la suma de los estados de la tabla historial_medicamento y la del historial de la tabla medicamento es cero, quiere decir que no hay datos
                //disponibles o bien, hay un error
                if (verificarstockmaximo($mysqli, $idmaterial) == 0 && verificarSumaStockEstados($mysqli, $idmaterial) == 0) {
                    echo 3;
                    return;
                }
                //La suma de los estados del historial_medicamento no puede ser mayor al historial  del medicamento
                else if (verificarSumaStockEstados($mysqli, $idmaterial) > verificarstockmaximo($mysqli, $idmaterial)) {
                    echo 4;
                    return;
                }
                //el historial del medicamento no puede ser menor que el stock que se solicita
                else if (verificarstockmaximo($mysqli, $idmaterial) < $stockasolicitar) {
                    echo 5;
                    return;
                }
                //No puedo registrar más stock perdido de medicamento del que tiene el estado disponible
                else if (verificarstockDeUnMedicamento($mysqli, 1, $idmaterial) < $stockasolicitar) {
                    echo 6;
                    return;
                } else {

                    //Sumo stock que solicito al estado 4 (registrar medicamento perdido)
                    $sql = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg+'$stockasolicitar' 
                    WHERE id_est_mat_bg=4 and id_mb='$idmaterial'";
                    $res = mysqli_query($mysqli, $sql);
                    //Resto stock solicitado  o stock de estado perdido al estado disponible 
                    $sql2 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg-'$stockasolicitar' 
                    WHERE id_est_mat_bg=1 and id_mb='$idmaterial'";
                    $res2 = mysqli_query($mysqli, $sql2);

                    //Resto el stock a solicitar en el cantidad_mb total de la tabla de materiales_bodega
                    $sql3 = "UPDATE materiales_bodega SET cantidad_mb=cantidad_mb-'$stockasolicitar' 
                    WHERE id_mb='$idmaterial'";
                    $res3 = mysqli_query($mysqli, $sql3);

                    if (!$res && !$res2 && !$res3) {
                        echo 1;
                        return;
                    } else {
                        echo 2;
                        return;
                    }
                }
            } else if ($accion == 3) { //registrar medicamento Defectuoso

                //Si la suma de los estados de la tabla historial_medicamento y la del historial de la tabla medicamento es cero, quiere decir que no hay datos
                //disponibles o bien, hay un error
                if (verificarstockmaximo($mysqli, $idmaterial) == 0 && verificarSumaStockEstados($mysqli, $idmaterial) == 0) {
                    echo 3;
                    return;
                }
                //La suma de los estados del historial_medicamento no puede ser mayor al historial  del medicamento
                else if (verificarSumaStockEstados($mysqli, $idmaterial) > verificarstockmaximo($mysqli, $idmaterial)) {
                    echo 4;
                    return;
                }
                //el historial del medicamento no puede ser menor que el stock que se solicita
                else if (verificarstockmaximo($mysqli, $idmaterial) < $stockasolicitar) {
                    echo 5;
                    return;
                }
                //No puedo registrar más stock entregado de medicamento del que tiene el estado disponible
                else if (verificarstockDeUnMedicamento($mysqli, 1, $idmaterial) < $stockasolicitar) {
                    echo 7;
                    return;
                } else {

                    //Sumo stock que solicito al estado 3 (registrar medicamento Defectuoso)
                    $sql = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg+'$stockasolicitar' 
                    WHERE id_est_mat_bg=3 and id_mb='$idmaterial'";
                    $res = mysqli_query($mysqli, $sql);
                    //Resto stock solicitado al estado disponible 
                    $sql2 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg-'$stockasolicitar' 
                    WHERE id_est_mat_bg=1 and id_mb='$idmaterial'";
                    $res2 = mysqli_query($mysqli, $sql2);

                    //Resto el stock a solicitar en el cantidad_mb total de la tabla de materiales_bodega
                    $sql3 = "UPDATE materiales_bodega SET cantidad_mb=cantidad_mb-'$stockasolicitar' 
                    WHERE id_mb='$idmaterial'";
                    $res3 = mysqli_query($mysqli, $sql3);

                    if (!$res && !$res2 && !$res3) {
                        echo 1;
                        return;
                    } else {
                        echo 2;
                        return;
                    }
                }
            } else if ($accion == 4) { //reincorporar medicamento Defectuoso

                // echo verificarstockmaximo($mysqli, $idmedicamento) . '--' . verificarSumaStockEstados($mysqli, $idmedicamento);
                // return;

                //Si la suma de los estados de la tabla historial_medicamento y la del historial de la tabla medicamento es cero, quiere decir que no hay datos
                //disponibles o bien, hay un error
                if (verificarstockmaximo($mysqli, $idmaterial) == 0 && verificarSumaStockEstados($mysqli, $idmaterial) == 0) {
                    echo 3;
                    return;
                }
                //La suma de los estados de la tabla historial_medicamento no puede ser mayor al historial de la tabla medicamento
                else if (verificarSumaStockEstados($mysqli, $idmaterial) > verificarstockmaximo($mysqli, $idmaterial)) {
                    echo 4;
                    return;
                }
                //el historial del medicamento no puede ser menor que el stock que se solicita
                else if (verificarstockmaximo($mysqli, $idmaterial) < $stockasolicitar || verificarSumaStockEstados($mysqli, $idmaterial) < $stockasolicitar) {
                    echo 5;
                    return;
                }
                //No puedo reincorporar más stock de medicamento del que tiene ese estado Defectuoso (3)
                else if (verificarstockDeUnMedicamento($mysqli, 3, $idmaterial) < $stockasolicitar) {
                    echo 8;
                    return;
                } else {

                    //Sumo el stock a solicitar en el cantidad_mb total de la tabla de materiales_bodega
                    $sql = "UPDATE materiales_bodega SET cantidad_mb=cantidad_mb+'$stockasolicitar' WHERE id_mb='$idmaterial'";
                    $res = mysqli_query($mysqli, $sql);

                    //Sumo stock que solicito al estado 1 (Estado disponible) de la tabla historial_mat_bodega
                    $sql1 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg+'$stockasolicitar' 
                    WHERE id_est_mat_bg=1 and id_mb='$idmaterial'";
                    $res1 = mysqli_query($mysqli, $sql1);
                    //Resto stock solicitado al estado perdido, porque se han restaurado los Defectuoso
                    $sql2 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg-'$stockasolicitar' 
                    WHERE id_est_mat_bg=3 and id_mb='$idmaterial'";
                    $res2 = mysqli_query($mysqli, $sql2);

                    if (!$res && !$res1 && !$res2) {
                        echo 1;
                        return;
                    } else {
                        echo 2;
                        return;
                    }
                }
            } else if ($accion == 5) { //reincorporar medicamento perdido

                // echo verificarstockmaximo($mysqli, $idmedicamento) . '--' . verificarSumaStockEstados($mysqli, $idmedicamento);
                // return;
                //Si la suma de los estados de la tabla historial_medicamento y la del historial de la tabla medicamento es cero, quiere decir que no hay datos
                //disponibles o bien, hay un error
                if (verificarstockmaximo($mysqli, $idmaterial) == 0 && verificarSumaStockEstados($mysqli, $idmaterial) == 0) {
                    echo 3;
                    return;
                }
                //La suma de los estados de la tabla historial_medicamento no puede ser mayor al historial de la tabla medicamento
                else if (verificarSumaStockEstados($mysqli, $idmaterial) > verificarstockmaximo($mysqli, $idmaterial)) {
                    echo 4;
                    return;
                }
                //el historial del medicamento no puede ser menor que el stock que se solicita
                else if (verificarstockmaximo($mysqli, $idmaterial) < $stockasolicitar || verificarSumaStockEstados($mysqli, $idmaterial) < $stockasolicitar) {
                    echo 5;
                    return;
                }
                //No puedo reincorporar más stock de medicamento del que tiene ese estado perdido (4)
                else if (verificarstockDeUnMedicamento($mysqli, 4, $idmaterial) < $stockasolicitar) {
                    echo 8;
                    return;
                } else {

                    //Sumo el stock a solicitar en el cantidad_mb total de la tabla de materiales_bodega
                    $sql = "UPDATE materiales_bodega SET cantidad_mb=cantidad_mb+'$stockasolicitar' WHERE id_mb='$idmaterial'";
                    $res = mysqli_query($mysqli, $sql);

                    //Sumo stock que solicito al estado 1 (Estado disponible) de la tabla historial_mat_bodega
                    $sql1 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg+'$stockasolicitar' 
                    WHERE id_est_mat_bg=1 and id_mb='$idmaterial'";
                    $res1 = mysqli_query($mysqli, $sql1);
                    //Resto stock solicitado al estado perdido, porque se han restaurado los perdidos
                    $sql2 = "UPDATE historial_mat_bodega SET stock_hs_mat_bg=stock_hs_mat_bg-'$stockasolicitar' 
                    WHERE id_est_mat_bg=4 and id_mb='$idmaterial'";
                    $res2 = mysqli_query($mysqli, $sql2);

                    if (!$res && !$res1 && !$res2) {
                        echo 1;
                        return;
                    } else {
                        echo 2;
                        return;
                    }
                }
            }
        } else {
            echo 9;
            return;
        }
    } else {
        echo 555;
        return;
    }
}
mysqli_close($mysqli);


function ultimomaterialinsertado($conexion)
{
    $sql = "SELECT MAX(id_mb) AS identificador FROM materiales_bodega";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['identificador'];
    }
    return $resultado;
}

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