<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';

// if (isset($_POST['idbtn']) && isset($_POST['tipoBTN'])) {

if (isset($_POST['tipoBTN'])) {
    if ($_POST['tipoBTN'] == 1) { //Activado

        if (isset($_POST['idbtn'])) {

            $idbtn = solonumeros($_POST['idbtn']);

            if (validavacioenarreglo(array($idbtn))) {
                echo 1;
                return;
            }

            $sqlconsulta = mysqli_query($mysqli, "SELECT id_reunion FROM reunion WHERE id_reunion='$idbtn' and estado_reunion='activo'");
            $contador = mysqli_num_rows($sqlconsulta);

            if ($contador >= 1) {
                echo 2;
                return;
            }

            $sqlactivar = "UPDATE reunion set estado_reunion='activo' WHERE id_reunion='$idbtn'";
            $resActivo = mysqli_query($mysqli, $sqlactivar);

            if (!$resActivo) {
                echo 3; //error en la consulta
                return;
            } else {
                echo 4; //Exito
                return;
            }
        } else {
            echo 5;
            return;
        }
    } else if ($_POST['tipoBTN'] == 2) {

        if (isset($_POST['idbtn'])) {
            $idbtn = solonumeros($_POST['idbtn']);

            if (validavacioenarreglo(array($idbtn))) {
                echo 1;
                return;
            }

            $sqlconsulta = mysqli_query($mysqli, "SELECT id_reunion FROM reunion WHERE id_reunion='$idbtn' and estado_reunion='pendiente'");
            $contador = mysqli_num_rows($sqlconsulta);

            if ($contador >= 1) {
                echo 2;
                return;
            }

            $sqlPendiente = "UPDATE reunion set estado_reunion='pendiente' WHERE id_reunion='$idbtn'";
            $resPendiente = mysqli_query($mysqli, $sqlPendiente);

            if (!$resPendiente) {
                echo 3; //error en la consulta
                return;
            } else {
                echo 4; //Exito
                return;
            }
        } else {
            echo 5;
            return;
        }
    } else if ($_POST['tipoBTN'] == 3) {
        if (isset($_POST['idbtn'])) {
            $idbtn = solonumeros($_POST['idbtn']);

            if (validavacioenarreglo(array($idbtn))) {
                echo 1;
                return;
            }

            $sqlconsulta = mysqli_query($mysqli, "SELECT id_reunion FROM reunion WHERE id_reunion='$idbtn' and estado_reunion='finalizada'");
            $contador = mysqli_num_rows($sqlconsulta);

            if ($contador >= 1) {
                echo 2;
                return;
            }

            $sqlInactivo = "UPDATE reunion set estado_reunion='finalizada' WHERE id_reunion='$idbtn'";
            $resInactivo = mysqli_query($mysqli, $sqlInactivo);

            if (!$resInactivo) {
                echo 3; //error en la consulta
                return;
            } else {
                echo 4; //Exito
                return;
            }
        } else {
            echo 5;
            return;
        }
    } else if ($_POST['tipoBTN'] == 4) {

        $sqlNoVisible = "UPDATE reunion set estado_reunion='novisible' WHERE estado_reunion='finalizada'";
        $resNoVisible = mysqli_query($mysqli, $sqlNoVisible);

        if (!$resNoVisible) {
            echo 1; //error en la consulta
            return;
        } else {
            echo 2; //Exito
            return;
        }
    } else if ($_POST['tipoBTN'] == 5) {

        $contador = count($_POST['grupo_usuarios']);

        if ($contador == 0) {
            echo 400; //Error al mostrar el último id
            return;
        } else {
            $i = 0;

            $sql1 = "SELECT MAX(id_reunion) AS ultimo_insertado FROM reunion"; //Muestro el último articulo insertado en la reunión reciente ingresada
            $resultado_1 = mysqli_query($mysqli, $sql1);

            if (!$resultado_1) {
                echo 400; //Error al mostrar el último id
                return;
            } else {
                $fila = mysqli_fetch_assoc($resultado_1);
                $ultimo_insertado = $fila["ultimo_insertado"];

                while ($i < $contador) {
                    $rutreceptor = $_POST['grupo_usuarios'][$i];
                    $sql2 = "INSERT INTO destinatario_reunion (id_dr,id_reunion,rut_receptor) VALUES (NULL,'$ultimo_insertado','$rutreceptor')";
                    $resultado_2 = mysqli_query($mysqli, $sql2);
                    if (!$resultado_2) {
                        echo 400; //Error al insertar
                        return;
                    }
                    $i++;
                }
                $sql3 = "SELECT us.correo_usuario FROM usuario us, destinatario_reunion dr 
                        WHERE us.rut=dr.rut_receptor and dr.id_reunion='$ultimo_insertado' and us.estado_usuario='1'";
                $resultado_3 = mysqli_query($mysqli, $sql3);

                $datos = array();
                while ($fila2 = mysqli_fetch_array($resultado_3)) {
                    $datos[] = array(
                        'CORREO' => $fila2["correo_usuario"]
                    );
                }
                // header('Content-type: application/json');
                echo json_encode(toutf8($datos));
                // echo 5;
                // return;
            }
        }
    } else if ($_POST['tipoBTN'] == 6 && isset($_POST['IDREUN'])) {
        $idreunion = $_POST['IDREUN'];
        $sql1 = "SELECT us.rut, us.imagen_usuario, us.nombre_usuario FROM usuario us, destinatario_reunion dr WHERE us.rut=dr.rut_receptor and dr.id_reunion='$idreunion'";
        $resultado_1 = mysqli_query($mysqli, $sql1);
        $datos = array();
        while ($fila1 = mysqli_fetch_array($resultado_1)) {
            $datos[] = array(
                'NOMBRE_DESTINATARIO' => $fila1["nombre_usuario"],
                'IMG_DESTINATARIO' => $fila1["imagen_usuario"],
                'RUT_DESTINATARIO' => $fila1["rut"]
            );
        }
        echo json_encode(toutf8($datos));
    } else if ($_POST['tipoBTN'] == 7 && isset($_POST['IDREUN'])) {

        $idreunion = solonumeros($_POST['IDREUN']);

        if (validavacioenarreglo(array($idreunion))) {
            echo 1;
            return;
        } else {
            $sqlconsulta = mysqli_query($mysqli, "SELECT id_reunion FROM reunion WHERE id_reunion='$idreunion' and estado_reunion='finalizada'");
            $contador = mysqli_num_rows($sqlconsulta);

            if ($contador <= 0) { //no encontró que estuviese finalizada la reunión por tanto no se puede activar
                echo 2;
                return;
            }

            $sql1 = "UPDATE reunion set estado_reunion='activo' WHERE id_reunion='$idreunion'";
            $res1 = mysqli_query($mysqli, $sql1);

            if (!$res1) {
                echo 3; //error en la consulta
                return;
            } else {
                echo 4; //Exito
                return;
            }
        }
    } else {
        echo 500;
        return;
    }
}
mysqli_close($mysqli);
