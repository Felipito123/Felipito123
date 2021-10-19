<?php
// header('Content-Type: application/json');
include '../../conexion/conexion.php';
include '../../funcionesphp/TOUTF8.php';

$sql = "SELECT COUNT(rut) as rutificador,
(SELECT COUNT(estado_usuario) FROM usuario WHERE estado_usuario=1) as usuariosactivos,
(SELECT COUNT(estado_usuario) FROM usuario WHERE estado_usuario=0) as usuariosinactivos
FROM usuario";
$res = mysqli_query($mysqli, $sql);

$datos = array();
while ($fila = mysqli_fetch_array($res)) {
	// $datos[] = $fila;
	$datos[] = array(
		'USUARIOACTIVO' => $fila["usuariosactivos"],
		'USUARIOINACTIVO' => $fila["usuariosinactivos"]
	);
}
// foreach ($res as $row) {
// 	$data[] = $row;
// }

echo json_encode(toutf8($datos));
mysqli_close($mysqli);
