<?php
require '../../conexion/conexion.php';
$sql = "SELECT id_ban_videos,titulo_ban_videos,nombre_ban_videos, estado_ban_videos FROM banner_videos";

$consulta = mysqli_query($mysqli, $sql);

$datos=array();
while($fila=mysqli_fetch_array($consulta)){
    $datos[]=array(
    'ID_BAN_VIDEOS'=>$fila["id_ban_videos"],
    'TITULO_BAN_VIDEOS'=>$fila["titulo_ban_videos"],
    'NOMBRE_BAN_VIDEOS'=>$fila["nombre_ban_videos"],
    'ESTADO_BAN_VIDEOS'=>$fila["estado_ban_videos"]
    );
}

//var_dump($datos);
header('Content-type: application/json');
echo json_encode($datos);
mysqli_close($mysqli);
