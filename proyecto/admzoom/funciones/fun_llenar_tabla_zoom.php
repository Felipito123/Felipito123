<?php
require '../../conexion/conexion.php';

session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];

// $sql = "SELECT id_reunion,codigo_reunion,asunto_reunion,url_reunion,fecha_reunion,
// duracion_reunion,contrasena_reunion,estado_reunion FROM reunion 
// WHERE rut_creador='$rutsesion' and estado_reunion!='finalizada'";

//Muestro los activos y pendientes
$sql = "SELECT reu.id_reunion,reu.rut_creador, reu.codigo_reunion,reu.asunto_reunion,reu.url_reunion,reu.fecha_reunion,
reu.duracion_reunion,reu.contrasena_reunion,reu.estado_reunion, us.imagen_usuario, us.nombre_usuario FROM reunion reu, usuario us
WHERE us.rut=reu.rut_creador and reu.rut_creador='$rutsesion' and reu.estado_reunion!='finalizada'";

$consulta = mysqli_query($mysqli, $sql);

$datos=array();
while($fila=mysqli_fetch_array($consulta)){
    $datos[]=array(
    'ID_REUNION'    =>$fila["id_reunion"],
    'RUT_CREADOR'   =>$fila["rut_creador"],
    'NOMBRE_CREADOR'=>$fila["nombre_usuario"],
    'IMAGEN_CREADOR'=>$fila["imagen_usuario"],
    'CODIGO_REUNION'=>$fila["codigo_reunion"],
    'ASUNTO_REUNION'=>$fila["asunto_reunion"],
    'URL_REUNION'   =>$fila["url_reunion"],
    'FECHA_REUNION' =>$fila["fecha_reunion"],
    'DURACION_REUNION'=>$fila["duracion_reunion"],
    'CONTRASENA_REUNION'=>$fila["contrasena_reunion"],
    'ESTADO_REUNION'    =>$fila["estado_reunion"]
    );
}

// print json_encode($datos);
// header('Content-type: application/json');
echo json_encode($datos);
mysqli_close($mysqli);

// reunion(id_reunion,asunto_reunion,url_reunion,fecha_reunion,duracion_reunion,contrasena_reunion) 
