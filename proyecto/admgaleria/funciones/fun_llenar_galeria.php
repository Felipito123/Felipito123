<?php
require '../../conexion/conexion.php';

$sql = "SELECT id_galeria,archivo_galeria,titulo_galeria,estado_galeria FROM galeria";

$consulta = mysqli_query($mysqli, $sql);

$datos2=array();
while($fila=mysqli_fetch_array($consulta)){
    $datos2[]=array(
    'ID_IMG_GALERIA'=>$fila["id_galeria"],
    'NOMBRE_IMG_GALERIA'=>$fila["archivo_galeria"],
    'TITULO_IMG_GALERIA'=>$fila["titulo_galeria"],
    'ESTADO_IMG_GALERIA'=>$fila["estado_galeria"]
    );
}

//OJO EN EL SERVIDOR ME DA ERROR POR TANTO TENGO QUE AGREGARLE EL utf8_encode() A LAS $fila


// $enviar=json_encode($datos2);
// echo $enviar;
//  var_dump($datos2);
header("Content-Type: application/json");
echo json_encode($datos2);

mysqli_close($mysqli);


?>