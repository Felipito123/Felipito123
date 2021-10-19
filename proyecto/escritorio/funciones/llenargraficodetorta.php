<?php
header('Content-Type: application/json');

include '../../conexion/conexion.php';
include '../../funcionesphp/TOUTF8.php';
$sqlQuery = "SELECT id_articulo,SUBSTRING(titulo_articulo, 1, 32) AS titulo,SUM(visualizaciones_articulo) AS visitas FROM articulo GROUP BY id_articulo ORDER BY visitas ASC LIMIT 5"; //ANTES: DESC
$result = mysqli_query($mysqli,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

echo json_encode(toutf8($data));
mysqli_close($mysqli);
