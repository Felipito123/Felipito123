<?php
header('Content-Type: application/json');
include '../../conexion/conexion.php';
session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];
$sql = "SELECT ev.id, ev.title, ev.descripcion, ev.color, ev.start, ev.end FROM 
eventos ev, destinatarios_eventos dev 
WHERE ev.id=dev.id_eventos and dev.rut_receptor='$rutsesion'";

$consulta = mysqli_query($mysqli, $sql);
$data = array();
foreach ($consulta as $row) {
	$data[] = $row;
}
echo json_encode($data);
mysqli_close($mysqli);
//print json_encode($myArray);
