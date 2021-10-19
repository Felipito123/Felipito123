<?php
// header('Content-Type: application/json');
include '../../conexion/conexion.php';
include '../../funcionesphp/TOUTF8.php';

$sql = "SELECT us.nombre_usuario,us.rut,SUM(v.dias_tomados_vacaciones) AS diastomados
FROM vacaciones v, usuario us WHERE v.rut=us.rut
GROUP BY us.nombre_usuario
ORDER BY SUM(v.dias_tomados_vacaciones) ASC LIMIT 4";
$res = mysqli_query($mysqli, $sql);

$datos = array();
while ($fila = mysqli_fetch_array($res)) {
	$datos[] = array(
		'NOMBREUSUARIO' => $fila["nombre_usuario"],
		'DIASTOMADOS' => $fila["diastomados"]
	);
}
echo json_encode(toutf8($datos));
mysqli_close($mysqli);
