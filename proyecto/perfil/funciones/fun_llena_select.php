<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
session_start();
$id_region_sesion = $_SESSION['sesionCESFAM']['id_region'];
$nombre_region_sesion = $_SESSION['sesionCESFAM']['nombre_region'];
$id_comuna_sesion = $_SESSION['sesionCESFAM']['id_comuna'];
$nombre_comuna_sesion = $_SESSION['sesionCESFAM']['nombre_comuna'];

$seleccion = $_POST['seleccionar'];

if (isset($seleccion)) {

    if ($seleccion == 1) { //llena comunas
        $subseleccion = solonumeros($_POST['subselect']);
        $ljson = '';

        if ($subseleccion == 1) {
            $sql = "SELECT id_region,nombre_region FROM region";
            $consulta = mysqli_query($mysqli, $sql);
            // $contar = mysqli_num_rows($consulta); lo comente porque cuando hay error de consulta el mysqli_num_rows genera error
            if (!$consulta) {
                echo 1;
                return;
            } else {
                //Toma la región por defecto de la sesion
                $ljson .= '<option value="' . $id_region_sesion . '">' . toutf8($nombre_region_sesion) . '</option>';
                while ($fila = mysqli_fetch_array($consulta)) {
                    $idregion = $fila['id_region'];
                    $nombreregion = $fila['nombre_region'];
                    $ljson .= '<option value="' . $idregion . '">' . toutf8($nombreregion) . '</option>';
                }
            }
            echo $ljson;
            return;
        } else if ($subseleccion == 2) { //con el valor por defecto de la sesion
            $regionseleccionada = solonumeros($_POST['regionseleccionada']);

            if (isset($regionseleccionada)) {
                $sql2 = "SELECT id_comuna,nombre_comuna FROM comuna WHERE id_region = '$regionseleccionada'";
                $consulta2 = mysqli_query($mysqli, $sql2);
                // $contar2 = mysqli_num_rows($consulta2); lo comente porque cuando hay error de consulta el mysqli_num_rows genera error

                if (!$consulta2) {
                    echo 1;
                    return;
                } else {
                    //Toma la comuna por defecto de la sesion
                    $ljson .= '<option value="' . $id_comuna_sesion . '">' . toutf8($nombre_comuna_sesion) . '</option>';

                    while ($fila2 = mysqli_fetch_array($consulta2)) {
                        $idcomuna = $fila2['id_comuna'];
                        $nombrecomuna = $fila2['nombre_comuna'];
                        $ljson .= '<option value="' . $idcomuna . '">' . toutf8($nombrecomuna) . '</option>';
                    }
                    echo $ljson;
                    return;
                }
            } else {
                echo 2;
                return;
            }
        } else if ($subseleccion == 3) { // llena las comunas sin el valor por defecto de la sesion, sino saldra siempre el valor por defecto en el change
            $regionseleccionada = solonumeros($_POST['regionseleccionada']);

            if (isset($regionseleccionada)) {
                $sql2 = "SELECT id_comuna,nombre_comuna FROM comuna WHERE id_region = '$regionseleccionada'";
                $consulta2 = mysqli_query($mysqli, $sql2);
                // $contar2 = mysqli_num_rows($consulta2); lo comente porque cuando hay error de consulta el mysqli_num_rows genera error

                if (!$consulta2) {
                    echo 1;
                    return;
                } else {
                    //Toma la comuna por defecto de la sesion
                    while ($fila2 = mysqli_fetch_array($consulta2)) {
                        $idcomuna = $fila2['id_comuna'];
                        $nombrecomuna = $fila2['nombre_comuna'];
                        $ljson .= '<option value="' . $idcomuna . '">' . toutf8($nombrecomuna) . '</option>';
                    }
                    echo $ljson;
                    return;
                }
            } else {
                echo 2;
                return;
            }
        }
    }
} else {
    echo 444;
    return;
}
