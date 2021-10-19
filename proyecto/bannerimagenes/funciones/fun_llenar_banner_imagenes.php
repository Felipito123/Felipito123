<?php
require '../../conexion/conexion.php';

$sql = "SELECT id_ban_imagenes, nombre_ban_imagenes, estado_ban_imagenes, link_ban_imagenes  FROM banner_imagenes";

$consulta = mysqli_query($mysqli, $sql);

$datos=array();
while($fila=mysqli_fetch_array($consulta)){
    $datos[]=array(
    'ID_BAN_IMAGENES'=>$fila["id_ban_imagenes"],
    'NOMBRE_BAN_IMAGENES'=>$fila["nombre_ban_imagenes"],
    'ESTADO_BAN_IMAGENES'=>$fila["estado_ban_imagenes"],
    'LINK_BAN_IMAGENES'=>$fila["link_ban_imagenes"]
    );
}

header('Content-type: application/json');
echo json_encode($datos);
// print json_encode($datos);
mysqli_close($mysqli);
