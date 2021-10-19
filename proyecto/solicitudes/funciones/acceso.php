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
        $sql = "SELECT sm.id_solicitud_medicamento, sm.rut_paciente, sm.fecha_solicitud,sm.seguimiento, pa.nombres_paciente
            FROM solicitud_medicamento sm, paciente pa WHERE sm.rut_paciente=pa.rut_paciente ORDER BY sm.id_solicitud_medicamento DESC";
        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_SOLICITUD'      => $fila["id_solicitud_medicamento"],
                'RUT_PACIENTE'      => $fila["rut_paciente"],
                'NOMBRE_PACIENTE'   => $fila["nombres_paciente"],
                'FECHA_SOLICITUD'   => $fila["fecha_solicitud"],
                'SEGUIMIENTO'       => $fila["seguimiento"]
            );
        }
        // header('Content-type: application/json');
        echo json_encode(toutf8($datos));
        mysqli_close($mysqli);
    } else if ($seleccion == 2) {
        if (isset($_POST['rutpaciente']) && isset($_POST['idsolicitud'])) {
            $idsolicitud = $_POST['idsolicitud'];
            $rutpaciente = $_POST['rutpaciente'];

            if (validavacioenarreglo(array($idsolicitud, $rutpaciente))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $sql = "SELECT med.id_medicamento,med.nombre_medicamento, med.dosificacion_medicamento, hs.id_solicitud_medicamento, hs.stock_historial_solicitud,
                hs.estado_historial_solicitud,hs.comentario_historial_solicitud, med.stock_total
                FROM solicitud_medicamento sm , historial_solicitud hs, medicamento med WHERE 
                sm.id_solicitud_medicamento=hs.id_solicitud_medicamento and
                hs.id_medicamento=med.id_medicamento and 
                sm.id_solicitud_medicamento='$idsolicitud' and sm.rut_paciente='$rutpaciente'";
                $consulta = mysqli_query($mysqli, $sql);
                $datos = '';
                while ($fila = mysqli_fetch_array($consulta)) {
                    $IDMED = $fila["id_medicamento"];
                    $IDSOLC = $fila["id_solicitud_medicamento"];
                    $STOCKTOTAL = $fila["stock_total"];
                    $IDESTADO = $fila["estado_historial_solicitud"];
                    $CANTIDAD = $fila["stock_historial_solicitud"];
                    $COMENTARIO = $fila["comentario_historial_solicitud"];
                    $des = "";
                    if ($IDESTADO == 1)  $estado = "Pendiente";
                    else if ($IDESTADO == 2) $estado = "Aprobado";
                    else if ($IDESTADO == 3) $estado = "Rechazado";

                    $datos .= '<tr>
                <td>' . $fila["stock_total"] . '</td>
                <td>' . $fila["nombre_medicamento"] . '</td>
                <td>' . $fila["dosificacion_medicamento"] . '</td>';

                    if ($IDESTADO == 2 || $IDESTADO == 3) {
                        $datos .= '<td> ' . $CANTIDAD . '</td> ';
                    } else {
                        $datos .= '
                    <td> 
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-danger botonmenos" value="' . $IDMED . '"><i class="fas fa-minus-square"></i></button>
                            </div>
                            <input type="number" id="campocantidad-' . $IDMED . '" value="' . $CANTIDAD . '" min="1" max="' . $STOCKTOTAL . '" oninput="if(this.value.length>=2) { this.value = this.value.slice(0,2);}" pattern="[0-9]+" onkeypress="return solonumeros(event)" class="col-sm-12 form-control input-number text-center" onpaste="return false" >
                            <div class="input-group-append">
                                    <button type="button" class="btn btn-success botonmas" value="' . $IDMED . ',' . $STOCKTOTAL . '"><i class="fas fa-plus-square"></i></button>
                            </div>
                        </div>
                    </td>';
                    }

                    $datos .= '
                <td>
                ' . $estado . '
                </td>';

                    if ($IDESTADO == 2 || $IDESTADO == 3) {
                        $des = "disabled";
                    }
                    $datos .= '
                <td style="width:200px;">
                    <textarea class="form-control" name="comentario-' . $IDMED . '" id="comentario-' . $IDMED . '" placeholder="Comentario opcional" rows="1" cols="100" minlength="2" maxlength="1000" onkeypress="return soloCaractDeConversacion(event)" ' . $des . ' style="resize:none;" required>' . $COMENTARIO . '</textarea>
                </td> ';

                    $datos .= '
                <td>
                    <div class="row justify-content-center">
                    <div class="col-lg-12 align-items-center">
                    ';


                    // if ($IDESTADO != 2) { //Si no esta aprobado muestro los botones, sino, no puedo porque ya entregue ese stock
                    //     $datos .= '
                    //     <button class="btn btn-success btn-sm btnaprobar" value="' . $IDMED . ',' . $IDSOLC . ',' . $STOCKTOTAL . ',' . $IDESTADO . '" title="Aprobar medicamento" ><i class="fas fa-thumbs-up"></i></button>
                    //     <button class="btn btn-warning btn-sm btnpendiente" value="' . $IDMED . ',' . $IDSOLC . '" title="Dejar medicamento en pendiente" ><i class="fas fa-hourglass-half"></i></button>
                    //     <button class="btn btn-danger btn-sm btnrechazar" value="' . $IDMED . ',' . $IDSOLC . '" title="Rechazar medicamento" ><i class="fas fa-thumbs-down"></i></button>
                    //     ';
                    // }

                    if ($IDESTADO == 1) { //Si esta en pendiente muestra los botones de aprobar y rechazar
                        $datos .= '
                        <button class="btn btn-success btn-sm btnaprobar" value="' . $IDMED . ',' . $IDSOLC . ',' . $STOCKTOTAL . ',' . $IDESTADO . '" title="Aprobar medicamento" ><i class="fas fa-thumbs-up"></i></button>
                        <button class="btn btn-danger btn-sm btnrechazar" value="' . $IDMED . ',' . $IDSOLC . '" title="Rechazar medicamento" ><i class="fas fa-thumbs-down"></i></button>
                        ';
                    } else if ($IDESTADO == 2) { //Si ya esta aprobada que no muestre nada
                        $datos .= '';
                    } else if ($IDESTADO == 3) { //Si esta rechazado muestra los botones de aprobar y pendiente
                        $datos .= '
                        <button class="btn btn-success btn-sm btnaprobar" value="' . $IDMED . ',' . $IDSOLC . ',' . $STOCKTOTAL . ',' . $IDESTADO . '" title="Aprobar medicamento" ><i class="fas fa-thumbs-up"></i></button>
                        <button class="btn btn-warning btn-sm btnpendiente" value="' . $IDMED . ',' . $IDSOLC . '" title="Dejar medicamento en pendiente" ><i class="fas fa-hourglass-half"></i></button>
                        ';
                    }

                    $datos .= '</div></div>
                </td>
                </tr>';
                }
                echo toutf8($datos);
                mysqli_close($mysqli);
            }
        } else {
            echo 2;
            return;
        }
    } else if ($seleccion == 3) {
        if (
            isset($_POST["idmedicamento"]) &&
            isset($_POST["idsolicitudmed"]) &&
            isset($_POST["estadosolicitud"]) &&
            isset($_POST["stocktotal"]) &&
            isset($_POST["stockaprobado"]) &&
            isset($_POST["comentario"])
        ) {
            $idmedicamento = solonumeros($_POST["idmedicamento"]);
            $idsolicitud = solonumeros($_POST["idsolicitudmed"]);
            $estadosolicitud = solonumeros($_POST["estadosolicitud"]);
            $stocktotal = solonumeros($_POST["stocktotal"]);
            $stockaprobado = solonumeros($_POST["stockaprobado"]);
            $comentario = soloCaractDeConversacion($_POST["comentario"]);

            //El comentario es opcional, por eso no lo valido si esta vacio 
            if (validavacioenarreglo(array($idmedicamento, $idsolicitud, $estadosolicitud, $stocktotal, $stockaprobado))) { //Valida campos vacios
                echo 1;
                return;
            } else {
                if (ExisteEstadoAprobadoPendienteORechazado($mysqli, $idsolicitud, $idmedicamento, $estadosolicitud) >= 1) { //Ya esta aprobado
                    echo 2;
                    return;
                } else {
                    //Si la suma de los estados de la tabla historial_medicamento y la del historial de la tabla medicamento es cero, quiere decir que no hay datos
                    //disponibles o bien, hay un error
                    if (verificarstockmaximo($mysqli, $idmedicamento) == 0 && verificarSumaStockEstados($mysqli, $idmedicamento) == 0) {
                        echo 4;
                        return;
                    }
                    //La suma de los estados del historial_medicamento no puede ser mayor al historial  del medicamento
                    else if (verificarSumaStockEstados($mysqli, $idmedicamento) > verificarstockmaximo($mysqli, $idmedicamento)) {
                        echo 4;
                        return;
                    }
                    //el historial del medicamento no puede ser menor que el stock que se solicita
                    else if (verificarstockmaximo($mysqli, $idmedicamento) < $stockaprobado) {
                        echo 4;
                        return;
                    }
                    //No puedo registrar más stock entregado de medicamento del que tiene el estado disponible
                    else if (verificarstockDeUnMedicamento($mysqli, 1, $idmedicamento) < $stockaprobado) {
                        echo 4;
                        return;
                    } else {
                        //Sumo stock que solicito al estado 2 (registrar medicamento entregado)
                        $sql = "UPDATE historial_medicamento SET stock_historial_medicamento=stock_historial_medicamento+'$stockaprobado' 
                    WHERE id_estado_medicamento=2 and id_medicamento='$idmedicamento'";
                        $res = mysqli_query($mysqli, $sql);
                        //Resto stock solicitado al estado disponible 
                        $sql2 = "UPDATE historial_medicamento SET stock_historial_medicamento=stock_historial_medicamento-'$stockaprobado' 
                    WHERE id_estado_medicamento=1 and id_medicamento='$idmedicamento'";
                        $res2 = mysqli_query($mysqli, $sql2);

                        //Resto el stock a solicitar en el stock_total de la tabla medicamento
                        $sql3 = "UPDATE medicamento SET stock_total=stock_total-'$stockaprobado' 
                    WHERE id_medicamento='$idmedicamento'";
                        $res3 = mysqli_query($mysqli, $sql3);

                        if (!$res && !$res2 && !$res3) {
                            echo 5;
                            return;
                        } else {
                            $sql4 = "UPDATE historial_solicitud SET estado_historial_solicitud='$estadosolicitud', 
                            stock_historial_solicitud='$stockaprobado',comentario_historial_solicitud='$comentario'
                            WHERE id_medicamento='$idmedicamento' and id_solicitud_medicamento='$idsolicitud'";
                            $res4 = mysqli_query($mysqli, $sql4);

                            if (!$res4) {
                                echo 6;
                                return;
                            } else {

                                $query5 = "SELECT id_historial_solicitud FROM historial_solicitud
                                WHERE (estado_historial_solicitud=1 or estado_historial_solicitud=2) and
                                id_solicitud_medicamento='$idsolicitud'";
                                $resquery5 = mysqli_query($mysqli, $query5);

                                if ($resquery5 && mysqli_num_rows($resquery5) == 0) { //Estan todas rechazadas entonces cambio el estado del seguimiento en la tabla solicitud_medicamento
                                    $query6 = "UPDATE solicitud_medicamento SET seguimiento='3'
                                    WHERE  id_solicitud_medicamento='$idsolicitud'";
                                    $resquery6 = mysqli_query($mysqli, $query6);
                                } else {
                                    $query6 = "UPDATE solicitud_medicamento SET seguimiento='0'
                                    WHERE  id_solicitud_medicamento='$idsolicitud'";
                                    $resquery6 = mysqli_query($mysqli, $query6);
                                }

                                echo 7;
                                return;
                            }
                        }
                    }
                }
            }
        } else {
            echo 3;
            return;
        }
    } else if ($seleccion == 4) {
        if (isset($_POST["idmedicamento"]) && isset($_POST["idsolicitudmed"]) && isset($_POST["estadosolicitud"])) {
            $idmedicamento = solonumeros($_POST["idmedicamento"]);
            $idsolicitud = solonumeros($_POST["idsolicitudmed"]);
            $estadosolicitud = solonumeros($_POST["estadosolicitud"]);

            if (validavacioenarreglo(array($idmedicamento, $idsolicitud, $estadosolicitud))) { //Campos vacios
                echo 1;
                return;
            } else {
                if (ExisteEstadoAprobadoPendienteORechazado($mysqli, $idsolicitud, $idmedicamento, $estadosolicitud) >= 1) { //Ya esta pendiente o rechazado
                    echo 2;
                    return;
                } else {
                    $sql1 = "UPDATE historial_solicitud SET estado_historial_solicitud='$estadosolicitud'
                    WHERE id_medicamento='$idmedicamento' and id_solicitud_medicamento='$idsolicitud'";
                    $res1 = mysqli_query($mysqli, $sql1);
                    if (!$res1) {
                        echo 3;
                        return;
                    } else {

                        $query5 = "SELECT id_historial_solicitud FROM historial_solicitud
                        WHERE (estado_historial_solicitud=1 or estado_historial_solicitud=2) and
                        id_solicitud_medicamento='$idsolicitud'";
                        $resquery5 = mysqli_query($mysqli, $query5);

                        if ($resquery5 && mysqli_num_rows($resquery5) == 0) { //Estan todas rechazadas entonces cambio el estado del seguimiento en la tabla solicitud_medicamento
                            $query6 = "UPDATE solicitud_medicamento SET seguimiento='3'
                            WHERE  id_solicitud_medicamento='$idsolicitud'";
                            $resquery6 = mysqli_query($mysqli, $query6);
                        } else {
                            $query6 = "UPDATE solicitud_medicamento SET seguimiento='0'
                            WHERE  id_solicitud_medicamento='$idsolicitud'";
                            $resquery6 = mysqli_query($mysqli, $query6);
                        }

                        echo 4;
                        return;
                    }
                }
            }
        }
    } else if ($seleccion == 5) {  //llenar stock maximo del estado del historial_medicamento, cuando selecciona opcion de la mantencion
        if (isset($_POST["subselect"]) && $_POST["subselect"] == 1 && isset($_POST["idsolicitud"]) && isset($_POST["rutpaciente"])) {
            $idsolicitud = solonumeros($_POST["idsolicitud"]);
            $rutpaciente = validarut($_POST["rutpaciente"]);

            if (validavacioenarreglo(array($idsolicitud, $rutpaciente))) { //Campos vacios
                echo 1;
                return;
            } else {
                if (ExisteSolicitudAprobada($mysqli, $idsolicitud) == 0) { //No tiene solicitudes aprobadas entonces no puede subir al nivel de en transito
                    echo 2;
                    return;
                } else {
                    $sql = "UPDATE solicitud_medicamento SET seguimiento=1 WHERE id_solicitud_medicamento='$idsolicitud' and rut_paciente='$rutpaciente'";
                    $res = mysqli_query($mysqli, $sql);
                    if (!$res) {
                        echo 3;
                        return;
                    } else {
                        echo 4;
                        return;
                    }
                }
            }
        } else if (isset($_POST["subselect"]) && $_POST["subselect"] == 2 && isset($_POST["idsolicitud"]) && isset($_POST["rutpaciente"])) {
            $idsolicitud = solonumeros($_POST["idsolicitud"]);
            $rutpaciente = validarut($_POST["rutpaciente"]);

            if (validavacioenarreglo(array($idsolicitud, $rutpaciente))) { //Campos vacios
                echo 1;
                return;
            } else {
                if (ExisteSolicitudAprobada($mysqli, $idsolicitud) == 0) { //No tiene solicitudes aprobadas entonces no puede subir al nivel de entregado
                    echo 2;
                    return;
                } else {
                    $sql = "UPDATE solicitud_medicamento SET seguimiento=2 WHERE id_solicitud_medicamento='$idsolicitud' and rut_paciente='$rutpaciente'";
                    $res = mysqli_query($mysqli, $sql);
                    if (!$res) {
                        echo 3;
                        return;
                    } else {
                        echo 4;
                        return;
                    }
                }
            }
        } else if (isset($_POST["subselect"]) && $_POST["subselect"] == 3 && isset($_POST["idsolicitud"]) && isset($_POST["rutpaciente"])) {
            $idsolicitud = solonumeros($_POST["idsolicitud"]);
            $rutpaciente = validarut($_POST["rutpaciente"]);

            if (validavacioenarreglo(array($idsolicitud, $rutpaciente))) { //Campos vacios
                echo 1;
                return;
            } else {
                $sql = "UPDATE solicitud_medicamento SET seguimiento=0 WHERE id_solicitud_medicamento='$idsolicitud' and rut_paciente='$rutpaciente'";
                $res = mysqli_query($mysqli, $sql);
                if (!$res) {
                    echo 2;
                    return;
                } else {
                    echo 3;
                    return;
                }
            }
        } else { //no existe subselect
            echo 5;
            return;
        }



        // ExisteSolicitudAprobada($mysqli, $idsolicitud);
    }
}



function ExisteSolicitudAprobadaORechazada($conexion, $idsolicitud, $rutrecibido)
{
    //Aprobada tiene estado=2 y Rechazada estado=3
    $sql = "SELECT COUNT(sm.id_solicitud_medicamento) as contador
    FROM solicitud_medicamento sm , historial_solicitud hs WHERE 
    sm.id_solicitud_medicamento=hs.id_solicitud_medicamento and (hs.estado_historial_solicitud==2 or hs.estado_historial_solicitud==3) and
    sm.id_solicitud_medicamento='$idsolicitud' and sm.rut_paciente='$rutrecibido'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['contador'];
    }
    return $resultado;
}

function ExisteSolicitudAprobada($conexion, $idsolicitud)
{
    //Verifica si existe una solicitud aprobada, lo uso para cambiar el estado en transito o entregado
    $sql = "SELECT COUNT(hs.id_solicitud_medicamento) as contador
    FROM solicitud_medicamento sm , historial_solicitud hs WHERE 
    sm.id_solicitud_medicamento=hs.id_solicitud_medicamento and
    sm.id_solicitud_medicamento='$idsolicitud' and hs.estado_historial_solicitud=2";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['contador'];
    }
    return $resultado;
}



function ExisteEstadoAprobadoPendienteORechazado($conexion, $idsolicitud, $idmedicamento, $estadosolicitud)
{
    //Existe una solicitud de medicamento con ese idmedicamento donde el estado es pendiente o rechazado (estado: 1 y 3, respectivamente)
    $sql = "SELECT COUNT(id_historial_solicitud) as contador
    FROM historial_solicitud 
    WHERE id_solicitud_medicamento='$idsolicitud' 
    and id_medicamento='$idmedicamento' 
    and estado_historial_solicitud='$estadosolicitud'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['contador'];
    }
    return $resultado;
}

//========================================VERIFICACIONES DE STOCK=========================================================================//
function verificarstockmaximo($conexion, $IDMEDICAMENTO)
{
    $sql = "SELECT historial FROM medicamento WHERE id_medicamento='$IDMEDICAMENTO'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['historial'];
    }
    return $resultado;
}

function verificarSumaStockEstados($conexion, $IDMEDICAMENTO)
{
    $sql = "SELECT SUM(stock_historial_medicamento) as sumaEstados FROM historial_medicamento WHERE id_medicamento='$IDMEDICAMENTO'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['sumaEstados'];
    }
    return $resultado;
}

function verificarstockDeUnMedicamento($conexion, $IDESTADO, $IDMEDICAMENTO)
{
    $sql = "SELECT stock_historial_medicamento FROM historial_medicamento WHERE id_estado_medicamento='$IDESTADO' and id_medicamento='$IDMEDICAMENTO'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['stock_historial_medicamento'];
    }
    return intval($resultado);
}
