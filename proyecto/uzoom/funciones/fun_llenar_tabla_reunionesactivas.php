<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/TOUTF8.php';
session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];


// $sql = "SELECT asunto_reunion,url_reunion,fecha_reunion,duracion_reunion,contrasena_reunion,estado_reunion FROM reunion WHERE estado_reunion!='finalizada'";

// $sql = "SELECT ev.id, ev.title, ev.descripcion, ev.color, ev.start, ev.end FROM 
// eventos ev, destinatarios_eventos dev 
// WHERE ev.id=dev.id_eventos and dev.rut_receptor='$rutsesion'";

$sql = "SELECT reu.asunto_reunion,reu.url_reunion,reu.fecha_reunion,reu.duracion_reunion,reu.contrasena_reunion,reu.estado_reunion FROM reunion reu, destinatario_reunion dr 
WHERE reu.id_reunion=dr.id_reunion and dr.rut_receptor='$rutsesion' and reu.estado_reunion!='finalizada'";

$consulta = mysqli_query($mysqli, $sql);

$datos=array();
while($fila=mysqli_fetch_array($consulta)){
    $datos[]=array(
    'ASUNTO_REUNION'=>$fila["asunto_reunion"],
    'URL_REUNION'=>$fila["url_reunion"],
    'FECHA_REUNION'=>$fila["fecha_reunion"],
    'DURACION_REUNION'=>$fila["duracion_reunion"].' minutos',
    'CONTRASENA_REUNION'=>$fila["contrasena_reunion"],
    'ESTADO_REUNION'=>$fila["estado_reunion"]
    );
}

header('Content-type: application/json');
echo json_encode(toutf8($datos));
mysqli_close($mysqli);
