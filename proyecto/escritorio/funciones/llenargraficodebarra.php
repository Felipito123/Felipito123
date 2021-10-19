<?php
header('Content-Type: application/json');

include '../../conexion/conexion.php';
include '../../funcionesphp/TOUTF8.php';

// SUBSTRING(titulo_articulo, 1, 23) AS titulo
$sqlQuery = "SELECT id_articulo,titulo_articulo, SUM(visualizaciones_articulo) AS visitas 
FROM articulo GROUP BY id_articulo ORDER BY visitas DESC LIMIT 4";
$result = mysqli_query($mysqli, $sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

echo json_encode(toutf8($data));
mysqli_close($mysqli);
