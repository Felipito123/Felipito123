<?php

include '../../conexion/conexion.php';
include '../../funcionesphp/TOUTF8.php';
session_start();
$sql = "SELECT id_calidad,descripcion_calidad,archivo_calidad FROM calidad WHERE estado_calidad=1";
$consulta = mysqli_query($mysqli, $sql);
$datos = array();
while ($fila = mysqli_fetch_array($consulta)) {
    $datos[] = array(
        'ID_CALIDAD_US' => $fila["id_calidad"],
        'NOMBRE_ARCHIVO_CALIDAD_US' => $fila["archivo_calidad"],
        'DESCRIPCION_CALIDAD_US' => $fila["descripcion_calidad"]
    );
}
//var_dump($datos);
header('Content-type: application/json');
echo json_encode(toutf8($datos));
// print json_encode($datos);
mysqli_close($mysqli);
