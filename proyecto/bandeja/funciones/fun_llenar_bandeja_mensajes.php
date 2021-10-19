<?php
require '../../conexion/conexion.php';

$sql = "SELECT id_contacto, correo_contacto, telefono_contacto, asunto_contacto,descripcion_contacto, nombre_contacto  FROM contacto";

$consulta = mysqli_query($mysqli, $sql);

$datos=array();
while($fila=mysqli_fetch_array($consulta)){
    $datos[]=array(
    'ID_CONTACTO'=>$fila["id_contacto"],
    'CORREO'=>$fila["correo_contacto"],
    'TELEFONO'=>$fila["telefono_contacto"],
    'ASUNTO'=>$fila["asunto_contacto"],
    'DESCRIPCION'=>$fila["descripcion_contacto"],
    'NOMBRE'=>$fila["nombre_contacto"]
    );
}

// print json_encode($datos);

//var_dump($datos);
header('Content-type: application/json');
echo json_encode($datos);

mysqli_close($mysqli);
