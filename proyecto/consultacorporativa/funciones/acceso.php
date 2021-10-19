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

        if (isset($_POST['rut']) && isset($_POST['ano'])) {

            $rut_consultar = validarut($_POST['rut']);
            $ano_consultar = solonumeros($_POST['ano']);

            // $agrega_a_consulta = "";

            $sql = "SELECT hc.id_historial_cargo, rl.nombre_rol FROM historial_cargo hc, rol rl  
            WHERE hc.id_rol=rl.id_rol and hc.rut='$rut_consultar' and year(hc.fecha_cargo) ='$ano_consultar'";

            $consulta = mysqli_query($mysqli, $sql);

            $datos = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos[] = array(
                    'ID_HISTORIALC'  => $fila["id_historial_cargo"],
                    'NOMBRE_ROL'     => $fila["nombre_rol"]
                );
            }
            echo json_encode(toutf8($datos));
            return;
        } else {
            echo 0; //Lo toma como vacia la tabla
            return;
        }
    } else if ($seleccion == 2) {

        if (isset($_POST['nombre'])) {
            // $apellido = soloCaractDeConversacion($_POST['apellido']);
            $nombre = soloCaractDeConversacion($_POST['nombre']);

            if (validavacioenarreglo(array($nombre))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {

                $sql = "SELECT DISTINCT us.rut ,us.nombre_usuario FROM historial_cargo hc, usuario us
                WHERE hc.rut=us.rut and (us.nombre_usuario LIKE '%$nombre%')";

                $consulta = mysqli_query($mysqli, $sql);

                if (!$consulta) {
                    echo 2;
                    return;
                } else {
                    $datos = array();
                    while ($fila = mysqli_fetch_array($consulta)) {
                        $datos[] = array(
                            'RUT'      => $fila["rut"],
                            'NOMBRE'   => $fila["nombre_usuario"]
                        );
                    }
                    // header('Content-type: application/json');
                    echo json_encode(toutf8($datos));
                    return;
                }
            }
        } else {
            echo 3;
            return;
        }
    } else if ($seleccion == 3) {

        if (isset($_POST['rut_consultar']) && isset($_POST['ano_consultar'])) {
            $rut_consultar = validarut($_POST['rut_consultar']);
            $ano_consultar = solonumeros($_POST['ano_consultar']);

            if (validavacioenarreglo(array($rut_consultar, $ano_consultar))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {

                $sql = "SELECT DISTINCT us.nombre_usuario FROM historial_cargo hc, usuario us
                WHERE hc.rut=us.rut and hc.rut='$rut_consultar' and year(hc.fecha_cargo) ='$ano_consultar'";
                $consulta = mysqli_query($mysqli, $sql);

                if (!$consulta) {
                    echo 2;
                    return;
                } else {
                    // $datos = array();
                    // while ($fila = mysqli_fetch_array($consulta)) {
                    //     $datos[] = array(
                    //         'NOMBRE_USUARIO'     => $fila["nombre_usuario"]
                    //     );
                    // }

                    $contardatos = mysqli_num_rows($consulta);

                    // $contardatos = count($datos);

                    if ($contardatos == 0) {
                        echo 3;
                        return;
                    } else {
                        // header('Content-type: application/json');
                        // echo json_encode(toutf8($datos));
                        // return;
                        $fila = mysqli_fetch_assoc($consulta);
                        echo toutf8($fila['nombre_usuario']);
                        return;
                    }
                }
            }
        } else {
            echo 4;
            return;
        }
    }
}
mysqli_close($mysqli);
