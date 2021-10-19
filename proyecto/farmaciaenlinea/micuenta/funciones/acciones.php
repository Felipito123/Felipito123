<?php
include '../../../conexion/conexion.php';
include '../../../funcionesphp/limpiarCampo.php';
include '../../../funcionesphp/TOUTF8.php';
session_start();
$rutsesionfarmacia = $_SESSION["sesionFarmacia"]["rut"];

if (isset($_POST['seleccionar'])) {
    $seleccion = $_POST['seleccionar'];
    if ($seleccion == 1) {
        if (isset($rutsesionfarmacia)) {
            $sql = "SELECT pac.rut_paciente, pac.nombres_paciente, pac.apellidos_paciente, pac.direccion_paciente,
            pac.telefono_paciente, pac.correo_paciente, pat.nombre_patologia FROM paciente pac, patologia pat WHERE pac.id_patologia=pat.id_patologia and pac.rut_paciente='$rutsesionfarmacia'";
            $consulta = mysqli_query($mysqli, $sql);

            $datos = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos[] = array(
                    'RUT' => $fila["rut_paciente"],
                    'NOMBRES' => $fila["nombres_paciente"],
                    'APELLIDOS' => $fila["apellidos_paciente"],
                    'TELEFONO' => $fila["telefono_paciente"],
                    'DIRECCION' => $fila["direccion_paciente"],
                    'CORREO' => $fila["correo_paciente"],
                    'PATOLOGIA' => $fila["nombre_patologia"]
                );
            }

            // print json_encode($datos);
            // header('Content-type: application/json');
            echo json_encode(toutf8($datos));
            mysqli_close($mysqli);
        } else {
            echo 1;
            return;
        }
    } else if ($seleccion == 2) {
        if (isset($rutsesionfarmacia)) {
            if (
                isset($_POST['nombres']) &&
                isset($_POST['apellidos']) &&
                isset($_POST['correo']) &&
                isset($_POST['telefono']) &&
                isset($_POST['direccion'])
            ) {
                $nombres = sololetras($_POST['nombres']);
                $apellidos = sololetras($_POST['apellidos']);
                $correo = solocorreo($_POST['correo']);
                $telefono = solonumeros($_POST['telefono']);
                $direccion = solodireccion($_POST['direccion']);

                if (validavacioenarreglo(array($nombres, $apellidos, $correo, $telefono, $direccion))) { //Valida si estan vacios los datos
                    echo 1;
                    return;
                } else {
                    $sql = "UPDATE paciente SET nombres_paciente='$nombres', apellidos_paciente='$apellidos',correo_paciente='$correo',telefono_paciente='$telefono',direccion_paciente='$direccion' WHERE rut_paciente='$rutsesionfarmacia'";
                    $res = mysqli_query($mysqli, $sql);

                    if (!$res) { //Hubo un error, no se pudo editar los datos del paciente
                        echo 2;
                        return;
                    } else { //Consulta exitosa
                        echo 3;
                        return;
                    }
                }
            } else { //No se han recibido parámetros
                echo 4;
                return;
            }
        } else { //No existe la sesion
            echo 5;
            return;
        }
    } else if ($seleccion == 3) {
        if (isset($rutsesionfarmacia)) {
            $sql = "SELECT id_solicitud_medicamento, rut_paciente, fecha_solicitud, seguimiento
            FROM solicitud_medicamento WHERE rut_paciente='$rutsesionfarmacia'";
            $consulta = mysqli_query($mysqli, $sql);

            $datos = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos[] = array(
                    'IDSOLICITUD' => $fila["id_solicitud_medicamento"],
                    'RUT' => $fila["rut_paciente"],
                    'FECHA' => $fila["fecha_solicitud"],
                    'SEGUIMIENTO' => $fila["seguimiento"]
                );
            }
            // header('Content-type: application/json');
            echo json_encode(toutf8($datos));
            mysqli_close($mysqli);
        } else {
            echo 1;
            return;
        }
    } else if ($seleccion == 4) {
        if (isset($rutsesionfarmacia) && isset($_POST['idsolicitud'])) {
            $idsolicitud = $_POST['idsolicitud'];

            $sql = "SELECT med.nombre_medicamento, med.dosificacion_medicamento, hs.stock_historial_solicitud,
            hs.estado_historial_solicitud,hs.comentario_historial_solicitud
            FROM solicitud_medicamento sm , historial_solicitud hs, medicamento med WHERE 
            sm.id_solicitud_medicamento=hs.id_solicitud_medicamento and
            hs.id_medicamento=med.id_medicamento and 
            sm.id_solicitud_medicamento='$idsolicitud' and sm.rut_paciente='$rutsesionfarmacia'";
            $consulta = mysqli_query($mysqli, $sql);
            $datos = '';
            while ($fila = mysqli_fetch_array($consulta)) {
                if ($fila["estado_historial_solicitud"] == 1) $estado = "pendiente";
                else if ($fila["estado_historial_solicitud"] == 2) $estado = "aprobado";
                else if ($fila["estado_historial_solicitud"] == 3) $estado = "rechazado";

                $datos .= '<tr>
                <td>' . $fila["nombre_medicamento"] . '</td>
                <td>' . $fila["dosificacion_medicamento"] . '</td>
                <td>' . $fila["stock_historial_solicitud"] . '</td>';

                if ($fila["comentario_historial_solicitud"] == '') {
                    $comentarios = "N/C";
                } else {
                    $comentarios = $fila["comentario_historial_solicitud"];
                }

                $datos .= '
                <td>' . $comentarios . '</td>
                <td>' . $estado . '</td>
                </tr>';
            }

            echo toutf8($datos);
            mysqli_close($mysqli);
        } else {
            echo 1;
            return;
        }
    } else if ($seleccion == 5) {
        if (isset($rutsesionfarmacia) && isset($_POST['idsolicitud'])) {
            $idsolicitud = $_POST['idsolicitud'];

            if (ExisteSolicitudAprobadaORechazada($mysqli, $idsolicitud, $rutsesionfarmacia) >= 1) {
                echo 1;
                return;
            } else {
                $sql1 = "DELETE FROM historial_solicitud WHERE id_solicitud_medicamento='$idsolicitud'";
                $sql2 = "DELETE FROM solicitud_medicamento WHERE id_solicitud_medicamento='$idsolicitud'";
                $res1 = mysqli_query($mysqli, $sql1);
                $res2 = mysqli_query($mysqli, $sql2);

                if (!$res1 && !$res2) {
                    echo 2;
                    return;
                } else {
                    echo 3;
                    return;
                }
                mysqli_close($mysqli);
            }
        } else {
            echo 4;
            return;
        }
    } else if ($seleccion == 6) {
        if (isset($rutsesionfarmacia) && isset($_POST['idsolicitud'])) {
            $idsolicitud = $_POST['idsolicitud'];
            echo ExisteSolicitudAprobadaORechazada($mysqli, $idsolicitud, $rutsesionfarmacia);
            return;
            mysqli_close($mysqli);
        } else {
            echo -1;
            return;
        }
    }
} else {
    echo 555;
    return;
}


function ExisteSolicitudAprobadaORechazada($conexion, $idsolicitud, $rutses)
{
    //Aprobada tiene estado=2 y Rechazada estado=3
    $sql = "SELECT COUNT(sm.id_solicitud_medicamento) as contador
    FROM solicitud_medicamento sm , historial_solicitud hs WHERE 
    sm.id_solicitud_medicamento=hs.id_solicitud_medicamento and (hs.estado_historial_solicitud=2) and
    sm.id_solicitud_medicamento='$idsolicitud' and sm.rut_paciente='$rutses'";

    $sql2 = "SELECT seguimiento FROM solicitud_medicamento WHERE id_solicitud_medicamento='$idsolicitud' and rut_paciente='$rutses'";

    $datos = mysqli_query($conexion, $sql);
    $datos2 = mysqli_query($conexion, $sql2);
    $nfila = mysqli_fetch_assoc($datos2);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['contador'];
    }

    // if ($datos2 && $nfila['seguimiento'] == 3) {
    //     $resultado = -2;
    // }
    return $resultado;
}
