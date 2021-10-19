<?php
header('Content-Type: application/json');
include '../../conexion/conexion.php';
session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];
$sql = "SELECT * FROM eventos WHERE rut_creador= '$rutsesion'";

// $sql = "SELECT ev.id, ev.title, ev.descripcion, ev.color, ev.start, ev.end FROM 
// eventos ev, contactos_eventos cev 
// WHERE ev.id=cev.id_eventos and cev.rut_receptor='$rutsesion'";

$consulta = mysqli_query($mysqli, $sql);

$data = array();
foreach ($consulta as $row) {
	$data[] = $row;
}

echo json_encode($data);
mysqli_close($mysqli);


//print json_encode($myArray);
